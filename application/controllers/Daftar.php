<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Daftar extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('DaftarModel', 'model');
		$this->load->model('Auth_model');

		$user = $this->Auth_model->current_user();

		if (!$this->Auth_model->current_user() || $user->level != 'bunda' && $user->level != 'admin') {
			redirect('login/logout');
		}
	}

	public function index()
	{
		$data['baru'] = $this->model->baru()->result();
		$data['nobp'] = $this->model->noBp()->result();
		$data['judul'] = 'daftar';
		$data['user'] = $this->Auth_model->current_user();

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
		$data['user'] = $this->Auth_model->current_user();

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
		$pass = generateRandomString(5);
		$passOk = password_hash($pass, PASSWORD_BCRYPT);
		$tgl_bayar = $this->input->post('tgl_bayar', true);

		$sn = $this->model->santriNis($nis)->row();
		$key = $this->model->apiKey()->row();


		$pesan2 = '*Terimakasih*

*Kode Pendaftaran : ' . ($nis) . '*
Pembayaran Pendaftaran, atas :
        
Nama : ' . $sn->nama . '
Alamat : ' . $sn->desa . '-' . $sn->kec . '-' . $sn->kab . '
Lembaga tujuan : ' . $sn->lembaga . '
Nominal : ' . rupiah($nominal) . '
Tgl Bayar : ' . $tgl_bayar . '
        
*telah TERVERIFIKASI.*
________________________________

*Informasi Akun Santri*

*SIMPANLAH USER DAN PASSWORD BERIKUT !!!*
Silahkan login ke https://psb.ppdwk.com/login untuk melengkapi data dan scan berkas calon santri baru serta informasi lainnya. 

Usename : *' . $sn->username . '*
Password : *' . $pass . '*
        
_*NB : Calon Santri diwajibkan memakai baju putih songkok/kerudung hitam dan Bawahan hitam/gelap (Ketika tes dan berangkat mondok)*_

*dengan membawa berkas dibawah ini :*
- Foto Copy Kartu Keluarga 4 lembar
- Foto Copy Akta Kelahiran 4 lembar
- Foto Copy IJAZAH dilegalisir ( Menyusul ) 4 lembar';

		$data = [
			'id_bayar' => $this->uuid->v4(),
			'nis' => $nis,
			'nominal' => $nominal,
			'tgl_bayar' => $tgl_bayar,
			'created' => date('Y-m-d H:i'),
			'kasir' => $this->input->post('kasir', true),
			'via' => $this->input->post('via', true)
		];

		$data2 = [
			'password' => $passOk,
			'stts' => 'Terverifikasi'
		];

		$listPh = [$sn->hp, $sn->hp];

		// var_dump($listPh);
		if ($nominal > $tangg) {
			$this->session->set_flashdata('error', 'Maaf. Pembayaran Melebihi');
			redirect('daftar/inDaftar/' . $nis);
		} else {
			$this->model->tambah2('bp_daftar', $data);
			$this->model->edit('tb_santri', $data2, $nis);
			if ($this->db->affected_rows() > 0) {
				kirim_person($key->api_key, $sn->hp, $pesan2);
				// addContact_to_group($key->api, $listPh, '6285236924510-1620187184@g.us');
				redirect($rdrc);
			}
		}
	}

	public function lanjut()
	{
		$data['baru'] = $this->model->lama()->result();
		$data['nobp'] = $this->model->noBpLama()->result();
		$data['judul'] = 'daftar';
		$data['user'] = $this->Auth_model->current_user();

		$this->load->view('bunda/head', $data);
		$this->load->view('bunda/daftarLama', $data);
		$this->load->view('bunda/foot');
	}

	public function del($id)
	{
		$data = $this->model->getBy('bp_daftar', 'id_bayar', $id)->row();
		$verv = ['stts' => 'Belum Terverifikasi'];

		$this->model->edit('tb_santri', $verv, $data->nis);
		$this->model->hapus('bp_daftar', $id);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('ok', 'Data berhasil dihapus');
			redirect('daftar');
		} else {
			$this->session->set_flashdata('error', 'Data tak berhasil dihapus');
			redirect('daftar');
		}
	}
	public function delSm($id)
	{
		$this->model->hapus('bp_daftar_sm', $id);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('ok', 'Data berhasil dihapus');
			redirect('daftar/sm');
		} else {
			$this->session->set_flashdata('error', 'Data tak berhasil dihapus');
			redirect('daftar/sm');
		}
	}

	public function kirim($id)
	{
		$sn = $this->model->getId($id)->row();
		$key = $this->model->apiKey()->row();

		if ($sn->gel === '1') {
			$link = 'https://chat.whatsapp.com/FxIUBMgNqIjAh2h7wAZjrU';
			$tmp = array(array('url' => 'https://chat.whatsapp.com/FxIUBMgNqIjAh2h7wAZjrU', 'text' => 'Klik disini untuk bergabung'));
			$jadwal = 'Penyerahan berkas dan Tes : 26-28 February 2022';
		} else if ($sn->gel === '2') {
			$link = 'https://chat.whatsapp.com/GAKAl21yWpJ7TXIaGem1HH';
			$tmp = array(array('url' => 'https://chat.whatsapp.com/GAKAl21yWpJ7TXIaGem1HH', 'text' => 'Klik disini untuk bergabung'));
			$jadwal = 'Penyerahan berkas dan Tes : 26-28 Maret 2022';
		} else if ($sn->gel === '3') {
			$link = 'https://chat.whatsapp.com/GQgMWD7JISW5NRqAWCcA4E';
			$tmp = array(array('url' => 'https://chat.whatsapp.com/GQgMWD7JISW5NRqAWCcA4E', 'text' => 'Klik disini untuk bergabung'));
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
_*Link diatas hanya untuk santri baru. Link ada dibagian paling bawah pesan ini*_
        
_*NB : Calon Santri diwajibkan memakai baju putih songkok/kerudung hitam dan Bawahan hitam/gelap (Ketika tes dan berangkat mondok)*_

*dengan membawa berkas dibawah ini :*
- Foto Copy Kartu Keluarga 4 lembar
- Foto Copy Akta Kelahiran 4 lembar
- Foto Copy IJAZAH dilegalisir ( Menyusul ) 4 lembar
';

		// kirim_person($key->api_key, $sn->hp, $pesan);
		kirim_tmp($key->api_key, $sn->hp, $pesan, $tmp, 'https://i.postimg.cc/8c8fghZq/LOGO-WA.jpg');
		redirect('daftar');
	}

	public function sm()
	{
		$data['judul'] = 'daftar';
		$data['smData'] = $this->model->smData()->result();
		$data['user'] = $this->Auth_model->current_user();

		$this->load->view('bunda/head', $data);
		$this->load->view('bunda/daftarSm', $data);
		$this->load->view('bunda/foot');
	}

	public function tarik($id)
	{
		$dataSm = $this->model->getBy('bp_daftar_sm', 'id_bayar', $id)->row();

		$data = [
			'id_bayar' => $this->uuid->v4(),
			'nis' => $dataSm->nis,
			'nominal' => $dataSm->nominal,
			'tgl_bayar' => $dataSm->tgl_bayar,
			'via' => $dataSm->via,
			'kasir' => $dataSm->kasir,
			'created' => $dataSm->created
		];

		$this->model->tambah2('bp_daftar', $data);
		if ($this->db->affected_rows() > 0) {
			$this->model->hapus('bp_daftar_sm', $dataSm->id_bayar);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('ok', 'Data berhasil dipindah');
				redirect('daftar/sm');
			} else {
				$this->session->set_flashdata('error', 'Data tak berhasil dipindah');
				redirect('daftar/sm');
			}
		}
	}

	public function verval()
	{
		$data['baru'] = $this->model->getJoin('tb_santri_sm', 'berkas_file', 'id_santri', 'id_file')->result();
		$data['judul'] = 'santri';
		$data['user'] = $this->Auth_model->current_user();

		$this->load->view('bunda/head', $data);
		$this->load->view('bunda/cekSantri', $data);
		$this->load->view('bunda/foot');
	}

	public function cek($nis)
	{
		$data['data'] = $this->model->getby('tb_santri_sm', 'id_santri', $nis)->row();
		$data['berkas'] = $this->model->getby('berkas_file', 'id_file', $nis)->row();
		$data['judul'] = 'santri';
		$data['user'] = $this->Auth_model->current_user();

		$this->load->view('bunda/head', $data);
		$this->load->view('bunda/detailSantri', $data);
		$this->load->view('bunda/foot');
	}

	public function vervalNota($id)
	{
		$santri = $this->model->getBy('tb_santri_sm', 'id_santri', $id)->row();
		$berkas = $this->model->getBy('berkas_file', 'id_file', $id)->row();
		$foto = $this->model->getBy('foto_file', 'id_file', $id)->row();
		$user = $this->Auth_model->current_user();

		$jk = $santri->jkl == 'Laki-laki' ? '1' : '2';
		$data = $this->db->query("SELECT max(substring(nis, 6)) as maxKode FROM tb_santri WHERE ket = 'baru' ")->row();
		$kodeBarang = $data->maxKode ? $data->maxKode : '00000000';
		$noUrut = (int) substr($kodeBarang, 0, 3);
		$noUrut++;
		$char = "2024";
		$kodeBarang = $char . $jk . sprintf("%03s", $noUrut);
		$nis = htmlspecialchars($kodeBarang);

		$kk = $nis . '-kk.' . pathinfo($berkas->kk, PATHINFO_EXTENSION);
		$akta = $nis . '-akta.' . pathinfo($berkas->akta, PATHINFO_EXTENSION);
		$ktp_ayah = $nis . '-ktp_ayah.' . pathinfo($berkas->ktp_ayah, PATHINFO_EXTENSION);
		$ktp_ibu = $nis . '-ktp_ibu.' . pathinfo($berkas->ktp_ibu, PATHINFO_EXTENSION);
		$bukti = $nis . '-bukti.' . pathinfo($berkas->bukti, PATHINFO_EXTENSION);
		$skl = $berkas->skl != '' ? $nis . '-skl.' . pathinfo($berkas->skl, PATHINFO_EXTENSION) : '';
		$kip = $berkas->kip != '' ? $nis . '-kip.' . pathinfo($berkas->kip, PATHINFO_EXTENSION) : '';
		$fotoDiri = $nis . '-foto.' . pathinfo($foto->diri, PATHINFO_EXTENSION);

		$dataBerkas = [
			'nis' => $nis,
			'kk' => $kk,
			'akta' => $akta,
			'ktp_ayah' => $ktp_ayah,
			'ktp_ibu' => $ktp_ibu,
			'skl' => $skl,
			'kip' => $kip,
			'bukti' => $bukti,
		];
		$fotoData = ['nis' => $nis, 'diri' => $fotoDiri];
		$seragam = ['nis' => $nis];
		$dtsantri = ['nis' => $nis];
		$bayar = [
			'id_bayar' => $id,
			'nis' => $nis,
			'nominal' => gel($santri->gel),
			'tgl_bayar' => date('Y-m-d'),
			'via' => 'Transfer',
			'kasir' => $user->nama,
			'created' => date('Y-m-d H:i:s'),
		];
	}
}
