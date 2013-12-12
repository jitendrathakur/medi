<?php
class Therapist extends CI_Controller
{
  //these are used when editing, adding or deleting an admin  
  function __construct()
  {
    parent::__construct();
        
    //load the admin language file in
    $this->lang->load('admin');   
  }
 
    function wellness_list($field = null, $order = null)
    {

      $this->auth->check_access('Therapists',true);
      
      $this->lang->load('wellness');      
      $data['uri']=$this->uri->segment(2);
      
      $data['admin_session'] = $this->admin_session->userdata('admin');
      $user_id = $data['admin_session']['id'];    
                
      $data['total_read_count'] = $this->__therapistAlert($user_id);

      $this->load->model('Therapist_model');

      $sorting = array('field' => $field, 'dir' => $order);
      $data['results'] = $this->Therapist_model->getModelList($user_id, null, null, 'wellness', $sorting);

      $data['order'] = $order;
    
      $data['view'] = 'wellness_list';

      $this->load->view($this->config->item('therapist').'/layout', $data);        
      
    }//end wellness_list()


    function forensic_list($field = null, $order = null)
    {
      $this->auth->check_access('Therapists',true);
              
      $data['uri']=$this->uri->segment(2);
      $data['admin_session'] = $this->admin_session->userdata('admin');
      $user_id = $data['admin_session']['id'];    
      
      $this->load->model('Therapist_model');
                
      $data['total_read_count'] = $this->__therapistAlert($user_id);

      $sorting = array('field' => $field, 'dir' => $order);
      $data['results'] = $this->Therapist_model->getModelList($user_id, null, null, 'forensic', $sorting);  

      $data['view'] = 'forensic_list';

      $data['order'] = $order;

      $this->load->view($this->config->item('therapist').'/layout', $data);        
      
    }//end forensic_list()

     function physicalhealth_list($field = null, $order = null)
    {
      $this->auth->check_access('Therapists',true);
              
      $data['uri']=$this->uri->segment(2);
      $data['admin_session'] = $this->admin_session->userdata('admin');
      $user_id = $data['admin_session']['id'];    
      
      $this->load->model('Therapist_model');
                
      $data['total_read_count'] = $this->__therapistAlert($user_id);

      $sorting = array('field' => $field, 'dir' => $order);
      $data['results'] = $this->Therapist_model->getModelList($user_id, null, null, 'physicalhealth', $sorting);  

      $data['view'] = 'physicalhealth_list';

      $data['order'] = $order;

      $this->load->view($this->config->item('therapist').'/layout', $data);        
      
    }//end physicalhealth_list()

     function recoveryvitals_list($field = null, $order = null)
    {
      $this->auth->check_access('Therapists',true);
              
      $data['uri']=$this->uri->segment(2);
      $data['admin_session'] = $this->admin_session->userdata('admin');
      $user_id = $data['admin_session']['id'];    
      
      $this->load->model('Therapist_model');
                
      $data['total_read_count'] = $this->__therapistAlert($user_id);

      $sorting = array('field' => $field, 'dir' => $order);      
      $data['results'] = $this->Therapist_model->getModelList($user_id, null, null, 'recoveryvitals', $sorting);  

      $data['view'] = 'recoveryvitals_list';

      $data['order'] = $order;

      $this->load->view($this->config->item('therapist').'/layout', $data);        
      
    }//end recoveryvitals_list()

     function cooccurring_list($field = null, $order = null)
    {
      $this->auth->check_access('Therapists',true);
              
      $data['uri']=$this->uri->segment(2);
      $data['admin_session'] = $this->admin_session->userdata('admin');
      $user_id = $data['admin_session']['id'];    
      
      $this->load->model('Therapist_model');
                
      $data['total_read_count'] = $this->__therapistAlert($user_id);

      $sorting = array('field' => $field, 'dir' => $order);
      $data['results'] = $this->Therapist_model->getModelList($user_id, null, null, 'cooccurring', $sorting);  

      $data['view'] = 'cooccurring_list';

      $data['order'] = $order;

      $this->load->view($this->config->item('therapist').'/layout', $data);        
      
    }//end cooccurring_list()

     function tmed_list($field = null, $order = null)
    {
      $this->auth->check_access('Therapists',true);
              
      $data['uri']=$this->uri->segment(2);
      $data['admin_session'] = $this->admin_session->userdata('admin');
      $user_id = $data['admin_session']['id'];    
     
      $this->load->model('Therapist_model');
                
      $data['total_read_count'] = $this->__therapistAlert($user_id);

      $sorting = array('field' => $field, 'dir' => $order);
      $data['results'] = $this->Therapist_model->getModelList($user_id, null, null, 'tmed', $sorting);  

      $data['view'] = 'tmed_list';

      $data['order'] = $order;

      $this->load->view($this->config->item('therapist').'/layout', $data);        
      
    }//end tmedlist()


    /* Patient alert count */
    function __therapistAlert($userId = null) {
      
      $sum = 0;
      $this->load->model('Therapist_model');
      $sum = $this->Therapist_model->read_count($userId);

      return $sum;

    }//end __patientAlert() 


    function alert_read($model = null) {    

      $this->auth->check_access('Therapists', true);
      $this->load->model('Therapist_model');

      $data['admin_session'] = $this->admin_session->userdata('admin');
      $user_id = $data['admin_session']['id'];

      $this->Therapist_model->setModelAlert($user_id, $model);

      echo "true";

    }//end alert_read()
      
    
}//end class