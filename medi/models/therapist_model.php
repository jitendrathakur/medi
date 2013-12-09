<?php
Class Therapist_model extends CI_Model
{	
	
	function getModelList($userId = false,$limit = NULL,$offset = NULL, $model)
	{

		$patientId = $this->__getPatientByTherapist($userId);

		$this->db->select($model.'.*, admin.firstname, admin.lastname');

		$this->db->join('admin', $model.'.user_id=admin.id');

		if (!empty($limit)) {
			$this->db->limit($limit,$offset); 
		}
		if ($userId !== false)
		{			
			$this->db->where_in('user_id', $patientId);
		}		
		
		$this->db->order_by('is_read', 'ASC');		
			
		$query	= $this->db->get($model);
 
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;	
		
	}


	function read_count($therapistId = null) {

		$patientId = $this->__getPatientByTherapist($therapistId);

		$models = array('wellness', 'recoveryvitals', 'tmed', 'physicalhealth', 'forensic', 'cooccurring');

        foreach($models as $model) {
        	$this->db->where_in('user_id', $patientId);
			$data[] = $this->db->where('is_read', false)->count_all_results($model);
        }
		
        return array_sum($data);			
	}


	function __getPatientByTherapist($therapistId = null) {
		
		$this->db->where('therapist_id', $therapistId);
			
		$query	= $this->db->get('patient_therapist');
        
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row->patient_id;
            }
            return $data;
        }
        return false;	

	}
		
}//end class