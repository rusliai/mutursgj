<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Indikator extends CI_Controller
{
	
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
	public function get_all_indikator()
	{
		$return = [];
		$data = $this->indikator->get_indikator_all();
		if ($data) {
			$return = ['status' => true, 'data_indikator' => $data];
		} else {
			$return = ['status' => false, 'message' => "Data tidak ditemukan."];
		}
		echo json_encode($return);
	}
	public function get_indikator_group($idgroup)
	{
		$return = [];
		if (isset($idgroup)) {
			$data = $this->indikator->get_indikator_by_grup($idgroup);
			if ($data) {
				$return = ['status' => true, 'data_indikator' => $data];
			} else {
				$return = ['status' => false, 'message' => "Data tidak ditemukan."];
			}
		}
		echo json_encode($return);
	}
	public function get_detail_indikator($idindikator)
	{
		$result = 	$this->indikator->get_detail_indikator($idindikator);
		if ($result->num_rows() > 0) {
			echo json_encode($result->row_array());
		}
	}
	public function cariIndikator()
	{
		$param = $this->input->get('param');
		$result = 	$this->indikator->cariIndikator($param);
		if ($result->num_rows() > 0) {
			$data['status'] = true;
			$data['data_indikator'] = $result->result_array();
			echo json_encode($data);
		} else {
			$data['status'] = false;
			echo json_encode($data);
		}
	}
	public function cariIndikatorunit()
	{
		$param = $this->input->get('param');
		$idunit = $data['idunit'] = $this->session->user_unit;
		$result = 	$this->indikator->cariIndikatorGroup($param, $idunit);
		if ($result->num_rows() > 0) {
			echo json_encode($result->result_array());
		}
	}
	public function add_indikator()
	{
		$data['nama_indikator'] = $_POST['namaIndiator'];
		$data['numerator'] = $_POST['numerator'];
		$data['denominator'] = $_POST['denominator'];
		$data['standar'] = $_POST['standar'];
		$data['ket_standar'] = $_POST['ket_standar'];
		$data['target_capaian'] = $_POST['jenisCapaian'];
		$data['aktif'] = filter_var($_POST['aktif'], FILTER_VALIDATE_BOOLEAN);
		if ($this->indikator->insert_indikator($data)) {
			echo json_encode(['status' => true, 'message' => "Tambah Berhasil"]);
		} else {
			echo json_encode(['status' => false, 'message' => "Tambah Gagal"]);
		}
	}
	public function update_indikator($idindikator)
	{
		$data['nama_indikator'] = $_POST['namaIndiator'];
		$data['numerator'] = $_POST['numerator'];
		$data['denominator'] = $_POST['denominator'];
		$data['standar'] = $_POST['standar'];
		$data['ket_standar'] = $_POST['ket_standar'];
		$data['target_capaian'] = $_POST['jenisCapaian'];
		$data['aktif'] = filter_var($_POST['aktif'], FILTER_VALIDATE_BOOLEAN);
		if ($this->indikator->update_indikator($data, $idindikator)) {
			echo json_encode(['status' => true, 'message' => "Update Berhasil"]);
		} else {
			echo json_encode(['status' => false, 'message' => "Update Gagal"]);
		}
	}

	public function setAktif($idindikator){

		$status = filter_var($this->input->post('aktif'),FILTER_VALIDATE_BOOLEAN);

		if ($this->indikator->update_indikator(['aktif' => $status], $idindikator)) {
			echo json_encode(['status' => true, 'message' => "Update Berhasil"]);
		} else {
			echo json_encode(['status' => false, 'message' => "Update Gagal"]);
		}

	}
}
