<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Orders_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
		$this->table_name = 'orders';
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

	function update($data, $where,$table = "")
	{
		if(empty($table)){
			$table = $this->table_name;
		}
		return $this->db->update($table, $data, $where);
	} 

	function isExist($transaction_id){
		$this->db->select('count(*) as cnt');
        $this->db->from("cart_temp"); 
		$this->db->where('transaction_id', $transaction_id); 
        $query = $this->db->get();
        $rows =  $query->result();
        return (!empty($rows[0]->cnt)) ? $rows[0]->cnt : false;
	}
	
	function getDetails($transaction_id)
	{
		$this->db->select('cart.*, puja.title, puja.image, puja.addons');
		$this->db->from('cart_temp cart'); 
		$this->db->join('pooja puja','cart.pooja_id = puja.id');  
		$this->db->where('cart.transaction_id', $transaction_id);
		$this->db->limit(1);
		$query = $this->db->get(); 
		if ($query->num_rows() == 1) {
			$row = $query->result();
			return $row[0];
		} else {
			return false;
		}
	}

	function getTransDetails($transaction_id)
	{
		$this->db->select('*');
		$this->db->from('cart_temp'); 		 
		$this->db->where('transaction_id', $transaction_id);
		$this->db->limit(1);
		$query = $this->db->get(); 
		if ($query->num_rows() == 1) {
			$row = $query->result();
			return $row[0];
		} else {
			return false;
		}
	}
	
	function isExistAddOn($data){
		$this->db->select('count(*) as cnt');
        $this->db->from("cart_addons"); 
		$this->db->where('cart_id', $data['cart_id']); 
		$this->db->where('addon_id', $data['addon_id']); 
        $query = $this->db->get();
        $rows =  $query->result();
        return (!empty($rows[0]->cnt)) ? $rows[0]->cnt : false;
	}

	function addOnWithPooja($cart_id){
		$this->db->select('addon.title,addon.image, cart_addons.*');
		$this->db->from('cart_addons cart_addons');  
		$this->db->join('cart_temp cart','cart.id = cart_addons.cart_id');  
		$this->db->join('addon addon','addon.id = cart_addons.addon_id');  
		$this->db->where('cart_addons.cart_id', $cart_id); 
		$query = $this->db->get();
        $rows =  $query->result();
		//return $this->db->last_query();
		return $rows;
		 
	}

	function removePoojaAddon($data){ 
			$this->db->where('addon_id', $data['addon_id']);
			$this->db->where('cart_id', $data['cart_id']);
			return $this->db->delete("cart_addons"); 
	}

	function getAllOrdersByCustomerId($customer_id, $id="")
	{
		$this->db->select('o.*, c.title as campaign, p.title as puja,p.image as poojaimage');
		$this->db->from("orders o"); 	
		$this->db->join('campaign c','c.id = o.campaign_id');  
		$this->db->join('pooja p','p.id = o.pooja_id');
		if(!empty($id)){
			$this->db->where('o.id', $id); 
		}  	 
		$this->db->where('o.customer_id', $customer_id); 
		$this->db->order_by('o.id', 'desc'); 
		$query = $this->db->get();  
		$row = $query->result();
		return $row;
		 
	}

	function getAddOnOrder($order_id){
		$this->db->select('addon.title,addon.image, order_addons.*');
		$this->db->from('order_addons order_addons');  
		$this->db->join('orders order','order.id = order_addons.order_id');  
		$this->db->join('addon addon','addon.id = order_addons.addon_id');  
		$this->db->where('order_addons.order_id', $order_id); 
		$query = $this->db->get();
        $rows =  $query->result();
		//return $this->db->last_query();
		return $rows;
		 
	}

	function devoteeDetailOfOrder($ids){
		$this->db->select('*');
		$this->db->from('devotee'); 
		$this->db->where("id in ($ids) "); 
		$query = $this->db->get();
        $rows =  $query->result();
		//return $this->db->last_query();
		return $rows;
	}

	 
}
