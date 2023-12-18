<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function _remap($method, $params = array()) {
        if (method_exists($this, $method)) {
            return call_user_func_array(array($this, $method), $params);
        } else {
            redirect('home');
        }
    }

    public function index()
    {
        //Mengambil data dari database menggunakan Model
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['gadget'] = $this->ModelGadget->gadgetWhere(['stok >' => 0])->result_array();
        $data['merek'] = $this->ModelGadget->getMerek()->result_array();

        $jumlah_data = $this->ModelHome->getJumlahData($this->session->userdata('id'));
        $data['jumlah_data'] = $jumlah_data;

        //Meload halaman view beserta data yg telah diambil
        $this->load->view('templates/front-end/fheader', $data);
        $this->load->view('templates/front-end/ftopbar', $data);
        $this->load->view('templates/front-end/fcarousel', $data);
        $this->load->view('home/index', $data);
        $this->load->view('templates/front-end/ffooter', $data);
    }

    public function checkSessionStatus()
    {
        // Lakukan pemeriksaan sesi di sini
        $isLoggedIn = $this->session->userdata('email');

        // Kirim respons sebagai JSON ke JavaScript
        header('Content-Type: application/json');
        echo json_encode(['isLoggedIn' => $isLoggedIn]);
        exit();
    }

    public function tambahKeranjang()
    {
        if (!$this->session->userdata('email')) {
            // Tampilkan pesan jika tidak ada session
            echo "<script>alert('Silahkan login terlebih dahulu sebelum menambah item pada keranjang');</script>";
        } else {
            $id = $this->session->userdata('id');
            $idGadget = $this->uri->segment(3);

            //Mengecek apakah kombinasi dari id dan id_gadget sudah ada
            $existingData = $this->ModelHome->keranjangWhere(['keranjang.id' => $id, 'keranjang.id_gadget' => $idGadget])->row_array();

            if (!$existingData) {
                // Jika kombinasi tidak ada, masukan data baru
                $insert = [
                    'id' => $id,
                    'id_gadget' => $idGadget,
                    'jumlah_barang' => 1
                ];
                $this->db->insert('keranjang', $insert);
            } else {
                // Jika Kombinasi ada, tambahkan jumlah barangnya
                $currentQuantity = $existingData['jumlah_barang'];
                $newQuantity = $currentQuantity + 1;

                $this->db->set('jumlah_barang', $newQuantity);
                $this->db->where('id', $id);
                $this->db->where('id_gadget', $idGadget);
                $this->db->update('keranjang');
            }
        }
        redirect('home');
    }

    public function detailProducts()
    {
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['gadget'] = $this->ModelGadget->gadgetWhere(['id_gadget' => $this->uri->segment(3)])->row_array();
        
        $jumlah_data = $this->ModelHome->getJumlahData($this->session->userdata('id')); // Mengambil jumlah data dari model
        $data['jumlah_data'] = $jumlah_data;
        
        $this->load->view('templates/front-end/fheader', $data);
        $this->load->view('templates/front-end/ftopbar', $data);
        $this->load->view('home/detail_product', $data);
        $this->load->view('templates/front-end/ffooter', $data);
    }

    public function buyNow()
    {
        if (!$this->session->userdata('email')) {
            // Tampilkan pesan jika tidak ada session
            echo "<script>alert('Silahkan login terlebih dahulu sebelum menambah item pada keranjang');</script>";
        } else {
            $id = $this->session->userdata('id');
            $idGadget = $this->uri->segment(3);

            //Mengecek apakah kombinasi dari id dan id_gadget sudah ada
            $existingData = $this->ModelHome->keranjangWhere(['keranjang.id' => $id, 'keranjang.id_gadget' => $idGadget])->row_array();

            if (!$existingData) {
                // Jika kombinasi tidak ada, masukan data baru
                $insert = [
                    'id' => $id,
                    'id_gadget' => $idGadget,
                    'jumlah_barang' => 1
                ];
                $this->db->insert('keranjang', $insert);
            } else {
                // Jika Kombinasi ada, tambahkan jumlah barangnya
                $currentQuantity = $existingData['jumlah_barang'];
                $newQuantity = $currentQuantity + 1;

                $this->db->set('jumlah_barang', $newQuantity);
                $this->db->where('id', $id);
                $this->db->where('id_gadget', $idGadget);
                $this->db->update('keranjang');
            }
        }
        redirect('keranjang');
    }
}