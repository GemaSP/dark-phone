<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelUser extends CI_Model
{
    public function simpanData($data = null)
    {
        $this->db->insert('user', $data);
    }

    public function cekData($where = null)
    {
        return $this->db->get_where('user', $where);
    }

    public function getUserWhere($where = null)
    {
        return $this->db->get_where('user', $where);
    }

    public function getJumlahPelanggan() {
        $this->db->from('user'); // Ganti 'nama_tabel' dengan nama tabel Anda
        $this->db->where('role_id', 2);
        return $this->db->count_all_results();
    }

    public function notifikasi()
    {
        return $this->db->get('notifikasi')->result_array();
    }

    public function getJumlahNotifikasi()
    {
        $this->db->from('notifikasi');
        return $this->db->count_all_results();
    }

    public function komentar()
    {
        return $this->db->get('komentar')->result_array();
    }

    public function getJumlahKomentar()
    {
        $this->db->from('komentar');
        return $this->db->count_all_results();
    }
}