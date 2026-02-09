<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class ReferensiModel extends CI_Model {

	protected $table = 'referensi_global';
	protected $fields = [
		'kelompok',
		'kode_dikti',
		'nama_referensi',
		'urutan',
		'is_active'
	];

	public function getByKelompok($kelompok) {
		$this->db->where('kelompok', $kelompok);
		$this->db->where('is_active', 1);
		$query = $this->db->get($this->table);
		return $query->result();
	}
	
	public function getByDataKelompok($list_kelompok = []) {
		$this->db->where_in('kelompok', $list_kelompok);
		$this->db->where('is_active', 1);
		$query = $this->db->get($this->table);
		return $query->result();
	}

	public function insert($data) {
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

	public function update($id, $data) {
		$this->db->where('id', $id);
		return $this->db->update($this->table, $data);
	}

	public function delete($id) {
		$this->db->where('id', $id);
		return $this->db->delete($this->table);
	}
	public function get_by_id($id) {
		$this->db->where('id', $id);
		$query = $this->db->get($this->table);
		return $query->row();
	}


}
