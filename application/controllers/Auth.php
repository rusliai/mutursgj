<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Auth extends CI_Controller
{
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
	function __construct()
	{
		parent::__construct();
		$this->load->model('auth_model', 'auth');
	}
	public function index()
	{
		$this->load->view('auth/login_form');
	}
	public function submit_login()
	{
		$username  = $this->input->post('username');
		$password  = $this->input->post('password');
		if ($this->auth->valid_user($username, $password)) {
			redirect('home');
		} else {
			$this->session->set_flashdata('message_login_error', 'Password atau username salah');
		}
		$this->load->view('auth/login_form');
	}
	public function submit_logout()
	{
		$this->session->sess_destroy();
		$this->load->view('auth/login_form');
	}
}
