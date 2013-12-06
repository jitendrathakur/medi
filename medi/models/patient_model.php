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


	function __checkPatientSubmission($userId, $model) {
		
		if ($userId !== false)
		{
			$this->db->order_by('id', 'DESC');
			$this->db->where('user_id', $userId);
		}
	
		$result	= $this->db->get($model)->row();

		return (date('Y-m-d',  strtotime($result->cr_timestamp))  >= date('Y-m-d'));
		
	}//end __checkPatientSubmission()
		
}//end class