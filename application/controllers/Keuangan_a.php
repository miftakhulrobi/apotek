<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Keuangan_a extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        checklogin();
        checkadmin();
        $this->load->model(['kategori_m', 'keuangan_m']);
    }

    public function index()
    {
        $data['saldo'] = $this->keuangan_m->getwhere('saldo', ['saldo_id' => 1])->row();
        $data['pengeluaran'] = $this->keuangan_m->getallorder('pengeluaran')->result();

        $this->load->view('admin/layout/header');
        $this->load->view('admin/keuangan/cssindex');
        $this->load->view('admin/keuangan/index', $data);
        $this->load->view('admin/layout/footer');
        $this->load->view('admin/keuangan/scindex');
        $this->load->view('admin/layout/close');
    }

    public function store()
    {
        $saldo = $this->keuangan_m->getwhere('saldo', ['saldo_id' => 1])->row();
        if ($saldo->saldos < $this->input->post('total')) {
            $this->session->set_flashdata('error', 'Pengeluaran melebihi total saldo!');
            redirect('keuangan_a');
        } else {
            $data = [
                'total' => $this->input->post('total'),
                'keperluan' => $this->input->post('keperluan')
            ];
            $this->keuangan_m->store('pengeluaran', $data);

            $newsaldo = [
                'saldos' => $saldo->saldos -= $this->input->post('total')
            ];
            $wheresaldo = ['saldo_id' => 1];
            $this->keuangan_m->update('saldo', $newsaldo, $wheresaldo);

            $this->session->set_flashdata('success', 'Pengeluaran berhasil di tambahkan!');
            redirect('keuangan_a');
        }
    }

    public function destroy($id)
    {
        $where = ['pengeluaran_id' => $id];
        $this->keuangan_m->destroy('pengeluaran', $where);

        $this->session->set_flashdata('success', 'Data berhasil di hapus!');
        redirect('keuangan_a');
    }

    public function truncate()
    {
        $this->keuangan_m->truncate('pengeluaran');
        $this->session->set_flashdata('success', 'Data berhasil di hapus!');
        redirect('keuangan_a');
    }
}
