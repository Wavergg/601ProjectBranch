<?php
class Client_model extends CI_Model {
    public function __construct() {
        $this->load->database();
       
    }

  
    /**
     * Insert functions
     */
    // Called from: Controller->EmployerMission->addJob()
    // Insert a new Client into database
    public function addClient($clientTitle,$clientName,$clientCompany,$clientEmail,$clientContact,$clientCity,$clientAddress,$suburb) {
        $data = array(
            'ClientTitle' => $clientTitle,
            'ClientName' => $clientName,
            'Company' => $clientCompany,
            'Email' => $clientEmail,
            'ContactNumber' => $clientContact,
            'City' => $clientCity,
            'Address' => $clientAddress,
            'Suburb' => $suburb,
        );
        $this->db->set('UpdateDate', $this->db->escape(date('Y-m-d H:i:s')), FALSE);
        $this->db->insert('Client', $data);
    } 


    //updateThe data for specific client
    public function updateClientData($clientID,$clientTitle,$clientName,$clientCompany,$clientEmail,$clientContact,$clientCity,$clientAddress,$suburb){
        $this->db->where('ClientID',$clientID);
        $data = array(
            'ClientTitle' => $clientTitle,
            'ClientName' => $clientName,
            'Company' => $clientCompany,
            'Email' => $clientEmail,
            'ContactNumber' => $clientContact,
            'City' => $clientCity,
            'Address' => $clientAddress,
            'Suburb' => $suburb,
        );
        $this->db->set('UpdateDate', $this->db->escape(date('Y-m-d H:i:s')), FALSE);
        $this->db->update('Client', $data);
    }

    

    public function getClientById($clientID){
        $this->db->where('ClientID',$clientID);
        $query = $this->db->get('Client');
        return $query->row_array();
    }


    //called from: Controller->EmployerMission->addJob()
    public function getClientByData($clientName,$clientCompany){
        $this->db->where('ClientName',$clientName);
        $this->db->where('Company',$clientCompany);
        $this->db->select_max('ClientID');
        $query = $this->db->get('Client');
        return $query->row_array();
    }

    //called from: Controller->EmployerMission->addClient()
    public function countClientByData($clientName,$clientCompany){
        $this->db->where('ClientName',$clientName);
        $this->db->where('Company',$clientCompany);
        
        return $this->db->count_all_results('Client');
    }
    
    // Called from: Controller->Jobs->manageClient()
    public function get_clients($offset=0) {
        //if it's called from archive page get the status of completed only
      
        $data = array('completed','deleted');
        $this->db->where_not_in('ClientStatus',$data);
        $this->db->limit(10,$offset * 10);

        $this->db->order_by('UpdateDate', 'DESC');
        $query = $this->db->get('Client');
        return $query->result_array();
    }

    
}
