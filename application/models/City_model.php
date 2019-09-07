<?php


Class City_model extends CI_Model{

    public function __construct() {
        $this->load->database();
    }

    //called from: Controller->CandidateMission->addingNewCandidateStaffOnly()
    //Controller->EmployerMission->index(), 
    //Controller->EmployerMission->addJob(),
    //Controller->Home->index(),
    //Controller->Jobs->index(),
    //Controller->Personcenter->personalInfo(),
    //Controller->Personcenter->updatePassword(),
    //Controller->Personcenter->updateDetails(),
    //Controller->Register->index(),
    //Controller->Register->newUser(),
    //get list of city in NZ from database
    public function get_cities(){
        $query = $this->db->get('City');
        return $query->result_array();
    }

}