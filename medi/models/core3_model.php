<?php
Class Core3_model extends CI_Model
{

	function get_core3($parent = false,$limit = NULL,$offset = NULL)
	{
		if($limit)
		{
		$this->db->limit($limit,$offset); 
		}
		if ($parent !== false)
		{
			$this->db->where('user_id', $parent);
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
	

	
	

}