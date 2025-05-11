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
		$data['santri'] = $this->model->santri()->result();

		$this->load->view('adm/head', $data);
		$this->load->view('adm/info', $data);
		$this->load->view('adm/foot');
	}

	public function add()
	{
		$user = $this->Auth_model->current_user();
		$data = [
			'judul'  => $this->input->post('judul', true),
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
			'judul'  => $this->input->post('judul', true),
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

	public function infoBerkas()
	{
		$key = $this->model->apiKey()->row();
		$data = $this->model->dataVeris()->result();
		$tmp = array(array('url' => 'https://psb.ppdwk.com/login', 'text' => 'Klik disini untuk Login'));
		foreach ($data as $row) {
			$pesan = '
Assalamualaikum, Wr. Wb

Kami dari panitia Penerimaan Santri Baru 2023 Pondok Pesantren Darul Lughah Wal Karomah, ingin menginformasikan kembali kepada bpk/ibu wali santri baru bahwasanya untuk *Segera Lengkapi Upload Scan/Foto berkas-berkas persayaratan Santri Baru, dengan Login di akun user (klik link dibawah) menggunakan akun yang sudah diterima melalui pesan WA, pada saat melakukan pembayaran pendaftaran*

Terimakasih.

_*Catatan : Bagi Wali santri yang sudah melengkapi berkas, harap mengabaikan pesan ini.*_';

			kirim_tmp($key->api_key, $row->hp, $pesan, $tmp, 'https://i.postimg.cc/8c8fghZq/LOGO-WA.jpg');
		}

		redirect('import');
	}

	public function kirim()
	{
		$no = $this->input->post('hp');
		$isi = $this->input->post('isi', true);
		$key = $this->model->apiKey()->row();
		// $data = [
		// 	'hp' => $no,
		// 	'isi' => $isi
		// ];
		// echo '<pre>';
		// var_dump($data);
		// echo '</pre>';
		foreach ($no as $nohp) {
			kirim_person($key->api_key, '085236924510', $isi . '_' . time() . '_' . $nohp);
		}
	}
}
