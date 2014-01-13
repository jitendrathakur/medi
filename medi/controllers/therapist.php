<?php
class Therapist extends CI_Controller
{
  //these are used when editing, adding or deleting an admin  
     function __construct()
     {
       parent::__construct();

       $this->load->library('pagination');
           
       //load the admin language file in
       $this->lang->load('admin');   
     }
 
     function wellness_list($page = 0, $field = null, $order = null, $start_date = null, $patient_id = null, $is_popup = false)
     {

          $this->auth->check_access('Therapists',true);

          $this->load->model('Therapist_model');

          $data['admin_session'] = $this->admin_session->userdata('admin');
          $user_id = $data['admin_session']['id'];         

          $config['base_url'] = $this->config->item('base_url').$this->uri->segment(1).'/'.$this->uri->segment(2);
          $config['total_rows'] = $this->Therapist_model->getModelReadCount($user_id, 'wellness');
          $config['per_page'] = $this->config->item('per_page');      
          $config['uri_segment'] = 3;
          $choice = $config["total_rows"] / $config["per_page"];
          $config["num_links"] = round($choice);

          $this->pagination->initialize($config); 

          $data["links"] = $this->pagination->create_links();
          
          $page = ($this->uri->segment($config['uri_segment'])) ? $this->uri->segment($config['uri_segment']) : 0;
          $data['page'] = $page;

          $this->lang->load('wellness');      
          $data['uri'] = $this->uri->segment(2);
                    
          $data['total_read_count'] = $this->__therapistAlert($user_id);          
    
          $sorting = array('field' => $field, 'dir' => $order);
          $data['results'] = $this->Therapist_model->getModelList($user_id, $config['per_page'], $page, 'wellness', $sorting, $start_date, $patient_id);
    
          $data['order'] = $order;
          
        
          $data['view'] = 'wellness_list';
    
          if($is_popup){
               $this->load->view('therapist/wellness_list_popup', $data);     
          }else{
               $this->load->view($this->config->item('therapist').'/layout', $data);     
          }
          
      
     }//end wellness_list()


     function forensic_list($page = 0, $field = null, $order = null, $start_date = null, $patient_id = null, $is_popup = false)
     {
          $this->auth->check_access('Therapists',true);
          $this->load->model('Therapist_model');
                  
          $data['uri']=$this->uri->segment(2);
          $data['admin_session'] = $this->admin_session->userdata('admin');
          $user_id = $data['admin_session']['id'];    

          $config['base_url'] = $this->config->item('base_url').$this->uri->segment(1).'/'.$this->uri->segment(2);
          $config['total_rows'] = $this->Therapist_model->getModelReadCount($user_id, 'forensic');
          $config['per_page'] = $this->config->item('per_page');      
          $config['uri_segment'] = 3;
          $choice = $config["total_rows"] / $config["per_page"];
          $config["num_links"] = round($choice);

          $this->pagination->initialize($config); 

          $data["links"] = $this->pagination->create_links();
          
          $page = ($this->uri->segment($config['uri_segment'])) ? $this->uri->segment($config['uri_segment']) : 0;
          $data['page'] = $page;          
                              
          $data['total_read_count'] = $this->__therapistAlert($user_id);
    
          $sorting = array('field' => $field, 'dir' => $order);
          $data['results'] = $this->Therapist_model->getModelList($user_id, $config['per_page'], $page, 'forensic', $sorting, $start_date, $patient_id);
    
          $data['view'] = 'forensic_list';
    
          $data['order'] = $order;
          
          if($is_popup){
               $this->load->view('therapist/forensic_list_popup', $data);     
          }else{
               $this->load->view($this->config->item('therapist').'/layout', $data);     
          }
      
     }//end forensic_list()

