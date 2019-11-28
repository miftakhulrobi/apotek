<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Obat_a extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        checklogin();
        checkadmin();
        $this->load->model(['obat_m', 'kategori_m']);
        // $this->load->model('kategori_m');
    }

    public function index()
    {
        $data['obat'] = $this->obat_m->getalljoin('obats')->result();

        $this->load->view('admin/layout/header');
        $this->load->view('admin/master/obat/cssindex');
        $this->load->view('admin/master/obat/index', $data);
        $this->load->view('admin/layout/footer');
        $this->load->view('admin/master/obat/scindex');
        $this->load->view('admin/layout/close');
    }

    public function create()
    {
        $data['kategori'] = $this->kategori_m->getall('kategoris')->result();

        $this->load->view('admin/layout/header');
        $this->load->view('admin/master/obat/csscreate');
        $this->load->view('admin/master/obat/create', $data);
        $this->load->view('admin/layout/footer');
        $this->load->view('admin/master/obat/sccreate');
        $this->load->view('admin/layout/close');
    }

    public function store()
    {
        $data = [
            'kategori_id' => $this->input->post('kategori_id'),
            'obatname' => $this->input->post('obatname'),
            'desc' => $this->input->post('desc')
        ];
        $this->obat_m->store('obats', $data);

        $where = ['kategori_id' => $this->input->post('kategori_id')];
        $kategori = $this->kategori_m->getwhere('kategoris', $where)->row();
        $update = ['cobat' => $kategori->cobat += 1];
        $this->kategori_m->update('kategoris', $update, $where);

        $this->session->set_flashdata('success', 'Data berhasil di tambahkan!');
        redirect('obat_a');
    }

    public function update()
    {
        $data = ['obatname' => $this->input->post('obatname')];
        $where = ['obat_id' => $this->input->post('id')];
        $this->obat_m->update('obats', $data, $where);

        $this->session->set_flashdata('success', 'Data berhasil di perbarui!');
        redirect('obat_a');
    }

    public function destroy($id)
    {
        $where = ['obat_id' => $id];
        $obat = $this->obat_m->getwhere('obats', $where)->row();
        $kategori = $this->kategori_m->getwhere('kategoris', ['kategori_id' => $obat->kategori_id])->row();
        $updatekategori = ['cobat' => $kategori->cobat -= 1];
        $this->kategori_m->update('kategoris', $updatekategori, ['kategori_id' => $kategori->kategori_id]);
        $this->obat_m->destroy('obats', $where);

        $this->session->set_flashdata('success', 'Data berhasil di hapus!');
        redirect('obat_a');
    }

    public function getobatid($id)
    {
        $where = ['obat_id' => $id];
        $obat = $this->obat_m->getwhere('obats', $where)->row();
        echo json_encode($obat);
    }

    public function updateobat()
    {
        $where = ['obat_id' => $this->input->post('obat_id')];
        $data = [
            'biji' => $this->input->post('biji'),
            'kaplet' => $this->input->post('kaplet'),
            'box' => $this->input->post('box'),
            'botol' => $this->input->post('botol'),
            'dus' => $this->input->post('dus'),
            'desc' => $this->input->post('desc'),
        ];
        $this->obat_m->update('obats', $data, $where);

        $this->session->set_flashdata('success', 'Data berhasil di perbarui!');
        redirect('obat_a');
    }
}
