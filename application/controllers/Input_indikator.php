<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Input_indikator extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('template');
		$this->load->library('form_validation');
		$this->load->model('indikator_mutu_model', 'indikator');
		$this->load->model('analisa_model', 'analisa');
		$this->load->model('master/indikator_model', 'master_indikator');
		$this->load->helper('pirantisystem');
	}
	public function index()
	{
		$param = ['tanggal' =>  date('Y-m-d')];
		$data['judul'] = "INPUT INDIKATOR MUTU";
		$data['data_indikator'] = $this->indikator->get_list_indikator($param)->result_array();
		$this->template->display('Indikator_mutu/input_indikator_page', $data);
	}
	public function get_indikator_tgl($tgl)
	{
		if (empty($tgl) || $tgl == "") {
			$tgl = date('Y-m-d');
		}
		$param = ['tanggal' =>  $tgl, 'idunit' => $this->session->userdata('user_unit')];
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
	public function get_listanalisa()
	{
		$bulan = $this->input->get('bulan');
		$tahun = $this->input->get('tahun');
		if ((!isset($bulan)) || (!isset($tahun))) {
			$bulan = date('m');
			$tahun = date('Y');
		}
		$param = [
			'bulan' =>  $bulan,
			'tahun' =>  $tahun,
			'idunit' => $this->session->userdata('user_unit')
		];
		$getdata  = $this->analisa->get_list_analisa($param);
		if ($getdata->num_rows() > 0) {
			$data = [
				'status' => true,
				'data_analisa' =>   $getdata->result_array()
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
	public function add_analisa()
	{
		$input =  json_decode($this->input->raw_input_stream);
		$data['idindikator'] = $input->idindikator;
		$data['iddokter'] = $input->iddokter;
		$data['bulan'] = $input->bulan;
		$data['tahun'] = $input->tahun;
		$data['uraian_analisa'] = $input->analisa;
		$data['uraian_tindak_lanjut'] = $input->tindak_lanjut;
		$data['keterangan'] = $input->keterangan;
		if ($this->analisa->add_analisa($data)) {
			echo json_encode(['status' => true, 'message' => 'Berhasil disimpan']);
		} else {
			echo json_encode(['status' => false, 'message' => 'Gagal']);
		};
	}
	public function add_all_indikator($tgl = '', $iddokter = '')
	{
		$unit = $this->session->userdata('user_unit');
		$indikator  = $this->master_indikator->get_indikator_by_grup($unit);
		foreach ($indikator as $row) {
			$param = [
				'indikator_mutu.idindikator' => $row['idindikator'],
				'indikator_mutu.tanggal' =>  $tgl,
				'indikator_mutu.idunit' => $this->session->userdata('user_unit'),
				'indikator_mutu.iddokter' => $iddokter
			];
			$input = $this->indikator->get_list_indikator($param);
			if ($input->num_rows() < 1) {
				$data['tanggal'] = $tgl;
				$data['iddokter'] = $iddokter;
				$data['idindikator'] = $row['idindikator'];
				$data['numerator'] = 0;
				$data['denominator'] = 0;
				if ($this->indikator->add_indikator_mutu($data)) {
					echo json_encode(['status' => true, 'message' => 'Berhasil disimpan']);
				} else {
					echo json_encode(['status' => false, 'message' => 'Gagal']);
				};
			}
		}
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
	public function update_analisa($idtrx)
	{
		$input =  json_decode($this->input->raw_input_stream);
		$data['idindikator'] = $input->idindikator;
		$data['uraian_analisa'] = $input->analisa;
		$data['uraian_tindak_lanjut'] = $input->tindak_lanjut;
		$data['keterangan'] = $input->keterangan;
		if ($this->analisa->update_analisa($data, $idtrx)) {
			echo json_encode(['status' => true, 'message' => 'Berhasil disimpan']);
		} else {
			echo json_encode(['status' => false, 'message' => 'Gagal']);
		};
	}
	public function hapus_indikator_mutu($idtrx)
	{
		if ($this->indikator->delete_indikator_mutu($idtrx)) {
			echo json_encode(['status' => true, 'message' => 'Berhasil Dihapus']);
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
		if ($this->input->get('tipe') && $this->input->get('tipe') == 'all') {
			$param = [
				'MONTH(tanggal)' =>  intval($bulan),
				'YEAR(tanggal)' => intval($tahun),
			];
		} else {
			if ($this->input->get('tipe') == 'perunit') {
				if ($this->input->get('idindikator')) {
					if (!$this->input->get('iddokter')) {
						$param = [
							'MONTH(tanggal)' =>  intval($bulan),
							'YEAR(tanggal)' => intval($tahun),
							'indikator_mutu.idunit' => $this->input->get('idunit'),
							'indikator_mutu.idindikator' => $this->input->get('idindikator'),
						];
					} else {
						$param = [
							'MONTH(tanggal)' =>  intval($bulan),
							'YEAR(tanggal)' => intval($tahun),
							'indikator_mutu.idunit' => $this->input->get('idunit'),
							'indikator_mutu.idindikator' => $this->input->get('idindikator'),
							'indikator_mutu.iddokter' => $this->input->get('iddokter')
						];
					}
				} else {
					$param = [
						'MONTH(tanggal)' =>  intval($bulan),
						'YEAR(tanggal)' => intval($tahun),
						'indikator_mutu.idunit' => $this->input->get('idunit'),
					];
				}
			} else {
				if (!$this->input->get('idindikator')) {
					$param = [
						'MONTH(tanggal)' =>  intval($bulan),
						'YEAR(tanggal)' => intval($tahun),
						'indikator_mutu.idunit' => $unit,
					];
				} else {
					$param = [
						'MONTH(tanggal)' =>  intval($bulan),
						'YEAR(tanggal)' => intval($tahun),
						'indikator_mutu.idunit' => $unit,
						'indikator_mutu.idindikator' => $this->input->get('idindikator')
					];
				}
			}
		}
		$data = $this->indikator->getRekap($param)->result_array();
		foreach ($data as $value) {
			$dataanalisa = $this->analisa->analisa_by_param([
				'idindikator' => $value['idindikator'],
				'iddokter' => $value['iddokter'],
				'idunit' => $unit,
				'bulan' => intval($bulan),
				'tahun' => intval($tahun),
			]);
			if ($dataanalisa->num_rows() > 0) {
				$value['analisa'] = $dataanalisa->row();
			} else {
				$value['analisa'] = [];
			}
			$value['detail'] = $this->indikator->getRekapDetail($param)->result_array();
			$param['idindikator'] = $value['idindikator'];
			$param['iddokter'] = $value['iddokter'];
			$value['detail'] = $this->indikator->getRekapDetail($param)->result_array();
			$data_row[] = $value;
		}
		echo json_encode($data_row);
	}
	public function getDetailAnalsia($idtrx)
	{
		$detail = $this->analisa->analisa_by_trx($idtrx);
		if ($detail) {
			echo json_encode($detail);
		}
	}
}
