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

    public function totalStok()
    {
        $this->db->select_sum('stok'); // Menghitung jumlah stok
        $query = $this->db->get('gadget'); // Ganti 'nama_tabel' dengan nama tabel yang sesuai
        if ($query->num_rows() > 0) {
            return $query->row()->stok; // Mengembalikan hasil jumlah stok
        } else {
            return 0; // Mengembalikan 0 jika tidak ada hasil
        }
    }

    public function getJumlahTransaksi() {
        $this->db->from('transaksi'); // Ganti 'nama_tabel' dengan nama tabel Anda
        return $this->db->count_all_results();
    }

    public function totalPenghasilan()
    {
        $totalHargaDitambah10rb = 0;
        $this->db->where('status', 4);
        $query = $this->db->get('pemesanan'); // Ganti 'nama_tabel' dengan nama tabel yang sesuai

        if ($query->num_rows() > 0) {
            $results = $query->result_array(); // Mengambil hasil query sebagai array

            foreach ($results as $row) {
                $totalHargaDitambah10rb += $row['total_harga'] + 10000; // Menambah 10,000 ke setiap baris total_harga
            }

            return $totalHargaDitambah10rb; // Mengembalikan hasil jumlah total_harga ditambah 10,000
        } else {
            return 0; // Mengembalikan 0 jika tidak ada hasil
        }
    }

    public function total($field, $where)
    {
        $this->db->select_sum($field);
        if (!empty($where) && count($where) > 0) {
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
        $this->db->join('merek', 'gadget.id_merek = merek.id_merek');
        $this->db->where($where);
        return $this->db->get();
    }

    //Mendapatkan data Pemesanan
    //Mengecek Pesanan
    public function cekPesanan($where = null)
    {
        return $this->db->get_where('pemesanan', $where);
    }
    public function getPesanan()
    {
        $this->db->select('pemesanan.*, gadget.*, user.*, detail_user.*');
        $this->db->from('pemesanan');
        $this->db->join('gadget', 'pemesanan.id_gadget = gadget.id_gadget');
        $this->db->join('user', 'pemesanan.id = user.id');
        $this->db->join('detail_user', 'pemesanan.id_alamat = detail_user.id_alamat');
        return $this->db->get();
    }

    public function searchPemesanan($searchText)
    {
        $this->db->from('pemesanan');
        $this->db->join('gadget', 'pemesanan.id_gadget = gadget.id_gadget');
        $this->db->join('user', 'pemesanan.id = user.id');
        $this->db->join('detail_user', 'pemesanan.id_alamat = detail_user.id_alamat');
        $this->db->like('user.username', $searchText);
        $this->db->or_like('gadget.nama_gadget', $searchText);
        $this->db->or_like('id_pemesanan', $searchText);
        $query = $this->db->get();
        return $query->result_array();
    }

    //Mendapatkan data Transaksi
    public function getTransaksi()
    {
        $this->db->select('pemesanan.*, transaksi.*');
        $this->db->from('transaksi');
        $this->db->join('pemesanan', 'pemesanan.id_pemesanan = transaksi.id_pemesanan');
        return $this->db->get();
    }
}