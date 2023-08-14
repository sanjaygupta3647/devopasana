<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Cart_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
		$this->table_name = 'cart_temp';
		$this->primary_key = 'id';
		$this->order_by = 'id';
	}

	 

	function add($insert_data,$table = "")
	{
        if(empty($table)){
			$table = $this->table_name;
		} 
		$this->db->insert($table, $insert_data);
		$id = $this->db->insert_id();
		return $id;
	} 

	function update($data, $where)
	{
		return $this->db->update($this->table_name, $data, $where);
	}



	function deletecampaign($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete($this->table_name);
	} 

	function isExist($session_id){
		$this->db->select('count(*) as cnt');
        $this->db->from("cart_temp"); 
		$this->db->where('session_id', $session_id); 
        $query = $this->db->get();
        $rows =  $query->result();
        return (!empty($rows[0]->cnt)) ? $rows[0]->cnt : false;
	}
	
	function getDetails($session_id)
	{
		$this->db->select('cart.*, puja.title, puja.image');
		$this->db->from('cart_temp cart'); 
		$this->db->join('pooja puja','cart.pooja_id = puja.id');  
		$this->db->where('cart.session_id', $session_id);
		$this->db->limit(1);
		$query = $this->db->get(); 
		if ($query->num_rows() == 1) {
			$row = $query->result();
			return $row[0];
		} else {
			return false;
		}
	}

	 
}
