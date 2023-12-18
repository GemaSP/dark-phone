<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pesanan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_loginpelanggan();
    }
    
    public function index()
    {
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['gadget'] = $this->ModelGadget->gadgetWhere(['id_gadget' => $this->uri->segment(3)])->row_array();
        $pemesanan = $this->ModelHome->pemesananWhere(['pemesanan.id' => $this->session->userdata('id')])->result_array();
        $reversed_pemesanan = array_reverse($pemesanan);
        $data['pemesanan'] = $reversed_pemesanan;

        $jumlah_data = $this->ModelHome->getJumlahData($this->session->userdata('id'));
        $data['jumlah_data'] = $jumlah_data;

        $this->load->view('templates/front-end/fheader', $data);
        $this->load->view('templates/front-end/ftopbar', $data);
        $this->load->view('home/sub_page/pesanan', $data);
        $this->load->view('templates/front-end/ffooter', $data);
    }

    public function detailpesanan()
    {
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['pemesanan'] = $this->ModelHome->pemesananWhere(['pemesanan.id_pemesanan' => $this->uri->segment(3)])->row_array();
        
        $jumlah_data = $this->ModelHome->getJumlahData($this->session->userdata('id'));
        $data['jumlah_data'] = $jumlah_data;

        $this->load->view('templates/front-end/fheader', $data);
        $this->load->view('templates/front-end/ftopbar', $data);
        $this->load->view('home/sub_page/detail_pesanan', $data);
        $this->load->view('templates/front-end/ffooter', $data);
    }

    public function konfirmasi()
    {
        //Konfirmasi Pesanan
        $id = $this->uri->segment(3);
        $this->ModelHome->konfirmasiPesanan($id);

        //Memasukan Data ke Tabel Transaksi
        $id_pesan = $this->uri->segment(3);
        $this->ModelHome->insertTransaksi($id_pesan);
        redirect('pesanan');
    }

    public function pembatalan()
    {
        $id = $this->uri->segment(3);
        $this->ModelHome->pembatalanPesanan($id);
        redirect('pesanan');
    }
}