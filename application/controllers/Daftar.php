<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Daftar extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('DaftarModel', 'model');
	}

	public function index()
	{
		$data['baru'] = $this->model->baru()->result();
		$data['nobp'] = $this->model->noBp()->result();
		$data['judul'] = 'daftar';
		$this->load->view('bunda/head', $data);
		$this->load->view('bunda/daftar', $data);
		$this->load->view('bunda/foot');
	}

	public function addDaftar($nis)
	{
		$data = [
			'id_bayar' => $this->uuid->v4(),
			'nis' => $nis,
			'via' => 'Cash',
			'nominal' => 0
		];
		$this->model->tambah($data);

		if ($this->db->affected_rows() > 0) {
			redirect('daftar/inDaftar/' . $nis);
		} else {
			redirect('daftar/inDaftar/' . $nis);
		}
	}

	public function inDaftar($nis)
	{
		$data['santri'] = $this->model->santriNis($nis)->row();
		$data['judul'] = 'daftar';
		$this->load->view('bunda/head', $data);
		$this->load->view('bunda/daftarAdd', $data);
		$this->load->view('bunda/foot');
	}

	public function saveAdd()
	{
		$nis = $this->input->post('nis', true);
		$tangg = preg_replace("/[^0-9]/", "", $this->input->post('tangg', true));
		$nominal = preg_replace("/[^0-9]/", "", $this->input->post('nominal', true));

		$cek = $this->model->santriNis($nis)->row();
		$rdrc = $cek->ket === 'baru' ? 'daftar' : 'daftar/lanjut';
		$pass = rand(0, 999999);
		$passOk = password_hash($pass, PASSWORD_BCRYPT);

		$data = [
			'nominal' => $nominal,
			'tgl_bayar' => $this->input->post('tgl_bayar', true),
			'created' => date('Y-m-d H:i'),
			'via' => $this->input->post('via', true)
		];

		$data2 = [
			'password' => $passOk,
			'stts' => 'Terverifikasi'
		];

		if ($nominal > $tangg) {
			$this->session->set_flashdata('error', 'Maaf. Pembayaran Melebihi');
			redirect('daftar/inDaftar/' . $nis);
		} else {
			$this->model->edit('bp_daftar', $data, $nis);
			$this->model->edit('tb_santri', $data2, $nis);
			if ($this->db->affected_rows() > 0) {
				redirect($rdrc);
			}
		}
	}

	public function lanjut()
	{
		$data['baru'] = $this->model->lama()->result();
		$data['nobp'] = $this->model->noBpLama()->result();
		$data['judul'] = 'daftar';

		$this->load->view('bunda/head', $data);
		$this->load->view('bunda/daftarLama', $data);
		$this->load->view('bunda/foot');
	}

	public function del($id)
	{
		$this->model->hapus('bp_daftar', $id);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('ok', 'Data berhasil dihapus');
			redirect('daftar');
		} else {
			$this->session->set_flashdata('error', 'Data tak berhasil dihapus');
			redirect('daftar');
		}
	}

	public function kirim($id)
	{
		$sn = $this->model->getId($id)->row();
		$key = $this->model->apiKey()->row();

		$pesan = '*Terimakasih*

*Kode Pembayaran : ' . strtoupper($id) . '*
Pembayaran Pendaftaran, atas :
        
Nama : ' . $sn->nama . '
Alamat : ' . $sn->desa . '-' . $sn->kec . '-' . $sn->kab . '
Lembaga tujuan : ' . $sn->lembaga . '
Nominal : ' . rupiah($sn->nominal) . '
Tgl Bayar : ' . $sn->tgl_bayar . '
        
*telah TERVERIFIKASI.*
selanjutnya, Silahkan bergabung Group WA Santri baru dengan klik link dibawah, untuk mengetahui informasi test pendaftaran santri baru dan Informasi Lainnya.';

		kirim_person($key->api_key, $sn->hp, $pesan);
		redirect('daftar');
	}
}