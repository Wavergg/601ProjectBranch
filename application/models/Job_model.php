<?php
class Job_model extends CI_Model {
    public function __construct() {
        $this->load->database();
        date_default_timezone_set('NZ');
    }

    /**
     * Select Functions
    */
    // get all jobs
    // called from: Controller->Archive->index(), Controller->Archive->getJobsArchive()
    // Controller->Jobs->manageClient(), Controller->Jobs->getActiveJob()
    public function get_jobs($page="",$offset=0) {
        //if it's called from archive page get the status of completed only
        if($page=='archive'){
            $this->db->where('JobStatus','completed');
            $this->db->limit(10,$offset * 10);
        } else {
            $data = array('completed','deleted');
            $this->db->where_not_in('JobStatus',$data);
            $this->db->limit(10,$offset * 10);
        }
        $this->db->order_by('UpdateDate', 'DESC');
        $query = $this->db->get('Job');
        return $query->result_array();
    }

    

    //called from: Controller->Home->index(), Controller->Jobs->index()
    //get job with status of published
    public function get_publishedjobs($page,$jobTitle,$jobType,$location) {
        $this->db->select('JobID,ThumbnailText,PublishTitle,JobTitle,JobType,City,JobImage');
         
        $this->db->where('JobStatus', 'published');
        if($page=="home"){
            //if it's called byhomepage sort it by newest to oldest grab 9 records
            $this->db->where('Checked','true');
            $this->db->order_by('PublishDate', 'DESC');
            $this->db->limit(9);
            
        }
        //filter functions
        if($jobTitle != ""){
            $this->db->like('JobTitle', $jobTitle);
        }
        if($jobType != "Enter Job Type" && $jobType != ""){
            $this->db->where('JobType', $jobType);
        }
        if($location != "Enter Location" && $location != "" && $location != "Enter City"){
            $this->db->where('City', $location);
        }
     
        $query = $this->db->get('Job');
        return $query->result_array();
    }

    //called from: Controller->Jobs->jobInfo()
    //return the detailed information for job that are published so anyone can see it
    public function get_specificJobInfo($jobID){
        $this->db->where('JobStatus', 'published');
        $this->db->where('JobID',$jobID);
        $this->db->select('JobID,ThumbnailText,JobTitle,JobType,City,Suburb,PublishDate,PublishTitle,Editor1,JobImage');
        $query = $this->db->get('Job');
        return $query->row_array();
    }

    //called from: Controller->CandidateMission->manageCandidate() , 
    //Controller->CandidateMission->candidateDetails(),
    //Controller->Jobs->JobDetails(),
    //Controller->Jobs->updateJobToArchive(),
    //Controller->Jobs->jobPublish(),
    //Controller->Jobs->jobUnpublish(),
    //get the job data, used in jobdetails to assign candidate
    public function get_specificJob($jobID){
        $this->db->where('JobID', $jobID);
        $query = $this->db->get('Job');
        return $query->row_array();
    }

    // called from: Controller->EmployerMission->addjob(),
    // get the job with the max JobID
    public function get_maxJobID(){
        $this->db->select_max('JobID');
        $query = $this->db->get('Job');
        return $query->row_array();
    }

    /**
     * Update functions
     */
   
    //update the check status to be true
    public function checkJob($jobID,$data){
        
        $this->db->where('JobID', $jobID);
        $this->db->update('Job',$data);
    }


    /**
     * Insert functions
     */
    // Called from: Controller->EmployerMission->addJob()
    // Insert a new Job into database
    public function addJob($clientID,$clientTitle,$clientName,$clientCompany,$clientEmail,$clientContact,$clientCity,$clientAddress,$clientJobTitle,$clientJobType,$description,$suburb,$dateJobSubmitted) {
        $data = array(
            'ClientID' => $clientID,
            'ClientTitle' => $clientTitle,
            'ClientName' => $clientName,
            'Company' => $clientCompany,
            'Email' => $clientEmail,
            'ContactNumber' => $clientContact,
            'City' => $clientCity,
            'Address' => $clientAddress,
            'JobTitle' => $clientJobTitle,
            'JobType' => $clientJobType,
            'Description' => $description,
            'Suburb' => $suburb,
            'JobSubmittedDate' => $dateJobSubmitted,
        );
        $this->db->set('UpdateDate', $this->db->escape(date('Y-m-d H:i:s')), FALSE);
        $this->db->insert('Job', $data);
    }

