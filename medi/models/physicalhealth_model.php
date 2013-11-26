<?php
Class Physicalhealth_model extends CI_Model
{

	function get_physicalhealth($parent = false,$limit = NULL,$offset = NULL)
	{
		if($limit)
		{
		$this->db->limit($limit,$offset); 
		}
		if ($parent !== false)
		{
			$this->db->where('user_id', $parent);
		}

	
		$result	= $this->db->get('physicalhealth')->row();
		
		
		return $result;
	}
	
	
		
	
	function count_all_physicalhealth()
	{
		return $this->db->count_all_results('physicalhealth');
	}
	
	function get_physicalhealth_limit($limit = null)
	{
		
		$this->db->select('id');
		$this->db->order_by('physicalhealth.sequence', 'ASC');
		
		//this will alphabetize them if there is no sequence
		$this->db->order_by('id', 'desc');
		$result	= $this->db->get('physicalhealth',$limit);
		//echo $this->db->last_query();
		
		$physicalhealth	= array();
		foreach($result->result() as $cat)
		{
			$physicalhealth[]	= $this->get_course($cat->id);
		}
		
		return $physicalhealth;
	}
	
	
	
	
	//this is for building a menu
	function get_physicalhealth_tierd($parent=0)
	{
		$physicalhealth	= array();
		$result	= $this->get_physicalhealth($parent);
		foreach ($result as $course)
		{
			$physicalhealth[$course->id]['course']	= $course;
			$physicalhealth[$course->id]['children']	= $this->get_physicalhealth_tierd($course->id);
		}
		return $physicalhealth;
	}
	
	function save($physicalhealth)
	{
			if ($physicalhealth['id'])
			{
				$this->db->where('user_id', $physicalhealth['user_id']);
				$this->db->where('id', $physicalhealth['id']);
				$this->db->update('physicalhealth', $physicalhealth);
				return $physicalhealth['id'];
			}
			else
			{
				$this->db->insert('physicalhealth', $physicalhealth);			
				return $this->db->insert_id();
			}
		
	}
	
	function delete($id)
	{
		//$this->db->where('id', $id);
		//$this->db->delete('physicalhealth');
		
		//delete references to this course in the product to course table
		//$this->db->where('course_id', $id);
		//$this->db->delete('course_batches');
	}
	
	
	
	function count_physicalhealth($id)
	{
		return $this->db->select('product_id')->from('category_products')->join('products', 'category_products.product_id=products.id')->where(array('category_id'=>$id, 'enabled'=>1))->count_all_results();
	}
}