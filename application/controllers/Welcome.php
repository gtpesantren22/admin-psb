<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	public function index()
	{
		$data['judul'] = 'home';

		$this->load->view('bunda/head', $data);
		$this->load->view('bunda/index');
		$this->load->view('bunda/foot');
	}
}