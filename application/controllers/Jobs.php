<?php

class Jobs extends CI_Controller {

	function __construct() {
		parent::__construct();
		
		// Load url helper
		$this->load->helper('url');
		$this->load->helper('security');
		$this->load->helper('download');
		$this->load->helper('directory');

		$this->load->library('session');
		// Load Models
		$this->load->model('job_model');
		$this->load->model('city_model');
		$this->load->model('candidate_model');
	}
	//loads the jobs page
	public function index()
	{	
		$userdata['userType'] = 'anyone';
		$jobTitle ="";
		$jobType="";
		$location="";
		$page="jobs";
        if(isset($_SESSION['userEmail'])){
            $userdata['userEmail'] = $_SESSION['userEmail'];
			$userdata['userType'] = $_SESSION['userType'];
		};
		//filtering function
		if(isset($_POST['jobTitle'])){
			$jobTitle = $this->security->xss_clean($_POST['jobTitle']);
		};
		if(isset($_POST['jobType'])){
			$jobType = $this->security->xss_clean($_POST['jobType']);
			};
		if(isset($_POST['location'])){
			$location = $this->security->xss_clean($_POST['location']);
		};
		//filter end

		// get all jobs for the table status=published
		$data['jobs'] = $this->job_model->get_publishedjobs($page,$jobTitle,$jobType,$location);
		
		$data['cities'] = $this->city_model->get_cities();
        $this->load->view('templates/header', $userdata);
        $this->load->view('pages/jobs', $data);
        $this->load->view('templates/footer');
	}

	// called from view->personcenter->adminPanel , view->personcenter->staffPanel
	// show client tables
	public function manageClient(){
		if($_SESSION['userType']=='admin' || $_SESSION['userType'] =='staff'){
			$userdata['userType'] = $_SESSION['userType'];
			$data['title'] = "Manage Client";
			$data['message'] ="";
			$data['jobs'] = $this->job_model->get_jobs();
			$bookmarkStat= "";
			//adding 3 more field into jobs ref,bookmarkStat,bookmarkUrl
            for($i=0;$i<sizeof($data['jobs']);$i++){
                $ref = base_url() . 'index.php/Jobs/jobDetails/' . $data['jobs'][$i]['JobID'];
                if($data['jobs'][$i]['Bookmark']=="true"){ $bookmarkStat=true;} else {$bookmarkStat=false;};
				$bookmarkUrl= "Bookmark". $data['jobs'][$i]['JobID'];
				//update the value of jobstatus if it's null "" or 0, to NoAction
                if(empty($data['jobs'][$i]['JobStatus'])){ $data['jobs'][$i]['JobStatus']="NoAction"; }
                $data['jobs'][$i]['ref'] = $ref;
                $data['jobs'][$i]['bookmarkStat'] = $bookmarkStat;
                $data['jobs'][$i]['bookmarkUrl'] = $bookmarkUrl;
			}
			$data['activeJobNum'] = $this->job_model->countAllActiveJob();
			$this->load->view('templates/header',$userdata);
			$this->load->view('pages/manageClient',$data);
			$this->load->view('templates/footer');
		} else {
			redirect('/');
		}
	}

	//called from view->pages->manageClient
	//AJAX method
	//get the next 10 records for next page for manageClient page
	public function getActiveJob(){
		if($_SESSION['userType']=='admin' || $_SESSION['userType'] =='staff'){

            $offset=$_POST['offset'];
            $page="";
            $jobsResult = $this->job_model->get_jobs($page,$offset);
			$bookmarkStat= "";
			//adding 3 more extra field ref,bookmarkStat,bookmarkUrl
            for($i=0;$i<sizeof($jobsResult);$i++){
                $ref = base_url() . 'index.php/Jobs/jobDetails/' . $jobsResult[$i]['JobID'];
                if($jobsResult[$i]['Bookmark']=="true"){ $bookmarkStat=true;} else {$bookmarkStat=false;};
				$bookmarkUrl= "Bookmark". $jobsResult[$i]['JobID'];
				//if jobStatus is null, "" or 0 , return the string of NoAction as the value in jobstatus for specific job
                if(empty($jobsResult[$i]['JobStatus'])){ $jobsResult[$i]['JobStatus']="NoAction"; }
                $jobsResult[$i]['ref'] = $ref;
                $jobsResult[$i]['bookmarkStat'] = $bookmarkStat;
                $jobsResult[$i]['bookmarkUrl'] = $bookmarkUrl;
            }

            echo json_encode($jobsResult);
        } else {
            redirect('/');
        }
	}

