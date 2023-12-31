<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Campaign_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
		$this->table_name = 'campaign';
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
	
	function getActiveCampaign(){
		$this->db->select('id,title');
		$this->db->from('campaign'); 
		$this->db->where('status', 'Active');
		$query = $this->db->get(); 
		return $query->result(); 
	}

	function getDetail($id)
	{
		$this->db->select('*');
		$this->db->from('campaign'); 
		$this->db->where('id', $id);
		$query = $this->db->get();
		if ($query->num_rows() == 1) {
			$row = $query->result();
			return $row[0];
		} else {
			return false;
		}
	}
	
	function getDetailBySlug($slug)
	{
		$this->db->select('*');
		$this->db->from('campaign'); 
		$this->db->where('slug', $slug);
		$query = $this->db->get();
		if ($query->num_rows() == 1) {
			$row = $query->result();
			return $row[0];
		} else {
			return false;
		}
	}

	function getAllData($postData = array())
	{
		$this->db->select('*');
		$this->db->from('campaign'); 
		 
		if (!empty($postData['status'])) {
			$this->db->where('status', $postData['status']);
		}
		$this->db->order_by('id', 'desc');

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
		$this->db->from('campaign'); 
		 
 
		if (!empty($postData['t_status'])) {
			if ($postData['t_status'] != 'all') {
				$this->db->where('t.status', $postData['t_status']);
			}
		}
  
		if (!empty($postData['search']['value'])) {
			$search = urldecode($postData['search']['value']);
			$this->db->where(" (title like '%$search%' 
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



	function deletecampaign($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete($this->table_name);
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

	function isExistPooja($campaign_id,$pooja_id){
		$this->db->select('count(*) as cnt');
        $this->db->from("campaign_pooja");
        $this->db->where('campaign_id', $campaign_id);
		$this->db->where('pooja_id', $pooja_id); 
        $query = $this->db->get();
        $rows =  $query->result();
        return (!empty($rows[0]->cnt)) ? $rows[0]->cnt : false;
	}

	function getAllCampaignPooja($campaign_id)
	{
		$this->db->select('p.id,p.title');
        $this->db->from('pooja p');
		$this->db->join('campaign_pooja cp','cp.pooja_id = p.id'); 
        $this->db->where('cp.campaign_id', $campaign_id);
		$query = $this->db->get();
        return $query->result();
		 
	}

	function addCampaignPooja($insert_data)
	{

		$this->db->insert("campaign_pooja", $insert_data);
		$id = $this->db->insert_id();
		return $id;
	}

	function deletePooja($campaign_id,$pooja_id)
	{
		$this->db->where('campaign_id', $campaign_id);
		$this->db->where('pooja_id', $pooja_id);
		return $this->db->delete("campaign_pooja");
	}

	function getAllCampaignPoojaDetails($campaign_id)
	{
		$this->load->model('pooja_model', 'pooja');
		//$this->load->model('addon_model', 'addon');
		$this->db->select('p.*');
        $this->db->from('pooja p');
		$this->db->join('campaign_pooja cp','cp.pooja_id = p.id'); 
        $this->db->where('cp.campaign_id', $campaign_id);
		$this->db->where('p.status', 'Active');
		$query = $this->db->get();
		$data = $query->result();

		$pooja = array();
		if(count($data)){
			foreach($data as $key=>$val){
				$pooja[$key]['id'] = $val->id;
				$pooja[$key]['title'] = $val->title;
				//$pooja[$key]['addons'] = $this->addon->getAllData($val->addons);
				$pooja[$key]['image'] = $val->image;
				$pooja[$key]['description'] = $val->description;
				$pooja[$key]['start_date'] = $val->start_date;
				$pooja[$key]['end_date'] = $val->end_date;
				$pooja[$key]['service_charge'] = $val->service_charge;
				$pooja[$key]['prasad_charge'] = $val->prasad_charge; 
				$pooja[$key]['pooja_price'] = $this->pooja->getAllPriceList($val->id); 
			}
		}
		return $pooja;
         
		 
	}
}
