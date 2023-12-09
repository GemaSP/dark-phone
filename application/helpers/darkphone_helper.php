<?php

function cek_login()
{
    $ci = get_instance();

    if (!$ci->session->userdata('email')) {
        $ci->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Akses ditolak. Anda belum login!!</div>');
        redirect('autentifikasi');
    } else {
        $role_id = $ci->session->userdata('role_id');
    }
}

function cek_loginpelanggan()
{
    $ci = get_instance();
    $data['user'] = $ci->ModelUser->cekData(['email' => $ci->session->userdata('email')])->row_array(); // Gunakan $ci->ModelUser daripada $this->ModelUser
    if ($data['user']['role_id'] == 2) { // Perbaiki kondisi pengecekan role_id
        $ci->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Akses ditolak. Anda belum login!!</div>');
        redirect('home');
    } else {
        $role_id = $ci->session->userdata('role_id');
    }
}