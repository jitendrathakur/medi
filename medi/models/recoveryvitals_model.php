<?php
Class Recoveryvitals_model extends CI_Model
{

	function get_recoveryvitals($parent = false,$limit = NULL,$offset = NULL)
	{
		if($limit)
		{
		$this->db->limit($limit,$offset); 
		}
		if ($parent !== false)
		{
			$this->db->where('user_id', $parent);
		}

	
		$result	= $this->db->get('recoveryvitals')->row();
		
		
		return $result;
	}
	
	
		
	
	function count_all_recoveryvitals()
	{
		return $this->db->count_all_results('recoveryvitals');
	}
	
	function get_recoveryvitals_limit($limit = null)
	{
		
		$this->db->select('id');
		$this->db->order_by('recoveryvitals.sequence', 'ASC');
		
		//this will alphabetize them if there is no sequence
		$this->db->order_by('id', 'desc');
		$result	= $this->db->get('recoveryvitals',$limit);
		//echo $this->db->last_query();
		
		$recoveryvitals	= array();
		foreach($result->result() as $cat)
		{
			$recoveryvitals[]	= $this->get_course($cat->id);
		}
		
		return $recoveryvitals;
	}
	
	
	
	
	//this is for building a menu
	function get_recoveryvitals_tierd($parent=0)
	{
		$recoveryvitals	= array();
		$result	= $this->get_recoveryvitals($parent);
		foreach ($result as $course)
		{
			$recoveryvitals[$course->id]['course']	= $course;
			$recoveryvitals[$course->id]['children']	= $this->get_recoveryvitals_tierd($course->id);
		}
		return $recoveryvitals;
	}
	
	function save($recoveryvitals)
	{
			if (!empty($recoveryvitals['id']))
			{
				$this->db->where('user_id', $recoveryvitals['user_id']);
				$this->db->where('id', $recoveryvitals['id']);
				$this->db->update('recoveryvitals', $recoveryvitals);
				return $recoveryvitals['id'];
			}
			else
			{
				$this->db->insert('recoveryvitals', $recoveryvitals);			
				return $this->db->insert_id();
			}
		
	}
	
	function delete($id)
	{
		//$this->db->where('id', $id);
		//$this->db->delete('recoveryvitals');
		
		//delete references to this course in the product to course table
		//$this->db->where('course_id', $id);
		//$this->db->delete('course_batches');
	}
	
	
	
	function count_recoveryvitals($id)
	{
		return $this->db->select('product_id')->from('category_products')->join('products', 'category_products.product_id=products.id')->where(array('category_id'=>$id, 'enabled'=>1))->count_all_results();
	}
}