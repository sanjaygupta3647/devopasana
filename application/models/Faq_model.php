<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Faq_model extends MY_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->table_name = 'faq';
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
        $this->db->select('f.*,c.title as campaign');
        $this->db->from('faq f'); 
        $this->db->join('campaign c', 'c.id = f.campaign_id','left');
        if (!empty($status)) {
            $this->db->where('status', $status);
        }
        $this->db->order_by('f.porder', 'asc');
        $query = $this->db->get();
        return $query->result();
    }

    function getAllFaqBycampaign($campaign_id)
    {
        $this->db->select('id,subject,status,body');
        $this->db->from('faq');
        if (!empty($campaign_id)) {
            $this->db->where('campaign_id', $campaign_id);
        }
        $this->db->order_by('porder', 'asc');
        $query = $this->db->get();
        return $query->result();
    }

    function getAllFaq($campaign_id)
    {
        $this->db->select('id,subject,status,body');
        $this->db->from('faq'); 
        $this->db->where('status', 'Active'); 
        if (!empty($campaign_id)) {
            $this->db->where("campaign_id = $campaign_id or campaign_id = 0");
        }else{
            $this->db->where('campaign_id', 0);
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
