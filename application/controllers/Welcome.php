<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct() {
		parent::__construct();
		
		// Load url helper
		$this->load->helper('url');
		$this->load->helper('security');

		$this->load->library('session');
	}
	public function index()

	{	
		
	}

	public function send(){
		$this->load->library('email');
		$config = array(
			'mailtype' => 'html',
			'smtp_host' => 'smtp.google.com',
			'smtp_user' => 'ultimateformj@gmail.com',
			'smtp_pass' => '[yourpassword]',
			'smtp_crypto' => 'tls',
			'smtp_port' => 587
		);
		$this->email->initialize($config);

		$this->email->from('ultimateformj@gmail.com', 'William');
		$this->email->to('ultimateformj@gmail.com');

		$this->email->subject('Email Test');
		$this->email->message(str_replace("{contents}",$this->email_text(),$this->email_template()));
		if($this->email->send()){
			echo "email has been sent thanks";
		} else {
			echo $this->email->print_debugger();
		}
	}

	public function email_text(){
		return '<h1>William test message</h1>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
		Excepturi similique accusamus ipsa beatae earum cupiditate quo, 
		iure doloribus minus provident modi, culpa consequuntur. 
		Nesciunt obcaecati neque, quidem earum dolorem quisquam!</p>';	
	}

	public function email_template(){
		$_template='';
		$_template.='<!DOCTYPE html>';
		$_template.='<html lang="en">';
		$_template.='<head>';
		$_template.='<meta charset="UTF-8">';
		$_template.='<meta name="viewport" content="width=device-width, initial-scale=1.0">';
		$_template.='<meta http-equiv="X-UA-Compatible" content="ie=edge">';
		$_template.='<title>Document</title>';
		$_template.='</head>';
		$_template.='<body>';
		$_template.='{contents}';
		$_template.='</body>';
		$_template.='</html>';
		return $_template;
	}
}