    //called from: Controller->Jobs->jobPublish()
    //change the status for the job to be published, update the published text to whatever the values are
    public function publishJob($jobID,$textEditor,$thumbnailText,$publishTitle,$publishDate,$fileDestination=""){
        
        $data = array(
            'JobStatus' => 'published',
            'Editor1' => $textEditor,
            'ThumbnailText' =>$thumbnailText,
            'PublishTitle' =>$publishTitle,
            'PublishDate' =>$publishDate,
        );
        //store the path of jobsImage
        if(!empty($fileDestination)){
            $data['JobImage'] = $fileDestination;
        }
        $this->db->set('UpdateDate', $this->db->escape(date('Y-m-d H:i:s')), FALSE);
        $this->db->where('JobID',$jobID);
        $this->db->update('Job',$data);
    }

    
    public function updateVisitedManageClient($userID){
        $this->db->where('UserID',$userID);
        $data = array();
        $this->db->set('VisitedClient', $this->db->escape(date('Y-m-d H:i:s')), FALSE);
        $this->db->update('User',$data);
    }

    // called from: Controller->Jobs->jobUnpublish()
    // change the status to whatever the status parameter passed in
    public function unpublishJob($jobID,$status){

        $data = array(
            'JobStatus' => $status,
        );
        $this->db->where('JobID',$jobID);
        $this->db->set('UpdateDate', $this->db->escape(date('Y-m-d H:i:s')), FALSE);
        $this->db->update('Job',$data);
    }

    //called from:Controller->Jobs->updateJobToArchive(), Controller->Job->removeJobApplication()
    //set the jobstatus for specific job to completed
    //only available in archive page
    public function updateJobStatusToComplete($jobID){
        $this->db->where('JobID',$jobID);
        $data = array(
            'JobStatus' => 'completed',
            
        );
        $this->db->set('UpdateDate', $this->db->escape(date('Y-m-d H:i:s')), FALSE);
        $this->db->update('Job',$data);
    }

    //called from: Controller->Jobs->deleteJobApplication()
    //delete it from every pages
    public function deleteJobApplication($jobID){
        $this->db->where('JobID',$jobID);
        $data = array(
            'JobStatus' => 'deleted',
            
        );
        $this->db->set('UpdateDate', $this->db->escape(date('Y-m-d H:i:s')), FALSE);
        $this->db->update('Job',$data);
    }

    //called from: Controller->Jobs->assignCandidate()
    //change the status to active only when a staff is assigned to this candidate
    public function updateJobStatusToActive($jobID){
        $this->db->where('JobID',$jobID);
        $data = array(
            'JobStatus' => 'active',
        );
        $this->db->set('UpdateDate', $this->db->escape(date('Y-m-d H:i:s')), FALSE);
        $this->db->update('Job',$data);
    }

    //called from: Controller->Jobs->removeAssignedCandidate()
    //After the removal of candidate if there is no candidate assigned to it update it to NULL
    //So it wont be Active anymore
    public function updateJobDetailsStatusNull($jobID){
        $this->db->where('JobID',$jobID);
        $data = array(
            'JobStatus' => '',
        );
        $this->db->set('UpdateDate', $this->db->escape(date('Y-m-d H:i:s')), FALSE);
        $this->db->update('Job',$data);
    }

    //called from: Controller->Jobs->updateJobData()
    //update the details of the jobs
    public function updateJobData($jobID,$data){
        $this->db->where('JobID',$jobID);
        $this->db->update('Job',$data);
    }



