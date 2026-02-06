<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property CI_Session $session
 * @property CI_Form_validation $form_validation
 * @property CI_Input $input
 * @property CI_Config $config
 * @property AuthModel $AuthModel
 */
class Auth extends MY_Controller
{
	protected function should_require_auth()
	{
		return FALSE;
	}

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper(['url', 'form']);
		$this->load->model('AuthModel');
	}

	public function login()
	{
		// If already logged in, go to dashboard.
		if ($this->session->userdata('logged_in')) {
			redirect('/');
			return;
		}

		$attribute = [
			'title' => 'Login',
			'flash_success' => $this->session->flashdata('success'),
			'flash_error' => $this->session->flashdata('error'),
		];

		$isPost = isset($_SERVER['REQUEST_METHOD']) && strtoupper((string) $_SERVER['REQUEST_METHOD']) === 'POST';
		if ($isPost) {
			$this->form_validation->set_rules('identity', 'NIM / Email', 'trim|required|max_length[60]');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_error_delimiters('', '');

			if ($this->form_validation->run() === TRUE) {
				$identity = $this->input->post('identity', TRUE);
				$password = (string) $this->input->post('password', FALSE);

				$user = $this->AuthModel->verify_login($identity, $password);
				if ($user) {
					$this->session->sess_regenerate(TRUE);
					$this->session->set_userdata([
						'logged_in' => TRUE,
						'email' => property_exists($user, 'email') ? $user->email : null,
						'auth_user_id' => $user->id,
						'auth_identity' => !empty($user->nim) ? $user->nim : $user->email,
						'mahasiswa_id' => property_exists($user, 'mahasiswa_id') ? $user->mahasiswa_id : null,
						'nim'=> property_exists($user, 'nim') ? $user->nim : null,
						'tanggal_lahir' => property_exists($user, 'tanggal_lahir') ? $user->tanggal_lahir : null,
					]);

					redirect('/');
					return;
				}

				$attribute['login_error'] = 'Login gagal. NIM/Email atau password salah.';
			}
		}

		$data['content'] = $this->load->view('auth/login', $attribute, TRUE);
		$this->load->view('layouts/auth', $data);
	}

	public function register()
	{
		$attribute = [
			'title' => 'Register',
			'flash_success' => $this->session->flashdata('success'),
			'flash_error' => $this->session->flashdata('error'),
		];

		$isPost = isset($_SERVER['REQUEST_METHOD']) && strtoupper((string) $_SERVER['REQUEST_METHOD']) === 'POST';
		if ($isPost) {
			$this->form_validation->set_rules('nama', 'Nama Lengkap', 'trim|required|min_length[3]|max_length[100]');
			$this->form_validation->set_rules('nim', 'NIM', 'trim|required|min_length[5]|max_length[30]');
			$this->form_validation->set_rules('angkatan', 'Angkatan', 'trim|required|integer|greater_than_equal_to[2000]|less_than_equal_to[2100]');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|max_length[60]');
			$this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
			$this->form_validation->set_rules('password_confirm', 'Konfirmasi Password', 'required|matches[password]');
			$this->form_validation->set_rules('terms', 'Ketentuan', 'required');

			$this->form_validation->set_error_delimiters('', '');

			if ($this->form_validation->run() === TRUE) {
				$nim = $this->input->post('nim', TRUE);
				$email = $this->input->post('email', TRUE);
				$password = (string) $this->input->post('password', FALSE);

				$userId = $this->AuthModel->register([
					'nim' => $nim,
					'email' => $email,
					'password' => $password,
				]);

				if ($userId !== false) {
					$this->session->set_flashdata('success', 'Registrasi berhasil. Silakan login.');
					redirect('login');
					return;
				}

				$attribute['register_error'] = 'Registrasi gagal. NIM atau email mungkin sudah terdaftar.';
			}
		}

		$data['content'] = $this->load->view('auth/register', $attribute, TRUE);
		$this->load->view('layouts/auth', $data);
	}

	public function logout()
	{
		// Remove any authentication-related session keys.
		$this->session->unset_userdata([
			'logged_in',
			'auth_user_id',
			'auth_identity',
		]);

		// Remove auth-related cookies (if implemented later).
		$this->load->helper('cookie');
		delete_cookie('remember_token');
		delete_cookie('remember');

		// Also expire the session cookie on the client.
		$sessCookieName = (string) $this->config->item('sess_cookie_name');
		if ($sessCookieName !== '') {
			delete_cookie($sessCookieName);
		}

		// Regenerate session ID to prevent session fixation.
		$this->session->sess_regenerate(TRUE);
		$this->session->set_flashdata('success', 'Anda berhasil logout.');
		redirect('login');
	}
}
