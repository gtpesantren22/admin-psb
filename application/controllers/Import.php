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
            $json = [
                'error_message' => showErrorMessage($this->upload->display_errors()),
            ];
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
                    $json = [
                        'success_message'     => showSuccessMessage("All Entries are imported successfully."),
                    ];
                } else {
                    $json = [
                        'error_message'     => showErrorMessage("Something went wrong. Please try again.")
                    ];
                }
            } else {
                $json = [
                    'error_message' => showErrorMessage("No new record is found."),
                ];
            }
        }
        echo json_encode($json);
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
}