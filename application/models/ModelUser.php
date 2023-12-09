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

    public function cekUserAccess($where = null)
    {
        $this->db->select('*');
        $this->db->from('access_menu');
        $this->db->where($where);
        return $this->db->get();
    }

    public function getUserLimit()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->limit(10,0);
        return $this->db->get();
    }

    public function getJumlahPelanggan() {
        $this->db->from('user'); // Ganti 'nama_tabel' dengan nama tabel Anda
        $this->db->where('role_id', 2);
        return $this->db->count_all_results();
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
                'no_telp' => $noTelepon
            );
    
            // Lakukan insert ke dalam tabel 'detail_user'
            $this->db->insert('detail_user', $data);
    
            return $this->db->affected_rows(); // Jumlah baris yang terpengaruh oleh operasi insert
        }
    }


    public function getDetailUser($id)
    {
        // Ganti 'detail_user' dengan nama tabel yang sesuai
        $this->db->where('id', $id);
        $this->db->where('status', 1);
        $query = $this->db->get('detail_user');
        
        return $query->row_array();
    }
    public function getAlamat($id)
    {
        // Ganti 'detail_user' dengan nama tabel yang sesuai
        $this->db->select('alamat');
        $this->db->where('id', $id);
        $this->db->where('status', 1);
        $query = $this->db->get('detail_user');
        
        return $query->row_array();
    }
}