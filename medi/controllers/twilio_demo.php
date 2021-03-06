<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class twilio_demo extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}

	function index()
	{
		$this->load->library('twilio');

		$from = '+19892624964';
		$to = '+918878655465';
		$message = 'This is a test...msg';

		$response = $this->twilio->sms($from, $to, $message);


		if($response->IsError)
			echo 'Error: ' . $response->ErrorMessage;
		else
			echo 'Sent message to ' . $to;
	}

}

/* End of file twilio_demo.php */