<?php
defined('BASEPATH') or exit('No direct script access allowed');

class RegistModel extends CI_Model
{
    function baru()
    {
        $this->db->select('tb_santri.nama, tb_santri.lembaga, tb_santri.nis, tanggungan.*, seragam.atasan, seragam.bawahan');
        $this->db->from('tanggungan');
        $this->db->join('tb_santri', 'ON tb_santri.nis=tanggungan.nis');
        $this->db->join('seragam', 'ON tb_santri.nis=seragam.nis', 'left');
        $this->db->where('tb_santri.ket', 'baru');
        return $this->db->get();
    }

    function lama()
    {
        $this->db->from('tanggungan');
        $this->db->join('tb_santri', 'ON tb_santri.nis=tanggungan.nis');
        $this->db->where('tb_santri.ket', 'lama');
        return $this->db->get();
    }

    function hapus($table, $where)
    {
        $this->db->where('id_regist', $where);
        $this->db->delete($table);
    }

    function getId($id)
    {
        $this->db->from('regist');
        $this->db->join('tb_santri', 'ON tb_santri.nis=regist.nis');
        $this->db->where('regist.id_regist', $id);
        return $this->db->get();
    }

    function apikey()
    {
        $this->db->select('*');
        $this->db->from('api');
        $this->db->where('id_api', 1);
        return $this->db->get();
    }

    function noBp()
    {
        $this->db->from('bp_daftar');
        $this->db->join('tb_santri', 'ON tb_santri.nis=bp_daftar.nis');
        $this->db->where('NOT EXISTS (SELECT * FROM tanggungan WHERE tanggungan.nis=bp_daftar.nis)', '', false);
        $this->db->where('tb_santri.ket', 'baru');
        return $this->db->get();
    }

    function tambah($table, $data)
    {
        $this->db->insert($table, $data);
    }

    function santriNis($data)
    {
        $this->db->from('tb_santri');
        $this->db->where('nis', $data);
        return $this->db->get();
    }

    function tgnNis($data)
    {
        $this->db->from('tanggungan');
        $this->db->where('nis', $data);
        return $this->db->get();
    }

    function byrSum($nis)
    {
        $this->db->select_sum('nominal');
        $this->db->from('regist');
        $this->db->where('nis', $nis);
        return $this->db->get();
    }

    function byr($nis)
    {
        $this->db->from('regist');
        $this->db->where('nis', $nis);
        return $this->db->get();
    }

    function byrSm()
    {
        $this->db->from('regist_sm');
        $this->db->join('tb_santri', 'ON regist_sm.nis = tb_santri.nis');
        $this->db->order_by('regist_sm.created', 'DESC');
        return $this->db->get();
    }

    function edit($table, $data, $where)
    {
        $this->db->where('nis', $where);
        $this->db->update($table, $data);
    }

    function edit2($table, $data, $where)
    {
        $this->db->where('id_regist', $where);
        $this->db->update($table, $data);
    }

    function noBpLama()
    {
        $this->db->from('tb_santri');
        $this->db->where('NOT EXISTS (SELECT * FROM bp_daftar WHERE bp_daftar.nis=tb_santri.nis)', '', false);
        $this->db->where('ket', 'lama');
        return $this->db->get();
    }

    function getTgn($jkl, $ket)
    {
        $this->db->from('biaya');
        $this->db->where('jkl', $jkl);
        $this->db->where('ket', $ket);
        return $this->db->get();
    }

    function getLanjuRegist()
    {
        $this->db->from('bp_daftar');
        $this->db->join('tb_santri', 'ON. bp_daftar.nis=tb_santri.nis');
        $this->db->where('tb_santri.ket', 'lama');
        return $this->db->get();
    }

    function getBy($table, $where, $dtwhere)
    {
        $this->db->where($where, $dtwhere);
        $this->db->from($table);
        return $this->db->get();
    }
}
