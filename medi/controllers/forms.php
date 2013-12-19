<?php
class Forms extends Admin_Controller {  
  
  function __construct()
  {   
    // Same as error_reporting(E_ALL);
    ini_set('display_errors',1);
    ini_set('display_startup_errors',1);
    
    error_reporting(E_ALL); 
    parent::__construct();
    
    remove_ssl();
    
    //  $this->auth->check_access('Admin,Manager',true);
    
  }

  function __sendEmail($option = array()) {  

    $config = Array(
      'protocol' => 'smtp',
      'smtp_host' => 'ssl://smtp.googlemail.com',
      'smtp_port' => 465,
      'smtp_user' => 'transformative.medicine@gmail.com', // change it to yours
      'smtp_pass' => '!@#$1234asdf', // change it to yours
      'mailtype' => 'html',
      'charset' => 'iso-8859-1',
      'wordwrap' => TRUE
    );

    $option['from'] = "service@skytempest.com";

    $this->load->library('email', $config);
    $this->email->set_newline("\r\n");
    $this->email->from($option['from']); // change it to yours
    $this->email->to($option['to']);// change it to yours
    $this->email->subject($option['subject']);
    if ($option['template']) {
      $message = $this->load->view($option['view'], @$option['data'], true);  
    } else {
      $message = $option['message'];
    }
    
    $this->email->message($message);
    if($this->email->send())
    {
      return true;
    }
    else
    {
      show_error($this->email->print_debugger());
    }

  }//end __sendEmail()


  function core1_list($field = null, $order = null)
  {

     $this->auth->check_access('Therapists',true);
              
     $data['uri']=$this->uri->segment(2);
     $data['admin_session'] = $this->admin_session->userdata('admin');
     $user_id = $data['admin_session']['id'];  

     $this->load->model('Core1_model');
     $this->load->model('Therapist_model');     
    
     $sorting = array('field' => $field, 'dir' => $order);
     $results= $this->Core1_model->readAll($user_id, $sorting);
    
     
      if(!empty($results)){
        foreach($results as $result){
          $result->comments = $this->Therapist_model->getCommentsByPatient($result->patient_id, $result->id, 'core1');
        }
      }

    
    $data['total_read_count'] = $this->__therapistAlert($user_id);
     
    $data['results'] = $results;

    $data['order'] = $order;

    $this->load->view($this->config->item('admin_folder').'/core1_list', $data);
  }
  //============================================


  function core2_list($field = null, $order = null)
  {     

    $this->auth->check_access('Therapists',true);
              
    $data['uri']=$this->uri->segment(2);
    $data['admin_session'] = $this->admin_session->userdata('admin');
    $user_id = $data['admin_session']['id'];  

    $this->load->model('Therapist_model');
    $this->load->model('Core2_model');
    
    $sorting = array('field' => $field, 'dir' => $order);
    $results = $this->Core2_model->readAll($user_id, $sorting);

    if(!empty($results)){
      foreach($results as $result){
        $result->comments = $this->Therapist_model->getCommentsByPatient($result->patient_id, $result->id, 'core2');               
      }
    }

    $data['total_read_count'] = $this->__therapistAlert($user_id);
    
    $data['results'] = $results; 

    $data['order'] = $order;

    $this->load->view($this->config->item('admin_folder').'/core2_list', $data);
  }


  function core3_list($field = null, $order = null)
  {

    $this->auth->check_access('Therapists',true);
              
    $data['uri']=$this->uri->segment(2);
    $data['admin_session'] = $this->admin_session->userdata('admin');
    $user_id = $data['admin_session']['id'];  
    
    $this->load->model('Core3_model');
    $this->load->model('Therapist_model');
    
    $sorting = array('field' => $field, 'dir' => $order);
    $results = $this->Core3_model->readAll($user_id, $sorting);

    if(!empty($results)){
      foreach($results as $result){
        $result->comments = $this->Therapist_model->getCommentsByPatient($result->patient_id, $result->id, 'core3');               
      }
    }

    $data['total_read_count'] = $this->__therapistAlert($user_id);
   
    $data['results'] = $results; 

    $data['order'] = $order;

    $this->load->view($this->config->item('admin_folder').'/core3_list', $data);
  }

  
  function wellness_form()
  {
    $this->auth->check_access('Normal',true);
    
    $this->lang->load('wellness');
    $this->load->model('Wellness_model');
    $data['uri']=$this->uri->segment(2);
    $data['admin_session'] = $this->admin_session->userdata('admin');
    $user_id = $data['admin_session']['id'];    
    $therapist = $this->auth->getTherapist($user_id);
        
    $data['total_read_count'] = $this->__patientAlert($user_id);
    $id="";
    $this->load->helper('form');
    $this->load->library('form_validation');
    $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
    
    //$data['wellness']   = $this->Wellness_model->get_wellness();
    $data['page_title']   = lang('wellness_form');
    
    //default values are empty if the customer is new
    $data['id']       = '';
    $data['feel']     = '';
    $data['wellness']     = '';
    $data['apply']  = '';
    $data['hospitalization']    = '';
    $data['crisis']   = '';
    $data['pulse']      = '';
    $apply_data = "";
    //create the photos array for later use
    $data['photos']   = array();  
         
    $this->form_validation->set_rules('feel', 'lang:name', 'trim|required|max_length[64]');
    
    $this->form_validation->set_rules('pulse', 'lang:description', 'trim'); 
      
    // validate the form
    $this->load->model('Patient_model');
    $data['done'] = $this->Patient_model->__checkPatientSubmission($user_id, 'wellness');
        
    if ($data['done']) {
      $data['view'] = 'already_done';     
      $this->load->view($this->config->item('patient').'/layout', $data);
      
    } else if ($this->form_validation->run() == FALSE) {   
      $this->load->view($this->config->item('admin_folder').'/wellness_form', $data);
    } else {
      
      //$save['id']       = $id;
      $save['user_id']    = $user_id;     
      $save['feel']     = $this->input->post('feel');
      $save['wellness']     = $this->input->post('wellness');
      $save['pulse']  = $this->input->post('pulse');
      foreach ($this->input->post('apply') as $apply)
        {
        $apply_data .=  $apply.',';
        }

      $save['apply'] = $apply_data;
      $save['hospitalization']= $this->input->post('hospitalization');  
      $save['crisis']     = $this->input->post('crisis');
      $wellness_id  = $this->Wellness_model->save($save);

      $option = array(
        'to' => $therapist['email'],
        'subject' => 'Patient: '.$data['admin_session']['firstname'],
        'message' => 'patient sent you wellness details',
        'template' => true,
        'view' => $this->config->item('email').'/wellness_form',
        'data' => $save
      );

      $haystack = $save['pulse'];
      $needle = 'suicide';

      if (strpos($haystack,$needle) !== false) {
        $option['subject'] = 'HIGH ALERT Patient: '.$data['admin_session']['firstname'];
      }

      $this->__sendEmail($option);
      
      $this->session->set_flashdata('message', lang('message_wellness_saved'));
      
      //go back to the wellness list
      redirect($this->config->item('admin_folder').'/forms/forensic_form');     
    }
  }


