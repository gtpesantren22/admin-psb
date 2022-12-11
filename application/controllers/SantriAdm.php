<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SantriAdm extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('SantriModel', 'model');
		$this->load->model('Auth_model');
		$this->load->model('ProvinsiModel');
		$this->load->model('KotaModel');
		$this->load->model('KecModel');
		$this->load->model('DesaModel');
		$this->load->model('SklModel');

		$user = $this->Auth_model->current_user();
		if (!$this->Auth_model->current_user() || $user->level != 'admin' && $user->level != 'adm') {
			redirect('login/logout');
		}
	}

	public function index()
	{
		$data['baru'] = $this->model->baru()->result();
		$data['judul'] = 'santri';
		$data['user'] = $this->Auth_model->current_user();

		$this->load->view('adm/head', $data);
		$this->load->view('adm/baru', $data);
		$this->load->view('adm/foot');
	}

	public function lanjut()
	{
		$data['baru'] = $this->model->lama()->result();
		$data['judul'] = 'santri';
		$data['user'] = $this->Auth_model->current_user();

		$this->load->view('adm/head', $data);
		$this->load->view('adm/lama', $data);
		$this->load->view('adm/foot');
	}

	public function edit($nis)
	{
		$data['judul'] = 'santri';
		$data['user'] = $this->Auth_model->current_user();
		$data['data'] = $this->model->santriNis($nis)->row();
		$data['agama'] = $this->model->agama()->result();

		$data['pend'] = $this->model->pend()->result();
		$data['pkj'] = $this->model->pkj()->result();
		$data['hasil'] = $this->model->hasil()->result();
		$data['provinsi'] = $this->ProvinsiModel->view();

		$this->load->view('adm/head', $data);
		$this->load->view('adm/edit', $data);
		$this->load->view('adm/foot');
	}

	public function saveIdentitas()
	{

		$nis = $this->input->post('nis');

		$data = [
			'nik' => $this->input->post('nik', true),
			'no_kk' => $this->input->post('no_kk', true),
			'nisn' => $this->input->post('nisn', true),
			'nama' => $this->input->post('nama', true),
			'tempat' => $this->input->post('tempat', true),
			'tanggal' => $this->input->post('tanggal', true) . '-' . $this->input->post('bulan', true) . '-' . $this->input->post('tahun', true),
			'lembaga' => $this->input->post('lembaga', true),
			'jkl' => $this->input->post('jkl', true),
			'agama' => $this->input->post('agama', true),
			'anak_ke' => $this->input->post('anak_ke', true),
			'jml_sdr' => $this->input->post('jml_sdr', true)
		];

		$this->model->edit('tb_santri', $data, $nis);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('ok', 'Data sudah diperbarui');
			redirect('santriAdm/edit/' . $nis);
		} else {
			$this->session->set_flashdata('error', 'Edit Error');
			redirect('santriAdm/edit/' . $nis);
		}
	}

	public function saveMahrom()
	{
		$data = [
			'a_nik' => $this->input->post('a_nik', true),
			'bapak' => strtoupper($this->input->post('bapak', true)),
			'a_tempat' => strtoupper($this->input->post('a_tempat', true)),
			'a_tanggal' => $this->input->post('tanggal', true) . '-' . $this->input->post('bulan', true) . '-' . $this->input->post('tahun', true),
			'a_pend' => $this->input->post('a_pend', true),
			'a_pkj' => $this->input->post('a_pkj', true),
			'a_hasil' => $this->input->post('a_hasil', true),
			'a_stts' => $this->input->post('a_stts', true),

			// IBU
			'i_nik' => $this->input->post('i_nik', true),
			'ibu' => strtoupper($this->input->post('ibu', true)),
			'i_tempat' => strtoupper($this->input->post('i_tempat', true)),
			'i_tanggal' => $this->input->post('tanggal_i', true) . '-' . $this->input->post('bulan_i', true) . '-' . $this->input->post('tahun_i', true),
			'i_pend' => $this->input->post('i_pend', true),
			'i_pkj' => $this->input->post('i_pkj', true),
			'i_hasil' => $this->input->post('i_hasil', true),
			'i_stts' => $this->input->post('i_stts', true)
		];

		$where = $this->input->post('nis', true);

		$this->model->edit('tb_santri', $data, $where);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('ok', 'Data sudah diperbarui');
			redirect('santriAdm/edit/' . $where);
		} else {
			$this->session->set_flashdata('error', 'Edit Error');
			redirect('santriAdm/edit/' . $where);
		}
	}

	public function saveAddres()
	{
		if ($this->input->post('kelurahan') === '') {
			$almt = explode('-', $this->input->post('alamat'));
			$provOk = $almt[3];
			$kabOk = $almt[2];
			$kecOk = $almt[1];
			$kelOk = $almt[0];
		} else {
			$provinsi = $this->input->post('provinsi', TRUE);
			$kabupaten = $this->input->post('kabupaten', TRUE);
			$kecamatan = $this->input->post('kecamatan', TRUE);
			$kelurahan = $this->input->post('kelurahan', TRUE);

			$pr = $this->db->query("SELECT nama FROM provinsi WHERE id_prov = '$provinsi' ")->row();
			$provOk = $pr->nama;
			$kb = $this->db->query("SELECT nama FROM kabupaten WHERE id_kab = '$kabupaten' ")->row();
			$kabOk = $kb->nama;
			$kc = $this->db->query("SELECT nama FROM kecamatan WHERE id_kec = '$kecamatan' ")->row();
			$kecOk = $kc->nama;
			$kl = $this->db->query("SELECT nama FROM kelurahan WHERE id_kel = '$kelurahan' ")->row();
			$kelOk = $kl->nama;
		}

		$data = [
			'jln' => $this->input->post('jln', true),
			'rt' => $this->input->post('rt', true),
			'rw' => $this->input->post('rw', true),
			'kd_pos' => $this->input->post('kd_pos', true),
			'desa' => $kelOk,
			'kec' => $kecOk,
			'kab' => $kabOk,
			'prov' => $provOk
		];

		$where = $this->input->post('nis', true);

		$this->model->edit('tb_santri', $data, $where);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('ok', 'Data sudah diperbarui');
			redirect('santriAdm/edit/' . $where);
		} else {
			$this->session->set_flashdata('error', 'Edit Error');
			redirect('santriAdm/edit/' . $where);
		}
	}

	public function saveUniv()
	{
		$npsn = $this->input->post('npsn');
		$dtSkl = $this->model->getSkl($npsn);

		$data = [
			'npsn' => $npsn,
			'asal' => $dtSkl->nama,
			'a_asal' => $dtSkl->alamat . ', Desa/Kel. ' . $dtSkl->desa
		];

		$where = $this->input->post('nis', true);

		$this->model->edit('tb_santri', $data, $where);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('ok', 'Data sudah diperbarui');
			redirect('santriAdm/edit/' . $where);
		} else {
			$this->session->set_flashdata('error', 'Edit Error');
			redirect('santriAdm/edit/' . $where);
		}
	}

	public function saveOther()
	{

		$data = [
			'hp' => $this->input->post('hp', true),
			'jenis' => $this->input->post('jenis', true),
			'tinggal' => $this->input->post('tinggal', true)
		];

		$where = $this->input->post('nis', true);

		$this->model->edit('tb_santri', $data, $where);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('ok', 'Data sudah diperbarui');
			redirect('santriAdm/edit/' . $where);
		} else {
			$this->session->set_flashdata('error', 'Edit Error');
			redirect('santriAdm/edit/' . $where);
		}
	}


	public function listKota()
	{
		// Ambil data ID Provinsi yang dikirim via ajax post
		$id_provinsi = $this->input->post('id_provinsi');

		$kota = $this->KotaModel->viewByProvinsi($id_provinsi);

		// Buat variabel untuk menampung tag-tag option nya
		// Set defaultnya dengan tag option Pilih
		$lists = "<option value=''>-Pilih Kabupaten/Kota-</option>";

		foreach ($kota as $data) {
			$lists .= "<option value='" . $data->id_kab . "'>" . $data->nama . "</option>"; // Tambahkan tag option ke variabel $lists
		}

		$callback = array('list_kota' => $lists); // Masukan variabel lists tadi ke dalam array $callback dengan index array : list_kota

		echo json_encode($callback); // konversi varibael $callback menjadi JSON
	}

	public function listKec()
	{
		// Ambil data ID Provinsi yang dikirim via ajax post
		$id_kab = $this->input->post('id_kab');

		$kec = $this->KecModel->viewById($id_kab);

		// Buat variabel untuk menampung tag-tag option nya
		// Set defaultnya dengan tag option Pilih
		$lists = "<option value=''>-Pilih Kecamatan-</option>";

		foreach ($kec as $data) {
			$lists .= "<option value='" . $data->id_kec . "'>" . $data->nama . "</option>"; // Tambahkan tag option ke variabel $lists
		}

		$callback = array('list_kec' => $lists); // Masukan variabel lists tadi ke dalam array $callback dengan index array : list_kota

		echo json_encode($callback); // konversi varibael $callback menjadi JSON
	}

	public function listDesa()
	{
		// Ambil data ID Provinsi yang dikirim via ajax post
		$id_kec = $this->input->post('id_kec');

		$desa = $this->DesaModel->viewById($id_kec);

		// Buat variabel untuk menampung tag-tag option nya
		// Set defaultnya dengan tag option Pilih
		$lists = "<option value=''>-Pilih Kelurahan/Desa-</option>";

		foreach ($desa as $data) {
			$lists .= "<option value='" . $data->id_kel . "'>" . $data->nama . "</option>"; // Tambahkan tag option ke variabel $lists
		}

		$callback = array('list_desa' => $lists); // Masukan variabel lists tadi ke dalam array $callback dengan index array : list_kota

		echo json_encode($callback); // konversi varibael $callback menjadi JSON
	}

	public function listSkl()
	{
		// Ambil data ID Provinsi yang dikirim via ajax post
		$id_kec = $this->input->post('id_kec');

		$desa = $this->SklModel->viewById($id_kec);

		// Buat variabel untuk menampung tag-tag option nya
		// Set defaultnya dengan tag option Pilih
		$lists = "<option value=''>-Pilih Sekolah-</option>";

		// $a = "var npsn = new Array();\n;";
		// $b = "var nama = new Array();\n;";


		foreach ($desa as $data) {
			$lists .= "<option value='" . $data->npsn . "'>" . $data->npsn . " - " . $data->nama . " - " . $data->desa  . "</option>"; // Tambahkan tag option ke variabel $lists
			// $a .= "npsn['" . $data->npsn . "'] = {npsn:'" . addslashes($data->npsn) . "'};\n";
			// $b .= "nama['" . $data->npsn . "'] = {nama:'" . addslashes($data->nama) . "'};\n";
		}

		$callback = array('list_skl' => $lists); // Masukan variabel lists tadi ke dalam array $callback dengan index array : list_kota

		echo json_encode($callback); // konversi varibael $callback menjadi JSON
	}

	public function get_kab()
	{
		$id_provinsi = $this->input->post('id_provinsi');
		$data = $this->DaftarModel->getKab($id_provinsi);
		echo json_encode($data);
	}

	public function get_kec()
	{
		$id_kab = $this->input->post('id_kab');
		$data = $this->DaftarModel->getKec($id_kab);
		echo json_encode($data);
	}

	public function get_kel()
	{
		$id_kec = $this->input->post('id_kec');
		$data = $this->DaftarModel->getKel($id_kec);
		echo json_encode($data);
	}

	public function get_skl()
	{
		$id_kec = $this->input->post('skl');
		$data = $this->SklModel->getKel($id_kec);
		echo json_encode($data);
	}

	public function send($nis)
	{
		$data = $this->model->santriNis($nis)->row();

		if ($data->gel === '1') {
			$link = 'https://chat.whatsapp.com/FxIUBMgNqIjAh2h7wAZjrU';
			$jadwal = 'Penyerahan berkas dan Tes : 26-28 February 2022';
			$tmp = array(array('url' => 'https://chat.whatsapp.com/FxIUBMgNqIjAh2h7wAZjrU', 'text' => 'Klik disini'));
		} else if ($data->gel === '2') {
			$link = 'https://chat.whatsapp.com/GAKAl21yWpJ7TXIaGem1HH';
			$jadwal = 'Penyerahan berkas dan Tes : 26-28 Maret 2022';
			$tmp = array(array('url' => 'https://chat.whatsapp.com/FxIUBMgNqIjAh2h7wAZjrU', 'text' => 'Klik disini'));
		} else if ($data->gel === '3') {
			$link = 'https://chat.whatsapp.com/GQgMWD7JISW5NRqAWCcA4E';
			$jadwal = 'Penyerahan berkas dan Tes : 28-30 Mei 2022';
			$tmp = array(array('url' => 'https://chat.whatsapp.com/FxIUBMgNqIjAh2h7wAZjrU', 'text' => 'Klik disini'));
		}

		if ($data->lembaga === 'MI' || $data->lembaga === 'RA') {
			$tambahan = $data->lembaga === 'MI' ? 'Silahkan bergabung ke Grup Siswa Baru MI DWK untuk mengetahui informasi lebih lanjut dengan mengklik link dibawah ini : *https://chat.whatsapp.com/Eqwog9EcvmzHXz4hZX14Fc' : 'Silahkan bergabung ke Grup Siswa Baru RA DWK untuk mengetahui informasi lebih lanjut dengan mengklik link berikut ini : https://chat.whatsapp.com/LhePAcQXgD8HWz3O8YJdNF';
			$tmp = array(array('url' => 'https://chat.whatsapp.com/FxIUBMgNqIjAh2h7wAZjrU', 'text' => 'Klik disini. Link Grup Gel. 3'));
		} else {
			$tambahan = 'Silahkan bergabung ke Grup Santri Baru Gelombang ' . $data->gel . ' untuk mengetahui informasi lebih lanjut dengan mengklik link dibawah ini';
			$tmp = array(array('url' => 'https://chat.whatsapp.com/FxIUBMgNqIjAh2h7wAZjrU', 'text' => 'Klik disini. Link Grup Gel. 3'));
		}

		$pesan = '*Link Undangan Grup WhatsApp*

' . $tambahan . ' 
*Terimakasih*';

		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => 'http://8.215.26.187:3000/api/sendTemplateMessage',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'POST',
			// CURLOPT_POSTFIELDS => 'apiKey=f4064efa9d05f66f9be6151ec91ad846&phone=' . $data->hp . '&body_message=' . $pesan . '&footer=template&template=' . json_encode($tmp) . '&url_file=https://www.petanikode.com/img/json/json.png',
			CURLOPT_POSTFIELDS => 'apiKey=f4064efa9d05f66f9be6151ec91ad846&phone=082229084447&body_message=' . $pesan . '&footer=template&template=' . json_encode($tmp) . '&url_file=https://srv66.niagahoster.com:2083/cpsess2816233995/viewer/home%2fu9048253%2fpublic_html%2fadmin-psb%2fdemo%2fstatic%2fLogo-Grup/2.jpg',
		));

		$response = curl_exec($curl);

		curl_close($curl);
	}
}