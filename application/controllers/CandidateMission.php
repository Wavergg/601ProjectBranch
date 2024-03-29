<?php

class CandidateMission extends CI_Controller{
    function __construct() {
		parent::__construct();
		
		// Load url helper
		$this->load->helper('url');
        $this->load->helper('security');
        $this->load->helper('download');
        $this->load->helper('directory');

        $this->load->library('session');
        // Load Model
        $this->load->model('candidate_model');
        $this->load->model('city_model');
        $this->load->model('register_model');
        $this->load->model('job_model');
        $this->load->model('user_model');
    }
    
    //loading the page of candidateMission together with the form for candidate to register their application into lee recruitment
    public function index($param = '',$jobID=''){
        //get active tabs
        if($param == 'active'){ $active1='';$active2='active';}
        else {$active1='active';$active2='';}
        $data['active1'] = $active1;
        $data['active2'] = $active2;
      
        $userdata['userType'] = 'anyone';
        if(isset($_SESSION['userEmail'])){
            $userdata['userEmail'] = $_SESSION['userEmail'];
			$userdata['userType'] = $_SESSION['userType'];
        }
        $data['job'] = array();
        if(!empty($jobID)){
           $data['job'] = $this->job_model->get_specificJobInfo($jobID);
        }
        //load the list of citizenship from database, to fill into the select option in form
        $data['citizenships'] = $this->candidate_model->get_citizenships();
        $data['cities'] = $this->city_model->get_cities();
        
        $this->load->view('templates/header', $userdata);
        $this->load->view('pages/candidatesMission', $data, $userdata);
        $this->load->view('templates/footer');
    }

    // from view->personcenter->adminPanel or view->personcenter->staffPanel
    // or from view->pages->jobDetails
    // show the list of candidate that have registered their application in the form of table
	public function manageCandidate($page="",$jobID= ""){
        if($_SESSION['userType']=='admin' || $_SESSION['userType'] =='staff'){
            $userID = $_SESSION['userID'];
            $data['lastVisitCandidate'] = $_SESSION['visitedCandidate'];
            
            $this->candidate_model->updateVisitedManageCandidate($userID);
            date_default_timezone_set('NZ');
            $_SESSION['visitedCandidate'] = date('Y-m-d H:i:s');
          
            $userdata['userType'] = $_SESSION['userType'];
            $data['title'] = "Manage Candidate";
            $data['message'] ="";
            
            $data['job'] = array (
                'JobType' => "",
                'City' => "",
                'JobTitle' => "",
            );
            if(!empty($jobID)){
                //this is used to match the candidate with the specific job
                $data['job'] = $this->job_model->get_specificJob($jobID);
            }
            $data['jobID'] = $jobID;
            //count the total number of candidate, so a page number could be made // extra parameters are for, when the staff or admin would like to assign a candidate into the job
            $data['candidateNum'] = $this->candidate_model->countAll($page,$data['job']['City'],$data['job']['JobType'],$data['job']['JobTitle']);
            
            // $data['candidateNum'] = 30;
            //when loaded limit the records to be first 10 records // extra parameters are for, when the staff or admin would like to assign a candidate into the job
            //matches the cityLocation,JobInterest/JobTitle, and jobType
            $data['candidates'] = $this->candidate_model->getCandidatesWithName(10, 0,$page,$data['job']['City'],$data['job']['JobType'],$data['job']['JobTitle']);
            
            $data['fromPage'] = $page; 
            $this->load->view('templates/header',$userdata);
            $this->load->view('pages/manageCandidate',$data);
            $this->load->view('templates/footer');
        } else {
            redirect('/');
        }
		
    }

    // function to download files that are submitted by candidate
    // accessible from view->pages->candidateDetails || view->pages->manageCandidate
    public function downloadFile($candidateID, $fileName){
        if($_SESSION['userType']=='admin' || $_SESSION['userType'] =='staff'){
            
            
            if(empty($fileName) || $fileName == 'null' || $fileName == 'Open%20this%20select%20menu'){
                echo 'File doesn\'t exists';
            }
            $path = constant('CV_PATH').$candidateID.'/'.$fileName;
            
            force_download($path, NULL);
        } else {
            redirect('/');
        }
    }
    
