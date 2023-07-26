<?php defined('BASEPATH') OR exit('No direct script access allowed');

class General_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function getOne($table, $where) {
        $query = $this->db->get_where($table, $where);
        return $query->row();
    }

    public function getOneOrderby($table, $where = '', $order_by = '', $order = '')
    {
        $this->db->select()->where($where);
        if (!empty($order_by)) {
            if (!empty($order)) {
                $this->db->order_by($order_by, $order);
            } else {
                $this->db->order_by($order_by, 'ASC');
            }
        }
        $query = $this->db->get($table);
        return $query->row();
    }

    public function getAll($table, $where = '') {
        if (!empty($where)) {
            $this->db->where($where);
        }
        $query = $this->db->get($table);
        return $query->result();
    }

    public function insert($table, $data) {
        $this->db->insert($table, $data);
        return $this->db->insert_id();
    }

    public function delete($table, $where) {
        return $this->db->where($where)->delete($table);
    }

    public function update($table, $where, $data) {
        return $this->db->update($table, $data, $where);
    }

    public function update_batch($table, $data, $key) {
        return $this->db->update_batch($table, $data, $key);
    }

    public function insert_batch($table, $data) {
        return $this->db->insert_batch($table, $data);
    }


    public function getCount($table, $where = '')
    {
        if (!empty($where)) {
            $query = $this->db->select()
                ->where($where)
                ->get($table);
        } else {
            $query = $this->db->select()
                ->get($table);
        }

        return $query->num_rows();
    }

    public function update_record($table = " ", $column = " ", $where = " ") {
        $this->db->where($where);
        return $this->db->update($table, $column);
    }

    public function getProductType()
    {
        $this->db->select('product_type.nid, product_type.cname');
        $this->db->where('product_type.user_id', $this->data['user_session']['id']);
        $query = $this->db->get('product_type');
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
}
