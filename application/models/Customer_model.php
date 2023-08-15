<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Customer_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
		$this->table_name = 'customer';
		$this->primary_key = 'id';
		$this->order_by = 'id';
	}

	function add($insert_data,$table="")
	{
		if(empty($table)){
			$table = $this->table_name;
		}
		$this->db->insert($table, $insert_data);
		$id = $this->db->insert_id();

		return $id;
	}

	 

	function authLogin($email, $password)
	{		 
		$this->db->select('*');
		$this->db->from($this->table_name); 
		$this->db->where('email', $email);
		$this->db->where('pass', $password); 
		$this->db->limit(1); 
		$query = $this->db->get(); 
		//return $this->db->last_query();
		if ($query->num_rows() == 1) {
			$row = $query->result();
			return $row[0];
		} else {
			return false;
		}
	}

	function getUserData($id)
	{
		$this->db->select('*');
		$this->db->from($this->table_name); 
		 
		$this->db->where('id', $id);
		$this->db->limit(1);
		$query = $this->db->get(); 
		if ($query->num_rows() == 1) {
			$row = $query->result();
			return $row[0];
		} else {
			return false;
		}
	} 

	function getAllDevotee($customer_id){
		$this->db->select('*');
		$this->db->from('devotee');  
		$this->db->where('customer_id', $customer_id); 
		$query = $this->db->get();  
		return  $query->result(); 
	}
	   

	function isExist($username, $id = null)
	{

		$this->db->select('count(*) as cnt');
		$this->db->from($this->table_name);
		$this->db->where('username', $username);
		if (!empty($id)) {
			$this->db->where('id !=', $id);
		}

		$query = $this->db->get();
		$rows =  $query->result();
		return (!empty($rows[0]->cnt)) ? $rows[0]->cnt : false;
	}

	function isEmailExist($email, $id = null)
	{

		$this->db->select('count(*) as cnt');
		$this->db->from($this->table_name);
		$this->db->where('email', $email);
		if (!empty($id)) {
			$this->db->where('id !=', $id);
		} 
		$query = $this->db->get();
		$rows =  $query->result();
		return (!empty($rows[0]->cnt)) ? $rows[0]->cnt : false;
	}


	function update($data, $where,$table = "")
	{
		if(empty($table)){
			$table = $this->table_name;
		}
		return $this->db->update($table, $data, $where);
	}

	 
	 
}
