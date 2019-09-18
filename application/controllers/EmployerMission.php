<?php 


class EmployerMission extends CI_Controller{
    function __construct() {
		parent::__construct();
		
		// Load url helper
		$this->load->helper('url');
		$this->load->helper('security');

        $this->load->library('session');
        
        // Load Models
        $this->load->model('city_model');
        $this->load->model('job_model');
    }
    //loading the page of employerMission
    public function index($param=''){

        //a variable to tell which tabs to open
        $data['active1'] = '';
        $data['active2'] = '';
        $data['active3'] = '';
        $data['message'] = '';
        if($param == 2) {
            $data['active2'] = 'active';
        } elseif ($param == 3) {
            $data['active3'] = 'active';
        } else {
            $data['active1'] = 'active';
        }

        $userdata['userType'] = 'anyone';
        if(isset($_SESSION['userEmail'])){
            $userdata['userEmail'] = $_SESSION['userEmail'];
			$userdata['userType'] = $_SESSION['userType'];
        }
        $data['message'] = array();
        $data['cities'] = $this->city_model->get_cities();
        $this->load->view('templates/header', $userdata);
        $this->load->view('pages/employerMission', $data);
        $this->load->view('templates/footer');

    }

    //a function to add a job into database
    //accessible from EmployerMission->index 
    public function addJob(){
        $errMessage = array();
        $errorIsTrue = false;
       
        $data['active1'] = '';
        $data['active2'] = '';
        $data['active3'] = 'active';
        $data['message'] = '';

        if(isset($_POST['clientTitle'])){
            //matched with string that starts with m or d or -
            
            //followed by 3 character combinations of r i s with possibility of . at the end
            if(preg_match('%^[MD\-][ris]{1,3}[\.]?$%',stripslashes(trim($_POST['clientTitle'])))){
                $clientTitle = $this->security->xss_clean(stripslashes($_POST['clientTitle']));
            } else { $errorIsTrue = true; array_push($errMessage,'Please choose your title from dropdown list'); }
        } else { $clientTitle = "-";}

        //$clientTitle = $this->security->xss_clean(stripslashes($_POST['clientTitle']));

        if(isset($_POST['clientName'])){
            //check client name, the length should be more than 2 characters
			//allowed character allAlphabets,multipleSpace .'-:",&
            if(preg_match('%^[a-zA-Z\.\'\-:\"\, /&]{2,}$%',stripslashes(trim($_POST['clientName'])))){
                $clientName = $this->security->xss_clean($_POST['clientName']);
            } else { $errorIsTrue = true; array_push($errMessage,'Please enter a valid name that doesn\'t contain special character and more than 2 characters in length');}
        } else { $errorIsTrue = true; array_push($errMessage,'Please enter the name');}

        $clientCompany = $this->security->xss_clean(trim($_POST['clientCompany']));

        if(isset($_POST['clientEmail'])){
            //check clientEmail is it a valid one or not
            //atleast combination of a single alphabets,numbers,._-+ followed by @ sign and some more stuff
            if(preg_match('%^[a-zA-Z0-9\._\-\+]+@[a-zA-Z0-9\.\-]+\.[A-Za-z]{2,4}$%',stripslashes(trim($_POST['clientEmail'])))){
                $clientEmail = $this->security->xss_clean($_POST['clientEmail']);
            } else { $errorIsTrue = true; array_push($errMessage,'Invalid Email Address');}
        } else { $errorIsTrue = true; array_push($errMessage,'Please enter an email');}
        
        if(isset($_POST['clientContact'])){
            //check contact is it valid or not
            if(preg_match('%^[\+]?\(?[\+]?[0-9]{1,4}\)?[\- \.]?\(?[0-9]{2,4}[\-\. ]?[0-9]{2,4}[\-\. ]?[0-9]{0,6}?\)?$%',stripslashes(trim($_POST['clientContact'])))){
                $clientContact = $this->security->xss_clean($_POST['clientContact']);
            } else { $errorIsTrue = true; array_push($errMessage,'Invalid Contact number');}
        } else { $errorIsTrue = true; array_push($errMessage,'Please enter a contact number');}

        //load all the possible city from database and compare the post with the array returned from model
        $data['cities'] = $this->city_model->get_cities();
        $cities = array();
        foreach($data['cities'] as $city){
            array_push($cities,$city['CityName']);
        }

        if (in_array($_POST['clientCity'], $cities)) {
            $clientCity = $this->security->xss_clean(stripslashes(trim($_POST['clientCity'])));
        } else {
            $errorIsTrue = true; array_push($errMessage,'invalid city, the city doesnt exists in New Zealand');
        }
        
        //address should contains number
        if(isset($_POST['clientAddress'])){
            if(preg_match('%^([a-zA-Z\.\,\'"&:/\- ]+[ ]?[#]?[0-9][a-zA-Z0-9 ]*|[#]?[ ]?[0-9]+[ ]?[a-zA-Z][ a-zA-Z0-9\.\,\'"&:/\-]*)$%',stripslashes(trim($_POST['clientAddress'])))){
                $clientAddress = $this->security->xss_clean($_POST['clientAddress']);
            } else {
                $errorIsTrue = true; array_push($errMessage,'invalid address, contains unallowed special characters or it\'s incomplete');
            }
        } else { $errorIsTrue = true; array_push($errMessage,'Please enter An address');}

        
        if(isset($_POST['clientSuburb'])){
            $clientSuburb = $this->security->xss_clean(stripslashes(trim($_POST['clientSuburb'])));
        } else { $errorIsTrue = true; array_push($errMessage,'Please enter the suburb'); }

        if(isset($_POST['clientJobTitle'])){
            $clientJobTitle = $this->security->xss_clean(stripslashes(trim($_POST['clientJobTitle'])));
        } else { $errorIsTrue = true; array_push($errMessage,'Please enter the job title');}
        
        if(isset($_POST['clientJobType'])){
            if($_POST['clientJobType']=="PartTime" || $_POST['clientJobType']=="FullTime"){
                $clientJobType = $this->security->xss_clean($_POST['clientJobType']);
            } else { $errorIsTrue = true; array_push($errMessage,'Invalid job type');}
        } else { $errorIsTrue = true; array_push($errMessage,'Please enter the job type');}

        $description = $this->security->xss_clean(stripslashes(trim($_POST['description'])));
        //instantly record the date of when the application is submitted
        //$dateJobSubmitted = date('Y-m-d H:i:s'); 
        
        $userdata['userType'] = 'anyone';
        $data['message'] = array();
        if(isset($_SESSION['userEmail'])){
            $userdata['userEmail'] = $_SESSION['userEmail'];
			$userdata['userType'] = $_SESSION['userType'];
        }
        //if the error is not detected adding the information to database else return a warning message
        if(!$errorIsTrue){
            $currentDate = date('Y-m-d');
            $this->job_model->addJob($clientTitle,$clientName,$clientCompany,$clientEmail,$clientContact,$clientCity,$clientAddress,$clientJobTitle,$clientJobType,$description,$clientSuburb,$currentDate);
            $data['title'] = 'Job was added successfully.';

            // create a folder for the job, named as JobID
            // so when upload any files for this job, they should be here
            $jobMaxID = $this->job_model->get_maxJobID();
            $filePath = constant('JOB_FILES').$jobMaxID['JobID'];
            mkdir($filePath);

        } else {
            $data['message'] = $errMessage;
        }
        
        $this->load->view('templates/header', $userdata);
        $this->load->view('pages/employerMission', $data);
        $this->load->view('templates/footer');
    }
}