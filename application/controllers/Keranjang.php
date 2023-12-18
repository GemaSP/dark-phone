<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Keranjang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_loginpelanggan();
    }
    
    public function index()
    {
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $keranjang = $this->ModelHome->keranjangWhere(['keranjang.id' => $this->session->userdata('id')])->result_array();
        $reversed_keranjang = array_reverse($keranjang);
        $data['keranjang'] = $reversed_keranjang;

        $jumlah_data = $this->ModelHome->getJumlahData($this->session->userdata('id')); // Mengambil jumlah data dari model
        $data['jumlah_data'] = $jumlah_data;

        $this->load->view('templates/front-end/fheader', $data);
        $this->load->view('templates/front-end/ftopbar', $data);
        $this->load->view('home/keranjang', $data);
        $this->load->view('templates/front-end/ffooter', $data);
    }

    public function update_jumlah_barang()
    {
        $id = $this->input->post('id_gadget');
        $jumlah_barang = $this->input->post('jumlah_barang');

        $this->ModelHome->updateJumlahBarang($id, $jumlah_barang);
    }

    public function delete_row()
    {
        $id = $this->input->post('id'); // Ambil ID yang dikirim dari AJAX
        $deleted = $this->ModelHome->deleteRow($id); // Panggil fungsi penghapusan di model

        // Jika penghapusan berhasil, kirimkan respon 'success' kembali ke JavaScript
        if ($deleted) {
            echo 'success';
        } else {
            echo 'error';
        }
    }

    public function checkout()
    {
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['keranjang'] = $this->ModelHome->keranjangWhere(['keranjang.id' => $this->session->userdata('id')])->result_array();
        
        $jumlah_data = $this->ModelHome->getJumlahData($this->session->userdata('id')); // Mengambil jumlah data dari model
        $data['jumlah_data'] = $jumlah_data;

        $id = $this->session->userdata('id');
        $data['detail_user'] = $this->ModelHome->getAlamat($id)->row_array();
        $selectedItems = $this->input->get('items');

        if ($selectedItems !== null) {
            $selectedItemIds = explode(',', $selectedItems);
        } else {
            // Tetapkan array kosong atau nilai default sesuai kebutuhan Anda
            $selectedItemIds = [0]; // Misalnya, array kosong jika data tidak tersedia
        }

        $dipilih = $this->ModelHome->getSelectedItems($selectedItemIds);
        $reversed_dipilih = array_reverse($dipilih);
        // Ambil detail barang yang dipilih dari model
        $data['selectedItems'] = $reversed_dipilih;

        $this->load->view('templates/front-end/fheader', $data);
        $this->load->view('templates/front-end/ftopbar', $data);
        $this->load->view('home/checkout', $data);
        $this->load->view('templates/front-end/ffooter', $data);
    }

    public function simpanAlamat()
    {
        $id = $this->session->userdata('id');
        $nama = $this->input->post('nama');
        $noTelepon = $this->input->post('no_telepon');
        $alamat = $this->input->post('alamat');
        $rt = $this->input->post('rt');
        $rw = $this->input->post('rw');
        $kelurahan = $this->input->post('kelurahan');
        $kecamatan = $this->input->post('kecamatan');
        $kota = $this->input->post('kota');
        $provinsi = $this->input->post('provinsi');
        $kodepos = $this->input->post('kodepos');

        // Menggabungkan nilai-nilai input menjadi satu kalimat dipisahkan oleh koma
        $hasil = implode(', ', array_filter([$alamat, $rt, $rw, $kelurahan, $kecamatan, $kota, $provinsi, $kodepos]));

        // Memanggil model untuk menyimpan data ke database
        $affectedRows = $this->ModelHome->updateAlamat($id, $nama, $noTelepon, $hasil);

        if ($affectedRows > 0) {
            redirect('keranjang/checkout?');
        } else {
            echo "Terjadi kesalahan saat memperbarui data!";
        }
    }

    public function create_order()
    {
        // mendapatakan data yang akan diinput
        $last_order = $this->ModelHome->get_last_order();
        $user_id = $this->session->userdata('id');
        $id_gadget = $this->input->post('id_gadget');
        $qty = $this->input->post('qty');
        $harga = $this->input->post('harga');
        $total = $qty * $harga;
        $produk = $this->input->post('produk');

        // Menghitung ID pemesanan selanjutnya berdasarkan ID pemesanan terakhir
        $next_order_id = 'PE001'; // ID default jika belum ada ID pemesanan

        if ($last_order) {
            $last_order_id = $last_order['id_pemesanan'];
            $last_number = intval(substr($last_order_id, 2));
        } else {
            $last_number = 0;
        }
        $id_alamat = $this->ModelHome->getAlamat1($user_id);
        if ($id_alamat !== false) {
            // Jika id_alamat berhasil didapatkan, simpan ke dalam variabel di controller
            $this->id_alamat = $id_alamat;
            // Proses data produk yang diterima dari formulir
            if (!empty($produk)) {
                foreach ($produk as $index => $data_produk) {
                    $next_number = $last_number + $index + 1;
                    $next_order_id = 'PE' . str_pad($next_number, 3, '0', STR_PAD_LEFT);

                    // Proses setiap data produk
                    $id_pesan = $next_order_id;
                    $id = $user_id;
                    $id_gadget = $data_produk['id'];
                    $jumlah = $data_produk['jumlah'];
                    $harga = $data_produk['harga'];
                    $total = $jumlah * $harga;
                    $status = 2;
                    $id_alamat = $id_alamat;
                    $tanggal_pesan = time();

                    // Lakukan apa pun yang diperlukan dengan data produk ini
                    // Misalnya, simpan ke database, hitung total, dll.
                    // Contoh penyimpanan ke database:
                    $this->ModelHome->insert_order_item($id_pesan, $id, $id_gadget, $jumlah, $total, $status, $id_alamat, $tanggal_pesan);
                    $this->ModelHome->hapus_item_keranjang($id, $id_gadget);
                    $this->ModelHome->kurangiStok($id_gadget, $jumlah);
                }
            }
            redirect('pesanan');
        }
    }
}