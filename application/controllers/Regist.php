<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Regist extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('RegistModel', 'model');
	}

	public function index()
	{
		$data['baru'] = $this->model->baru()->result();
		$data['nobp'] = $this->model->noBp()->result();

		$data['judul'] = 'regist';
		$this->load->view('bunda/head', $data);
		$this->load->view('bunda/regist', $data);
		$this->load->view('bunda/foot');
	}

	public function addDaftar($nis)
	{
		$data = [
			'id_tgn' => $this->uuid->v4(),
			'nis' => $nis
		];
		$this->model->tambah('tanggungan', $data);

		if ($this->db->affected_rows() > 0) {
			redirect('regist/inDaftar/' . $nis);
		} else {
			redirect('regist');
		}
	}

	public function inDaftar($nis)
	{
		$data['judul'] = 'regist';
		$data['santri'] = $this->model->santriNis($nis)->row();
		$data['tgn'] = $this->model->tgnNis($nis)->row();
		$data['byr'] = $this->model->byr($nis);
		$data['byrSum'] = $this->model->byrSum($nis);

		$this->load->view('bunda/head', $data);
		$this->load->view('bunda/registAdd', $data);
		$this->load->view('bunda/foot');
	}

	public function tgnEdit($nis)
	{
		$ket = $this->model->santriNis($nis)->row('ket');
		$jkl = $this->model->santriNis($nis)->row('jkl');

		$biaya = $this->model->getTgn($jkl, $ket)->row();
		$data = [
			'infaq' => $biaya->infaq,
			'buku' => $biaya->buku,
			'kartu' => $biaya->kartu,
			'kalender' => $biaya->kalender,
			'seragam_pes' => $biaya->seragam_pes,
			'seragam_lem' => $biaya->seragam_lem,
			'orsaba' => $biaya->orsaba
		];

		$this->model->edit('tanggungan', $data, $nis);
		if ($this->db->affected_rows() > 0) {
			redirect('regist/inDaftar/' . $nis);
		} else {
			redirect('regist/inDaftar/' . $nis);
		}
	}

	public function tgnEdit2()
	{
		$nis = $this->input->post('nis', true);

		$data = [
			'infaq' => rmRp($this->input->post('infaq', true)),
			'buku' => rmRp($this->input->post('buku', true)),
			'kartu' => rmRp($this->input->post('kartu', true)),
			'kalender' => rmRp($this->input->post('kalender', true)),
			'seragam_pes' => rmRp($this->input->post('seragam_pes', true)),
			'seragam_lem' => rmRp($this->input->post('seragam_lem', true)),
			'orsaba' => rmRp($this->input->post('orsaba', true))
		];
		$this->model->edit('tanggungan', $data, $nis);
		if ($this->db->affected_rows() > 0) {
			redirect('regist/inDaftar/' . $nis);
		} else {
			redirect('regist/inDaftar/' . $nis);
		}
	}

	public function saveAdd()
	{
		$nis  = $this->input->post('nis', true);
		$nominal = rmRp($this->input->post('nominal', true));
		$dataTgn = $this->model->tgnNis($nis)->row();
		$tangg = $dataTgn->infaq + $dataTgn->buku + $dataTgn->kartu + $dataTgn->kalender + $dataTgn->seragam_pes + $dataTgn->seragam_lem + $dataTgn->orsaba;
		$byr = $this->model->byrSum($nis)->row('nominal') + $nominal;
		$id = $this->uuid->v4();

		$data = [
			'id_regist' => $id,
			'nis' => $nis,
			'nominal' => $nominal,
			'tgl_bayar' => $this->input->post('tgl_bayar', true),
			'created' => date('Y-m-d H:i'),
			'via' => $this->input->post('via', true)
		];

		if ($byr > $tangg) {
			$this->session->set_flashdata('error', 'Maaf. Pembayaran Anda Melebihi');
			redirect('regist/inDaftar/' . $nis);
		} else {

			$this->model->tambah('regist', $data);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('ok', 'Pembayaran Berhasil Ditambahkan');
				$this->pesan($id);
				redirect('regist/inDaftar/' . $nis);
			} else {
				redirect('regist/inDaftar/' . $nis);
			}
		}
	}

	public function editAdd()
	{
		$nis  = $this->input->post('nis', true);
		$id_regist  = $this->input->post('id_regist', true);
		$data = [
			'nominal' => rmRp($this->input->post('nominal', true)),
			'tgl_bayar' => $this->input->post('tgl_bayar', true),
			'via' => $this->input->post('via', true)
		];


		$this->model->edit2('regist', $data, $id_regist);
		if ($this->db->affected_rows() > 0) {
			redirect('regist/inDaftar/' . $nis);
		} else {
			redirect('regist/inDaftar/' . $nis);
		}
	}


	public function lanjut()
	{
		$data['baru'] = $this->model->lama()->result();
		$data['nobp'] = $this->model->noBpLama()->result();
		$data['judul'] = 'regist';

		$this->load->view('bunda/head', $data);
		$this->load->view('bunda/daftarLama', $data);
		$this->load->view('bunda/foot');
	}

	public function del($id)
	{
		$data = $this->model->getId($id)->row();
		$nis = $data->nis;

		$this->model->hapus('regist', $id);

		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('ok', 'Data berhasil dihapus');
			redirect('regist/inDaftar/' . $nis);
		} else {
			$this->session->set_flashdata('error', 'Data tak berhasil dihapus');
			redirect('regist/inDaftar/' . $nis);
		}
	}

	public function pesan($id)
	{
		$key = $this->model->apiKey()->row();

		$data = $this->model->getId($id)->row();
		$nis = $data->nis;
		$tgn = $this->model->tgnNis($nis)->row();
		$byr = $this->model->byrSum($nis)->row();

		$ttg = $tgn->infaq + $tgn->buku + $tgn->kartu + $tgn->kalender + $tgn->seragam_pes + $tgn->seragam_lem + $tgn->orsaba;

		if ($data->gel === '1') {
			$link = 'https://chat.whatsapp.com/L8O3TgvrpLVFqMejIMoIF3';
			$jadwal = 'Penyerahan berkas dan Tes : 26-28 February 2022';
		} else if ($data->gel === '2') {
			$link = 'https://chat.whatsapp.com/Er4uy1eXYAg1PoOTZ9lnCp';
			$jadwal = 'Penyerahan berkas dan Tes : 26-28 Maret 2022';
		} else if ($data->gel === '3') {
			$link = 'https://chat.whatsapp.com/FA5KGjmYmrxCGSdg1j7BPD';
			$jadwal = 'Penyerahan berkas dan Tes : 28-30 Mei 2022';
		}

		$pesan = '*Terimakasih*

*Kode Pembayaran : ' . strtoupper($id) . '*
Pembayaran Pendaftaran, atas :
        
Nama : ' . $data->nama . '
Alamat : ' . $data->desa . '-' . $data->kec . '-' . $data->kab . '
Lembaga tujuan : ' . $data->lembaga . '
Nominal : ' . rupiah($data->nominal) . '
waktu bayar : ' . $data->created . '
Penerima : ' . $data->kasir . '

*telah TEREGISTRASI*
selanjutnya, Silahkan bergabung Group WA Santri baru dengan klik link dibawah, untuk mengetahui informasi test pendaftaran santri baru dan Informasi Lainnya.

*' . $link . '*
_*Link diatas hanya untuk santri baru*_

*Jumlah Tanggungan : ' . rupiah($ttg) . '*
*Sudah Bayar : ' . rupiah($byr->nominal) . '*
*Kekurangan  : ' . rupiah($ttg - $byr->nominal) . '*
        
_*Catatan :_*
	_*- Calon Santri diwajibkan memakai baju putih songkok/kerudung hitam, bawahan Hitam atau gelap pada saat tes*_
	_*- Pesan ini sebgai bukti pembayaran yang sah (Harus dari WA Bendahara PSB)*_';

		kirim_person($key->api_key, $data->hp, $pesan);
		redirect('regist/inDaftar/' . $nis);
	}
}