<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('AdminModel', 'model');
		$this->load->model('Auth_model');

		$user = $this->Auth_model->current_user();

		if (!$this->Auth_model->current_user() || $user->level != 'adm' && $user->level != 'admin') {
			redirect('login/logout');
		}
	}

	public function index()
	{
		$data['judul'] = 'home';
		$data['user'] = $this->Auth_model->current_user();
		
		$data['total'] = $this->model->total()->num_rows();
		$data['totalPa'] = $this->model->totalPa()->num_rows();
		$data['totalPi'] = $this->model->totalPi()->num_rows();

		$data['RAPa'] = $this->model->jmlLem('RA', 'Laki-laki')->num_rows();
		$data['RAPi'] = $this->model->jmlLem('RA', 'Perempuan')->num_rows();
		
		$data['MIPa'] = $this->model->jmlLem('MI', 'Laki-laki')->num_rows();
		$data['MIPi'] = $this->model->jmlLem('MI', 'Perempuan')->num_rows();

		$data['MTsPa'] = $this->model->jmlLem('MTs', 'Laki-laki')->num_rows();
		$data['MTsPi'] = $this->model->jmlLem('MTs', 'Perempuan')->num_rows();

		$data['SMPPa'] = $this->model->jmlLem('SMP', 'Laki-laki')->num_rows();
		$data['SMPPi'] = $this->model->jmlLem('SMP', 'Perempuan')->num_rows();

		$data['MAPa'] = $this->model->jmlLem('MA', 'Laki-laki')->num_rows();
		$data['MAPi'] = $this->model->jmlLem('MA', 'Perempuan')->num_rows();

		$data['SMKPa'] = $this->model->jmlLem('SMK', 'Laki-laki')->num_rows();
		$data['SMKPi'] = $this->model->jmlLem('SMK', 'Perempuan')->num_rows();


		$this->load->view('adm/head', $data);
		$this->load->view('adm/index', $data);
		$this->load->view('adm/foot');
	}
}