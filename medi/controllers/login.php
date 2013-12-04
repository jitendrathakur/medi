<?php

class Login extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		
		
		force_ssl();
		
		$this->load->library('Auth');		
		$this->lang->load('login');

		$this->_ci =& get_instance();

		//load config
		$this->_ci->load->config('twilio', TRUE);
		
		$this->number      = $this->_ci->config->item('number', 'twilio');
		

	}


	function index()
	{

		$google = false;
		
		if (!empty($_GET['openid_ext1_value_firstname']) && !empty($_GET['openid_ext1_value_lastname']) && !empty($_GET['openid_ext1_value_email'])) {  

		    $username = $_GET['openid_ext1_value_firstname'] .' '. $_GET['openid_ext1_value_lastname'];
		    $email_google = $_GET['openid_ext1_value_email'];
          
			$google = true;			
		}
	
		//we check if they are logged in, generally this would be done in the constructor, but we want to allow customers to log out still
		//or still be able to either retrieve their password or anything else this controller may be extended to do
		$redirect	= $this->auth->is_logged_in(false, false);
		//if they are logged in, we send them back to the dashboard by default, if they are not logging in
		if ($redirect)
		{
			if($this->auth->check_access('Normal'))
			{
				//redirect($this->config->item('admin_folder').'/forms/wellness_form');
			}
			if($this->auth->check_access('Therapists'))
			{
				//$redirect = $this->config->item('admin_folder').'/forms/core1_list';
			 					 
			}
			if($this->auth->check_access('supert'))
			{
				//$redirect = $this->config->item('admin_folder').'/supert/';
			 					 
			}
			$redirect = $this->config->item('admin_folder').'/login/sms';
		}

		
		
		$this->load->helper('form');
		$data['redirect']	= $this->session->flashdata('redirect');
		$submitted 			= $this->input->post('submitted');
		if ($submitted || $google)
		{
			$email		= $this->input->post('email');
			$password	= $this->input->post('password');
			$remember   = '';
			$redirect	= $this->input->post('redirect');

			if ($google) {
				$email =  $email_google;
				$password = '';
			}

			$login = $this->auth->login_admin($email, $password, $remember, $google);			

			if ($login)
			{

				$admin = $this->admin_session->userdata('admin');
				
	    		$userId = $admin['id'];

	    		if ($this->config->item('sms_feature') == false) {
	    			$redirect = $this->__roleRedirect();				
					redirect($redirect);
	    		}

	    		$flag = false;

				if ($this->auth->validate_email_mobile($userId)) {
	              $flag = true;
				} else {
					$redirect = $this->config->item('admin_folder').'/login/critical_info';
					redirect($redirect);
				}	

				$code = $this->randomChars(4);

	            $save['id']              = $admin['id'];
				$save['sms_code']		 = $code;
				$save['is_sms_verified'] = '0';
	 			$this->auth->save($save);
	 			$this->load->library('twilio');

				$from = $this->number;
				$to = $admin['mobile'];
				$message = 'Please enter the code to login:'.$code;

				$response = $this->twilio->sms($from, $to, $message);

				$redirect = $this->config->item('admin_folder').'/login/sms';
				redirect($redirect);
			}
			else
			{
				//this adds the redirect back to flash data if they provide an incorrect credentials
				$this->session->set_flashdata('redirect', $redirect);
				$this->session->set_flashdata('error', lang('error_authentication_failed'));
				redirect($this->config->item('admin_folder').'/login');
			}
		}
		$this->load->view($this->config->item('admin_folder').'/login', $data);
	}

	function sms() {
		$data = array();
		$this->load->helper('form');

		$sms = @$this->input->post('sms');

		if (!empty($sms)) {
			$admin = $this->admin_session->userdata('admin');
	        $userId = $admin['id'];

	        $result = $this->auth->validate_sms_code($userId, $sms);
	       
	        if ($result) {

	        	$save['id']              = $userId;
				$save['is_sms_verified'] = '1';
	 			$this->auth->save($save);	        	
	        	   
				$redirect = $this->__roleRedirect();

				redirect($redirect);
	        } else {
	        	$this->session->set_flashdata('error', "Incorect code");
	        }
		}
		$this->load->view($this->config->item('admin_folder').'/sms', $data);
	}

	function __roleRedirect() {

		if($this->auth->check_access('Normal'))
		{					
			$redirect = $this->config->item('admin_folder').'/forms/wellness_form';				
		}			 
		  
		if($this->auth->check_access('Therapists'))
		{					
			$redirect = $this->config->item('admin_folder').'/forms/core1_list';					
		}

		if($this->auth->check_access('supert'))
		{
			$redirect = $this->config->item('admin_folder').'/supert/';										
		}

		return $redirect;

	}//end __roleRedirect



	function critical_info() {
		$data = array();
		$this->load->helper('form');

		$mobile = @$this->input->post('mobile');
		$email = @$this->input->post('email');

		if (!empty($mobile) && !empty($email)) {
			$admin = $this->admin_session->userdata('admin');
	        $userId = $admin['id'];

        	$save['id']              = $userId;
			$save['mobile'] = $mobile;
			$save['email'] = $email;	 		

 			$code = $this->randomChars(4);
          
			$save['sms_code']		 = $code;
			$save['is_sms_verified'] = '0';
 			$this->auth->save($save);
 			$this->load->library('twilio');

			$from = $this->number;
			$to = $mobile;
		    $message = 'Please enter the code to login:'.$code;

			$response = $this->twilio->sms($from, $to, $message);

			$redirect = $this->config->item('admin_folder').'/login/sms';
			redirect($redirect);
			
	      
		}
		$this->load->view($this->config->item('admin_folder').'/critical_info', $data);
	}


	  /**
	   * Method used to generate random password string
	   *
	   * @return string
	   */
	  function randomChars($lenghts=null) {
	    $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
	    $string = null;
	    for ($p = 0; $p < $lenghts; $p++) {
	      $string .= $characters[mt_rand(0, strlen($characters)-1)];
	    }
	    return $string;

	  }//end randomChars()

	
	function logout()
	{
		$this->auth->logout();
		
		//when someone logs out, automatically redirect them to the login page.
		$this->session->set_flashdata('message', lang('message_logged_out'));
		redirect($this->config->item('admin_folder').'/login');
	}

	
	function google() {
		
		// callback URL
		//define('CALLBACK_URL', 'http://skytempest.com/medi/login');
		define('CALLBACK_URL', 'http://skytempest.com/medi/login');

		
		    // Creating new instance
		    $openid = new LightOpenID;
		    $openid->identity = 'https://www.google.com/accounts/o8/id';
		    //setting call back url
		    $openid->returnUrl = CALLBACK_URL;
		    //finding open id end point from google
		    $endpoint = $openid->discover('https://www.google.com/accounts/o8/id');
		    $fields =
	            '?openid.ns=' . urlencode('http://specs.openid.net/auth/2.0') .
	            '&openid.return_to=' . urlencode($openid->returnUrl) .
	            '&openid.claimed_id=' . urlencode('http://specs.openid.net/auth/2.0/identifier_select') .
	            '&openid.identity=' . urlencode('http://specs.openid.net/auth/2.0/identifier_select') .
	            '&openid.mode=' . urlencode('checkid_setup') .
	            '&openid.ns.ax=' . urlencode('http://openid.net/srv/ax/1.0') .
	            '&openid.ax.mode=' . urlencode('fetch_request') .
	            '&openid.ax.required=' . urlencode('email,firstname,lastname') .
	            '&openid.ax.type.firstname=' . urlencode('http://axschema.org/namePerson/first') .
	            '&openid.ax.type.lastname=' . urlencode('http://axschema.org/namePerson/last') .
	            '&openid.ax.type.email=' . urlencode('http://axschema.org/contact/email');
	    header('Location: ' . $endpoint . $fields);
	}


	function google_signup() {
		
		// callback URL
		//define('CALLBACK_URL', 'http://skytempest.com/medi/login');
		
		define('CALLBACK_URL', 'http://skytempest.com/medi/login/signup');			
		
		    // Creating new instance
		    $openid = new LightOpenID;
		    $openid->identity = 'https://www.google.com/accounts/o8/id';
		    //setting call back url
		    $openid->returnUrl = CALLBACK_URL;
		    //finding open id end point from google
		    $endpoint = $openid->discover('https://www.google.com/accounts/o8/id');
		    $fields =
	            '?openid.ns=' . urlencode('http://specs.openid.net/auth/2.0') .
	            '&openid.return_to=' . urlencode($openid->returnUrl) .
	            '&openid.claimed_id=' . urlencode('http://specs.openid.net/auth/2.0/identifier_select') .
	            '&openid.identity=' . urlencode('http://specs.openid.net/auth/2.0/identifier_select') .
	            '&openid.mode=' . urlencode('checkid_setup') .
	            '&openid.ns.ax=' . urlencode('http://openid.net/srv/ax/1.0') .
	            '&openid.ax.mode=' . urlencode('fetch_request') .
	            '&openid.ax.required=' . urlencode('email,firstname,lastname') .
	            '&openid.ax.type.firstname=' . urlencode('http://axschema.org/namePerson/first') .
	            '&openid.ax.type.lastname=' . urlencode('http://axschema.org/namePerson/last') .
	            '&openid.ax.type.email=' . urlencode('http://axschema.org/contact/email');
	    header('Location: ' . $endpoint . $fields);
	}



	function signup()
	{

		$google = false;

		if (!empty($_GET['openid_ext1_value_firstname']) && !empty($_GET['openid_ext1_value_lastname']) && !empty($_GET['openid_ext1_value_email'])) {    
		    $username = $_GET['openid_ext1_value_firstname'] .' '. $_GET['openid_ext1_value_lastname'];
		    $email = $_GET['openid_ext1_value_email'];
            
		    //$save['firstname']	= $_GET['openid_ext1_value_firstname'];
			//$save['lastname']	= $_GET['openid_ext1_value_lastname'];
			//$save['user'] = $save['firstname']. ' '.$save['lastname'];
			$admin = $this->admin_session->userdata('admin');

            $save['id'] = $admin['id'];
			$save['email']		= $email;
			$save['google']		= '1';
			//$save['access']		= 'Therapists';

                        if ($this->auth->get_admin_by_email($email) == false) {
						
			    $this->auth->save($save);
                            $this->session->set_flashdata('message', lang('message_google_saved'));

                        } else {
                            $this->session->set_flashdata('message', 'Already linked with other account');
                        }
			
			
			
			$google = true;

			$admin = $this->admin_session->userdata('admin');
		
			if($admin['access'] == 'Therapists')
			{
				redirect($this->config->item('admin_folder').'/forms/core1_list');
			}
		    if($admin['access'] == 'Normal')
		    {
				$redirect = $this->config->item('admin_folder').'/forms/core1_list';			 					 
		    }
			//}
			//go back to the customer list
			//redirect($this->config->item('admin_folder').'/admin');
		}

	}





}
