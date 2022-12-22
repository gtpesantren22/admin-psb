<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Info extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('InfoModel', 'model');
		$this->load->model('Auth_model');

		$user = $this->Auth_model->current_user();

		if (!$this->Auth_model->current_user() || $user->level != 'adm' && $user->level != 'admin') {
			redirect('login/logout');
		}
	}

	public function index()
	{
		$data['judul'] = 'info';
		$data['user'] = $this->Auth_model->current_user();
		$data['data'] = $this->model->data()->result();

		$this->load->view('adm/head', $data);
		$this->load->view('adm/info', $data);
		$this->load->view('adm/foot');
	}

	public function add()
	{
		$user = $this->Auth_model->current_user();
		$data = [
			'tanggal'  => $this->input->post('tanggal', true),
			'oleh'  => $user->nama,
			'isi'  => $this->input->post('isi', true)
		];

		$this->model->tambah('info', $data);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('ok', 'Data Berhasil Tersimpan');
			redirect('info');
		}
	}

	public function edit($id)
	{
		$data['judul'] = 'info';
		$data['user'] = $this->Auth_model->current_user();
		$data['data'] = $this->model->getId($id)->row();

		$this->load->view('adm/head', $data);
		$this->load->view('adm/infoEdit', $data);
		$this->load->view('adm/foot');
	}

	public function editAct()
	{
		$id = $this->input->post('id', true);
		$data = [
			'tanggal'  => $this->input->post('tanggal', true),
			'isi'  => $this->input->post('isi', true)
		];

		$this->model->edit('info', $data, $id);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('ok', 'Data Berhasil Tersimpan');
			redirect('info');
		}
	}
	
	public function del($id)
	{
		$this->model->del($id);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('ok', 'Data Berhasil Dihapus');
			redirect('info');
		}
	}
}