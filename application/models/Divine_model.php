<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Divine_model extends MY_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->table_name = 'divine_category';
        $this->primary_key = 'id';
        $this->order_by = 'id';
    }

    function add($insert_data)
    {

        $this->db->insert($this->table_name, $insert_data);
        $id = $this->db->insert_id();

        return $id;
    }

    function getAll($post = array())
    {

        $this->db->select('*');
        $this->db->from($this->table_name);
        if (!empty($post['status'])) {
            $this->db->where('status', $post['status']);
        }
        if (!empty($post['divine_category_ids'])) {
            $arr = explode(",", $post['divine_category_ids']);
            $this->db->where_in('id', $arr);
        }
        $this->db->order_by('porder', 'asc');

        $query = $this->db->get();
        return $query->result();
    }
    
    function getActivedivine_category()
    {

        $this->db->select('*');
        $this->db->from($this->table_name);
        $this->db->where('status', 'Active');
        $this->db->order_by('title', 'asc');
        $this->db->order_by('porder', 'asc');
        $query = $this->db->get();
        return $query->result();
    }

    function getDivineLink()
    {

        $this->db->select('title, slug');
        $this->db->from($this->table_name);
        $this->db->where('status', 'Active');
        $this->db->order_by('title', 'asc');
        $this->db->order_by('porder', 'asc');
        $query = $this->db->get();
        return $query->result();
    }

    function getDetailBySlug($slug)
    {

        $this->db->select('*');
        $this->db->from($this->table_name);
        $this->db->where('slug', $slug);
        $this->db->where('status', 'Active');
        $query = $this->db->get();
        $rows =  $query->result();
        if (!empty($rows)) {
            return $rows[0];
        }
        return $rows;
    }

    function getNameById($id)
    {

        $this->db->select('title');
        $this->db->from($this->table_name);
        $this->db->where('id', $id);
        $query = $this->db->get();
        $rows =  $query->result();
        if (!empty($rows)) {
            return $rows[0]->title;
        }
        return false;
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

    function isExist($title, $id = null)
    {

        $this->db->select('count(*) as cnt');
        $this->db->from($this->table_name);
        $this->db->where('title', $title);
        if (!empty($id)) {
            $this->db->where('id !=', $id);
        }

        $query = $this->db->get();
        $rows =  $query->result();
        return (!empty($rows[0]->cnt)) ? $rows[0]->cnt : false;
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