  function wellness_form_edit()
  {
    $this->auth->check_access('Normal',true);
    
    $this->lang->load('wellness');
    $this->load->model('Wellness_model');
    $data['uri']=$this->uri->segment(2);
    $data['admin_session'] = $this->admin_session->userdata('admin');
    $user_id = $data['admin_session']['id'];

    $data['total_read_count'] = $this->__patientAlert($user_id);
    $id="";
    $this->load->helper('form');
    $this->load->library('form_validation');
    $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
    
    //$data['wellness']   = $this->Wellness_model->get_wellness();
    $data['page_title']   = lang('wellness_form');
    
    //default values are empty if the customer is new
    $data['id']       = '';
    $data['feel']     = '';
    $data['wellness']     = '';
    $data['apply']  = '';
    $data['hospitalization']    = '';
    $data['crisis']   = '';
    $data['pulse']      = '';
    $apply_data = "";
    //create the photos array for later use
    $data['photos']   = array();
  
    if ($user_id)
    { 
      $wellness   = $this->Wellness_model->get_wellness($user_id);
           

      //if the wellness does not exist, redirect them to the wellness list with an error
      if ($wellness)
      {
      $data['id']       = $wellness->id;
      $id           = $wellness->id;
      $data['user_id']    = $wellness->user_id;     
      $data['feel']     = $wellness->feel;
      $data['wellness']   = $wellness->wellness;
      $data['apply']      = $wellness->apply;
      $data['hospitalization']= $wellness->hospitalization; 
      $data['crisis']     = $wellness->crisis;
      $data['pulse']      = $wellness->pulse;
      }
      
    
      
    }
  
    $this->form_validation->set_rules('feel', 'lang:name', 'trim|required|max_length[64]');
    
    $this->form_validation->set_rules('pulse', 'lang:description', 'trim');
    
    
      
    // validate the form
    if ($this->form_validation->run() == FALSE)
    {
    
      $this->load->view($this->config->item('admin_folder').'/wellness_form', $data);
    }
    else
    {
      
      $save['id']       = $id;
      $save['user_id']    = $user_id;     
      $save['feel']     = $this->input->post('feel');
      $save['pulse']  = $this->input->post('pulse');
      foreach ($this->input->post('apply') as $apply)
        {
        $apply_data .=  $apply.',';
        }

      $save['apply'] = $apply_data;
      $save['hospitalization']= $this->input->post('hospitalization');  
      $save['crisis']     = $this->input->post('crisis');
      $wellness_id  = $this->Wellness_model->save($save);
      
  
      
      $this->session->set_flashdata('message', lang('message_wellness_saved'));
      
      //go back to the wellness list
      redirect($this->config->item('admin_folder').'/forms/wellness_form');
    }
  } 
  
  
  function forensic_form()
  {
    $this->auth->check_access('Normal',true);
    $this->lang->load('wellness');
    $this->load->model('Forensic_model');
    $data['uri']=$this->uri->segment(2);
    $data['admin_session'] = $this->admin_session->userdata('admin');
    $user_id = $data['admin_session']['id'];
    $therapist = $this->auth->getTherapist($user_id);

    $data['total_read_count'] = $this->__patientAlert($user_id);
    $id="";
    $this->load->helper('form');
    $this->load->library('form_validation');
    $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
    
    //$data['wellness']   = $this->Wellness_model->get_wellness();
    $data['page_title']   = "forensic";
    
    //default values are empty if the customer is new
    $data['id']       = "";
    $data['user_id']    = "";     
    $data['is_parole']      = "";
    $data['is_month']   = "";
    $data['is_charge']      = "";
    $data['is_fines']= "";  
    $data['is_week']      = "";
    $data['is_residence']     = "";
    $data['is_criminal']      = "";
    $data['is_friends']     = "";
    $data['is_family']      = "";
    $data['is_volunteer']     = "";
    $data['arrest']     = "";
    $data['incarceration']      = "";
    $data['pulse']      = "";
        
    $this->form_validation->set_rules('is_parole', 'lang:name', 'trim|required');   
    $this->form_validation->set_rules('pulse', 'lang:name', 'trim');
          
    // validate the form
    $this->load->model('Patient_model');
    $data['done'] = $this->Patient_model->__checkPatientSubmission($user_id, 'forensic');
        
    if ($data['done']) {
      $data['view'] = 'already_done';     
      $this->load->view($this->config->item('patient').'/layout', $data);
      
    } else if ($this->form_validation->run() == FALSE)
    {
    
      $this->load->view($this->config->item('admin_folder').'/forensic_form', $data);
      
    }
    else
    {     
      //$save['id']       = $id;
      $save['user_id']    = $user_id;
      $save['is_parole']    = $this->input->post('is_parole');
      $save['pulse']      = $this->input->post('pulse');    
      $save['is_month']   = $this->input->post('is_month'); 
      $save['is_charge']    = $this->input->post('is_charge');
      $save['is_fines']   = $this->input->post('is_fines');
      $save['is_week']    = $this->input->post('is_week');
      $save['is_residence'] = $this->input->post('is_residence');
      $save['is_criminal']  = $this->input->post('is_criminal');
      $save['is_friends']   = $this->input->post('is_friends');
      $save['is_family']    = $this->input->post('is_family');
      $save['is_volunteer'] = $this->input->post('is_volunteer');
      $save['arrest']     = $this->input->post('arrest');
      $save['incarceration']  = $this->input->post('incarceration');
            
      $forensic_id      = $this->Forensic_model->save($save);

      $option = array(
        'to' => $therapist['email'],
        'subject' => 'Patient: '.$data['admin_session']['firstname'],
        'message' => 'patient sent you forensic details',
        'template' => true,
        'view' => $this->config->item('email').'/forensic_form',
        'data' => $save
      );

      $haystack = $save['pulse'];
      $needle = 'suicide';

      if (strpos($haystack,$needle) !== false) {
        $option['subject'] = 'HIGH ALERT Patient: '.$data['admin_session']['firstname'];
      }

      $this->__sendEmail($option);

      $this->session->set_flashdata('message', lang('message_forensic_saved'));
      
      //go back to the forensic list
      redirect($this->config->item('admin_folder').'/forms/cooccurring_form');      
    }
  }


  function forensic_form_edit()
  {
    $this->auth->check_access('Normal',true);
    $this->lang->load('wellness');
    $this->load->model('Forensic_model');
    $data['uri']=$this->uri->segment(2);
    $data['admin_session'] = $this->admin_session->userdata('admin');
    $user_id = $data['admin_session']['id'];

    $data['total_read_count'] = $this->__patientAlert($user_id);
    $id="";
    $this->load->helper('form');
    $this->load->library('form_validation');
    $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
    
    //$data['wellness']   = $this->Wellness_model->get_wellness();
    $data['page_title']   = "forensic";
    
    //default values are empty if the customer is new
      $data['id']       = "";
      $data['user_id']    = "";     
      $data['is_parole']      = "";
      $data['is_month']   = "";
      $data['is_charge']      = "";
      $data['is_fines']= "";  
      $data['is_week']      = "";
      $data['is_residence']     = "";
      $data['is_criminal']      = "";
      $data['is_friends']     = "";
      $data['is_family']      = "";
      $data['is_volunteer']     = "";
      $data['arrest']     = "";
      $data['incarceration']      = "";
      $data['pulse']      = "";
    
  
    if ($user_id)
    { 
      $forensic   = $this->Forensic_model->get_forensic($user_id);
      
      
      //if the forensic does not exist, redirect them to the forensic list with an error
      if ($forensic)
      {
      $id           = $forensic->id;
      $data['id']       = $forensic->id;
      $data['user_id']    = $forensic->user_id;     
      $data['is_parole']    = $forensic->is_parole;
      $data['is_month']   = $forensic->is_month;
      $data['is_charge']    = $forensic->is_charge;
      $data['is_fines']   = $forensic->is_fines;  
      $data['is_week']    = $forensic->is_week;
      $data['is_residence'] = $forensic->is_residence;
      $data['is_criminal']  = $forensic->is_criminal;
      $data['is_friends']   = $forensic->is_friends;
      $data['is_family']    = $forensic->is_family;
      $data['is_volunteer'] = $forensic->is_volunteer;
      $data['arrest']     = $forensic->arrest;
      $data['incarceration']  = $forensic->incarceration;
      $data['pulse']      = $forensic->pulse;
      }
      
    
      
    }
  
    $this->form_validation->set_rules('is_parole', 'lang:name', 'trim|required');   
    $this->form_validation->set_rules('pulse', 'lang:name', 'trim');
    
    
      
    // validate the form
    if ($this->form_validation->run() == FALSE)
    {
    
      $this->load->view($this->config->item('admin_folder').'/forensic_form', $data);
      
    }
    else
    {
      
      $save['id']       = $id;
      $save['user_id']    = $user_id;
      $save['is_parole']    = $this->input->post('is_parole');
      $save['pulse']      = $this->input->post('pulse');    
      $save['is_month']   = $this->input->post('is_month'); 
      $save['is_charge']    = $this->input->post('is_charge');
      $save['is_fines']   = $this->input->post('is_fines');
      $save['is_week']    = $this->input->post('is_week');
      $save['is_residence'] = $this->input->post('is_residence');
      $save['is_criminal']  = $this->input->post('is_criminal');
      $save['is_friends']   = $this->input->post('is_friends');
      $save['is_family']    = $this->input->post('is_family');
      $save['is_volunteer'] = $this->input->post('is_volunteer');
      $save['arrest']     = $this->input->post('arrest');
      $save['incarceration']  = $this->input->post('incarceration');
      
      
      $forensic_id      = $this->Forensic_model->save($save);
      $this->session->set_flashdata('message', lang('message_forensic_saved'));
      
      //go back to the forensic list
      redirect($this->config->item('admin_folder').'/forms/forensic_form');
    }
  }
  
  
  
