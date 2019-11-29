<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori_a extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        checklogin();
        checkadmin();
        $this->load->model('kategori_m');
    }

    public function index()
    {
        $data['kategori'] = $this->kategori_m->getall('kategoris')->result();

        $this->load->view('admin/layout/header');
        $this->load->view('admin/master/kategori/index', $data);
        $this->load->view('admin/layout/footer');
        $this->load->view('admin/master/kategori/scindex');
        $this->load->view('admin/layout/close');
    }

    public function store()
    {
        $data = ['kategoriname' => $this->input->post('kategoriname')];
        $this->kategori_m->store('kategoris', $data);

        $this->session->set_flashdata('success', 'Data berhasil di tambahkan!');
        redirect('kategori_a');
    }

    public function update()
    {
        $data = ['kategoriname' => $this->input->post('kategoriname')];
        $where = ['kategori_id' => $this->input->post('id')];
        $this->kategori_m->update('kategoris', $data, $where);

        $this->session->set_flashdata('success', 'Data berhasil di perbarui!');
        redirect('kategori_a');
    }

    public function destroy($id)
    {
        $this->kategori_m->destroy('kategoris', ['kategori_id' => $id]);

        $this->session->set_flashdata('success', 'Data berhasil di hapus!');
        redirect('kategori_a');
    }
}
