<?php
class Admin extends Admin_Controller
{
	//these are used when editing, adding or deleting an admin
	var $admin_id		= false;
	var $current_admin	= false;
	function __construct()
	{
		parent::__construct();
		$this->auth->check_access('Admin', true);
		
		//load the admin language file in
		$this->lang->load('admin');
		
		$this->current_admin	= $this->session->userdata('admin');
	}

	function index()
	{
		//die('inside');
		$data['page_title']	= lang('admins');
		$data['results']		= $this->auth->get_admin_list();

		$data['view'] = 'list';

		$this->load->view($this->config->item('admin').'/layout', $data);
	}

	function getNormalUser(){

		$this->db->select('id, firstname,  lastname');
		$this->db->where('access','Normal');		
		//$this->db->order_by('wellness.sequence', 'ASC');
		
		//this will alphabetize them if there is no sequence
		//$this->db->order_by('id', 'desc');
		$result	= $this->db->get('admin',$limit);
		// echo $this->db->last_query();
		//
		// die;
		// $wellness	= array();
		// foreach($result->result() as $cat)
		// {
		// 	$wellness[]	= $this->get_course($cat->id);
		// }
		$result=$result->result();
        //die();
		return $result;
	}

	
	function delete($id)
	{
		//even though the link isn't displayed for an admin to delete themselves, if they try, this should stop them.
		if ($this->current_admin['id'] == $id)
		{
			$this->session->set_flashdata('message', lang('error_self_delete'));
			redirect($this->config->item('admin_folder').'/admin');	
		}
		
		//delete the user
		$this->auth->delete($id);
		$this->session->set_flashdata('message', lang('message_user_deleted'));
		redirect($this->config->item('admin_folder').'/admin');
	}

	function add($id = false)
	{
				
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		
		$data['page_title']		= lang('admin_form');
		
		//default values are empty if the customer is new
		$data['id']		= '';
		$data['firstname']	= '';
		$data['lastname']	= '';
		$data['username']	= '';
		$data['email']		= '';
		$data['access']		= '';
		$data['mobile']		= '';
				
		if ($id)
		{	
			$this->admin_id		= $id;
			$admin			= $this->auth->get_admin($id);
			//if the administrator does not exist, redirect them to the admin list with an error
			if (!$admin)
			{
				$this->session->set_flashdata('message', lang('admin_not_found'));
				redirect($this->config->item('adminr').'/list');
			}
			//set values to db values
			$data['id']			= $admin->id;
			$data['firstname']	= $admin->firstname;
			$data['lastname']	= $admin->lastname;
			$data['email']		= $admin->user;
			$data['email']		= $admin->email;
			$data['access']		= $admin->access;
			$data['mobile']		= $admin->mobile;
		}
		
		$this->form_validation->set_rules('firstname', 'lang:firstname', 'trim|max_length[32]');
		$this->form_validation->set_rules('lastname', 'lang:lastname', 'trim|max_length[32]');
		$this->form_validation->set_rules('user', 'lang:user', 'trim|max_length[32]');
		$this->form_validation->set_rules('email', 'lang:email', 'trim|required|valid_email|max_length[128]|callback_check_email');
		$this->form_validation->set_rules('access', 'lang:access', 'trim|required');
		$this->form_validation->set_rules('mobile', 'lang:mobile', 'trim|max_length[32]');
		
		//if this is a new account require a password, or if they have entered either a password or a password confirmation
		if ($this->input->post('password') != '' || $this->input->post('confirm') != '' || !$id)
		{
			$this->form_validation->set_rules('password', 'lang:password', 'required|min_length[6]|sha1');
			$this->form_validation->set_rules('confirm', 'lang:confirm_password', 'required|matches[password]');
		}
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view($this->config->item('admin').'/add', $data);
		}
		else
		{
			$save['id']		= $id;
			$save['firstname']	= $this->input->post('firstname');
			$save['lastname']	= $this->input->post('lastname');
			$save['user']		= $this->input->post('user');
			$save['email']		= $this->input->post('email');
			$save['access']		= $this->input->post('access');
			$save['mobile']		= $this->input->post('mobile');
			
			if ($this->input->post('password') != '' || !$id)
			{
				$save['password']	= $this->input->post('password');
			}
			
			$this->auth->save($save);
			
			$this->session->set_flashdata('message', lang('message_user_saved'));
			
			//go back to the customer list
			redirect($this->config->item('admin').'/list');
		}
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
}