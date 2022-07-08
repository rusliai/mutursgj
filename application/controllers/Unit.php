<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Unit extends CI_Controller
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
		$this->load->model('master/unit_model', 'unit');
	}

	public function index()
	{
		$data['judul'] = "DATA UNIT";
		$data['data_unit'] = $this->unit->get_unit_all();
		$this->template->display('Master/Unitpage', $data);
	}
	public function get_detail_unit($idunit)
	{
		$result = 	$this->unit->get_detail_unit($idunit);
		if($result->num_rows() > 0 ){

			echo json_encode($result->row_array());

		}


	}

	public function add_unit()
	{
		$data['nama_unit'] = $_POST['namaUnit'];
		$data['aktif'] = $_POST['aktif'];
		
		if ($this->unit->insert_unit($data)) {
			echo json_encode( ['status' => true, 'message' => "Berhasil"]);
		};
	}
	public function update_unit($idunit)
	{
		$data['nama_unit'] = $_POST['namaUnit'];
		$data['aktif'] = $_POST['aktif'];
		$data['idunit'] = $idunit;
		
		
		if ($this->unit->update_unit($data)) {
			echo json_encode( ['status' => true, 'message' => "Berhasil"]);
		};
	}
}
