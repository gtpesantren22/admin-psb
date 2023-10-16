<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bidang extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('BundaModel', 'model');
        $this->load->model('Auth_model');

        $user = $this->Auth_model->current_user();
        $this->tahun = '2024/2025';
        $this->bulan = ['', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

        if (!$this->Auth_model->current_user() || $user->level != 'division' && $user->level != 'admin') {
            redirect('login/logout');
        }
    }

    public function index()
    {
        $data['judul'] = 'home';
        $data['user'] = $this->Auth_model->current_user();
        $bidang = $data['user']->jabatan;
        $data['jab'] = $this->model->getBy('jabatan', 'kode', $data['user']->jabatan)->row();
        $data['pakai'] = $this->db->query("SELECT SUM(qty * harga_satuan) as total FROM pengajuan_detail WHERE bidang = '$bidang' ")->row();

        $this->load->view('bidang/head', $data);
        $this->load->view('bidang/index', $data);
        $this->load->view('bidang/foot', $data);
    }

    public function pengajuan()
    {
        $data['judul'] = 'pengajuan';
        $data['user'] = $this->Auth_model->current_user();
        $data['bulan'] = $this->bulan;
        $data['tahun'] = $this->tahun;

        $data['data'] = $this->model->getBy('pengajuan', 'bidang', $data['user']->jabatan)->result();

        $this->load->view('bidang/head', $data);
        $this->load->view('bidang/pengajuan', $data);
        $this->load->view('bidang/foot', $data);
    }

    public function pengajuanpAdd()
    {
        $user = $this->Auth_model->current_user();

        $cek = $this->model->getBy2('pengajuan', 'status <>', 'bidang', 'selesai', $user->jabatan)->row();
        if ($cek) {
            $this->session->set_flashdata('error', 'Maaf. Mohon untuk menyelesaikan pengajuan sebelumnya');
            redirect('bidang/pengajuan');
        } else {
            $bln = $this->input->post('bulan', true);
            $tanggal = $this->input->post('tanggal', true);

            $dataKode = $this->db->query("SELECT COUNT(*) as jml FROM pengajuan ")->row();
            $kodeBarang = $dataKode->jml + 1;
            $noUrut = (int) substr($kodeBarang, 0, 3);
            $kodeBarang = sprintf("%03s", $noUrut) . '.PSB.' . $user->jabatan . '.' . $bln . '.' . date('Y');
            $kd_pjn = htmlspecialchars($kodeBarang);

            $data = [
                'id_pengajuan' => $this->uuid->v4(),
                'kode_pengajuan' => $kd_pjn,
                'bidang' => $user->jabatan,
                'tanggal' => $tanggal,
                'bulan' => $bln,
                'status' => 'belum',
                'tahun' => $this->tahun,
                'at' => date('Y-m-d H:i:s')
            ];

            $this->model->tambah('pengajuan', $data);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('ok', 'Data berhasil ditambah');
                redirect('bidang/pengajuan');
            } else {
                $this->session->set_flashdata('error', 'Data tak berhasil ditambah');
                redirect('bidang/pengajuan');
            }
        }
    }

    public function pengajuanDetail($kode)
    {
        $data['judul'] = 'pengajuan';
        $data['user'] = $this->Auth_model->current_user();
        $data['bulan'] = $this->bulan;
        $data['tahun'] = $this->tahun;

        $data['data'] = $this->model->getBy('pengajuan', 'kode_pengajuan', $kode)->row();
        $data['detail'] = $this->db->query("SELECT * FROM pengajuan_detail JOIN jabatan ON pengajuan_detail.bidang=jabatan.kode WHERE kode_pengajuan = '$kode' ")->result();
        $data['dataSum'] = $this->db->query("SELECT SUM(qty * harga_satuan) AS jml FROM pengajuan_detail WHERE kode_pengajuan = '$kode' ")->row();

        $this->load->view('bidang/head', $data);
        $this->load->view('bidang/pengajuanDetail', $data);
        $this->load->view('bidang/foot', $data);
    }

    public function pjAddInput()
    {
        $kode_pengajuan = $this->input->post('kode_pengajuan', true);
        $bidang = $this->input->post('bidang', true);
        $uraian = $this->input->post('uraian', true);
        $tahun = $this->input->post('tahun', true);
        $qty = $this->input->post('qty', true);
        $satuan = $this->input->post('satuan', true);
        $harga_satuan = rmRp($this->input->post('harga_satuan', true));


        $data = [
            'id_detail' => $this->uuid->v4(),
            'kode_pengajuan' => $kode_pengajuan,
            'bidang' => $bidang,
            'uraian' => $uraian,
            'tahun' => $tahun,
            'qty' => $qty,
            'satuan' => $satuan,
            'harga_satuan' => $harga_satuan,
            'at' => date('Y-m-d H:i:s')
        ];

        $user = $this->Auth_model->current_user();
        $cek = $this->db->query("SELECT SUM(qty * harga_satuan) as jml FROM pengajuan_detail WHERE bidang = '$user->jabatan' ")->row();
        $pagu = $this->db->query("SELECT pagu FROM jabatan WHERE kode = '$user->jabatan' ")->row();
        $pakai = $cek->jml + ($harga_satuan * $qty);

        if ($pakai > $pagu->pagu) {
            $this->session->set_flashdata('error', 'Maaf pengajuan sudah melebihi pagu');
            redirect('bidang/pengajuanDetail/' . $kode_pengajuan);
        } else {
            $this->model->tambah('pengajuan_detail', $data);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('ok', 'Data berhasil ditambah');
                redirect('bidang/pengajuanDetail/' . $kode_pengajuan);
            } else {
                $this->session->set_flashdata('error', 'Data tak berhasil ditambah');
                redirect('bidang/pengajuanDetail/' . $kode_pengajuan);
            }
        }
    }

    public function delItemSarpras($id, $kode)
    {
        $this->model->del('pengajuan_detail', 'id_detail', $id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('ok', 'Data berhasil dihapus');
            redirect('bidang/pengajuanDetail/' . $kode);
        } else {
            $this->session->set_flashdata('error', 'Data tak berhasil dihapus');
            redirect('bidang/pengajuanDetail/' . $kode);
        }
    }

    public function ajukan($kode)
    {
        $data = ['status' => 'proses'];

        $pjn = $this->model->getBy('pengajuan', 'kode_pengajuan', $kode)->row();
        $nominal = $this->db->query("SELECT SUM(qty * harga_satuan) as total FROM pengajuan_detail WHERE kode_pengajuan = '$kode' ")->row();
        $pj = $this->model->getBy('jabatan', 'kode', $pjn->bidang)->row();

        $psn = '*INFORMASI PENGAJUAN PSB*
Pengajuan dari :

Bidang : ' . $pj->nama . '
Nominal : ' . rupiah($nominal->total) . '
Tanggal : ' . $pjn->tanggal . '

Kepada Bendahara PSB mohon untuk segera mengeceknya.

_*Terimakasih*_';

        $this->model->edit('pengajuan', 'kode_pengajuan', $kode, $data);
        if ($this->db->affected_rows() > 0) {
            kirim_group('f4064efa9d05f66f9be6151ec91ad846', '120363180487956301@g.us', $psn);
            // kirim_person('f4064efa9d05f66f9be6151ec91ad846', '085236924510', $psn);
            $this->session->set_flashdata('ok', 'Pengajuan Berhasil');
            redirect('bidang/pengajuanDetail/' . $kode);
        } else {
            $this->session->set_flashdata('error', 'Pengajuan gagal');
            redirect('bidang/pengajuanDetail/' . $kode);
        }
    }

    public function uploadSpj()
    {

        $kode  = $this->input->post('kode', true);

        $date = date('Y-m-d');
        $at = date('Y-m-d H:i:s');

        $file = $this->model->getBy('pengajuan', 'kode_pengajuan', $kode)->row();
        $spj = $this->model->getBy('spj', 'kode_pengajuan', $kode)->row();
        $bidang = $this->model->getBy('jabatan', 'kode', $file->bidang)->row();

        $psn = '*INFORMASI VERIFIKASI SPJ*
Ada pelaporan SPJ dari :
    
Bidang : ' . $bidang->nama . '
Kode Pengajuan : ' . $kode . '
Pada : ' . $at . '

*_dimohon kepada Bendahara PSB untuk segera mengecek nya._*
Terimakasih';

        $file_name = 'SPJPSB-' . $file->bidang . rand(0, 999);
        $config['upload_path']          = FCPATH . '/demo/uploads/';
        $config['allowed_types']        = 'pdf';
        $config['file_name']            = $file_name;
        $config['overwrite']            = true;
        $config['max_size']             = 5120; // 5MB
        $config['max_width']            = 1080;
        $config['max_height']           = 1080;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('file')) {
            // $data['error'] = $this->upload->display_errors();
            $this->session->set_flashdata('error', 'Gagal diupload. pastikan file berupa PDF dan tidak melebihi 5 Mb');
            redirect('bidang/pengajuan');
        } else {
            $uploaded_data = $this->upload->data();

            $data = [
                'stts' => 1,
                'file_spj' => $uploaded_data['file_name'],
                'tgl_upload' => $date,
            ];
            $this->model->edit('spj', 'kode_pengajuan', $kode, $data);

            if ($this->db->affected_rows() > 0) {

                kirim_group('f4064efa9d05f66f9be6151ec91ad846', '120363180487956301@g.us', $psn);
                // kirim_person('f4064efa9d05f66f9be6151ec91ad846', '085236924510', $psn);

                $this->session->set_flashdata('ok', 'Bukti SPJ berhasil diupload');
                redirect('bidang/pengajuan');
            } else {
                $this->session->set_flashdata('error', 'Bukti SPJ gagal diupload');
                redirect('bidang/pengajuan');
            }
        }
    }
}