  function cooccurring_form()
  {
    $this->auth->check_access('Normal',true);
    $this->load->model('Cooccurring_model');
    $data['uri']=$this->uri->segment(2);
    $data['admin_session'] = $this->admin_session->userdata('admin');
    $user_id = $data['admin_session']['id'];

    $therapist = $this->auth->getTherapist($user_id);

    $data['total_read_count'] = $this->__patientAlert($user_id);
    $id="";
    $this->load->helper('form');
    $this->load->library('form_validation');
    $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
    
    //$data['wellness']   = $this->Wellness_model->get_wellness();
    $data['page_title']   = "cooccurring";
    
    //default values are empty if the customer is new
    $data['id']       = "";
    $data['user_id']    = "";     
    $data['is_drug']      = "";
    $data['is_drug_week']   = "";
    $data['is_alcohol']     = "";
    $data['is_alcohol_week']= ""; 
    $data['is_alcohol_friend']      = "";
    $data['is_alcohol_family']      = "";
    $data['is_cravings']      = "";
    $data['is_dreams']      = "";
    $data['is_triggers']      = "";
    $data['is_plans']     = "";
    $data['last_alcohol']     = "";
    $data['last_drugs']     = "";
    $data['pulse']      = "";
    
    $this->form_validation->set_rules('is_drug', 'lang:name', 'trim|required');
    
    $this->form_validation->set_rules('pulse', 'lang:description', 'trim');
    
    // validate the form
    // validate the form
    $this->load->model('Patient_model');
    $data['done'] = $this->Patient_model->__checkPatientSubmission($user_id, 'cooccurring');
        
    if ($data['done']) {
      $data['view'] = 'already_done';     
      $this->load->view($this->config->item('patient').'/layout', $data);
      
    } else if ($this->form_validation->run() == FALSE)
    {
    
      $this->load->view($this->config->item('admin_folder').'/cooccurring_form', $data);
    }
    else
    {      
            
      $save['user_id']        = $user_id;
      //$save['id']       = $id;
      $save['is_drug']      = $this->input->post('is_drug');
      $save['is_drug_week']   =$this->input->post('is_drug_week');
      $save['is_alcohol']     = $this->input->post('is_alcohol');
      $save['is_alcohol_week']= $this->input->post('is_alcohol_week');
      $save['is_alcohol_friend']      = $this->input->post('is_alcohol_friend');
      $save['is_alcohol_family']      = $this->input->post('is_alcohol_family');
      $save['is_cravings']      = $this->input->post('is_cravings');
      $save['is_dreams']      = $this->input->post('is_dreams');
      $save['is_triggers']      = $this->input->post('is_triggers');
      $save['is_plans']     = $this->input->post('is_plans');
      $save['last_alcohol']     = $this->input->post('last_alcohol');
      $save['last_drugs']     = $this->input->post('last_drugs');
      $save['pulse']  = $this->input->post('pulse');
      $cooccurring_id = $this->Cooccurring_model->save($save);

      $option = array(
        'to' => $therapist['email'],
        'subject' => 'Patient: '.$data['admin_session']['firstname'],
        'message' => 'patient sent you Cooccurring details',
        'template' => true,
        'view' => $this->config->item('email').'/cooccurring_form',
        'data' => $save
      );

      $haystack = $save['pulse'];
      $needle = 'suicide';

      if (strpos($haystack,$needle) !== false) {
        $option['subject'] = 'HIGH ALERT Patient: '.$data['admin_session']['firstname'];
      }

      $this->__sendEmail($option);

      $this->session->set_flashdata('message', lang('message_cooccurring_saved'));
      //go back to the cooccurring list
      redirect($this->config->item('admin_folder').'/forms/recoveryvitals_form');     
    }
  }


  function cooccurring_form_edit()
  {
    $this->auth->check_access('Normal',true);
    $this->load->model('Cooccurring_model');
    $data['uri']=$this->uri->segment(2);
    $data['admin_session'] = $this->admin_session->userdata('admin');
    $user_id = $data['admin_session']['id'];

    $data['total_read_count'] = $this->__patientAlert($user_id);
    $id="";
    $this->load->helper('form');
    $this->load->library('form_validation');
    $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
    
    //$data['wellness']   = $this->Wellness_model->get_wellness();
    $data['page_title']   = "cooccurring";
    
    //default values are empty if the customer is new
      $data['id']       = "";
      $data['user_id']    = "";     
      $data['is_drug']      = "";
      $data['is_drug_week']   = "";
      $data['is_alcohol']     = "";
      $data['is_alcohol_week']= ""; 
      $data['is_alcohol_friend']      = "";
      $data['is_alcohol_family']      = "";
      $data['is_cravings']      = "";
      $data['is_dreams']      = "";
      $data['is_triggers']      = "";
      $data['is_plans']     = "";
      $data['last_alcohol']     = "";
      $data['last_drugs']     = "";
      $data['pulse']      = "";
  
    if ($user_id)
    { 
      $cooccurring    = $this->Cooccurring_model->get_cooccurring($user_id);
      //if the cooccurring does not exist, redirect them to the cooccurring list with an error
      if ($cooccurring)
      {
        $id           = $cooccurring->id;
      $data['id']       = $cooccurring->id;
      $data['user_id']    = $cooccurring->user_id;      
      $data['is_drug']      = $cooccurring->is_drug;
      $data['is_drug_week']   =$cooccurring->is_drug_week;
      $data['is_alcohol']     = $cooccurring->is_alcohol;
      $data['is_alcohol_week']= $cooccurring->is_alcohol_week;  
      $data['is_alcohol_friend']      = $cooccurring->is_alcohol_friend;
      $data['is_alcohol_family']      = $cooccurring->is_alcohol_family;
      $data['is_cravings']      = $cooccurring->is_cravings;
      $data['is_dreams']      = $cooccurring->is_dreams;
      $data['is_triggers']      = $cooccurring->is_triggers;
      $data['is_plans']     = $cooccurring->is_plans;
      $data['last_alcohol']     = $cooccurring->last_alcohol;
      $data['last_drugs']     = $cooccurring->last_drugs;
      $data['pulse']      = $cooccurring->pulse;
      }   
    
      
    }
  
    $this->form_validation->set_rules('is_drug', 'lang:name', 'trim|required');
    
    $this->form_validation->set_rules('pulse', 'lang:description', 'trim');
    
    // validate the form
    if ($this->form_validation->run() == FALSE)
    {    
      $this->load->view($this->config->item('admin_folder').'/cooccurring_form', $data);
    }
    else
    {     
            
      $save['user_id']        = $user_id;
      $save['id']       = $id;
      $save['is_drug']      = $this->input->post('is_drug');
      $save['is_drug_week']   =$this->input->post('is_drug_week');
      $save['is_alcohol']     = $this->input->post('is_alcohol');
      $save['is_alcohol_week']= $this->input->post('is_alcohol_week');
      $save['is_alcohol_friend']      = $this->input->post('is_alcohol_friend');
      $save['is_alcohol_family']      = $this->input->post('is_alcohol_family');
      $save['is_cravings']      = $this->input->post('is_cravings');
      $save['is_dreams']      = $this->input->post('is_dreams');
      $save['is_triggers']      = $this->input->post('is_triggers');
      $save['is_plans']     = $this->input->post('is_plans');
      $save['last_alcohol']     = $this->input->post('last_alcohol');
      $save['last_drugs']     = $this->input->post('last_drugs');
      $save['pulse']  = $this->input->post('pulse');
      $cooccurring_id = $this->Cooccurring_model->save($save);
      $this->session->set_flashdata('message', lang('message_cooccurring_saved'));
      //go back to the cooccurring list
      redirect($this->config->item('admin_folder').'/forms/cooccurring_form');
    }
  }
  
  
  
