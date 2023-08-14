<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pooja_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
		$this->table_name = 'pooja';
		$this->primary_key = 'id';
		$this->order_by = 'id';
	}

	 

	function add($insert_data)
	{

		$this->db->insert($this->table_name, $insert_data);
		$id = $this->db->insert_id();
		return $id;
	}
	
	function addPoojaPrice($insert_data)
	{

		$this->db->insert("pooja_price", $insert_data);
		$id = $this->db->insert_id();
		return $id;
	}
	
	function getActivepooja(){
		$this->db->select('id,title');
		$this->db->from('pooja'); 
		$this->db->where('status', 'Active');
		$query = $this->db->get(); 
		return $query->result(); 
	}

	function getDetail($id)
	{
		$this->db->select('*');
		$this->db->from('pooja'); 
		$this->db->where('id', $id);
		$query = $this->db->get();
		if ($query->num_rows() == 1) {
			$row = $query->result();
			return $row[0];
		} else {
			return false;
		}
	}
	
	function getAllPriceList($id){
		$this->db->select('*');
		$this->db->from('pooja_price'); 
		$this->db->where('pooja_id', $id);
		$query = $this->db->get(); 
		return $query->result();
		 
	}

	function getAllData($postData = array())
	{
		$this->db->select('t.*');
		$this->db->from('pooja'); 
		 
		if (!empty($postData['status'])) {
			$this->db->where('t.status', $postData['status']);
		}
		$this->db->order_by('t.id', 'desc');

		$query = $this->db->get();
		return $query->result();
	}

	function getAllDataCount($postData = array())
	{
		$this->db->select('count(*) as total ');
		$this->db->from($this->table_name);
		 
		if (!empty($postData['status'])) {
			$this->db->where('status', $postData['status']);
		} 
		$query = $this->db->get();
		if ($query->num_rows() == 1) {
			$row = $query->result();
			return $row[0]->total;
		} else {
			return false;
		}
	} 

	function getAllDataForAdmin($postData = array())
	{

		$this->db->select('*');
		$this->db->from('pooja'); 
		 
 
		if (!empty($postData['t_status'])) {
			if ($postData['t_status'] != 'all') {
				$this->db->where('t.status', $postData['t_status']);
			}
		}
  
		if (!empty($postData['search']['value'])) {
			$search = urldecode($postData['search']['value']);
			$this->db->where(" (heading like '%$search%'
				 
				)  ");
		}

		$tempdb = clone $this->db;
		$queryCount = $tempdb->get();
		$count = $queryCount->num_rows();


		$this->db->limit($postData['length']);
		$this->db->offset($postData['start']);
		$this->db->order_by('id', 'desc');

		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return array('draw' => '1', 'count' => $count, 'alldata' => $query->result());
		} else {
			return array('count' => 0, 'alldata' => []);
		}
	}

	 


	function update($data, $where)
	{
		return $this->db->update($this->table_name, $data, $where);
	}
	
	
	function updatePoojaPrice($data, $where)
	{
		return $this->db->update("pooja_price", $data, $where);
	}
	



	function deletepooja($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete($this->table_name);
	}
	
	function deletePoojaPrice($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete("pooja_price");
	}
	
	function isExist($slug, $id = null)
    {

        $this->db->select('count(*) as cnt');
        $this->db->from($this->table_name);
        $this->db->where('slug', $slug);
        if (!empty($id)) {
            $this->db->where('id !=', $id);
        }

        $query = $this->db->get();
        $rows =  $query->result();
        return (!empty($rows[0]->cnt)) ? $rows[0]->cnt : false;
    }

	function getPoojaPrice($price_id)
    {

        $this->db->select('price,discount_price');
        $this->db->from("pooja_price");
        $this->db->where('id', $price_id); 
        $query = $this->db->get();
        $rows =  $query->result();
		if(!empty($rows[0]->discount_price) && $rows[0]->discount_price <= $rows[0]->price && $rows[0]->discount_price > 0){
			return $rows[0]->discount_price;
		}else{
			return $rows[0]->price;
		}
		return 0;
         
    }
}
