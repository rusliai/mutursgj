<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Input_indikator extends CI_Controller
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
		$this->load->library('form_validation');
		$this->load->model('indikator_mutu_model', 'indikator');
		$this->load->helper('pirantisystem');
		
	}
	public function index()
	{

		$param = ['tanggal' =>  date('Y-m-d')];
		$data['judul'] = "INPUT INDIKATOR MUTU";

		$data['data_indikator'] = $this->indikator->get_list_indikator($param)->result_array();
		$this->template->display('Indikator_mutu/input_indikator_page', $data);
	}

	public function get_dindikator_tgl($tgl)
	{


		if (empty($tgl) || $tgl == "") {
			$tgl = date('Y-m-d');
		}

		$param = ['tanggal' =>  $tgl,'idunit'=> $this->session->userdata('user_unit')];
		$getdata  = $this->indikator->get_list_indikator($param);

		if ($getdata->num_rows() > 0) {

			$data = [
				'status' => true,
				'data_indikator' =>   $getdata->result_array()
			];


			echo json_encode($data);
		} else {
			$data['status'] = false;
			echo json_encode($data);
		}
	}

	public function get_detail_indikator_mutu($trx)
	{
		$data_indikator = $this->indikator->indikator_by_trx($trx);
		if ($data_indikator) {
			echo json_encode($data_indikator);
		}
	}
	public function add_indikator_mutu()
	{
		$input =  json_decode($this->input->raw_input_stream);
		$data['tanggal'] = $input->tanggal;
		$data['iddokter'] = $input->iddokter;
		$data['idindikator'] = $input->idindikator;
		$data['numerator'] = $input->numerator;
		$data['denominator'] = $input->denominator;
		if ($this->indikator->add_indikator_mutu($data)) {
			echo json_encode(['status' => true, 'message' => 'Berhasil disimpan']);
		} else {
			echo json_encode(['status' => false, 'message' => 'Gagal']);
		};
	}
	public function update_indikator_mutu($idtrx)
	{
		$input =  json_decode($this->input->raw_input_stream);
		$data['tanggal'] = $input->tanggal;
		$data['iddokter'] = $input->iddokter;
		$data['idindikator'] = $input->idindikator;
		$data['numerator'] = $input->numerator;
		$data['denominator'] = $input->denominator;
		if ($this->indikator->update_indikator_mutu($data, $idtrx)) {
			echo json_encode(['status' => true, 'message' => 'Berhasil disimpan']);
		} else {
			echo json_encode(['status' => false, 'message' => 'Gagal']);
		};
	}


	public function getRekap()
	{
		$bulan = $this->input->get('bulan');
		$tahun = $this->input->get('tahun');
		$unit =  $this->session->user_unit;
		
		$data_row = [];
		
		$param = [
				'MONTH(tanggal)' =>  intval($bulan),
				'YEAR(tanggal)' => intval($tahun),
				'idunit' => $unit
			];

		$data = $this->indikator->getRekap($param)->result_array();

		foreach ($data as $value) {

			$param['idindikator'] = $value['idindikator'];
			$param['iddokter'] = $value['iddokter'];

			$detail = $this->indikator->getRekapDetail($param)->result_array();
			$value['detail'] = $detail;
			$data_row[] = $value;
		}
		echo json_encode($data_row);
	}
}
