<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Template
{
	protected $_ci;
	function __construct()
	{
		$this->_ci = &get_instance();
		$this->_ci->load->model('admin/Menu_model', 'menu');
		$this->_ci->load->model('Auth_model', 'auth');
		$this->_ci->load->helper('pirantisystem');
	}
	function display($content, $data = array())
	{
		if (!$this->_ci->auth->current_user()) {
			redirect('auth', 'refresh');
		}

		$idgroup = $this->_ci->session->userdata('id_grup');
		$data['menu'] =  $this->_ci->menu->get_menu_by_grup($idgroup);
		$data['_header'] = $this->_ci->load->view('_partials/header', $data, TRUE);
		$data['_content'] = $this->_ci->load->view($content, $data, true);
		$this->_ci->load->view('_partials/site.php', $data);
	}
}
