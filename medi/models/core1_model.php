<?php
Class Core1_model extends CI_Model
{

	function get_core1($id = false,$limit = NULL,$offset = NULL)
	{
		if($limit)
		{
			$this->db->limit($limit,$offset); 
		}
	
		//{
			$this->db->where('id', $id);
		//}
		$result	= $this->db->get('core1')->row();
		return $result;
	}
	//================= get_core1 ======================
		
	
	function get_core1_by_therapist($user_id, $start_date)
	{
		//$this->db->limit($limit,$offset); 
		//$start_date
		if(!empty($user_id)){
			$this->db->where('user_id', $user_id);
			$this->db->like('cr_timestamp', $start_date);
		}
		
		$this->db->order_by('patient_id');
		$results	= $this->db->get('core1')->result();
		
		//print_r($this->db->last_query());
		//die;
		if(!empty($results)){
			return $results;
		}else{
			return false;
		}
	}
	//===========================================
		
	
	function count_all_core1()
	{
		return $this->db->count_all_results('core1');
	}
	
	function get_core1_limit($limit = null)
	{
		
		$this->db->select('id');
		$this->db->order_by('core1.sequence', 'ASC');
		
		//this will alphabetize them if there is no sequence
		$this->db->order_by('id', 'desc');
		$result	= $this->db->get('core1',$limit);
		//echo $this->db->last_query();
		
		$core1	= array();
		foreach($result->result() as $cat)
		{
			$core1[]	= $this->get_course($cat->id);
		}
		
		return $core1;
	}
	
	
	
	
	//this is for building a menu
	function get_core1_tierd($parent=0)
	{
		$core1	= array();
		$result	= $this->get_core1($parent);
		foreach ($result as $course)
		{
			$core1[$course->id]['course']	= $course;
			$core1[$course->id]['children']	= $this->get_core1_tierd($course->id);
		}
		return $core1;
	}
	
	function readAll($userId, $order = array()){
		$this->db->select('core1.*, admin.firstname, admin.lastname');
		$this->db->join('admin', 'core1.patient_id=admin.id');
		//$this->db->where('access','Normal');
		$this->db->where('user_id', $userId);		

		if (!empty($order['field'])) {
			$this->db->order_by($order['field'], $order['dir']);
		} else {
			$this->db->order_by('is_read', 'ASC');	
		}
		
		$result	= $this->db->get('core1');
		
		$result=$result->result();
        
		return $result;
	}

	function getNormalUser($therepistId = null){

        $patientIds = array();
		if (!empty($therepistId)) {
			$CI =& get_instance();
	        $CI->load->model('Therapist_model');
	        $patientIds = $CI->Therapist_model->__getPatientByTherapist($therepistId);
		}		

		$this->db->select('id, firstname,  lastname');
		$this->db->where('access','Normal');

		if (!empty($patientIds)) {
			$this->db->where_in('id', $patientIds);
		}
		
		$result	= $this->db->get('admin');
		
		$result=$result->result();
        
		return $result;
	}

	function save($core1)
	{	

		if (!empty($core1['id']))
		{			
			//$this->db->where('user_id', $core1['user_id']);
			$this->db->where('id', $core1['id']);
			$this->db->update('core1', $core1);
			return $core1['id'];
		}
		else
		{
			$this->db->insert('core1', $core1);			
			return $this->db->insert_id();
		}
		
	}
	
	function delete($id)
	{
		//$this->db->where('id', $id);
		//$this->db->delete('core1');
		
		//delete references to this course in the product to course table
		//$this->db->where('course_id', $id);
		//$this->db->delete('course_batches');
	}
	
	
	
	function count_core1($id)
	{
		return $this->db->select('product_id')->from('category_products')->join('products', 'category_products.product_id=products.id')->where(array('category_id'=>$id, 'enabled'=>1))->count_all_results();
	}


	function close($bayId = null, $flag = false)
	{	

		if (!empty($bayId))
		{			
			//$this->db->where('user_id', $core1['user_id']);
			$this->db->where('id', $bayId);
			$this->db->update('core1', array("close" => $flag));
			return $bayId;
		}
		
	}

	function read_core1_count($patientId = null)
	{

		$this->db->where('patient_id', $patientId);
		return $this->db->where('is_read', false)->count_all_results('core1');
	}

	function read_core1_list($patientId = null)
	{

		$this->db->select('core1.*, admin.firstname, admin.lastname');
		$this->db->join('admin', 'core1.user_id=admin.id');
		$this->db->where('patient_id', $patientId);	
		$this->db->order_by('is_read', 'ASC');
		$this->db->limit(5); 
		//$this->db->where('is_read', false);		
		$result	= $this->db->get('core1');		
		$result = $result->result();		
		return $result;
	}//end read_core1_list()


	function read_core1($patientId = null)
	{	
		$this->db->where('patient_id', $patientId);		
		$data['is_read'] = true;
		$this->db->update('core1', $data);
		return true;		
	}//end read_core1()

	
}