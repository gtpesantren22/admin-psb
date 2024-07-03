<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class ImageModel extends CI_Model
{
	function getData()
	{
		$this->db->from('foto_file');
		$this->db->join('tb_santri', 'ON foto_file.nis=tb_santri.nis');
		$this->db->where('tb_santri.ket', 'baru');
		$this->db->where('tb_santri.lembaga !=', 'MI');
		$this->db->where('tb_santri.lembaga !=', 'RA');
		return $this->db->get();
	}

	function getDataNis($nis)
	{
		$this->db->from('foto_file');
		$this->db->join('tb_santri', 'ON foto_file.nis=tb_santri.nis');
		$this->db->where('foto_file.nis', $nis);
		return $this->db->get();
	}

	function getFotoNis($nis)
	{
		$this->db->from('foto_file');
		$this->db->where('nis', $nis);
		return $this->db->get();
	}

	function upload($tbl, $data, $where)
	{
		$this->db->where('nis', $where);
		$this->db->update($tbl, $data);
	}

	function getFoto($nis)
	{
		$this->db->where('nis', $nis);
		$this->db->from('foto_file');
		return $this->db->get();
	}
	function input($tbl, $nis)
	{
		$this->db->insert($tbl, ['nis' => $nis]);
	}

	public function getKTS($gel)
	{
		$this->db->from('foto_file');
		$this->db->join('tb_santri', 'ON foto_file.nis=tb_santri.nis');
		$this->db->where('tb_santri.gel', $gel);
		$this->db->where('tb_santri.ket', 'baru');
		$this->db->order_by('tb_santri.jkl', 'ASC');
		return $this->db->get();
	}
}
