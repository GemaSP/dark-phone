<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pemesanan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
        cek_loginpelanggan();
    }

    //manajemen Gadget
    public function index()
    {
        $data['judul'] = 'Data Pemesanan';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['gadget'] = $this->ModelGadget->getGadget()->result_array();
        $data['merek'] = $this->ModelGadget->getMerek()->result_array();
        $data['pemesanan'] = $this->ModelGadget->getPesanan()->result_array();
        

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pemesanan/index', $data);
        $this->load->view('templates/footer');
    }

    public function updatePemesanan()
    {

        $pemesanan = $this->ModelGadget->cekPesanan(['id_pemesanan' => $this->uri->segment(3)])->row_array();

        if ($pemesanan['status'] == 1) {
            $where = $this->uri->segment(3);
            $status = 2;
            $this->db->set('status', $status);
            $this->db->where('id_pemesanan', $where);
            $this->db->update('pemesanan');
        } else if ($pemesanan['status'] == 2) {
            $where = $this->uri->segment(3);
            $status = 3;
            $this->db->set('status', $status);
            $this->db->set('tanggal_kirim', time());
            $this->db->where('id_pemesanan', $where);
            $this->db->update('pemesanan');
        } else {
        }
        redirect('pemesanan');

    }
    public function transaksi()
    {
        $data['judul'] = 'Data Transaksi';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['gadget'] = $this->ModelGadget->getGadget()->result_array();
        $data['merek'] = $this->ModelGadget->getMerek()->result_array();
        $data['transaksi'] = $this->ModelGadget->getTransaksi()->result_array();
        

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pemesanan/transaksi', $data);
        $this->load->view('templates/footer');
    }

}