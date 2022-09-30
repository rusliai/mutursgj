<?php
defined('BASEPATH') or exit('No direct script access allowed');
class User extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('template');
		$this->load->model('admin/User_model', 'user');
		$this->load->model('master/Unit_model', 'unit');
	}
	public function index()
	{
		$data['judul'] = "DATA USER";
		$data['data_user'] = $this->user->get_user_all();
		$this->template->display('admin/Userpage', $data);
	}
	public function get_detail_user($iduser)
	{
		$result = 	$this->user->get_detail_user($iduser);
		if ($result->num_rows() > 0) {
			echo json_encode($result->row_array());
		}
	}
	public function cariUser()
	{
		$param = $this->input->get('param');
		$result = 	$this->user->cariUser($param);
		if ($result->num_rows() > 0) {
			echo json_encode($result->result_array());
		}
	}
	public function add_user()

	{
		$data['username'] = $_POST['username'];
		$data['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
		$data['nama_user'] = $_POST['namaUser'];
		$data['idunit'] = $_POST['unit'];
		$data['idgroup'] = $_POST['group'];
		$data['aktif'] = true;

		var_dump($data);

		if ($this->user->insert_user($data)) {
			return json_encode(['status' => true, 'message' => "Berhasil"]);
		};
	}
	public function update_user($iduser)
	{
		$data['nama_user'] = $_POST['namaUser'];
		$data['username'] = $_POST['username'];
		if ($_POST['password'] != "") {
			$data['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
		}

		$data['idunit'] = $_POST['unit'];
		$data['idgroup'] = $_POST['group'];

		$data['aktif'] =  filter_var($_POST['aktif'], FILTER_VALIDATE_BOOLEAN);
		if ($this->user->update_user($data, $iduser)) {
			echo json_encode(['status' => true, 'message' => "Berhasil"]);
		} else {
			echo json_encode(['status' => false, 'message' => "Gagal"]);
		}
	}

	public function get_list_unit()
	{
		$data_unit = $this->unit->get_unit_all();
		if ($data_unit) {
			echo json_encode($data_unit);
		}
	}

	public function get_list_group(){
		$data_group = $this->user->get_group_all();
		if ($data_group) {
			echo json_encode($data_group);
		}
	}
}
