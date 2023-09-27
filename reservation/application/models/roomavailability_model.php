<?php

class roomavailability_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->table = "room_availability";
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

    public function getRoomAvailability($checkin, $checkout)
    {
        $query = $this->db->select('r.title, r.default_price, rp.price, r.room_properties, ri.img_id, ra.status, ra.*')
            ->from('room_availability AS ra')
            ->join('room_image AS ri', 'ri.room_id = ra.room_id AND ri.isCover = 1')
            ->join('room AS r', 'r.id = ra.room_id', 'LEFT')
            ->join('room_pricing AS rp', 'r.id = rp.room_id AND ra.daily_date = rp.date', 'LEFT')
            ->where('ra.daily_date BETWEEN "' . $checkin . '" AND "' . $checkout . '"', null, false)
            ->order_by('ra.daily_date', 'ASC')->get();

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return array();
        }
    }
}
