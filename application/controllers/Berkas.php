<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Berkas extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('BerkasModel', 'model');
		$this->load->model('Auth_model');

		$user = $this->Auth_model->current_user();
		if (!$this->Auth_model->current_user() || $user->level != 'adm' && $user->level != 'admin') {
			redirect('login/logout');
		}
	}

	public function index()
	{
		$data['judul'] = 'berkas';
		$data['user'] = $this->Auth_model->current_user();
		$data['baru'] = $this->model->baru();

		$this->load->view('adm/head', $data);
		$this->load->view('adm/berkas', $data);
		$this->load->view('adm/foot');
	}

	// public function lanjut()
	// {
	// 	$data['baru'] = $this->model->lama()->result();
	// 	$data['judul'] = 'berkas';
	// 	$data['user'] = $this->Auth_model->current_user();

	// 	$this->load->view('bunda/head', $data);
	// 	$this->load->view('bunda/lama', $data);
	// 	$this->load->view('bunda/foot');
	// }

	public function detail($nis)
	{
		$data['judul'] = 'berkas';
		$data['user'] = $this->Auth_model->current_user();
		$data['data'] = $this->model->dtlBerkas($nis)->row();

		$this->load->view('adm/head', $data);
		$this->load->view('adm/berkasDtl', $data);
		$this->load->view('adm/foot');
	}

	public function uploadKK()
	{
		$nis = $this->input->post('nis', true);
		$lama = $this->input->post('file_lama', true);

		$config['upload_path']          = FCPATH . '../psb/assets/berkas/';
		$config['allowed_types']        = 'jpg|jpeg|png|pdf';
		$config['file_name']            = 'KK-' . $nis;
		$config['overwrite']            = true;
		$config['max_size']             = 0;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('berkas')) {
			$data['error'] = $this->upload->display_errors();
		} else {
			if ($lama != '') {
				unlink('../psb/assets/berkas/' . $lama);
			}
			$uploaded_data = $this->upload->data();
			$new_data = [
				'kk' => $uploaded_data['file_name']
			];

			if ($this->model->getFile($nis)->num_rows() < 1) {
				$this->model->input('berkas_file', $nis);
				$this->model->upload('berkas_file', $new_data, $nis);
				if ($this->db->affected_rows() > 0) {
					redirect('berkas/detail/' . $nis);
				}
			} else {
				$this->model->upload('berkas_file', $new_data, $nis);
				if ($this->db->affected_rows() > 0) {
					redirect('berkas/detail/' . $nis);
				}
			}
		}
	}
	public function downKK($nis)
	{
		$file = $this->model->getFile($nis)->row();
		force_download('../psb/assets/berkas/' . $file->kk, NULL);
		redirect('berkas/detail/' . $nis);
	}
}