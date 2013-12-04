<?php
Class Core3_model extends CI_Model
{

	function get_core3($id = false,$limit = NULL,$offset = NULL)
	{
		if($limit)
		{
		$this->db->limit($limit,$offset); 
		}
		if ($id !== false)
		{
			$this->db->where('id', $id);
		}
	
		$result	= $this->db->get('core3')->row();		
		
		return $result;
	}
	

	function readAll() {
		$this->db->select('*');
		//$this->db->join('admin', 'core3.patient_id=admin.id');
		//$this->db->where('access','Normal');		
		
		$result	= $this->db->get('core3');
		
		$result=$result->result();        
        
		return $result;
	}	


	function save($core3)
	{
			if (isset($core3['id']))
			{
				$this->db->where('user_id', $core3['user_id']);
				$this->db->where('id', $core3['id']);
				$this->db->update('core3', $core3);
				return $core3['id'];
			}
			else
			{
				$this->db->insert('core3', $core3);			
				return $this->db->insert_id();
			}
		
	}


	function close($bayId = null, $flag = false)
	{	

		if (!empty($bayId))
		{			
			//$this->db->where('user_id', $core1['user_id']);
			$this->db->where('id', $bayId);
			$this->db->update('core3', array("close" => $flag));
			return $bayId;
		}
		
	}	

	function read_core3_count($patientId = null)
	{
		$this->db->where('patient_id', $patientId);
		return $this->db->where('is_read', false)->count_all_results('core3');
	}


	function read_core3_list($patientId = null)
	{

		$this->db->select('core3.*, admin.firstname, admin.lastname');
		$this->db->join('admin', 'core3.user_id=admin.id');
		$this->db->where('patient_id', $patientId);	
		$this->db->order_by('is_read', 'ASC');
		$this->db->limit(5); 	
		$result	= $this->db->get('core3');
		$result = $result->result();		
		return $result;
	}//end read_core3_list()


	function read_core3($patientId = null)
	{	
		$this->db->where('patient_id', $patientId);		
		$data['is_read'] = true;
		$this->db->update('core3', $data);
		return true;		
	}//end read_core3()
		
}