<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {

	
	public function index()
	{
		$attribute['title'] = 'Data mahasiswa';
		$data['content'] = $this->load->view('mahasiswa/index', $attribute, TRUE);
		$this->load->view('layouts/default', $data);
	}

	public function create()
	{
		$attribute['title'] = 'Create Data Mahasiswa';
		$attribute['sub_title'] = 'Data profile saya';
		$data['content'] = $this->load->view('mahasiswa/create', $attribute, TRUE);
		$this->load->view('layouts/default', $data);

	}
}
