<?php
Class Forensic_model extends CI_Model
{

	function get_forensic($parent = false,$limit = NULL,$offset = NULL)
	{
		if($limit)
		{
		$this->db->limit($limit,$offset); 
		}
		if ($parent !== false)
		{
			$this->db->where('user_id', $parent);
		}

	
		$result	= $this->db->get('forensic')->row();
		
		
		return $result;
	}
	
	
		
	
	function count_all_forensic()
	{
		return $this->db->count_all_results('forensic');
	}
	
	function get_forensic_limit($limit = null)
	{
		
		$this->db->select('id');
		$this->db->order_by('forensic.sequence', 'ASC');
		
		//this will alphabetize them if there is no sequence
		$this->db->order_by('id', 'desc');
		$result	= $this->db->get('forensic',$limit);
		//echo $this->db->last_query();
		
		$forensic	= array();
		foreach($result->result() as $cat)
		{
			$forensic[]	= $this->get_course($cat->id);
		}
		
		return $forensic;
	}
	
	
	
	
	//this is for building a menu
	function get_forensic_tierd($parent=0)
	{
		$forensic	= array();
		$result	= $this->get_forensic($parent);
		foreach ($result as $course)
		{
			$forensic[$course->id]['course']	= $course;
			$forensic[$course->id]['children']	= $this->get_forensic_tierd($course->id);
		}
		return $forensic;
	}
	
	function course_autocomplete($name, $limit)
	{
		return	$this->db->like('name', $name)->get('forensic', $limit)->result();
	}
	
	function get_course($id)
	{
		return $this->db->get_where('forensic', array('id'=>$id))->row();
	}
	
	function get_course_products_admin($id)
	{
		$this->db->order_by('sequence', 'ASC');
		$result	= $this->db->get_where('course_products', array('course_id'=>$id));
		$result	= $result->result();
		
		$contents	= array();
		foreach ($result as $product)
		{
			$result2	= $this->db->get_where('products', array('id'=>$product->product_id));
			$result2	= $result2->row();
			
			$contents[]	= $result2;	
		}
		
		return $contents;
	}
	
	function get_course_products($id, $limit, $offset)
	{
		$this->db->order_by('sequence', 'ASC');
		$result	= $this->db->get_where('course_products', array('course_id'=>$id), $limit, $offset);
		$result	= $result->result();
		
		$contents	= array();
		$count		= 1;
		foreach ($result as $product)
		{
			$result2	= $this->db->get_where('products', array('id'=>$product->product_id));
			$result2	= $result2->row();
			
			$contents[$count]	= $result2;
			$count++;
		}
		
		return $contents;
	}
	
	function organize_contents($id, $products)
	{
		//first clear out the contents of the course
		$this->db->where('course_id', $id);
		$this->db->delete('course_products');
		
		//now loop through the products we have and add them in
		$sequence = 0;
		foreach ($products as $product)
		{
			$this->db->insert('course_products', array('course_id'=>$id, 'product_id'=>$product, 'sequence'=>$sequence));
			$sequence++;
		}
	}
	
	function save($forensic)
	{
		if (!empty($forensic['id']))
		{
			$this->db->where('user_id', $forensic['user_id']);
			$this->db->where('id', $forensic['id']);
			$this->db->update('forensic', $forensic);
		
			
			return $forensic['id'];
		}
		else
		{
			$this->db->insert('forensic', $forensic);			
			return $this->db->insert_id();
		}
		
		
	}
	
	function delete($id)
	{
		//$this->db->where('id', $id);
		//$this->db->delete('forensic');
		
		//delete references to this course in the product to course table
		//$this->db->where('course_id', $id);
		//$this->db->delete('course_batches');
	}
	
	
	
	function count_forensic($id)
	{
		return $this->db->select('product_id')->from('category_products')->join('products', 'category_products.product_id=products.id')->where(array('category_id'=>$id, 'enabled'=>1))->count_all_results();
	}
}