  function recoveryvitals_form()
  {
    $this->auth->check_access('Normal',true);
    
    $this->load->model('Recoveryvitals_model');
    $data['uri']=$this->uri->segment(2);
    $data['admin_session'] = $this->admin_session->userdata('admin');
    $user_id = $data['admin_session']['id'];

    $therapist = $this->auth->getTherapist($user_id);

    $data['total_read_count'] = $this->__patientAlert($user_id);
    $id="";
    $this->load->helper('form');
    $this->load->library('form_validation');
    $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
    
    //$data['wellness']   = $this->Wellness_model->get_wellness();
    $data['page_title']   = "recoveryvitals";
    
    //default values are empty if the customer is new
      $data['id']       = "";
      $data['user_id']    = "";     
      $data['is_sleep']     = "";
      $data['is_healthy']   = "";
      $data['is_excersise']     = "";
      $data['is_meditation']= ""; 
      $data['is_spirituality']      = "";
      $data['is_groups']      = "";
      $data['is_community']     = "";
      $data['is_family']      = "";
      $data['is_enjoy']     = "";
      $data['is_religion']      = "";
      $data['is_recovery']      = "";
      $data['is_life']      = "";
      $data['pulse']      = "";
  
    if ($user_id)
    { 
      $recoveryvitals   = $this->Recoveryvitals_model->get_recoveryvitals($user_id);
      //if the cooccurring does not exist, redirect them to the cooccurring list with an error
      if ($recoveryvitals)
      {
      $id             = $recoveryvitals->id;
      $data['id']         = $recoveryvitals->id;
      $data['user_id']      = $recoveryvitals->user_id;     
      $data['is_sleep']     = $recoveryvitals->is_sleep;
      $data['is_healthy']     = $recoveryvitals->is_healthy;
      $data['is_excersise']   = $recoveryvitals->is_excersise;
      $data['is_meditation']    = $recoveryvitals->is_meditation; 
      $data['is_spirituality']  = $recoveryvitals->is_spirituality;
      $data['is_groups']      = $recoveryvitals->is_groups;
      $data['is_community']   = $recoveryvitals->is_community;
      $data['is_family']      = $recoveryvitals->is_family;
      $data['is_enjoy']   = $recoveryvitals->is_enjoy;
      $data['is_religion']      = $recoveryvitals->is_religion;
      $data['is_recovery']    = $recoveryvitals->is_recovery;
      $data['is_life']      = $recoveryvitals->is_life;
      $data['pulse']        = $recoveryvitals->pulse;
      }
      
    
      
    }
  
    $this->form_validation->set_rules('is_sleep', 'lang:name', 'trim|required');
    
    $this->form_validation->set_rules('pulse', 'lang:description', 'trim');
    
    
      
    // validate the form
    // validate the form
    $this->load->model('Patient_model');
    $data['done'] = $this->Patient_model->__checkPatientSubmission($user_id, 'recoveryvitals');
        
    if ($data['done']) {
      $data['view'] = 'already_done';     
      $this->load->view($this->config->item('patient').'/layout', $data);
      
    } else if ($this->form_validation->run() == FALSE)
    {
    
      $this->load->view($this->config->item('admin_folder').'/recoveryvitals_form', $data);
    }
    else
    {
      
            
      $save['user_id']      = $user_id;
      $save['id']         = $id;
      $save['is_sleep']     = $this->input->post('is_sleep');
      $save['is_healthy']     = $this->input->post('is_healthy');
      $save['is_excersise']   = $this->input->post('is_excersise');
      $save['is_meditation']    = $this->input->post('is_meditation');
      $save['is_spirituality']  = $this->input->post('is_spirituality');
      $save['is_groups']      = $this->input->post('is_groups');
      $save['is_community']   = $this->input->post('is_community');
      $save['is_family']      = $this->input->post('is_family');
      $save['is_enjoy']   = $this->input->post('is_enjoy');
      $save['is_religion']      = $this->input->post('is_religion');
      $save['is_recovery']    = $this->input->post('is_recovery');
      $save['is_life']      = $this->input->post('is_life');
      $save['pulse']  = $this->input->post('pulse');
      $recoveryvitals_id  = $this->Recoveryvitals_model->save($save);

      $option = array(
        'to' => $therapist['email'],
        'subject' => 'Patient: '.$data['admin_session']['firstname'],
        'message' => 'patient sent you recovery vitals details',
        'template' => true,
        'view' => $this->config->item('email').'/recoveryvitals_form',
        'data' => $save
      );

      $haystack = $save['pulse'];
      $needle = 'suicide';

      if (strpos($haystack,$needle) !== false) {
        $option['subject'] = 'HIGH ALERT Patient: '.$data['admin_session']['firstname'];
      }

      $this->__sendEmail($option);

      $this->session->set_flashdata('message', lang('message_recoveryvitals_saved'));
      //go back to the recoveryvitals list
      redirect($this->config->item('admin_folder').'/forms/physicalhealth_form');

    }
  
  }

  
  function physicalhealth_form()
  {
    $this->auth->check_access('Normal',true);
    $this->load->model('Physicalhealth_model');
    $data['uri']=$this->uri->segment(2);
    $data['admin_session'] = $this->admin_session->userdata('admin');
    $user_id = $data['admin_session']['id'];

    $therapist = $this->auth->getTherapist($user_id);

    $data['total_read_count'] = $this->__patientAlert($user_id);
    $id="";
    $this->load->helper('form');
    $this->load->library('form_validation');
    $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
    
    //$data['wellness']   = $this->Wellness_model->get_wellness();
    $data['page_title']   = "physicalhealth";
    
    //default values are empty if the customer is new
      $data['id']       = "";
      $data['user_id']    = "";     
      $data['treatment']      = "";
      $data['is_std']   = "";
      $data['is_physical']      = "";
      $data['is_hearing']= "";  
      $data['is_provider']      = "";
      $data['is_treatment']     = "";
      $data['is_meds']      = "";
      $data['is_counter']     = "";
      $data['is_remedies']      = "";
      $data['is_weight']      = "";
      $data['is_happy']     = "";
      $data['is_pain']      = "";
      $treatment_data ="";
      
  
    if ($user_id)
    { 
      $physicalhealth   = $this->Physicalhealth_model->get_physicalhealth($user_id);
      //if the cooccurring does not exist, redirect them to the cooccurring list with an error
      if ($physicalhealth)
      {
      $id             = $physicalhealth->id;
      $data['id']         = $physicalhealth->id;
      $data['user_id']      = $physicalhealth->user_id;     
      $data['treatment']      = $physicalhealth->treatment;
      $data['is_std']       = $physicalhealth->is_std;
      $data['is_physical']    = $physicalhealth->is_physical;
      $data['is_hearing']     = $physicalhealth->is_hearing;  
      $data['is_provider']    = $physicalhealth->is_provider;
      $data['is_treatment']   = $physicalhealth->is_treatment;
      $data['is_meds']      = $physicalhealth->is_meds;
      $data['is_counter']     = $physicalhealth->is_counter;
      $data['is_remedies']    = $physicalhealth->is_remedies;
      $data['is_weight']      = $physicalhealth->is_weight;
    
      $data['is_happy']     = $physicalhealth->is_happy;
      $data['is_pain']      = $physicalhealth->is_pain;
      }
      
    
      
    }
  
    $this->form_validation->set_rules('is_std', 'lang:name', 'trim|required');
    
    // validate the form
    // validate the form
    $this->load->model('Patient_model');
    $data['done'] = $this->Patient_model->__checkPatientSubmission($user_id, 'physicalhealth');
        
    if ($data['done']) {
      $data['view'] = 'already_done';     
      $this->load->view($this->config->item('patient').'/layout', $data);
      
    } else if ($this->form_validation->run() == FALSE)
    {
    
      $this->load->view($this->config->item('admin_folder').'/physicalhealth_form', $data);
    }
    else
    {     
            
      $save['user_id']      = $user_id;
      $save['id']         = $id;
      $save['is_std']     = $this->input->post('is_std');
      $save['is_physical']      = $this->input->post('is_physical');
      $save['is_hearing']   = $this->input->post('is_hearing');
      $save['is_provider']    = $this->input->post('is_provider');
      $save['is_treatment']   = $this->input->post('is_treatment');
      $save['treatment']  = $this->input->post('treatment');
      $save['is_meds']      = $this->input->post('is_meds');
      $save['is_counter']   = $this->input->post('is_counter');
      $save['is_remedies']      = $this->input->post('is_remedies');
      $save['is_weight']    = $this->input->post('is_weight');
      
      $save['is_happy']   = $this->input->post('is_happy');
      $save['is_pain']      = $this->input->post('is_pain');
      
      foreach ($this->input->post('treatment') as $treatment)
        {
        $treatment_data .=  $treatment.',';
        }
      $save['treatment']  = $treatment_data;
      $physicalhealth_id  = $this->Physicalhealth_model->save($save);

      $option = array(
        'to' => $therapist['email'],
        'subject' => 'Patient: '.$data['admin_session']['firstname'],
        'message' => 'patient sent you physical health details',
        'template' => true,
        'view' => $this->config->item('email').'/physicalhealth_form',
        'data' => $save
      );

     /* $haystack = $save['pulse'];
      $needle = 'suicide';

      if (strpos($haystack,$needle) !== false) {
        $option['subject'] = 'HIGH ALERT Patient: '.$data['admin_session']['firstname'];
      }*/

      $this->__sendEmail($option);


      $this->session->set_flashdata('message', lang('message_physicalhealth_saved'));
      redirect($this->config->item('admin_folder').'/forms/tmed_form');     
    }
  }


