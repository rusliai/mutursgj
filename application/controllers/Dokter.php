<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Dokter extends CI_Controller
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
		$this->load->model('master/dokter_model', 'dokter');
		$this->load->model('master/spesialis_model', 'spesialis');
	}
	public function index()
	{
		$data['judul'] = "DATA DOKTER";
		$data['data_dokter'] = $this->dokter->get_dokter_all();
		$this->template->display('Master/Dokterpage', $data);
	}
	public function get_detail_dokter($iddokter)
	{
		$result = 	$this->dokter->get_detail_dokter($iddokter);
		if ($result->num_rows() > 0) {
			echo json_encode($result->row_array());
		}
	}
	public function cariDokter()
	{
		$param = $this->input->get('param');
		$result = 	$this->dokter->cariDokter($param);
		if ($result->num_rows() > 0) {
			echo json_encode($result->result_array());
		}
	}
	public function add_dokter()
	{
		$data['nama_dokter'] = $_POST['namaDokter'];
		$data['spesialis'] = $_POST['spesialis'];
		$data['aktif'] = filter_var($_POST['aktif'], FILTER_VALIDATE_BOOLEAN);
		if ($this->dokter->insert_dokter($data)) {
			return json_encode(['status' => true, 'message' => "Berhasil"]);
		};
	}
	public function update_dokter($iddokter)
	{
		$data['nama_dokter'] = $_POST['namaDokter'];
		$data['spesialis'] = $_POST['spesialis'];
		//convert aktif dari string menjadi boolean
		$data['aktif'] =  filter_var($_POST['aktif'], FILTER_VALIDATE_BOOLEAN);
		if ($this->dokter->update_dokter($data, $iddokter)) {
			echo json_encode(['status' => true, 'message' => "Berhasil"]);
		} else {
			echo json_encode(['status' => false, 'message' => "Gagal"]);
		}
	}
	public function get_list_spesialis()
	{
		$data_spesialis = $this->spesialis->get_list_spesialis();
		// if($data_spesialis->num_rows() > 0 ){
		echo json_encode($data_spesialis->result_array());
		// }
	}
}
