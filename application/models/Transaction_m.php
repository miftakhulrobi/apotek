<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaction_m extends CI_Model
{

    public function get($table)
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

    public function truncate($table)
    {
        $this->db->empty_table($table);
    }

    public function nonota()
    {
        $q = $this->db->query("SELECT MAX(RIGHT(transaction_id,4)) AS kd_max FROM transaksi WHERE DATE(tanggal)=CURDATE()");
        $kd = '';
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $k) {
                $tmp = ((int) $k->kd_max) + 1;
                $kd = sprintf("%04s", $tmp);
            }
        } else {
            $kd = '0001';
        }
        date_default_timezone_set('Asia/Jakarta');
        return date('dmy') . $kd;
    }
}
