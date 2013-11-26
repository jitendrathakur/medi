<?php
class Supert extends CI_Controller
{
	//these are used when editing, adding or deleting an admin
	
	function __construct()
	{
		parent::__construct();
				
		//load the admin language file in
		$this->lang->load('admin');
		
	}

	function index()
	{

		$this->auth->check_access('supert',true);

		$data['admin_session'] = $this->admin_session->userdata('admin');
		//print_r($data);
	

		$this->load->model('Supert_model');

		$data['uri']=$this->uri->segment(2);

        $option = array('access' => 'Therapists');        
		$result= $this->Supert_model->get_therapist_list($option);
		//echo "<pre>";
		//print_r($result);
		 
		$data['view'] = 'list';
		$data['results'] = $result;


		$this->load->view($this->config->item('supert').'/layout', $data);
		
	}
	
	
	function check_email($str)
	{
		$email = $this->auth->check_email($str, $this->admin_id);
		if ($email)
		{
			$this->form_validation->set_message('check_email', lang('error_email_taken'));
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}

	function details($userId = null, $bayId = null, $status = null)
	{

		$this->auth->check_access('supert',true);

		
		$data['admin_session'] = $this->admin_session->userdata('admin');
		//print_r($data);
	

		$this->load->model('Supert_model');

		$data['uri']=$this->uri->segment(2);

       

		$data['user_id'] = $userId;
		 
		$data['view'] = 'details';
        
     
		$this->load->view($this->config->item('supert').'/layout', $data);
		
	}


	function core_journal1_list($userId = null, $bayId = null, $status = null)
	{

		$this->auth->check_access('supert',true);

		if ($status == 'closed' && !empty($bayId)) {
			$this->load->model('Core1_model');
			$this->Core1_model->close($bayId, true);
			redirect($this->config->item('supert').'/core_journal1_list/'.$userId);

		}

		$data['admin_session'] = $this->admin_session->userdata('admin');
		//print_r($data);
	

		$this->load->model('Supert_model');

		$data['uri']=$this->uri->segment(2);

        $option = array('user_id' => $userId);        
		$result= $this->Supert_model->get_therapist_details($option);
		//echo "<pre>";
		//print_r($result);

		$data['user_id'] = $userId;
		 
		$data['view'] = 'core_journal1_list';
		$data['results'] = $result['results'];
		$data['therapist'] = $result['therapist'];
        
     
		$this->load->view($this->config->item('supert').'/layout', $data);
		
	}


	function core_journal1_edit($user_id = null, $id = '')
	{

		
		$this->auth->check_access('supert',true);
		$this->load->model('Core1_model');
		$data['uri']=$this->uri->segment(2);
		$data['page_title']		= "Core Journal-1";

		$pat_data=$this->Core1_model->getNormalUser();

		$data['admin_session'] = $this->admin_session->userdata('admin');

		//$user_id = $data['admin_session']['id'];
	
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		
		//$data['wellness']		= $this->Wellness_model->get_wellness();
		$data['page_title']		= "core1";
		
		//default values are empty if the customer is new
		//$data['id']				= "";
		$data['user_id']		= "";			
		$data['coredate']			= "";
		$data['starttime']		= "";
		$data['endtime']			= "";
		$data['goal']= "";	
		$data['fif']			= "";
		$data['visit']			= "";
		$data['followup']			= "";			
		$category_data ="";

		//var_dump($data);


		if ($user_id)
		{	
			
			$core1		= $this->Core1_model->get_core1($id);
		
			//if the cooccurring does not exist, redirect them to the cooccurring list with an error
			if ($core1)
			{
				$id 						= $core1->id;
				$data['id']					= $core1->id;
				$data['user_id']			= $core1->user_id;			
				$data['coredate']			= $core1->coredate;
				$data['starttime']		= $core1->starttime;
				$data['endtime']		= $core1->endtime;
				$data['goal']           = $core1->goal;	
				$data['fif']            = $core1->fif;
				$data['visit']			= $core1->visit;
				$data['followup']			= $core1->followup;
			
			}		
			
		}

		
		$this->form_validation->set_rules('coredate', 'lang:name', 'trim|required');
			
		// validate the form
		$data['patient']=$pat_data;

		$data['view'] = 'core_journal1_edit';

		if ($this->form_validation->run() == FALSE)
		{					
			$this->load->view($this->config->item('supert').'/layout', $data);
		}
		else
		{
						
			$save['user_id']			= $user_id;
			$save['patient_id']			= $this->input->post('patient');
			$save['id']					= $id;
			$save['coredate']			= $this->input->post('coredate');
			$save['starttime']			= $this->input->post('starttime');
			$save['endtime']		= $this->input->post('endtime');
			$save['goal']		= $this->input->post('goal');
			$save['fif']		= $this->input->post('fif');
			$save['visit']		= $this->input->post('visit');
			$save['followup']		= $this->input->post('followup');
							
			$core1_id	= $this->Core1_model->save($save);
			$this->session->set_flashdata('message', lang('message_core1_saved'));
			redirect($this->config->item('supert').'/core_journal1_list/'.$user_id);
		}
	
		
	}//end fn


	function core_journal2_list($userId = null, $bayId = null, $status = null)
	{

		$this->auth->check_access('supert',true);

		if ($status == 'closed' && !empty($bayId)) {
			$this->load->model('Core2_model');
			$this->Core2_model->close($bayId, true);
			redirect($this->config->item('supert').'/core_journal2_list/'.$userId);

		}

		$data['admin_session'] = $this->admin_session->userdata('admin');
		//print_r($data);
	

		$this->load->model('Supert_model');

		$data['uri']=$this->uri->segment(2);

        $option = array('user_id' => $userId);        
		$result= $this->Supert_model->get_therapist_details_core2($option);
		//echo "<pre>";
		//print_r($result);

		$data['user_id'] = $userId;
		 
		$data['view'] = 'core_journal2_list';
		$data['results'] = $result['results'];
		$data['therapist'] = $result['therapist'];
        
     
		$this->load->view($this->config->item('supert').'/layout', $data);
		
	}


	function core_journal2_edit($user_id = null, $id = '')
	{

		
		$this->auth->check_access('supert',true);
		$this->load->model('Core2_model');
		$data['uri']=$this->uri->segment(2);
		$data['page_title']		= "Core Journal-2";

		$pat_data=$this->Core2_model->getNormalUser();
			
			
		$data['admin_session'] = $this->admin_session->userdata('admin');
		//$user_id = $data['admin_session']['id'];
		
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		
		//$data['wellness']		= $this->Wellness_model->get_wellness();
		$data['page_title']		= "core2";
		
		//default values are empty if the customer is new
			//$data['id']				= "";
		$data['user_id']		= "";			
		$data['coredate']			= "";
		$data['renewal']		= "";
		$data['plan']			= "";
		$data['goal']= "";	
		$data['step1']			= "";
		$data['step2']			= "";
		$data['step3']			= "";
		$data['target']			= "";
		
		$category_data ="";
			
	
		if ($user_id)
		{	
			$core2		= $this->Core2_model->get_core2($id);
			//if the cooccurring does not exist, redirect them to the cooccurring list with an error
			if ($core2)
			{
			$id 						= $core2->id;
			$data['id']					= $core2->id;
			$data['user_id']			= $core2->user_id;			
			$data['coredate']			= $core2->coredate;
			$data['renewal']		= $core2->renewal;
			$data['plan']		= $core2->plan;
			$data['step1']= $core2->step1;	
			$data['step2']= $core2->step2;
			$data['step3']			= $core2->step3;
			$data['target']			= $core2->target;
			
			}
			
		
			
		}
	
		$this->form_validation->set_rules('coredate', 'lang:name', 'trim|required');
		
			
		// validate the form
		$data['patient']=$pat_data;

		$data['view'] = 'core_journal2_edit';


		if ($this->form_validation->run() == FALSE)
		{
		
			$this->load->view($this->config->item('supert').'/layout', $data);
		}
		else
		{
			
						
			$save['user_id']			= $user_id;
			$save['patient_id']			= $this->input->post('patient');
			$save['id']					= $id;
			$save['coredate']			= $this->input->post('coredate');
			$save['renewal']			= $this->input->post('renewal');
			$save['plan']		= $this->input->post('plan');
			$save['step1']		= $this->input->post('step1');
			$save['step2']		= $this->input->post('step2');
			$save['step3']		= $this->input->post('step3');
			$save['target']		= $this->input->post('target');
			
			$core2_id	= $this->Core2_model->save($save);
			$this->session->set_flashdata('message', lang('message_core2_saved'));
			redirect($this->config->item('supert').'/core_journal2_list/'.$user_id);
		}
	
		
	}//end fn


	function core_journal3_list($userId = null, $bayId = null, $status = null)
	{

		$this->auth->check_access('supert',true);

		if ($status == 'closed' && !empty($bayId)) {
			$this->load->model('Core3_model');
			$this->Core3_model->close($bayId, true);
			redirect($this->config->item('supert').'/core_journal3_list/'.$userId);
		}

		$data['admin_session'] = $this->admin_session->userdata('admin');
		//print_r($data);	
		//exit;

		$this->load->model('Supert_model');

		$data['uri']=$this->uri->segment(2);



        $option = array('user_id' => $userId);        
		$result = $this->Supert_model->get_therapist_details_core3($option);
		
		$data['user_id'] = $userId;
		 
		$data['view'] = 'core_journal3_list';
		$data['results'] = $result['results'];
		$data['therapist'] = $result['therapist'];
        
     
		$this->load->view($this->config->item('supert').'/layout', $data);
		
	}


	function core_journal3_edit($user_id = null, $id = '')
	{
		$this->auth->check_access('supert',true);
		$this->load->model('Core3_model');
		$data['uri']=$this->uri->segment(2);
		$data['page_title']		= "Core Journal-3";
			
			
		$data['admin_session'] = $this->admin_session->userdata('admin');
		//$user_id = $data['admin_session']['id'];
		//$id="";
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		
		//$data['wellness']		= $this->Wellness_model->get_wellness();
		$data['page_title']		= "core3";
		
		//default values are empty if the customer is new
		//$data['id']				= "";
		$data['user_id']		= "";			
		$data['zip']			= "";
		$data['identify']		= "";
		$data['is_present']			= "";
		$data['is_service']= "";	
		$data['pulse']			= "";
		$data['relatiopnship']			= "";
		$data['supporter']			= "";
		$data['visits']			= "";
		$data['medicine']			= "";
		$data['concentration']			= "";
		$data['pulse2']			= "";
		
		$identify_data = "";
		$visits_data = "";
			
	
		if (!empty($id)) {	

			$core3		= $this->Core3_model->get_core3($id);
			//if the cooccurring does not exist, redirect them to the cooccurring list with an error
			if ($core3)
			{
				$id 						= $core3->id;
				$data['id']					= $core3->id;
				$data['user_id']			= $core3->user_id;			
				$data['zip']			= $core3->zip;
				$data['identify']		= $core3->identify;
				$data['is_present']		= $core3->is_present;
				$data['is_service']= $core3->is_service;	
				$data['pulse']= $core3->pulse;
				$data['relatiopnship']			= $core3->relatiopnship;
				$data['supporter']			= $core3->supporter;
				$data['visits']			= $core3->visits;
				$data['medicine']			= $core3->medicine;
				$data['concentration']			= $core3->concentration;
				$data['pulse2']			= $core3->pulse2;
			
			}
			
		}
	
		$this->form_validation->set_rules('zip', 'lang:name', 'trim|required');

		$data['view'] = 'core_journal3_edit';	
		
		// validate the form
		if ($this->form_validation->run() == FALSE)
		{		
			$this->load->view($this->config->item('supert').'/layout', $data);
		}
		else
		{
						
			$save['user_id']			= $user_id;
			$save['id']					= $id;
			$save['zip']			= $this->input->post('zip');
			$identifies = $this->input->post('identify');
			if (!empty($identifies)) {
				foreach ($identifies as $identify)
				{
					$identify_data .=  $identify.',';
				}
			}
			

			$save['identify'] = $identify_data;
			
			$save['is_present']			= $this->input->post('is_present');
			$save['is_service']		= $this->input->post('is_service');
			$save['pulse']		= $this->input->post('pulse');
			$save['relatiopnship']		= $this->input->post('relatiopnship');
			$save['supporter']		= $this->input->post('supporter');

			$visits = $this->input->post('visits');

			if (!empty($visits)) {
				foreach ($visits as $visit)
				{
					$visits_data .=  $visit.',';
				}
			}				

			$save['visits'] = $visits_data;
			$save['medicine']		= $this->input->post('medicine');
			$save['concentration']		= $this->input->post('concentration');
			$save['pulse2']		= $this->input->post('pulse2');
			
			$core3_id	= $this->Core3_model->save($save);
			$this->session->set_flashdata('message', lang('message_core3_saved'));
			redirect($this->config->item('supert').'/core_journal3_list/'.$user_id);
		}
		
	}
	



}//end class