<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Errors extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->library('template');
	}
	public function index()
	{
		$this->template->display('errors/not_found');
	}
	
}
