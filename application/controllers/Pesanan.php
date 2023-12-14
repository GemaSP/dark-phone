<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pesanan extends CI_Controller
{
    public function index()
    {
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['merek'] = $this->ModelGadget->getMerek()->result_array();
        // Pastikan untuk mengubah uri segment ke-3 sesuai dengan kebutuhan Anda
        $data['gadget'] = $this->ModelGadget->gadgetWhere(['id_gadget' => $this->uri->segment(3)])->row_array();
        $pemesanan = $this->ModelGadget->pemesananWhere(['pemesanan.id' => $this->session->userdata('id')])->result_array();
        $reversed_pemesanan = array_reverse($pemesanan);
        $data['pemesanan'] = $reversed_pemesanan;
        $jumlah_data = $this->ModelGadget->getJumlahData($this->session->userdata('id'));

        $data['jumlah_data'] = $jumlah_data;


        // Tampilkan halaman lengkap jika bukan permintaan AJAX
        // Tampilkan halaman lengkap jika bukan permintaan AJAX
        $this->load->view('templates/front-end/fheader', $data);
        $this->load->view('templates/front-end/ftopbar', $data);
        $this->load->view('home/sub_page/pesanan', $data);
        $this->load->view('templates/front-end/ffooter', $data);
    }

    public function detailpesanan()
    {
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['merek'] = $this->ModelGadget->getMerek()->result_array();
        // Pastikan untuk mengubah uri segment ke-3 sesuai dengan kebutuhan Anda
        $data['gadget'] = $this->ModelGadget->gadgetWhere(['id_gadget' => $this->uri->segment(3)])->row_array();
        $data['pemesanan'] = $this->ModelGadget->pemesananWhere(['pemesanan.id_pemesanan' => $this->uri->segment(3)])->row_array();
        $jumlah_data = $this->ModelGadget->getJumlahData($this->session->userdata('id'));

        $data['jumlah_data'] = $jumlah_data;


        // Tampilkan halaman lengkap jika bukan permintaan AJAX
        // Tampilkan halaman lengkap jika bukan permintaan AJAX
        $this->load->view('templates/front-end/fheader', $data);
        $this->load->view('templates/front-end/ftopbar', $data);
        $this->load->view('home/sub_page/detail_pesanan', $data);
        $this->load->view('templates/front-end/ffooter', $data);
    }

    public function konfirmasi()
    {
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['merek'] = $this->ModelGadget->getMerek()->result_array();
        // Pastikan untuk mengubah uri segment ke-3 sesuai dengan kebutuhan Anda
        $data['gadget'] = $this->ModelGadget->gadgetWhere(['id_gadget' => $this->uri->segment(3)])->row_array();
        $data['pemesanan'] = $this->ModelGadget->pemesananWhere(['pemesanan.id_pemesanan' => $this->uri->segment(3)])->row_array();
        $jumlah_data = $this->ModelGadget->getJumlahData($this->session->userdata('id'));

        $data['jumlah_data'] = $jumlah_data;
        $id = $this->uri->segment(3);
        $this->ModelGadget->konfirmasiPesanan($id);
        $id_pesan = $this->uri->segment(3);
        $this->ModelGadget->insertTransaksi($id_pesan);
        redirect('pesanan');


        // Tampilkan halaman lengkap jika bukan permintaan AJAX
        // Tampilkan halaman lengkap jika bukan permintaan AJAX
        
    }
}