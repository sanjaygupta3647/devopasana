<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Users_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
		$this->table_name = 'users';
		$this->primary_key = 'id';
		$this->order_by = 'id';
	}

	function add($insert_data)
	{

		$this->db->insert($this->table_name, $insert_data);
		$id = $this->db->insert_id();

		return $id;
	}

	function addDetails($insert_data)
	{

		$this->db->insert('user_details', $insert_data);
		$id = $this->db->insert_id();

		return $id;
	}

	function authLogin($username, $password)
	{
		$yum = SALT_CONSTANT . $username;
		$salt = '$2y$13$' . substr(MD5($yum), 0, 22) . '$';

		$this->db->select('u.id, username, pass, role_id, ud.fname, ud.fname,ud.lname,ud.email,ud.profile_pic,ud.address,ud.city,ud.state,ud.country, u.status');
		$this->db->from('users u');
		$this->db->join('user_details ud', 'u.id = ud.user_id');
		$this->db->where('username', $username);

		$this->db->limit(1);

		$query = $this->db->get();

		if ($query->num_rows() == 1) {
			$row = $query->result();
			return $row[0];
		} else {
			return false;
		}
	}

	function getUserData($user_id)
	{
		$this->db->select('u.id, username, pass, role_id, ud.fname, ud.fname,ud.lname,ud.email,ud.profile_pic,ud.address,ud.city,ud.state,ud.country, u.status');
		$this->db->from('users u');
		$this->db->join('user_details ud', 'u.id = ud.user_id');
		$this->db->where('u.id', $user_id);
		$this->db->limit(1);
		$query = $this->db->get(); 
		if ($query->num_rows() == 1) {
			$row = $query->result();
			return $row[0];
		} else {
			return false;
		}
	}

	function getEmailByUserId($user_id)
	{
		$this->db->select('ud.email');
		$this->db->from('users u');
		$this->db->join('user_details ud', 'u.id = ud.user_id');
		$this->db->where('u.id', $user_id);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 1) {
			$row = $query->result();
			return $row[0]->email;
		} else {
			return false;
		}
	}

	 

	function getUsername($user_id)
	{
		$this->db->select('username');
		$this->db->from($this->table_name);
		$this->db->where('id', $user_id);
		$query = $this->db->get();
		if ($query->num_rows() == 1) {
			$row = $query->result();
			return $row[0]->username;
		} else {
			return false;
		}
	}

	function getAll()
	{
		$this->db->select('u.id, username,u.created_at, r.name, role_id, ud.fname, ud.fname,ud.lname,ud.email,ud.profile_pic,ud.address,ud.city,ud.state,ud.country, u.status');
		$this->db->from('users u');
		$this->db->join('user_details ud', 'u.id = ud.user_id');
		$this->db->join('user_roles r', 'r.id = u.role_id');
		$query = $this->db->get();
		return $query->result();
	}

	function getAllForPagination($postData = array())
	{
		$this->db->select('u.id, username,u.created_at, r.name, role_id, ud.fname, ud.lname,ud.email,ud.profile_pic,ud.address,ud.city,ud.state,ud.country, u.status');
		$this->db->from('users u');
		$this->db->join('user_details ud', 'u.id = ud.user_id');
		$this->db->join('user_roles r', 'r.id = u.role_id');

		if (!empty($postData['search']['value'])) {
			$search = urldecode($postData['search']['value']);
			$this->db->where(" ( username like '%$search%' 				
				or r.name like '%$search%' 
				or ud.fname like '%$search%' 
				or ud.lname like '%$search%' 
				or ud.email like '%$search%' 
				or u.status like '%$search%'
				)  ");
		}

		$tempdb = clone $this->db;
		$queryCount = $tempdb->get();
		$count = $queryCount->num_rows();


		$this->db->limit($postData['length']);
		$this->db->offset($postData['start']);
		$this->db->order_by('u.id', 'desc');

		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return array('draw' => '1', 'count' => $count, 'alldata' => $query->result());
		} else {
			return array('count' => 0, 'alldata' => []);
		}
	}


	function getUserInfo($id)
	{
		$this->db->select('id,username,role_id,status');
		$this->db->from($this->table_name);
		$this->db->where('id', $id);
		$query = $this->db->get();
		if ($query->num_rows() == 1) {
			$row = $query->result();
			return $row[0];
		} else {
			return false;
		}
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
		$this->db->from('user_details');
		$this->db->where('email', $email);
		if (!empty($id)) {
			$this->db->where('user_id !=', $id);
		}

		$query = $this->db->get();
		$rows =  $query->result();
		return (!empty($rows[0]->cnt)) ? $rows[0]->cnt : false;
	}

	function getDetail($id)
	{
		$this->db->select('*');
		$this->db->from('user_details');
		$this->db->where('user_id', $id);
		$query = $this->db->get();
		if ($query->num_rows() == 1) {
			$row = $query->result();
			return $row[0];
		} else {
			return false;
		}
	}

	function getAllRoles()
	{
		$this->db->select('id,name');
		$this->db->from('user_roles');
		$query = $this->db->get();
		return $query->result();
	}

	function forgetPassword($username)
	{
		$yum = SALT_CONSTANT . $username;
		$salt = '$2y$13$' . substr(MD5($yum), 0, 22) . '$';

		$this->db->select('u.*');
		$this->db->from('users u');
		$this->db->where('username', $username);
		$this->db->limit(1);

		$query = $this->db->get();

		if ($query->num_rows() == 1) {
			$row = $query->result();
			return $row[0];
		} else {
			return false;
		}
	}


	function getByStatus($role_id = 2)
	{
		$this->db->select('u.status, COUNT(*) as count');
		$this->db->from('users u');
		$this->db->where('u.role_id', $role_id);
		$this->db->group_by('u.status');
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			$row = $query->result();
			return $row;
		} else {
			return false;
		}
	}

	function getByClientId($client_id)
	{
		$this->db->select('id, username, client_id');
		$this->db->from('users');
		$this->db->where('client_id', $client_id);
		$query = $this->db->get();
		$row = $query->row();
		return $row;
	}

	function updateUser($data, $where)
	{
		return $this->db->update('users', $data, $where);
	}

	function updateUserDetails($data, $where)
	{
		return $this->db->update('user_details', $data, $where);
	}

	function getProfileImage($user_id)
	{

		$this->db->select('profile_pic');
		$this->db->from('user_details');
		$this->db->where('user_id', $user_id);
		$query = $this->db->get();
		$rows =  $query->result();
		return (!empty($rows[0]->profile_pic)) ? $rows[0]->profile_pic : false;
	}

	function deleteBasic($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete($this->table_name);
	}

	function deleteDetails($id)
	{
		$this->db->where('user_id', $id);
		return $this->db->delete('user_details');
	}
}
