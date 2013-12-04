<?php
Class Patient_model extends CI_Model
{
	
	function core1_comment($data)
	{			
		$this->db->insert('core1_reply', $data);			
		return $this->db->insert_id();		
	}	

	function core2_comment($data)
	{			
		$this->db->insert('core2_reply', $data);			
		return $this->db->insert_id();		
	}

	function core3_comment($data)
	{			
		$this->db->insert('core3_reply', $data);			
		return $this->db->insert_id();		
	}
		
}//end class