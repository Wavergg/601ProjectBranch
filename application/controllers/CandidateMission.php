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
        // Load Modesl
        $this->load->model('candidate_model');
        $this->load->model('city_model');
        $this->load->model('register_model');
        $this->load->model('job_model');
        $this->load->model('user_model');
    }
    
    //loading the page of candidateMission together with the form for candidate to register their application into lee recruitment
    public function index($param = ''){
        if($param == 'active'){ $active1='';$active2='active';}
        else {$active1='active';$active2='';}
        $data['active1'] = $active1;
        $data['active2'] = $active2;
      
        $userdata['userType'] = 'anyone';
        if(isset($_SESSION['userEmail'])){
            $userdata['userEmail'] = $_SESSION['userEmail'];
			$userdata['userType'] = $_SESSION['userType'];
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
            
            //is it a good idea to match the interest from candidate / job?
            
            $data['fromPage'] = $page; 
            $this->load->view('templates/header',$userdata);
            $this->load->view('pages/manageCandidate',$data);
            $this->load->view('templates/footer');
        } else {
            redirect('/');
        }
		
    }

    // function to download CV that are submitted by candidate
    // accessible from view->pages->candidateDetails || view->pages->manageCandidate
    public function downloadCV($fileName){
        if($_SESSION['userType']=='admin' || $_SESSION['userType'] =='staff'){

            $path = constant('CV_PATH').$fileName;
            
            force_download($path, NULL);
        } else {
            redirect('/');
        }
    }
    
    public function downloadFile($candidateID, $fileName){
        if($_SESSION['userType']=='admin' || $_SESSION['userType'] =='staff'){

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
            $userID = $userData['UserID'];

        
        //KVP K:FieldName in database V:Post value
        $applyDate = date('Y-m-d');
        $data = array(
        'JobInterest' => $this->security->xss_clean(stripslashes(trim($this->input->post('JobInterest')))),
        'JobType' => $this->security->xss_clean(stripslashes(trim($this->input->post('JobType')))),
        'Transportation' => $this->security->xss_clean(stripslashes(trim($this->input->post('Transportation')))),
        'LicenseNumber' => $this->security->xss_clean(stripslashes(trim($this->input->post('LicenseNumber')))),
        'ClassLicense' => $this->security->xss_clean(stripslashes(trim($this->input->post('ClassLicense')))),
        'Endorsement' => $this->security->xss_clean(stripslashes(trim($this->input->post('Endorsement')))),
        'Citizenship' => $this->security->xss_clean(stripslashes(trim($this->input->post('Citizenship')))),
        'Nationality' => $this->security->xss_clean(stripslashes(trim($this->input->post('Nationality')))),
        'PassportCountry' => $this->security->xss_clean(stripslashes(trim($this->input->post('PassportCountry')))),
        'PassportNumber' => $this->security->xss_clean(stripslashes(trim($this->input->post('PassportNumber')))),
        'WorkPermitNumber' => $this->security->xss_clean(stripslashes(trim($this->input->post('WorkPermitNumber')))),
        'WorkPermitExpiry' => $this->security->xss_clean(stripslashes(trim($this->input->post('workPermitExpiry')))),
        'CompensationInjury' => $this->security->xss_clean(stripslashes(trim($this->input->post('CompensationInjury')))),
        'CompensationDateFrom' => $this->security->xss_clean(stripslashes(trim($this->input->post('CompensationDateFrom')))),
        'CompensationDateTo' => $this->security->xss_clean(stripslashes(trim($this->input->post('CompensationDateTo')))),
        'Asthma' => $this->security->xss_clean(stripslashes(trim($this->input->post('Asthma')))),
        'BlackOut' => $this->security->xss_clean(stripslashes(trim($this->input->post('BlackOut')))),
        'Diabetes' => $this->security->xss_clean(stripslashes(trim($this->input->post('Diabetes')))),
        'Bronchitis' => $this->security->xss_clean(stripslashes(trim($this->input->post('Bronchitis')))),
        'BackInjury' => $this->security->xss_clean(stripslashes(trim($this->input->post('BackInjury')))),
        'Deafness' => $this->security->xss_clean(stripslashes(trim($this->input->post('Deafness')))),
        'Dermatitis' => $this->security->xss_clean(stripslashes(trim($this->input->post('Dermatitis')))),
        'SkinInfection' => $this->security->xss_clean(stripslashes(trim($this->input->post('SkinInfection')))),
        'Allergies' => $this->security->xss_clean(stripslashes(trim($this->input->post('Allergies')))),
        'Hernia' => $this->security->xss_clean(stripslashes(trim($this->input->post('Hernia')))),
        'HighBloodPressure' => $this->security->xss_clean(stripslashes(trim($this->input->post('HighBloodPressure')))),
        'HeartProblems' => $this->security->xss_clean(stripslashes(trim($this->input->post('HeartProblems')))),
        'UsingDrugs' => $this->security->xss_clean(stripslashes(trim($this->input->post('UsingDrugs')))),
        'UsingContactLenses' => $this->security->xss_clean(stripslashes(trim($this->input->post('UsingContactLenses')))),
        'RSI' => $this->security->xss_clean(stripslashes(trim($this->input->post('RSI')))),
        'Dependants' => $this->security->xss_clean(stripslashes(trim($this->input->post('Dependants')))),
        'Smoke' => $this->security->xss_clean(stripslashes(trim($this->input->post('Smoke')))),
        'Conviction' => $this->security->xss_clean(stripslashes(trim($this->input->post('Conviction')))),
        'ConvictionDetails' => $this->security->xss_clean(stripslashes(trim($this->input->post('ConvictionDetails')))),
        'UserID' => $userID,
        'CandidateNotes' => $candidateNotes,
        'ApplyDate' => $applyDate,
        );
        
        $this->candidate_model->applyJob($data);
        $data = array();
        $candidate = $this->candidate_model->getMaxIDByUserID($userID);
        
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
                        $fileNameNew = $candidate['MaxID'] . $fileName;
                        $fileDestination = "C:\\xamppNew2\\htdocs\\candidateProfile\\" . $fileNameNew;
                        move_uploaded_file($fileTmpName,$fileDestination);
                        $this->candidate_model->updateProfilePictureLink($candidate['MaxID'],$fileNameNew);
                        echo 'Successful in uploading user image';
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
    }

    //function that manage an upload cv from candidate
    //called by ajax in CandidateMission->index and CandidateMission->addingNewCandidateStaffOnly
    //candidate_model->updateLinkByID($maxID, $downloadName); calling this model to update the CV link
    public function uploadCV(){
        

            $firstName = $this->input->post('firstName');
            $lastName = $this->input->post('lastName');
            //get the last ID for database with firstname and lastname criteria
        $userData = $this->candidate_model->getUserByData($firstName,$lastName);
        $userID = $userData['UserID'];
        
        // get max candidate ID
        $candidate = $this->candidate_model->getMaxIDByUserID($userID);
        $maxID=$candidate['MaxID'];

        
        $config['upload_path'] = constant('CV_PATH');

        $config['allowed_types'] = 'pdf|png|doc|docx';
        $config['max_size'] = 10000;
        $config['max_width'] = 0;
        $config['max_height'] = 0;
        $config['file_name'] = $maxID; // the uploaded file's extension will be applied

        if ($this->security->xss_clean($_FILES, TRUE) === FALSE)
        {
            echo 'upload failed';
        } else {
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('JobCV')) {
                echo "Apply Failed.";
            } else {
                echo "Apply Successfully";
            }
        }
        
        // Update the download link
        $uploadName = $_FILES['JobCV']['name'];
        $items = explode(".", $uploadName);
        $extent = $items[count($items) - 1];
        $downloadName = $config['file_name'].'.'.$extent;
        
        //update the filename in database to retrieve data
        $this->candidate_model->updateLinkByID($maxID, $downloadName);
        
    }

    
    // upload other files by Admin or Staff
    public function uploadFiles(){
        if($_SESSION['userType']!='admin' && $_SESSION['userType'] !='staff'){
            echo "Please login";
        }
        $candidateID = $this->input->post('condidateID');
        
        $config['upload_path'] = constant('CV_PATH').$candidateID.'/';

        $config['allowed_types'] = 'pdf|png|doc|docx';
        $config['max_size'] = 10000;
        $config['max_width'] = 0;
        $config['max_height'] = 0;

        if ($this->security->xss_clean($_FILES, TRUE) === FALSE)
        {
            echo 'upload failed';
        } else {
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('userFile')) {
                echo "Apply Failed.";
            } else {
                echo "Apply Successfully".$candidateID;
            }
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
                'ZipCode' => xss_clean(stripslashes(trim($this->input->post('ZipCode')))),
                'Suburb' => xss_clean(stripslashes(trim($this->input->post('Suburb')))),
                'PhoneNumber' => xss_clean(stripslashes(trim($this->input->post('PhoneNumber')))),
                'Gender' => xss_clean(stripslashes(trim($this->input->post('Gender')))),
            );
            $this->user_model->updateUserDetails($this->input->post('UserID'),$data);
            $data = array();
            //
            $data = array(
                'JobInterest' => $this->security->xss_clean(stripslashes(trim($this->input->post('JobInterest')))),
                'JobType' => $this->security->xss_clean(stripslashes(trim($this->input->post('JobType')))),
                'Transportation' => $this->security->xss_clean(stripslashes(trim($this->input->post('Transportation')))),
                'LicenseNumber' => $this->security->xss_clean(stripslashes(trim($this->input->post('LicenseNumber')))),
                'ClassLicense' => $this->security->xss_clean(stripslashes(trim($this->input->post('ClassLicense')))),
                'Endorsement' => $this->security->xss_clean(stripslashes(trim($this->input->post('Endorsement')))),
                'Citizenship' => $this->security->xss_clean(stripslashes(trim($this->input->post('Citizenship')))),
                'Nationality' => $this->security->xss_clean(stripslashes(trim($this->input->post('Nationality')))),
                'PassportCountry' => $this->security->xss_clean(stripslashes(trim($this->input->post('PassportCountry')))),
                'PassportNumber' => $this->security->xss_clean(stripslashes(trim($this->input->post('PassportNumber')))),
                'WorkPermitNumber' => $this->security->xss_clean(stripslashes(trim($this->input->post('WorkPermitNumber')))),
                'WorkPermitExpiry' => $this->security->xss_clean(stripslashes(trim($this->input->post('workPermitExpiry')))),
                'CompensationInjury' => $this->security->xss_clean(stripslashes(trim($this->input->post('CompensationInjury')))),
                'CompensationDateFrom' => $this->security->xss_clean(stripslashes(trim($this->input->post('CompensationDateFrom')))),
                'CompensationDateTo' => $this->security->xss_clean(stripslashes(trim($this->input->post('CompensationDateTo')))),
                'Asthma' => $this->security->xss_clean(stripslashes(trim($this->input->post('Asthma')))),
                'BlackOut' => $this->security->xss_clean(stripslashes(trim($this->input->post('BlackOut')))),
                'Diabetes' => $this->security->xss_clean(stripslashes(trim($this->input->post('Diabetes')))),
                'Bronchitis' => $this->security->xss_clean(stripslashes(trim($this->input->post('Bronchitis')))),
                'BackInjury' => $this->security->xss_clean(stripslashes(trim($this->input->post('BackInjury')))),
                'Deafness' => $this->security->xss_clean(stripslashes(trim($this->input->post('Deafness')))),
                'Dermatitis' => $this->security->xss_clean(stripslashes(trim($this->input->post('Dermatitis')))),
                'SkinInfection' => $this->security->xss_clean(stripslashes(trim($this->input->post('SkinInfection')))),
                'Allergies' => $this->security->xss_clean(stripslashes(trim($this->input->post('Allergies')))),
                'Hernia' => $this->security->xss_clean(stripslashes(trim($this->input->post('Hernia')))),
                'HighBloodPressure' => $this->security->xss_clean(stripslashes(trim($this->input->post('HighBloodPressure')))),
                'HeartProblems' => $this->security->xss_clean(stripslashes(trim($this->input->post('HeartProblems')))),
                'UsingDrugs' => $this->security->xss_clean(stripslashes(trim($this->input->post('UsingDrugs')))),
                'UsingContactLenses' => $this->security->xss_clean(stripslashes(trim($this->input->post('UsingContactLenses')))),
                'RSI' => $this->security->xss_clean(stripslashes(trim($this->input->post('RSI')))),
                'Dependants' => $this->security->xss_clean(stripslashes(trim($this->input->post('Dependants')))),
                'Smoke' => $this->security->xss_clean(stripslashes(trim($this->input->post('Smoke')))),
                'Conviction' => $this->security->xss_clean(stripslashes(trim($this->input->post('Conviction')))),
                'ConvictionDetails' => $this->security->xss_clean(stripslashes(trim($this->input->post('ConvictionDetails')))),
                'CandidateNotes' => $this->security->xss_clean(stripslashes(trim($this->input->post('CandidateNotes')))),
                'ApplyDate' => date('Y-m-d'),
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
                                $fileDestination = "C:\\xamppNew2\\htdocs\\candidateProfile\\" . $fileNameNew;
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
        } else {
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

    //function that are called from CandidateMission->applyJob
    //only called when staff or admin is adding the staff themself in the view->pages/candidateFormStaffOnly
    //generate a random 4 digits 1 character password for the user that is added in by this way
    public function addUserByStaff(){

        $firstName = xss_clean(stripslashes(trim($this->input->post('firstName'))));
        $lastName = xss_clean(stripslashes(trim($this->input->post('lastName'))));
        $userAddress = xss_clean(stripslashes(trim($this->input->post('userAddress'))));
        $DOB = xss_clean(stripslashes(trim($this->input->post('DOB'))));
        $city = xss_clean(stripslashes(trim($this->input->post('city'))));
        $zipCode = xss_clean(stripslashes(trim($this->input->post('zipCode'))));
        $suburb = xss_clean(stripslashes(trim($this->input->post('suburb'))));
        $phoneNumber = xss_clean(stripslashes(trim($this->input->post('phoneNumber'))));
        $gender = xss_clean(stripslashes(trim($this->input->post('gender'))));
        //generate an email and password that are almost impossible for the user to login so there is no conflict when a staff added a new candidate
        //because it requires a user as well
        
        $userEmail = xss_clean(stripslashes(trim($this->input->post('userEmail'))));
        $userPasswd = rand(10000,99999);
        $pos = rand(0,4); 
        $alphabet = $this->getRandomAlphabet();
        $newUserPasswd = substr_replace($userPasswd, $alphabet, $pos, 1);
        $userType = 'candidate';
        $newUserPasswd = do_hash($newUserPasswd, 'sha256');
        $this->register_model->addUser($firstName, $lastName, $userEmail, $newUserPasswd, $userAddress, $city, $zipCode, $suburb, $userType, $phoneNumber, $DOB, $gender);

    }

    //called from: view->pages->manageCandidate , view->applicant->vue
    //calling the model of candidate and updating the candidateStatus of candidate to removed so it wont appear in the candidate table anymore
    public function removeCandidateApplication(){
        $candidateID = $_POST['candidateID'];
        
        $this->candidate_model->removeCandidateApp($candidateID);
    }
}