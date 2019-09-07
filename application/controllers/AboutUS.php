<?php

class AboutUS extends CI_Controller {

	function __construct() {
		parent::__construct();
		
		// Load url helper
		$this->load->helper('url');
		$this->load->helper('security');

		$this->load->library('session');
	}
	//loading a aboutus page
	public function index()
	{	
		$userdata['userType'] = 'anyone';
        if(isset($_SESSION['userEmail'])){
            $userdata['userEmail'] = $_SESSION['userEmail'];
			$userdata['userType'] = $_SESSION['userType'];
		}
        $this->load->view('templates/header', $userdata);
        $this->load->view('pages/aboutUs');
        $this->load->view('templates/footer');
	}
}
