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
		if (!$this->Auth_model->current_user() || ($user->level != 'admin' && $user->level != 'bunda')) {
			redirect('login/logout');
		}

		$this->bearer = $this->model->getBy('api', 'url', 'bearer')->row('api_key');
	}

	public function index()
	{
		$data['judul'] = 'santri';
		$data['jenis'] = 'pusat';
		$data['user'] = $this->Auth_model->current_user();

		$url = 'https://data.ppdwk.com/api/datatables?data=pendaftar&page=1&per_page=300&q=&sortby=created_at&sortbydesc=DESC&status=1';
		$token = $this->bearer;
		$datas = [];
		$response = aksesEndpoint(
			$url,
			$token,
			$datas
		);
		$result = [];
		if ($response) {
			foreach ($response['data']['data'] as $item) {
				$id = $item['peserta_didik_id'];
				$cek = $this->db->query("SELECT nis FROM tb_santri WHERE id_santri = '$id' ")->row();

				if ($item['lembaga']['nama'] != 'MI DARUL LUGHAH WAL KAROMAH' && $item['lembaga']['nama'] != 'RA DARUL LUGHAH WAL KAROMAH' && $item['pd_lama'] == null) {

					$result[] = [
						'id_santri' => $id,
						'nama' => $item['nama'],
						'nis' => $item['nis'],
						'jkl' => $item['jenis_kelamin'],
						'gel' => $item['gelombang'],
						'hp' => $item['whatsapp'],
						'desa' => $item['wilayah']['nama'],
						'kec' => $item['wilayah']['parrent_recursive']['nama'],
						'kab' => $item['wilayah']['parrent_recursive']['parrent_recursive']['nama'],
						'lembaga' => $item['lembaga']['nama'],
						'verval' => $cek ? 'Terverifikasi' : 'Belum Terverifikasi',
					];
				}
			}
		} else {
			echo "Gagal mengakses endpoint";
		}
		$data['baru'] = $result;

		$this->load->view('bunda/head', $data);
		$this->load->view('bunda/baru', $data);
		$this->load->view('bunda/foot');
	}

	public function lanjut()
	{
		$data['judul'] = 'santri';
		$data['user'] = $this->Auth_model->current_user();
		$data['jenis'] = 'pusat';

		$url = 'https://data.ppdwk.com/api/datatables?data=pendaftar&page=1&per_page=300&q=&sortby=created_at&sortbydesc=DESC&status=1';
		$token = $this->bearer;
		$datas = [];
		$response = aksesEndpoint(
			$url,
			$token,
			$datas
		);
		$result = [];
		if ($response) {
			foreach ($response['data']['data'] as $item) {
				$id = $item['peserta_didik_id'];
				$cek = $this->db->query("SELECT nis FROM tb_santri WHERE id_santri = '$id' ")->row();

				if ($item['lembaga']['nama'] != 'MI DARUL LUGHAH WAL KAROMAH' && $item['lembaga']['nama'] != 'RA DARUL LUGHAH WAL KAROMAH' && $item['pd_lama'] != null) {

					$result[] = [
						'id_santri' => $id,
						'nama' => $item['nama'],
						'nis' => $item['nis'],
						'jkl' => $item['jenis_kelamin'],
						'gel' => $item['gelombang'],
						'hp' => $item['whatsapp'],
						'desa' => $item['wilayah']['nama'],
						'kec' => $item['wilayah']['parrent_recursive']['nama'],
						'kab' => $item['wilayah']['parrent_recursive']['parrent_recursive']['nama'],
						'lembaga' => $item['lembaga']['nama'],
						'verval' => $cek ? 'Terverifikasi' : 'Belum Terverifikasi',
					];
				}
			}
		} else {
			echo "Gagal mengakses endpoint";
		}
		$data['baru'] = $result;

		$this->load->view('bunda/head', $data);
		$this->load->view('bunda/lama', $data);
		$this->load->view('bunda/foot');
	}

	public function baruLoc()
	{
		$data['judul'] = 'santri';
		$data['jenis'] = 'local';
		$data['user'] = $this->Auth_model->current_user();
		$result = $this->model->baru()->result_array();
		$data['baru'] = $result;

		$this->load->view('bunda/head', $data);
		$this->load->view('bunda/baru', $data);
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
		$dirTuju = '../../dpontren/images/santri/' . $foto->diri;


		// if ($this->copyOnlineFile($dirLama, $dirTuju)) {
		// 	$fotoHasil = $foto->diri;
		// } else {
		// 	$fotoHasil = '';
		// }

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
			'foto' => '',
			'ket' => '-',
			'aktif' => 'Y',
		];

		// echo $dirLama . "<br>";
		// echo $dirTuju . "<br>";
		// echo $fotoHasil;

		if ($cekData) {
			$this->model->updateToDb2('tb_santri', $data, 'nis', $nis);
			if ($this->db->affected_rows() > 0) {
				redirect('santri/kirim');
			}
		} else {
			$this->model->inputToDb2('tb_santri', $data);
			if ($this->db->affected_rows() > 0) {
				redirect('santri/kirim');
			}
		}
	}

	public function renew($id)
	{
		$url = 'https://data.ppdwk.com/api/psb/show/' . $id;
		$token = $this->bearer;
		$dataKirim = [];
		$response = aksesEndpoint($url, $token, $dataKirim);
		$detSantri = $this->db->query("SELECT * FROM tb_santri WHERE id_santri = '$id'")->row();
		$redirect = $detSantri->ket == 'baru' ? 'santri/baruLoc' : 'santri/lamaLoc';
		if ($response) {
			$nis = $response['nis'];
			$nik = $response['nik'];
			$no_kk = $response['no_kk'];
			$nama = $response['nama'];
			$desa = $response['wilayah']['nama'];
			$kec = $response['wilayah']['parrent_recursive']['nama'];
			$kab = $response['wilayah']['parrent_recursive']['parrent_recursive']['nama'];
			$lemvaga = $response['lembaga']['nama'];
			$jkl = $response['jenis_kelamin'] == 'L' ? 'Laki-laki' : 'Perempuan';
			$tempat = $response['tempat_lahir'];
			$tanggal = $response['tanggal_lahir'];
			$bapak = $response['nama_ayah'];
			$ibu = $response['nama_ibu'];
			$jalur = $response['jalur'] == 0 ? 'Reguler' : 'Prestasi';
			$whatsapp = $response['whatsapp'];
			$anak_ke = $response['anak_ke'];
			$jml_sdr = $response['jml_sdr'];
			$waktu_daftar = $response['created_at'];

			$dataSantri = [
				'nis' => $nis,
				'nik' => $nik,
				'no_kk' => $no_kk,
				'nama' => $nama,
				'desa' => $desa,
				'kec' => $kec,
				'kab' => $kab,
				'lembaga' => $lemvaga,
				'jkl' => $jkl,
				'tempat' => $tempat,
				'tanggal' => $tanggal,
				'bapak' => $bapak,
				'ibu' => $ibu,
				'jalur' => $jalur,
				'hp' => $whatsapp,
				'anak_ke' => $anak_ke,
				'jml_sdr' => $jml_sdr,
				'waktu_daftar' => $waktu_daftar
			];

			// var_dump($dataSantri);
			$this->model->edit2('tb_santri', $dataSantri, 'id_santri', $id);
			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('ok', 'Update data berhasil');
				redirect($redirect);
			} else {
				redirect($redirect);
			}
		} else {
			echo "data tidak ditemukan";
		}
	}
}
