<?php
class ContactUS extends CI_Controller{
    function __construct() {
		parent::__construct();
		
		// Load url helper
		$this->load->helper('url');
		$this->load->helper('security');

		$this->load->library('session');
	}

    //loading the page of contactUS
    public function index(){

        $userdata['userType'] = 'anyone';
        if(isset($_SESSION['userEmail'])){
            $userdata['userEmail'] = $_SESSION['userEmail'];
			$userdata['userType'] = $_SESSION['userType'];
		}
        $this->load->view('templates/header', $userdata);
        $this->load->view('pages/contactUS');
        $this->load->view('templates/footer');

    }

    /**
     * Methods for AJAX
     */
    //sending a message by email to marklee
    //a function that is available in ContactUS->index
    public function sendMessage(){
        $userName = $this->security->xss_clean(stripslashes(trim($this->input->post('userName'))));
        $userEmail = $this->security->xss_clean(stripslashes(trim($this->input->post('userEmail'))));
        $userContact = $this->security->xss_clean(stripslashes(trim($this->input->post('userContact'))));
        $userMessage = $this->security->xss_clean(stripslashes(trim($this->input->post('userMessage'))));

        /**
         * Email config
         */
        
        /* Sugarhosting
        $to      = 'leekunhui@gmail.com';
        $subject = 'Message from Website';
        $message = 'Name: '.$userName.'; Email: '.$userEmail.'; Contact: '.$userContact.';\n Message:'.$userMessage;
        $headers = 'From: carl@markleetesting12300.name' . "\r\n" .
            'Return-Path: carl@markleetesting12300.name' . "\r\n" .
            'Reply-To: carl@markleetesting12300.name' . "\r\n";
        mail($to, $subject, $message, $headers);
        */

        // sendgrid
        $config['smtp_host'] = '';
        $config['smtp_user'] = 'apikey';
        $config['smtp_pass'] = '';
        
        $config['smtp_port'] = '587';
        $config['smtp_crypto'] = 'tls';
        // $config['mailtype'] = 'html';

        $this->email->initialize($config);

        $this->email->from('apikey@sendgrid.net');
        $this->email->to('leekunhui@gmail.com');
        $this->email->subject('Message from the Website');
        $message = 'Name: '.$userName.' Email: '.$userEmail.' Contact: '.$userContact.' Message:'.$userMessage;
        $this->email->message($message);
        
        if($this->email->send()){
            $message = 'Successfully';
        } else {
            $message = 'Failed';
        }

        echo $message;
     }
}