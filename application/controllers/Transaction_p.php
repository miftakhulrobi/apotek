<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaction_p extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        checklogin();
        checkpegawai();
        $this->load->model('transaction_m');
        $this->load->model('keuangan_m');
        $this->load->model('obat_m');
    }

    public function index()
    {
        $this->transaction_m->truncate('process');
        $data['obat'] = $this->obat_m->getalljoin('obats')->result();

        $this->load->view('pegawai/layout/header');
        $this->load->view('pegawai/transaction/index', $data);
        $this->load->view('pegawai/layout/footer');
        $this->load->view('pegawai/transaction/scindex');
        $this->load->view('pegawai/layout/close');
    }

    public function inserttoprocess()
    {
        $data = [
            'product' => $this->input->post('product'),
            'price' => $this->input->post('price'),
            'qty' => $this->input->post('qty'),
            'total' => $this->input->post('total'),
        ];
        $this->transaction_m->store('process', $data);
        echo json_encode('Sukses');
    }

    public function reset()
    {
        $this->transaction_m->truncate('process');
        $this->session->set_flashdata('success', 'Transaksi di batalkan!');
        redirect('transaction_p');
    }

    public function store()
    {
        $data = [
            'nota' => $this->input->post('nota'),
            'money' => $this->input->post('money'),
            'created_at' => date('d M Y'),
        ];
        $this->transaction_m->store('transaksi', $data);
        echo json_encode($data);
    }

    public function newtransaksi()
    {
        $nonota = $this->transaction_m->nonota();
        $data = [
            'transaction_id' => $nonota,
            'nota' => 'ARH/' . $nonota . '/KSR/' . strtoupper($this->session->userdata('name')),
            'money' => $this->input->post('pricetotal'),
            'pricemoney' => $this->input->post('pricemoney'),
            'pricebayar' => $this->input->post('pricebayar'),
            'pricediscount' => $this->input->post('pricediscount'),
            'pricekembalian' => $this->input->post('pricekembalian'),
            'created_at' => date('ymd'),
        ];
        $this->transaction_m->store('transaksi', $data);

        $saldo = $this->keuangan_m->getwhere('saldo', ['saldo_id' => 1])->row();
        $newsaldo = [
            'saldos' => $saldo->saldos += $this->input->post('pricetotal')
        ];
        $wheresaldo = ['saldo_id' => 1];
        $this->keuangan_m->update('saldo', $newsaldo, $wheresaldo);

        $process = $this->transaction_m->get('process')->result();
        $transaksi = $this->transaction_m->getwhere('transaksi', $data)->row();
        foreach ($process as $p) {
            $insert = [
                'transaction_id' => $transaksi->transaction_id,
                'product' => $p->product,
                'price' => $p->price,
                'qty' => $p->qty,
                'total' => $p->total
            ];
            $this->transaction_m->store('logprocess', $insert);
        }
        $this->transaction_m->truncate('process');

        echo json_encode($transaksi);
    }
}
