<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Ramsey\Uuid\Uuid;

class MahasiswaModel extends CI_Model {

    private $table = 'mahasiswa';
    protected $fields = [
'id',
'nama_mahasiswa',
'jenis_kelamin',
'tempat_lahir',
'tanggal_lahir',
'id_agama',
'nik',
'nisn',
'kewarganegaraan',
'jalan',
'dusun',
'rt',
'rw',
'kelurahan',
'kode_pos',
'id_kecamatan',
'id_jenis_tinggal',
'id_alat_transportasi',
'telepon',
'handphone',
'email',
'nik_ayah',
'nama_ayah',
'tanggal_lahir_ayah',
'id_pendidikan_ayah',
'id_pekerjaan_ayah',
'id_penghasilan_ayah',
'nik_ibu',
'nama_ibu_kandung',
'tanggal_lahir_ibu',
'id_pendidikan_ibu',
'id_pekerjaan_ibu',
'id_penghasilan_ibu',
'nama_wali',
'tanggal_lahir_wali',
'id_pendidikan_wali',
'id_pekerjaan_wali',
'id_penghasilan_wali',
'created_at',
'updated_at'
    ];

    public function get_all_mahasiswa() {
        return $this->db->get($this->table)->result();
    }

    public function get_mahasiswa_by_id($id) {
        return $this->db->get_where($this->table, ['id' => $id])->row();
    }

    public function insert_mahasiswa($data) {
        $data['id'] = Uuid::uuid4()->toString();
        return $this->db->insert($this->table, $data);
    }

    public function update_mahasiswa($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update($this->table, $data);
    }

    public function delete_mahasiswa($id) {
        $this->db->where('id', $id);
        return $this->db->delete($this->table);
    }
}
