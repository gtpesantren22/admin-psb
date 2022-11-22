<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Santri extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('SantriModel', 'model');
	}

	public function index()
	{
		$data['baru'] = $this->model->baru()->result();

		$this->load->view('bunda/head');
		$this->load->view('bunda/baru', $data);
		$this->load->view('bunda/foot');
	}

	public function lanjut()
	{
		$data['baru'] = $this->model->lama()->result();

		$this->load->view('bunda/head');
		$this->load->view('bunda/lama', $data);
		$this->load->view('bunda/foot');
	}
}