  function physicalhealth_form_edit()
  {
    $this->auth->check_access('Normal',true);
    $this->load->model('Physicalhealth_model');
    $data['uri']=$this->uri->segment(2);
    $data['admin_session'] = $this->admin_session->userdata('admin');
    $user_id = $data['admin_session']['id'];

    $data['total_read_count'] = $this->__patientAlert($user_id);
    $id="";
    $this->load->helper('form');
    $this->load->library('form_validation');
    $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
    
    //$data['wellness']   = $this->Wellness_model->get_wellness();
    $data['page_title']   = "physicalhealth";
    
    //default values are empty if the customer is new
      $data['id']       = "";
      $data['user_id']    = "";     
      $data['treatment']      = "";
      $data['is_std']   = "";
      $data['is_physical']      = "";
      $data['is_hearing']= "";  
      $data['is_provider']      = "";
      $data['is_treatment']     = "";
      $data['is_meds']      = "";
      $data['is_counter']     = "";
      $data['is_remedies']      = "";
      $data['is_weight']      = "";
      $data['is_happy']     = "";
      $data['is_pain']      = "";
      $treatment_data ="";
      
  
    if ($user_id)
    { 
      $physicalhealth   = $this->Physicalhealth_model->get_physicalhealth($user_id);
      //if the cooccurring does not exist, redirect them to the cooccurring list with an error
      if ($physicalhealth)
      {
      $id             = $physicalhealth->id;
      $data['id']         = $physicalhealth->id;
      $data['user_id']      = $physicalhealth->user_id;     
      $data['treatment']      = $physicalhealth->treatment;
      $data['is_std']       = $physicalhealth->is_std;
      $data['is_physical']    = $physicalhealth->is_physical;
      $data['is_hearing']     = $physicalhealth->is_hearing;  
      $data['is_provider']    = $physicalhealth->is_provider;
      $data['is_treatment']   = $physicalhealth->is_treatment;
      $data['is_meds']      = $physicalhealth->is_meds;
      $data['is_counter']     = $physicalhealth->is_counter;
      $data['is_remedies']    = $physicalhealth->is_remedies;
      $data['is_weight']      = $physicalhealth->is_weight;
    
      $data['is_happy']     = $physicalhealth->is_happy;
      $data['is_pain']      = $physicalhealth->is_pain;
      }
    }
  
    $this->form_validation->set_rules('is_std', 'lang:name', 'trim|required');
    
    // validate the form
    if ($this->form_validation->run() == FALSE)
    {
    
      $this->load->view($this->config->item('admin_folder').'/physicalhealth_form', $data);
    }
    else
    {
      
            
      $save['user_id']      = $user_id;
      $save['id']         = $id;
      $save['is_std']     = $this->input->post('is_std');
      $save['is_physical']      = $this->input->post('is_physical');
      $save['is_hearing']   = $this->input->post('is_hearing');
      $save['is_provider']    = $this->input->post('is_provider');
      $save['is_treatment']   = $this->input->post('is_treatment');
      $save['treatment']  = $this->input->post('treatment');
      $save['is_meds']      = $this->input->post('is_meds');
      $save['is_counter']   = $this->input->post('is_counter');
      $save['is_remedies']      = $this->input->post('is_remedies');
      $save['is_weight']    = $this->input->post('is_weight');
      
      $save['is_happy']   = $this->input->post('is_happy');
      $save['is_pain']      = $this->input->post('is_pain');
      
      foreach ($this->input->post('treatment') as $treatment)
        {
        $treatment_data .=  $treatment.',';
        }
      $save['treatment']  = $treatment_data;
      $physicalhealth_id  = $this->Physicalhealth_model->save($save);
      $this->session->set_flashdata('message', lang('message_physicalhealth_saved'));
      redirect($this->config->item('admin_folder').'/forms/physicalhealth_form');
    }
  } 
  
  
  function tmed_form()
  {
    $this->auth->check_access('Normal',true);
    $this->load->model('Tmed_model');
    $data['uri']=$this->uri->segment(2);
    $data['admin_session'] = $this->admin_session->userdata('admin');
    $user_id = $data['admin_session']['id'];

    $therapist = $this->auth->getTherapist($user_id);

    $data['total_read_count'] = $this->__patientAlert($user_id);
    $id="";
    $this->load->helper('form');
    $this->load->library('form_validation');
    $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
    
    //$data['wellness']   = $this->Wellness_model->get_wellness();
    $data['page_title']   = "tmed";
    
    //default values are empty if the customer is new
    $data['id']       = "";
    $data['user_id']    = "";     
    $data['category']     = "";
    $data['is_medicine']    = "";
    $data['is_psychiatric']     = "";
    $data['is_question_medicine']= "";  
    $data['is_question_psychiatric']      = "";
    $data['pulse']      = "";
    
    $category_data ="";
      
  
    if ($user_id)
    { 
      $tmed   = $this->Tmed_model->get_tmed($user_id);
      //if the cooccurring does not exist, redirect them to the cooccurring list with an error
      if ($tmed)
      {
      $id             = $tmed->id;
      $data['id']         = $tmed->id;
      $data['user_id']      = $tmed->user_id;     
      $data['category']     = $tmed->category;
      $data['is_medicine']    = $tmed->is_medicine;
      $data['is_psychiatric']   = $tmed->is_psychiatric;
      $data['is_question_medicine']= $tmed->is_question_medicine; 
      $data['is_question_psychiatric']= $tmed->is_question_psychiatric;
      $data['pulse']      = $tmed->pulse;
      
      }   
      
    }
  
    $this->form_validation->set_rules('is_medicine', 'lang:name', 'trim|required');
          
    // validate the form
    // validate the form
    $this->load->model('Patient_model');
    $data['done'] = $this->Patient_model->__checkPatientSubmission($user_id, 'tmed');
        
    if ($data['done']) {
      $data['view'] = 'already_done';     
      $this->load->view($this->config->item('patient').'/layout', $data);
      
    } else if ($this->form_validation->run() == FALSE)
    {
    
      $this->load->view($this->config->item('admin_folder').'/tmed_form', $data);
    }
    else
    {
      
            
      $save['user_id']      = $user_id;
      $save['id']         = $id;
      $save['is_medicine']      = $this->input->post('is_medicine');
      $save['is_psychiatric']     = $this->input->post('is_psychiatric');
      $save['is_question_medicine']   = $this->input->post('is_question_medicine');
      $save['is_question_psychiatric']    = $this->input->post('is_question_psychiatric');
      
      
      foreach ($this->input->post('category') as $category)
        {
        $category_data .=  $category.',';
        }
      $save['category'] = $category_data;
      $save['pulse']    = $this->input->post('pulse');
      $tmed_id  = $this->Tmed_model->save($save);

      $option = array(
        'to' => $therapist['email'],
        'subject' => 'Patient: '.$data['admin_session']['firstname'],
        'message' => 'patient sent you tmed details',
        'template' => true,
        'view' => $this->config->item('email').'/tmed_form',
        'data' => $save
      );

      $haystack = $save['pulse'];
      $needle = 'suicide';

      if (strpos($haystack,$needle) !== false) {
        $option['subject'] = 'HIGH ALERT Patient: '.$data['admin_session']['firstname'];
      }

      $this->__sendEmail($option);

      $this->session->set_flashdata('message', lang('message_tmed_saved'));
      redirect($this->config->item('patient').'/thank_you');     
    }
  }
  
  
  function core_journal_form()
  {
    $this->auth->check_access('Therapists',true);
    $this->load->model('Core1_model');
    $data['uri']=$this->uri->segment(2);
    $data['page_title']   = "Core Journal-1";    

    $data['admin_session'] = $this->admin_session->userdata('admin');
    $user_id = $data['admin_session']['id'];

    $pat_data=$this->Core1_model->getNormalUser($user_id);
    
    $id="";
    $this->load->helper('form');
    $this->load->library('form_validation');
    $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
    
    //$data['wellness']   = $this->Wellness_model->get_wellness();
    $data['page_title']   = "core1";
    
    //default values are empty if the customer is new
      $data['id']       = "";
      $data['user_id']    = "";     
      $data['coredate']     = "";
      $data['starttime']    = "";
      $data['endtime']      = "";
      $data['goal']= "";  
      $data['fif']      = "";
      $data['visit']      = "";
      $data['followup']     = "";


      
      $category_data ="";
      
  
    if ($user_id)
    { 
      $core1    = $this->Core1_model->get_core1($user_id);
      //if the cooccurring does not exist, redirect them to the cooccurring list with an error
      if ($core1)
      {
      $id             = $core1->id;
      $data['id']         = $core1->id;
      $data['user_id']      = $core1->user_id;      
      $data['coredate']     = $core1->coredate;
      $data['starttime']    = $core1->starttime;
      $data['endtime']    = $core1->endtime;
      $data['goal']= $core1->goal;  
      $data['fif']= $core1->fif;
      $data['visit']      = $core1->visit;
      $data['followup']     = $core1->followup;
      
      }
      
    
      
    }
  
    $this->form_validation->set_rules('coredate', 'lang:name', 'trim|required');
    
    
    
    
      
    // validate the form
    $data['patient']=$pat_data;

    if ($this->form_validation->run() == FALSE)
    {

      //echo "<pre>";
      //print_r($data);
          
      $this->load->view($this->config->item('admin_folder').'/core_journal_form', $data);
    }
    else
    {
      
            
      $save['user_id']      = $user_id;
      $save['patient_id']     = $this->input->post('patient');
      //$save['id']         = $id;
      $save['coredate']     = $this->input->post('coredate');
      $save['starttime']      = $this->input->post('starttime');
      $save['endtime']    = $this->input->post('endtime');
      $save['goal']   = $this->input->post('goal');
      $save['fif']    = $this->input->post('fif');
      $save['visit']    = $this->input->post('visit');
      $save['followup']   = $this->input->post('followup');
      
      $core1_id = $this->Core1_model->save($save);
      $this->session->set_flashdata('message', lang('message_core1_saved'));
      redirect($this->config->item('admin_folder').'/forms/core1_list');
    }
    
  
    
  }


