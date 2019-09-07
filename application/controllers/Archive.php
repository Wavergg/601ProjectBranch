<?php



class Archive extends CI_Controller{

    function __construct() {
		parent::__construct();
		
		// Load url helper
		$this->load->helper('url');
		$this->load->helper('security');

		$this->load->library('session');
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
            // $bookmarkStat= "";
            //adding 3 more key value pair of ref ,bookmarkStat and bookmarkUrl
            for($i=0;$i<sizeof($data['jobs']);$i++){
                $ref = base_url() . 'index.php/Jobs/jobDetails/' . $data['jobs'][$i]['JobID'];
                // if($data['jobs'][$i]['Bookmark']=="true"){ $bookmarkStat=true;} else {$bookmarkStat=false;};
                // $bookmarkUrl= "Bookmark". $data['jobs'][$i]['JobID'];
                
                $data['jobs'][$i]['ref'] = $ref;
                // $data['jobs'][$i]['bookmarkStat'] = $bookmarkStat;
                // $data['jobs'][$i]['bookmarkUrl'] = $bookmarkUrl;
            }
            //return the number of job so it could be used as paging
            $data['candidates'] = $this->candidate_model->getArchivedCandidate();
            $data['fromPage'] = "archive";
            $data['archiveJobNum'] = $this->job_model->countAllArchive();
            $data['candidateNum'] = sizeof($data['candidates']);
            
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
            // $bookmarkStat= "";
            //adding 3 more key value pair of ref ,bookmarkStat and bookmarkUrl
            for($i=0;$i<sizeof($data['jobs']);$i++){
                $ref = base_url() . 'index.php/Jobs/jobDetails/' . $data['jobs'][$i]['JobID'];
                // if($data['jobs'][$i]['Bookmark']=="true"){ $bookmarkStat=true;} else {$bookmarkStat=false;};
                // $bookmarkUrl= "Bookmark". $data['jobs'][$i]['JobID'];
                
                $data['jobs'][$i]['ref'] = $ref;
                // $data['jobs'][$i]['bookmarkStat'] = $bookmarkStat;
                // $data['jobs'][$i]['bookmarkUrl'] = $bookmarkUrl;
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
            // $bookmarkStat= "";
            //adding 3 more key value pair of ref ,bookmarkStat and bookmarkUrl
            for($i=0;$i<sizeof($jobsResult);$i++){
                $ref = base_url() . 'index.php/Jobs/jobDetails/' . $jobsResult[$i]['JobID'];
                // if($jobsResult[$i]['Bookmark']=="true"){ $bookmarkStat=true;} else {$bookmarkStat=false;};
                // $bookmarkUrl= "Bookmark". $jobsResult[$i]['JobID'];
                
                $jobsResult[$i]['ref'] = $ref;
                // $jobsResult[$i]['bookmarkStat'] = $bookmarkStat;
                // $jobsResult[$i]['bookmarkUrl'] = $bookmarkUrl;
            }

            echo json_encode($jobsResult);
        } else {
            redirect('/');
        }

    }
}