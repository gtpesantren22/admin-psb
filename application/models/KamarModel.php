<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class KamarModel extends CI_Model
{
    public function getBy($tbl, $wh, $dtwh)
    {
        $this->db->from($tbl);
        $this->db->where($wh, $dtwh);
        return $this->db->get();
    }

    public function getByGroup($tbl, $wh, $dtwh, $gr)
    {
        $this->db->from($tbl);
        $this->db->where($wh, $dtwh);
        $this->db->group_by($gr);
        return $this->db->get();
    }

    public function getByGroup2($tbl, $wh, $dtwh, $wh2, $dtwh2, $gr)
    {
        $this->db->from($tbl);
        $this->db->where($wh, $dtwh);
        $this->db->where($wh2, $dtwh2);
        $this->db->group_by($gr);
        return $this->db->get();
    }

    public function getBy2($tbl, $wh, $dtwh, $wh2, $dtwh2)
    {
        $this->db->from($tbl);
        $this->db->where($wh, $dtwh);
        $this->db->where($wh2, $dtwh2);
        return $this->db->get();
    }

    public function santriData()
    {
        // $subquery = $this->db->select('nis')->from('lemari_data')->where('nis')->get_compiled_select();

        // $this->db->from('tb_santri');
        // $this->db->where('lembaga <>', 'RA');
        // $this->db->where('lembaga <>', 'MI');
        // $this->db->where('ket', 'baru');
        // $this->db->where("NOT EXISTS ($subquery)");
        $qr = $this->db->query("SELECT * FROM tb_santri WHERE lembaga <> 'RA' AND lembaga <> 'MI' AND ket = 'baru' AND NOT EXISTS (SELECT * FROM lemari_data WHERE tb_santri.nis=lemari_data.nis) ");
        return $qr->result();
    }

    public function update($tbl, $data, $wh, $dtwh)
    {
        $this->db->where($wh, $dtwh);
        $this->db->update($tbl, $data);
    }

    public function getTempat()
    {
        $this->db->select('tb_santri.nama, lemari_data.*');
        $this->db->from('lemari_data');
        $this->db->join('tb_santri', 'lemari_data.nis=tb_santri.nis');
        return $this->db->get();
    }
}
