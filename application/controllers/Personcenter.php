<?php

class Personcenter extends CI_Controller {

	function __construct() {
		parent::__construct();
		
		// Load url helper
		$this->load->helper('url');
		$this->load->helper('security');
		$this->load->model('User_model');
		$this->load->library('session');
		$this->load->model('city_model');
	}
	
	//the page where the user are redirected when they login
	//inside personcenter/main it loads different view based on userType
	
	public function index()
	{	
        // Check username and the passwd
		if(! isset($_SESSION['userType'])){
			redirect('/login/index');
		}
		
		$userdata['userEmail'] = $_SESSION['userEmail'];
		$userdata['userType'] = $_SESSION['userType'];
		$data['firstName'] = $_SESSION['firstName'];
        $data['message'] = "Please Login";
		$data['title'] = "Dashboard";
		$this->load->view('templates/header', $userdata);
        $this->load->view('personcenter/main', $data);
        $this->load->view('templates/footer');
	}
	

	//load the page that are only accessible by UserType admin
	//3 functions that are available in this page : 
	//Personcenter->newStaffPassword
	//Personcenter->removeStaff
	//Register->newStaff
	public function manageStaff(){
		
		$userdata['userType'] = $_SESSION['userType'];
		
		if($_SESSION['userType']=='admin' || $_SESSION['userType'] == 'staff'){

			$data['title'] = "Manage Staff";
			$data['message'] ="";
			$data['staffs'] = $this->User_model->getAllStaff();
			
			$data['userID'] = $_SESSION['userID'];
			$data['userEmail'] = $_SESSION['userEmail'];
			$this->load->view('templates/header',$userdata);
			$this->load->view('settings/tabHeader',$data);
			$this->load->view('settings/personalInfo',$data);
			
			$this->load->view('settings/manageStaff',$data);
				
			$this->load->view('settings/vue');
			$this->load->view('templates/footer');
		} else {
			redirect('/');
		}
	}

	//called from: view->staffManager->changeStaffPassword
	//a function that is called from manageStaff that are only accessible by userType admin
	//updating the password of the staff based on the staff ID
	//calling the model of user_model->update_staffPassword($staffID,$password);
	public function newStaffPassword(){

		$userdata['userType'] = $_SESSION['userType'];
		
		if($_SESSION['userType']=='admin'){

			$staffID = $_POST['staffID'];
			$password = $_POST['newPassword'];
			$data['title'] = "Manage Staff";
			$data['message'] ="";
			$this->User_model->update_staffPassword($staffID,$password);
			$data['staffs'] = $this->User_model->getAllStaff();
			
			$data['userID'] = $_SESSION['userID'];
			$data['title'] = "Settings";
			$data['userEmail'] = $_SESSION['userEmail'];
			$this->load->view('templates/header',$userdata);
				$this->load->view('settings/tabHeader',$data);
				$this->load->view('settings/personalInfo',$data);
				$this->load->view('settings/manageStaff',$data);
				
				$this->load->view('settings/vue');
			$this->load->view('templates/footer');
		} else {
			redirect('/');
		}
	}

	//called from: view->staffManager->removeStaff
	//a function that is called from manageStaff that are only accessible by userType admin
	//removing staff based on the staff ID
	//calling the model of user_model->delete_staff($staffID);
	public function removeStaff(){
		$userdata['userType'] = $_SESSION['userType'];
		
		if($_SESSION['userType']=='admin'){
		
			$encryptPass = do_hash( $_POST['adminPassword'], 'sha256');
			$staffID = $_POST['staffID'];
			$data['message'] = "";
			//validate the administrator password, so no one could come and update it except for the one that know the password
			if($_SESSION['userPassword'] != $encryptPass){
				$data['message'] = "wrong administrator password failure in removing staff";
			} else {
			$this->User_model->delete_staff($staffID);
			}
			$data['userID'] = $_SESSION['userID'];
			$data['title'] = "Manage Staff";
			$data['userEmail'] = $_SESSION['userEmail'];
			$data['staffs'] = $this->User_model->getAllStaff();
			
			

			$this->load->view('templates/header',$userdata);
				$this->load->view('settings/tabHeader',$data);
				$this->load->view('settings/personalInfo',$data);
				$this->load->view('settings/manageStaff',$data);
					
				$this->load->view('settings/vue');
			$this->load->view('templates/footer');
			
		} else {
			redirect('/');
		}
	}

