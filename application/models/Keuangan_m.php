<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Keuangan_m extends CI_Model
{

    public function getall($table)
    {
        return $this->db->get($table);
    }

    public function getwhere($table, $where)
    {
        return $this->db->get_where($table, $where);
    }

    public function store($table, $data)
    {
        $this->db->insert($table, $data);
    }

    public function update($table, $data, $where)
    {
        $this->db->where($where);
        return $this->db->update($table, $data);
    }

    public function destroy($table, $where)
    {
        $this->db->where($where);
        return $this->db->delete($table);
    }

    public function truncate($table)
    {
        $this->db->empty_table($table);
    }

    public function getallorder($table)
    {
        $this->db->order_by('pengeluaran_id', 'desc');
        return $this->db->get($table);
    }
}
