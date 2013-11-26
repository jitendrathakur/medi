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
		
	
}//end Supert_model