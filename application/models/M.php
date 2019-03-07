<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class M extends CI_Model {

    function getPasien()
    {
        $q = $this->db->get('t_pasien');
        return $q;
    }
    function getPasiens($no)
    {
        $q = $this->db->get_where('t_pasien',array('no_rm'=>$no));
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

    function getKodePembayaran()
    {
        $this->db->from('t_semen');
        $this->db->where('status', "belum");
        
        $this->db->order_by('kode_pembayaran', 'desc');
        $q = $this->db->get();
        return $q;
    }

    function hitungTotal()
    {
        $q=$this->db->query("SELECT sum(subtotal) AS total FROM t_semen WHERE status = 'belum'");
        return $q->row()->total;
        
    }

    function cekKode()
    {
        $q = $this->db->query("SELECT kode_obat FROM t_obat");
        return $q;
    }

    function cekKodePemb()
    {
        $q = $this->db->query('SELECT * FROM t_semen WHERE status = "sudah" ORDER BY kode_pembayaran DESC LIMIT 1');
        return $q;
    }
    function getJenis($id)
    {
        $q = $this->db->query("SELECT kode_obat FROM t_obat");
        return $q;
    }

    function cekIdObat($id)
    {
        $q = $this->db->get_where('t_obat',array('id_obat'=>$id));
        return $q;
    }

    function getPemb()
    {
        $this->db->order_by('id_pembayaran', 'desc');
        
        $q = $this->db->get('t_pembayaran');
        return $q;
    }

    function forCetak()
    {
        $q=$this->db->get('t_pembayaran');
        return $q;
    }

    function getDetail($rm)
    {
        $q=$this->db->get_where('t_pasien',array('no_rm'=>$rm));
        return $q;
    }

    function getPasienRanap($rm)
    {
        $q=$this->db->get_where('t_pasien',array('no_rm'=>$rm));
        return $q;
    }

    function getRanapAnak()
    {
        $q = $this->db->get('t_igdanak');
        return $q;
    }

    function getPenyakit()
    {
        $q = $this->db->get('t_rajal');
        return $q;
    }
    ### FUNGSI TEST!!!!!!! ###
    function tes()
    {
        
    }
}

/* End of file M.php */
