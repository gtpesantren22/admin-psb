<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Image extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('ImageModel', 'model');
		$this->load->model('Auth_model');

		$user = $this->Auth_model->current_user();
		if (!$this->Auth_model->current_user() || $user->level != 'adm' && $user->level != 'admin') {
			redirect('login/logout');
		}
	}

	public function index()
	{
		$data['data'] = $this->model->getData()->result();
		$data['judul'] = 'image';
		$data['user'] = $this->Auth_model->current_user();

		$this->load->view('adm/head', $data);
		$this->load->view('adm/foto', $data);
		$this->load->view('adm/foot');
	}

	public function detail($nis)
	{
		$data['judul'] = 'image';
		$data['data'] = $this->model->getDataNis($nis)->row();
		$data['user'] = $this->Auth_model->current_user();

		$this->load->view('adm/head', $data);
		$this->load->view('adm/fotoDtl', $data);
		$this->load->view('adm/foot');
	}
}