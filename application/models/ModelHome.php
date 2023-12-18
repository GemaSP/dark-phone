<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelHome extends CI_Model
{
    //Mendapatkan data keranjang
    public function getKeranjang()
    {
        $this->db->select('keranjang.id, keranjang.jumlah_barang, gadget.*');
        $this->db->from('keranjang');
        $this->db->join('gadget', 'keranjang.id_gadget = gadget.id_gadget');
        $this->db->join('user', 'keranjang.id = user.id');
        return $this->db->get();
    }

    //Mendapatkan data keranjang dengan kondisi tertentu
    public function Keranjangwhere($where)
    {
        $this->db->select('keranjang.id, keranjang.jumlah_barang, gadget.*');
        $this->db->join('gadget', 'keranjang.id_gadget = gadget.id_gadget');
        $this->db->join('user', 'keranjang.id = user.id');
        return $this->db->get_where('keranjang', $where);
    }

    //Update Jumlah Barang pada keranjang
    public function updateJumlahBarang($id, $jumlah_barang)
    {
        $user = $this->session->userdata('id');
        $this->db->join('gadget', 'keranjang.id_gadget = gadget.id_gadget');
        $this->db->join('user', 'keranjang.id = user.id');
        $this->db->where('id_gadget', $id);
        $this->db->where('id', $user);

        $this->db->update('keranjang', ['jumlah_barang' => $jumlah_barang]);
    }

    //Hapus data pada keranjang
    public function deleteRow($id)
    {
        // Lakukan operasi penghapusan pada database
        // Gantilah 'table_name' dengan nama tabel Anda
        $user = $this->session->userdata('id');
        $this->db->where('id_gadget', $id);
        $this->db->where('id', $user);
        $deleted = $this->db->delete('keranjang');

        return $deleted;
    }
    
    //Menkonfirmasi Pesanan
    public function konfirmasiPesanan($id)
    {
        $user = $this->session->userdata('id');

        $this->db->where('id_pemesanan', $id);
        $this->db->where('id', $user);
        $this->db->update('pemesanan', ['status' => 4]);
        $this->db->update('pemesanan', ['tanggal_diterima' => time()]);

    }

    //Pembatalan Pesanan
    public function pembatalanPesanan($id)
    {
        $user = $this->session->userdata('id');

        $this->db->where('id_pemesanan', $id);
        $this->db->where('id', $user);
        $this->db->update('pemesanan', ['status' => 5]);
    }

    //Memasukan Data ke tabel Transaksi
    public function insertTransaksi($id_pesan)
    {
        $data = array(
            'id_pemesanan' => $id_pesan
        );

        $this->db->insert('transaksi', $data);
    }

    //Mendapatkan Jumlah data pada tabel Keranjang
    public function getJumlahData($id)
    {
        $this->db->from('keranjang');
        $this->db->where('id', $id);
        return $this->db->count_all_results();
    }

    //Mendapatkan data barang dari id yg dipilih
    public function getSelectedItems($selectedItemIds)
    {
        // Mengambil data barang dari database
        // Berdasarkan ID yang dipilih dari halaman keranjang
        $id = $this->session->userdata('id');

        $this->db->select('keranjang.id, keranjang.jumlah_barang, gadget.*');
        $this->db->from('keranjang');
        $this->db->join('gadget', 'keranjang.id_gadget = gadget.id_gadget');
        $this->db->join('user', 'keranjang.id = user.id');
        $this->db->where_in('keranjang.id_gadget', $selectedItemIds);
        $this->db->where('keranjang.id', $id);
        return $this->db->get()->result_array();
    }

    //Memeriksa pemesanan
    public function get_last_order()
    {
        // Ambil ID pemesanan terakhir dari database
        $this->db->select('id_pemesanan');
        $this->db->from('pemesanan');
        $this->db->order_by('id_pemesanan', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get();

        return $query->row_array(); // Kembalikan baris hasil query sebagai array
    }

    //Memasukan data ke Table pemesanan
    public function insert_order_item($id_pesan, $id, $id_gadget, $jumlah, $total, $status, $id_alamat, $tanggal_pesan)
    {
        // Lakukan penyimpanan data ke dalam database
        $data = array(
            'id_pemesanan' => $id_pesan,
            'id' => $id,
            'id_gadget' => $id_gadget,
            'qty' => $jumlah,
            'total_harga' => $total,
            'status' => $status,
            'id_alamat' => $id_alamat,
            'tanggal_pesan' => $tanggal_pesan
        );

        $this->db->insert('pemesanan', $data);
        return $this->db->insert_id(); // Mengembalikan ID dari data yang disimpan jika diperlukan
    }
    
    public function pemesananWhere($where)
    {
        $this->db->select('pemesanan.*, user.*, gadget.*');
        $this->db->join('gadget', 'pemesanan.id_gadget = gadget.id_gadget');
        $this->db->join('user', 'pemesanan.id = user.id');
        return $this->db->get_where('pemesanan', $where);
    }

    public function hapus_item_keranjang($id, $id_gadget)
    {
        // Sesuaikan dengan tabel dan kolom yang sesuai dengan keranjang Anda
        $this->db->where('id', $id);
        $this->db->where('id_gadget', $id_gadget);
        $this->db->delete('keranjang');
        // Pastikan untuk menyesuaikan nama tabel dan kolom di database Anda
        return ($this->db->affected_rows() > 0);
    }

    public function kurangiStok($id_gadget, $jumlah)
    {
        $this->db->set('stok', "stok - $jumlah", false);
        $this->db->where('id_gadget', $id_gadget);
        $this->db->update('gadget');

        return ($this->db->affected_rows() > 0);
    }
    public function getAlamat($id)
    {
        $this->db->where('id', $id);
        $this->db->where('state', 1);
        $query = $this->db->get('detail_user');
        
        return $query;
    }

    public function getAlamat1($user_id)
    {
        $this->db->select('id_alamat');
        $this->db->from('detail_user');
        $this->db->where('id', $user_id);
        $this->db->where('state', 1);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            $result = $query->row();
            return $result->id_alamat;
        } else {
            return false;
        }

    }
    public function updateAlamat($id, $nama, $noTelepon, $hasil) {
        // Cek apakah data sudah ada dalam tabel atau belum
        $existingData = $this->db->get_where('detail_user', array('id' => $id))->row();
    
        if ($existingData) {
            // Jika data sudah ada, lakukan update
            $data = array(
                'alamat' => $hasil,
                'nama' => $nama,
                'no_telp' => $noTelepon
            );
    
            // Lakukan update ke dalam tabel 'detail_user'
            $this->db->where('id', $id);
            $this->db->update('detail_user', $data);
            
            return $this->db->affected_rows(); // Jumlah baris yang terpengaruh oleh operasi update
        } else {
            // Jika data tidak ditemukan, lakukan insert
            $data = array(
                'id' => $id,
                'alamat' => $hasil,
                'nama' => $nama,
                'no_telp' => $noTelepon,
                'state' => 1
            );
    
            // Lakukan insert ke dalam tabel 'detail_user'
            $this->db->insert('detail_user', $data);
    
            return $this->db->affected_rows(); // Jumlah baris yang terpengaruh oleh operasi insert
        }
    }

    public function alamatWhere($where)
    {
        $this->db->select('*');
        return $this->db->get_where('detail_user', $where);
    }
}