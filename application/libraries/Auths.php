<?php

class Auths
{

    protected $ci;

    function __construct()
    {
        $this->ci = &get_instance();
        $this->ci->load->model('auth_m');
    }

    function user()
    {
        $where = [
            'user_id' => $this->ci->session->userdata('user_id')
        ];
        $user = $this->ci->auth_m->getwhere('users', $where)->row();
        return $user;
    }

    function app()
    {
        $where = ['app_id' => 1];
        $app = $this->ci->auth_m->getwhere('apps', $where)->row();
        return $app;
    }
}