    /**
     * AJAX Methods
     */
    // function that is called when the user click on the next page in manageCandidate
    // get a offset value then return candidates loads the next 10 records 
    // AJAX returns it with json format that are replacing the value of candidate variable in vue
    public function getCandidates($page=""){
        
        if($_SESSION['userType']=='admin' || $_SESSION['userType'] =='staff'){
            $offset = $_POST['offset'];
            $jobInterest = $_POST['jobInterest'];
            $city = $_POST['city'];
            $firstName = $_POST['firstName'];
            $lastName = $_POST['lastName'];
            
            $data['candidates'] = $this->candidate_model->getCandidatesWithName(10, $offset,$page,$city,$jobType="",$jobInterest,$firstName,$lastName,$suburb="",$phoneNumber="",$email="");
            echo json_encode($data['candidates']);
        } else {
            redirect('/');
        }
    }

    //function that are accessible by clicking on filter button in view->pages->manageCandidate
    //AJAX returns it with json format that are replacing the value of candidate variable in vue 
    public function applyFilterCandidate($page=""){
        if($_SESSION['userType']=='admin' || $_SESSION['userType'] =='staff'){
        
            $jobInterest = $_POST['jobInterest'];
            $city = $_POST['city'];
            $firstName = $_POST['firstName'];
            $lastName = $_POST['lastName'];
            // $suburb = $_POST['suburb'];
            // $email = $_POST['email'];
            // $phoneNumber = $_POST['phoneNumber'];
            // $jobType = $_POST['jobType'];
            
            $data['candidates'] = $this->candidate_model->getFilterCandidate($page,$city,$jobType="",$jobInterest,$firstName,$lastName,$suburb="",$phoneNumber="",$email="");
            echo json_encode($data['candidates']);
        
        } else {
            redirect('/');
        }
    }

