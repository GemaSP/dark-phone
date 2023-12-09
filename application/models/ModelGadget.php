<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelGadget extends CI_Model
{
    //manajemen gadget
    public function getGadget()
    {
        $this->db->select('gadget.*, merek.nama_merek as nama_merek'); // Select columns from both tables
        $this->db->from('gadget');
        $this->db->join('merek', 'gadget.id_merek = merek.id_merek', 'LEFT');
        return $this->db->get();
    }

    public function gadgetWhere($where)
    {
        $this->db->select('gadget.*, merek.nama_merek as nama_merek'); // Select columns from both tables
        $this->db->join('merek', 'gadget.id_merek = merek.id_merek', 'LEFT');
        return $this->db->get_where('gadget', $where);
    }

    public function simpanGadget($data = null)
    {
        $this->db->insert('gadget', $data);
    }

    public function updateGadget($data = null, $where = null)
    {
        $this->db->update('gadget', $data, $where);
    }

    public function searchGadget($searchText)
    {
        $this->db->from('gadget');
        $this->db->join('merek', 'gadget.id_merek = merek.id_merek', 'LEFT');
        $this->db->like('nama_gadget', $searchText);
        $this->db->or_like('tahun_rilis', $searchText);
        $this->db->or_like('nama_merek', $searchText);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function hapusGadget($where = null)
    {
        $this->db->delete('gadget', $where);
    }

    public function totalStok() {
        $this->db->select_sum('stok'); // Menghitung jumlah stok
        $query = $this->db->get('gadget'); // Ganti 'nama_tabel' dengan nama tabel yang sesuai
        if ($query->num_rows() > 0) {
            return $query->row()->stok; // Mengembalikan hasil jumlah stok
        } else {
            return 0; // Mengembalikan 0 jika tidak ada hasil
        }
    }

    public function total($field, $where)
    {
        $this->db->select_sum($field);
        if(!empty($where) && count($where) > 0){
            $this->db->where($where);
        }
        $this->db->from('gadget');
        return $this->db->get()->row($field);
    }

    //manajemen merek
    public function getMerek()
    {
        return $this->db->get('merek');
    }

    public function merekWhere($where)
    {
        return $this->db->get_where('merek', $where);
    }

    public function simpanMerek($data = null)
    {
        $this->db->insert('merek', $data);
    }

    public function hapusMerek($where = null)
    {
        $this->db->delete('merek', $where);
    }

    public function updateMerek($where = null, $data = null)
    {
        $this->db->update('merek', $data, $where);
    }

    public function searchMerek($searchText)
    {
        $this->db->like('nama_merek', $searchText);
        $query = $this->db->get('merek');
        return $query->result_array();
    }

    //join
    public function joinMerekGadget($where)
    {
        $this->db->from('gadget');
        $this->db->join('merek','gadget.id_merek = merek.id_merek');
        $this->db->where($where);
        return $this->db->get();
    }

    //Keranjang
    public function Keranjangwhere($where)
    {
        $this->db->select('keranjang.id, keranjang.jumlah_barang, gadget.*');
        $this->db->join('gadget', 'keranjang.id_gadget = gadget.id_gadget');
        $this->db->join('user', 'keranjang.id = user.id');
        return $this->db->get_where('keranjang', $where);
    }

    public function getKeranjang()
    {
        $this->db->select('keranjang.id, keranjang.jumlah_barang, gadget.*');
        $this->db->from('keranjang');
        $this->db->join('gadget', 'keranjang.id_gadget = gadget.id_gadget');
        $this->db->join('user', 'keranjang.id = user.id');
        return $this->db->get();
    }

    public function updateJumlahBarang($id, $jumlah_barang) {
        $user=$this->session->userdata('id');
        $this->db->join('gadget', 'keranjang.id_gadget = gadget.id_gadget');
        $this->db->join('user', 'keranjang.id = user.id');
        $this->db->where('id_gadget', $id);
        $this->db->where('id', $user);

        $this->db->update('keranjang', ['jumlah_barang' => $jumlah_barang]);
    }

    public function deleteRow($id) {
        // Lakukan operasi penghapusan pada database
        // Gantilah 'table_name' dengan nama tabel Anda
        $user=$this->session->userdata('id');
        $this->db->where('id_gadget', $id);
        $this->db->where('id', $user);
        $deleted = $this->db->delete('keranjang');
        
        return $deleted;
    }

    public function getJumlahData($id) {
        $this->db->from('keranjang'); // Ganti 'nama_tabel' dengan nama tabel Anda
        $this->db->where('id', $id);
        return $this->db->count_all_results();
    }

    public function getSelectedItems($selectedItemIds) {
        // Di sini, Anda akan mengambil data barang dari database
        // Berdasarkan ID yang dipilih dari halaman keranjang
        $id=$this->session->userdata('id');
        // Misalnya:
        $this->db->select('keranjang.id, keranjang.jumlah_barang, gadget.*');
        $this->db->from('keranjang');
        $this->db->join('gadget', 'keranjang.id_gadget = gadget.id_gadget');
        $this->db->join('user', 'keranjang.id = user.id');
        $this->db->where_in('keranjang.id_gadget', $selectedItemIds);
        $this->db->where('keranjang.id', $id);
        return $this->db->get()->result_array();
    }

    public function get_last_order() {
        // Ambil ID pemesanan terakhir dari database
        $this->db->select('id_pemesanan');
        $this->db->from('pemesanan');
        $this->db->order_by('id_pemesanan', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get();

        return $query->row_array(); // Kembalikan baris hasil query sebagai array
    }

    public function insert_order_item($id_pesan, $id, $id_gadget, $jumlah, $total, $status) {
        // Lakukan penyimpanan data ke dalam database
        // Gantilah 'your_table_name' dengan nama tabel yang sesuai di database Anda

        $data = array(
            'id_pemesanan' => $id_pesan,
            'id' => $id,
            'id_gadget' => $id_gadget,
            'qty' => $jumlah,
            'total_harga' => $total,
            'status' => $status
            // Kolom lain yang sesuai dengan struktur tabel
        );

        $this->db->insert('pemesanan', $data);
        return $this->db->insert_id(); // Mengembalikan ID dari data yang disimpan jika diperlukan
    }

    // Tambahkan method lain jika diperlukan untuk model ini


    public function cekPesanan($where = null)
    {
        return $this->db->get_where('pemesanan', $where);
    }

    public function getPesanan()
    {
        $this->db->select('pemesanan.*, gadget.*, user.*');
        $this->db->from('pemesanan');
        $this->db->join('gadget', 'pemesanan.id_gadget = gadget.id_gadget');
        $this->db->join('user', 'pemesanan.id = user.id');
        return $this->db->get();
    }

    public function pemesananWhere($where)
    {
        $this->db->select('pemesanan.*, user.*, gadget.*');
        $this->db->join('gadget', 'pemesanan.id_gadget = gadget.id_gadget');
        $this->db->join('user', 'pemesanan.id = user.id');
        return $this->db->get_where('pemesanan', $where);
    }

    public function hapus_item_keranjang($id, $id_gadget) {
        // Sesuaikan dengan tabel dan kolom yang sesuai dengan keranjang Anda
        $this->db->where('id', $id);
        $this->db->where('id_gadget', $id_gadget);
        $this->db->delete('keranjang');
        // Pastikan untuk menyesuaikan nama tabel dan kolom di database Anda
        return ($this->db->affected_rows() > 0);
    }
}