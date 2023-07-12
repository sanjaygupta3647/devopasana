<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Page_model extends MY_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->table_name = 'page';
        $this->primary_key = 'id';
        $this->order_by = 'id';
    }

    function add($insert_data)
    {

        $this->db->insert($this->table_name, $insert_data);
        $id = $this->db->insert_id();

        return $id;
    }

    function getAll($status = null)
    {

        $this->db->select('page.id,page.porder,page.title,page.slug,page.status,page.created_at,u.username,c.title as category');
        $this->db->from('page page');
        $this->db->join('devine_category c', 'c.id = page.category_id');
        $this->db->join('users u', 'u.id = page.created_by');
        if (!empty($status)) {
            $this->db->where('page.status', $status);
        }
        $this->db->order_by('porder', 'asc');
        $query = $this->db->get();
        return $query->result();
    }

    function getDetail($id)
    {

        $this->db->select('*');
        $this->db->from($this->table_name);
        $this->db->where('id', $id);
        $query = $this->db->get();
        $rows =  $query->result();
        if (!empty($rows)) {
            return $rows[0];
        }
        return $rows;
    }

    function getDetailBySlug($slug)
    {

        $this->db->select('*');
        $this->db->from($this->table_name);
        $this->db->where('slug', $slug);
        $query = $this->db->get();
        $rows =  $query->result();
        if (!empty($rows)) {
            return $rows[0];
        }
        return false;
    }

    function update($data, $where)
    {
        return $this->db->update($this->table_name, $data, $where);
    }

    function deleteRecord($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete($this->table_name);
    }
}
/* End of file user_model.php */
/* Location: ./application/models/user_model.php */
