<?php

class Applicant extends CI_Controller{
    function __construct() {
		parent::__construct();
		
		// Load url helper
		$this->load->helper('url');
        $this->load->helper('security');

        $this->load->library('session');
        // Load Modesl
        $this->load->model('job_model');
		$this->load->model('city_model');
        $this->load->model('candidate_model');
    }

    //loading a look for applicants page
    //accessible only for staff and admin, in there they could see all new candidate and request from client
    public function index(){
        
        
        if( $_SESSION['userType']=='admin' || $_SESSION['userType'] =='staff'){
            $userdata['userType'] = $_SESSION['userType'];

            $data['title'] = "Manage Client";
            $data['message'] ="";
            //get unchecked job and candidate
            $data['jobs'] = $this->job_model->getUnchecked();
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

            $data['candidates'] = $this->candidate_model->getUnchecked();
            
            $this->load->view('templates/header',$userdata);
            //$this->load->view('pages/lookForApplicants',$data);
            $this->load->view('applicant/tabHeader');
            $this->load->view('applicant/tab1');
            $this->load->view('applicant/tab2');
            $this->load->view('templates/modal');
            $this->load->view('applicant/vue',$data);
            $this->load->view('templates/footer');
        }
        else {
            redirect('/');
        }
    }

    
    /**
     * AJAX Methods
     */
    //ajax method from applicant page, updating the checked status for respective categories
    public function checkClient(){
        $jobID = $_POST['jobID'];
        // Check the Job
        $this->job_model->checkJob($jobID);
    }

    public function checkCandidate(){
        $candidateID = $_POST['candidateID'];
        // Check the Candidate
        $this->candidate_model->checkCandidate($candidateID);
    }
    

}