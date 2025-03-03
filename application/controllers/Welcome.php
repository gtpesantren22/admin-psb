<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('BundaModel', 'model');
		$this->load->model('Auth_model');

		$user = $this->Auth_model->current_user();

		if (!$this->Auth_model->current_user() || $user->level != 'bunda' && $user->level != 'admin') {
			redirect('login/logout');
		}
	}

	public function index()
	{
		$data['judul'] = 'home';
		$data['user'] = $this->Auth_model->current_user();
		$data['bpSum'] = $this->model->bpSum()->row();
		$data['bpCount'] = $this->model->bpCount()->num_rows();

		$data['registSum'] = $this->model->registSum()->row();
		$data['registCount'] = $this->model->registCount()->num_rows();

		$data['santriCount'] = $this->model->santriCount()->num_rows();
		$data['veris'] = $this->model->veris()->num_rows();

		$data['bpDes22'] = $this->model->sumBpBy(12, 2023)->row();
		$data['bpJan'] = $this->model->sumBpBy(1, 2024)->row();
		$data['bpFeb'] = $this->model->sumBpBy(2, 2024)->row();
		$data['bpMar'] = $this->model->sumBpBy(3, 2024)->row();
		$data['bpApr'] = $this->model->sumBpBy(4, 2024)->row();
		$data['bpMei'] = $this->model->sumBpBy(5, 2024)->row();
		$data['bpJun'] = $this->model->sumBpBy(6, 2024)->row();
		$data['bpJul'] = $this->model->sumBpBy(7, 2024)->row();
		$data['bpAgs'] = $this->model->sumBpBy(8, 2024)->row();
		$data['bpSep'] = $this->model->sumBpBy(9, 2024)->row();
		$data['bpOkt'] = $this->model->sumBpBy(10, 2024)->row();
		$data['bpNov'] = $this->model->sumBpBy(11, 2024)->row();
		$data['bpDes'] = $this->model->sumBpBy(12, 2024)->row();

		$data['rgDes22'] = $this->model->sumRgBy(12, 2023)->row();
		$data['rgJan'] = $this->model->sumRgBy(1, 2024)->row();
		$data['rgFeb'] = $this->model->sumRgBy(2, 2024)->row();
		$data['rgMar'] = $this->model->sumRgBy(3, 2024)->row();
		$data['rgApr'] = $this->model->sumRgBy(4, 2024)->row();
		$data['rgMei'] = $this->model->sumRgBy(5, 2024)->row();
		$data['rgJun'] = $this->model->sumRgBy(6, 2024)->row();
		$data['rgJul'] = $this->model->sumRgBy(7, 2024)->row();
		$data['rgAgs'] = $this->model->sumRgBy(8, 2024)->row();
		$data['rgSep'] = $this->model->sumRgBy(9, 2024)->row();
		$data['rgOkt'] = $this->model->sumRgBy(10, 2024)->row();
		$data['rgNov'] = $this->model->sumRgBy(11, 2024)->row();
		$data['rgDes'] = $this->model->sumRgBy(12, 2024)->row();
		$data['anggaran'] = $this->db->query("SELECT a.nama, a.pagu, SUM(b.qty*b.harga_satuan) AS pakai FROM jabatan a LEFT JOIN pengajuan_detail b ON a.kode=b.bidang GROUP BY a.kode ")->result();

		$this->load->view('bunda/head', $data);
		$this->load->view('bunda/index', $data);
		$this->load->view('bunda/foot', $data);
	}
}
