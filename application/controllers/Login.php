<?php
/* Functions
 * 1. This is a login and session test page
 */

class Login extends CI_Controller {
    function __construct() {
		parent::__construct();
		
		// Load url helper
        $this->load->helper('url');
        $this->load->helper('security');
        $this->load->library('session');
        // Load Models
        $this->load->model('user_model');
    }

    //load the login page
    function index(){
        $userdata['userType'] = 'anyone';
        $message['wrongInfo'] = 'undefined';
        $this->load->view('templates/header', $userdata);
        $this->load->view('login/main',$message);
        $this->load->view('templates/footer');
    }

    //called from: view->login->main
    //function after they clicked submit button in login page
    public function login(){
        // When someone enter this link without login, it should be redirected to login/index
        if(isset($_POST['submittedLoginForm'])){
        if(isset($_POST['Email'])){
            
            $userEmail = $this->security->xss_clean(stripslashes(trim($_POST['Email'])));
            $userPasswd = $this->security->xss_clean(stripslashes(trim($_POST['Password'])));
            $userPasswd = do_hash($userPasswd, 'sha256');
            // get the user's information from database
            $data['user'] = $this->user_model->getUserByEmail($userEmail);
            //compare password that user entered and the password that are stored in database
            if($data['user']['UserPasswd'] == $userPasswd && strlen($_POST['Password']) > 5){
                //array that are assigned to session KVP
                $newdata = array(
                    'candidateID' => '',
                    'userEmail' => $userEmail,
                    'userID' => $data['user']['UserID'],
                    'userType' => $data['user']['UserType'],
                    'firstName' => $data['user']['FirstName'],
                    'lastName' => $data['user']['LastName'],
                    'userPassword' => $data['user']['UserPasswd'],
                    'DOB' => $data['user']['DOB'],
                    'address' => $data['user']['Address'],
                    'city' => $data['user']['City'],
                    'zip' => $data['user']['ZipCode'],
                    'suburb' => $data['user']['Suburb'],
                    'phoneNumber' => $data['user']['PhoneNumber'],
                    'visitedCandidate' => $data['user']['VisitedCandidate'],
                    'visitedClient' => $data['user']['VisitedClient'],
                    'preferencePanel' => $data['user']['PreferencePanel'],
                );
                //set the session from array
                $this->session->set_userdata($newdata);

                redirect('/personcenter/index');
            } else {
              
                $userdata['userType'] = 'anyone';
                
                $message['wrongInfo'] = "invalidInfo";
                $this->load->view('templates/header', $userdata);
                $this->load->view('login/main',$message);
                $this->load->view('templates/footer');
            }
        
        } else {
            redirect('/login/index');
        }
        } else {redirect('/login/index');}
    }

    //when logout button is pressed remove the session entirely
    public function logout(){
        $this->session->sess_destroy();
        redirect('home/index/');
    }


    /**
     * AJAX
     */
}