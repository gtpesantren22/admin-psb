<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DaftarModel extends CI_Model
{
    function baru()
    {
        $this->db->from('bp_daftar');
        $this->db->join('tb_santri', 'ON tb_santri.nis=bp_daftar.nis');
        $this->db->where('tb_santri.ket', 'baru');
        return $this->db->get();
    }

    function lama()
    {
        $this->db->from('bp_daftar');
        $this->db->join('tb_santri', 'ON tb_santri.nis=bp_daftar.nis');
        $this->db->where('tb_santri.ket', 'lama');
        return $this->db->get();
    }

    function getBpNis($nis)
    {
        $this->db->where('nis', $nis);
        $this->db->from('bp_daftar');
        return $this->db->get();
    }

    function hapus($table, $where)
    {
        $this->db->where('id_bayar', $where);
        $this->db->delete($table);
    }

    function getId($id)
    {
        $this->db->from('bp_daftar');
        $this->db->join('tb_santri', 'ON tb_santri.nis=bp_daftar.nis');
        $this->db->where('bp_daftar.id_bayar', $id);
        return $this->db->get();
    }

    function apikey()
    {
        $this->db->select('*');
        $this->db->from('api');
        return $this->db->get();
    }

    function noBp()
    {
        $this->db->from('tb_santri');
        $this->db->where('NOT EXISTS (SELECT * FROM bp_daftar WHERE bp_daftar.nis=tb_santri.nis)', '', false);
        $this->db->where('ket', 'baru');
        return $this->db->get();
    }

    function tambah($data)
    {
        $this->db->insert('bp_daftar', $data);
    }

    function santriNis($data)
    {
        $this->db->from('tb_santri');
        $this->db->where('nis', $data);
        return $this->db->get();
    }

    function edit($table, $data, $where){
        $this->db->where('nis', $where);
        $this->db->update($table, $data);
    }

    function noBpLama()
    {
        $this->db->from('tb_santri');
        $this->db->where('NOT EXISTS (SELECT * FROM bp_daftar WHERE bp_daftar.nis=tb_santri.nis)', '', false);
        $this->db->where('ket', 'lama');
        return $this->db->get();
    }
}