  function core_journal_form_edit($id = '' )
  {

    $this->auth->check_access('Therapists',true);
    $this->load->model('Core1_model');
    $data['uri']=$this->uri->segment(2);
    $data['page_title']   = "Core Journal-1";

    $pat_data=$this->Core1_model->getNormalUser();

    $data['admin_session'] = $this->admin_session->userdata('admin');

    $user_id = $data['admin_session']['id'];
  
    $this->load->helper('form');
    $this->load->library('form_validation');
    $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
    
    //$data['wellness']   = $this->Wellness_model->get_wellness();
    $data['page_title']   = "core1";
    
    //default values are empty if the customer is new
    //$data['id']       = "";
    $data['user_id']    = "";     
    $data['coredate']     = "";
    $data['starttime']    = "";
    $data['endtime']      = "";
    $data['goal']= "";  
    $data['fif']      = "";
    $data['visit']      = "";
    $data['followup']     = "";     
    $category_data ="";

    //var_dump($data);


    if ($user_id)
    { 
      
      $core1    = $this->Core1_model->get_core1($id);
    
      //if the cooccurring does not exist, redirect them to the cooccurring list with an error
      if ($core1)
      {
        $id             = $core1->id;
        $data['id']         = $core1->id;
        $data['user_id']      = $core1->user_id;      
        $data['coredate']     = $core1->coredate;
        $data['starttime']    = $core1->starttime;
        $data['endtime']    = $core1->endtime;
        $data['goal']           = $core1->goal; 
        $data['fif']            = $core1->fif;
        $data['visit']      = $core1->visit;
        $data['followup']     = $core1->followup;
      
      }   
      
    }

    
    $this->form_validation->set_rules('coredate', 'lang:name', 'trim|required');
      
    // validate the form
    $data['patient']=$pat_data;

    if ($this->form_validation->run() == FALSE)
    {         
      $this->load->view($this->config->item('admin_folder').'/core_journal_form_edit', $data);
    }
    else
    {
            
      $save['user_id']      = $user_id;
      $save['patient_id']     = $this->input->post('patient');
      $save['id']         = $id;
      $save['coredate']     = $this->input->post('coredate');
      $save['starttime']      = $this->input->post('starttime');
      $save['endtime']    = $this->input->post('endtime');
      $save['goal']   = $this->input->post('goal');
      $save['fif']    = $this->input->post('fif');
      $save['visit']    = $this->input->post('visit');
      $save['followup']   = $this->input->post('followup');
              
      $core1_id = $this->Core1_model->save($save);
      $this->session->set_flashdata('message', lang('message_core1_saved'));
      redirect($this->config->item('admin_folder').'/forms/core1_list');
    }   
  
    
  }


