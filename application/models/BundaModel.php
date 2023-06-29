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
		$this->db->select("IFNULL(SUM(nominal), 0) AS nom");
		$this->db->from('bp_daftar');
		$this->db->where('YEAR(tgl_bayar)', $thn);
		$this->db->where('MONTH(tgl_bayar)', $bl);
		return $this->db->get();
	}
	function sumRgBy($bl, $thn)
	{
		$this->db->select("IFNULL(SUM(nominal), 0) AS nom");
		$this->db->from('regist');
		$this->db->where('YEAR(tgl_bayar)', $thn);
		$this->db->where('MONTH(tgl_bayar)', $bl);
		return $this->db->get();
	}

	public function tambah($table, $data)
	{
		$this->db->insert($table, $data);
	}

	public function del($table, $where, $dtwhere)
	{
		$this->db->where($where, $dtwhere);
		$this->db->delete($table);
	}

	function registPakai()
	{
		$this->db->select_sum('nominal');
		$this->db->from('keluar');
		$this->db->where('sumber', 'regist');
		return $this->db->get();
	}

	function bpPakai()
	{
		$this->db->select_sum('nominal');
		$this->db->from('keluar');
		$this->db->where('sumber', 'daftar');
		return $this->db->get();
	}

	public function getBy($table, $where, $dtwhere)
	{
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where($where, $dtwhere);
		return $this->db->get();
	}

	public function edit($table, $where, $dtwhere, $data)
	{
		$this->db->where($where, $dtwhere);
		$this->db->update($table, $data);
	}

	function getJoin($table1, $table2, $on1, $on2)
	{
		$this->db->from($table1);
		$this->db->join($table2, $table1 . '.' . $on1 . '=' . $table2 . '.' . $on2);
		return $this->db->get();
	}
}
