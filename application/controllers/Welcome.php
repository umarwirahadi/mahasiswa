<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property CI_Session $session
 * @property MahasiswaModel $MahasiswaModel
 */
class Welcome extends MY_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('MahasiswaModel');
	}

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

		$nim = (string) $this->session->userdata('nim');
		$mahasiswa_id = (string) $this->session->userdata('mahasiswa_id');
		$identity = (string) $this->session->userdata('auth_identity');
		$mahasiswa = ['source' => 'new'];
		$mahasiswa['data'] = $this->MahasiswaModel->get_mahasiswa_by_id($mahasiswa_id);
		if(!$mahasiswa['data']) {
			$mahasiswa['data'] = $this->MahasiswaModel->get_prev_mahasiswa_by_npm_and_birth_date($nim, (string) $this->session->userdata('tanggal_lahir'));
			$mahasiswa['source'] = 'old';
		}





		if($mahasiswa['source']=='new') {
			
			$attribute['session_user'] = [
				'auth_user_id' => (string) $this->session->userdata('auth_user_id'),
				'auth_identity' => $identity,
				'nim' => $nim,
			];

			$attribute['mahasiswa'] = $mahasiswa;
			$attribute['mahasiswa_source'] = $mahasiswa['source'];
			$attribute['is_mahasiswa_found'] = (bool) $mahasiswa['data'];
			$data['content'] = $this->load->view('dashboard', $attribute, TRUE);
		} else {
			$this->session->set_flashdata('error', 'Data mahasiswa tidak ditemukan. Silakan lengkapi data diri Anda terlebih dahulu..!');
			$this->session->set_userdata(['mahasiswa'=>$mahasiswa['data']]);
			redirect('mahasiswa/create');
			return;
		}

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
