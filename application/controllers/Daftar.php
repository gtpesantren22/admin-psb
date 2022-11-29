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
		$data['bp'] = $this->model->getBpNis($nis)->row();
		$data['judul'] = 'daftar';
		$this->load->view('bunda/head', $data);
		$this->load->view('bunda/daftarAdd', $data);
		$this->load->view('bunda/foot');
	}

	public function saveAdd()
	{
		$nis = $this->input->post('nis', true);
		$id_bayar = $this->input->post('id_bayar', true);

		$tangg = preg_replace("/[^0-9]/", "", $this->input->post('tangg', true));
		$nominal = preg_replace("/[^0-9]/", "", $this->input->post('nominal', true));

		$cek = $this->model->santriNis($nis)->row();
		$rdrc = $cek->ket === 'baru' ? 'daftar' : 'daftar/lanjut';
		$pass = rand(0, 999999);
		$passOk = password_hash($pass, PASSWORD_BCRYPT);

		$sn = $this->model->santriNis($nis)->row();
		$key = $this->model->apiKey()->row();

		$pesan = '*Informasi Akun Santri*

Akun ini digunakan untuk melakukan login ke halaman santri yang sudah mendaftar untuk melengkapi data dan berkas-berkasnya.
Harap untuk menyimpan baik-baik akun ini.

Nama : ' . $sn->nama . '
Alamat : ' . $sn->desa . '-' . $sn->kec . '-' . $sn->kab . '
Lembaga tujuan : ' . $sn->lembaga . '
Usename : *' . $sn->username . '*
Password : *' . $pass . '*

silahkan login di *https://psb.ppdwk.com/login*
Terimaksih';

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
			kirim_person($key->api_key, $sn->hp, $pesan);
			if ($this->db->affected_rows() > 0) {
				$this->kirim($id_bayar);
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

		if ($sn->gel === '1') {
			$link = 'https://chat.whatsapp.com/L8O3TgvrpLVFqMejIMoIF3';
			$jadwal = 'Penyerahan berkas dan Tes : 26-28 February 2022';
		} else if ($sn->gel === '2') {
			$link = 'https://chat.whatsapp.com/Er4uy1eXYAg1PoOTZ9lnCp';
			$jadwal = 'Penyerahan berkas dan Tes : 26-28 Maret 2022';
		} else if ($sn->gel === '3') {
			$link = 'https://chat.whatsapp.com/FA5KGjmYmrxCGSdg1j7BPD';
			$jadwal = 'Penyerahan berkas dan Tes : 28-30 Mei 2022';
		}

		$pesan = '*Terimakasih*

*Kode Pembayaran : ' . strtoupper($id) . '*
Pembayaran Pendaftaran, atas :
        
Nama : ' . $sn->nama . '
Alamat : ' . $sn->desa . '-' . $sn->kec . '-' . $sn->kab . '
Lembaga tujuan : ' . $sn->lembaga . '
Nominal : ' . rupiah($sn->nominal) . '
Tgl Bayar : ' . $sn->tgl_bayar .
			'
        
*telah TERVERIFIKASI.*
selanjutnya, Silahkan bergabung Group WA Santri baru dengan klik link dibawah, untuk mengetahui informasi test pendaftaran santri baru dan Informasi Lainnya.

*' . $link . '*
_*Link diatas hanya untuk santri baru*_
        
_*NB : Calon Santri diwajibkan memakai baju putih songkok/kerudung hitam dan Bawahan hitam/gelap (Ketika tes dan berangkat mondok)*_

*dengan membawa berkas dibawah ini :*
- Foto Copy Kartu Keluarga 4 lembar
- Foto Copy Akta Kelahiran 4 lembar
- Foto Copy IJAZAH dilegalisir ( Menyusul ) 4 lembar
';

		kirim_person($key->api_key, $sn->hp, $pesan);
		redirect('daftar');
	}

}
