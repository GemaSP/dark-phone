<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function index()
    {
        //Mengambil data dari database menggunakan Model
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['gadget'] = $this->ModelGadget->getGadget()->result_array();
        $data['merek'] = $this->ModelGadget->getMerek()->result_array();
        $jumlah_data = $this->ModelGadget->getJumlahData($this->session->userdata('id'));

        $data['jumlah_data'] = $jumlah_data;

        //Meload halaman view beserta data yg telah diambil
        $this->load->view('templates/front-end/fheader', $data);
        $this->load->view('templates/front-end/ftopbar', $data);
        $this->load->view('templates/front-end/fcarousel', $data);
        $this->load->view('home/index', $data);
        $this->load->view('templates/front-end/ffooter', $data);
    }

    public function detailProducts()
    {
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['merek'] = $this->ModelGadget->getMerek()->result_array();
        $data['gadget'] = $this->ModelGadget->gadgetWhere(['id_gadget' => $this->uri->segment(3)])->row_array();
        $jumlah_data = $this->ModelGadget->getJumlahData($this->session->userdata('id')); // Mengambil jumlah data dari model

        $data['jumlah_data'] = $jumlah_data;
        $this->load->view('templates/front-end/fheader', $data);
        $this->load->view('templates/front-end/ftopbar', $data);
        $this->load->view('home/detail_product', $data);
        $this->load->view('templates/front-end/ffooter', $data);
    }

    

    public function tambahKeranjang()
    {
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['merek'] = $this->ModelGadget->getMerek()->result_array();
        $data['gadget'] = $this->ModelGadget->gadgetWhere(['id_gadget' => $this->uri->segment(3)])->row_array();
        $id = $this->session->userdata('id');
        $idGadget = $this->uri->segment(3);

        // Check if the combination of id and id_gadget already exists
        $existingData = $this->ModelGadget->keranjangWhere(['keranjang.id' => $id, 'keranjang.id_gadget' => $idGadget])->row_array();

        if (!$existingData) {
            // If the combination doesn't exist, insert new data
            $insert = [
                'id' => $id,
                'id_gadget' => $idGadget,
                'jumlah_barang' => 1
            ];
            $this->db->insert('keranjang', $insert);
        } else {
            // If the combination exists, increment the jumlah_barang
            $currentQuantity = $existingData['jumlah_barang'];
            $newQuantity = $currentQuantity + 1;

            $this->db->set('jumlah_barang', $newQuantity);
            $this->db->where('id', $id);
            $this->db->where('id_gadget', $idGadget);
            $this->db->update('keranjang');
        }

        redirect('home');
    }

    public function buyNow()
    {
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['merek'] = $this->ModelGadget->getMerek()->result_array();
        $data['gadget'] = $this->ModelGadget->gadgetWhere(['id_gadget' => $this->uri->segment(3)])->row_array();
        $id = $this->session->userdata('id');
        $idGadget = $this->uri->segment(3);

        // Check if the combination of id and id_gadget already exists
        $existingData = $this->ModelGadget->keranjangWhere(['keranjang.id' => $id, 'keranjang.id_gadget' => $idGadget])->row_array();

        if (!$existingData) {
            // If the combination doesn't exist, insert new data
            $insert = [
                'id' => $id,
                'id_gadget' => $idGadget,
                'jumlah_barang' => 1
            ];
            $this->db->insert('keranjang', $insert);
        } else {
            // If the combination exists, increment the jumlah_barang
            $currentQuantity = $existingData['jumlah_barang'];
            $newQuantity = $currentQuantity + 1;

            $this->db->set('jumlah_barang', $newQuantity);
            $this->db->where('id', $id);
            $this->db->where('id_gadget', $idGadget);
            $this->db->update('keranjang');
        }

        redirect('keranjang');
    }

    public function ubahProfil()
    {
        $data['judul'] = 'Ubah Profil';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('username', 'Nama Lengkap', 'required|trim', [
            'required' => 'Nama tidak Boleh Kosong'
        ]);


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/ubah-profile', $data);
            $this->load->view('templates/footer');
        } else {
            $username = $this->input->post('username', true);
            $email = $this->input->post('email', true);

            //jika ada gambar yang akan diupload
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['upload_path'] = './assets/back-end/img/profile/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '5000';
                $config['max_width'] = '3000';
                $config['max_height'] = '3000';
                $config['file_name'] = 'pro' . time();

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $gambar_lama = $data['user']['image'];
                    if ($gambar_lama != 'default.jpg') {
                        unlink(FCPATH . 'assets/back-end/img/profile/' . $gambar_lama);
                    }

                    $gambar_baru = $this->upload->data('file_name');
                    $this->db->set('image', $gambar_baru);
                } else {
                }
            }

            $this->db->set('username', $username);
            $this->db->where('email', $email);
            $this->db->update('user');
            $this->session->set_flashdata('pesan',
                '<div class="alert alert-success alert-message" role="alert">
            Profil Berhasil diubah
            </div>');
            redirect('home/akun/profile');
        }
    }

}