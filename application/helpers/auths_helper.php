<?php

function checklogin()
{
    $ci = &get_instance();
    $user = $ci->session->userdata('user_id');

    if (!$user) {
        redirect('auth/login');
    }
}

function checkadmin()
{
    $ci = &get_instance();
    $ci->load->library('auths');

    if ($ci->auths->user()->role != 'Admin') {
        redirect('/');
    }
}

function checkpegawai()
{
    $ci = &get_instance();
    $ci->load->library('auths');

    if ($ci->auths->user()->role != 'Pegawai') {
        redirect('/');
    }
}
