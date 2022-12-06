<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class ImageModel extends CI_Model
{
	function getData()
	{
		$this->db->from('foto_file');
		$this->db->join('tb_santri', 'ON foto_file.nis=tb_santri.nis');
		$this->db->where('tb_santri.ket', 'baru');
		return $this->db->get();
	}

	function getDataNis($nis)
	{
		$this->db->from('foto_file');
		$this->db->join('tb_santri', 'ON foto_file.nis=tb_santri.nis');
		$this->db->where('foto_file.nis', $nis);
		return $this->db->get();
	}
}