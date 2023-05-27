<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class import extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('AdminModel', 'user');
        $this->load->model('Auth_model');

        $user = $this->Auth_model->current_user();

        if (!$this->Auth_model->current_user() || $user->level != 'bunda' && $user->level != 'admin') {
            redirect('login/logout');
        }
    }
    public function index()
    {
        $data['judul'] = 'import';
        $data['user'] = $this->Auth_model->current_user();
        $data['jumlah'] = $this->user->get_num_rows();
        $data['lama'] = $this->user->santriLama()->result();

        $this->load->view('adm/head', $data);
        $this->load->view('adm/sekolah', $data);
        $this->load->view('adm/foot');
    }

    public function import()
    {
        $path         = 'demo/db/';
        $json         = [];
        $this->upload_config($path);
        if (!$this->upload->do_upload('file')) {
            $this->session->set_flashdata('error', 'Upload Gagal');
            redirect('import');
        } else {
            $file_data     = $this->upload->data();
            $file_name     = $path . $file_data['file_name'];
            $arr_file     = explode('.', $file_name);
            $extension     = end($arr_file);
            if ('csv' == $extension) {
                $reader     = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
            } else {
                $reader     = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            }
            $spreadsheet     = $reader->load($file_name);
            $sheet_data     = $spreadsheet->getActiveSheet()->toArray();
            $list             = [];
            foreach ($sheet_data as $key => $val) {
                if ($key != 0) {
                    $result     = $this->user->get(["npsn" => $val[1]]);
                    if ($result) {
                        // $this->session->set_flashdata('error', 'Data Sudah di Upload');
                        // redirect('import');
                    } else {
                        $list[] = [
                            'npsn' => $val[1],
                            'nama' => $val[2],
                            'alamat' => $val[3],
                            'desa' => $val[4],
                            'stts' => $val[5],
                            'kode' => $val[6]
                        ];
                    }
                }
            }
            if (file_exists($file_name))
                unlink($file_name);
            if (count($list) > 0) {
                $result     = $this->user->add_batch($list);
                if ($result) {
                    $this->session->set_flashdata('ok', 'Upload Selesai');
                    redirect('import');
                } else {
                    $this->session->set_flashdata('error', 'Upload Gagal');
                    redirect('import');
                }
            } else {
                $this->session->set_flashdata('error', 'Upload Gagal');
                redirect('import');
            }
        }
    }

    public function upload_config($path)
    {
        if (!is_dir($path))
            mkdir($path, 0777, TRUE);
        $config['upload_path']         = './' . $path;
        $config['allowed_types']     = 'csv|CSV|xlsx|XLSX|xls|XLS';
        $config['max_filename']         = '255';
        $config['encrypt_name']     = TRUE;
        $config['max_size']         = 4096;
        $this->load->library('upload', $config);
    }

    public function tarik()
    {
        $nis = $this->input->post('nis', true);
        $tujuan = $this->input->post('tujuan', true);

        $jl = date('Y-m-d');
        $g1 = '2023-01-28';
        $g2 = '2023-03-11';
        $g3 = '2023-03-12';

        if ($jl <= $g1) {
            $gel = "1";
            $by = 'Rp. 70.000';
        } else if ($jl > $g1 && $jl <= $g2) {
            $gel = "2";
            $by = 'Rp. 120.000';
        } else if ($jl >= $g3) {
            $gel = "3";
            $by = 'Rp. 170.000';
        }

        $dts = $this->user->getBy('tb_lama', 'nis', $nis)->row();
        $dtada = $this->user->getBy('tb_santri', 'nis', $nis)->num_rows();

        $data = [
            'id_santri' => $dts->id_santri,
            'nis' => $dts->nis,
            'nisn' => $dts->nisn,
            'nik' => $dts->nik,
            'no_kk' => $dts->no_kk,
            'nama' => $dts->nama,
            'tempat' => $dts->tempat,
            'tanggal' => $dts->tanggal,
            'jkl' => $dts->jkl,
            'lembaga' => $tujuan,
            'jln' => $dts->jln,
            'rt' => $dts->rt,
            'rw' => $dts->rw,
            'desa' => $dts->desa,
            'kec' => $dts->kec,
            'kab' => $dts->kab,
            'prov' => $dts->prov,
            'bapak' => $dts->bapak,
            'a_nik' => $dts->nik_a,
            'a_tempat' => $dts->tempat_a,
            'a_tanggal' => $dts->tanggal_a,
            'a_pkj' => $dts->pkj_a,
            'a_pend' => $dts->pend_a,
            'ibu' => $dts->ibu,
            'i_nik' => $dts->nik_i,
            'i_tempat' => $dts->tempat_i,
            'i_tanggal' => $dts->tanggal_i,
            'i_pkj' => $dts->pkj_i,
            'i_pend' => $dts->pend_i,
            'stts' => 'Belum Terverikasi',
            'gel' => $gel,
            'waktu_daftar' => date('Y-m-d H:i'),
            'jenis' => 'mutasi',
            'asal' => $dts->t_formal,
            'ket' => 'lama'
        ];

        if ($dtada > 0) {
            $this->session->set_flashdata('error', 'Maaf. Data sudah ditarik');
            redirect('import');
        } else {
            $this->user->input('tb_santri', $data);
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('ok', 'Data Berhasil Ditarik');
                redirect('import');
            } else {
                $this->session->set_flashdata('error', 'Upload Gagal');
                redirect('import');
            }
        }
    }

    public function pesanBroad()
    {
        $this->input->post('ket', true) === 'semua' ? $ket = " 'baru' OR ket = 'lama' " : $ket = $this->input->post('ket', true);
        $this->input->post('lembaga', true) === 'semua' ? $lembaga = " 'MTs' OR lembaga = 'SMP' OR lembaga = 'MA' OR lembaga = 'SMK'  " : $lembaga = $this->input->post('lembaga', true);
        $this->input->post('jkl', true) === 'semua' ? $jkl = " 'Laki-laki' OR jkl = 'Perempuan' " : $jkl = $this->input->post('jkl', true);
        $this->input->post('gel', true) === 'semua' ? $gel = " 1 OR gel = 2 " : $gel = $this->input->post('gel', true);
        $pesan =  $this->input->post('pesan', true);

        $data = $this->user->getBroad($ket, $lembaga, $jkl, $gel)->result();
        // var_dump($data);
        foreach ($data as $ar) {
            echo "
<ul>
<li>" . $ar->nama . "</li>
<li>" . $ar->hp . "</li>
</ul>
";
        }
    }
}