	//called from: view->personcenter->main --- view->personcenter->adminPanel , view->personcenter->personalPanel , view->personcenter->staffPanel
	//in this page , the users could see their information or update it if they wishes for it
	//with data saved from session
	public function personalInfo(){
		
		$userdata['userType'] = $_SESSION['userType'];
		
		if(!(isset($_SESSION['userType']))){
			redirect('/');
		}
		
		$data['userID'] = $_SESSION['userID'];
		$data['title'] = "Settings";
		$data['userEmail'] = $_SESSION['userEmail'];
		$data['message'] = '';
		$data['staffs'] = $this->User_model->getAllStaff();
		
		$data['title'] = "personalInfo";

		$this->load->view('templates/header',$userdata);
			$this->load->view('settings/tabHeader',$data);
			$this->load->view('settings/personalInfo',$data);
			$this->load->view('settings/manageStaff',$data);
			
			$this->load->view('settings/vue');
		$this->load->view('templates/footer');
	}

	//called from: view->pages->personalInfo
	//update details function that are available from the personalInfo Page
	//updating a user password calling a user_model->update_personalPassword($userID,$newPassword);
	public function updatePassword(){
		if(!(isset($_SESSION['userType']))){
			redirect('/');
		}

		$userdata['userType'] = $_SESSION['userType'];
		$userID = $_SESSION['userID'];
		
		$encryptPass = do_hash( $_POST['oldPassword'], 'sha256');
		$data['message'] = "";
		
		$data['staffs'] = $this->User_model->getAllStaff();
		
		

		if(isset($_POST['newPassword'])){
			//check user new password, the length should be atleast 6 digits
			//allowed character allAlphabets,digits, !@#$%^&*()-+._
            if(preg_match('%^[a-zA-Z0-9!@#\$\%\^&\*\(\)\-\+\.\?_]{6,}$%',stripslashes(trim($_POST['newPassword'])))){
				$newPassword = $this->security->xss_clean($_POST['newPassword']);
				//check the authenticity
				if(($_SESSION['userPassword'] != $encryptPass)){
					$data['message'] = "The password you entered in Current Password input box is not the same as your current password, failed to update password";
				} else {
					//update it into newone
					$this->User_model->update_personalPassword($userID,$newPassword);
					$data['message'] = "Success! Your password has been changed";
					$_SESSION['userPassword'] = do_hash($newPassword,'sha256');
				}
            } else {  $data['message']='Invalid User Password, length is too short or the usage of unallowed special characters';}
        } else {$data['message']='Please enter a new password';}
		
		$data['userID'] = $_SESSION['userID'];
		$data['title'] = "personalInfo";
		$data['userEmail'] = $_SESSION['userEmail'];
		
		$this->load->view('templates/header',$userdata);
			$this->load->view('settings/tabHeader',$data);
			$this->load->view('settings/personalInfo',$data);
			$this->load->view('settings/manageStaff',$data);
			$this->load->view('settings/vue');
		$this->load->view('templates/footer');
	}

	//called from: view->personcenter->main
	//update the preference panel for specific user
	public function updatePanelPreference(){
		if($_SESSION['userType']=='admin' || $_SESSION['userType'] == 'staff'){

			$data['UserID'] = $_POST['userID'];
			$data['PreferencePanel'] = $_POST['preferencePanel'];
			$_SESSION['preferencePanel'] = $_POST['preferencePanel'];
			$this->User_model->updatePanelPreference($data['UserID'],$data);
		
		} else {
			redirect('/');
		}
	}
	
	
}