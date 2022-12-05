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

	public function atr()
	{
		$data['judul'] = 'berkas';
		$data['user'] = $this->Auth_model->current_user();
		$data['baru'] = $this->model->atr();

		$this->load->view('adm/head', $data);
		$this->load->view('adm/atr', $data);
		$this->load->view('adm/foot');
	}

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
			if (file_exists('../psb/assets/berkas' . $lama)) {
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

	public function uploadakta()
	{
		$nis = $this->input->post('nis', true);
		$lama = $this->input->post('file_lama', true);

		$config['upload_path']          = FCPATH . '../psb/assets/berkas/';
		$config['allowed_types']        = 'jpg|jpeg|png|pdf';
		$config['file_name']            = 'akta-' . $nis;
		$config['overwrite']            = true;
		$config['max_size']             = 0;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('berkas')) {
			$data['error'] = $this->upload->display_errors();
		} else {
			if (file_exists('../psb/assets/berkas' . $lama)) {
				unlink('../psb/assets/berkas/' . $lama);
			}
			$uploaded_data = $this->upload->data();
			$new_data = [
				'akta' => $uploaded_data['file_name']
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
	public function downakta($nis)
	{
		$file = $this->model->getFile($nis)->row();
		force_download('../psb/assets/berkas/' . $file->akta, NULL);
		redirect('berkas/detail/' . $nis);
	}

	public function uploadkip()
	{
		$nis = $this->input->post('nis', true);
		$lama = $this->input->post('file_lama', true);

		$config['upload_path']          = FCPATH . '../psb/assets/berkas/';
		$config['allowed_types']        = 'jpg|jpeg|png|pdf';
		$config['file_name']            = 'kip-' . $nis;
		$config['overwrite']            = true;
		$config['max_size']             = 0;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('berkas')) {
			$data['error'] = $this->upload->display_errors();
		} else {
			if (file_exists('../psb/assets/berkas' . $lama)) {
				unlink('../psb/assets/berkas/' . $lama);
			}
			$uploaded_data = $this->upload->data();
			$new_data = [
				'kip' => $uploaded_data['file_name']
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
	public function downkip($nis)
	{
		$file = $this->model->getFile($nis)->row();
		force_download('../psb/assets/berkas/' . $file->kip, NULL);
		redirect('berkas/detail/' . $nis);
	}

	public function uploadktp_ayah()
	{
		$nis = $this->input->post('nis', true);
		$lama = $this->input->post('file_lama', true);

		$config['upload_path']          = FCPATH . '../psb/assets/berkas/';
		$config['allowed_types']        = 'jpg|jpeg|png|pdf';
		$config['file_name']            = 'ktp_ayah-' . $nis;
		$config['overwrite']            = true;
		$config['max_size']             = 0;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('berkas')) {
			$data['error'] = $this->upload->display_errors();
		} else {
			if (file_exists('../psb/assets/berkas' . $lama)) {
				unlink('../psb/assets/berkas/' . $lama);
			}
			$uploaded_data = $this->upload->data();
			$new_data = [
				'ktp_ayah' => $uploaded_data['file_name']
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
	public function downktp_ayah($nis)
	{
		$file = $this->model->getFile($nis)->row();
		force_download('../psb/assets/berkas/' . $file->ktp_ayah, NULL);
		redirect('berkas/detail/' . $nis);
	}

	public function uploadktp_ibu()
	{
		$nis = $this->input->post('nis', true);
		$lama = $this->input->post('file_lama', true);

		$config['upload_path']          = FCPATH . '../psb/assets/berkas/';
		$config['allowed_types']        = 'jpg|jpeg|png|pdf';
		$config['file_name']            = 'ktp_ibu-' . $nis;
		$config['overwrite']            = true;
		$config['max_size']             = 0;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('berkas')) {
			$data['error'] = $this->upload->display_errors();
		} else {
			if (file_exists('../psb/assets/berkas/' . $lama)) {
				unlink('../psb/assets/berkas/' . $lama);
			}
			$uploaded_data = $this->upload->data();
			$new_data = [
				'ktp_ibu' => $uploaded_data['file_name']
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
	public function downktp_ibu($nis)
	{
		$file = $this->model->getFile($nis)->row();
		force_download('../psb/assets/berkas/' . $file->ktp_ibu, NULL);
		redirect('berkas/detail/' . $nis);
	}

	public function uploadskl()
	{
		$nis = $this->input->post('nis', true);
		$lama = $this->input->post('file_lama', true);

		$config['upload_path']          = FCPATH . '../psb/assets/berkas/';
		$config['allowed_types']        = 'jpg|jpeg|png|pdf';
		$config['file_name']            = 'skl-' . $nis;
		$config['overwrite']            = true;
		$config['max_size']             = 0;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('berkas')) {
			$data['error'] = $this->upload->display_errors();
		} else {
			if (file_exists('../psb/assets/berkas/' . $lama)) {
				unlink('../psb/assets/berkas/' . $lama);
			}
			$uploaded_data = $this->upload->data();
			$new_data = [
				'skl' => $uploaded_data['file_name']
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
	public function downskl($nis)
	{
		$file = $this->model->getFile($nis)->row();
		force_download('../psb/assets/berkas/' . $file->skl, NULL);
		redirect('berkas/detail/' . $nis);
	}

	public function uploadijazah()
	{
		$nis = $this->input->post('nis', true);
		$lama = $this->input->post('file_lama', true);

		$config['upload_path']          = FCPATH . '../psb/assets/berkas/';
		$config['allowed_types']        = 'jpg|jpeg|png|pdf';
		$config['file_name']            = 'ijazah-' . $nis;
		$config['overwrite']            = true;
		$config['max_size']             = 0;

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('berkas')) {
			$data['error'] = $this->upload->display_errors();
		} else {
			if (file_exists('../psb/assets/berkas/' . $lama)) {
				unlink('../psb/assets/berkas/' . $lama);
			}
			$uploaded_data = $this->upload->data();
			$new_data = [
				'ijazah' => $uploaded_data['file_name']
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
	public function downijazah($nis)
	{
		$file = $this->model->getFile($nis)->row();
		force_download('../psb/assets/berkas/' . $file->ijazah, NULL);
		redirect('berkas/detail/' . $nis);
	}
}