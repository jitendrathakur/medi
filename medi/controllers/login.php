<?php

class Login extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		
		
		force_ssl();
		
		$this->load->library('Auth');		
		$this->lang->load('login');
		

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
				redirect($this->config->item('admin_folder').'/forms/wellness_form');
			 }
			  if($this->auth->check_access('Therapists'))
			 {
				 $redirect = $this->config->item('admin_folder').'/forms/core1_list';
			 					 
			 }
			 if($this->auth->check_access('supert'))
			 {
				 $redirect = $this->config->item('admin_folder').'/supert/';
			 					 
			 }
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

			$login		= $this->auth->login_admin($email, $password, $remember, $google);

			if ($login)
			{
				
				 if($this->auth->check_access('Normal'))
				 {
						if ($redirect == '')
						{
							$redirect = $this->config->item('admin_folder').'/forms/wellness_form';
						}
					
				 }
				 
				  
				  if($this->auth->check_access('Therapists'))
				 {
						if ($redirect == '')
						{
							$redirect = $this->config->item('admin_folder').'/forms/core1_list';
						}
					
				 }

				  if($this->auth->check_access('supert'))
				 {
						if ($redirect == '')
						{
							$redirect = $this->config->item('admin_folder').'/supert/';
						}
					
				 }
				 
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
