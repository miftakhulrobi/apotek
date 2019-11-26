<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile_a extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        checklogin();
        checkadmin();
        $this->load->model('auth_m');
    }

    public function index()
    {
        $this->load->view('admin/layout/header');
        $this->load->view('admin/profile/index');
        $this->load->view('admin/layout/footer');
        $this->load->view('admin/layout/close');
    }

    public function update()
    {
        $data = [
            'name' => $this->input->post('name'),
            'address' => $this->input->post('address'),
            'phone' => $this->input->post('phone'),
        ];
        $this->auth_m->update('users', $data, ['user_id' => $this->session->userdata('user_id')]);

        $user = $this->auth_m->getwhere('users', ['user_id' => $this->session->userdata('user_id')])->row();

        if ($_FILES['avatar']['name']) {
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']     = '2048';
            $config['upload_path'] = './admin/images/user/';
            $config['remove_space'] = TRUE;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('avatar')) {
                $avatar = $this->upload->data('file_name');
            }

            if ($user->avatar) {
                $unlink = './admin/images/user/' . $user->avatar;
                is_readable($unlink) && unlink($unlink);
            }

            $thumb = [
                'avatar' => $avatar
            ];
            $this->auth_m->update('users', $thumb, ['user_id' => $this->session->userdata('user_id')]);
        }
        $this->session->set_flashdata('success', 'Profile berhasil di perbarui!');
        redirect('profile_a');
    }
}
