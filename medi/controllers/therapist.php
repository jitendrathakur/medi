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
 
    function wellness_list()
    {
      $this->auth->check_access('Therapist',true);
      
      $this->lang->load('wellness');      
      $data['uri']=$this->uri->segment(2);
      
      $data['admin_session'] = $this->admin_session->userdata('admin');
      $user_id = $data['admin_session']['id'];    
      $therapist = $this->auth->getTherapist($user_id);   

      $this->load->model('Patient_model');
      $data['done'] = $this->Patient_model->__checkPatientSubmission($user_id, 'wellness');
          
      $data['total_read_count'] = $this->__patientAlert($user_id);

      $data['results'] = $this->Patient_model->getModelList($user_id, null, null, 'wellness');
    
      $data['view'] = 'wellness_list';

      $this->load->view($this->config->item('therapist').'/layout', $data);        
      
    }//end wellness_list()


    function forensic_list()
    {
      $this->auth->check_access('Normal',true);
              
      $data['uri']=$this->uri->segment(2);
      $data['admin_session'] = $this->admin_session->userdata('admin');
      $user_id = $data['admin_session']['id'];    
      $therapist = $this->auth->getTherapist($user_id);   

      $this->load->model('Patient_model');
      $data['done'] = $this->Patient_model->__checkPatientSubmission($user_id, 'forensic');
          
      $data['total_read_count'] = $this->__patientAlert($user_id);

      $data['results'] = $this->Patient_model->getModelList($user_id, null, null, 'forensic');  

      $data['view'] = 'forensic_list';

      $this->load->view($this->config->item('patient').'/layout', $data);        
      
    }//end forensic_list()

     function physicalhealth_list()
    {
      $this->auth->check_access('Normal',true);
              
      $data['uri']=$this->uri->segment(2);
      $data['admin_session'] = $this->admin_session->userdata('admin');
      $user_id = $data['admin_session']['id'];    
      $therapist = $this->auth->getTherapist($user_id);   

      $this->load->model('Patient_model');
      $data['done'] = $this->Patient_model->__checkPatientSubmission($user_id, 'physicalhealth');
          
      $data['total_read_count'] = $this->__patientAlert($user_id);

      $data['results'] = $this->Patient_model->getModelList($user_id, null, null, 'physicalhealth');  

      $data['view'] = 'physicalhealth_list';

      $this->load->view($this->config->item('patient').'/layout', $data);        
      
    }//end physicalhealth_list()

     function recoveryvitals_list()
    {
      $this->auth->check_access('Normal',true);
              
      $data['uri']=$this->uri->segment(2);
      $data['admin_session'] = $this->admin_session->userdata('admin');
      $user_id = $data['admin_session']['id'];    
      $therapist = $this->auth->getTherapist($user_id);   

      $this->load->model('Patient_model');
      $data['done'] = $this->Patient_model->__checkPatientSubmission($user_id, 'recoveryvitals');
          
      $data['total_read_count'] = $this->__patientAlert($user_id);

      $data['results'] = $this->Patient_model->getModelList($user_id, null, null, 'recoveryvitals');  

      $data['view'] = 'recoveryvitals_list';

      $this->load->view($this->config->item('patient').'/layout', $data);        
      
    }//end recoveryvitals_list()

     function cooccurring_list()
    {
      $this->auth->check_access('Normal',true);
              
      $data['uri']=$this->uri->segment(2);
      $data['admin_session'] = $this->admin_session->userdata('admin');
      $user_id = $data['admin_session']['id'];    
      $therapist = $this->auth->getTherapist($user_id);   

      $this->load->model('Patient_model');
      $data['done'] = $this->Patient_model->__checkPatientSubmission($user_id, 'cooccurring');
          
      $data['total_read_count'] = $this->__patientAlert($user_id);

      $data['results'] = $this->Patient_model->getModelList($user_id, null, null, 'cooccurring');  

      $data['view'] = 'cooccurring_list';

      $this->load->view($this->config->item('patient').'/layout', $data);        
      
    }//end cooccurring_list()

     function tmed_list()
    {
      $this->auth->check_access('Normal',true);
              
      $data['uri']=$this->uri->segment(2);
      $data['admin_session'] = $this->admin_session->userdata('admin');
      $user_id = $data['admin_session']['id'];    
      $therapist = $this->auth->getTherapist($user_id);   

      $this->load->model('Patient_model');
      $data['done'] = $this->Patient_model->__checkPatientSubmission($user_id, 'tmed');
          
      $data['total_read_count'] = $this->__patientAlert($user_id);

      $data['results'] = $this->Patient_model->getModelList($user_id, null, null, 'tmed');  

      $data['view'] = 'tmed_list';

      $this->load->view($this->config->item('patient').'/layout', $data);        
      
    }//end tmedlist()


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
      
    
}//end class