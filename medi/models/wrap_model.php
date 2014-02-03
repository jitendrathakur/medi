<?php
Class Wrap_model extends CI_Model
{

	function save($data)
	{			
		$this->db->insert('wrap', $data);			
		return $this->db->insert_id();		
	}	
}