	//called from: View->page->manageClient
	//detailed information of the job
	public function jobDetails($paramJobID){
		
		if($_SESSION['userType']=='admin' || $_SESSION['userType'] =='staff'){
			
			$userdata['userType'] = $_SESSION['userType'];
			$data['title'] = "Job Order Details";
			//get all info
			$data['job'] = $this->job_model->get_specificJob($paramJobID);
			
			// Find all the files under the job's folder
            $path = constant('JOB_IMAGE_PATH').$paramJobID.'/';
			$data['userFiles'] = directory_map($path);

			//if a candidate is assigned load it as well
			$data['candidatesData'] = $this->candidate_model->getCandidatesJobDetails($paramJobID);
			$data['message'] = "";
			$this->load->view('templates/header',$userdata);
			$this->load->view('pages/jobDetails',$data);
			$this->load->view('templates/footer');
		} else {
			redirect('/');
		}
	}

	//called from: View->pages->jobdetails
	//update the job status to completed and send it to archive if the button is clicked
	public function updateJobToArchive($paramJobID){
		if($_SESSION['userType']=='admin' || $_SESSION['userType'] =='staff'){
			$userdata['userType'] = $_SESSION['userType'];
			$data['title'] = "Job Order Details";

			$this->job_model->updateJobStatusToComplete($paramJobID);

			// Find all the files under the job's folder
            $path = constant('JOB_IMAGE_PATH').$paramJobID.'/';
			$data['userFiles'] = directory_map($path);

			//get the new refreshed data
			$data['job'] = $this->job_model->get_specificJob($paramJobID);
			$data['candidatesData'] = $this->candidate_model->getCandidatesJobDetails($paramJobID);
			$this->load->view('templates/header',$userdata);
			$this->load->view('pages/jobDetails',$data);
			$this->load->view('templates/footer');
		} else {
			redirect('/');
		}
	}

	//called from: View->pages->jobdetails
	//publish the jobs so it's available for everyone to see in homepage and jobs page
	public function jobPublish($paramJobID){
		
		if($_SESSION['userType']=='admin' || $_SESSION['userType'] =='staff'){
			$job = $this->job_model->get_specificJob($paramJobID);
			$userdata['userType'] = $_SESSION['userType'];
			$data['title'] = "Job Order Details";
			$errMessage = array();
			//content
			$publishTitle = xss_clean(stripslashes(trim($this->input->post('publishTitle'))));
			//if the published post info is empty change it to this default value
			//DEFAULT VALUE START
			if($publishTitle == NULL) {
				$publishTitle = $job['JobType'] . ' ' . $job['JobTitle'] . ' worker needed in ' . $job['City'];
			}
			$thumbnailText = xss_clean(stripslashes(trim($this->input->post('thumbnailText'))));
			if($thumbnailText == NULL || strcasecmp($thumbnailText,'Enter text for thumbnail')==0){
				$thumbnailText = "";
			}
			$textEditor = xss_clean(stripslashes(trim($this->input->post('editor1'))));
			if($textEditor == NULL || strrpos($textEditor,'Enter the text for job')){
				$textEditor = 'For further information please contact us or email us at <a href="mailto:mark@leerecruitment.co.nz"><strong>mark@leerecruitment.co.nz</strong></a>';
			}
			//DEFAULT VALUE END
			
			if(isset($_FILES['jobImage'])){
				$fileName = $_FILES['jobImage']['name'];
				$fileTmpName = $_FILES['jobImage']['tmp_name'];
				$fileSize = $_FILES['jobImage']['size'];
				$fileError = $_FILES['jobImage']['error'];

				$fileExt = explode(".",$fileName);
				$fileRealExt = strtolower(end($fileExt));
				$allowed = array('jpg','jpeg','png','gif');

				if(in_array($fileRealExt,$allowed)){
					if($fileError === 0){
						if($fileSize < 1000000){
							$fileNameNew = $paramJobID . $fileName;
							$fileDestination = constant('JOB_IMAGE_PATH') . $paramJobID. '/'. $fileNameNew;
							move_uploaded_file($fileTmpName,$fileDestination);
						} else {
							array_push($errMessage,'The file is too big');
						}
					} else {
						array_push($errMessage,'There was an error uploading the file');
					}
				} else {
					array_push($errMessage,'You cannot upload the file of this type');
				}
			}
			//4digitsYear-2digitsMonth-2digitsDay Format to match sql
			$publishDate = date('Y-m-d');
			//update the job
			$this->job_model->publishJob($paramJobID,$textEditor,$thumbnailText,$publishTitle,$publishDate,$fileNameNew);
			//select the job 
			//refresh the value
			// Find all the files under the job's folder
            $path = constant('JOB_IMAGE_PATH').$paramJobID.'/';
			$data['userFiles'] = directory_map($path);
			$data['job'] = $this->job_model->get_specificJob($paramJobID);
			$data['candidatesData'] = $this->candidate_model->getCandidatesJobDetails($paramJobID);
			$data['message'] = $errMessage;
			$this->load->view('templates/header',$userdata);
			$this->load->view('pages/jobDetails',$data);
			$this->load->view('templates/footer');
		} else {
			redirect('/');
		}
	}

