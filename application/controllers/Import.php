<?php
defined('BASEPATH') or exit('No direct script access allowed');

require 'vendor/autoload.php';

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
        $data['lama'] = $this->user->ambilsantriLama()->result();

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
            $by = 'Rp. 80.000';
        } else if ($jl > $g1 && $jl <= $g2) {
            $gel = "2";
            $by = 'Rp. 130.000';
        } else if ($jl >= $g3) {
            $gel = "3";
            $by = 'Rp. 180.000';
        }

        $dts = $this->user->ambilsantriLamaNis($nis)->row();
        $dtada = $this->user->getBy('tb_santri', 'nis', $nis)->num_rows();

        $data = [
            'id_santri' => $this->uuid->v4(),
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
            'gel' => 1,
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
        $key = $this->user->apiKey()->row();

        $pesan =  $this->input->post('pesan', true);
        // $data = $this->user->getBroad($ket, $lembaga, $jkl, $gel)->result();

        $stts = $this->input->post('stts', true);
        $gel = $this->input->post('gel', true);
        $lembaga = $this->input->post('lembaga', true);
        $jkl = $this->input->post('jkl', true);
        $ket = $this->input->post('ket', true);

        $query = "SELECT * FROM tb_santri WHERE ";

        if (!empty($stts)) {
            $query .= "stts = '$stts'";
        } else {
            $query .= "stts IN ('Terverifikasi', 'Belum Terverifikasi')";
        }

        $query .= " AND ";

        if (!empty($gel)) {
            $query .= "gel = '$gel'";
        } else {
            $query .= "gel IN ('1', '2', '3')";
        }

        $query .= " AND ";

        if (!empty($lembaga)) {
            $query .= "lembaga = '$lembaga'";
        } else {
            $query .= "lembaga IN ('MTs', 'SMP', 'MA', 'SMK')";
        }

        $query .= " AND ";

        if (!empty($jkl)) {
            $query .= "jkl = '$jkl'";
        } else {
            $query .= "jkl IN ('Laki-laki', 'Perempuan')";
        }

        $query .= " AND ";

        if (!empty($ket)) {
            $query .= "ket = '$ket'";
        } else {
            $query .= "ket IN ('baru', 'lama')";
        }

        $data = $this->db->query($query)->result();

        foreach ($data as $row) :
            $hp = $row->hp;
            kirim_person($key->api_key, $hp, $pesan);
        endforeach;

        echo "
        
            <table border='1'>
        <thead>
            <tr>
                <th>No</th>
                <th>NIS</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Lembaga</th>
                <th>Status</th>
                <th>Ket</th>
                <th>Gel</th>
            </tr>
        </thead>
        <tbody>
            
            ";
        $no = 1;
        foreach ($data as $row) :

            echo "

                <tr>
                    <td>" . $no++ . "</td>
                    <td>" . $row->nis . "</td>
                    <td>" . $row->nama . "</td>
                    <td>" . $row->desa . "</td>
                    <td>" . $row->lembaga . "</td>
                    <td>" . $row->stts . "</td>
                    <td>" . $row->ket . "</td>
                    <td>" . $row->gel . "</td>
                </tr>
             ";
        endforeach;
        echo " 
        </tbody>
    </table>
        
        ";

        // echo $pesan;

    }
}
