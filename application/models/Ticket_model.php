<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Ticket_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
		$this->table_name = 'tickets';
		$this->primary_key = 'id';
		$this->order_by = 'id';
	}

	function addReply($insert_data)
	{
		$this->db->insert('ticket_reply', $insert_data);
		$id = $this->db->insert_id();
		return $id;
	}

	function add($insert_data)
	{

		$this->db->insert($this->table_name, $insert_data);
		$id = $this->db->insert_id();
		return $id;
	}

	function getDetail($id)
	{
		$this->db->select('t.*, d.title,ud.fname,ud.lname,ud.profile_pic,u.username');
		$this->db->from('tickets t');
		$this->db->join('department d', 'd.id = t.department_id');
		$this->db->join('user_details ud', 'ud.user_id = t.created_by');
		$this->db->join('users u', 'u.id = ud.user_id');
		$this->db->where('t.id', $id);
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
		$this->db->select('t.*, d.title');
		$this->db->from('tickets t');
		$this->db->join('department d', 'd.id = t.department_id');
		if (!empty($postData['created_by'])) {
			$this->db->where('t.created_by', $postData['created_by']);
		}
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
		if (!empty($postData['created_by'])) {
			$this->db->where('created_by', $postData['created_by']);
		}
		if (!empty($postData['status'])) {
			$this->db->where('status', $postData['status']);
		}
		if (!empty($postData['department_ids'])) {
			$dept = explode(",", $postData['department_ids']);
			$this->db->where_in('department_id', $dept);
		}

		$query = $this->db->get();
		if ($query->num_rows() == 1) {
			$row = $query->result();
			return $row[0]->total;
		} else {
			return false;
		}
	}

	function getAllReply($ticket_id)
	{
		$this->db->select('t.*, ud.fname,ud.lname,ud.profile_pic,u.username');
		$this->db->from('ticket_reply t');
		$this->db->join('user_details ud', 'ud.user_id = t.user_id');
		$this->db->join('users u', 'u.id = ud.user_id');
		$this->db->where('t.ticket_id', $ticket_id);
		$this->db->order_by('t.create_time', 'asc');
		$query = $this->db->get();
		return $query->result();
	}

	function getAllDataForAdmin($postData = array())
	{

		$this->db->select('t.*, d.title,u.username');
		$this->db->from('tickets t');
		$this->db->join('department d', 'd.id = t.department_id');
		$this->db->join('users u', 'u.id = t.created_by');
		if (!empty($postData['created_by'])) {
			$this->db->where('t.created_by', $postData['created_by']);
		}

		if (!empty($postData['department_ids'])) {
			$dept = explode(",", $postData['department_ids']);
			$this->db->where_in('t.department_id', $dept);
		}
		if (!empty($postData['t_status'])) {
			if ($postData['t_status'] != 'all') {
				$this->db->where('t.status', $postData['t_status']);
			}
		}

		if (!empty($postData['department'])) {
			$this->db->where('d.slug', $postData['department']);
		}

		if (!empty($postData['priority'])) {
			$this->db->where('t.priority', $postData['priority']);
		}

		if (!empty($postData['search']['value'])) {
			$search = urldecode($postData['search']['value']);
			$this->db->where(" (d.title like '%$search%' 
				or u.username like '%$search%' 
				or t.subject like '%$search%' 
				or t.priority like '%$search%' 
				or t.status like '%$search%'
				)  ");
		}

		$tempdb = clone $this->db;
		$queryCount = $tempdb->get();
		$count = $queryCount->num_rows();


		$this->db->limit($postData['length']);
		$this->db->offset($postData['start']);
		$this->db->order_by('t.create_time', 'desc');

		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return array('draw' => '1', 'count' => $count, 'alldata' => $query->result());
		} else {
			return array('count' => 0, 'alldata' => []);
		}
	}

	function getAllDataForUser($postData = array())
	{

		$this->db->select('t.*, d.title,u.username');
		$this->db->from('tickets t');
		$this->db->join('department d', 'd.id = t.department_id');
		$this->db->join('users u', 'u.id = t.created_by');
		if (!empty($postData['created_by'])) {
			$this->db->where('t.created_by', $postData['created_by']);
		}

		if (!empty($postData['department_ids'])) {
			$dept = explode(",", $postData['department_ids']);
			$this->db->where_in('t.department_id', $dept);
		}
		if (!empty($postData['t_status'])) {
			if ($postData['t_status'] != 'all') {
				$this->db->where('t.status', $postData['t_status']);
			}
		}

		if (!empty($postData['department'])) {
			$this->db->where('d.slug', $postData['department']);
		}

		if (!empty($postData['priority'])) {
			$this->db->where('t.priority', $postData['priority']);
		}

		if (!empty($postData['search']['value'])) {
			$search = urldecode($postData['search']['value']);
			$this->db->where(" (d.title like '%$search%' 
				or u.username like '%$search%' 
				or t.subject like '%$search%' 
				or t.priority like '%$search%' 
				or t.status like '%$search%'
				)  ");
		}

		$tempdb = clone $this->db;
		$queryCount = $tempdb->get();
		$count = $queryCount->num_rows();


		$this->db->limit($postData['length']);
		$this->db->offset($postData['start']);
		$this->db->order_by('t.create_time', 'desc');

		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return array('draw' => '1', 'count' => $count, 'alldata' => $query->result());
		} else {
			return array('count' => 0, 'alldata' => []);
		}
	}


	function updateTicket($data, $where)
	{
		return $this->db->update($this->table_name, $data, $where);
	}



	function deleteBasic($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete($this->table_name);
	}
}
