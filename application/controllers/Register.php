<?php
/* Functions
 * 1. List all boat models. => index
 * 2. 
 * AJAX:
 * 1. return check list item as per boat model ID
 */

class Register extends CI_Controller {
    function __construct() {
		parent::__construct();
		
		// Load url helper
        $this->load->helper('url');
        $this->load->helper('security');
        // Load Models
        $this->load->model('register_model');
        $this->load->model('user_model');
        $this->load->library('session');
        $this->load->library('email');
        $this->load->model('City_model');
    }

    //loading the register page
    public function index(){
                
        $userdata['userType'] = 'anyone';

        $data['users'] = $this->user_model->getUsers();
        $data['cities'] = $this->City_model->get_cities();
        $data['message'] = array();
        $this->load->view('templates/header', $userdata);
        $this->load->view('pages/register', $data);
        $this->load->view('templates/footer');
    }

    //called from: view->pages->register
    //method when the user submit the form, in register page
    public function newUser(){
       
    if(isset($_POST['submittedForm'])){
        $errorIsTrue = false;
        $errMessage = array();
        //form validation start
        if(isset($_POST['Email'])){
            if(preg_match('%^[a-zA-Z0-9\._\+\-]+@[a-zA-Z0-9\.\-]+\.[A-Za-z]{2,4}$%',stripslashes(trim($_POST['Email'])))){
                $userEmail = $this->security->xss_clean($_POST['Email']);
            } else { $errorIsTrue = true; array_push($errMessage,'Invalid Email Address');}
        } else { $errorIsTrue = true; array_push($errMessage,'Please enter an email address');}
        
        if(isset($_POST['password'])){
            if(preg_match('%^[a-zA-Z0-9!@#\$\%\^&\*\(\)\-\+\.\?_]{6,}$%',stripslashes(trim($_POST['password'])))){
                $userPasswd = $this->security->xss_clean($_POST['password']);
            } else { $errorIsTrue = true;  array_push($errMessage,'Invalid UserPassword');}
        } else { $errorIsTrue = true; array_push($errMessage,'Please enter a password');}

        if(isset($_POST['firstName'])){
            if(preg_match('%^[a-zA-Z\.\'\-\"\, ]{2,}$%',stripslashes(trim($_POST['firstName'])))){
                $firstName = $this->security->xss_clean($_POST['firstName']);
            } else { $errorIsTrue = true; array_push($errMessage,'Error The firstname you entered, was redeemed as invalid. The reason for this is because it contains disallowed special character or it is too short. Failed to register User');}
        } else { $errorIsTrue = true; array_push($errMessage,'Please enter First Name');}

        if(isset($_POST['lastName'])){
            if(preg_match('%^[a-zA-Z\.\'\-\"\, ]{2,}$%',stripslashes(trim($_POST['lastName'])))){
                $lastName = $this->security->xss_clean($_POST['lastName']);
            } else { $errorIsTrue = true; array_push($errMessage,'Error The last name you entered, was redeemed as invalid. The reason for this is because it contains disallowed special character or it is too short. Failed to register User');}
        } else { $errorIsTrue = true; array_push($errMessage,'Please enter Last Name');}
        
        if(isset($_POST['DOB'])){
            if(preg_match('%^[1|2]{1}(9[0-9][0-9]|0[0-9][0-9])-(0[0-9]|1[0|1|2])-(0[0-9]|1[0-9]|2[0-9]|3[0-1])$%',stripslashes(trim($_POST['DOB'])))){
                if($_POST['DOB']<date("Y-m-d")){
                    $DOB = $this->security->xss_clean($_POST['DOB']);
                } else { $errorIsTrue = true; array_push($errMessage,'The Date Of Birth / DOB field cant be bigger than current Date');}
            } else { $errorIsTrue = true; array_push($errMessage,'Error The Date is invalid format');}
        } else { $errorIsTrue = true; array_push($errMessage,'Please enter Date of birth');}
        
        //address must contains number
        if(isset($_POST['Address'])){
            if(preg_match('%^([a-zA-Z\.\,\'"&:/\- ]+[ ]?[#]?[0-9][a-zA-Z0-9 ]*|[#]?[ ]?[0-9]+[ ]?[a-zA-Z][ a-zA-Z0-9\.\,\'"&:/\-]*)$%',stripslashes(trim($_POST['Address'])))){
                $Address = $this->security->xss_clean($_POST['Address']);
            } else {
                $errorIsTrue = true; array_push($errMessage,'invalid address, contains unallowed special characters or it\'s incomplete');
            }
        } else { $errorIsTrue = true; array_push($errMessage,'Please enter An address');}
        
        //check whether the city is entered correctly, based on database
        $data['cities'] = $this->City_model->get_cities();
        $cities = array();
        foreach($data['cities'] as $city){
            array_push($cities,$city['CityName']);
        }

        if (in_array($_POST['City'], $cities)) {
            $City = $this->security->xss_clean(stripslashes(trim($_POST['City'])));
        } else {
            $errorIsTrue = true; array_push($errMessage,'invalid city, the city doesnt exists in New Zealand');
        }

        //4 digits zipcode
        if(isset($_POST['ZipCode'])){
            if(preg_match('%^\d{4}$%',stripslashes(trim($_POST['ZipCode'])))){
                $ZipCode = $this->security->xss_clean($_POST['ZipCode']);
            } else { $ZipCode="0000";}
        
        } else { $ZipCode = "0000";}

        if(isset($_POST['Suburb'])){
            if(preg_match('%^[a-zA-Z\s/\.\'\(\)&:\,\"\-]+$%',stripslashes(trim($_POST['Suburb'])))){
                $Suburb = $this->security->xss_clean($_POST['Suburb']);
            } else { $Suburb ="Undefined";}
        
        } else { $Suburb = "Undefined";}

        if(isset($_POST['PhoneNumber'])){
            if(preg_match('%^[\+]?\(?[\+]?[0-9]{1,4}\)?[\- \.]?\(?[0-9]{2,4}[\-\. ]?[0-9]{2,4}[\-\. ]?[0-9]{0,6}?\)?$%',stripslashes(trim($_POST['PhoneNumber'])))){
                $PhoneNumber = $this->security->xss_clean($_POST['PhoneNumber']);
            } else { $errorIsTrue = true; array_push($errMessage,'Invalid Phone number');}
        } else { $errorIsTrue = true; array_push($errMessage,'Please enter a phone number');}

        if($_POST['gender']=='male' || $_POST['gender'] == 'female')
        {
        $gender = $this->security->xss_clean(stripslashes($_POST['gender']));
        } else {$gender = 'undefined';}
        //form validation end

        $data['message'] = $errMessage;
        
        //if there is no error in form validation enter it into database else print the error out
        if(!$errorIsTrue){
        $userType = 'candidate';
        $userPasswd = do_hash($userPasswd, 'sha256');

        $this->register_model->addUser($firstName, $lastName, $userEmail, $userPasswd, $Address, $City, $ZipCode, $Suburb, $userType, $PhoneNumber, $DOB, $gender);
        $userdata['userType'] = 'anyone';
        $message['wrongInfo'] = 'undefined';
       
        $this->load->view('templates/header', $userdata);
        $this->load->view('login/main',$message);
        $this->load->view('templates/footer');
        } else {
            $userdata['userType'] = 'anyone';
            $this->load->view('templates/header', $userdata);
            $this->load->view('pages/register',$data);
            $this->load->view('templates/footer');
        }
    }
        
    }

