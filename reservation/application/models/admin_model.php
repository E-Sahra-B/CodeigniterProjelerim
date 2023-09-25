<?php

class admin_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_all($table, $where = array(), $order_by = 'id ASC', $select = '*', $limit = array())
    {
        $this->db->select($select)
            ->from($table)
            ->where($where);
        (!empty($order_by)) ? $this->db->order_by($order_by) : "";
        (!empty($limit)) ? $this->db->limit($limit["count"], $limit["start"]) : "";
        $results = $this->db->get()->result();
        return $results;
    }

    public function get($table, $where = array())
    {
        return $this->db->where($where)->get($table)->row();
    }

    public function add($table, $data = array())
    {
        return $this->db->insert($table, $data);
    }

    public function update($table, $where = array(), $data = array())
    {
        return $this->db->where($where)->update($table, $data);
    }

    public function delete($table, $where = array())
    {
        return $this->db->where($where)->delete($table);
    }

    public function get_insert_id()
    {
        return $this->db->insert_id();
    }
}
