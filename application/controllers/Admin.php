<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
        cek_loginpelanggan();
    }

    public function index()
    {
        $data['judul'] = 'Dashboard';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['transaksi'] = $this->ModelGadget->getTransaksi()->result_array();
        $notifikasi = $this->ModelUser->notifikasi();
        $data['notifikasi'] = array_reverse($notifikasi);
        $jumlah_data = $this->ModelUser->getJumlahNotifikasi();
        $data['jumlah_data'] = $jumlah_data;
        $komentar = $this->ModelUser->komentar();
        $data['komentar'] = array_reverse($komentar);


        //Mengambil data dengan Memanggil Model
        $jumlah_user = $this->ModelUser->getJumlahPelanggan();
        $total_stok = $this->ModelGadget->totalStok();
        $subtotal = $this->ModelGadget->totalPenghasilan();
        $jumlah_transaksi = $this->ModelGadget->getJumlahTransaksi();

        //Memuat Variabel yg akan ditampilkan di View
        $data['jumlah_user'] = $jumlah_user;
        $data['total_stok'] = $total_stok;
        $data['total_penghasilan'] = $subtotal;
        $data['jumlah_transaksi'] = $jumlah_transaksi;

        //Menampilkan View
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }
}