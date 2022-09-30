<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Group_indikator extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('template');
		$this->load->model('master/indikator_model', 'indikator');
		$this->load->helper('pirantisystem');
	}
	
	public function index()
	{
		$data['judul'] = "GROUP INDIKATOR";
		$this->template->display('master/groupindikatorpage', $data);
	}

	public function add_to_group()
	{
		$input =  json_decode($this->input->raw_input_stream);
		$data['idunit'] = $input->idgroup;
		$data['idindikator'] = $input->idIndikator;
		if ($this->indikator->add_item_group($data)) {
			echo json_encode(['status' => true, 'message' => 'Menu berhasil ditambahkan.']);
		} else {
			echo json_encode(['status' => false, 'message' => 'Gagal ditambahkan.']);
		}
	}
	public function delete_item_group()
	{
		$input =  json_decode($this->input->raw_input_stream);
		$data['idunit'] = $input->idgroup;
		$data['idindikator'] = $input->idIndikator;
		if ($this->indikator->delete_item_group($data)) {
			echo json_encode(['status' => true, 'message' => 'Menu berhasil dihapus.']);
		} else {
			echo json_encode(['status' => false, 'message' => 'Gagal dihapus.']);
		}
	}

	
	
	
}