     function physicalhealth_list($page = 0, $field = null, $order = null, $start_date = null, $patient_id = null, $is_popup = false)
     {
          $this->auth->check_access('Therapists',true);
          $this->load->model('Therapist_model');
                  
          $data['uri']=$this->uri->segment(2);
          $data['admin_session'] = $this->admin_session->userdata('admin');
          $user_id = $data['admin_session']['id']; 

          $config['base_url'] = $this->config->item('base_url').$this->uri->segment(1).'/'.$this->uri->segment(2);
          $config['total_rows'] = $this->Therapist_model->getModelReadCount($user_id, 'physicalhealth');
          $config['per_page'] = $this->config->item('per_page');      
          $config['uri_segment'] = 3;
          $choice = $config["total_rows"] / $config["per_page"];
          $config["num_links"] = round($choice);

          $this->pagination->initialize($config); 

          $data["links"] = $this->pagination->create_links();
          
          $page = ($this->uri->segment($config['uri_segment'])) ? $this->uri->segment($config['uri_segment']) : 0;
          $data['page'] = $page;          
                    
          $data['total_read_count'] = $this->__therapistAlert($user_id);
    
          $sorting = array('field' => $field, 'dir' => $order);
          $data['results'] = $this->Therapist_model->getModelList($user_id, $config['per_page'], $page, 'physicalhealth', $sorting, $start_date, $patient_id);
    
          $data['view'] = 'physicalhealth_list';
    
          $data['order'] = $order;
    
          if($is_popup){
               $this->load->view('therapist/physicalhealth_list_popup', $data);     
          }else{
               $this->load->view($this->config->item('therapist').'/layout', $data);     
          }
      
     }//end physicalhealth_list()

     function recoveryvitals_list($page = 0, $field = null, $order = null, $start_date = null, $patient_id = null, $is_popup = false)
     {
          $this->auth->check_access('Therapists',true);
          $this->load->model('Therapist_model');
                  
          $data['uri']=$this->uri->segment(2);
          $data['admin_session'] = $this->admin_session->userdata('admin');
          $user_id = $data['admin_session']['id'];    

          $config['base_url'] = $this->config->item('base_url').$this->uri->segment(1).'/'.$this->uri->segment(2);
          $config['total_rows'] = $this->Therapist_model->getModelReadCount($user_id, 'recoveryvitals');
          $config['per_page'] = $this->config->item('per_page');      
          $config['uri_segment'] = 3;
          $choice = $config["total_rows"] / $config["per_page"];
          $config["num_links"] = round($choice);

          $this->pagination->initialize($config); 

          $data["links"] = $this->pagination->create_links();
          
          $page = ($this->uri->segment($config['uri_segment'])) ? $this->uri->segment($config['uri_segment']) : 0;
          $data['page'] = $page;          
                    
          $data['total_read_count'] = $this->__therapistAlert($user_id);
    
          $sorting = array('field' => $field, 'dir' => $order);      
          $data['results'] = $this->Therapist_model->getModelList($user_id, $config['per_page'], $page, 'recoveryvitals', $sorting, $start_date, $patient_id);
    
          $data['view'] = 'recoveryvitals_list';
    
          $data['order'] = $order;
    
          if($is_popup){
               $this->load->view('therapist/recoveryvitals_list_popup', $data);     
          }else{
               $this->load->view($this->config->item('therapist').'/layout', $data);     
          }
          
      
     }//end recoveryvitals_list()

     function cooccurring_list($page = 0, $field = null, $order = null, $start_date = null, $patient_id = null, $is_popup = false)
     {
          $this->auth->check_access('Therapists',true);

          $this->load->model('Therapist_model');
                  
          $data['uri']=$this->uri->segment(2);
          $data['admin_session'] = $this->admin_session->userdata('admin');
          $user_id = $data['admin_session']['id'];  

          $config['base_url'] = $this->config->item('base_url').$this->uri->segment(1).'/'.$this->uri->segment(2);
          $config['total_rows'] = $this->Therapist_model->getModelReadCount($user_id, 'cooccurring');
          $config['per_page'] = $this->config->item('per_page');      
          $config['uri_segment'] = 3;
          $choice = $config["total_rows"] / $config["per_page"];
          $config["num_links"] = round($choice);

          $this->pagination->initialize($config); 

          $data["links"] = $this->pagination->create_links();
          
          $page = ($this->uri->segment($config['uri_segment'])) ? $this->uri->segment($config['uri_segment']) : 0;
          $data['page'] = $page;
                    
          $data['total_read_count'] = $this->__therapistAlert($user_id);
    
          $sorting = array('field' => $field, 'dir' => $order);
          $data['results'] = $this->Therapist_model->getModelList($user_id, $config['per_page'], $page, 'cooccurring', $sorting, $start_date, $patient_id);
    
          $data['view'] = 'cooccurring_list';
    
          $data['order'] = $order;
    
          if($is_popup){
               $this->load->view('therapist/cooccurring_list_popup', $data);     
          }else{
               $this->load->view($this->config->item('therapist').'/layout', $data);     
          }
      
     }//end cooccurring_list()

