<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kamar extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('KamarModel', 'model');
        $this->load->model('Auth_model');

        $user = $this->Auth_model->current_user();

        if (!$this->Auth_model->current_user() || $user->level != 'adm' && $user->level != 'admin') {
            redirect('login/logout');
        }
    }

    public function putra()
    {
        $data['judul'] = 'kamar';
        $data['user'] = $this->Auth_model->current_user();

        $data['komplek'] = $this->model->getByGroup('lemari_data', 'jkl', 'Laki-laki', 'komplek')->result();
        // $data['bonang'] = $this->model->getByGroup('lemari_data', 'komplek', 'Sunan Bonang', 'kamar')->result();
        // $data['jati'] = $this->model->getByGroup('lemari_data', 'komplek', 'Sunan Gunung Jati', 'kamar')->result();

        $this->load->view('adm/head', $data);
        $this->load->view('adm/kamarPa', $data);
        $this->load->view('adm/foot');
    }

    public function putri()
    {
        $data['judul'] = 'kamar';
        $data['user'] = $this->Auth_model->current_user();

        $data['komplek'] = $this->model->getByGroup('lemari_data', 'jkl', 'Perempuan', 'komplek')->result();
        // $data['bonang'] = $this->model->getByGroup('lemari_data', 'komplek', 'Sunan Bonang', 'kamar')->result();
        // $data['jati'] = $this->model->getByGroup('lemari_data', 'komplek', 'Sunan Gunung Jati', 'kamar')->result();

        $this->load->view('adm/head', $data);
        $this->load->view('adm/kamarPa', $data);
        $this->load->view('adm/foot');
    }

    public function detail($id)
    {
        $data['judul'] = 'kamar';
        $data['user'] = $this->Auth_model->current_user();

        $data['data'] = $this->model->getBy('lemari_data', 'id', $id)->row();

        $nis = $data['data']->nis == '' ? '00000' : $data['data']->nis;

        $data['santri'] = $this->model->getBy('tb_santri', 'nis', $nis)->row();
        $foto = $this->model->getBy('foto_file', 'nis', $nis)->row();
        $data['foto'] = $foto ? $foto->diri : '';
        $data['santriData'] = $this->model->santriData();

        $this->load->view('adm/head', $data);
        $this->load->view('adm/detailKamar', $data);
        $this->load->view('adm/foot');
    }

    public function updateLoker()
    {
        $id = $this->input->post('id', true);
        $nis = $this->input->post('nis', true);

        $data = ['nis' => $nis];

        $this->model->update('lemari_data', $data, 'id', $id);
        if ($this->db->affected_rows() > 0) {
            redirect('kamar/detail/' . $id);
        } else {
            redirect('kamar/detail/' . $id);
        }
    }

    public function delMilik($id)
    {
        $data = ['nis' => ''];

        $this->model->update('lemari_data', $data, 'id', $id);
        if ($this->db->affected_rows() > 0) {
            redirect('kamar/detail/' . $id);
        } else {
            redirect('kamar/detail/' . $id);
        }
    }

    public function tempat()
    {
        $data['judul'] = 'kamar';
        $data['user'] = $this->Auth_model->current_user();
        $data['data'] = $this->model->getTempat()->result();

        $this->load->view('adm/head', $data);
        $this->load->view('adm/tempatKamar', $data);
        $this->load->view('adm/foot');
    }
}