	//called from: View->pages->jobdetails
	//unpublish the jobs, change status to either active is there is atleast 1 candidate or null if there is no candidate currently assigned to this job
	public function jobUnpublish($paramJobID){
		
		if($_SESSION['userType']=='admin' || $_SESSION['userType'] =='staff'){

			$userdata['userType'] = $_SESSION['userType'];
			$data['title'] = "Job Order Details";
			$status="";
			$data['candidatesData'] = $this->candidate_model->getCandidatesJobDetails($paramJobID);
			//update the jobstatus to active if it has a candidate assigned
			if(sizeof($data['candidatesData'])>0){
				$status = "active";
			}
			$this->job_model->unpublishJob($paramJobID,$status);
			//select the job 
			// Find all the files under the job's folder
            $path = constant('JOB_IMAGE_PATH').$paramJobID.'/';
			$data['userFiles'] = directory_map($path);
			$data['job'] = $this->job_model->get_specificJob($paramJobID);
			
			$this->load->view('templates/header',$userdata);
			$this->load->view('pages/jobDetails',$data);
			$this->load->view('templates/footer');
		} else {
			redirect('/');
		}

	}
	/**
	 * AJAX Methods for staff and Admin
	 */
	//called from: View->pages->jobdetails
	//update hours worked for specific candidate
	public function updateHoursWorked($candidateID){
		
		if($_SESSION['userType']=='admin' || $_SESSION['userType'] =='staff'){
			$candidateData = $this->candidate_model->getCandidateByID($candidateID);
			$hoursWorked = $_POST['hoursWorked'];
			//get difference in hours worked
			$diffhoursWorked = $hoursWorked - $candidateData['CandidateHoursWorked'];
			$currentEarnings = $candidateData['CandidateEarnings'];
			$jobRate = $candidateData['JobRate'];
			//calculation
			$currentEarnings = $diffhoursWorked * $jobRate + $currentEarnings; 
			$this->candidate_model->updateCandidateHoursWorking($candidateID,$hoursWorked,$currentEarnings);
			$candidateData = $this->candidate_model->getCandidateByID($candidateID);
			$workingHoursSaved = $_POST['workingHoursSaved'];
			$this->loadJobDetailsRow($candidateData,$workingHoursSaved);
		} else {
			redirect('/');
		}
	}

	//called from: this->removeAssignedCandidate()
	//AJAX
	//entire candidate table in View->pages->jobDetails page
	//only refreshed if the candidate is removed from the table
	public function loadJobDetailsTable($candidatesData){
		echo '<table class="table border-bottom border-dark"><thead>
        <tr>
		<th scope="col"></th>
		<th scope="col"></th>
        <th scope="col">Applicant_Name</th>
        <th scope="col">Contact_Number</th>
		<th scope="col">Email</th>
        <th scope="col">Address</th>
        <th scope="col">Job_Type</th>
        <th scope="col">Hours_worked</th>
        <th scope="col">JobRates</th>
		<th scope="col">Total_Earned</th>
        <th scope="col">Employee Notes</th>
        </tr>
		</thead><tbody class="align-items-center">';
		foreach ($candidatesData as $candidateData){
		$savedHoursWorked[$candidateData['CandidateID']] = $candidateData['CandidateHoursWorked'];
		echo '<form>';
		$this->loadJobDetailsRow($candidateData,$savedHoursWorked[$candidateData['CandidateID']]);
        echo '</form>';
		}
		echo '</tbody>
		</table>';
	}

