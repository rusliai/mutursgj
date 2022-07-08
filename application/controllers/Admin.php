<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Admin extends CI_Controller
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
		$this->load->library('template');
		$this->load->model('admin/menu_model', 'menu');
		$this->load->helper('pirantisystem');
	}
	public function index()
	{
		$data['judul'] = "Manajemen User";
		$this->template->display('admin/user', $data);
	}
	public function user_akses()
	{
		$data['judul'] = "SETTING USER AKSES";
		$data['all_menu'] = $this->menu->get_all_menu();
		$this->template->display('admin/user_akses', $data);
	}
	public function user_menu()
	{
		$data['judul'] = "SETTING USER AKSES";
		$data['all_menu'] = $this->menu->get_all_menu();
		$this->template->display('admin/user_akses', $data);
	}
	public function get_group()
	{
		$return = [];
		$data = $this->menu->get_group();
		if ($data) {
			$return = ['status' => true, 'data_group' => $data];
		} else {
			$return = ['status' => false, 'message' => "Data tidak ditemukan."];
		}
		echo json_encode($return);
	}

	public function get_all_menu()
	{
		$return = [];
		$data = $this->menu->get_all_menu();
		if ($data) {
			$return = ['status' => true, 'data_menu' => $data];
		} else {
			$return = ['status' => false, 'message' => "Data tidak ditemukan."];
		}
		echo json_encode($return);
	}

	public function get_menu_group($idgroup)
	{
		$return = [];


		if (isset($idgroup)) {

			$data = $this->menu->get_menu_by_grup($idgroup);
			if ($data) {
				$return = ['status' => true, 'data_menu' => $data];
			} else {
				$return = ['status' => false, 'message' => "Data tidak ditemukan."];
			}
		}
		

		echo json_encode($return);
	}

	public function add_to_group()
	{

		$input =  json_decode($this->input->raw_input_stream);

		$data['idgroup'] = $input->idgroup;
		$data['idmenu'] = $input->idmenu;

		if ($this->menu->add_item_group($data)) {
			echo json_encode(['status' => true, 'message' => 'Menu berhasil ditambahkan.']);
		} else {
			echo json_encode(['status' => false, 'message' => 'Gagal ditambahkan.']);
		}
	}

	public function delete_item_group()
	{
		$input =  json_decode($this->input->raw_input_stream);

		$data['idgroup'] = $input->idgroup;
		$data['idmenu'] = $input->idmenu;

		if ($this->menu->delete_item_group($data)) {
			echo json_encode(['status' => true, 'message' => 'Menu berhasil dihapus.']);
		} else {
			echo json_encode(['status' => false, 'message' => 'Gagal dihapus.']);
		}
	}
}
