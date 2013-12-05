<?php
Class Supert_model extends CI_Model
{

	function get_therapist_list($option = array(), $limit = NULL,$offset = NULL)
	{
		if (!empty($limit))
		{
			$this->db->limit($limit,$offset); 
		}
	
		if (!empty($option)) {
			$this->db->where($option);
		}

	
		$result	= $this->db->get('admin')->result();
		
		
		return $result;
	}//end get_therapist_list


	function get_therapist_details($option = array())
	{
		/*if (!empty($limit))
		{
			$this->db->limit($limit,$offset); 
		}*/

		$this->db->select('core1.*, admin.firstname, admin.lastname');
		$this->db->join('admin', 'core1.patient_id=admin.id');		
	
		if (!empty($option)) {
			$this->db->where($option);
		}

	
		$result['results']	= $this->db->get('core1')->result();


		$this->db->select('core1.*, admin.firstname, admin.lastname');
		$this->db->join('admin', 'core1.user_id=admin.id');		
	
		if (!empty($option)) {
			$this->db->where($option);
		}	
		$result['therapist'] = $this->db->get('core1')->row();		
		
		return $result;
	}//end get_therapist_list


	function get_therapist_details_core2($option = array())
	{
		/*if (!empty($limit))
		{
			$this->db->limit($limit,$offset); 
		}*/

		$this->db->select('core2.*, admin.firstname, admin.lastname');
		$this->db->join('admin', 'core2.patient_id=admin.id');		
	
		if (!empty($option)) {
			$this->db->where($option);
		}

	
		$result['results']	= $this->db->get('core2')->result();


		$this->db->select('core2.*, admin.firstname, admin.lastname');
		$this->db->join('admin', 'core2.user_id=admin.id');		
	
		if (!empty($option)) {
			$this->db->where($option);
		}	
		$result['therapist'] = $this->db->get('core2')->row();		
		
		return $result;
	}//end get_therapist_list



	function get_therapist_details_core3($option = array())
	{
		/*if (!empty($limit))
		{
			$this->db->limit($limit,$offset); 
		}*/

		$this->db->select('core3.*, admin.firstname, admin.lastname');
		$this->db->join('admin', 'core3.patient_id=admin.id');		
	
		if (!empty($option)) {
			$this->db->where($option);
		}

	
		$result['results']	= $this->db->get('core3')->result();


		$this->db->select('core3.*, admin.firstname, admin.lastname');
		$this->db->join('admin', 'core3.user_id=admin.id');		
	
		if (!empty($option)) {
			$this->db->where($option);
		}	
		$result['therapist'] = $this->db->get('core3')->row();		
		
		return $result;
	}//end get_therapist_list
	
	/* Added by vic */
	
	function get_patient_therapist_list()
	{
		/*if (!empty($limit))
		{
			$this->db->limit($limit,$offset); 
		}*/

		$this->db->select('*');
		
		//$this->db->join('admin', 'core2.patient_id=admin.id');		
	
		//if (!empty($option)) {
		//	$this->db->where($option);
		//}
		
		$result	= $this->db->get('patient_therapist')->result();
		
		if(!empty($result)){
			return $result;	
		}else{
			return false;
		}

		
	}//end get_patient_therapist_list
	
	
	function get_patient_therapist_list_filter($column, $filter, $edit_id='')
	{
		$this->db->select($column);
		$results	= $this->db->get('patient_therapist')->result();
		
		$ids = array();
		if(!empty($results)){
			foreach($results as $result){
				$ids[] = $result->$column;
			}
		}
		
		if(!empty($edit_id)){
			$ids = array_diff($ids, array($edit_id));
		}
		
		$this->db->select('*');
		if(!empty($result)){
			$this->db->where_not_in('id', $ids);
			$this->db->where('access', $filter);
		}
		
		$result	= $this->db->get('admin')->result();
		
		//print_r($this->db->last_query());
		//print_r($result);
		//die;
		if(!empty($result)){
			return $result;	
		}else{
			return false;
		}

		
	}//end get_patient_therapist_list
	
	
	
	function get_admin_read_single($id)
	{
		$this->db->select('*');
		
		if (!empty($id)) {
			$this->db->where('id', $id);
		}
		
		$result	= $this->db->get('admin')->row();
		
		if(!empty($result)){
			return $result;	
		}else{
			return false;
		}

		
	}//end get_patient_therapist_read_single
	
	
	function get_patient_therapist_read_single($id)
	{
		$this->db->select('*');
		
		if (!empty($id)) {
			$this->db->where('id', $id);
		}
		
		$result	= $this->db->get('patient_therapist')->row();
		
		if(!empty($result)){
			return $result;	
		}else{
			return false;
		}
	}//end get_patient_therapist_read_single
	
	
	function patient_therapist_remove($id){
	
		$this->db->where('id',$id); 
		$this->db->delete('patient_therapist');
		//$id = $this->db->affected_rows();
		return true;
	}
	//patient_therapist_remove
	
	
	function patient_therapist_edit($id, $option){
	
		$this->db->select('*');
		if (!empty($id)) {
			$this->db->where('therapist_id', $option['therapist_id']);
			$this->db->where_not_in('id', $id);
			$therapists	= $this->db->get('patient_therapist')->result();
			
			$this->db->where('patient_id', $option['patient_id']);
			$this->db->where_not_in('id', $id);
			$patients	= $this->db->get('patient_therapist')->result();
		}
		
		//print_r($result);
		//print_r($this->db->last_query());
		//die;
		
		if(empty($therapists) && empty($patients) ){
			$this->db->where('id',$id); 
			$this->db->update('patient_therapist', $option);
			$result = $this->db->affected_rows();
		}else{
			return false;
		}
		
		if($result){
			return true;
		}else{
			return false;
		}
		
	}
	//patient_therapist_edit
	
	function patient_therapist_create($option){
	
		//$this->db->select('*');
		$this->db->where('therapist_id', $option['therapist_id']);
		$therapists	= $this->db->get('patient_therapist')->result();
		
		$this->db->where('patient_id', $option['patient_id']);
		$patients	= $this->db->get('patient_therapist')->result();
		
		//print_r($result);
		//print_r($this->db->last_query());
		//die;
		
		if(empty($therapists) && empty($patients) ){
			//$this->db->where('id',$id); 
			$this->db->insert('patient_therapist', $option);
			$id = $this->db->insert_id();
		}else{
			return false;
		}
		
		if($id){
			return true;
		}else{
			return false;
		}
		
	}
	//patient_therapist_create
	
	
	
	
		
	
}//end Supert_model