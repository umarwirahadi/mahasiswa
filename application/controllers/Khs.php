<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Khs extends MY_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('KhsModel');
	}

	
	public function index()
	{
		$attribute['title'] = 'Data KHS Mahasiswa';
		$data['content'] = $this->load->view('khs/index', $attribute, TRUE);
		$this->load->view('layouts/default', $data);
	}

	public function show($npm)
	{
		$attribute['title'] = 'Kartu Hasil Studi';
		
		
		$attribute['khs_id'] = $npm;
		$data_khs = $this->KhsModel->get_nilai_by_npm($npm);
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
