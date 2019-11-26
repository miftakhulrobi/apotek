<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaction_p extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        checklogin();
        checkpegawai();
        $this->load->model(['obat_m', 'transaction_m']);
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

    public function getobatid($id)
    {
        $where = ['obat_id' => $id];
        $obat = $this->obat_m->getwhere('obats', $where)->row();
        echo json_encode($obat);
    }
}