    //a function that used to register a candidate that would like to apply their application into lee recruitment
    //called by ajax in CandidateMission->index and CandidateMission->addingNewCandidateStaffOnly
    //inserting the data into database table of candidate: candidate_model->applyJob($data);
    public function applyJob(){

            // Staff and Mark Lee won't apply a job for themselves
            // So this means it comes from the staff only page
            // So there are three more things: firstName and lastName
           
            $firstName = $this->security->xss_clean(stripslashes(trim($this->input->post('firstName'))));
            $lastName = $this->security->xss_clean(stripslashes(trim($this->input->post('lastName'))));

            $candidateNotes = "";
            if(isset($_POST['candidateNotes'])){
                $candidateNotes = $_POST['candidateNotes'];
            }
            //get the userID last records that are inserted into database
            $userData = $this->candidate_model->getUserByData($firstName,$lastName);
        if(!empty($userData)){
            $userID = $userData['UserID'];
        
            //KVP K:FieldName in database V:Post value
           
            $data = array(
            'JobInterest' => $this->filterGeneral($this->input->post('JobInterest')),
            'JobInterest2' => $this->filterGeneral($this->input->post('JobInterest2')),
            'JobType' => $this->filterJobType($this->input->post('JobType')),
            'Transportation' => $this->filterGeneral($this->input->post('Transportation')),
            'LicenseNumber' => $this->filterGeneral($this->input->post('LicenseNumber')),
            'ClassLicense' => $this->filterGeneral($this->input->post('ClassLicense')),
            'Endorsement' => $this->filterGeneral($this->input->post('Endorsement')),
            'Citizenship' => $this->filterGeneral($this->input->post('Citizenship')),
            'Nationality' => $this->filterGeneral($this->input->post('Nationality')),
            'PassportCountry' => $this->filterGeneral($this->input->post('PassportCountry')),
            'PassportNumber' => $this->filterGeneral($this->input->post('PassportNumber')),
            'WorkPermitNumber' => $this->filterGeneral($this->input->post('WorkPermitNumber')),
            'WorkPermitExpiry' => $this->filterDate($this->input->post('WorkPermitExpiry')),
            'CompensationInjury' => $this->filterCompensationInjury($this->input->post('CompensationInjury')),
            'CompensationDateFrom' => $this->filterDate($this->input->post('CompensationDateFrom')),
            'CompensationDateTo' => $this->filterDate($this->input->post('CompensationDateTo')),

            'Asthma' => $this->checkBoxFilter($this->input->post('Asthma')),
            'BlackOut' => $this->checkBoxFilter($this->input->post('BlackOut')),
            'Diabetes' => $this->checkBoxFilter($this->input->post('Diabetes')),
            'Bronchitis' => $this->checkBoxFilter($this->input->post('Bronchitis')),
            'BackInjury' => $this->checkBoxFilter($this->input->post('BackInjury')),
            'Deafness' => $this->checkBoxFilter($this->input->post('Deafness')),
            'Dermatitis' => $this->checkBoxFilter($this->input->post('Dermatitis')),
            'SkinInfection' => $this->checkBoxFilter($this->input->post('SkinInfection')),
            'Allergies' => $this->checkBoxFilter($this->input->post('Allergies')),
            'Hernia' => $this->checkBoxFilter($this->input->post('Hernia')),
            'HighBloodPressure' => $this->checkBoxFilter($this->input->post('HighBloodPressure')),
            'HeartProblems' => $this->checkBoxFilter($this->input->post('HeartProblems')),
            'UsingDrugs' => $this->checkBoxFilter($this->input->post('UsingDrugs')),
            'UsingContactLenses' => $this->checkBoxFilter($this->input->post('UsingContactLenses')),
            'RSI' => $this->checkBoxFilter($this->input->post('RSI')),
            'Dependants' => $this->checkBoxFilter($this->input->post('Dependants')),
            'Smoke' => $this->checkBoxFilter($this->input->post('Smoke')),
            'Conviction' => $this->checkBoxFilter($this->input->post('Conviction')),

            'ConvictionDetails' => $this->filterTextArea($this->input->post('ConvictionDetails')),
            'UserID' => $userID,
            'CandidateNotes' => $candidateNotes,
            );
            //send the array into the model, this model will insert the data into candidate table
            $this->candidate_model->applyJob($data);
            //empty the array
            $data = array();
            $candidate = $this->candidate_model->getMaxIDByUserID($userID);
            
            $path = constant('CV_PATH').$candidate['MaxID'].'/';
            $uploadCVErrorStatus = false;
            // create the folder
            mkdir($path);
            if(!empty($candidate['MaxID'])){
                if(!empty($_FILES['JobCV'])){
                    $uploadCVErrorStatus = $this->uploadCV($candidate['MaxID']);
                    echo 'Application Submitted';
                } else {
                    echo 'Application Submitted No Job CV attached';
                }
            } else { echo 'There is an error in submitting your application, please retry it.'; }

            if(!$uploadCVErrorStatus){
                
                    if(!empty($_FILES['UserPicture'])){
                        
                        $fileName = $_FILES['UserPicture']['name'];
                        $fileTmpName = $_FILES['UserPicture']['tmp_name'];
                        $fileSize = $_FILES['UserPicture']['size'];
                        $fileError = $_FILES['UserPicture']['error'];

                        $fileExt = explode(".",$fileName);
                        $fileRealExt = strtolower(end($fileExt));
                        $allowed = array('jpg','jpeg','png','gif');

                        if(in_array($fileRealExt,$allowed)){
                            if($fileError === 0){
                                if($fileSize < 64000000){
                                    $fileNameNew = $candidate['MaxID'] . $fileName;
                                    $fileDestination = constant('CANDIDATE_PICTURE_PATH') . $fileNameNew;
                                    move_uploaded_file($fileTmpName,$fileDestination);
                                    $this->candidate_model->updateProfilePictureLink($candidate['MaxID'],$fileNameNew);
                                    //echo 'Successful in uploading user image';
                                } else {
                                echo ', But the user profile image profile is too big';
                                }
                            } else {
                            echo ', But there was an error uploading the image for profile';
                            }
                        } else {
                        echo ', But there image upload picture format is not supported';
                        }
                    }
                } else {
                    //remove the user and candidate if there is a failure
                    echo 'Failure in uploading CV Please retry it';
                    $this->candidate_model->removeCandidateData($candidate['MaxID']);
                    $this->user_model->removeUserData($userID);
                }
        } else {
            echo 'Failure in inserting data into database, please try again';
        }
    }

