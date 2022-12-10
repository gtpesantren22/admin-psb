<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class InfoModel extends CI_Model
{

	public function data()
	{
		$this->db->order_by('tanggal', 'DESC');
		return $this->db->from('info')->get();
	}

	function tambah($table, $data)
	{
		$this->db->insert($table, $data);
	}
}