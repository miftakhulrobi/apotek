<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pdf extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        checklogin();
        $this->load->model(['obat_m', 'transaction_m', 'keuangan_m']);
        $this->load->library('pdf_report');
    }

    public function cetaktransaksi($id)
    {
        $where = ['transaction_id' => $id];
        $data['transaksi'] = $this->transaction_m->getwhere('transaksi', $where)->row();
        $data['process'] = $this->transaction_m->getwhere('logprocess', ['transaction_id' => $data['transaksi']->transaction_id])->result();
        $this->load->view('pdf/cetaktransaksi', $data);
    }
}
