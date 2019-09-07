<?php

class Test extends CI_Controller {

	function __construct() {
		parent::__construct();
        // Models
        $this->load->model('candidate_model');

		// Load url helper
        $this->load->helper('url');
        $this->load->helper('download');
		
	}
	public function index()
	{	
        //$candidateNum = $this->candidate_model->countAll();
        //echo $candidateNum;

        // test array
        $fileName = "carl_cv.doc";
        $items = explode(".", $fileName);
        echo $items[count($items) - 1];
    }
    
    public function downloadCV(){
        $path = '/var/www/candidatesCV/1.txt';
        force_download($path, NULL);
    }

    public function testTabs(){
        $userdata['userType'] = 'anyone';
        $this->load->view('templates/header',$userdata);
        $this->load->view('applicant/tabHeader');
        $this->load->view('templates/footer');
    }

    // test defined variable in constants.php
    public function testDefine(){
        echo constant('CV_PATH');
    }

    // test update JobCV in CandidateTable
    public function testUpdateJobCV(){

        $this->candidate_model->updateLinkByID(31, '31.docx');
    }

    public function testArray(){
        $str = 'php';
        $str['name'] = array('apple');
        echo var_dump($str['name']);
    }
}
