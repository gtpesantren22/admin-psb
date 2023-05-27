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
		$data['foto'] = $this->model->getFotoNis($nis)->row();

		$this->load->view('adm/head', $data);
		$this->load->view('adm/fotoDtl', $data);
		$this->load->view('adm/foot');
	}

	public function editImg()
	{
		$nis = $this->input->post('nis', true);
		$lama = $this->input->post('file_lama', true);

		$config['upload_path']          = FCPATH . '../psb/assets/berkas/';
		$config['allowed_types']        = 'jpg|jpeg|png';
		$config['file_name']            = 'diri-' . $nis . random(4);
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
				'diri' => $uploaded_data['file_name']
			];

			if ($this->model->getFoto($nis)->num_rows() < 1) {
				$this->model->input('foto_file', $nis);
				$this->model->upload('foto_file', $new_data, $nis);
				if ($this->db->affected_rows() > 0) {
					redirect('image/detail/' . $nis);
				}
			} else {
				$this->model->upload('foto_file', $new_data, $nis);
				if ($this->db->affected_rows() > 0) {
					redirect('image/detail/' . $nis);
				}
			}
		}
	}

	public function kts($gel)
	{
		$data['kts'] = $this->model->getKTS($gel)->result();
		$this->load->view('adm/kts', $data);
	}
}
