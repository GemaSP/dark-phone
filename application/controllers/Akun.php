<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Akun extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        cek_loginpelanggan();
    }
    public function index()
    {
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['merek'] = $this->ModelGadget->getMerek()->result_array();
        // Pastikan untuk mengubah uri segment ke-3 sesuai dengan kebutuhan Anda
        $data['gadget'] = $this->ModelGadget->gadgetWhere(['id_gadget' => $this->uri->segment(3)])->row_array();

        $jumlah_data = $this->ModelGadget->getJumlahData($this->session->userdata('id'));

        $data['jumlah_data'] = $jumlah_data;


        // Tampilkan halaman lengkap jika bukan permintaan AJAX
        $this->load->view('templates/front-end/fheader', $data);
        $this->load->view('templates/front-end/ftopbar', $data);
        $this->load->view('home/sub_page/profile', $data);
        $this->load->view('templates/front-end/ffooter', $data);
    }

    public function profile()
    {
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['merek'] = $this->ModelGadget->getMerek()->result_array();
        // Pastikan untuk mengubah uri segment ke-3 sesuai dengan kebutuhan Anda
        $data['gadget'] = $this->ModelGadget->gadgetWhere(['id_gadget' => $this->uri->segment(3)])->row_array();

        $jumlah_data = $this->ModelGadget->getJumlahData($this->session->userdata('id'));

        $data['jumlah_data'] = $jumlah_data;


        // Tampilkan halaman lengkap jika bukan permintaan AJAX
        $this->load->view('templates/front-end/fheader', $data);
        $this->load->view('templates/front-end/ftopbar', $data);
        $this->load->view('home/sub_page/profile', $data);
        $this->load->view('templates/front-end/ffooter', $data);

    }

    public function password()
    {
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['merek'] = $this->ModelGadget->getMerek()->result_array();
        // Pastikan untuk mengubah uri segment ke-3 sesuai dengan kebutuhan Anda
        $data['gadget'] = $this->ModelGadget->gadgetWhere(['id_gadget' => $this->uri->segment(3)])->row_array();

        $jumlah_data = $this->ModelGadget->getJumlahData($this->session->userdata('id'));

        $data['jumlah_data'] = $jumlah_data;


        // Tampilkan halaman lengkap jika bukan permintaan AJAX
        $this->load->view('templates/front-end/fheader', $data);
        $this->load->view('templates/front-end/ftopbar', $data);
        $this->load->view('home/sub_page/change-password', $data);
        $this->load->view('templates/front-end/ffooter', $data);

    }
    public function alamat()
    {
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['merek'] = $this->ModelGadget->getMerek()->result_array();
        // Pastikan untuk mengubah uri segment ke-3 sesuai dengan kebutuhan Anda
        $data['gadget'] = $this->ModelGadget->gadgetWhere(['id_gadget' => $this->uri->segment(3)])->row_array();
        $data['detail_user'] = $this->ModelUser->getDetailUser($this->session->userdata('id'))->result_array();

        $jumlah_data = $this->ModelGadget->getJumlahData($this->session->userdata('id'));

        $data['jumlah_data'] = $jumlah_data;


        // Tampilkan halaman lengkap jika bukan permintaan AJAX
        $this->load->view('templates/front-end/fheader', $data);
        $this->load->view('templates/front-end/ftopbar', $data);
        $this->load->view('home/sub_page/alamat', $data);
        $this->load->view('templates/front-end/ffooter', $data);

    }

    public function keranjang()
    {
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['merek'] = $this->ModelGadget->getMerek()->result_array();
        $data['gadget'] = $this->ModelGadget->gadgetWhere(['id_gadget' => $this->uri->segment(3)])->row_array();
        $data['keranjang'] = $this->ModelGadget->keranjangWhere(['keranjang.id' => $this->session->userdata('id')])->result_array();
        $keranjang = $data['keranjang'];
        $jumlah_data = $this->ModelGadget->getJumlahData($this->session->userdata('id')); // Mengambil jumlah data dari model
        $data['jumlah_data'] = $jumlah_data;


        $this->load->view('templates/front-end/fheader', $data);
        $this->load->view('templates/front-end/ftopbar', $data);
        $this->load->view('home/sub_page/keranjang', $data);
        $this->load->view('templates/front-end/ffooter', $data);
    }

    public function pesanan()
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

    public function delete_row()
    {
        $id = $this->input->post('id'); // Ambil ID yang dikirim dari AJAX

        // Lakukan penghapusan dari database sesuai dengan ID yang diterima
        // Gantilah dengan operasi penghapusan pada database Anda sesuai kebutuhan

        // Contoh operasi penghapusan:
        // Ganti 'Model_name' dengan nama model Anda
        $deleted = $this->ModelUser->deleteRow($id); // Panggil fungsi penghapusan di model

        // Jika penghapusan berhasil, kirimkan respon 'success' kembali ke JavaScript
        if ($deleted) {
            echo 'success';
        } else {
            echo 'error';
        }
    }
}