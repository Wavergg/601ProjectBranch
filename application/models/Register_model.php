<?php
class Register_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }

    /**
     * Select Functions
    */
    // get all sale, available = yes
    public function get_sale(){
        $this->db->where('AVAILABLE', 'yes');
        $query = $this->db->get('SALE');
        return $query->result_array();
    }

    public function get_sale_id($sale_id){
        $this->db->where('SALE_ID', $sale_id);
        $query = $this->db->get('SALE');
        
        return $query->row_array();
    }

    /**
     * Insert functions
     */
    // called from: Controller->CandidateMission->addUserByStaff(), Controller->Register->newUser(), Controller->Register->newStaff()
    // Insert a new user into user table
    public function addUser($firstName, $lastName, $userEmail, $userPasswd, $Address, $City, $ZipCode, $Suburb, $userType, $PhoneNumber, $DOB, $gender) {
        $data = array(
            'FirstName' => $firstName,
            'LastName' => $lastName,
            'Email' => $userEmail,
            'UserPasswd' => $userPasswd,
            'Address' => $Address,
            'City' => $City,
            'ZipCode' => $ZipCode,
            'Suburb' => $Suburb,
            'UserType' => $userType,
            'PhoneNumber' => $PhoneNumber,
            'DOB' => $DOB,
            'Gender' => $gender
        );
        $this->db->insert('User', $data);
    }
    

    /**
     * Update Functions
     */

    public function update_sale($sale_id, $sale_name, $sale_email){
        $data = array(
            'SALE_NAME' => $sale_name,
            'SALE_EMAIL' => $sale_email
        );
        $this->db->where('SALE_ID', $sale_id);
        $this->db->update('SALE', $data);
    }

    public function remove_sale($sale_id){
        $data = array(
            'AVAILABLE' => 'no'
        );
        $this->db->where('SALE_ID', $sale_id);
        $this->db->update('SALE', $data);
    }
}
