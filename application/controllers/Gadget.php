<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gadget extends CI_Controller
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
        $data['judul'] = 'Data Gadget';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['gadget'] = $this->ModelGadget->getGadget()->result_array();
        
        $this->form_validation->set_rules('nama_gadget', 'Nama Gadget', 'required|min_length[3]', [
            'required' => 'Judul Gadget harus diisi',
            'min_length' => 'Judul Gadget terlalu pendek'
        ]);
        
        $this->form_validation->set_rules('stok', 'Stok', 'required|numeric', [
            'required' => 'Stok harus diisi',
            'numeric' => 'Yang anda masukan bukan angka'
        ]);
        $this->form_validation->set_rules('harga', 'Harga', 'required|numeric', [
            'required' => 'Harga harus diisi',
            'numeric' => 'Yang anda masukan bukan angka'
        ]);

        //konfigurasi sebelum gambar diupload
        $config['upload_path'] = './assets/back-end/img/upload/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '3000';
        $config['max_width'] = '1024';
        $config['max_height'] = '1000';
        $config['file_name'] = 'img' . time();

        $this->load->library('upload', $config);

        if ($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('gadget/index', $data);
        $this->load->view('templates/footer');
        } else {
            if ($this->upload->do_upload('image')) {
                $image = $this->upload->data();
                $gambar = $image['file_name'];
            } else {
                $gambar = '';
            }

            $data = [
                'nama_gadget' => $this->input->post('nama_gadget', true),
                'id_merek' => $this->input->post('id_merek', true),
                'tahun_rilis' => $this->input->post('tahun_rilis', true),
                'stok' => $this->input->post('stok', true),
                'harga' => $this->input->post('harga', true),
                'image' => $gambar
            ];
            $this->ModelGadget->simpanGadget($data);
            redirect('gadget');
        }
    }

    public function ubahGadget()
    {
        $data['judul'] = 'Ubah Data Gadget';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['gadget'] = $this->ModelGadget->gadgetWhere(['id_gadget' => $this->uri->segment(3)])->result_array();
        $merek = $this->ModelGadget->joinMerekGadget(['gadget.id_gadget' =>
       
        $this->uri->segment(3)])->result_array();
 
        foreach ($merek as $g) {
            $data['id'] = $g['id_merek'];

            $data['k'] = $g['nama_merek'];
        }
        $data['merek'] = $this->ModelGadget->getMerek()->result_array();
        
        $this->form_validation->set_rules('nama_gadget', 'Nama Gadget', 'required|min_length[3]', [
            'required' => 'Judul Gadget harus diisi',
            'min_length' => 'Judul Gadget terlalu pendek'
        ]);
        
        $this->form_validation->set_rules('stok', 'Stok', 'required|numeric', [
            'required' => 'Stok harus diisi',
            'numeric' => 'Yang anda masukan bukan angka'
        ]);
        $this->form_validation->set_rules('harga', 'Harga', 'required|numeric', [
            'required' => 'Harga harus diisi',
            'numeric' => 'Yang anda masukan bukan angka'
        ]);

        
        //konfigurasi sebelum gambar diupload
        $config['upload_path'] = './assets/back-end/img/upload/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '3000';
        $config['max_width'] = '1024';
        $config['max_height'] = '1000';
        $config['file_name'] = 'img' . time();
        //memuat atau memanggil library upload
        $this->load->library('upload', $config);
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('gadget/index', $data);
            $this->load->view('templates/footer');
        } else {
            if ($this->upload->do_upload('img')) {
                $image = $this->upload->data();
                unlink('assets/back-end/img/upload/' . $this->input->post('old_pict', TRUE));
                $gambar = $image['file_name'];
            } else {
                $gambar = $this->input->post('old_pict', TRUE);
            }
            $data = [
                'nama_gadget' => $this->input->post('nama_gadget', true),
                'id_merek' => $this->input->post('id_merek', true),
                'tahun_rilis' => $this->input->post('tahun_rilis', true),
                'stok' => $this->input->post('stok', true),
                'harga' => $this->input->post('harga', true),
                'img' => $gambar
            ];
            $this->ModelGadget->updateGadget($data, ['id_gadget' => $this->uri->segment(3)]);
            redirect('gadget');
        }
    }
    
    public function searchGadget()
    {
        $searchText = $this->input->post('searchText');
        $data['gadget'] = $this->ModelGadget->searchGadget($searchText);
        
        $this->load->view('gadget/tabel_gadget', $data);
    }

    public function hapusGadget()
    {
        $where = ['id_gadget' => $this->uri->segment(3)];
        $this->ModelGadget->hapusGadget($where);
        redirect('gadget');
    }

    public function merek()
    {
        $data['judul'] = 'Merek Gadget';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['merek'] = $this->ModelGadget->getMerek()->result_array();
        $this->form_validation->set_rules('nama_merek', 'Merek', 'required', [
            'required' => 'Nama Merek harus diisi'
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('gadget/merek', $data);
            $this->load->view('templates/footer');
        } else {
            $data = ['nama_merek' => $this->input->post('nama_merek', true)];
            $this->ModelGadget->simpanMerek($data);
            redirect('gadget/merek');
        }
    }

    public function ubahMerek()
    {
        $data['judul'] = 'Ubah Data Merek';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['merek'] = $this->ModelGadget->merekWhere(['id_merek' => $this->uri->segment(3)])->result_array();


        $this->form_validation->set_rules('merek', 'Nama Merek', 'required|min_length[3]', [
            'required' => 'Nama Merek harus diisi',
            'min_length' => 'Nama Merek terlalu pendek'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('gadget/ubah_merek', $data);
            $this->load->view('templates/footer');
        } else {

            $data = [
                'nama_merek' => $this->input->post('merek', true)
            ];

            $this->ModelGadget->updateMerek(['id_merek' => $this->input->post('id')], $data);
            redirect('gadget/merek');
        }
    }

    public function searchmerek()
    {
        $searchText = $this->input->post('searchText');
        $data['merek'] = $this->ModelGadget->searchMerek($searchText);
        
        $this->load->view('gadget/tabel_merek', $data);
    }
    
    public function hapusMerek()
    {
        $where = ['id_merek' => $this->uri->segment(3)];
        $this->ModelGadget->hapusMerek($where);
        redirect('gadget/merek');
    }
}
       