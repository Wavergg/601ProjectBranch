<?php

class Home extends CI_Controller {

	function __construct() {
		parent::__construct();
		
		// Load url helper
		$this->load->helper('url');
		$this->load->helper('security');

		$this->load->library('session');
		$this->load->model('city_model');
		$this->load->model('job_model');
	}
	//load the homepage
	public function index()
	{	
		$userdata['userType'] = 'anyone';
        if(isset($_SESSION['userEmail'])){
            $userdata['userEmail'] = $_SESSION['userEmail'];
			$userdata['userType'] = $_SESSION['userType'];
		}
		$jobTitle ="";
		$jobType="";
		$location="";
		$page="home";
		//filter job that are in homepage
		if(isset($_POST['jobTitle'])){
			$jobTitle = $this->security->xss_clean($_POST['jobTitle']);
		};
		if(isset($_POST['jobType'])){
			$jobType = $this->security->xss_clean($_POST['jobType']);
		};
		if(isset($_POST['location'])){
			$location = $this->security->xss_clean($_POST['location']);
		};

		$data['cities'] = $this->city_model->get_cities();
		//only shows the published jobs
		$data['jobs'] = $this->job_model->get_publishedjobs($page,$jobTitle,$jobType,$location);
        $this->load->view('templates/header', $userdata);
        $this->load->view('pages/main',$data);
        $this->load->view('templates/footer');
	}
}
