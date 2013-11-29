<?php
Class Login_model extends CI_Model
{
	
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


}