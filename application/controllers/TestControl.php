<?php

class TestControl extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('job_model');
    }

    public function index()
    {
      
      $userdata['userType'] = 'anyone';
      $this->load->view('templates/header',$userdata);
      $this->load->view('home/regexTest');
      $this->load->view('templates/footer');
    }

    public function getJobsArchive(){
          $offset=2;
          $page="archive";
          $jobsResult = $this->job_model->get_jobs($page,$offset);
          // $ref = 'kappa';
          // array_push($jobsResult[0],$ref);
          // foreach($jobsResult[0] as $k){
          //   echo $k;
          // };

          // echo $jobsResult[0]['JobID'];

          for($i=0;$i<sizeof($jobsResult);$i++){
            $ref = base_url() . 'index.php/Jobs/jobDetails/' . $jobsResult[$i]['JobID'];
            if($jobsResult[$i]['Bookmark']=="true"){ $bookmarkStat="true";} else {$bookmarkStat="false";};
            $bookmarkUrl= "Bookmark". $jobsResult[$i]['JobID'];
            
            $jobsResult[$i]['ref'] = $ref;
            $jobsResult[$i]['bookmarkStat'] = $bookmarkStat;
            $jobsResult[$i]['bookmarkUrl'] = $bookmarkUrl;
          }

          foreach($jobsResult[0] as $key=>$val){
            echo $key . ':' . $val . '<br/>';
          };

  }
}