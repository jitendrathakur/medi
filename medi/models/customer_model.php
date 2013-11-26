<?php
Class Customer_model extends CI_Model
{

	//this is the expiration for a non-remember session
	var $session_expire	= 7200;
	
	
	function __construct()
	{
			parent::__construct();
			 
	}
	
	/********************************************************************

	********************************************************************/
	
	function get_customers($limit=0, $offset=0, $order_by='id', $direction='DESC')
	{
		$this->db->order_by($order_by, $direction);
		if($limit>0)
		{
			$this->db->limit($limit, $offset);
		}

		$result	= $this->db->get('customers');
		return $result->result();
	}
	
	function count_customers()
	{
		return $this->db->count_all_results('customers');
	}
	
	function get_customer($id)
	{
		
		$result	= $this->db->get_where('customers', array('id'=>$id));
		
		return $result->row();
	}
	
	function get_subscribers()
	{
		$this->db->where('email_subscribe','1');
		$res = $this->db->get('customers');
		return $res->result_array();
	}
	
	
	function get_usercourse_list($id,$limit=0, $offset=0, $order_by='gp_user_community.id', $direction='DESC')
	{
		
		$this->db->select('gp_batches.name as batch,gp_batches.id as batchid,gp_courses.name as course,
		gp_courses.id as courseid,gp_batches.enable_on as enable_on,gp_batches.disable_on as disable_on,training,venue,gp_user_community.created_date as regdate');
		$this->db->join('gp_course_orders', 'gp_course_orders.community_id = gp_user_community.id');
		$this->db->join('gp_batches', 'gp_batches.id = gp_user_community.batch_id');
		$this->db->join('gp_courses',  'gp_courses.id = gp_batches.parent_id');
		
		$this->db->where('customer_id', $id);
		//$this->db->where('customer_id', $id);
		$this->db->order_by($order_by, $direction);
		if($limit>0)
		{
			$this->db->limit($limit, $offset);
		}
		$courses = $this->db->get('gp_user_community')->result_array();
		//echo $this->db->last_query();
		
		return $courses;
	}
	function get_usercourse($id,$bid)
	{
		$this->db->select('*,gp_batches.name as batchname');
		$this->db->join('gp_course_orders', 'gp_course_orders.community_id = gp_user_community.id');
		$this->db->join('gp_batches', 'gp_batches.id = gp_user_community.batch_id');
		$this->db->join('gp_courses',  'gp_courses.id = gp_batches.parent_id');				
		$result	= $this->db->get_where('gp_user_community', array('customer_id'=>$id,'gp_user_community.batch_id'=>$bid));
		//echo $this->db->last_query();
		
		return $result->row();
		
	}
	
	function get_usermaterials($id,$bid)
	{
		$this->db->select('*,gp_batches.name as batchname');
		$this->db->join('gp_course_orders', 'gp_course_orders.community_id = gp_user_community.id');
		$this->db->join('gp_batches', 'gp_batches.id = gp_user_community.batch_id');
		$this->db->join('gp_courses',  'gp_courses.id = gp_batches.parent_id');				
		$result	= $this->db->get_where('gp_user_community', array('customer_id'=>$id,'gp_user_community.batch_id'=>$bid));
		//echo $this->db->last_query();
		$batches = $result->row();
		if($batches)
		{
			
		$this->db->select('*');
		$this->db->join('gp_batch_materials', 'gp_materials.id = gp_batch_materials.material_id');
		$this->db->join('gp_user_community', 'gp_user_community.batch_id = gp_batch_materials.batch_id');		
		$result	= $this->db->get_where('gp_materials', array('gp_user_community.user_id'=>$id,'gp_user_community.batch_id'=>$batches ->batch_id));
		//echo $this->db->last_query();
		$materials	= $result->result();
		
		return $materials;
		
		}
		
	}
	
	function get_userdownloads($id,$bid)
	{
		$this->db->select('*,gp_batches.name as batchname');
		$this->db->join('gp_course_orders', 'gp_course_orders.community_id = gp_user_community.id');
		$this->db->join('gp_batches', 'gp_batches.id = gp_user_community.batch_id');
		$this->db->join('gp_courses',  'gp_courses.id = gp_batches.parent_id');				
		$result	= $this->db->get_where('gp_user_community', array('customer_id'=>$id,'gp_user_community.batch_id'=>$bid));
		//echo $this->db->last_query();
		$batches = $result->row();
		if($batches)
		{
			
		$this->db->select('gp_digital_materials.filename as dfilename,gp_digital_materials.title as dtitle,gp_digital_materials.size as dsize');
		$this->db->join('gp_digital_materials', 'gp_digital_materials.id = gp_materials_files.file_id');
		$this->db->join('gp_materials', 'gp_materials.id = gp_materials_files.material_id');
		$this->db->join('gp_batch_materials', 'gp_materials.id = gp_batch_materials.material_id');
		$this->db->join('gp_user_community', 'gp_user_community.batch_id = gp_batch_materials.batch_id');		
		$result	= $this->db->get_where('gp_materials_files', array('gp_user_community.user_id'=>$id,'gp_user_community.batch_id'=>$batches ->batch_id));
		
		$materials	= $result->result();
		
		return $materials;
		
		}
		
	}
	
		function get_members_list($bid,$cid)
	{
		

		if($cid)
		{
			$courseid= $cid;
			$this->db->join('gp_customers', 'gp_customers.id = gp_user_community.user_id');
			$this->db->group_by('gp_customers.id');
			$result	= $this->db->get_where('gp_user_community', array('order_status'=>0,'course_id'=>$courseid));
         	$result	= $result->result();
			//print_r($result);
			return $result;
				
		}
		else if($bid)
		{
			$batchid= $bid;
			$this->db->join('gp_customers', 'gp_customers.id = gp_user_community.user_id');
			$this->db->group_by('gp_customers.id');
			$result	= $this->db->get_where('gp_user_community', array('order_status'=>0,'batch_id'=>$batchid));
         	$result	= $result->result();
			//print_r($result);
			return $result;
		}
		else
		{
			return false;
		}
		
		
	}
	
	function get_verifymember($id,$uid)
	{
		
		$this->db->select('course_id');
		$this->db->where('user_id', $id);
		$members = $this->db->get('gp_user_community')->result();
		$array1 = array();
		foreach ($members as $member)
		{
		  array_push($array1,$member->course_id);
		
		}
		
	
		
		$this->db->select('course_id');
		$this->db->where('user_id', $uid);
		$ownuser = $this->db->get('gp_user_community')->result();
		$array2 = array();
		foreach ($ownuser as $member)
		{
		array_push($array2,$member->course_id);
		
		}
	
		
	  $result = array_intersect($array1, $array2);

	  
	 if(count($result) > 0)
	 {
		 return true;
	 }
	 else
	 {
		 return false;
		 
	 }
	 

		
	}
	function get_member($id,$cid)
	{
		
		
		
		
		$this->db->select('*');
		$this->db->join('gp_course_orders', 'gp_course_orders.community_id = gp_user_community.id');
	    $result	= $this->db->get_where('gp_user_community', array('customer_id'=>$id,'course_id'=>$cid));
		//echo $this->db->last_query();
		
		return $result->row();
		
	}
	
	function get_address($address_id)
	{
		$address= $this->db->where('id', $address_id)->get('customers_address_bank')->row_array();
		if($address)
		{
			$address_info			= unserialize($address['field_data']);
			$address['field_data']	= $address_info;
			$address				= array_merge($address, $address_info);
		}
		return $address;
	}
	
	function save_address($data)
	{
		// prepare fields for db insertion
		$data['field_data'] = serialize($data['field_data']);
		// update or insert
		if(!empty($data['id']))
		{
			$this->db->where('id', $data['id']);
			$this->db->update('customers_address_bank', $data);
			return $data['id'];
		} else {
			$this->db->insert('customers_address_bank', $data);
			return $this->db->insert_id();
		}
	}
	
	function delete_address($id, $customer_id)
	{
		$this->db->where(array('id'=>$id, 'customer_id'=>$customer_id))->delete('customers_address_bank');
		return $id;
	}
	
	function save($customer)
	{
		if ($customer['id'])
		{
			$this->db->where('id', $customer['id']);
			$this->db->update('customers', $customer);
			return $customer['id'];
		}
		else
		{
			$this->db->insert('customers', $customer);
			return $this->db->insert_id();
		}
	}
	
	function deactivate($id)
	{
		$customer	= array('id'=>$id, 'active'=>0);
		$this->save_customer($customer);
	}
	
	function delete($id)
	{
		/*
		deleting a customer will remove all their orders from the system
		this will alter any report numbers that reflect total sales
		deleting a customer is not recommended, deactivation is preferred
		*/
		
		//this deletes the customers record
		$this->db->where('id', $id);
		$this->db->delete('customers');
		
		// Delete Address records
		$this->db->where('customer_id', $id);
		$this->db->delete('customers_address_bank');
		
		//get all the orders the customer has made and delete the items from them
		$this->db->select('id');
		$result	= $this->db->get_where('orders', array('customer_id'=>$id));
		$result	= $result->result();
		foreach ($result as $order)
		{
			$this->db->where('order_id', $order->id);
			$this->db->delete('order_items');
		}
		
		//delete the orders after the items have already been deleted
		$this->db->where('customer_id', $id);
		$this->db->delete('orders');
	}
	
	function check_email($str, $id=false)
	{
		$this->db->select('email');
		$this->db->from('customers');
		$this->db->where('email', $str);
		if ($id)
		{
			$this->db->where('id !=', $id);
		}
		$count = $this->db->count_all_results();
		
		if ($count > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	
	/*
	these functions handle logging in and out
	*/
	function logout()
	{
		$this->session->unset_userdata('customer');
		$this->go_past->destroy(false);
		//unset($_SESSION['userid']);
		session_destroy();
	//	$this->session->sess_destroy();
	}
	
	function login($email, $password, $remember=false)
	{
		$this->db->select('*');
		$this->db->where('email', $email);
		$this->db->where('active', 1);
		$this->db->where('password',  sha1($password));
		$this->db->limit(1);
		$result = $this->db->get('customers');
		$customer	= $result->row_array();
		
		//$this->db->last_query();
		
		
		if ($customer)
		{
		
			// Retrieve customer addresses
			
				//echo $session_data['customer'];
		   $_SESSION['userid'] = $customer['id'];
			$this->db->where(array('customer_id'=>$customer['id'], 'id'=>$customer['default_billing_address']));
			$address = $this->db->get('customers_address_bank')->row_array();
			if($address)
			{
				$fields = unserialize($address['field_data']);
				$customer['bill_address'] = $fields;
				$customer['bill_address']['id'] = $address['id']; // save the addres id for future reference
			}
			
			$this->db->where(array('customer_id'=>$customer['id'], 'id'=>$customer['default_shipping_address']));
			$address = $this->db->get('customers_address_bank')->row_array();
			if($address)
			{
				$fields = unserialize($address['field_data']);
				$customer['ship_address'] = $fields;
				$customer['ship_address']['id'] = $address['id'];
			} else {
				 $customer['ship_to_bill_address'] = 'true';
			}
			
			
			// Set up any group discount 
			if($customer['group_id']!=0) 
			{
				$group = $this->get_group($customer['group_id']);
				if($group) // group might not exist
				{
					if($group->discount_type == "fixed")
					{
						$customer['group_discount_formula'] = "- ". $group->discount; 
					}
					else
					{
						$percent	= (100-(float)$group->discount)/100;
						$customer['group_discount_formula'] = '* ('.$percent.')';
					}
				}
			}
			
			if(!$remember)
			{
				$customer['expire'] = time()+$this->session_expire;
			}
			else
			{
				$customer['expire'] = false;
			}
			
			// put our customer in the cart
			$this->go_past->save_customer($customer);
			
			
			

		
			return true;
		}
		else
		{
			return false;
		}
	}
	
	function is_logged_in($redirect = false, $default_redirect = 'secure/login/')
	{
		
		//$redirect allows us to choose where a customer will get redirected to after they login
		//$default_redirect points is to the login page, if you do not want this, you can set it to false and then redirect wherever you wish.
		
		$customer = $this->go_past->customer();
		
	
		if (!isset($customer['id']))
		{
			//this tells gocart where to go once logged in
			if ($redirect)
			{
				$this->session->set_flashdata('redirect', $redirect);
			}
			
			if ($default_redirect)
			{	
				redirect($default_redirect);
			}
			
			return false;
		}
		else
		{
		
			//check if the session is expired if not reset the timer
			if($customer['expire'] && $customer['expire'] < time())
			{

				$this->logout();
				if($redirect)
				{
					$this->session->set_flashdata('redirect', $redirect);
				}

				if($default_redirect)
				{
					redirect('secure/login');
				}

				return false;
			}
			else
			{

				//update the session expiration to last more time if they are not remembered
				if($customer['expire'])
				{
				//	$this->load->library('session');
					
                 // $this->session->set_userdata('userid', $customer['id']);
				
			
			//	$session_data = $this->session->userdata('cart_contents');
				//echo $session_data['customer'];
	//	$_SESSION['userid'] = $session_data['customer']['id'];
			  // print_r($session_data['customer']);
			
		//	echo   $_COOKIE['GoPast'];
		//echo $_SESSION['basedata'];
		//$uid = unserialize($_COOKIE['GoPast']);
	
				$customer['expire'] = time()+$this->session_expire;
					$this->go_past->save_customer($customer);
					
					  $_SESSION['userid'] = $customer['id'];
				 
					
					
					
				}

			}

			return true;
		}
	}
	
	function reset_password($email)
	{
		$this->load->library('encrypt');
		$customer = $this->get_customer_by_email($email);
		if ($customer)
		{
			$this->load->helper('string');
			$this->load->library('email');
			
			$new_password		= random_string('alnum', 8);
			$customer['password']	= sha1($new_password);
			$this->save($customer);
			
			$this->email->from($this->config->item('email'), $this->config->item('site_name'));
			$this->email->to($email);
			$this->email->subject($this->config->item('site_name').': Password Reset');
			$this->email->message('Your password has been reset to <strong>'. $new_password .'</strong>.');
			$this->email->send();
			
			return true;
		}
		else
		{
			return false;
		}
	}
	
	function get_customer_by_email($email)
	{
		$result	= $this->db->get_where('customers', array('email'=>$email));
		return $result->row_array();
	}
	
	
	/// Customer groups functions
	
	function get_groups()
	{
		return $this->db->get('customer_groups')->result();		
	}
	
	function get_group($id)
	{
		return $this->db->where('id', $id)->get('customer_groups')->row();		
	}
	
	function delete_group($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('customer_groups');
	}
	
	function save_group($data)
	{
		if(!empty($data['id'])) 
		{
			$this->db->where('id', $data['id'])->update('customer_groups', $data);
			return $data['id'];
		} else {
			$this->db->insert('customer_groups', $data);
			return $this->db->insert_id();
		}
	}
	
	
	function get_address_list($id)
	{
		$addresses = $this->db->where('customer_id', $id)->get('customers_address_bank')->result_array();
		// unserialize the field data
		if($addresses)
		{
			foreach($addresses as &$add)
			{
				$add['field_data'] = unserialize($add['field_data']);
			}
		}
		
		return $addresses;
	}
	
	function profile_photochange($param)
	{
		$this->db->from('customers');
        $this->db->select('user_photo');
		$this->db->where('id', $param['user_id']);
		$query = $this->db->get();
	
		if($query->num_rows() > 0)
   		 {
			$row = $query->row_array();
			@unlink('./uploads/profiles/'.$row['user_photo']);
			$user_photo= $param['user_photo'];
			$data = array('user_photo' => $user_photo);
			 $this->db->where('id', $param['user_id']);
    		 $this->db->update('customers', $data);
			}
		 else
		 {
			 $data = array('user_photo' => $param['user_photo']);
			 $this->db->where('id', $param['user_id']);
   			 $this->db->update('customers', $data);
		 }
	 
	}
	
	
	
	

	
	
	
	function login_video($code,$uid)
	{
		$this->db->select('*');
		$this->db->join('gp_events', 'gp_events.id = event_registrations.event_id');
		$this->db->where('access_code', $code);
		$this->db->where('user_id', $uid);
		$this->db->where('confirmed', 1);
		// $this->db->where('disable_on BETWEEN "'.date('Y-m-d').'" AND "'.date('Y-m-d').'"');  
		$this->db->limit(1);
		$result = $this->db->get('event_registrations');
	
		
		$video_customer	= $result->row_array();
		
		return $video_customer;
		
		
	}
	
	function customer_activation($code)
	{
		$this->db->select('*');
		$this->db->where('activation', $code);		
		$this->db->where('active', 0);
		$this->db->limit(1);
		$result = $this->db->get('customers');
		$access_customer	= $result->row_array();	
		if($access_customer)
		{
			$data = array('active' => 1);
			 $this->db->where('activation', $code);
    		 $this->db->update('customers', $data);
		}
		
		return $access_customer;
		
		
	}
	
	function get_video($vid,$uid)
	{
		$this->db->select('*');
		$this->db->where('event_id', $vid);
		$this->db->where('user_id', $uid);
		$this->db->limit(1);
		$result = $this->db->get('event_registrations');
		$video_access	= $result->row_array();
		
		if ($video_access)
		{
			
			return true;
		}
		else
		{
			return false;
		}
	}
	
	
	
	
}