<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function login()
    {
        $role = $this->session->userdata('role');
        if ($role == 'Admin') {
            redirect('dashboard_a');
        } elseif ($role == 'Pegawai') {
            redirect('dashboard_p');
        }
        $this->load->view('auth/login');
    }

    public function postlogin()
    {
        $where = [
            'email' => $this->input->post('email'),
            'password' => md5($this->input->post('password'))
        ];
        $query = $this->auth_m->getwhere('users', $where);
        if ($query->num_rows() > 0) {
            $user = $query->row();

            $param = [
                'user_id' => $user->user_id,
                'name' => $user->name,
                'role' => $user->role,
            ];
            $this->session->set_userdata($param);

            if ($this->session->userdata('role') == 'Admin') {
                $this->session->set_flashdata('success', 'Selamat datang kembali ' . $user->name);
                redirect('dashboard_a');
            } else if ($this->session->userdata('role') == 'Pegawai') {
                $this->session->set_flashdata('success', 'Selamat datang kembali ' . $user->name);
                redirect('dashboard_p');
            } else {
                $this->session->set_flashdata('error', 'Login gagal!. Anda tidak mempunyai role!');
                redirect('auth/login');
            }
        } else {
            $this->session->set_flashdata('error', 'Login gagal!. Email / Password salah!');
            redirect('auth/login');
        }
    }

    public function logout()
    {
        $param = [
            'user_id', 'name', 'role'
        ];
        $this->session->unset_userdata($param);
        $this->session->set_flashdata('success', 'Anda berhasil logout!');
        redirect('auth/login');
    }
}
