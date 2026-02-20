<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RiwayatPendidikanModel extends CI_Model {

    private $table = 'riwayat_pendidikan';


    public function get_riwayat_pendidikan_by_mahasiswa_id($mahasiswa_id) {
        return $this->db->get_where($this->table, ['id_mahasiswa' => $mahasiswa_id])->result();
    }
}