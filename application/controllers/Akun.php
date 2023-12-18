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
        $jumlah_data = $this->ModelHome->getJumlahData($this->session->userdata('id'));
        $data['jumlah_data'] = $jumlah_data;

        $this->form_validation->set_rules('username', 'Nama Lengkap', 'required|trim', [
            'required' => 'Nama tidak Boleh Kosong'
        ]);


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/front-end/fheader', $data);
            $this->load->view('templates/front-end/ftopbar', $data);
            $this->load->view('home/sub_page/profile', $data);
            $this->load->view('templates/front-end/ffooter', $data);
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

            $data = array(
                'notifikasi' => 'User Merubah Profil',
                'waktu' => time(),
                // dan kolom lainnya sesuai dengan struktur tabel
            );
            
            $this->db->insert('notifikasi', $data);
            $this->session->set_flashdata('pesan',
                '<div class="alert alert-success alert-message" role="alert">
            Profil Berhasil diubah
            </div>');
            redirect('akun');
        }
    }

    public function password()
    {
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $jumlah_data = $this->ModelHome->getJumlahData($this->session->userdata('id'));
        $data['jumlah_data'] = $jumlah_data;

        $this->form_validation->set_rules('current_password', 'Current Password',
            'required|trim', [
                'required' => 'Password Belum diisi!!'
            ]);
        $this->form_validation->set_rules('new_password1', 'New Password',
            'required|trim|min_length[3]|matches[new_password2]', [
                'required' => 'Password Belum diisi!!',
                'min_length' => 'Password terlalu pendek',
                'matches' => 'Password baru harus sama'
            ]);
        $this->form_validation->set_rules('new_password2', 'New Password',
            'required|trim|min_length[3]|matches[new_password1]', [
                'required' => 'Password Belum diisi!!',
                'min_length' => 'Password terlalu pendek',
                'matches' => 'Password baru harus sama'
            ]);


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/front-end/fheader', $data);
            $this->load->view('templates/front-end/ftopbar', $data);
            $this->load->view('home/sub_page/change-password', $data);
            $this->load->view('templates/front-end/ffooter', $data);
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');
            if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata('pesan',
                    '<div class="alert alert-danger alert-message" role="alert">
                Password lama salah
                </div>');
                redirect('akun/password');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('pesan',
                        '<div class="alert alert-danger alert-message" role="alert">
                        Password baru tidak boleh sama dengan password lama
                        </div>');
                    redirect('akun/password');
                } else {
                    // password sudah ok
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);
                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');
                    $data = array(
                        'notifikasi' => 'User Merubah Password',
                        'waktu' => time(),
                        // dan kolom lainnya sesuai dengan struktur tabel
                    );
                    
                    $this->db->insert('notifikasi', $data);
                    $this->session->set_flashdata('pesan',
                        '<div class="alert alert-success alert-message" role="alert">
                            Password berhasil diubah
                            </div>');
                    redirect('akun/password');
                }
            }
        }

    }

    public function alamat()
    {
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['detail_user'] = $this->ModelAkun->getAlamat($this->session->userdata('id'))->result_array();
        $jumlah_data = $this->ModelHome->getJumlahData($this->session->userdata('id'));
        $data['jumlah_data'] = $jumlah_data;

        // Tampilkan halaman lengkap jika bukan permintaan AJAX
        $this->load->view('templates/front-end/fheader', $data);
        $this->load->view('templates/front-end/ftopbar', $data);
        $this->load->view('home/sub_page/alamat', $data);
        $this->load->view('templates/front-end/ffooter', $data);
    }

    public function simpanAlamat()
    {
        $id = $this->session->userdata('id');
        $nama = $this->input->post('nama');
        $noTelepon = $this->input->post('no_telepon');
        $alamat = $this->input->post('alamat');
        $kecamatan = $this->input->post('kecamatan');

        // ...

        // Menggabungkan nilai-nilai input menjadi satu kalimat dipisahkan oleh koma
        $hasil = implode(', ', array_filter([$alamat, $kecamatan]));

        // Memanggil model untuk menyimpan data ke database
        $affectedRows = $this->ModelAkun->tambahAlamat($id, $nama, $noTelepon, $hasil);

        if ($affectedRows > 0) {
            redirect('pesanan');
        } else {
            echo "Terjadi kesalahan saat memperbarui data!";
        }
    }

    public function ubahAlamat()
    {
        $nama = $this->input->post('nama');
        $noTelepon = $this->input->post('no_telepon');
        $alamat = $this->input->post('alamat');
        $kecamatan = $this->input->post('kecamatan');

        // ...

        // Menggabungkan nilai-nilai input menjadi satu kalimat dipisahkan oleh koma
        $hasil = implode(', ', array_filter([$alamat, $kecamatan]));

        // Memanggil model untuk menyimpan data ke database
        $data = [
            'nama' => $nama,
            'no_telp' => $noTelepon,
            'alamat' => $hasil
        ];
        $this->ModelAkun->updateAlamat($data, ['id_alamat' => $this->uri->segment(3)]);
        redirect('akun/alamat');
    }

    public function alamatUtama()
    {
        $data = [
            'state' => 1,
        ];
        $this->ModelAkun->alamatUtama($data, ['id_alamat' => $this->uri->segment(3)]);
        redirect('akun/alamat');
    }

    public function hapusAlamat()
    {
        $id = $this->input->post('id'); // Ambil ID yang dikirim dari AJAX
        $deleted = $this->ModelAkun->deleteAlamat($id); // Panggil fungsi penghapusan di model

        // Jika penghapusan berhasil, kirimkan respon 'success' kembali ke JavaScript
        if ($deleted) {
            echo 'success';
        } else {
            echo 'error';
        }
    }

    public function komentar()
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
}