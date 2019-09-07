<?php
class User_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }

    /**
     * Select Functions
    */
    // called from: Controller->Login->login(), Controller->Register->sendPasswd()
    // get the data based on email
    public function getUserByEmail($userEmail){
        $this->db->where('Email', $userEmail);
        $query = $this->db->get('User');
        return $query->row_array();
    }

    // called from: Controller->Register->index()
    // get all users so we can compare the email when the user tried to register an email with that alrdy exists
    public function getUsers(){
        $query = $this->db->get('User');
        return $query->result_array();
    }
    
   

    //called from: Controller->Personcenter->manageStaff(), 
    //Controller->Personcenter->newStaffPassword(),
    //Controller->Personcenter->removeStaff(),
    //Controller->Register->newStaff(),
    //show all the staff in database
    public function getAllStaff(){
        $this->db->where('UserType', 'staff');
        $query = $this->db->get('User');
        return $query->result_array();
    }

    //called from: Controller->Personcenter->newStaffPassword()
    //change the password of the staff based on id
    public function update_staffPassword($staffID, $newpassword){

        $password = do_hash($newpassword, 'sha256');
        $data = array(
            'UserID' => $staffID,
            'UserPasswd' => $password
        );
        $this->db->where('UserType','staff');
        $this->db->where('UserID', $staffID);
        $this->db->update('User', $data);
    }

    //called from: Controller->personcenter->removeStaff()
    //remove staff from database
    public function delete_staff($staffID) {
        $data = array(
            'UserID' => $staffID
        );
        $this->db->where('UserID',$staffID);
        $this->db->delete('User',$data);
    }

    //called from: Controller->Personcenter->updatePassword()
    //update the user own password
    public function update_personalPassword($userID, $newpassword){
        $password = do_hash($newpassword, 'sha256');
        $data = array(
            'UserID' => $userID,
            'UserPasswd' => $password
        );
       
        $this->db->where('UserID', $userID);
        $this->db->update('User', $data);
    }

    //called from: Controller->Personcenter->updateDetails()
    //updating the user information: firstname,lastname,city,address,DOB,zip,suburb,phone
    public function update_personalDetails($userID,$data){
        $this->db->where('UserID', $userID);
        $this->db->update('User', $data);
    }

    //called from: Controller->CandidateMission->updateCandidateDetails()
    //update the user Information
    public function updateUserDetails($userID,$data){
        $this->db->where('UserID',$userID);
        $this->db->update('User',$data);
    }
}