	//AJAX
	//called from: this->updateHoursWorked(), this->updateJobRate(), this->updateCandidateNotes(), this->resetCandidateData()
	//the row in View->Pages->jobDetails refreshed if there is an update in hoursworked,jobRate or candidateNotes
	public function loadJobDetailsRow($candidateData,$savedHoursWorked){
		echo '<th><div class="textInfoPos"><span class="textInfo">Remove Candidate</span><a onclick="removeAssignedCandidate(' .  $candidateData['CandidateID'] . ')" class="text-danger"><i style="font-size:25px" class="icon ion-md-close-circle"></i> </a></div></th>';
		echo '<td><div class="textInfoPos"><span class="textInfo font-weight-bold" style="left:-50px;">Reset Data to 0</span><a onclick="resetCandidateData(' . $candidateData['CandidateID'] .',' . $savedHoursWorked . ')" class="text-secondary" ><i style="font-size:25px" class="icon ion-md-trash"></i></a></div></td>';
		echo '<td>' . $candidateData['FirstName'] . ' ' . $candidateData['LastName'] . '</td>';
        echo '<td>' . $candidateData['PhoneNumber'] . '</td>';
        echo '<td>' . $candidateData['Email'] . '</td>';
		echo '<td>' . $candidateData['Address'] . '</td>';
        echo '<td>' . $candidateData['JobType'] . '</td>';
		echo '<td><input onclick="targetThisBox(\'hoursWorked' .  $candidateData['CandidateID'] . '\')" type="text" id="hoursWorked' . $candidateData['CandidateID'] . '" onchange="updateHoursWorked(' . $candidateData['CandidateID'] .',' . $savedHoursWorked . ')" placeholder="' . $candidateData['CandidateHoursWorked'] . '"></td>';
		echo '<td><input onclick="targetThisBox(\'jobRate' .  $candidateData['CandidateID'] . '\')" type="text" id="jobRate' . $candidateData['CandidateID'] . '" onchange="updateJobRate(' . $candidateData['CandidateID'] .',' . $savedHoursWorked . ')" placeholder="' . $candidateData['JobRate'] .'"></td>';
		echo '<td><input type="text" class="border-0" id="candidateEarnings' . $candidateData['CandidateID'] . '" value="' . $candidateData['CandidateEarnings'] . '"></td>';
		echo '<td><input onclick="targetThisBox(\'candidateNotes' .  $candidateData['CandidateID'] . '\')" type="text" id="candidateNotes' . $candidateData['CandidateID'] . '" onchange="updateCandidateNotes(' . $candidateData['CandidateID'] . ',' . $savedHoursWorked . ')" placeholder="' . $candidateData['CandidateNotes'] . '"></td></tr>';
	}

	//called from view->pages->manageCandidate, view->pages->candidateDetails
	//assign the candidate to this job
	public function assignCandidate($candidateID,$jobID){
		if($_SESSION['userType']=='admin' || $_SESSION['userType'] =='staff'){

			$this->candidate_model->assignCandidateJobID($candidateID,$jobID);
			$userdata['userType'] = $_SESSION['userType'];
			$data['title'] = "Job Order Details";
			$this->job_model->updateJobStatusToActive($jobID);
			$data['job'] = $this->job_model->get_specificJob($jobID);
			$data['candidatesData'] = $this->candidate_model->getCandidatesJobDetails($jobID);
			
			// Find all the files under the job's folder
            $path = constant('JOB_IMAGE_PATH').$jobID.'/';
			$data['userFiles'] = directory_map($path);

			$this->load->view('templates/header',$userdata);
			$this->load->view('pages/jobDetails',$data);
			$this->load->view('templates/footer');
			
		} else {
			redirect('/');
		}
	}

	//Called from: View->Pages->jobDetails
	//AJAX method
	//removing the JobID from the candidate so it wont appear in the table in job details anymore
	public function removeAssignedCandidate($candidateID,$jobID){
		if($_SESSION['userType']=='admin' || $_SESSION['userType'] =='staff'){

			$this->candidate_model->removeAssignedCandidate($candidateID);
			//refresh it
			$candidatesData = $this->candidate_model->getCandidatesJobDetails($jobID);
			
			//if there are no more candidate in the jobDetails table after the removal of candidate set jobStatus of the job to null/NoAction
			if(sizeof($candidatesData)==0){
				$this->job_model->updateJobDetailsStatusNull($jobID);
			}
			$this->loadJobDetailsTable($candidatesData);
		} else {
			redirect('/');
		}
	}

