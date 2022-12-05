<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class BerkasModel extends CI_Model
{

	public function baru()
	{
		$this->db->from('berkas_file');
		$this->db->join('tb_santri', 'ON berkas_file.nis=tb_santri.nis');
		$this->db->where('tb_santri.ket', 'baru');
		$this->db->order_by('nama', 'ASC');
		$result = $this->db->get()->result(); // Tampilkan semua data kota berdasarkan id provinsi

		return $result;
	}

	public function atr()
	{
		$this->db->from('atribut');
		$this->db->join('tb_santri', 'ON atribut.nis=tb_santri.nis');
		$this->db->where('tb_santri.ket', 'baru');
		$this->db->order_by('nama', 'ASC');
		$result = $this->db->get()->result(); // Tampilkan semua data kota berdasarkan id provinsi

		return $result;
	}

	public function atrNo()
	{
		$this->db->from('tb_santri');
		$this->db->where('NOT EXISTS (SELECT * FROM atribut WHERE atribut.nis=tb_santri.nis)', '', false);
		$this->db->where('tb_santri.ket', 'baru');
		return $this->db->get();
	}

	public function dtlBerkas($nis)
	{
		$this->db->from('berkas_file');
		$this->db->join('tb_santri', 'ON berkas_file.nis=tb_santri.nis');
		$this->db->where('berkas_file.nis', $nis);
		$result = $this->db->get(); // Tampilkan semua data kota berdasarkan id provinsi

		return $result;
	}

	function getFile($nis)
	{
		$this->db->where('nis', $nis);
		$this->db->from('berkas_file');
		return $this->db->get();
	}

	function input($tbl, $nis)
	{
		$this->db->insert($tbl, ['nis' => $nis]);
	}

	function upload($tbl, $data, $where)
	{
		$this->db->where('nis', $where);
		$this->db->update($tbl, $data);
	}
}