<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Ramsey\Uuid\Uuid;

class AuthModel extends CI_Model
{
	/**
	 * Default auth table.
	 * Expected columns (minimal):
	 * - id (CHAR(36) primary key)
	 * - nim (VARCHAR, nullable)
	 * - email (VARCHAR, nullable)
	 * - password_hash (VARCHAR(255) not null)
	 * - mahasiswa_id (CHAR(36), nullable)
	 * - tanggal_lahir (DATE not null)
	 * - is_active (TINYINT(1) default 1)
	 * - created_at, updated_at (timestamp/datetime)
	 */
	protected $table = 'auth_users';

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get_by_id($id)
	{
		return $this->db->get_where($this->table, ['id' => $id])->row();
	}

	/**
	 * Find user by NIM or email.
	 */
	public function get_by_identity($identity)
	{
		$identity = trim((string) $identity);
		if ($identity === '') {
			return null;
		}

		$this->db->from($this->table);
		$this->db->group_start();
		$this->db->where('nim', $identity);
		$this->db->or_where('email', $identity);
		$this->db->group_end();
		$this->db->limit(1);
		return $this->db->get()->row();
	}

	/**
	 * Verify login credentials.
	 * Returns user row on success, null on failure.
	 */
	public function verify_login($identity, $password)
	{
		$user = $this->get_by_identity($identity);
		if (!$user) {
			return null;
		}

		if (property_exists($user, 'is_active') && (int) $user->is_active !== 1) {
			return null;
		}

		$hash = isset($user->password_hash) ? (string) $user->password_hash : '';
		if ($hash === '' || !password_verify((string) $password, $hash)) {
			return null;
		}

		return $user;
	}

	/**
	 * Create an auth user.
	 * $data keys: nim (optional), email (optional), password (required), mahasiswa_id (optional)
	 */
	public function register(array $data)
	{
		$nim = isset($data['nim']) ? trim((string) $data['nim']) : null;
		$email = isset($data['email']) ? trim((string) $data['email']) : null;
		$password = isset($data['password']) ? (string) $data['password'] : '';
		$mahasiswaId = isset($data['mahasiswa_id']) ? trim((string) $data['mahasiswa_id']) : null;
		$tanggal_lahir = isset($data['tanggal_lahir']) ? $data['tanggal_lahir'] : null;

		if ($password === '') {
			return false;
		}

		if (($nim === null || $nim === '') && ($email === null || $email === '') && ($tanggal_lahir === null || $tanggal_lahir === '') ) {
			return false;
		}

		if ($nim !== null && $nim !== '' && $this->exists('nim', $nim)) {
			return false;
		}
		if ($email !== null && $email !== '' && $this->exists('email', $email)) {
			return false;
		}

		

		$insert = [
			'id' => Uuid::uuid4()->toString(),
			'nim' => ($nim !== '') ? $nim : null,
			'email' => ($email !== '') ? $email : null,
			'tanggal_lahir' => ($tanggal_lahir !== '') ? $tanggal_lahir : null,
			'password_hash' => password_hash($password, PASSWORD_DEFAULT),
			'mahasiswa_id' => ($mahasiswaId !== '') ? $mahasiswaId : null,
			'is_active' => 1,
		];

		return $this->db->insert($this->table, $insert) ? $insert['id'] : false;
	}

	public function set_password($userId, $newPassword)
	{
		$newPassword = (string) $newPassword;
		if (trim($newPassword) === '') {
			return false;
		}

		$this->db->where('id', $userId);
		return $this->db->update($this->table, [
			'password_hash' => password_hash($newPassword, PASSWORD_DEFAULT),
		]);
	}

	public function deactivate($userId)
	{
		$this->db->where('id', $userId);
		return $this->db->update($this->table, ['is_active' => 0]);
	}

	public function set_mahasiswa_id($userId, $mahasiswaId)
	{
		$userId = trim((string) $userId);
		$mahasiswaId = trim((string) $mahasiswaId);
		if ($userId === '' || $mahasiswaId === '') {
			return false;
		}

		$this->db->where('id', $userId);
		return $this->db->update($this->table, [
			'mahasiswa_id' => $mahasiswaId,
		]);
	}

	private function exists($field, $value)
	{
		$this->db->from($this->table);
		$this->db->where($field, $value);
		$this->db->limit(1);
		return (bool) $this->db->get()->row();
	}
}