    // return the records of jobs that meets the criteria
    // called from: Controller->Archive->applyFilterArchive(), Controller->Jobs->applyFilterActiveJob()
    public function applyFilterJob($page,$company,$city,$jobTitle,$contactNumber,$contactPerson,$jobStatus){
        if($page=="archive")
        {
            $this->db->where('JobStatus',$jobStatus);
        }
        else {
            $data = array('JobStatus','completed','deleted');
            $this->db->where_not_in('JobStatus',$data);
        }
        if(!empty($company)){
            $this->db->like('Company',$company);
        }
        if(!empty($city)){
            $this->db->like('City',$city);
        }
        if(!empty($jobTitle)){
            $this->db->like('JobTitle',$jobTitle);
        }
        if(!empty($contactNumber)){
            $this->db->like('ContactNumber',$contactNumber);
        }
        if(!empty($contactPerson)){
            $this->db->like('ClientName',$contactPerson);
        }
        if(!empty($jobStatus)){
            if($jobStatus=="NoAction"){
                $this->db->where('JobStatus',NULL);
                $this->db->or_where('JobStatus',"");
                $this->db->or_where('JobStatus',"NoAction");
            } else {
                $this->db->where('JobStatus',$jobStatus);
            }
        }
        $this->db->order_by('UpdateDate', 'DESC');
        $query = $this->db->get('Job');
        return $query->result_array();
    }

    
    //get similar location and city to get matched with candidate
    //called from: Controller->Jobs->manageClient() , Controller->Jobs->getActiveJob()
    public function get_filterjobs($city,$jobTitle="",$offset=0,$jobTitle2=""){
        
        $data = array('JobStatus','completed','deleted');
        $this->db->where_not_in('JobStatus',$data);
        $this->db->limit(10,$offset * 10);
        if(!empty($city)){
            $this->db->like('City',$city);
        }
        
        $this->db->group_start();
        if(!empty($jobTitle)){
            //get the closest match by jobInterest
            $this->db->group_start();
                $this->db->like('JobTitle',$jobTitle);
                //if it contains space split them up and compare each words with the jobInterest request from job
                if(strpos($jobTitle,' ')!==false){
                    $parts = explode(' ',$jobTitle);
                    foreach($parts as $jobPart){
                        if(strlen($jobPart)>2){
                            //remove suffix -er -or -ers -ing -man -person and compare again
                            if(substr($jobPart,-2)=='er' || substr($jobPart,-2)=='or'){
                                $this->db->or_like('JobTitle',substr($jobPart,0,strlen($jobPart)-2),'both');
                            } else if(substr($jobPart,-3)=='ers' || substr($jobPart,-3)=='ing' || substr($jobPart,-3)=='man'){
                                $this->db->or_like('JobTitle',substr($jobPart,0,strlen($jobPart)-3),'both');
                            } else if(substr($jobPart,-6)=='person'){
                                $this->db->or_like('JobTitle',substr($jobPart,0,strlen($jobPart)-6),'both');
                            }
                            $this->db->or_like('JobTitle',$jobPart,'both');
                        }
                    }
                } else {
                    //remove suffix -er -or -ers -ing -man -person and compare again
                    if(substr($jobTitle,-6)=='person'){
                        $this->db->or_like('JobTitle',substr($jobPart,0,strlen($jobTitle)-6),'both');
                    } else if(substr($jobTitle,-3)=='ers' || substr($jobTitle,-3)=='ing' || substr($jobTitle,-3)=='man'){
                        $this->db->or_like('JobTitle',substr($jobTitle,0,strlen($jobTitle)-3),'both');
                    } else if(substr($jobTitle,-2)=='er' || substr($jobTitle,-2)=='or'){
                        $this->db->or_like('JobTitle',substr($jobTitle,0,strlen($jobTitle)-2),'both');
                    } else if(substr($jobTitle,-1)=='s'){
                        $this->db->or_like('JobTitle',$jobTitle,'both');
                    } 
                }
            $this->db->group_end();
        }
        
        if(!empty($jobTitle2)){
            //get the closest match by jobInterest
            $this->db->or_group_start();
                
                //if it contains space split them up and compare each words with the jobInterest request from job
                if(strpos($jobTitle2,' ')!==false){
                    $parts = explode(' ',$jobTitle2);
                    foreach($parts as $jobPart){
                        if(strlen($jobPart)>2){
                            //remove suffix -er -or -ers -ing -man -person and compare again
                            if(substr($jobPart,-2)=='er' || substr($jobPart,-2)=='or'){
                                $this->db->or_like('JobTitle',substr($jobPart,0,strlen($jobPart)-2),'both');
                            } else if(substr($jobPart,-3)=='ers' || substr($jobPart,-3)=='ing' || substr($jobPart,-3)=='man'){
                                $this->db->or_like('JobTitle',substr($jobPart,0,strlen($jobPart)-3),'both');
                            } else if(substr($jobPart,-6)=='person'){
                                $this->db->or_like('JobTitle',substr($jobPart,0,strlen($jobPart)-6),'both');
                            }
                            $this->db->or_like('JobTitle',$jobPart,'both');
                        }
                    }
                } else {
                    //remove suffix -er -or -ers -ing -man -person and compare again
                    if(substr($jobTitle2,-6)=='person'){
                        $this->db->or_like('JobTitle',substr($jobPart,0,strlen($jobTitle2)-6),'both');
                    } else if(substr($jobTitle2,-3)=='ers' || substr($jobTitle2,-3)=='ing' || substr($jobTitle2,-3)=='man'){
                        $this->db->or_like('JobTitle',substr($jobTitle2,0,strlen($jobTitle2)-3),'both');
                    } else if(substr($jobTitle2,-2)=='er' || substr($jobTitle2,-2)=='or'){
                        $this->db->or_like('JobTitle',substr($jobTitle2,0,strlen($jobTitle2)-2),'both');
                    } else if(substr($jobTitle2,-1)=='s'){
                        $this->db->or_like('JobTitle',$jobTitle2,'both');
                    } 
                    $this->db->like('JobTitle',$jobTitle2);
                }
            $this->db->group_end();
        }

        $this->db->group_end();

        $this->db->order_by('UpdateDate', 'DESC');
        $query = $this->db->get('Job');
        return $query->result_array();
    }

    // count the number of Job with 'completed' status so it could return the number, and those number will be used for paging
    // called from: Controller:Archive->index()
    public function countAllArchive(){
        $this->db->where('JobStatus','completed');
        return $this->db->count_all_results('Job');
    }

