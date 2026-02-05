<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		$attribute['title'] = 'Welcome to Portal Mahasiswa';
		$data['content'] = $this->load->view('dashboard', $attribute, TRUE);
		$this->load->view('layouts/default', $data);
	}

	public function profile()
	{
		$attribute['title'] = 'Profile Mahasiswa';
		$attribute['sub_title'] = 'Data profile saya';
		$data['content'] = $this->load->view('profile/index', $attribute, TRUE);
		$this->load->view('layouts/default', $data);

	}
}
