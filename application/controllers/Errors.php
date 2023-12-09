<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Errors extends CI_Controller{
    public function index()
    {
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('404');
        $this->load->view('templates/footer');

    }   
}