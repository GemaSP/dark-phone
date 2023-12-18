<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelAkun extends CI_Model
{
    public function getAlamat($id)
    {
        // Ganti 'detail_user' dengan nama tabel yang sesuai
        $this->db->where('id', $id);

        $query = $this->db->get('detail_user');

        return $query;
    }

    public function tambahAlamat($id, $nama, $noTelepon, $hasil)
    {
        // Periksa apakah alamat dengan ID user yang diberikan sudah ada atau tidak
        $existingAlamat = $this->db->get_where('detail_user', array('id' => $id))->row();

        if ($existingAlamat) {
            // Jika alamat sudah ada, lakukan insert dengan status 0
            $data = array(
                'id' => $id,
                'alamat' => $hasil,
                'nama' => $nama,
                'no_telp' => $noTelepon,
                'state' => 0 // Status diubah menjadi 0
            );
        } else {
            // Jika alamat belum ada, lakukan insert dengan status 1
            $data = array(
                'id' => $id,
                'alamat' => $hasil,
                'nama' => $nama,
                'no_telp' => $noTelepon,
                'state' => 1 // Status tetap 1 karena alamat belum ada
            );
        }

        // Lakukan insert ke dalam tabel 'detail_user'
        $this->db->insert('detail_user', $data);

        return $this->db->affected_rows(); // Jumlah baris yang terpengaruh oleh operasi insert
    }

    public function updateAlamat($data = null, $where = null)
    {
        $this->db->update('detail_user', $data, $where);
    }

    public function alamatUtama($data, $where)
    {
        $this->db->set('state', 0); // Set nilai status menjadi 0
        $this->db->where('state', 1); // Kondisi status = 1
        $this->db->update('detail_user');
        $this->db->update('detail_user', $data, $where);

    }

    public function deleteAlamat($id)
    {
        // Lakukan operasi penghapusan pada database
        $user = $this->session->userdata('id');
        $this->db->where('id_alamat', $id);
        $this->db->where('id', $user);
        $deleted = $this->db->delete('detail_user');

        return $deleted;
    }
}