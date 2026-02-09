<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Base controller that enforces authentication by default.
 *
 * Controllers that should be publicly accessible can override
 * should_require_auth() and return FALSE.
 *
 * @property CI_Session $session
 */
class MY_Controller extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		if ($this->should_require_auth() && !$this->is_logged_in()) {
			redirect('login');
			exit;
		}
	}

	protected function should_require_auth()
	{
		return TRUE;
	}

	protected function is_logged_in()
	{
		return (bool) $this->session->userdata('logged_in');
	}
}