	//called from: view->pages->jobDetails
	//AJAX method
	//update the jobRate of the candidate
	public function updateJobRate($candidateID){
		if($_SESSION['userType']=='admin' || $_SESSION['userType'] =='staff'){
			//get the previous value
			$candidateData = $this->candidate_model->getCandidateByID($candidateID);

			$jobRate = $_POST['jobRate'];
			$workingHoursSaved = $_POST['workingHoursSaved'];
			//calculate it normally if it starts from 0, after that keep the data
			if(empty($workingHoursSaved) || $candidateData['JobRate'] == 0){
				$candidateEarnings = $jobRate * $candidateData['CandidateHoursWorked'];
				$this->candidate_model->updateCandidateHoursWorking($candidateID,$candidateData['CandidateHoursWorked'],$candidateEarnings);
			}
			$this->candidate_model->updateJobRate($candidateID,$jobRate);
			$candidateData = $this->candidate_model->getCandidateByID($candidateID);
			$workingHoursSaved = $_POST['workingHoursSaved'];
			$this->loadJobDetailsRow($candidateData,$workingHoursSaved);
		} else {
			redirect('/');
		}
	}

	//AJAX method
	//called from: view->pages->jobDetails
	//update the notes for specific candidate
	public function updateCandidateNotes($candidateID,$page){
		if($_SESSION['userType']=='admin' || $_SESSION['userType'] =='staff'){
			$candidateNotes = $_POST['candidateNotes'];
			$this->candidate_model->updateCandidateNotes($candidateID,$candidateNotes);

			if($page=="jobDetails"){
			$candidateData = $this->candidate_model->getCandidateByID($candidateID);
			$workingHoursSaved = $_POST['workingHoursSaved'];
			$this->loadJobDetailsRow($candidateData,$workingHoursSaved);
			} else {
				echo 'Wrong Answer!';
			}
		} else {
			redirect('/');
		}
	}

	//Called from: view->pages->JobDetails
	//AJAX Method
	//set the value of jobRates, hoursworked and candidateEarnings to 0
	public function resetCandidateData($candidateID){
		if($_SESSION['userType']=='admin' || $_SESSION['userType'] =='staff'){

			$this->candidate_model->resetCandidateJobDetailsData($candidateID);
			$candidateData = $this->candidate_model->getCandidateByID($candidateID);
			$workingHoursSaved = $_POST['workingHoursSaved'];
		
			$this->loadJobDetailsRow($candidateData,$workingHoursSaved);
		} else {
			redirect('/');
		}
	}

	//called from: view->pages->jobs
	//get detailed information that is accessible by everyone , when the job is published
	public function jobInfo($jobID){
		if($_SESSION['userType']=='admin' || $_SESSION['userType'] =='staff'){

			$data['job'] = $this->job_model->get_specificJobInfo($jobID);
			
			$userdata['userType'] = $_SESSION['userType'];
			$this->load->view('templates/header',$userdata);
			$this->load->view('pages/jobInfo',$data);
			$this->load->view('templates/footer');
		} else {
			redirect('/');
		}
	}

	//called from: view->pages->manageClient
	//AJAX Method
	//update the bookmark status so the USERS:staff and admin can either sort or filter and find the job easily
	//for monitoring purposes
	public function updateBookmark($jobID){
		if($_SESSION['userType']=='admin' || $_SESSION['userType'] =='staff'){

			$bookmarkValue = $_POST['bookmarkValue'];
			
			$this->job_model->updateBookmarkStatus($jobID,$bookmarkValue);
		} else {
			redirect('/');
		}
	}

