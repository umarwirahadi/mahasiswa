<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Khs extends MY_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('KhsModel');
	}

	private function nilaiAkhirToPoint($nilaiAkhir)
	{
		if ($nilaiAkhir === null) {
			return 0.0;
		}

		// If already numeric grade-point (0..4)
		if (is_numeric($nilaiAkhir)) {
			$val = (float) $nilaiAkhir;
			if ($val < 0.0) {
				return 0.0;
			}
			if ($val > 4.0) {
				// Unknown numeric scale (e.g., 0..100) – default safe.
				return 0.0;
			}
			return $val;
		}

		$grade = strtoupper(trim((string) $nilaiAkhir));
		$grade = str_replace(["–", "—"], '-', $grade);
		$grade = preg_replace('/\s+/', '', $grade);

		$map = [
			'A' => 4.0,
			'A-' => 3.7,
			'B+' => 3.5,
			'B' => 3.0,
			'B-' => 2.7,
			'C+' => 2.5,
			'C' => 2.0,
			'D' => 1.0,
			'E' => 0.0,
		];

		return isset($map[$grade]) ? (float) $map[$grade] : 0.0;
	}

	
	public function index()
	{
		$nim = (string) $this->session->userdata('nim');
		$khs_list = $this->KhsModel->get_nilai_by_npm($nim);
		foreach ($khs_list as $nilai) {
			$point = $this->nilaiAkhirToPoint(isset($nilai->nilaiakhir) ? $nilai->nilaiakhir : null);
			$nilai->bobot = $point;
			$nilai->sks_bobot = (float) (isset($nilai->sks) ? $nilai->sks : 0) * $point;
		}
		$attribute['khs_list'] = $khs_list;
		$attribute['title'] = 'Data KHS Mahasiswa';
		$data['content'] = $this->load->view('khs/index', $attribute, TRUE);
		$this->load->view('layouts/default', $data);
	}

	public function show($npm)
	{
		$attribute['title'] = 'Kartu Hasil Studi';
		
		
		$attribute['khs_id'] = $npm;
		$data_khs = $this->KhsModel->get_nilai_by_npm($npm);
		// hitung bobot = nilai akhir * sks dan tambahkan field bobot pada object nilai
		// A = 4.0, A- = 3.7, B+ = 3.5, B = 3.0, B- = 2.7, C+ = 2.5, C = 2.0, D = 1.0, E = 0

		foreach($data_khs as $nilai) {
			$point = $this->nilaiAkhirToPoint(isset($nilai->nilaiakhir) ? $nilai->nilaiakhir : null);
			$sks = (float) (isset($nilai->sks) ? $nilai->sks : 0);
			$nilai->nilai_point = $point;
			$nilai->bobot = $point * $sks;
			$nilai->sks_bobot = $nilai->bobot;

		}
		$total_sks = 0;
		$total_smt = 0;
		$total_matkul = count($data_khs);	
		foreach($data_khs as $nilai) {
			$total_sks += (int) $nilai->sks;
			$total_smt += (int) max(0,$nilai->smt);
		}
		$attribute['total_sks'] = $total_sks;
		$attribute['total_matkul'] = $total_matkul;
		$attribute['total_smt'] = $total_smt;
		$attribute['data_khs'] = $data_khs;
		$data['content'] = $this->load->view('khs/show', $attribute, TRUE);
		$this->load->view('layouts/default', $data);
	}
}
