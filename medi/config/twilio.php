<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/**
	* Name:  Twilio
	*
	* Author: Ben Edmunds
	*		  ben.edmunds@gmail.com
	*         @benedmunds
	*
	* Location:
	*
	* Created:  03.29.2011
	*
	* Description:  Twilio configuration settings.
	*
	*
	*/

	/**
	 * Mode ("sandbox" or "prod")
	 **/
	$config['mode']   = 'prod';
	//test
	//$config['mode']   = 'sandbox';

	/**
	 * Account SID
	 **/
	$config['account_sid']   = 'AC5871dfaca935c18b5aac587d391dbf91';
	//test
	//$config['account_sid'] = 'AC3bfbdf64b54fe12ce2ccbe8b1ed47e97';

	/**
	 * Auth Token
	 **/
	$config['auth_token']    = '88edb04811609bd529bf29382db565a8';
	//test
	//$config['auth_token']    = '5cf5b4ba888d4687a56beb7cca44a7dd';

	/**
	 * API Version
	 **/
	$config['api_version']   = '2010-04-01';

	/**
	 * Twilio Phone Number
	 **/
	$config['number']        = '+14846601178';
	//test
	//$config['number']        = '+19892624964';


/* End of file twilio.php */