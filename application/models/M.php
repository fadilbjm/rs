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

}

/* End of file M.php */
