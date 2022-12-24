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

	function getId($id)
	{
		$this->db->where('id_info', $id);
		$this->db->from('info');
		return $this->db->get();
	}

	function edit($table, $data, $id)
	{
		$this->db->where('id_info', $id);
		$this->db->update($table, $data);
	}

	public function del($id)
	{
		$this->db->where('id_info', $id);
		$this->db->delete('info');
	}

	public function dataVeris()
	{
		$this->db->where_in('lembaga', array('MTs', 'SMP', 'MA', 'SMK'));
		$this->db->where('ket', 'baru');
		$this->db->where('stts', 'Terverifikasi');
		return $this->db->get('tb_santri');
	}

	function apikey()
	{
		$this->db->select('*');
		$this->db->from('api');
		return $this->db->get();
	}
}