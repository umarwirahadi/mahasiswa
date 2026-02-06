<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pembayaran extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	
	public function index()
	{
		$attribute['title'] = 'Data Pembayaran Mahasiswa';
		$data['content'] = $this->load->view('pembayaran/index', $attribute, TRUE);
		$this->load->view('layouts/default', $data);
	}

	public function show($id)
	{
		$attribute['title'] = 'Kartu Hasil Studi';
		$attribute['khs_id'] = $id;
		$data['content'] = $this->load->view('pembayaran/show', $attribute, TRUE);
		$this->load->view('layouts/default', $data);
	}
}
