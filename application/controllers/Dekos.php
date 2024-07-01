<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dekos extends CI_Controller
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

    function index()
    {
        $data['judul']     = "dekos";
        $data['user'] = $this->Auth_model->current_user();

        $data['dekosan'] = $this->model->getJoin('dekos', 'tb_santri', 'nis', 'nis');
        $data['tmpKos'] = array("", "Kantin", "Gus Zaini", "Ny. Farihah", "Ny. Zahro", "Ny. Sa'adah", "Ny. Mamjudah", "Ny. Naily Z.", "Ny. Lathifah", "Ny. Ummi Kultsum");
        $data['jmlDekos'] = $this->db->query("SELECT COUNT(*) AS jml, t_kos FROM dekos GROUP BY t_kos ORDER BY t_kos ASC");

        $this->load->view('bunda/head', $data);
        $this->load->view('bunda/dekos', $data);
        $this->load->view('bunda/foot');
    }

    function edit()
    {
        $nis = $this->input->post('nis', true);
        $data = [
            'nominal' => rmRp($this->input->post('nominal', true)),
            't_kos' => $this->input->post('t_kos', true),
        ];

        $this->model->edit('dekos', 'nis', $nis, $data);
    }

    function del($id)
    {
        $this->model->del('dekos', 'id_kos', $id);

        if ($this->db->affected_rows() > 0) {
            redirect('dekos');
        }
    }
}
