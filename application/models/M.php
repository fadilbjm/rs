<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class M extends CI_Model {

    function getPasien()
    {
        $q = $this->db->get('t_pasien');
        return $q;
    }

    function getTest()
    {
        $this->db->from('tes');
        $this->db->order_by('nomor', 'desc');
        $this->db->limit(1);
        $q = $this->db->get();
        return $q;
    }

    function getRM()
    {
        $this->db->from('t_pasien');
        $this->db->order_by('no_rm', 'desc');
        $this->db->limit(1);
        $q = $this->db->get();
        return $q;
    }

    function getPoli()
    {
        $q = $this->db->get("t_poli");
        return $q;
    }

    function getNamaPasien($norm)
    {
        $q = $this->db->get_where('t_pasien',array("no_rm"=>$norm));
        return $q;
    }
    function getDokter()
    {
        // $w = array('posisi'=>"dokter")
        $q = $this->db->get_where('t_pegawai',array("posisi"=>"dokter"));
        return $q;  
    }

    function getKeluhan()
    {
        $this->db->from('t_rajal');
        $this->db->order_by('id_rajal', 'desc');
        $q = $this->db->get();
        return $q;
    }

    function getObat()
    {
        $this->db->from('t_obat');
        $this->db->order_by('id_obat', 'desc');
        $q = $this->db->get();
        return $q;
    }

    function getObatEdit($id)
    {
        $idobat = $id;
        $q = $this->db->get_where("t_obat",array('id_obat'=>$idobat));
        return $q;
    }
}

/* End of file M.php */