    public function getNextPageArchive($limitNum,$offsetNum){
        $this->db->where('JobStatus','completed');
        $this->db->limit($limitNum, $offsetNum);
        $query = $this->db->get('Job');
        return $query->result_array();
    }

    //called from: Controller->Jobs->manageClient()
    //get the number of jobs where the status is not completed, for paging purposes
    public function countAllActiveJob($city="",$jobTitle=""){
        $data = array(
            'completed','deleted'
        );
        $this->db->where_not_in('JobStatus',$data);
        
        if(!empty($city)){
            $this->db->like('City',$city);
        }

        if(!empty($jobTitle)){
            //get the closest match by jobInterest
            $this->db->group_start();
                //$this->db->like('JobTitle',$jobTitle);
                //if it contains space split them up and compare each words with the jobInterest request from job
                if(strpos($jobTitle,' ')!==false){
                    $parts = explode(' ',$jobTitle);
                    foreach($parts as $jobPart){
                        if(strlen($jobPart)>2){
                            //remove suffix -er -or -ers -ing -man -person and compare again
                            if(substr($jobPart,-2)=='er' || substr($jobPart,-2)=='or'){
                                $this->db->or_like('JobTitle',substr($jobPart,0,strlen($jobPart)-2),'both');
                            } else if(substr($jobPart,-3)=='ers' || substr($jobPart,-3)=='ing' || substr($jobPart,-3)=='man'){
                                $this->db->or_like('JobTitle',substr($jobPart,0,strlen($jobPart)-3),'both');
                            } else if(substr($jobPart,-6)=='person'){
                                $this->db->or_like('JobTitle',substr($jobPart,0,strlen($jobPart)-6),'both');
                            }
                            $this->db->or_like('JobTitle',$jobPart,'both');
                        }
                    }
                } else {
                    //remove suffix -er -or -ers -ing -man -person and compare again
                    if(substr($jobTitle,-6)=='person'){
                        $this->db->or_like('JobTitle',substr($jobPart,0,strlen($jobTitle)-6),'both');
                    } else if(substr($jobTitle,-3)=='ers' || substr($jobTitle,-3)=='ing' || substr($jobTitle,-3)=='man'){
                        $this->db->or_like('JobTitle',substr($jobTitle,0,strlen($jobTitle)-3),'both');
                    } else if(substr($jobTitle,-2)=='er' || substr($jobTitle,-2)=='or'){
                        $this->db->or_like('JobTitle',substr($jobTitle,0,strlen($jobTitle)-2),'both');
                    } else if(substr($jobTitle,-1)=='s'){
                        $this->db->or_like('JobTitle',$jobTitle,'both');
                    } 
                }
            $this->db->group_end();
        }
        
        return $this->db->count_all_results('Job');
    }

    public function getNextPageActiveJob($limitNum,$offsetNum){
        $data = array(
            'completed','deleted'
        );
        $this->db->where_not_in('JobStatus',$data);
        $this->db->limit($limitNum, $offsetNum);
        $query = $this->db->get('Job');
        return $query->result_array();
    }

    public function countAllClient(){
        $data = array(
            'completed','deleted'
        );
        $this->db->where_not_in('ClientStatus',$data);
        return $this->db->count_all_results('Client');
    }

    //called from: view->templates->header
    //return the number of unchecked job as notification
    public function countNumberUncheckedJob($visitedTimeJob){
        $mySql = "SELECT UpdateDate FROM Job WHERE JobStatus != 'completed' AND UpdateDate > " . $this->db->escape($visitedTimeJob);
        $query = $this->db->query($mySql);
        return $query->num_rows();
    }

    //called from: Controller->Jobs->updateTOBfile()
    //update the TOB file
    public function updateTOBLink($jobID,$TOBfile){
        $this->db->where('JobID',$jobID);
        $data['TOB'] = $TOBfile;
        $this->db->set('UpdateDate', $this->db->escape(date('Y-m-d H:i:s')), FALSE);
        $this->db->update('Job',$data);
    }

    //called from: Controller->Jobs->removeClientApplication()
    public function updateClientStatusToDeleted($clientID){
        $this->db->where('ClientID',$clientID);
        $data = array('ClientStatus' => 'deleted');
        $this->db->set('UpdateDate', $this->db->escape(date('Y-m-d H:i:s')), FALSE);
        $this->db->update('Client',$data);
    }

    //update the time everytime there is an update
    public function updateTimeChanged($jobID){
        $this->db->where('JobID',$jobID);
        
        $data = array(
        );
        
        $this->db->set('UpdateDate', $this->db->escape(date('Y-m-d H:i:s')), FALSE);
       
        $this->db->update('Job',$data);
    }
}