  function core_journal_form2()
  {
    $this->auth->check_access('Therapists',true);
    $this->load->model('Core1_model');
    $this->load->model('Core2_model');
    $data['uri']=$this->uri->segment(2);
    $data['page_title']   = "Core Journal-2";          
      
    $data['admin_session'] = $this->admin_session->userdata('admin');
    $user_id = $data['admin_session']['id'];

    $pat_data = $this->Core1_model->getNormalUser($user_id);

    $id="";
    $this->load->helper('form');
    $this->load->library('form_validation');
    $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
    
    //$data['wellness']   = $this->Wellness_model->get_wellness();
    $data['page_title']   = "core2";
    
    //default values are empty if the customer is new
      $data['id']       = "";
      $data['user_id']    = "";     
      $data['coredate']     = "";
      $data['renewal']    = "";
      $data['plan']     = "";
      $data['goal']= "";  
      $data['step1']      = "";
      $data['step2']      = "";
      $data['step3']      = "";
      $data['target']     = "";
      
      $category_data ="";
      
  
    if ($user_id)
    { 
      $core2    = $this->Core2_model->get_core2($user_id);
      //if the cooccurring does not exist, redirect them to the cooccurring list with an error
      if ($core2)
      {
      $id             = $core2->id;
      $data['id']         = $core2->id;
      $data['user_id']      = $core2->user_id;      
      $data['coredate']     = $core2->coredate;
      $data['renewal']    = $core2->renewal;
      $data['plan']   = $core2->plan;
      $data['step1']= $core2->step1;  
      $data['step2']= $core2->step2;
      $data['step3']      = $core2->step3;
      $data['target']     = $core2->target;
      
      }
      
    }
  
    $this->form_validation->set_rules('coredate', 'lang:name', 'trim|required');
          
    // validate the form
    $data['patient']=$pat_data;
    if ($this->form_validation->run() == FALSE)
    {
    
      $this->load->view($this->config->item('admin_folder').'/core_journal_form2', $data);
    }
    else
    {      
            
      $save['user_id']      = $user_id;
      $save['patient_id']     = $this->input->post('patient');
      //$save['id']         = $id;
      $save['coredate']     = $this->input->post('coredate');
      $save['renewal']      = $this->input->post('renewal');
      $save['plan']   = $this->input->post('plan');
      $save['step1']    = $this->input->post('step1');
      $save['step2']    = $this->input->post('step2');
      $save['step3']    = $this->input->post('step3');
      $save['target']   = $this->input->post('target');
      
      $core2_id = $this->Core2_model->save($save);
      $this->session->set_flashdata('message', lang('message_core2_saved'));
      redirect($this->config->item('admin_folder').'/forms/core2_list');
    }
    
  }


  function core_journal_form2_edit($id = null)
  {
    $this->auth->check_access('Therapists',true);
    $this->load->model('Core1_model');
    $this->load->model('Core2_model');
    $data['uri']=$this->uri->segment(2);
    $data['page_title']   = "Core Journal-2";      
      
    $data['admin_session'] = $this->admin_session->userdata('admin');
    $user_id = $data['admin_session']['id'];

    $pat_data=$this->Core1_model->getNormalUser($user_id);
    
    $this->load->helper('form');
    $this->load->library('form_validation');
    $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
    
    //$data['wellness']   = $this->Wellness_model->get_wellness();
    $data['page_title']   = "core2";
    
    //default values are empty if the customer is new
      //$data['id']       = "";
      $data['user_id']    = "";     
      $data['coredate']     = "";
      $data['renewal']    = "";
      $data['plan']     = "";
      $data['goal']= "";  
      $data['step1']      = "";
      $data['step2']      = "";
      $data['step3']      = "";
      $data['target']     = "";
      
      $category_data ="";
      
  
    if ($user_id)
    { 
      $core2    = $this->Core2_model->get_core2($id);
      //if the cooccurring does not exist, redirect them to the cooccurring list with an error
      if ($core2)
      {
        $id             = $core2->id;
        $data['id']         = $core2->id;
        $data['user_id']      = $core2->user_id;      
        $data['coredate']     = $core2->coredate;
        $data['renewal']    = $core2->renewal;
        $data['plan']   = $core2->plan;
        $data['step1']= $core2->step1;  
        $data['step2']= $core2->step2;
        $data['step3']      = $core2->step3;
        $data['target']     = $core2->target;
      
      }    
      
    }
  
    $this->form_validation->set_rules('coredate', 'lang:name', 'trim|required');
          
    // validate the form
    $data['patient']=$pat_data;
    if ($this->form_validation->run() == FALSE)
    {
    
      $this->load->view($this->config->item('admin_folder').'/core_journal_form2_edit', $data);
    }
    else
    {
      
            
      $save['user_id']      = $user_id;
      $save['patient_id']     = $this->input->post('patient');
      $save['id']         = $id;
      $save['coredate']     = $this->input->post('coredate');
      $save['renewal']      = $this->input->post('renewal');
      $save['plan']   = $this->input->post('plan');
      $save['step1']    = $this->input->post('step1');
      $save['step2']    = $this->input->post('step2');
      $save['step3']    = $this->input->post('step3');
      $save['target']   = $this->input->post('target');
      
      $core2_id = $this->Core2_model->save($save);
      $this->session->set_flashdata('message', lang('message_core2_saved'));
      redirect($this->config->item('admin_folder').'/forms/core2_list');
    }

    
  }
    