    //function that manage an upload cv from candidate
    //called by ajax in CandidateMission->index and CandidateMission->addingNewCandidateStaffOnly
    //candidate_model->updateLinkByID($maxID, $downloadName); calling this model to update the CV link
    public function uploadCV($candidateID){
      
        $uploadErrorStatus = true;
       
        $maxID = $candidateID;

        $config['upload_path'] = constant('CV_PATH').$maxID.'/';
        $config['allowed_types'] = 'pdf|png|doc|docx|jpg|jpeg';
        $config['max_size'] = 30000; //30MB
        $config['max_width'] = 0;
        $config['max_height'] = 0;
        $config['file_name'] = $maxID."CV"; // the uploaded file's extension will be applied
        $config['file_ext_tolower'] = TRUE;
        $config['remove_spaces'] = TRUE;
        
        if ($this->security->xss_clean($_FILES, TRUE) === FALSE)
        {
            echo 'upload failed';
        } else {
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('JobCV')) {
                // echo "Apply Failed.";
                $uploadErrorStatus = true;
            } else {
                // echo "Apply Successfully";
                $uploadErrorStatus = false;
                 // Update the download link
                $uploadName = $_FILES['JobCV']['name'];
                $items = explode(".", $uploadName);
                $extent = $items[count($items) - 1];
                $downloadName = $config['file_name'].'.'.$extent;
                
                //update the filename in database to retrieve data
                $this->candidate_model->updateLinkByID($maxID, $downloadName);
            }
        }
        
       
        return $uploadErrorStatus;
    }


    
    // upload other files by Admin or Staff
    public function uploadFiles(){
        if($_SESSION['userType']!='admin' && $_SESSION['userType'] !='staff'){
            redirect('/');
        }
        $candidateID = $this->input->post('candidateID');
        
        $path = constant('CV_PATH').$candidateID.'/';
        $config['upload_path'] = $path;

        $config['allowed_types'] = 'jpg|jpeg|png|pdf|doc|txt|text|plain|docx|zip|7z';
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
				$this->candidate_model->updateTimeChanged($candidateID);
				echo json_encode($data['userFiles']);
            }
		}
    }

    //update CV download
	public function updateCVFile(){
		if($_SESSION['userType']=='admin' || $_SESSION['userType'] =='staff'){
			$CandidateID = $_POST['candidateID'];
			$CVfile = $_POST['CVfile'];
			$this->candidate_model->updateCVLink($CandidateID,$CVfile);
        } else {
            redirect('/');
        }
	}

    //removing file from candidateDetails
    public function removeFile(){
		if($_SESSION['userType']=='admin' || $_SESSION['userType'] =='staff'){
			$candidateID = $_POST['candidateID'];
			$fileName = $_POST['userFile'];
			$path = constant('CV_PATH').$candidateID.'/';
			//let's not use this. it's dangerous as heck,
            //unlink($path.$fileName);
            //move the file into del folder inside of the CV_PATH constant
			rename($path.$fileName,constant('CV_PATH').'del/'.$candidateID.$fileName);
            $data['userFiles'] = directory_map($path);
            $this->candidate_model->updateTimeChanged($candidateID);
			echo json_encode($data['userFiles']);
        } else {
            redirect('/');
        }
	}

    //accessible from View->pages->manageCandidate
    //a detailed information of candidate based on what data they inserted in the form, when submitting their application
    public function candidateDetails($candidateID,$jobID=""){
        if($_SESSION['userType']=='admin' || $_SESSION['userType'] =='staff'){

            $userdata['userType'] = $_SESSION['userType'];
            $data['candidate'] = $this->candidate_model->getCandidateFullInfo($candidateID);
            if(!empty($jobID)){
                //if it's under assign candidate function pass in the job ID as well so staff can easily click on a button to assign this candidate
                $data['job'] = $this->job_model->get_specificJob($jobID);
            }

            // Find all the files under the candidate's folder
            $path = constant('CV_PATH').$candidateID.'/';
            $data['userFiles'] = directory_map($path);

            $this->load->view('templates/header',$userdata);
            $this->load->view('pages/candidateDetails',$data);
            $this->load->view('templates/footer');
        } else {
            redirect('/');
        }
    }

    //AJAX Function
    public function updateCandidateDetails($candidateID){
        if($_SESSION['userType']=='admin' || $_SESSION['userType'] =='staff'){

            $data = array(
                'Email' => xss_clean(stripslashes(trim($this->input->post('Email')))),
                'FirstName' => xss_clean(stripslashes(trim($this->input->post('FirstName')))),
                'LastName' => xss_clean(stripslashes(trim($this->input->post('LastName')))),
                'Address' => xss_clean(stripslashes(trim($this->input->post('Address')))),
                'City' => xss_clean(stripslashes(trim($this->input->post('City')))),
                'DOB' => xss_clean(stripslashes(trim($this->input->post('DOB')))),
                'ZipCode' => xss_clean(stripslashes(trim($this->input->post('ZipCode')))),
                'Suburb' => xss_clean(stripslashes(trim($this->input->post('Suburb')))),
                'PhoneNumber' => xss_clean(stripslashes(trim($this->input->post('PhoneNumber')))),
                'Gender' => xss_clean(stripslashes(trim($this->input->post('Gender')))),
            );
            $this->user_model->updateUserDetails($this->input->post('UserID'),$data);
            $data = array();
            //
            $data = array(
                'JobInterest' => xss_clean(stripslashes(trim($this->input->post('JobInterest')))),
                'JobInterest2' => xss_clean(stripslashes(trim($this->input->post('JobInterest2')))),
                'JobType' => xss_clean(stripslashes(trim($this->input->post('JobType')))),
                'Transportation' => xss_clean(stripslashes(trim($this->input->post('Transportation')))),
                'LicenseNumber' => xss_clean(stripslashes(trim($this->input->post('LicenseNumber')))),
                'ClassLicense' => xss_clean(stripslashes(trim($this->input->post('ClassLicense')))),
                'Endorsement' => xss_clean(stripslashes(trim($this->input->post('Endorsement')))),
                'Citizenship' => xss_clean(stripslashes(trim($this->input->post('Citizenship')))),
                'Nationality' => xss_clean(stripslashes(trim($this->input->post('Nationality')))),
                'PassportCountry' => xss_clean(stripslashes(trim($this->input->post('PassportCountry')))),
                'PassportNumber' => xss_clean(stripslashes(trim($this->input->post('PassportNumber')))),
                'WorkPermitNumber' => xss_clean(stripslashes(trim($this->input->post('WorkPermitNumber')))),
                'WorkPermitExpiry' => xss_clean(stripslashes(trim($this->input->post('WorkPermitExpiry')))),
                'CompensationInjury' => xss_clean(stripslashes(trim($this->input->post('CompensationInjury')))),
                'CompensationDateFrom' => xss_clean(stripslashes(trim($this->input->post('CompensationDateFrom')))),
                'CompensationDateTo' => xss_clean(stripslashes(trim($this->input->post('CompensationDateTo')))),
               
                'Asthma' => $this->checkBoxFilter($this->input->post('Asthma')),
                'BlackOut' => $this->checkBoxFilter($this->input->post('BlackOut')),
                'Diabetes' => $this->checkBoxFilter($this->input->post('Diabetes')),
                'Bronchitis' => $this->checkBoxFilter($this->input->post('Bronchitis')),
                'BackInjury' => $this->checkBoxFilter($this->input->post('BackInjury')),
                'Deafness' => $this->checkBoxFilter($this->input->post('Deafness')),
                'Dermatitis' => $this->checkBoxFilter($this->input->post('Dermatitis')),
                'SkinInfection' => $this->checkBoxFilter($this->input->post('SkinInfection')),
                'Allergies' => $this->checkBoxFilter($this->input->post('Allergies')),
                'Hernia' => $this->checkBoxFilter($this->input->post('Hernia')),
                'HighBloodPressure' => $this->checkBoxFilter($this->input->post('HighBloodPressure')),
                'HeartProblems' => $this->checkBoxFilter($this->input->post('HeartProblems')),
                'UsingDrugs' => $this->checkBoxFilter($this->input->post('UsingDrugs')),
                'UsingContactLenses' => $this->checkBoxFilter($this->input->post('UsingContactLenses')),
                'RSI' => $this->checkBoxFilter($this->input->post('RSI')),
                'Dependants' => $this->checkBoxFilter($this->input->post('Dependants')),
                'Smoke' => $this->checkBoxFilter($this->input->post('Smoke')),
                'Conviction' => $this->checkBoxFilter($this->input->post('Conviction')),
                'ConvictionDetails' => xss_clean(stripslashes(trim($this->input->post('ConvictionDetails')))),
                'CandidateNotes' => xss_clean(stripslashes(trim($this->input->post('CandidateNotes')))),
                // 'ApplyDate' => date("Y-m-d H:i:s"),
                );

                if(isset($_FILES['UserPicture'])){
                    $fileName = $_FILES['UserPicture']['name'];
                    $fileTmpName = $_FILES['UserPicture']['tmp_name'];
                    $fileSize = $_FILES['UserPicture']['size'];
                    $fileError = $_FILES['UserPicture']['error'];

                    $fileExt = explode(".",$fileName);
                    $fileRealExt = strtolower(end($fileExt));
                    $allowed = array('jpg','jpeg','png','gif');

                    if(in_array($fileRealExt,$allowed)){
                        if($fileError === 0){
                            if($fileSize < 1000000){
                                $fileNameNew = $candidateID . $fileName;
                                $fileDestination = constant('CANDIDATE_PICTURE_PATH') . $fileNameNew;
                                move_uploaded_file($fileTmpName,$fileDestination);
                                $data['UserPicture'] = $fileNameNew;
                            } else {
                               echo 'The file is too big';
                            }
                        } else {
                           echo 'There was an error uploading the file';
                        }
                    } else {
                       echo 'You cannot upload the file of this type';
                    }
                }
                $this->candidate_model->updateCandidateDetails($candidateID,$data);
                $this->candidate_model->updateTimeChanged($candidateID);
        } else {
            redirect('/');
        }
    }

    //update youtube url link in candidateDetails
    public function updateYoutubeURL(){
        if($_SESSION['userType']=='admin' || $_SESSION['userType'] =='staff'){
            $data['CandidateID'] = $_POST['candidateID'];
            $data['YoutubeURL'] = $_POST['youtubeURL'];
            $this->candidate_model->updateYoutubeLink($data['CandidateID'],$data);
            $this->candidate_model->updateTimeChanged($data['CandidateID']);
        }
        else {
            redirect('/');
        }
    }

    //accessible from view->pages->manageCandidate
    //page to allow the staff and admin to add a new candidate themself
    public function addingNewCandidateStaffOnly(){
        if($_SESSION['userType']=='admin' || $_SESSION['userType'] =='staff'){
            $userdata['userType'] = $_SESSION['userType'];

            //used in dropdown list citizenship and cities
            $data['citizenships'] = $this->candidate_model->get_citizenships();
            $data['cities'] = $this->city_model->get_cities();
            $this->load->view('templates/header',$userdata);
            $this->load->view('pages/candidateFormStaffOnly',$data);
            $this->load->view('templates/footer');
        }
        else {
            redirect('/');
        }
    }

    //called from: view->pages->manageCandidate , view->applicant->vue
    //calling the model of candidate and updating the candidateStatus of candidate to removed so it wont appear in the candidate table anymore
    //move it to archive
    public function removeCandidateApplication(){
        if($_SESSION['userType']=='admin' || $_SESSION['userType'] =='staff'){
        $candidateID = $_POST['candidateID'];
        
        $this->candidate_model->removeCandidateApp($candidateID);
        $this->candidate_model->updateTimeChanged($candidateID);
        }
        else {
            redirect('/');
        }
    }

    //called from: view->pages->archive
    //remove candidate application from everypages
    public function deleteCandidateApplication(){
        if($_SESSION['userType']=='admin' || $_SESSION['userType'] =='staff'){
            $candidateID = $_POST['candidateID'];
            
            $this->candidate_model->deleteCandidateApp($candidateID);
            $this->candidate_model->updateTimeChanged($candidateID);
            }
            else {
                redirect('/');
            }
    }

    //function that are called from CandidateMission->applyJob
    //only called when staff or admin is adding the staff themself in the view->pages/candidateFormStaffOnly
    //generate a random 4 digits 1 character password for the user that is added in by this way
    public function addUserByStaff(){
        $isError = false;
        if($this->filterName($this->input->post('firstName'))){
        $firstName = xss_clean(stripslashes(trim($this->input->post('firstName'))));
        } else {
            $isError = true; echo 'Invalid First Name ';
        }

        if($this->filterName($this->input->post('lastName'))){
        $lastName = xss_clean(stripslashes(trim($this->input->post('lastName'))));
        } else {
            $isError = true; echo 'Invalid Last Name ';
        }
        
        if($this->filterAddress(($this->input->post('userAddress')))){
        $userAddress = xss_clean(stripslashes(trim($this->input->post('userAddress'))));
        } else {
            $isError = true; echo 'Invalid Address ';
        }
       
        if(!empty($_POST['DOB'])){
            if($this->filterDOB($this->input->post('DOB'))){
            $DOB = xss_clean(stripslashes(trim($this->input->post('DOB'))));
            } else {
                $isError = true; echo 'Invalid DOB ';
            }
        } else {
            $DOB = '0000-00-00';
        }
       
        if($this->filterCity($this->input->post('city'))){
            $city = xss_clean(stripslashes(trim($this->input->post('city'))));
        } else {
            $isError = true; echo 'Invalid City ';
        }

        $zipCode = $this->filterZIP(($this->input->post('zipCode')));
        
        if(!empty($_POST['suburb'])){
            if($this->filterSuburb($this->input->post('suburb'))){
                $suburb = xss_clean(stripslashes(trim($this->input->post('suburb'))));
            } else {
                $isError = true; echo 'Invalid Suburb ';
            }
        } else { $suburb = "";}

        if($this->filterPhone($this->input->post('phoneNumber'))){
        $phoneNumber = xss_clean(stripslashes(trim($this->input->post('phoneNumber'))));
        } else {
            $isError = true; echo 'Invalid Phone number ';
        }

        if($this->filterGender($this->input->post('gender'))){
            $gender = xss_clean(stripslashes(trim($this->input->post('gender'))));
        } else {
            $gender = "";
        } 

        if($this->filterEmail($this->input->post('userEmail'))){
            $userEmail = xss_clean(stripslashes(trim($this->input->post('userEmail'))));
        } else { $isError = true; echo 'Invalid Email ';}

        //generate an email and password that are almost impossible for the user to login so there is no conflict when a staff added a new candidate
        //because it requires a user as well
        if(!$isError){
            
        $userPasswd = rand(10000,99999);
        $pos = rand(0,4); 
        $alphabet = $this->getRandomAlphabet();
        $newUserPasswd = substr_replace($userPasswd, $alphabet, $pos, 1);
        $userType = 'candidate';
        $newUserPasswd = do_hash($newUserPasswd, 'sha256');
        $this->register_model->addUser($firstName, $lastName, $userEmail, $newUserPasswd, $userAddress, $city, $zipCode, $suburb, $userType, $phoneNumber, $DOB, $gender);
        } 
    }

    /*From this part onward it consists of validation method, 
    some will return empty string or predetermined string if the value is bad, 
    this kind of type are mostly the value that aren't that important

    the one that returns either true or false value is important field that the user should fill
    if bad values are to happen, it will prevent the data to enter into database. And it will prompt the user to enter 
    the valid data. 
    */
    
    public function filterGeneral($general){
        if(!empty($general)){
            if(preg_match('%^[a-zA-Z0-9/\.\'\-\"\, \(\)]+$%',stripslashes(trim($general)))){
              return xss_clean(stripslashes(trim($general)));
            } else { return ""; }
        } else { return "";}
    }

    public function filterTextArea($textArea){
        if(!empty($textArea)){
            if(preg_match('%^[a-zA-Z0-9/\.\'\-\"\, \r\n\(\)]+$%',stripslashes(trim($textArea)))){
              return xss_clean(stripslashes(trim($textArea)));
            } else { return ''; }
        } else { return '';}
       // return $textArea;
    }

    public function filterJobType($jobType){
        if(!empty($jobType)){
            if(strtolower($jobType)=="fulltime" || strtolower($jobType)=="parttime"){
                return xss_clean(stripslashes(trim($jobType)));
            } else { return ""; }
        } else { return "";}
    }
    public function filterPassportNumber($passportNum){
        if(!empty($passportNum)){
            if(preg_match('%^[a-zA-Z0-9\s]{3,}$%',stripslashes(trim($passportNum)))){
              return xss_clean(stripslashes(trim($passportNum)));
            } else { return ""; }
        } else { return "";}
    }

    public function filterCompensationInjury($compensationStat){
        if(!empty($compensationStat)){
            if(strtolower($compensationStat) == "yes"){
                return "Yes";
            } else {
                return "No";
            }
        } else { return ""; }
    }

    public function filterName($candidateName){
        if(!empty($candidateName)){
            if(preg_match('%^[a-zA-Z\.\'\-\"\, ]{2,}$%',stripslashes(trim($candidateName)))){
              return true;
            } else { return false; }
        } else { return false;}
    }

    public function filterPhone($phoneNumber){
        if(!empty($phoneNumber)){
            if(preg_match('%^[\+]?\(?[\+]?[0-9]{1,4}\)?[\- \.]?\(?[0-9]{2,4}[\-\. ]?[0-9]{2,4}[\-\. ]?[0-9]{0,6}?\)?$%',stripslashes(trim($phoneNumber)))){
                return true;
            } else { return false; }
        } else { return true; }
    }

    public function filterGender($gender){
        if(strtolower($gender) == "male" || strtolower($gender) == "female"){
            return true;
        } else {
            return false;
        }
    }

    public function filterAddress($address){
        if(!empty($address)){
            if(preg_match('%^([a-zA-Z\.\,\'"&:/\- ]+[ ]?[#]?[0-9][a-zA-Z0-9 ]*|[#]?[ ]?[0-9]+[ ]?[\-/]?[0-9]*[ ]?[a-zA-Z][ a-zA-Z0-9\.\,\'"&:/\-]*)$%',stripslashes(trim($address)))){
               return true;
            } else {
                return false;
            }
        } else { return false;}
    }

    public function filterEmail($email){
        if(!empty($email)){
            if(preg_match('%^[a-zA-Z0-9\._\+\-]+@[a-zA-Z0-9\.\-]+\.[A-Za-z]{2,4}$%',stripslashes(trim($email)))){
               return true;
            } else { return false;}
        } else { return false;}
    }

    public function filterDOB($DOB){
            if(preg_match('%^[1|2]{1}(9[0-9][0-9]|0[0-9][0-9])-(0[0-9]|1[0|1|2])-(0[0-9]|1[0-9]|2[0-9]|3[0-1])$%',stripslashes(trim($DOB)))){
                if($DOB < date("Y-m-d")){
                    return true;
                } else { return false; }
            } else { return false;}
    }

    public function filterDate($date){
        if(preg_match('%^[1|2]{1}(9[0-9][0-9]|0[0-9][0-9])-(0[0-9]|1[0|1|2])-(0[0-9]|1[0-9]|2[0-9]|3[0-1])$%',stripslashes(trim($date)))){
                return xss_clean(stripslashes(trim($date)));
        } else { return "0000-00-00";}
    }
    
    public function filterCity($cityPosted){
        //check whether the city is entered correctly, based on database
        $data['cities'] = $this->city_model->get_cities();
        $cities = array();
        foreach($data['cities'] as $city){
            array_push($cities,$city['CityName']);
        }
        
        if (in_array($cityPosted,$cities)) {
            return true;
        } else {
            return false;
        }
    }

    public function filterSuburb($suburb){
            if(preg_match('%^[a-zA-Z\s/\.\'\(\)&\,\"\-]+$%',stripslashes(trim($suburb)))){
               return true;
            } else { return false; }
    }

    public function filterZIP($zipCode){
        if(!empty($zipCode)){
            if(preg_match('%^\d{4}$%',stripslashes(trim($zipCode)))){
               
                return $zipCode;
                } else { return "0000" ;}
        } else {return "0000" ;}
    }

    public function checkBoxFilter($checkBoxItem){
        if($checkBoxItem != "true"){
            return "false";
        } else return "true";
    }

    // called from this page addUserByStaff()
    //initialize a random alphabet used in CandidateMission->addUserByStaff to replace an integer with this alphabet
    public function getRandomAlphabet(){
        $alphabetArray = array( 'a', 'b', 'c', 'd', 'e','f', 'g', 'h', 'i', 'j','k', 'l', 'm', 'n', 'o',
        'p', 'q', 'r', 's', 't','u', 'v', 'w', 'x', 'y','z'
        );
        $randomNum = rand(0,25);
        $alphabet = $alphabetArray[$randomNum];
        return $alphabet;
    }

    // called from views/pages/condidateDetails.php
    // change the width and height for the picture
    public function updateProfileSize(){
        $width = $_POST['width'];
        $height = $_POST['height'];
        $candidateID = $_POST['candidateID'];

        $this->candidate_model->updateProfileSize($candidateID, $width, $height);
        echo "Resized successfully!";
    }
   
}