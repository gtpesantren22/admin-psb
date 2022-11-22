<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SantriModel extends CI_Model
{
    function baru()
    {
        $this->db->where('ket', 'baru');
        $this->db->from('tb_santri');
        return $this->db->get();
    }

    function lama()
    {
        $this->db->where('ket', 'lama');
        $this->db->from('tb_santri');
        return $this->db->get();
    }
}