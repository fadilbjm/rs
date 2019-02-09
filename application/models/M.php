<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class M extends CI_Model {

    function getPasien()
    {
        $q = $this->db->get('t_pasien');
        return $q;
    }

}

/* End of file M.php */
