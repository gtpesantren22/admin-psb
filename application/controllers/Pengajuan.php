<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengajuan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('BundaModel', 'model');

        $this->load->model('Auth_model');

        $user = $this->Auth_model->current_user();
        $this->bulan = ['', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        $this->tahun = '2024/2025';
        if (!$this->Auth_model->current_user() || $user->level != 'bunda' && $user->level != 'admin') {
            redirect('login/logout');
        }
    }

    public function index()
    {
        $data['judul'] = 'trans';
        $data['user'] = $this->Auth_model->current_user();
        $data['bulan'] = $this->bulan;
        $data['tahun'] = $this->tahun;

        $data['data'] = $this->model->getAll('pengajuan')->result();
        $data['totalKeluar'] = $this->db->query("SELECT SUM(qty * harga_satuan) as total FROM pengajuan_detail")->row();

        $this->load->view('bunda/head', $data);
        $this->load->view('bunda/pengajuan', $data);
        $this->load->view('bunda/foot', $data);
    }

    public function pengajuanDetail($kode)
    {
        $data['judul'] = 'trans';
        $data['user'] = $this->Auth_model->current_user();
        $data['bulan'] = $this->bulan;
        $data['tahun'] = $this->tahun;

        $data['data'] = $this->model->getBy('pengajuan', 'kode_pengajuan', $kode)->row();
        $data['detail'] = $this->db->query("SELECT * FROM pengajuan_detail JOIN jabatan ON pengajuan_detail.bidang=jabatan.kode WHERE kode_pengajuan = '$kode' ")->result();
        $data['dataSum'] = $this->db->query("SELECT SUM(qty * harga_satuan) AS jml FROM pengajuan_detail WHERE kode_pengajuan = '$kode' ")->row();
        $data['pj'] = $this->model->getBy('jabatan', 'kode', $data['data']->bidang)->row();

        $this->load->view('bunda/head', $data);
        $this->load->view('bunda/pengajuanDetail', $data);
        $this->load->view('bunda/foot', $data);
    }

    public function verval($kode)
    {
        $data = ['status' => 'disetujui'];
        $pjn = $this->model->getBy('pengajuan', 'kode_pengajuan', $kode)->row();
        $nominal = $this->db->query("SELECT SUM(qty * harga_satuan) as total FROM pengajuan_detail WHERE kode_pengajuan = '$kode' ")->row();
        $pj = $this->model->getBy('jabatan', 'kode', $pjn->bidang)->row();


        $psn = '*INFORMASI VERVAL PENGAJUAN PSB*
        Pengajuan dari :
        
        Bidang : ' . $pj->nama . '
        Nominal : ' . rupiah($nominal->total) . '
        Tanggal : ' . $pjn->tanggal . '
        
        Pengajuan telah disetujui oleh Bendahara. Selanjutnya pencairan bisa dilakukan oleh PIC bidang terkait di KASIR Pesantren.
        
        _*Terimakasih*_';

        $this->model->edit('pengajuan', 'kode_pengajuan', $kode, $data);
        if ($this->db->affected_rows() > 0) {
            kirim_group('f4064efa9d05f66f9be6151ec91ad846', '120363180487956301@g.us', $psn);
            // kirim_person('f4064efa9d05f66f9be6151ec91ad846', '085236924510', $psn);
            $this->session->set_flashdata('ok', 'Pengajuan Berhasil');
            redirect('pengajuan/pengajuanDetail/' . $kode);
        } else {
            $this->session->set_flashdata('error', 'Pengajuan gagal');
            redirect('pengajuan/pengajuanDetail/' . $kode);
        }
    }

    public function pengajuanTolak()
    {
        $kode_pengajuan = $this->input->post('kode_pengajuan', true);
        $catatan = $this->input->post('catatan', true);

        $pjn = $this->model->getBy('pengajuan', 'kode_pengajuan', $kode_pengajuan)->row();
        $nominal = $this->db->query("SELECT SUM(qty * harga_satuan) as total FROM pengajuan_detail WHERE kode_pengajuan = '$kode_pengajuan' ")->row();
        $pj = $this->model->getBy('jabatan', 'kode', $pjn->bidang)->row();
        $data = ['status' => 'ditolak'];

        $psn = '*INFORMASI PENOLAKAN PENGAJUAN PSB*
        Pengajuan dari :
        
        Bidang : ' . $pj->nama . '
        Nominal : ' . rupiah($nominal->total) . '
        
        Pengajuan ditolak oleh Bendahara dengan catatan *' . $catatan . '*.
        Diharap kepada PIC Bagian untuk segera memperbaikinya.
        
        _*Terimakasih*_';

        $this->model->edit('pengajuan', 'kode_pengajuan', $kode_pengajuan, $data);
        if ($this->db->affected_rows() > 0) {
            kirim_group('f4064efa9d05f66f9be6151ec91ad846', '120363180487956301@g.us', $psn);
            // kirim_person('f4064efa9d05f66f9be6151ec91ad846', '085236924510', $psn);
            $this->session->set_flashdata('ok', 'Pengajuan Berhasil');
            redirect('pengajuan/pengajuanDetail/' . $kode_pengajuan);
        } else {
            $this->session->set_flashdata('error', 'Pengajuan gagal');
            redirect('pengajuan/pengajuanDetail/' . $kode_pengajuan);
        }
    }

    public function cairkan()
    {
        $kode_pengajuan = $this->input->post('kode_pengajuan', true);
        $penerima = $this->input->post('penerima', true);

        $pjn = $this->model->getBy('pengajuan', 'kode_pengajuan', $kode_pengajuan)->row();
        $nominal = $this->db->query("SELECT SUM(qty * harga_satuan) as total FROM pengajuan_detail WHERE kode_pengajuan = '$kode_pengajuan' ")->row();
        $pj = $this->model->getBy('jabatan', 'kode', $pjn->bidang)->row();
        $data = ['status' => 'dicairkan'];

        $dataSpj = [
            'id_spj' => $this->uuid->v4(),
            'kode_pengajuan' => $kode_pengajuan,
            'bidang' => $pjn->bidang,
            'tahun' => $this->tahun,
            'stts' => 0,
            'file_spj' => '',
            'tgl_upload' => '',
        ];

        $psn = '*INFORMASI PENCAIRAN PENGAJUAN PSB*
        Pengajuan dari :
        
        Bidang : ' . $pj->nama . '
        Nominal : ' . rupiah($nominal->total) . '
        Tanggal : ' . date('d-m-Y') . '
        penerima : ' . $penerima . '
        
        Pencairan telah selesai. Diharapkan kepada PIC Bidang terkait untuk segera menyusun SPJ jika telah selesai.
        
        _*Terimakasih*_';

        $this->model->edit('pengajuan', 'kode_pengajuan', $kode_pengajuan, $data);
        if ($this->db->affected_rows() > 0) {
            $this->model->tambah('spj', $dataSpj);

            kirim_group('f4064efa9d05f66f9be6151ec91ad846', '120363180487956301@g.us', $psn);
            // kirim_person('f4064efa9d05f66f9be6151ec91ad846', '085236924510', $psn);

            $this->session->set_flashdata('ok', 'Pengajuan Berhasil');
            redirect('pengajuan/pengajuanDetail/' . $kode_pengajuan);
        } else {
            $this->session->set_flashdata('error', 'Pengajuan gagal');
            redirect('pengajuan/pengajuanDetail/' . $kode_pengajuan);
        }
    }

    public function cekSpj($kode)
    {
        $data['judul'] = 'trans';
        $data['user'] = $this->Auth_model->current_user();
        $data['bulan'] = $this->bulan;
        $data['tahun'] = $this->tahun;

        $data['data'] = $this->model->getBy('spj', 'kode_pengajuan', $kode)->row();
        $data['dataSum'] = $this->db->query("SELECT SUM(qty * harga_satuan) AS jml FROM pengajuan_detail WHERE kode_pengajuan = '$kode' ")->row();
        $data['pj'] = $this->model->getBy('jabatan', 'kode', $data['data']->bidang)->row();

        $this->load->view('bunda/head', $data);
        $this->load->view('bunda/cekSpj', $data);
        $this->load->view('bunda/foot', $data);
    }

    public function vervalSpj($kode)
    {
        $data = ['stts' => '3'];
        $data2 = ['status' => 'selesai'];
        $pjn = $this->model->getBy('pengajuan', 'kode_pengajuan', $kode)->row();
        $bidang = $this->model->getBy('jabatan', 'kode', $pjn->bidang)->row();


        $psn = '*INFORMASI VERIFIKASI SPJ*
Ada pelaporan SPJ dari :
    
Bidang : ' . $bidang->nama . '
Kode Pengajuan : ' . $kode . '
Pada : ' . date('d-m-Y H:i') . '

*_dimohon kepada Bendahara PSB untuk segera mengecek nya._*
Terimakasih';

        $this->model->edit('spj', 'kode_pengajuan', $kode, $data);
        $this->model->edit('pengajuan', 'kode_pengajuan', $kode, $data2);
        if ($this->db->affected_rows() > 0) {
            kirim_group('f4064efa9d05f66f9be6151ec91ad846', '120363180487956301@g.us', $psn);
            // kirim_person('f4064efa9d05f66f9be6151ec91ad846', '085236924510', $psn);
            $this->session->set_flashdata('ok', 'Pengajuan Berhasil');
            redirect('pengajuan');
        } else {
            $this->session->set_flashdata('error', 'Pengajuan gagal');
            redirect('pengajuan');
        }
    }

    public function tolakSpj()
    {
        $kode = $this->input->post('kode_pengajuan', true);
        $catatan = $this->input->post('catatan', true);
        $data = ['stts' => '2'];
        $pjn = $this->model->getBy('pengajuan', 'kode_pengajuan', $kode)->row();
        $bidang = $this->model->getBy('jabatan', 'kode', $pjn->bidang)->row();


        $psn = '*INFORMASI PENOLAKAN SPJ*
pelaporan SPJ dari :
    
Bidang : ' . $bidang->nama . '
Kode Pengajuan : ' . $kode .
            '

Pengajuan ditolak oleh Bendahara dengan catatan *' . $catatan . '*.
Diharap kepada PIC Bagian untuk segera memperbaikinya.
        
_*Terimakasih*_';

        $this->model->edit('spj', 'kode_pengajuan', $kode, $data);
        if ($this->db->affected_rows() > 0) {
            kirim_group('f4064efa9d05f66f9be6151ec91ad846', '120363180487956301@g.us', $psn);
            // kirim_person('f4064efa9d05f66f9be6151ec91ad846', '085236924510', $psn);
            $this->session->set_flashdata('ok', 'Pengajuan Berhasil');
            redirect('pengajuan');
        } else {
            $this->session->set_flashdata('error', 'Pengajuan gagal');
            redirect('pengajuan');
        }
    }
}
