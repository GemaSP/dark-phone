<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Keranjang extends CI_Controller
{

    public function index()
    {
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['merek'] = $this->ModelGadget->getMerek()->result_array();
        $data['gadget'] = $this->ModelGadget->gadgetWhere(['id_gadget' => $this->uri->segment(3)])->row_array();
        $keranjang = $this->ModelGadget->keranjangWhere(['keranjang.id' => $this->session->userdata('id')])->result_array();
        $reversed_keranjang = array_reverse($keranjang);
        $data['keranjang'] = $reversed_keranjang;
        $jumlah_data = $this->ModelGadget->getJumlahData($this->session->userdata('id')); // Mengambil jumlah data dari model
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

        // Lakukan validasi data jika diperlukan

        // Perbarui nilai jumlah_barang di database
        $this->ModelGadget->updateJumlahBarang($id, $jumlah_barang);
    }

    public function delete_row()
    {
        $id = $this->input->post('id'); // Ambil ID yang dikirim dari AJAX

        // Lakukan penghapusan dari database sesuai dengan ID yang diterima
        // Gantilah dengan operasi penghapusan pada database Anda sesuai kebutuhan

        // Contoh operasi penghapusan:
        // Ganti 'Model_name' dengan nama model Anda
        $deleted = $this->ModelGadget->deleteRow($id); // Panggil fungsi penghapusan di model

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
        $data['merek'] = $this->ModelGadget->getMerek()->result_array();
        $data['gadget'] = $this->ModelGadget->gadgetWhere(['id_gadget' => $this->uri->segment(3)])->row_array();
        $data['keranjang'] = $this->ModelGadget->keranjangWhere(['keranjang.id' => $this->session->userdata('id')])->result_array();
        $jumlah_data = $this->ModelGadget->getJumlahData($this->session->userdata('id')); // Mengambil jumlah data dari model
        $data['jumlah_data'] = $jumlah_data;

        $id = $this->session->userdata('id');
        // Memuat model
        $data['detail_user'] = $this->ModelUser->getDetailUser($id);


        $selectedItems = $this->input->get('items');

        if ($selectedItems !== null) {
            $selectedItemIds = explode(',', $selectedItems);
        } else {
            // Tetapkan array kosong atau nilai default sesuai kebutuhan Anda
            $selectedItemIds = [0]; // Misalnya, array kosong jika data tidak tersedia
        }

        // Load model


        $dipilih = $this->ModelGadget->getSelectedItems($selectedItemIds);
        $reversed_dipilih = array_reverse($dipilih);
        // Ambil detail barang yang dipilih dari model
        $data['selectedItems'] = $reversed_dipilih;

        $alamat = $this->ModelUser->getAlamat($id);
        // Pisahkan alamat berdasarkan komaet the address from the database
        // Pisahkan alamat jika data alamat tidak kosong
        $alamatArray = [];
        if (!empty($alamat)) {
            $alamatString = implode(', ', $alamat); // Convert array to string with comma separation
            $alamatArray = explode(', ', $alamatString);
        }

        // Buat variabel untuk setiap bagian alamat jika array tidak kosong
        $data['alamat'] = !empty($alamatArray[0]) ? $alamatArray[0] : ''; // Jalan Ciherang Hegar Sari No.9
        $data['rt'] = !empty($alamatArray[1]) ? $alamatArray[1] : ''; // Ciherang, Dramaga (RT.05/RW.08)
        $data['rw'] = !empty($alamatArray[2]) ? $alamatArray[2] : ''; // KAB. BOGOR
        $data['kelurahan'] = !empty($alamatArray[3]) ? $alamatArray[3] : ''; // JAWA BARAT
        $data['kecamatan'] = !empty($alamatArray[4]) ? $alamatArray[4] : ''; // ID
        $data['kota'] = !empty($alamatArray[5]) ? $alamatArray[5] : '';
        $data['provinsi'] = !empty($alamatArray[6]) ? $alamatArray[6] : '';
        $data['kodepos'] = !empty($alamatArray[7]) ? $alamatArray[7] : '';

        // Load view checkout dengan data barang yang dipilih


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
        $rt = 'RT ' . $this->input->post('rt');
        $rw = 'RW ' . $this->input->post('rw');
        $kelurahan = 'Kelurahan ' . $this->input->post('kelurahan');
        $kecamatan = 'Kecamatan ' . $this->input->post('kecamatan');
        $kota = $this->input->post('kota');
        $provinsi = $this->input->post('provinsi');
        $kodepos = $this->input->post('kodepos');

        // ...

        // Menggabungkan nilai-nilai input menjadi satu kalimat dipisahkan oleh koma
        $hasil = implode(', ', array_filter([$alamat, $rt, $rw, $kelurahan, $kecamatan, $kota, $provinsi, $kodepos]));

        // Memanggil model untuk menyimpan data ke database
        $affectedRows = $this->ModelUser->updateAlamat($id, $nama, $noTelepon, $hasil);

        if ($affectedRows > 0) {
            redirect('keranjang/checkout?');
        } else {
            echo "Terjadi kesalahan saat memperbarui data!";
        }
    }

    public function create_order()
    {
        // mendapatakan data yang akan diinput
        $last_order = $this->ModelGadget->get_last_order();
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

                // Lakukan apa pun yang diperlukan dengan data produk ini
                // Misalnya, simpan ke database, hitung total, dll.
                // Contoh penyimpanan ke database:
                $this->ModelGadget->insert_order_item($id_pesan, $id, $id_gadget, $jumlah, $total, $status);
                $this->ModelGadget->hapus_item_keranjang($id, $id_gadget);
            }
        }
        redirect('pesanan');
    }
}