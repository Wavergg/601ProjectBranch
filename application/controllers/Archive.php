<?php



class Archive extends CI_Controller{

    function __construct() {
		parent::__construct();
		
		// Load url helper
		$this->load->helper('url');
		$this->load->helper('security');

        $this->load->library('session');
        //load model
        $this->load->model('city_model');
        $this->load->model('candidate_model');
		$this->load->model('job_model');
	}

    //load the archive page
    //by using this : job_model->get_jobs('archive'); it will return all job which status is completed
    public function index(){
        
        if($_SESSION['userType']=='admin' || $_SESSION['userType'] =='staff'){

            $userdata['userType'] = $_SESSION['userType'];
            $data['title'] = "Archive";
            $data['message'] ="";
            $data['jobs'] = $this->job_model->get_jobs('archive');
            
            //adding 1 more key value pair of ref that store the location of jobdetails for specific job
            for($i=0;$i<sizeof($data['jobs']);$i++){
                $ref = base_url() . 'index.php/Jobs/jobDetails/' . $data['jobs'][$i]['JobID'];
                $data['jobs'][$i]['ref'] = $ref;
            }
            //return the number of job so it could be used as paging
            $limitNum = 10;
            $offsetNum = 0;
            $page = 'archive';
            $data['candidates'] = $this->candidate_model->getCandidatesWithName($limitNum, $offsetNum,$page);
            $data['fromPage'] = "archive";
            $data['archiveJobNum'] = $this->job_model->countAllArchive();
            $data['candidateNum'] = $this->candidate_model->countAll($page);
            
            $this->load->view('templates/header',$userdata);
            $this->load->view('pages/archive',$data);
            $this->load->view('templates/footer');
        } else {
            redirect('/');
        }
    }

    //filter function from archive page
    //using AJAX to return the data of job format: json
    public function applyFilterArchive(){
        if($_SESSION['userType']=='admin' || $_SESSION['userType'] =='staff'){

        
            $data['title'] = "Archive";
            $company = $_POST['companyName'];
            $city = $_POST['cityName'];
            // $jobTitle = $_POST['jobTitleName'];
            // $contactNumber = $_POST['contactNumberName'];
            $contactPerson = $_POST['contactPersonName'];
            $jobStatus = "completed";
            $page="archive";
            //return filtered job based on criteria as array of results
            $data['jobs'] = $this->job_model->applyFilterJob($page,$company,$city,$jobTitle="",$contactNumber="",$contactPerson,$jobStatus);
            
            //adding 1 more key value pair of ref that store the location of jobdetails for specific job
            for($i=0;$i<sizeof($data['jobs']);$i++){
                $ref = base_url() . 'index.php/Jobs/jobDetails/' . $data['jobs'][$i]['JobID'];
                $data['jobs'][$i]['ref'] = $ref;
            }

            echo json_encode($data['jobs']);
        } else {
            redirect('/');
        }
    }

    //function from archive page
    //when clicking on next page it will load the next 10 records
    //AJAX will return the jobs data in format of json
    public function getJobsArchive(){
        if($_SESSION['userType']=='admin' || $_SESSION['userType'] =='staff'){

            $offset=$_POST['offset'];
            $page="archive";
            //get the next records
            $jobsResult = $this->job_model->get_jobs($page,$offset);

            //adding 1 more key value pair of ref that store the location of jobdetails for specific job
            for($i=0;$i<sizeof($jobsResult);$i++){
                $ref = base_url() . 'index.php/Jobs/jobDetails/' . $jobsResult[$i]['JobID'];
                $jobsResult[$i]['ref'] = $ref;
            }

            echo json_encode($jobsResult);
        } else {
            redirect('/');
        }

    }
}