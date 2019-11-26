<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Obat_m extends CI_Model
{

    public function getall($table)
    {
        return $this->db->get($table);
    }

    public function getalljoin($table)
    {
        $this->db->join('kategoris', 'kategoris.kategori_id = ' . $table . '.kategori_id', 'left');
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
}
