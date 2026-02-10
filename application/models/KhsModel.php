<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KhsModel extends CI_Model {

	public function get_nilai_by_npm($npm) {
		$this->db->select('nilai09.kodematkul, matakuliah09.namamatkul, matakuliah09.sks, matakuliah09.tahun, nilai09.nilai_uts, nilai09.nilai_uas,nilai09.nilaiakhir,nilai09.smt');
		$this->db->from('nilai09');
		$this->db->join('matakuliah09', 'nilai09.kodematkul = matakuliah09.kodematkul and nilai09.tahun = matakuliah09.tahun', 'inner');
		$this->db->where('nilai09.npm', $npm);
		$query = $this->db->get();
		return $query->result();
	}

}
