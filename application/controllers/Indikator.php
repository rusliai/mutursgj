<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Indikator extends CI_Controller
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
		$this->load->model('master/indikator_model', 'indikator');
	}

	public function index()
	{
		$data['judul'] = "DATA INDIKATOR";
		$data['data_indikator'] = $this->indikator->get_indikator_all();
		$this->template->display('Master/Indikatorpage', $data);
	}


	public function get_detail_indikator($idindikator)
	{
		$result = 	$this->indikator->get_detail_indikator($idindikator);
		if ($result->num_rows() > 0) {

			echo json_encode($result->row_array());
		}
	}

	public function cariIndikator(){

		$param = $this->input->get('param');

		$result = 	$this->indikator->cariIndikator($param);
		if ($result->num_rows() > 0) {

			echo json_encode($result->result_array());
		}

	}

	public function add_indikator()
	{
		$data['nama_indikator'] = $_POST['nama_indikator'];
		$data['aktif'] = $_POST['aktif'];
		$data['numerator'] = $_POST['numerator'];
		$data['denominator'] = $_POST['denominator'];

		if ($this->indikator->insert_indikator($data)) {
			return json_encode( ['status' => true, 'message' => "Berhasil"]);
		};
	}
	public function update_indikator($idindikator)
	{
		$data['nama_indikator'] = $_POST['nama_indikator'];
		$data['aktif'] = $_POST['aktif'];
		$data['numerator'] = $_POST['numerator'];
		$data['denominator'] = $_POST['denominator'];
		$data['idindikator'] = $idindikator;
		
		
		if ($this->indikator->update_indikator($data)) {
			return json_encode( ['status' => true, 'message' => "Berhasil"]);
		};
	}
}
