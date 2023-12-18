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
}