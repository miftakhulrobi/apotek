<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_a extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        checklogin();
        checkadmin();
        $this->load->model(['transaction_m']);
    }

    public function index()
    {
        $date = date('ymd');

        $hari0 = strtotime($date);
        $hari1 = strtotime($date);
        $hari2 = strtotime($date);
        $hari3 = strtotime($date);
        $hari4 = strtotime($date);
        $hari5 = strtotime($date);
        $hari6 = strtotime($date);

        $hari0 = date('ymd', strtotime("-0 day", $hari0));
        $hari1 = date('ymd', strtotime("-1 day", $hari1));
        $hari2 = date('ymd', strtotime("-2 day", $hari2));
        $hari3 = date('ymd', strtotime("-3 day", $hari3));
        $hari4 = date('ymd', strtotime("-4 day", $hari4));
        $hari5 = date('ymd', strtotime("-5 day", $hari5));
        $hari6 = date('ymd', strtotime("-6 day", $hari6));


        $phari0 = $this->db->query("SELECT sum(money) as money FROM transaksi WHERE created_at = $hari0")->row()->money;
        $phari1 = $this->db->query("SELECT sum(money) as money FROM transaksi WHERE created_at = $hari1")->row()->money;
        $phari2 = $this->db->query("SELECT sum(money) as money FROM transaksi WHERE created_at = $hari2")->row()->money;
        $phari3 = $this->db->query("SELECT sum(money) as money FROM transaksi WHERE created_at = $hari3")->row()->money;
        $phari4 = $this->db->query("SELECT sum(money) as money FROM transaksi WHERE created_at = $hari4")->row()->money;
        $phari5 = $this->db->query("SELECT sum(money) as money FROM transaksi WHERE created_at = $hari5")->row()->money;
        $phari6 = $this->db->query("SELECT sum(money) as money FROM transaksi WHERE created_at = $hari6")->row()->money;

        $data['ctransaksi'] = $this->transaction_m->getwhere('transaksi', ['created_at' => date('ymd')])->num_rows();
        $data['pendapatan'] = $this->db->query("SELECT sum(money) as money FROM transaksi WHERE created_at = $date")->row()->money;
        $data['pkemarin'] = $phari1;
        $data['pseminggu'] = $phari0 + $phari1 + $phari2 + $phari3 + $phari4 + $phari5 + $phari6;
        $data['tglkemarin'] = date('d M Y', strtotime("-1 day"));

        $this->load->view('admin/layout/header');
        $this->load->view('admin/dashboard/index', $data);
        $this->load->view('admin/layout/footer');
        $this->load->view('admin/layout/close');
    }
}
