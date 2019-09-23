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
	public function manageClient($page="",$candidateID=""){
		if($_SESSION['userType']=='admin' || $_SESSION['userType'] =='staff'){
			$userdata['userType'] = $_SESSION['userType'];
			$userID = $_SESSION['userID'];
			//update visited time
			$data['lastVisitClient'] = $_SESSION['visitedClient'];

			$this->job_model->updateVisitedManageClient($userID);
            date_default_timezone_set('NZ');
			$_SESSION['visitedClient'] = date('Y-m-d H:i:s');
			//end visit time
			
			//if it loads from candidatedetails page, get the candidate data and the job
			if(!empty($candidateID)){
				$data['candidateData'] = $this->candidate_model->getCandidateByID($candidateID);
				
				$data['jobs'] = $this->job_model->get_filterjobs($data['candidateData']['City'],$data['candidateData']['JobInterest'],0,$data['candidateData']['JobInterest2']);
				$data['activeJobNum'] = sizeof($data['jobs']);
			} else {
				$data['jobs'] = $this->job_model->get_jobs();
				$data['candidateData'] = array();
				$data['activeJobNum'] = $this->job_model->countAllActiveJob();
			}

			$data['title'] = "Manage Client";
			$data['message'] ="";
	
			//adding 1 more field into jobs ref
            for($i=0;$i<sizeof($data['jobs']);$i++){
                $ref = base_url() . 'index.php/Jobs/jobDetails/' . $data['jobs'][$i]['JobID'] . '/' . $candidateID;

				
				//update the value of jobstatus if it's null "" or 0, to NoAction
                if(empty($data['jobs'][$i]['JobStatus'])){ $data['jobs'][$i]['JobStatus']="NoAction"; }
                $data['jobs'][$i]['ref'] = $ref;
         
			}
			
			$data['fromPage'] = $page; 
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
			$candidateID = "";
			if(isset($_POST['candidateID'])){
				$candidateID = $_POST['candidateID'];
				$data['candidateData'] = $this->candidate_model->getCandidateByID($candidateID);
				$jobsResult = $this->job_model->get_filterjobs($data['candidateData']['City'],$data['candidateData']['JobInterest'],$offset,$data['candidateData']['JobInterest2']);
			} else {
				$page="";
				$jobsResult = $this->job_model->get_jobs($page,$offset);
			}
			//adding 1 more extra field ref
            for($i=0;$i<sizeof($jobsResult);$i++){
                $ref = base_url() . 'index.php/Jobs/jobDetails/' . $jobsResult[$i]['JobID'];
         
			
				//if jobStatus is null, "" or 0 , return the string of NoAction as the value in jobstatus for specific job
                if(empty($jobsResult[$i]['JobStatus'])){ $jobsResult[$i]['JobStatus']="NoAction"; }
                $jobsResult[$i]['ref'] = $ref;
              
            }

            echo json_encode($jobsResult);
        } else {
            redirect('/');
        }
	}

	//called from: View->page->manageClient
	//detailed information of the job
	public function jobDetails($paramJobID,$candidateDataID = ""){
		
		if($_SESSION['userType']=='admin' || $_SESSION['userType'] =='staff'){
			
			$userdata['userType'] = $_SESSION['userType'];
			$data['title'] = "Job Order Details";
			//get all info
			$data['job'] = $this->job_model->get_specificJob($paramJobID);
			
			// Find all the files under the job's folder
            $path = constant('JOB_FILES').$paramJobID.'/';
			$data['userFiles'] = directory_map($path);
			$data['candidateIDFromPage'] = $candidateDataID;
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
			$publishTitle = xss_clean(strip_tags(stripslashes(trim($this->input->post('publishTitle')))));
			//if the published post info is empty change it to this default value
			//DEFAULT VALUE START
			if($publishTitle == NULL) {
				$publishTitle = $job['JobType'] . ' ' . $job['JobTitle'] . ' worker needed in ' . $job['City'];
			}
			$thumbnailText = xss_clean(strip_tags(stripslashes(trim($this->input->post('thumbnailText')))));
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
						if($fileSize < 10000000){
							$fileNameNew = $paramJobID . $fileName;
							$fileDestination = constant('JOB_IMAGE_PATH') . $fileNameNew;
							move_uploaded_file($fileTmpName,$fileDestination);
						} else {
							// array_push($errMessage,'The file is too big');
							// echo 'the file is too big';
						}
					} else {
						// array_push($errMessage,'There was an error uploading the file');
						// echo 'error uploading file';
						// echo $fileError;
					}
				} else {
					// array_push($errMessage,'You cannot upload the file of this type');
					// echo 'type error';
				}
			}
			//4digitsYear-2digitsMonth-2digitsDay Format to match sql
			$publishDate = date('Y-m-d');
			//update the 
			
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

	//called from: View->pages->jobDetails
	//update the data of jobs
	public function updateJobData(){
		if($_SESSION['userType']=='admin' || $_SESSION['userType'] =='staff'){
			
			$jobID = $_POST['jobID'];
			$data['ClientTitle'] = $_POST['clientTitle'];
			$data['ClientName'] = $_POST['clientName'];
			$data['Company'] = $_POST['company'];
			$data['Email'] = $_POST['email'];
			$data['ContactNumber'] = $_POST['contactNumber'];
			$data['JobTitle'] = $_POST['jobTitle'];
			$data['JobType'] = $_POST['jobType'];
			$data['Address'] = $_POST['address'];
			$data['City'] = $_POST['city'];
			$data['Suburb'] = $_POST['suburb'];
			$data['Description'] = $_POST['description'];
			
			$this->job_model->updateJobData($jobID,$data);
			//update time
			$this->job_model->updateTimeChanged($jobID);
			
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
	public function updateHoursWorked(){
		
		if($_SESSION['userType']=='admin' || $_SESSION['userType'] =='staff'){
			
			$candidateID = $_POST['candidateID'];
			$hoursWorked = $_POST['hoursWorked'];
			$jobID = $_POST['jobID'];

			$candidateData = $this->candidate_model->getCandidateByID($candidateID);
			
			//get difference in hours worked
			$diffhoursWorked = $hoursWorked - $candidateData['CandidateHoursWorked'];
			$currentEarnings = $candidateData['CandidateEarnings'];
			$jobRate = $candidateData['JobRate'];
			//calculation
			$currentEarnings = $diffhoursWorked * $jobRate + $currentEarnings; 
			$this->candidate_model->updateCandidateHoursWorking($candidateID,$hoursWorked,$currentEarnings);
			
			//update time
			$this->job_model->updateTimeChanged($jobID);

			$candidatesData = $this->candidate_model->getCandidatesJobDetails($jobID);

			echo json_encode($candidatesData);
			
		} else {
			redirect('/');
		}
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
	public function removeAssignedCandidate(){
		if($_SESSION['userType']=='admin' || $_SESSION['userType'] =='staff'){
			$candidateID = $_POST['candidateID'];
			$jobID = $_POST['jobID'];
			$this->candidate_model->removeAssignedCandidate($candidateID);
			//refresh it
			$candidatesData = $this->candidate_model->getCandidatesJobDetails($jobID);
			
			//update time
			$this->job_model->updateTimeChanged($jobID);

			//if there are no more candidate in the jobDetails table after the removal of candidate set jobStatus of the job to null/NoAction
			if(sizeof($candidatesData)==0){
				$this->job_model->updateJobDetailsStatusNull($jobID);
			}
			// $this->loadJobDetailsTable($candidatesData);
			echo json_encode($candidatesData);
		} else {
			redirect('/');
		}
	}

	//called from: view->pages->jobDetails
	//AJAX method
	//update the jobRate of the candidate
	public function updateJobRate(){
		if($_SESSION['userType']=='admin' || $_SESSION['userType'] =='staff'){
			$candidateID = $_POST['candidateID'];
			$jobRate = $_POST['jobRate'];
			$jobID = $_POST['jobID'];
			$workingHoursSaved = $_POST['workingHoursSaved'];

			//get the current value
			$candidateData = $this->candidate_model->getCandidateByID($candidateID);
			
			//calculate it normally if it starts from 0, after that keep the data
			if(empty($workingHoursSaved) || $candidateData['JobRate'] == 0){
				$candidateEarnings = $jobRate * $candidateData['CandidateHoursWorked'];
				$this->candidate_model->updateCandidateHoursWorking($candidateID,$candidateData['CandidateHoursWorked'],$candidateEarnings);
			}
			$this->candidate_model->updateJobRate($candidateID,$jobRate);
			
			//update time
			$this->job_model->updateTimeChanged($jobID);

			$candidatesData = $this->candidate_model->getCandidatesJobDetails($jobID);
			echo json_encode($candidatesData);
		} else {
			redirect('/');
		}
	}

	//AJAX method
	//called from: view->pages->jobDetails
	//update the notes for specific candidate
	public function updateCandidateNotes(){
		if($_SESSION['userType']=='admin' || $_SESSION['userType'] =='staff'){
			$candidateID = $_POST['candidateID'];
			$candidateNotes = $_POST['candidateNotes'];
			if(isset($_POST['jobID'])){

				$jobID = $_POST['jobID'];
				//update time
				$this->job_model->updateTimeChanged($jobID);
				//get the updated field from database
				$candidatesData = $this->candidate_model->getCandidatesJobDetails($jobID);
			} else {
				$offset = $_POST['offset'];
				$candidatesData = $this->candidate_model->getCandidatesWithName(10, $offset);
			}
			$this->candidate_model->updateCandidateNotes($candidateID,$candidateNotes);
			
			
			
			$this->candidate_model->updateTimeChanged($candidateID);

			
			
			echo json_encode($candidatesData);
			
		} else {
			redirect('/');
		}
	}

	//Called from: view->pages->JobDetails
	//AJAX Method
	//set the value of jobRates, hoursworked and candidateEarnings to 0
	public function resetCandidateData(){
		if($_SESSION['userType']=='admin' || $_SESSION['userType'] =='staff'){
			$candidateID = $_POST['candidateID'];
			$jobID = $_POST['jobID'];
			$this->candidate_model->resetCandidateJobDetailsData($candidateID);
			
			//update time
			$this->job_model->updateTimeChanged($jobID);

			$candidatesData = $this->candidate_model->getCandidatesJobDetails($jobID);
			echo json_encode($candidatesData);

		} else {
			redirect('/');
		}
	}

	//Called from: view->pages->JobDetails
	//AJAX Method
	//set the value of jobRates, hoursworked and candidateEarnings to previous state
	public function undoCandidateData(){
		if($_SESSION['userType']=='admin' || $_SESSION['userType'] =='staff'){
			$candidateID = $_POST['candidateID'];
			$jobID = $_POST['jobID'];
			$candidateHoursWorked = $_POST['hoursWorked'];
			$jobRate = $_POST['jobRate'];
			$candidateEarnings = $_POST['candidateEarnings'];
			
			$this->candidate_model->undoCandidateJobDetailsData($candidateID,$candidateHoursWorked,$jobRate,$candidateEarnings);
			
			//update time
			$this->job_model->updateTimeChanged($jobID);

			$candidatesData = $this->candidate_model->getCandidatesJobDetails($jobID);
			echo json_encode($candidatesData);

		} else {
			redirect('/');
		}
	}

	//called from: view->pages->jobs
	//get detailed information that is accessible by everyone , when the job is published
	public function jobInfo($jobID){
		

			$data['job'] = $this->job_model->get_specificJobInfo($jobID);
			if(!isset($_SESSION['userType'])) { 
				$userdata['userType'] = 'anyone';
			} else {
			$userdata['userType'] = $_SESSION['userType'];
			}
			$this->load->view('templates/header',$userdata);
			$this->load->view('pages/jobInfo',$data);
			$this->load->view('templates/footer');
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
			$candidateID = "";
			if(!empty($_POST['candidateID'])){
				$candidateID = $_POST['candidateID'];
			}
            $contactPerson = $_POST['contactPersonName'];
			// $jobStatus = $_POST['jobStatus'];
			$page = "manageClient";
            $data['jobs'] = $this->job_model->applyFilterJob($page,$company,$city,$jobTitle="",$contactNumber="",$contactPerson,$jobStatus="");
	
			//add 1 more field ref
            for($i=0;$i<sizeof($data['jobs']);$i++){
                $ref = base_url() . 'index.php/Jobs/jobDetails/' . $data['jobs'][$i]['JobID'] . '/' . $candidateID;
                $data['jobs'][$i]['ref'] = $ref;
            }

            echo json_encode($data['jobs']);
            
        } else {
            redirect('/');
        }
	}
	
	

	//called from: view->manageClient
	//change the status of job to completed, so it wont appear in manage order page
	public function removeJobApplication(){
		if($_SESSION['userType']=='admin' || $_SESSION['userType'] =='staff'){
        $jobID = $_POST['jobID'];
		$this->job_model->updateJobStatusToComplete($jobID);
		} else {
			redirect('/');
		}
	}
	
	//called from: view->jobDetails
	// upload other files by Admin or Staff
    public function uploadFiles(){
        if($_SESSION['userType']=='admin' || $_SESSION['userType'] =='staff'){
        
		$jobID = $this->input->post('jobID');
		$path = constant('JOB_FILES').$jobID.'/';
        $config['upload_path'] = $path;

        $config['allowed_types'] = 'jpg|jpeg|png|pdf|doc|docx|zip|7z|txt';
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
			//	echo 'Failure in uploading files, unallowed extension or file too big.';
				
            } else {
				$data['userFiles'] = directory_map($path);
				
				echo json_encode($data['userFiles']);
            }
		}
		  
		} else { redirect('/');}
	}
	
	
	// download file
	public function downloadFile($jobID, $fileName){
        if($_SESSION['userType']=='admin' || $_SESSION['userType'] =='staff'){

            $path = constant('JOB_FILES').$jobID.'/'.$fileName;
            
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
			$path = constant('JOB_FILES').$jobID.'/';
			//let's not use this. it's dangerous as heck
			//unlink($path.$fileName);
			rename($path.$fileName,constant('JOB_FILES').'del/'.$jobID.$fileName);
			$data['userFiles'] = directory_map($path);
			echo json_encode($data['userFiles']);
        } else {
            redirect('/');
        }
	}

	//update TOB download
	public function updateTOBfile(){
		if($_SESSION['userType']=='admin' || $_SESSION['userType'] =='staff'){
			$jobID = $_POST['jobID'];
			$TOBfile = $_POST['TOBfile'];
			$this->job_model->updateTOBLink($jobID,$TOBfile);
        } else {
            redirect('/');
        }
	}

	//download TOB
	public function downloadTOB($jobID,$fileName){
		if($_SESSION['userType']=='admin' || $_SESSION['userType'] =='staff'){
			if(empty($fileName) || $fileName == 'null' || $fileName == 'Open%20this%20select%20menu'){
                echo 'TOB doesn\'t exists';
            }
         
            $path = constant('JOB_FILES').$jobID .'/'.$fileName;
            
            force_download($path, NULL);
        } else {
            redirect('/');
        }
	}

	//set job status back to noaction / null
	public function retrieveJob($paramJobID){
		if($_SESSION['userType']=='admin' || $_SESSION['userType'] =='staff'){
			$userdata['userType'] = $_SESSION['userType'];
			$data['title'] = "Job Order Details";
			$status="";
			$data['candidatesData'] = $this->candidate_model->getCandidatesJobDetails($paramJobID);
			
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
}
