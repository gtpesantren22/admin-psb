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

        $data['regist'] = $this->model->registSum()->row();
        $data['bp'] = $this->model->bpSum()->row();

        $data['registPakai'] = $this->model->registPakai()->row();
        $data['bpPakai'] = $this->model->bpPakai()->row();


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
            'divisi' => $this->input->post('divisi', true),
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

    public function editKeluar($id)
    {
        $data['judul'] = 'trans';
        $data['user'] = $this->Auth_model->current_user();
        $data['data'] = $this->model->getBy('keluar', 'id_keluar', $id)->row();

        $this->load->view('bunda/head', $data);
        $this->load->view('bunda/editKeluar', $data);
        $this->load->view('bunda/foot');
    }

    public function updaetKeluar()
    {
        $id_keluar = $this->input->post('id', true);

        $data = [
            'nominal' => rmRp($this->input->post('nominal', true)),
            'ket' => $this->input->post('ket', true),
            'tanggal' => $this->input->post('tanggal', true),
            'sumber' => $this->input->post('sumber', true),
            'divisi' => $this->input->post('divisi', true),
            'pj' => $this->input->post('pj', true)
        ];

        $this->model->edit('keluar', 'id_keluar', $id_keluar, $data);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('ok', 'Pengeluaran Berhasil Diupdate');
            redirect('trans/keluar');
        } else {
            $this->session->set_flashdata('error', 'Pengeluaran Tidak Berhasil Diupdate');
            redirect('trans/keluar');
        }
    }

    public function masuk()
    {
        $data['judul'] = 'trans';
        $data['user'] = $this->Auth_model->current_user();

        $data['regist'] = $this->model->registSum()->row();
        $data['bp'] = $this->model->bpSum()->row();

        $data['registPakai'] = $this->model->registPakai()->row();
        $data['bpPakai'] = $this->model->bpPakai()->row();


        $this->load->view('bunda/head', $data);
        $this->load->view('bunda/masuk', $data);
        $this->load->view('bunda/foot');
    }

    public function addMasuk()
    {
        $data = [
            'id_masuk' => $this->uuid->v4(),
            'nominal' => rmRp($this->input->post('nominal', true)),
            'ket' => $this->input->post('ket', true),
            'tanggal' => $this->input->post('tanggal', true),
            'pj' => $this->input->post('pj', true)
        ];

        $this->model->tambah('masuk', $data);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('ok', 'Pemasukan Berhasil Ditambahkan');
            redirect('trans/masuk');
        } else {
            $this->session->set_flashdata('error', 'Pemasukan Tidak Berhasil Ditambahkan');
            redirect('trans/masuk');
        }
    }

    public function delMasuk($id)
    {
        $this->model->del('masuk', 'id_masuk', $id);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('ok', 'Pemasukan Berhasil Dihapus');
            redirect('trans/masuk');
        } else {
            $this->session->set_flashdata('error', 'Pemasukan Tidak Berhasil Dihapus');
            redirect('trans/masuk');
        }
    }
    public function editMasuk($id)
    {
        $data['judul'] = 'trans';
        $data['user'] = $this->Auth_model->current_user();
        $data['data'] = $this->model->getBy('masuk', 'id_masuk', $id)->row();

        $this->load->view('bunda/head', $data);
        $this->load->view('bunda/editMasuk', $data);
        $this->load->view('bunda/foot');
    }

    public function updaetMasuk()
    {
        $id_masuk = $this->input->post('id', true);

        $data = [
            'nominal' => rmRp($this->input->post('nominal', true)),
            'ket' => $this->input->post('ket', true),
            'tanggal' => $this->input->post('tanggal', true),
            'pj' => $this->input->post('pj', true)
        ];

        $this->model->edit('masuk', 'id_masuk', $id_masuk, $data);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('ok', 'Pemasukan Berhasil Diupdate');
            redirect('trans/masuk');
        } else {
            $this->session->set_flashdata('error', 'Pemasukan Tidak Berhasil Diupdate');
            redirect('trans/masuk');
        }
    }
}
