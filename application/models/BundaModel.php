<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class BundaModel extends CI_Model
{
	function santriCount()
	{
		$this->db->from('tb_santri');
		return $this->db->get();
	}
	function bpSum()
	{
		$this->db->select_sum('nominal');
		$this->db->from('bp_daftar');
		return $this->db->get();
	}
	function bpCount()
	{
		$this->db->from('bp_daftar');
		$this->db->group_by('nis');
		return $this->db->get();
	}
	function registSum()
	{
		$this->db->select_sum('nominal');
		$this->db->from('regist');
		return $this->db->get();
	}
	
	function registCount()
	{
		$this->db->from('regist');
		$this->db->group_by('nis');
		return $this->db->get();
	}

	function veris()
	{
		$this->db->from('tb_santri');
		$this->db->where('stts', 'Terverifikasi');
		return $this->db->get();
	}
	
	function sumBpBy($bl, $thn)
	{
		$this->db->select("IFNULL(SUM(nominal), 0) as nom ");
		$this->db->from('bp_daftar');
		$this->db->where('YEAR(tgl_bayar)', $thn);
		$this->db->where('MONTH(tgl_bayar)', $bl);
		return $this->db->get();
	}
	function sumRgBy($bl, $thn)
	{
		$this->db->select("IFNULL(SUM(nominal), 0) as nom ");
		$this->db->from('regist');
		$this->db->where('YEAR(tgl_bayar)', $thn);
		$this->db->where('MONTH(tgl_bayar)', $bl);
		return $this->db->get();
	}
}