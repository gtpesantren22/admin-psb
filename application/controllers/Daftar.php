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
		$this->bearer = $this->model->getBy('api', 'url', 'bearer')->row('api_key');
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

		$psnLnjut =
			'*Terimakasih*

*Kode Pendaftaran : ' . ($nis) . '*
Pembayaran Pendaftaran, atas :
        
Nama : ' . $sn->nama . '
Alamat : ' . $sn->desa . '-' . $sn->kec . '-' . $sn->kab . '
Lembaga tujuan : ' . $sn->lembaga . '
Nominal : ' . rupiah($nominal) . '
Tgl Bayar : ' . $tgl_bayar . '
        
*telah TERVERIFIKASI.*
________________________________

*Terimakasih';

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

		if ($sn->ket == 'baru') {
			$pesanOk = $pesan2;
		} else {
			$pesanOk = $psnLnjut;
		}

		// var_dump($listPh);
		if ($nominal > $tangg) {
			$this->session->set_flashdata('error', 'Maaf. Pembayaran Melebihi');
			redirect('daftar/inDaftar/' . $nis);
		} else {
			$this->model->tambah2('bp_daftar', $data);
			$this->model->edit('tb_santri', $data2, $nis);
			if ($this->db->affected_rows() > 0) {
				kirim_person($key->api_key, $sn->hp, $pesanOk);
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
- Foto Copy IJAZAH dilegalisir ( Menyusul ) 4 lembar';

		// kirim_person($key->api_key, $sn->hp, $pesan);
		kirim_tmp($key->api_key, $sn->hp, $pesan, $tmp, 'https://i.postimg.cc/8c8fghZq/LOGO-WA.jpg', '', '');
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
		// $data['baru'] = $this->model->getJoin('tb_santri_sm', 'berkas_file', 'id_santri', 'id_file')->result();
		$data['baru'] = $this->model->getByJoin('tb_santri_sm', 'berkas_file', 'id_santri', 'id_file', 'berkas_file.bukti !=', '')->result();
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
		// $berkas = $this->model->getBy('berkas_file', 'id_file', $id)->row();
		// $foto = $this->model->getBy('foto_file', 'id_file', $id)->row();
		$user = $this->Auth_model->current_user();
		$password = random(5);
		$key = $this->model->apiKey()->row();
		$linkImg = 'https://psb.ppdwk.com/viho/assets/images/logo/Logo-psb.png';

		$jk = $santri->jkl == 'Laki-laki' ? '1' : '2';
		$data = $this->db->query("SELECT max(substring(nis, 6)) as maxKode FROM tb_santri WHERE ket = 'baru' ")->row();
		$kodeBarang = $data->maxKode ? $data->maxKode : '00000000';
		$noUrut = (int) substr($kodeBarang, 0, 3);
		$noUrut++;
		$char = "2024";
		$kodeBarang = $char . $jk . sprintf("%03s", $noUrut);
		$nis = htmlspecialchars($kodeBarang);

		$dataBerkas = ['nis' => $nis];
		$fotoData = ['nis' => $nis];
		$seragam = ['nis' => $nis];
		$dtsantri = ['nis' => $nis, 'username' => $nis, 'password' => $password, 'stts' => 'Terverifikasi'];
		$bayar = [
			'id_bayar' => $id,
			'nis' => $nis,
			'nominal' => gel($santri->gel),
			'tgl_bayar' => date('Y-m-d'),
			'via' => 'Transfer',
			'kasir' => $user->nama,
			'created' => date('Y-m-d H:i:s'),
		];

		$pesan2 = '*Terimakasih*

*Kode Pendaftaran : ' . ($nis) . '*
Pembayaran Pendaftaran, atas :
        
Nama : ' . $santri->nama . '
Alamat : ' . $santri->desa . '-' . $santri->kec . '-' . $santri->kab . '
Lembaga tujuan : ' . $santri->lembaga . '
Nominal : ' . rupiah(gel($santri->gel)) . '
Via : Transfer
        
*telah TERVERIFIKASI.*
________________________________

*Informasi Akun Santri*

*SIMPANLAH USER DAN PASSWORD BERIKUT !!!*
Silahkan login ke https://psb.ppdwk.com/login untuk melengkapi data dan scan berkas calon santri baru serta informasi lainnya. 

Usename : *' . $nis . '*
Password : *' . $password . '*
________________________________

_*Silahkan bergabung dilink undangan group diatas untuk mengetahui informasi lebih lanjut*_
Terimakasih';

		$pesan = '*Info tambahan santri baru*

No. Pendaftaran : ' . $nis . '
Nama : ' . $santri->nama . '
Alamat : ' .  $santri->desa . '-' . $santri->kec . '-' . $santri->kab . '
Lembaga tujuan : ' . $santri->lembaga . ' DWK
jalur : ' . $santri->jalur . '
Gel :  ' . $santri->gel . '
No. HP : ' . $santri->hp . '
Waktu Daftar : ' . date('d-m-Y H:i:s') . '
            
*Terimakasih*';

		// UPDATE BERKAS
		$this->model->ubah('berkas_file', 'id_file', $id, $dataBerkas);
		if ($this->db->affected_rows() > 0) {

			// UPDATE FOTO
			$this->model->ubah('foto_file', 'id_file', $id, $fotoData);
			if ($this->db->affected_rows() > 0) {

				// UPDATE SERAGAM
				$this->model->ubah('seragam', 'id_seragam', $id, $seragam);
				if ($this->db->affected_rows() > 0) {

					// UPDATE DTSANTRI
					$this->model->ubah('tb_santri_sm', 'id_santri', $id, $dtsantri);
					if ($this->db->affected_rows() > 0) {

						// INSERT KE TABEL PEMBAYARAN
						$this->model->tambah2('bp_daftar', $bayar);
						if ($this->db->affected_rows() > 0) {

							// PINDAH DATA SANTRI
							$this->db->query("INSERT INTO tb_santri SELECT * FROM tb_santri_sm WHERE id_santri = '$id' ");
							if ($this->db->affected_rows() > 0) {

								// HAPUS SANTRI SM
								$this->model->hapus2('tb_santri_sm', 'id_santri', $id);
								if ($this->db->affected_rows() > 0) {
									kirim_tmp($key->api_key, $santri->hp, 'LINK GROUP', 'Link undangan bergabung group', $pesan2, $linkImg, linkGroup($santri->gel));
									kirim_group($key->api_key, '120363026604973091@g.us', $pesan);
									$this->session->set_flashdata('ok', 'Verifikasi data berhasil');
									redirect('daftar/verval');
								} else {
									$this->session->set_flashdata('error', 'Hapus data santri Gagal');
									redirect('daftar/cek/' . $id);
								}
							} else {
								$this->session->set_flashdata('error', 'Pindah data santri Gagal');
								redirect('daftar/cek/' . $id);
							}
						} else {
							$this->session->set_flashdata('error', 'Insert data pembayaran Gagal');
							redirect('daftar/cek/' . $id);
						}
					} else {
						$this->session->set_flashdata('error', 'Update Seragam Gagal');
						redirect('daftar/cek/' . $id);
					}
				} else {
					$this->session->set_flashdata('error', 'Update Seragam Gagal');
					redirect('daftar/cek/' . $id);
				}
			} else {
				$this->session->set_flashdata('error', 'Update Foto Gagal');
				redirect('daftar/cek/' . $id);
			}
		} else {
			$this->session->set_flashdata('error', 'Update Berkas Gagal');
			redirect('daftar/cek/' . $id);
		}
	}

	public function cekHasil()
	{
		$url = 'https://data.ppdwk.com/api/datatables?data=pendaftar&page=1&per_page=100&q=&sortby=created_at&sortbydesc=DESC&status=1';
		$token = $this->bearer;
		$data = [];
		$response = aksesEndpoint($url, $token, $data);
		$result = [];
		if ($response) {
			foreach ($response['data']['data'] as $item) {
				if ($item['dok_transfer'] !== null) {
					$result[] = [
						'id_santri' => $item['peserta_didik_id'],
						'nama' => $item['nama'],
						'nis' => $item['nis'],
						'nik' => $item['nik'],
						'desa' => $item['wilayah']['nama'],
						'kec' => $item['wilayah']['parrent_recursive']['nama'],
						'kab' => $item['wilayah']['parrent_recursive']['parrent_recursive']['nama'],
						'lembaga' => $item['lembaga']['nama'],
					];
				}
			}
		} else {
			echo "Gagal mengakses endpoint";
		}
		$data['baru'] = $result;
		$data['judul'] = 'santri';
		$data['user'] = $this->Auth_model->current_user();

		$this->load->view('bunda/head', $data);
		$this->load->view('bunda/cekSantri', $data);
		$this->load->view('bunda/foot');
	}

	public function cekHasilDetail($id)
	{
		$data['judul'] = 'santri';
		$data['user'] = $this->Auth_model->current_user();

		$url = 'https://data.ppdwk.com/api/datatables?data=pendaftar&page=1&per_page=10&q=' . $id . '&sortby=created_at&sortbydesc=DESC&status=1';
		$token = $this->bearer;

		$dataKirim = [];
		$response = aksesEndpoint($url, $token, $dataKirim);

		if ($response) {
			$data['data'] = $response['data']['data'][0];
		} else {
			echo "Gagal mengakses endpoint";
		}

		$this->load->view('bunda/head', $data);
		$this->load->view('bunda/detailSantri', $data);
		$this->load->view('bunda/foot');
	}

	public function vervalNota2($nik)
	{
		$user = $this->Auth_model->current_user();
		$key = $this->model->apiKey()->row();
		$linkImg = 'https://psb.ppdwk.com/viho/assets/images/logo/Logo-psb.png';
		$url = 'https://data.ppdwk.com/api/datatables?data=pendaftar&page=1&per_page=10&q=' . $nik . '&sortby=created_at&sortbydesc=DESC&status=1';
		$token = $this->bearer;
		$dataKirim = [];
		$response = aksesEndpoint($url, $token, $dataKirim);
		if ($response) {
			$id_santri = $response['data']['data'][0]['peserta_didik_id'];
			$nis = $response['data']['data'][0]['nis'];
			$nik = $response['data']['data'][0]['nik'];
			$gel = $response['data']['data'][0]['gelombang'];
			$nama = $response['data']['data'][0]['nama'];
			$desa = $response['data']['data'][0]['wilayah']['nama'];
			$kec = $response['data']['data'][0]['wilayah']['parrent_recursive']['nama'];
			$kab = $response['data']['data'][0]['wilayah']['parrent_recursive']['parrent_recursive']['nama'];
			$lemvaga = $response['data']['data'][0]['lembaga']['nama'];
			$jkl = $response['data']['data'][0]['jenis_kelamin'] == 'L' ? 'Laki-laki' : 'Perempuan';
			$tempat = $response['data']['data'][0]['tempat_lahir'];
			$tanggal = $response['data']['data'][0]['tanggal_lahir'];
			$bapak = $response['data']['data'][0]['nama_ayah'];
			$ibu = $response['data']['data'][0]['nama_ibu'];
			$jalur = $response['data']['data'][0]['jalur'] == 0 ? 'Reguler' : 'Prestasi';
			$whatsapp = $response['data']['data'][0]['whatsapp'];

			$seragam = ['id_seragam' => $id_santri, 'nis' => $nis];
			$bayar = [
				'id_bayar' => $id_santri,
				'nis' => $nis,
				'nominal' => gel($gel),
				'tgl_bayar' => date('Y-m-d'),
				'via' => 'Transfer',
				'kasir' => $user->nama,
				'created' => date('Y-m-d H:i:s'),
			];

			$pesan2 = '*Terimakasih*

*Kode Pendaftaran : ' . ($nis) . '*
Pembayaran Pendaftaran, atas :
        
Nama : ' . $nama . '
Alamat : ' . $desa . '-' . $kec . '-' . $kab . '
Lembaga tujuan : ' . $lemvaga . '
Nominal : ' . rupiah(gel($gel)) . '
Via : Transfer
        
*telah TERVERIFIKASI.*
________________________________

_*Silahkan bergabung dilink undangan group diatas untuk mengetahui informasi lebih lanjut*_
Terimakasih';

			$dataSantri = [
				'id_santri' => $id_santri,
				'nis' => $nis,
				'nik' => $nik,
				'gel' => $gel,
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
				'ket' => 'baru',
				'stts' => 'Terverifikasi',
			];

			$this->model->tambah2('bp_daftar', $bayar);
			if ($this->db->affected_rows() > 0) {
				$this->model->tambah2('tb_santri', $dataSantri);
				$this->model->tambah2('seragam', $seragam);
				// kirim_tmp($key->api_key, $whatsapp, 'LINK GROUP', 'Link undangan bergabung group', $pesan2, $linkImg, linkGroup($gel));
				kirim_tmp($key->api_key, $whatsapp, 'LINK GROUP', 'Link undangan bergabung group', $pesan2, $linkImg, 'https://chat.whatsapp.com/BDIVkDP4NFpKIDEO9hGkAY');
				// kirim_tmp($key->api_key, '085236924510', 'LINK GROUP', 'Link undangan bergabung group', $pesan2, $linkImg, 'https://chat.whatsapp.com/BDIVkDP4NFpKIDEO9hGkAY');
				$this->session->set_flashdata('ok', 'Verifikasi data berhasil');
				redirect('daftar/cekHasil');
			}
		}
	}
}
