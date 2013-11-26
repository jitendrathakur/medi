<?php
Class Core2_model extends CI_Model
{

	function get_core2($parent = false,$limit = NULL,$offset = NULL)
	{
		if($limit)
		{
		$this->db->limit($limit,$offset); 
		}
		if ($parent !== false)
		{
			$this->db->where('id', $parent);
		}

	
		$result	= $this->db->get('core2')->row();
		
		
		return $result;
	}

	function readAll(){
		$this->db->select('core2.*, admin.firstname, admin.lastname');
		$this->db->join('admin', 'core2.patient_id=admin.id');
		//$this->db->where('access','Normal');		
		
		$result	= $this->db->get('core2');
		
		$result=$result->result();        
        
		return $result;
	}



	function getNormalUser(){
		$this->db->select('id, firstname,  lastname');
		$this->db->where('access','Normal');		
		
		$result	= $this->db->get('admin');
		
		$result=$result->result();
        
		return $result;
	}	


	function save($core2)
	{
			if (!empty($core2['id']))
			{
				//$this->db->where('user_id', $core2['user_id']);
				$this->db->where('id', $core2['id']);
				$this->db->update('core2', $core2);
				return $core2['id'];
			}
			else
			{
				$this->db->insert('core2', $core2);			
				return $this->db->insert_id();
			}
		
	}
	

	function close($bayId = null, $flag = false)
	{	

		if (!empty($bayId))
		{			
			//$this->db->where('user_id', $core1['user_id']);
			$this->db->where('id', $bayId);
			$this->db->update('core2', array("close" => $flag));
			return $bayId;
		}
		
	}	
	

}