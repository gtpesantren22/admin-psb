<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	public function index()
	{
		$this->load->view('bunda/head');
		$this->load->view('bunda/index');
		$this->load->view('bunda/foot');
	}
}