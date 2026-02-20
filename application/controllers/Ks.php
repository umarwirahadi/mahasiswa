<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Ks extends MY_Controller {
	public function __construct()
	{
		parent::__construct();
	}

		
	public function index()
	{
		$attribute['title'] = 'Kartu Studi Mahasiswa';
		$data['content'] = $this->load->view('layouts/underconstruction', $attribute, TRUE);
		$this->load->view('layouts/default', $data);
	}

}
