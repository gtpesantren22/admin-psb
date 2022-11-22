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

		$this->load->view('bunda/head');
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

		$this->load->view('bunda/head');
		$this->load->view('bunda/daftarAdd', $data);
		$this->load->view('bunda/foot');
	}

	public function lanjut()
	{
		$data['baru'] = $this->model->lama()->result();

		$this->load->view('bunda/head');
		$this->load->view('bunda/lama', $data);
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