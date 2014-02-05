<?php
Class Empowerment_model extends CI_Model
{

	function save($data)
	{			
		$this->db->insert('empowerment', $data);			
		return $this->db->insert_id();		
	}	
}