	//called from: view->pages->manageClient
	//filter function for the job that are not in archive(status is not completed)
	public function applyFilterActiveJob(){
        if($_SESSION['userType']=='admin' || $_SESSION['userType'] =='staff'){

            $data['title'] = "Manage Client";
            $company = $_POST['companyName'];
            $city = $_POST['cityName'];
            // $jobTitle = $_POST['jobTitleName'];
            // $contactNumber = $_POST['contactNumberName'];
            $contactPerson = $_POST['contactPersonName'];
			// $jobStatus = $_POST['jobStatus'];
			$page = "manageClient";
            $data['jobs'] = $this->job_model->applyFilterJob($page,$company,$city,$jobTitle="",$contactNumber="",$contactPerson,$jobStatus="");
			$bookmarkStat= "";
			//add 3 more field ref,bookmarkStat,bookmarkUrl
            for($i=0;$i<sizeof($data['jobs']);$i++){
                $ref = base_url() . 'index.php/Jobs/jobDetails/' . $data['jobs'][$i]['JobID'];
                if($data['jobs'][$i]['Bookmark']=="true"){ $bookmarkStat=true;} else {$bookmarkStat=false;};
                $bookmarkUrl= "Bookmark". $data['jobs'][$i]['JobID'];
                
                $data['jobs'][$i]['ref'] = $ref;
                $data['jobs'][$i]['bookmarkStat'] = $bookmarkStat;
                $data['jobs'][$i]['bookmarkUrl'] = $bookmarkUrl;
            }

            echo json_encode($data['jobs']);
            
        } else {
            redirect('/');
        }
	}
	
	//called from: View->pages->manageClient
	//look for bookmarked job;
	public function applyFilterBookmark(){
		if($_SESSION['userType']=='admin' || $_SESSION['userType'] =='staff'){

            $data['title'] = "Manage Client";
            $bookmark = $_POST['bookmark'];
			$page = "manageClient";
            $data['jobs'] = $this->job_model->applyFilterBookmark($bookmark);
			$bookmarkStat= "";
			//add 3 more field ref,bookmarkStat,bookmarkUrl
            for($i=0;$i<sizeof($data['jobs']);$i++){
                $ref = base_url() . 'index.php/Jobs/jobDetails/' . $data['jobs'][$i]['JobID'];
                if($data['jobs'][$i]['Bookmark']=="true"){ $bookmarkStat=true;} else {$bookmarkStat=false;};
                $bookmarkUrl= "Bookmark". $data['jobs'][$i]['JobID'];
                
                $data['jobs'][$i]['ref'] = $ref;
                $data['jobs'][$i]['bookmarkStat'] = $bookmarkStat;
                $data['jobs'][$i]['bookmarkUrl'] = $bookmarkUrl;
            }

            echo json_encode($data['jobs']);
            
        } else {
            redirect('/');
        }
	}

	//called from: view->applicant->vue
    //calling the model of candidate and updating the candidateStatus of candidate to removed so it wont appear in the candidate table anymore
    public function removeJobApplication(){
        $jobID = $_POST['jobID'];
        
        $this->job_model->updateJobStatusToComplete($jobID);
	}
	
	// upload other files by Admin or Staff
    public function uploadFiles(){
        if($_SESSION['userType']!='admin' && $_SESSION['userType'] !='staff'){
          
        }
		$jobID = $this->input->post('jobID');
		$path = constant('JOB_IMAGE_PATH').$jobID.'/';
        $config['upload_path'] = $path;

        $config['allowed_types'] = 'jpg|jpeg|png|pdf|doc|docx|zip|7z';
        $config['max_size'] = 30000;
        $config['max_width'] = 0;
		$config['max_height'] = 0;
		$config['file_ext_tolower'] = TRUE;
		$config['remove_spaces'] = TRUE;

        if ($this->security->xss_clean($_FILES, TRUE) === FALSE)
        {
        } else {
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('userFile')) {

            } else {
				$data['userFiles'] = directory_map($path);
				
				echo json_encode($data['userFiles']);
            }
		}
	}
	
	
	// download file
	public function downloadFile($jobID, $fileName){
        if($_SESSION['userType']=='admin' || $_SESSION['userType'] =='staff'){

            $path = constant('JOB_IMAGE_PATH').$jobID.'/'.$fileName;
            
            force_download($path, NULL);
        } else {
            redirect('/');
        }
	}
	
	//remove File
	public function removeFile(){
		if($_SESSION['userType']=='admin' || $_SESSION['userType'] =='staff'){
			$jobID = $_POST['jobID'];
			$fileName = $_POST['userFile'];
			$path = constant('JOB_IMAGE_PATH').$jobID.'/';
			//let's not use this. it's dangerous as heck
			//unlink($path.$fileName);
			rename($path.$fileName,constant('JOB_IMAGE_PATH').'del/'.$jobID.$fileName);
			$data['userFiles'] = directory_map($path);
			echo json_encode($data['userFiles']);
        } else {
            redirect('/');
        }
	}
}
