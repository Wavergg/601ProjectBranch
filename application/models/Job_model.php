<?php
class Job_model extends CI_Model {
    public function __construct() {
        $this->load->database();
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
            $data = array('completed');
            $this->db->where_not_in('JobStatus',$data);
            $this->db->limit(10,$offset * 10);
        }
        $this->db->order_by('JobSubmittedDate', 'DESC');
        $query = $this->db->get('Job');
        return $query->result_array();
    }

    // get all unchecked jobs
    // called from : Controller->Applicant->index
    public function getUnchecked(){
        $this->db->where('Checked', NULL);
        $this->db->order_by('JobSubmittedDate', 'DESC');
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

    /**
     * Update functions
     */
    //called from Controller: Applicant->checkClient
    //update the check status to be true
    public function checkJob($jobID){
        $this->db->set('Checked', 'true');
        $this->db->where('JobID', $jobID);
        $this->db->update('Job');
    }

    /**
     * Insert functions
     */
    // Called from: Controller->EmployerMission->addJob()
    // Insert a new Job into database
    public function addJob($clientTitle,$clientName,$clientCompany,$clientEmail,$clientContact,$clientCity,$clientAddress,$clientJobTitle,$clientJobType,$description,$suburb,$dateJobSubmitted) {
        $data = array(
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
        $this->db->where('JobID',$jobID);
        $this->db->update('Job',$data);
    }
    

    // called from: Controller->Jobs->jobUnpublish()
    // change the status to whatever the status parameter passed in
    public function unpublishJob($jobID,$status){

        $data = array(
            'JobStatus' => $status,
        );
        $this->db->where('JobID',$jobID);
        $this->db->update('Job',$data);
    }

    //called from:Controller->Jobs->updateJobToArchive(), Controller->Job->removeJobApplication()
    //set the jobstatus for specific job to completed
    public function updateJobStatusToComplete($jobID){
        $this->db->where('JobID',$jobID);
        $data = array(
            'JobStatus' => 'completed',
            'Checked' => 'true',
        );
        $this->db->update('Job',$data);
    }

    //called from: Controller->Jobs->assignCandidate()
    //change the status to active only when a staff is assigned to this candidate
    public function updateJobStatusToActive($jobID){
        $this->db->where('JobID',$jobID);
        $data = array(
            'JobStatus' => 'active',
        );
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
        $this->db->update('Job',$data);
    }

    //called from: Controller->Jobs->updateBookmark()
    //update the status of bookmark
    public function updateBookmarkStatus($jobID,$bookmarkValue){

        $this->db->where('JobID',$jobID);
        $data = array(
            'Bookmark' => $bookmarkValue,
        );
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
            $data = array('JobStatus','completed');
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
    public function countAllActiveJob(){
        $data = array(
            'JobStatus' => 'completed',
        );
        $this->db->where_not_in('JobStatus',$data);
        return $this->db->count_all_results('Job');
    }

    public function getNextPageActiveJob($limitNum,$offsetNum){
        $data = array(
            'JobStatus' => 'completed',
        );
        $this->db->where_not_in('JobStatus',$data);
        $this->db->limit($limitNum, $offsetNum);
        $query = $this->db->get('Job');
        return $query->result_array();
    }

    //called from: view->templates->header
    //return the number of unchecked job as notification
    public function countNumberUncheckedJob(){
        $mySql = "SELECT Checked FROM Job WHERE Checked IS NULL";
        $query = $this->db->query($mySql);
        return $query->num_rows();
    }

    //called from: Controller->Jobs->applyFilterBookmark()
    //return bookmarked job
    public function applyFilterBookmark($bookmark){
        $this->db->where('Bookmark',$bookmark);
        $query = $this->db->get('Job');
        return $query->result_array();
    }

}
