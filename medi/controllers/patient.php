<?php
class Patient extends CI_Controller
{
	//these are used when editing, adding or deleting an admin	
	function __construct()
	{
		parent::__construct();
				
		//load the admin language file in
		$this->lang->load('admin');		
	}

	function core1_reply($id = null) {

    	$this->auth->check_access('Normal',true);

    	$user = $this->admin_session->userdata('admin');

    	$comment = $this->input->post('comment');

    	$this->load->model('Patient');
    	$data = array(
			'core1_id' => $id,
			'patient_id' => $user['id'],
			'comment' => $comment
		);

		$this->Patient->core1_comment($data);

		echo "true";
    }//end core1_reply()


    function core2_reply($id = null) {

    	$this->auth->check_access('Normal',true);

    	$user = $this->admin_session->userdata('admin');

    	$comment = $this->input->post('comment');

    	$this->load->model('Patient');
		$data = array(
			'core2_id' => $id,
			'patient_id' => $user['id'],
			'comment' => $comment
		);

		$this->Patient->core2_comment($data);

		echo "true";
    }//ene core2_reply()


    function core3_reply($id = null) {

    	$this->auth->check_access('Normal',true);

    	$user = $this->admin_session->userdata('admin');

    	$comment = $this->input->post('comment');

    	$this->load->model('Patient');
		$data = array(
			'core3_id' => $id,
			'patient_id' => $user['id'],
			'comment' => $comment
		);

		$this->Patient->core3_comment($data);

		echo "true";

    }//end core3_reply()
    
    




}//end class