    //called from: view->staffManager->addStaff
    //method when admin add a new user himself as a staff
    public function newStaff(){
        if($_SESSION['userType']=='admin'){
         if(isset($_POST['submittedFormStaffing'])){
            $errorIsTrue = false;
            $data['message'] = "";
            $userPasswd = "";
            //form validation start
            if(isset($_POST['email'])){
                if(preg_match('%^[a-zA-Z0-9\._\-\+]+@[a-zA-Z0-9\.\-]+\.[A-Za-z]{2,4}$%',stripslashes(trim($_POST['email'])))){
                    $userEmail = $_POST['email'];
                } else { $errorIsTrue = true; $data['message'] = 'Invalid Email Address';}
            } else { $errorIsTrue = true; $data['message'] = 'Please enter an email';}
            
            $data['staffs'] = $this->user_model->getAllStaff();
            foreach($data['staffs'] as $staffs){
                if($_POST['email'] == $staffs['Email']){
                    $errorIsTrue = true; $data['message'] = 'The user with this email already exists';
                }
            }
            if(isset($_POST['password'])){
                if(preg_match('%^[a-zA-Z0-9!@#\$\%\^&\*\(\)\-\+\.\?_]{6,}$%',stripslashes(trim($_POST['password'])))){
                    $userPasswd = $_POST['password'];
                } else { $errorIsTrue = true;  $data['message'] = 'Invalid User Password, Failure in registering user';}
            } else { $errorIsTrue = true; $data['message'] = 'Please enter a password';}

            $firstName = $_POST['firstName'];
            $lastName = $_POST['lastName'];
            //form validation end
            $DOB = '';
            $Address = '';
            $City = '';
            $ZipCode = '';
            $Suburb = '';
            $PhoneNumber = '';
            $gender = '';
            
            $userType = 'staff';
            $userPasswd = do_hash($userPasswd, 'sha256');

            //if error is encountered give a warning else insert the data into database
            if(!$errorIsTrue){
            $this->register_model->addUser($firstName, $lastName, $userEmail, $userPasswd, $Address, $City, $ZipCode, $Suburb, $userType, $PhoneNumber, $DOB, $gender);
            } 
            $userdata['userType'] = $_SESSION['userType'];
            $data['userID'] = $_SESSION['userID'];

			$data['userEmail'] = $_SESSION['userEmail'];
            $data['title'] = "Manage Staff";
            
            $data['staffs'] = $this->user_model->getAllStaff();
            $this->load->view('templates/header',$userdata);
                $this->load->view('settings/tabHeader',$data);
                $this->load->view('settings/personalInfo',$data);
                $this->load->view('settings/manageStaff',$data);
                $this->load->view('settings/vue');
            $this->load->view('templates/footer');
         }
        } else {
            redirect('/');
        }
    }

    
    /**
     * AJAX
     */
    //called from: view->login->forgotPassword
    //AJAX Method
    //send password by email if the user is requested it
    public function sendPasswd(){
        if(isset($_POST['email'])){
            if(preg_match('%^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[A-Za-z]{2,4}$%',stripslashes(trim($_POST['Email'])))){
                $userEmail = $_POST['Email'];
            } 
        }


        // Random a string
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < 10; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        
        $userPasswd = do_hash($randomString, 'sha256');

        // check the email
        $data['user'] = $this->user_model->getUserByEmail($userEmail);
        if($data['user'] != null){
            // update the user information by email
            $this->user_model->updatePasswdByEmail($userEmail, $userPasswd);

            /**
             * development config
             */
            
            $config['smtp_host'] = 'smtp.google.com';
            $config['smtp_user'] = 'kunhuilearners1@gmail.com';
            $config['smtp_pass'] = 'diligence';
            $config['smtp_port'] = '587';
            
            $config['smtp_crypto'] = 'tls';
            
            $this->email->from('kunhuilearners1@gmail.com', 'Carl Lee');
            $this->email->to($userEmail);

            $this->email->subject('Message from Mark Lee');
            $this->email->message('Your new password: '.$randomString);

            if($this->email->send()){
                echo "New password was sent to you email.";
            } else {
                echo "Email was send failed, please try again later.";
            }
            
            echo 'Password was reset';
        } else {
            echo 'The email is not exist.';
        }
    }
}