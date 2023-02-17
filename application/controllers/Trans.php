<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Trans extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('BundaModel', 'model');
        $this->load->model('Auth_model');

        $user = $this->Auth_model->current_user();
        if (!$this->Auth_model->current_user() || $user->level != 'adm' && $user->level != 'admin') {
            redirect('login/logout');
        }
    }

    public function keluar()
    {
        $data['judul'] = 'trans';
        $data['user'] = $this->Auth_model->current_user();
        $this->load->view('bunda/head', $data);
        $this->load->view('bunda/keluar', $data);
        $this->load->view('bunda/foot');
    }

    public function addKeluar()
    {
        $data = [
            'id_keluar' => $this->uuid->v4(),
            'nominal' => rmRp($this->input->post('nominal', true)),
            'ket' => $this->input->post('ket', true),
            'tanggal' => $this->input->post('tanggal', true),
            'sumber' => $this->input->post('sumber', true),
            'pj' => $this->input->post('pj', true)
        ];

        $this->model->tambah('keluar', $data);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('ok', 'Pengeluaran Berhasil Ditambahkan');
            redirect('trans/keluar');
        } else {
            $this->session->set_flashdata('error', 'Pengeluaran Tidak Berhasil Ditambahkan');
            redirect('trans/keluar');
        }
    }

    public function delKeluar($id)
    {
        $this->model->del('keluar', 'id_keluar', $id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('ok', 'Pengeluaran Berhasil Dihapus');
            redirect('trans/keluar');
        } else {
            $this->session->set_flashdata('error', 'Pengeluaran Tidak Berhasil Dihapus');
            redirect('trans/keluar');
        }
    }
}
