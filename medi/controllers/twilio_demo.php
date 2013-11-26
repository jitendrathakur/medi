<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class twilio_demo extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$this->load->library('twilio');

		$from = '9713485910';
		$to = '9713485910';
		$message = 'This is a test...';

		$response = $this->twilio->sms($from, $to, $message);


		if($response->IsError)
			echo 'Error: ' . $response->ErrorMessage;
		else
			echo 'Sent message to ' . $to;
	}

}

/* End of file twilio_demo.php */