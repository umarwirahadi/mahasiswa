<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Ksk extends MY_Controller {
	public function __construct()
	{
		parent::__construct();
	}

		
	public function index()
	{
		$attribute['title'] = 'Data KSK Mahasiswa';
		$data['content'] = $this->load->view('layouts/underconstruction', $attribute, TRUE);
		$this->load->view('layouts/default', $data);
	}

}
