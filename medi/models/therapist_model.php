<?php
Class Therapist_model extends CI_Model
{
	
	function __checkPatientSubmission($userId, $model) {
		
		if ($userId !== false)
		{
			$this->db->order_by('id', 'DESC');
			$this->db->where('user_id', $userId);
		}
	
		$result	= $this->db->get($model)->row();

		if (isset($result->cr_timestamp) && !empty($result->cr_timestamp)) {
			return (date('Y-m-d',  strtotime($result->cr_timestamp))  >= date('Y-m-d'));	
		} else {
			return false;
		}
		
		
	}//end __checkPatientSubmission()


	function getModelList($userId = false,$limit = NULL,$offset = NULL, $model)
	{
		if (!empty($limit)) {
			$this->db->limit($limit,$offset); 
		}
		if ($userId !== false)
		{
			$this->db->where('user_id', $userId);
		}
	
		$query	= $this->db->get($model);
 
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;	
		
	}


	function __getPatientbyTherapist($therapistId = null) {

		$this->db->where('user_id', $userId);
		}
	
		$query	= $this->db->get($model);
 
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;	
		

	}
		
}//end class