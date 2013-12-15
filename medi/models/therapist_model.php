<?php
Class Therapist_model extends CI_Model
{	
	
	function getModelList($userId = false,$limit = NULL,$offset = NULL, $model, $order = array(), $start_date=null, $patient_id=null)
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
		
		if (!empty($patient_id))
		{			
			$this->db->where('user_id', $patient_id);
		}
		
		
		if (!empty($start_date))
		{			
			$this->db->like('cr_timestamp', $start_date);
		}
		
		//$start_date

		if (!empty($order['field'])) {
			//$this->db->order_by($order['field'], $order['dir']);
		} else {
			$this->db->order_by('is_read', 'ASC');	
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


	function setModelAlert($therapistId, $model) {

		$patientId = $this->__getPatientByTherapist($therapistId);


		if (!empty($patientId))
		{			
			//$this->db->where('user_id', $core1['user_id']);
			$this->db->where_in('user_id', $patientId);
			$data = array('is_read' => true);
			$this->db->update($model, $data);			
		}

		return true;

	}//end setModelAlert()
		
}//end class