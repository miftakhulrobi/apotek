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

    public function cetaktransaksi()
    {
        $data['process'] = $this->transaction_m->get('process')->result();
        $nonota = $this->transaction_m->nonota();

        $insert = [
            'transaction_id' => $nonota,
            'nota' => 'ARH/' . $nonota . '/KSR/' . strtoupper($this->session->userdata('name')),
            'money' => $this->input->post('pricetotal'),
            'created_at' => date('ymd'),
        ];
        $this->transaction_m->store('transaksi', $insert);

        $saldo = $this->keuangan_m->getwhere('saldo', ['saldo_id' => 1])->row();
        $newsaldo = [
            'saldos' => $saldo->saldos += $this->input->post('pricetotal')
        ];
        $wheresaldo = ['saldo_id' => 1];
        $this->keuangan_m->update('saldo', $newsaldo, $wheresaldo);

        $data['nota'] = 'ARH/' . $nonota . '/KSR/' . strtoupper($this->session->userdata('name'));
        $data['pricemoney'] = $this->input->post('pricemoney');
        $data['pricetotal'] = $this->input->post('pricetotal');
        $data['pricebayar'] = $this->input->post('pricebayar');
        $data['pricediscount'] = $this->input->post('pricediscount');
        $data['pricekembalian'] = $this->input->post('pricekembalian');

        $this->load->view('pdf/cetaktransaksi', $data);
    }
}
