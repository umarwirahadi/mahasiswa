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
			$this->session->set_flashdata('error', 'Data mahasiswa tidak lengkap. Silakan lengkapi data diri Anda terlebih dahulu..!');
			$this->session->set_userdata(['mahasiswa'=>$mahasiswa['data']]);
			redirect('mahasiswa/create');
			return;
		}

		$this->load->view('layouts/default', $data);
	}

	public function profile()
	{
		
		$mahasiwa = $this->MahasiswaModel->get_mahasiswa_by_id((string) $this->session->userdata('mahasiswa_id'));
		$attribute['title'] = 'Profile Mahasiswa';
		$attribute['sub_title'] = 'Data profile saya';
		$attribute['mahasiswa'] = $mahasiwa;
		$data['content'] = $this->load->view('profile/index', $attribute, TRUE);
		$this->load->view('layouts/default', $data);

	}

	public function upload_photo_profile()
	{
		$mahasiswa_id = (string) $this->session->userdata('mahasiswa_id');
		if ($mahasiswa_id === '') {
			$this->session->set_flashdata('error', 'Anda harus login terlebih dahulu untuk mengunggah foto profil.');
			redirect('login');
			return;
		}

		$config['upload_path'] = './uploads/profile_photos/';
		$config['allowed_types'] = 'jpg|jpeg|png';
		$config['max_size'] = 2048; // 2MB
		$config['file_name'] = 'profile_' . $mahasiswa_id . '_' . time();

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('profile_photo')) {
			$this->session->set_flashdata('error', 'Gagal mengunggah foto profil: ' . $this->upload->display_errors());
			redirect('profile');
			return;
		} else {
			$uploadData = $this->upload->data();
			$photoPath = 'uploads/profile_photos/' . $uploadData['file_name'];

			// Update database
			$updateData = ['photo_path' => $photoPath];
			$this->MahasiswaModel->update_mahasiswa($mahasiswa_id, $updateData);

			$this->session->set_flashdata('success', 'Foto profil berhasil diunggah.');
			redirect('profile');
			return;
		}
	}
}
