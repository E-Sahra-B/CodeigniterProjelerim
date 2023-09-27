<?php

class roomimage_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->table = "room_image";
    }


    public function get_all($where = array(), $order_by = 'id ASC', $select = '*', $limit = array())
    {
        $this->db->select($select)
            ->from($this->table)
            ->where($where);
        (!empty($order_by)) ? $this->db->order_by($order_by) : "";
        (!empty($limit)) ? $this->db->limit($limit["count"], $limit["start"]) : "";
        $results = $this->db->get()->result();
        return $results;
    }

    public function get($where = array())
    {
        return $this->db->where($where)->get($this->table)->row();
    }

    public function add($data = array())
    {
        return $this->db->insert($this->table, $data);
    }

    public function update($where = array(), $data = array())
    {
        return $this->db->where($where)->update($this->table, $data);
    }

    public function delete($where = array())
    {
        return $this->db->where($where)->delete($this->table);
    }

    public function get_insert_id()
    {
        return $this->db->insert_id();
    }
}
