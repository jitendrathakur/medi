<?php
Class Tmed_model extends CI_Model
{

	function get_tmed($parent = false,$limit = NULL,$offset = NULL)
	{
		if($limit)
		{
		$this->db->limit($limit,$offset); 
		}
		if ($parent !== false)
		{
			$this->db->where('user_id', $parent);
		}

	
		$result	= $this->db->get('tmed')->row();
		
		
		return $result;
	}
	
	
		
	
	function count_all_tmed()
	{
		return $this->db->count_all_results('tmed');
	}
	
	function get_tmed_limit($limit = null)
	{
		
		$this->db->select('id');
		$this->db->order_by('tmed.sequence', 'ASC');
		
		//this will alphabetize them if there is no sequence
		$this->db->order_by('id', 'desc');
		$result	= $this->db->get('tmed',$limit);
		//echo $this->db->last_query();
		
		$tmed	= array();
		foreach($result->result() as $cat)
		{
			$tmed[]	= $this->get_course($cat->id);
		}
		
		return $tmed;
	}
	
	
	
	
	//this is for building a menu
	function get_tmed_tierd($parent=0)
	{
		$tmed	= array();
		$result	= $this->get_tmed($parent);
		foreach ($result as $course)
		{
			$tmed[$course->id]['course']	= $course;
			$tmed[$course->id]['children']	= $this->get_tmed_tierd($course->id);
		}
		return $tmed;
	}
	
	function save($tmed)
	{
		if (!empty($tmed['id']))
		{
			$this->db->where('user_id', $tmed['user_id']);
			$this->db->where('id', $tmed['id']);
			$this->db->update('tmed', $tmed);
			return $tmed['id'];
		}
		else
		{
			$this->db->insert('tmed', $tmed);			
			return $this->db->insert_id();
		}
		
	}
	
	function delete($id)
	{
		//$this->db->where('id', $id);
		//$this->db->delete('tmed');
		
		//delete references to this course in the product to course table
		//$this->db->where('course_id', $id);
		//$this->db->delete('course_batches');
	}
	
	
	
	function count_tmed($id)
	{
		return $this->db->select('product_id')->from('category_products')->join('products', 'category_products.product_id=products.id')->where(array('category_id'=>$id, 'enabled'=>1))->count_all_results();
	}
}