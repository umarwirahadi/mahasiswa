<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mahasiswa extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('ReferensiModel');
		$this->load->model('MahasiswaModel');
		$this->load->library('form_validation');
	}

	
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
		$attribute['referensi'] = $this->ReferensiModel->getByDataKelompok(['AGAMA','PEKERJAAN','TRANSPORTASI','JENIS_TINGGAL','PENDIDIKAN','PENGHASILAN']);
		$data['content'] = $this->load->view('mahasiswa/create', $attribute, TRUE);
		$this->load->view('layouts/default', $data);

	}

	public function store()
	{
		// Set validation rules
		$this->form_validation->set_rules('nama_mahasiswa', 'Nama Mahasiswa', 'required|trim|max_length[100]');
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required|in_list[L,P]');
		$this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required|trim|max_length[50]');
		$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
		$this->form_validation->set_rules('nik', 'NIK Mahasiswa', 'required|trim|numeric|exact_length[16]');
		$this->form_validation->set_rules('nisn', 'NISN', 'trim|numeric|max_length[20]');
		$this->form_validation->set_rules('kewarganegaraan', 'Kewarganegaraan', 'required|trim|max_length[50]');
		$this->form_validation->set_rules('id_agama', 'Agama', 'required');
		$this->form_validation->set_rules('kelurahan', 'Kelurahan', 'required|trim|max_length[100]');
		$this->form_validation->set_rules('id_kecamatan', 'Kecamatan', 'required|trim|max_length[100]');
		$this->form_validation->set_rules('nama_ayah', 'Nama Ayah', 'required|trim|max_length[100]');
		$this->form_validation->set_rules('nama_ibu_kandung', 'Nama Ibu Kandung', 'required|trim|max_length[100]');
		$this->form_validation->set_rules('email', 'Email', 'trim|valid_email');
		$this->form_validation->set_rules('nik_ayah', 'NIK Ayah', 'trim|numeric|max_length[16]');
		$this->form_validation->set_rules('nik_ibu', 'NIK Ibu', 'trim|numeric|max_length[16]');

		if ($this->form_validation->run() == FALSE) {
			// Validation failed, reload the form with errors
			$attribute['title'] = 'Create Data Mahasiswa';
			$attribute['sub_title'] = 'Data profile saya';
			$attribute['referensi'] = $this->ReferensiModel->getByDataKelompok(['AGAMA','PEKERJAAN','TRANSPORTASI','JENIS_TINGGAL','PENDIDIKAN','PENGHASILAN']);
			$data['content'] = $this->load->view('mahasiswa/create', $attribute, TRUE);
			$this->load->view('layouts/default', $data);
		} else {
			// Prepare data for insert
			$data = [
				'nama_mahasiswa' => strtoupper($this->input->post('nama_mahasiswa', TRUE)),
				'jenis_kelamin' => $this->input->post('jenis_kelamin', TRUE),
				'tempat_lahir' => $this->input->post('tempat_lahir', TRUE),
				'tanggal_lahir' => $this->input->post('tanggal_lahir', TRUE),
				'id_agama' => $this->input->post('id_agama', TRUE),
				'nik' => $this->input->post('nik', TRUE),
				'nisn' => $this->input->post('nisn', TRUE) ?: NULL,
				'kewarganegaraan' => $this->input->post('kewarganegaraan', TRUE),
				'jalan' => $this->input->post('jalan', TRUE) ?: NULL,
				'dusun' => $this->input->post('dusun', TRUE) ?: NULL,
				'rt' => $this->input->post('rt', TRUE) ?: NULL,
				'rw' => $this->input->post('rw', TRUE) ?: NULL,
				'kelurahan' => $this->input->post('kelurahan', TRUE),
				'kode_pos' => $this->input->post('kode_pos', TRUE) ?: NULL,
				'id_kecamatan' => $this->input->post('id_kecamatan', TRUE) ?: NULL,
				'id_jenis_tinggal' => $this->input->post('id_jenis_tinggal', TRUE) ?: NULL,
				'id_alat_transportasi' => $this->input->post('id_alat_transportasi', TRUE) ?: NULL,
				'telepon' => $this->input->post('telepon', TRUE) ?: NULL,
				'handphone' => $this->input->post('handphone', TRUE) ?: NULL,
				'email' => $this->input->post('email', TRUE) ?: NULL,
				'nik_ayah' => $this->input->post('nik_ayah', TRUE) ?: NULL,
				'nama_ayah' => $this->input->post('nama_ayah', TRUE),
				'tanggal_lahir_ayah' => $this->input->post('tanggal_lahir_ayah', TRUE) ?: NULL,
				'id_pendidikan_ayah' => $this->input->post('id_pendidikan_ayah', TRUE) ?: NULL,
				'id_pekerjaan_ayah' => $this->input->post('id_pekerjaan_ayah', TRUE) ?: NULL,
				'id_penghasilan_ayah' => $this->input->post('id_penghasilan_ayah', TRUE) ?: NULL,
				'nik_ibu' => $this->input->post('nik_ibu', TRUE) ?: NULL,
				'nama_ibu_kandung' => $this->input->post('nama_ibu_kandung', TRUE),
				'tanggal_lahir_ibu' => $this->input->post('tanggal_lahir_ibu', TRUE) ?: NULL,
				'id_pendidikan_ibu' => $this->input->post('id_pendidikan_ibu', TRUE) ?: NULL,
				'id_pekerjaan_ibu' => $this->input->post('id_pekerjaan_ibu', TRUE) ?: NULL,
				'id_penghasilan_ibu' => $this->input->post('id_penghasilan_ibu', TRUE) ?: NULL,
				'nama_wali' => $this->input->post('nama_wali', TRUE) ?: NULL,
				'tanggal_lahir_wali' => $this->input->post('tanggal_lahir_wali', TRUE) ?: NULL,
				'id_pendidikan_wali' => $this->input->post('id_pendidikan_wali', TRUE) ?: NULL,
				'id_pekerjaan_wali' => $this->input->post('id_pekerjaan_wali', TRUE) ?: NULL,
				'id_penghasilan_wali' => $this->input->post('id_penghasilan_wali', TRUE) ?: NULL,
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s')
			];

			// Insert data
			if ($this->MahasiswaModel->insert_mahasiswa($data)) {
				$this->session->set_flashdata('success', 'Data mahasiswa berhasil disimpan.');
				redirect('mahasiswa');
			} else {
				$this->session->set_flashdata('error', 'Gagal menyimpan data mahasiswa.');
				redirect('mahasiswa/create');
			}
		}
	}
}
