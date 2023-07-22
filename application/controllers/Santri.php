<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Santri extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('SantriModel', 'model');
		$this->load->model('Auth_model');

		$user = $this->Auth_model->current_user();
		if (!$this->Auth_model->current_user() || $user->level != 'admin' && $user->level != 'bunda') {
			redirect('login/logout');
		}
	}

	public function index()
	{
		$data['baru'] = $this->model->baru()->result();
		$data['judul'] = 'santri';
		$data['user'] = $this->Auth_model->current_user();

		$this->load->view('bunda/head', $data);
		$this->load->view('bunda/baru', $data);
		$this->load->view('bunda/foot');
	}

	public function lanjut()
	{
		$data['baru'] = $this->model->lama()->result();
		$data['judul'] = 'santri';
		$data['user'] = $this->Auth_model->current_user();

		$this->load->view('bunda/head', $data);
		$this->load->view('bunda/lama', $data);
		$this->load->view('bunda/foot');
	}

	public function kirim()
	{
		$data['judul'] = 'export';
		$data['user'] = $this->Auth_model->current_user();
		$data['dataHasil'] = $this->db->query("SELECT * FROM tb_santri JOIN fix_data ON tb_santri.nis=fix_data.nis ")->result();
		foreach ($data['dataHasil'] as $key) {
			$data['cekData'] = $this->model->cekNisDb2($key->nis)->row();
		}

		$this->load->view('adm/head', $data);
		$this->load->view('adm/kirim', $data);
		$this->load->view('adm/foot');
	}

	function copyOnlineFile($url_sumber_foto, $tujuan_file)
	{
		$ch = curl_init($url_sumber_foto);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$foto_data = curl_exec($ch);
		curl_close($ch);

		if ($foto_data !== false) {
			$ch_tujuan = curl_init($tujuan_file);
			curl_setopt($ch_tujuan, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch_tujuan, CURLOPT_POSTFIELDS, $foto_data);
			$response_tujuan = curl_exec($ch_tujuan);
			curl_close($ch_tujuan);

			if ($response_tujuan !== false) {
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}

	public function send($nis)
	{
		$cekData = $this->model->cekNisDb2($nis)->row();

		$santri = $this->model->getBy('tb_santri', 'nis', $nis)->row();
		$dekos = $this->model->getBy('dekos', 'nis', $nis)->row();
		$foto = $this->model->getBy('foto_file', 'nis', $nis)->row();

		$dirLama = 'https://psb.ppdwk.com/assets/berkas/' . $foto->diri;
		$dirTuju = 'https://dpontren.ppdwk.com/images/santri/' . $foto->diri;


		if ($this->copyOnlineFile($dirLama, $dirTuju)) {
			$fotoHasil = $foto->diri;
		} else {
			$fotoHasil = '';
		}

		$data = [
			'nis' => $santri->nis,
			'nisn' => $santri->nisn,
			'nik' => $santri->nik,
			'no_kk' => $santri->no_kk,
			'nama' => $santri->nama,
			'tempat' => $santri->tempat,
			'tanggal' => $santri->tanggal,
			'jkl' => $santri->jkl,
			'jln' => $santri->jln,
			'rt' => $santri->rt,
			'rw' => $santri->rw,
			'kd_pos' => $santri->kd_pos,
			'desa' => $santri->desa,
			'kec' => $santri->kec,
			'kab' => $santri->kab,
			'prov' => $santri->prov,
			't_formal' => $santri->lembaga,
			'anak_ke' => $santri->anak_ke,
			'jml_sdr' => $santri->jml_sdr,
			'bapak' => $santri->bapak,
			'nik_a' => $santri->a_nik,
			'tempat_a' => $santri->a_tempat,
			'tanggal_a' => $santri->a_tanggal,
			'pend_a' => $santri->a_pend,
			'pkj_a' => $santri->a_pkj,
			'status_a' => $santri->a_stts,
			'ibu' => $santri->ibu,
			'nik_i' => $santri->i_nik,
			'tempat_i' => $santri->i_tempat,
			'tanggal_i' => $santri->i_tanggal,
			'pend_i' => $santri->i_pend,
			'pkj_i' => $santri->i_pkj,
			'status_i' => $santri->i_stts,
			'hp' => $santri->hp,
			't_kos' => $dekos->t_kos,
			'foto' => $fotoHasil,
			'ket' => '-',
			'aktif' => 'Y',
		];

		echo $dirLama . "<br>";
		echo $dirTuju . "<br>";
		echo $fotoHasil;

		// if ($cekData) {
		// 	$this->model->updateToDb2('tb_santri', $data, 'nis', $nis);
		// 	if ($this->db->affected_rows() > 0) {
		// 		redirect('santri/kirim');
		// 	}
		// } else {
		// 	$this->model->inputToDb2('tb_santri', $data);
		// 	if ($this->db->affected_rows() > 0) {
		// 		redirect('santri/kirim');
		// 	}
		// }
	}
}