     function tmed_list($page = 0, $field = null, $order = null, $start_date = null, $patient_id = null, $is_popup = false)
     {       
          $this->auth->check_access('Therapists',true);
          $this->load->model('Therapist_model');
                  
          $data['uri']=$this->uri->segment(2);
          $data['admin_session'] = $this->admin_session->userdata('admin');
          $user_id = $data['admin_session']['id'];   

          $config['base_url'] = $this->config->item('base_url').$this->uri->segment(1).'/'.$this->uri->segment(2);
          $config['total_rows'] = $this->Therapist_model->getModelReadCount($user_id, 'tmed');
          $config['per_page'] = $this->config->item('per_page');      
          $config['uri_segment'] = 3;
          $choice = $config["total_rows"] / $config["per_page"];
          $config["num_links"] = round($choice);

          $this->pagination->initialize($config); 

          $data["links"] = $this->pagination->create_links();
          
          $page = ($this->uri->segment($config['uri_segment'])) ? $this->uri->segment($config['uri_segment']) : 0;
          $data['page'] = $page;          
                    
          $data['total_read_count'] = $this->__therapistAlert($user_id);
    
          $sorting = array('field' => $field, 'dir' => $order);
          $data['results'] = $this->Therapist_model->getModelList($user_id, $config['per_page'], $page, 'tmed', $sorting, $start_date, $patient_id);
    
          $data['view'] = 'tmed_list';
          $data['order'] = $order;
          
          if($is_popup){
               $this->load->view('therapist/tmed_list_popup', $data);     
          }else{
               $this->load->view($this->config->item('therapist').'/layout', $data);     
          }
      
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
     
     
     function therapist_to_patient_view() {
          $this->auth->check_access('Therapists', true);
          $this->load->model('Therapist_model');
          $this->load->model('Core1_model');
          $this->load->model('Core2_model');
          $this->load->model('Core3_model');
          
          $data['uri']=$this->uri->segment(2);
          
          $data['admin_session'] = $this->admin_session->userdata('admin');
          $user_id = $data['admin_session']['id'];
          
          $start_date = date('Y-m-d', time());
          $core1 = $this->Core1_model->get_core1_by_therapist($user_id, $start_date);
          $core2 = $this->Core2_model->get_core2_by_therapist($user_id, $start_date);
          $core3 = $this->Core3_model->get_core3_by_therapist($user_id, $start_date);
          
          
          
          //print_r($core1);
          //die;
          //2013-09-20 09:25:00
          if($_SERVER['REQUEST_METHOD'] == 'POST'){
               
               $start_date     = $this->input->post('startdate');
               //print_r($startdate);
               //die('post');
               
               $core1 = $this->Core1_model->get_core1_by_therapist($user_id, $start_date);
               $core2 = $this->Core2_model->get_core2_by_therapist($user_id, $start_date);
               $core3 = $this->Core3_model->get_core3_by_therapist($user_id, $start_date);
          }
          
          if(!empty($core1)){
               foreach($core1 as $cor1){
                    $cor1_arr = $this->auth->getPatientById($cor1->patient_id);
                    $cor1->firstname = @$cor1_arr->firstname;
                    $cor1->lastname = @$cor1_arr->lastname;
               }
          }
          
          if(!empty($core2)){
               foreach($core2 as $cor2){
                    $cor2_arr = $this->auth->getPatientById($cor2->patient_id);
                    $cor2->firstname = @$cor2_arr->firstname;
                    $cor2->lastname = @$cor2_arr->lastname;
               }
          }
          
          
          if(!empty($core3)){
               foreach($core3 as $cor3){
                    $cor3_arr = $this->auth->getPatientById($cor3->patient_id);
                    $cor3->firstname = @$cor3_arr->firstname;
                    $cor3->lastname = @$cor3_arr->lastname;
               }
          }
          //print_r($core1);
          //die;
          
          
          $data['start_date'] = $start_date;
          $data['core1'] = $core1;
          $data['core2'] = $core2;
          $data['core3'] = $core3;
          
          
          $data['view']  = 'therapist_to_patient_view';
          $data['order'] = '1';
          $data['sort']  = '1';
          
          
          //$sort
          //print_r($user_id);
          //die;
          $this->load->view($this->config->item('therapist').'/layout', $data);        
    
     }//end therapist_to_patient_view()
}//end class