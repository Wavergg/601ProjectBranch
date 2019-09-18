<?php
class Candidate_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }

    /**
     * Select Functions
    */
    // get all candidates
    public function getCandidates(){
        $query = $this->db->get('Candidate');
        return $query->result_array();
    }

    // called from: Controller->Jobs->jobDetails(), 
    // Controller->Jobs->updateJobToArchive(), 
    // Controller->Jobs->jobPublish(), 
    // Controller->Jobs->jobUnpublish()
    // Controller->Jobs->removeAssignedCandidate()
    // get all candidates data that matches jobid for jobDetails
    public function getCandidatesJobDetails($jobID){
        $mySql = "SELECT Candidate.CandidateID,User.FirstName, User.LastName, User.PhoneNumber, User.Email,User.Address, Candidate.JobType,Candidate.CandidateHoursWorked,Candidate.CandidateNotes,Candidate.CandidateEarnings,Candidate.JobRate,Candidate.CandidateNotes FROM Candidate INNER JOIN User ON Candidate.UserID=User.UserID WHERE Candidate.JobID=" . $jobID ;
        $query = $this->db->query($mySql);
        return $query->result_array(); 
    }

    //called from: Controller->Jobs->updateJobRate()
    //updateCandidateHoursWorking in jobDetails
    public function updateCandidateHoursWorking($candidateID,$hoursWorked,$candidateEarnings){
        $this->db->where('CandidateID',$candidateID);
        $data = array (
            'CandidateHoursWorked' =>$hoursWorked,
            'CandidateEarnings' => $candidateEarnings
        );
        $this->db->update('Candidate',$data);
    }

    //called from: Controller->Jobs->resetCandidateData()
    //set the value to 0 for jobRate,candidateEarnings,Hoursworked for specific candidate
    public function resetCandidateJobDetailsData($candidateID){
        $this->db->where('CandidateID',$candidateID);
        $data = array (
            'CandidateHoursWorked' => 0,
            'JobRate' => 0,
            'CandidateEarnings' => 0
        );
        $this->db->update('Candidate',$data);
    }
    
    //called from: Controller->Jobs->updateJobRate()
    //updateCandidateJobRate in jobDetails
    public function updateJobRate($candidateID,$jobRate){
        $this->db->where('CandidateID',$candidateID);
        $data = array(
            'JobRate' => $jobRate,
        );
        $this->db->update('Candidate',$data);
    }

    //called from: Controller->Jobs->updateCandidateNotes()
    //update the notes that describe information about this candidate
    public function updateCandidateNotes($candidateID,$candidateNotes){
        $this->db->where('CandidateID',$candidateID);
        $data = array (
            'CandidateNotes' => $candidateNotes,
        );
        $this->db->update('Candidate',$data);
    }

    //called from: Controller->Jobs->updateHoursWorked(), 
    //Controller->Jobs->updateJobRate(), 
    //Controller->Jobs->updateCandidateNotes(),
    //Controller->Jobs->resetCandidateData(),
    //get candidate based on ID return inner joined table between candidate and user, so far it has been only used on jobdetails table
    public function getCandidateByID($candidateID){
        $mySql = "SELECT Candidate.CandidateID, User.City, User.FirstName, User.LastName, User.PhoneNumber, User.Email,User.Address, Candidate.JobType,Candidate.CandidateHoursWorked,Candidate.CandidateNotes,Candidate.CandidateEarnings,Candidate.JobRate,Candidate.CandidateNotes,Candidate.JobInterest FROM Candidate INNER JOIN User ON Candidate.UserID=User.UserID WHERE Candidate.CandidateID=" . $candidateID ;
        $query = $this->db->query($mySql);
        return $query->row_array();
    }

    //called from: Controller->CandidateMission->candidateDetails()
    //return the userInformation and candidateInformation singlerow
    public function getCandidateFullInfo($candidateID){
        $mySql = "SELECT User.FirstName, User.LastName, User.PhoneNumber,User.City, User.Suburb, User.DOB, User.Gender,User.ZipCode, User.Email,User.Address, Candidate.* FROM Candidate INNER JOIN User ON Candidate.UserID=User.UserID WHERE Candidate.CandidateID=" . $candidateID ;
        $query = $this->db->query($mySql);
        return $query->row_array();
    }

    //called from: Controller->Jobs->assignCandidate()
    //assign jobID to candidate
    public function assignCandidateJobID($candidateID,$jobID){
        $this->db->where('CandidateID',$candidateID);
        $data = array( 
            'JobID' => $jobID,
        );
        $this->db->update('Candidate',$data);
    }

    //called from: Controller->Jobs->removeAssignedCandidate()
    //remove Candidate From table in job Details
    public function removeAssignedCandidate($candidateID){
        $this->db->where('CandidateID',$candidateID);
        $data = array( 
            'JobID' => '',
        );
        $this->db->update('Candidate',$data);
    }
    // get an user by user name
    public function getUserByEmail($userEmail){
        $this->db->where('Email', $userEmail);
        $query = $this->db->get('User');
        return $query->row_array();
    }

    public function updateVisitedManageCandidate($userID){
        $this->db->where('UserID',$userID);
        $data = array();
        $this->db->set('VisitedCandidate', 'NOW()', FALSE);
        $this->db->update('User',$data);
    }

    // get all users
    public function getUsers(){
        $query = $this->db->get('User');
        return $query->result_array();
    }

    //called from: Controller->CandidateMission->applyJob() , Controller->CandidateMission->uploadCV()
    //only getting the ID of the user, last records
    public function getUserByData($firstName,$lastName){
        $mySql = 'SELECT User.UserID From User WHERE User.UserID = (SELECT MAX(User.UserID) FROM User WHERE User.FirstName="'.$firstName . '" AND User.LastName="'. $lastName .'")';
        $query = $this->db->query($mySql);
        return $query->row_array();
    }

    // called from Controller->CandidateMission->manageCandidate() or Controller->CandidateMission->getCandidates()
    // get all candidate with the firstname and lastname of the user
    public function getCandidatesWithName($limitNum, $offsetNum,$page="",$city="",$jobType="",$jobInterest="",$firstName="",$lastName="",$suburb="",$phoneNumber="",$email=""){
        $this->db->select('User.FirstName, User.LastName,User.DOB,User.City,User.Address,User.Suburb,User.PhoneNumber,User.Email,User.Gender,User.VisitedCandidate,User.VisitedClient,Candidate.*');
        $this->db->from('Candidate');
        $this->db->join('User', 'Candidate.UserID = User.UserID');
        
        
        if($page == "jobDetails"){
            //get the candidate that hasnt been assigned to anyjob
            $this->db->group_start();
                $this->db->where('Candidate.JobID',NULL);
                $this->db->or_where('Candidate.JobID',"");
                $this->db->or_where('Candidate.JobID',0);
            $this->db->group_end();
            $this->db->where('CandidateStatus !=','removed');
        } else if($page == "archive"){
            $this->db->where('CandidateStatus','removed');
        } else {
            $this->db->where('CandidateStatus !=','removed');
        }
        
        if(!empty($city)){
            $this->db->where('User.City',$city);
        }
        // if(!empty($jobType)){
        // $this->db->where('Candidate.JobType',$jobType);
        // }
        if(!empty($jobInterest)){
            //get the closest match by jobInterest
            
            $this->db->group_start();
           
                $this->db->like('Candidate.JobInterest',$jobInterest,'both');
                //if it contains space split them up and compare each words with the jobInterest request from job
                if(strpos($jobInterest,' ')!==false){
                    $parts = explode(' ',$jobInterest);
                    foreach($parts as $jobPart){
                        if(strlen($jobPart)>2){
                            //remove suffix -er -or -ers -ing -man -person and compare again
                            if(substr($jobPart,-2)=='er' || substr($jobPart,-2)=='or'){
                                $this->db->or_like('JobInterest',substr($jobPart,0,strlen($jobPart)-2),'both');
                            } else if(substr($jobPart,-3)=='ers' || substr($jobPart,-3)=='ing' || substr($jobPart,-3)=='man'){
                                $this->db->or_like('JobInterest',substr($jobPart,0,strlen($jobPart)-3),'both');
                            } else if(substr($jobPart,-6)=='person'){
                                $this->db->or_like('JobInterest',substr($jobPart,0,strlen($jobPart)-6),'both');
                            }
                            $this->db->or_like('JobInterest',$jobPart,'both');
                        }
                    }
                } else {
                    //remove suffix -er -or -ers -ing -man -person and compare again
                    if(substr($jobInterest,-6)=='person'){
                        $this->db->or_like('JobInterest',substr($jobPart,0,strlen($jobInterest)-6),'both');
                    } else if(substr($jobInterest,-3)=='ers' || substr($jobInterest,-3)=='ing' || substr($jobInterest,-3)=='man'){
                        $this->db->or_like('JobInterest',substr($jobInterest,0,strlen($jobInterest)-3),'both');
                    } else if(substr($jobInterest,-2)=='er' || substr($jobInterest,-2)=='or'){
                        $this->db->or_like('JobInterest',substr($jobInterest,0,strlen($jobInterest)-2),'both');
                    } else if(substr($jobInterest,-1)=='s'){
                        $this->db->or_like('JobInterest',$jobInterest,'both');
                    } 
                }
            $this->db->group_end();
        }
        if(!empty($firstName)){
            $this->db->like('User.FirstName',$firstName);
        }
        if(!empty($lastName)){
            $this->db->like('User.LastName',$lastName);
        }
        if(!empty($suburb)){
            $this->db->where('User.Suburb',$suburb);
        }
        if(!empty($phoneNumber)){
            $this->db->like('User.PhoneNumber',$phoneNumber);
        }
        if(!empty($email)){
            $this->db->where('User.Email',$email);
        }
        $this->db->limit($limitNum, $offsetNum * $limitNum);
        $this->db->order_by('ApplyDate', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }

    // get all citizenships
    // called from: Controller->CandidateMission->index() , Controller->CandidateMission->addingNewCandidateStaffOnly()
    public function get_citizenships(){
        $query = $this->db->get('Citizenship');
        return $query->result_array();
    }

    public function getMaxIDByUserID($userID){
        $mySql = "SELECT MAX(CandidateID) AS MaxID FROM Candidate WHERE UserID='".$userID."'";
        $query = $this->db->query($mySql);
        return $query->row_array();
    }

    public function updateProfilePictureLink($candidateID,$profilePictureLink){
        $data = array(
            'UserPicture' => $profilePictureLink,
        );
        $this->db->where('CandidateID',$candidateID);
        $this->db->update('Candidate',$data);
    }

    // called from: Controller->CandidateMission->manageCandidate() 
    // return the numbers of candidates // extra parameter is just for criteria to match with the other methods in this page
    public function countAll($page="",$city="",$jobType="",$jobInterest="",$firstName="",$lastName="",$suburb="",$email="",$phoneNumber=""){
        $this->db->select('User.City,User.FirstName,User.LastName,User.Suburb,User.Email,User.PhoneNumber,Candidate.*');
        $this->db->from('Candidate');
        $this->db->join('User', 'Candidate.UserID = User.UserID');
       
        if($page == "jobDetails"){
            //if this function is called because of the staff is looking for someone to take the job
            //filter it by the candidate that still hasnt get any job yet
            $this->db->group_start();
                $this->db->where('JobID',NULL);
                $this->db->or_where('JobID',"");
                $this->db->or_where('JobID',0);
            $this->db->group_end();
            $this->db->where('CandidateStatus !=','removed');
        } else if($page == "archive"){
            $this->db->where('CandidateStatus','removed');
        } else {
            $this->db->where('CandidateStatus !=','removed');
        }
        if(!empty($city)){
            $this->db->where('City',$city);
        }
        // if(!empty($jobType)){
        //     $this->db->where('JobType',$jobType);
        // }
        if(!empty($jobInterest)){
            if($page=="jobDetails"){
                 //get the closest match by jobInterest
                $this->db->group_start();
                $this->db->like('Candidate.JobInterest',$jobInterest);
                 //if it contains space split them up and compare each words with the jobInterest request from job
                if(strpos($jobInterest,' ')!==false){
                    $parts = explode(' ',$jobInterest);
                    foreach($parts as $jobPart){
                        
                        if(strlen($jobPart)>2){
                            //remove suffix -er -or -ers -ing -man -person and compare again
                            if(substr($jobPart,-2)=='er' || substr($jobPart,-2)=='or'){
                                $this->db->or_like('JobInterest',substr($jobPart,0,strlen($jobPart)-2));
                            } else if(substr($jobPart,-3)=='ers' || substr($jobPart,-3)=='ing' || substr($jobPart,-3)=='man'){
                                $this->db->or_like('JobInterest',substr($jobPart,0,strlen($jobPart)-3));
                            } else if(substr($jobPart,-6)=='person'){
                                $this->db->or_like('JobInterest',substr($jobPart,0,strlen($jobPart)-6));
                            }
                            $this->db->or_like('JobInterest',$jobPart);
                        }
                    }
                } else {
                    if(substr($jobInterest,-6)=='person'){
                        //remove suffix -er -or -ers -ing -man -person
                        $this->db->or_like('JobInterest',substr($jobInterest,0,strlen($jobInterest)-6));
                    } else if(substr($jobInterest,-3)=='ers' || substr($jobInterest,-3)=='ing'|| substr($jobInterest,-3)=='man'){
                        $this->db->or_like('JobInterest',substr($jobInterest,0,strlen($jobInterest)-3));
                    } else if(substr($jobInterest,-2)=='er' || substr($jobInterest,-2)=='or'){
                        $this->db->or_like('JobInterest',substr($jobInterest,0,strlen($jobInterest)-2));
                    } else if(substr($jobInterest,-1)=='s'){
                        $this->db->or_like('JobInterest',$jobInterest);
                    }  
                }
            $this->db->group_end();
            } else {
                $this->db->like('JobInterest',$jobInterest);
            }
        }
        if(!empty($firstName)){
            $this->db->where('FirstName',$firstName);
        }
        if(!empty($lastName)){
            $this->db->where('LastName',$lastName);
        }
        if(!empty($suburb)){
            $this->db->where('Suburb',$suburb);
        }
        if(!empty($email)){
            $this->db->where('Email',$email);
        }
        if(!empty($phoneNumber)){
            $this->db->like('PhoneNumber',$phoneNumber);
        }
        return $this->db->count_all_results();
    }

    // called from: Controller->CandidateMission->applyFilterCandidate()
    // filter function
    public function getFilterCandidate($page="",$city="",$jobType="",$jobInterest="",$firstName="",$lastName="",$suburb="",$phoneNumber="",$email=""){
        //$mySql = "SELECT User.FirstName, User.LastName, Candidate.* FROM Candidate INNER JOIN User ON Candidate.UserID=User.UserID";
        //$query = $this->db->query($mySql);
        $this->db->select('User.FirstName, User.LastName,User.DOB,User.City,User.Address,User.Suburb,User.PhoneNumber,User.Email,User.Gender,User.VisitedCandidate,User.VisitedClient,Candidate.*');
        $this->db->from('Candidate');
        $this->db->join('User', 'Candidate.UserID = User.UserID');
        
        if($page == "jobDetails"){
            $this->db->group_start();
                $this->db->where('Candidate.JobID',NULL);
                $this->db->or_where('Candidate.JobID',"");
                $this->db->or_where('Candidate.JobID',0);
            $this->db->group_end();
            $this->db->where('CandidateStatus !=','removed');
        } elseif($page == "archive"){
            $this->db->where('Candidate.CandidateStatus','removed');
        } else {
            $this->db->where('CandidateStatus !=','removed');
        }
        
        if(!empty($city)){
            $this->db->where('User.City',$city);
        }
        if(!empty($jobType)){
        $this->db->where('Candidate.JobType',$jobType);
        }
        if(!empty($jobInterest)){
            $this->db->like('Candidate.JobInterest',$jobInterest);
        }
        if(!empty($firstName)){
            $this->db->like('User.FirstName',$firstName);
        }
        if(!empty($lastName)){
            $this->db->like('User.LastName',$lastName);
        }
        if(!empty($suburb)){
            $this->db->where('User.Suburb',$suburb);
        }
        if(!empty($phoneNumber)){
            $this->db->like('User.PhoneNumber',$phoneNumber);
        }
        if(!empty($email)){
            $this->db->where('User.Email',$email);
        }
        $query = $this->db->get();
        return $query->result_array();
    }

    /**
     * Insert functions
     */
    // called from: Controller->CandidateMission->applyJob()
    //insert the candidate data to database
    public function applyJob($data) {
        $this->db->set('ApplyDate', 'NOW()', FALSE);
        $this->db->insert('Candidate', $data);
    }

    /**
     * Update Functions
     */
    //called from: Controller->Applicant->checkCandidate
    //update the check status to be true
    public function checkCandidate($candidateID){
        $data = array(
            'Checked' => 'true'
        );
        $this->db->where('CandidateID', $candidateID);
        $this->db->update('Candidate', $data);
    }
    
    public function updatePasswdByEmail($email, $userPasswd){
        $data = array(
            'UserPasswd' => $userPasswd
        );
        $this->db->where('Email', $email);
        $this->db->update('User', $data);
    }

    // called from: Controller->CandidateMission->uploadCV()
    // update jobCV by ID, storing the downloadInformation by filename.extension
    public function updateLinkByID($candidateID, $fileName){
        $data = array(
            'JobCV' => $fileName
        );
        $this->db->where('CandidateID', $candidateID);
        $this->db->update('Candidate', $data);
    }

    //called from: view->templates->header
    //return the number of unchecked job as notification
    public function countNumberUncheckedCandidate($visitedTimeCandidate){
        $mySql = "SELECT ApplyDate FROM Candidate WHERE CandidateStatus !='removed' AND ApplyDate > " . $this->db->escape($visitedTimeCandidate);
        $query = $this->db->query($mySql);
        return $query->num_rows();
    }

    //called from: Controller->CandidateMission->removeCandidateApplication()
    //change the candidate status to removed so it wont appear in the application table anymore
    public function removeCandidateApp($candidateID){
        $data = array(
            'CandidateStatus' => 'removed',
            'Checked' => 'true',
        );
        $this->db->where('CandidateID',$candidateID);
        $this->db->update('Candidate',$data);
    }

    //called from: Controller->CandidateMission->UpdateCandidateDetails()
    //update the every field in candidate
    public function updateCandidateDetails($candidateID,$data){
        $this->db->where('CandidateID',$candidateID);
        
        $this->db->update('Candidate',$data);
    }

    public function updateTimeChanged($candidateID){
        $this->db->where('CandidateID',$candidateID);
        
        // $dt = new DateTime('now', new DateTimezone('NZ'));
        // $dt->format('Y-m-d H:i:s');
        // date_default_timezone_set('NZ');
        // $dateTimeStamp = date('Y-m-d H:i:s');
        $data = array(
        );
        
        $this->db->set('ApplyDate', 'NOW()', FALSE);
       
        $this->db->update('Candidate',$data);
    }

    //called from: Controller->CandidateMission->updateYoutubeLink()
    //updating youtube link for the candidate
    public function updateYoutubeLink($candidateID,$data){
        $this->db->where('CandidateID',$candidateID);
       
        $this->db->update('Candidate',$data);
    }

    public function updateCVLink($CandidateID,$CVfile){
        $this->db->where('CandidateID',$CandidateID);
        $data['JobCV'] = $CVfile;
        $this->db->set('ApplyDate', 'NOW()', FALSE);
        $this->db->update('Candidate',$data);
    }

    //called from: Controller->CandidateMission->updateCVfile()
    //updating CV file for specific candidate
    public function updateCVLink($candidateID,$CVfile){
        $this->db->where('CandidateID',$candidateID);
        $data = array(
            'JobCV' => $CVfile,
        );
        $this->db->set('ApplyDate', 'NOW()', FALSE);
        $this->db->update('Candidate',$data);
    }
}