  function core_journal_form3()
  {
    $this->auth->check_access('Therapists',true);
    $this->load->model('Core1_model');
    $this->load->model('Core3_model');
    $data['uri']=$this->uri->segment(2);
    $data['page_title']   = "Core Journal-3";
      
      
    $data['admin_session'] = $this->admin_session->userdata('admin');
    $user_id = $data['admin_session']['id'];

    $pat_data = $this->Core1_model->getNormalUser($user_id);


    $id="";
    $this->load->helper('form');
    $this->load->library('form_validation');
    $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
    
    //$data['wellness']   = $this->Wellness_model->get_wellness();
    $data['page_title']   = "core3";
    
    //default values are empty if the customer is new
    $data['id']       = "";
    $data['user_id']    = "";     
    $data['zip']      = "";
    $data['identify']   = "";
    $data['is_present']     = "";
    $data['is_service']= "";  
    $data['pulse']      = "";
    $data['relatiopnship']      = "";
    $data['supporter']      = "";
    $data['visits']     = "";
    $data['medicine']     = "";
    $data['concentration']      = "";
    $data['pulse2']     = "";
    
    $identify_data ="";
    $visits_data = "";
     
    $data['patient']=$pat_data;  
    
  
    $this->form_validation->set_rules('zip', 'lang:name', 'trim|required');
        
    // validate the form
    if ($this->form_validation->run() == FALSE)
    {   
      $this->load->view($this->config->item('admin_folder').'/core_journal_form3', $data);
    }
    else
    {     
            
      $save['user_id']      = $user_id;
      //$save['id']         = $id;
      $save['zip']      = $this->input->post('zip');
      $save['patient_id']     = $this->input->post('patient');
      $identifies = $this->input->post('identify');

      if (!empty($identifies)) {

        foreach ($identifies as $identify)
        {
          $identify_data .=  $identify.',';
        }

        $save['identify'] = $identify_data;

      }
      
      
      $save['is_present']     = $this->input->post('is_present');
      $save['is_service']   = $this->input->post('is_service');
      $save['pulse']    = $this->input->post('pulse');
      $save['relatiopnship']    = $this->input->post('relatiopnship');
      $save['supporter']    = $this->input->post('supporter');
      foreach ($this->input->post('visits') as $visits)
      {
        $visits_data .=  $visits.',';
      }

      $save['visits'] = $visits_data;
      $save['medicine']   = $this->input->post('medicine');
      $save['concentration']    = $this->input->post('concentration');
      $save['pulse2']   = $this->input->post('pulse2');
      
      $core3_id = $this->Core3_model->save($save);
      $this->session->set_flashdata('message', lang('message_core3_saved'));
      redirect($this->config->item('admin_folder').'/forms/core3_list');
    }
    
  }


  function core_journal_form3_edit($id)
  {
    $this->auth->check_access('Therapists',true);
    $this->load->model('Core1_model');
    $this->load->model('Core3_model');
    $data['uri']=$this->uri->segment(2);
    $data['page_title']   = "Core Journal-3";      
      
    $data['admin_session'] = $this->admin_session->userdata('admin');
    $user_id = $data['admin_session']['id'];

    $pat_data = $this->Core1_model->getNormalUser($user_id);
    
    $this->load->helper('form');
    $this->load->library('form_validation');
    $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
    
    //$data['wellness']   = $this->Wellness_model->get_wellness();
    $data['page_title']   = "core3";
    
    //default values are empty if the customer is new
    $data['id']       = "";
    $data['user_id']    = "";     
    $data['zip']      = "";
    $data['identify']   = "";
    $data['is_present']     = "";
    $data['is_service']= "";  
    $data['pulse']      = "";
    $data['relatiopnship']      = "";
    $data['supporter']      = "";
    $data['visits']     = "";
    $data['medicine']     = "";
    $data['concentration']      = "";
    $data['pulse2']     = "";
    
    $identify_data ="";
    $visits_data = "";

    $data['patient']=$pat_data;
      
  
    if ($user_id)
    { 
      $core3    = $this->Core3_model->get_core3($id);
      //if the cooccurring does not exist, redirect them to the cooccurring list with an error
      if ($core3)
      {
      $id             = $core3->id;
      $data['id']         = $core3->id;
      $data['user_id']      = $core3->user_id;      
      $data['zip']      = $core3->zip;
      $data['identify']   = $core3->identify;
      $data['is_present']   = $core3->is_present;
      $data['is_service']= $core3->is_service;  
      $data['pulse']= $core3->pulse;
      $data['relatiopnship']      = $core3->relatiopnship;
      $data['supporter']      = $core3->supporter;
      $data['visits']     = $core3->visits;
      $data['medicine']     = $core3->medicine;
      $data['concentration']      = $core3->concentration;
      $data['pulse2']     = $core3->pulse2;
      
      }    
      
    }
  
    $this->form_validation->set_rules('zip', 'lang:name', 'trim|required');    
      
    // validate the form
    if ($this->form_validation->run() == FALSE)
    {
    
      $this->load->view($this->config->item('admin_folder').'/core_journal_form3', $data);
    }
    else
    {      
            
      $save['user_id']      = $user_id;
      //$save['id']         = $id;
      $save['zip']      = $this->input->post('zip');
      foreach ($this->input->post('identify') as $identify)
        {
        $identify_data .=  $identify.',';
        }

      $save['identify'] = $identify_data;
      
      $save['is_present']     = $this->input->post('is_present');
      $save['is_service']   = $this->input->post('is_service');
      $save['pulse']    = $this->input->post('pulse');
      $save['relatiopnship']    = $this->input->post('relatiopnship');
      $save['supporter']    = $this->input->post('supporter');
        foreach ($this->input->post('visits') as $visits)
        {
        $visits_data .=  $visits.',';
        }

      $save['visits'] = $visits_data;
      $save['medicine']   = $this->input->post('medicine');
      $save['concentration']    = $this->input->post('concentration');
      $save['pulse2']   = $this->input->post('pulse2');
      
      $core3_id = $this->Core3_model->save($save);
      $this->session->set_flashdata('message', lang('message_core3_saved'));
      redirect($this->config->item('admin_folder').'/forms/core3_list');
    }
    
  }

    /* Patient alert count */
  function __patientAlert($userId = null) {

    $this->load->model('Core1_model');
    $this->load->model('Core2_model');
    $this->load->model('Core3_model');
    $core1_read_count = $this->Core1_model->read_core1_count($userId);
    $core2_read_count = $this->Core2_model->read_core2_count($userId);
    $core3_read_count = $this->Core3_model->read_core3_count($userId);
    $sum = $core1_read_count + $core2_read_count + $core3_read_count;

    return $sum;

  }//end __patientAlert() 

  function patient_alert_list() {

    $data['admin_session'] = $this->admin_session->userdata('admin');
    $data['uri']=$this->uri->segment(2);

    $this->load->helper('form');

    $userId = $data['admin_session']['id'];

    $this->load->model('Core1_model');
    $this->load->model('Core2_model');
    $this->load->model('Core3_model');
    $data['results']['core1'] = $this->Core1_model->read_core1_list($userId);
    $data['results']['core2']= $this->Core2_model->read_core2_list($userId);
    $data['results']['core3'] = $this->Core3_model->read_core3_list($userId); 

    $this->load->view($this->config->item('admin_folder').'/patient_alert_list', $data);

  }//end patient_alert_list()


  function alert_read() {

    $data['admin_session'] = $this->admin_session->userdata('admin');
    $userId = $data['admin_session']['id'];

    $this->load->model('Core1_model');
    $this->load->model('Core2_model');
    $this->load->model('Core3_model');
    $this->Core1_model->read_core1($userId);
    $this->Core2_model->read_core2($userId);
    $this->Core3_model->read_core3($userId);

    echo 'true';  

  }
  

 /* Patient alert count */
  function __therapistAlert($userId = null) {
    
    $sum = 0;
    $this->load->model('Therapist_model');
    $sum = $this->Therapist_model->read_count($userId);

    return $sum;

  }//end __patientAlert() 


}//end class