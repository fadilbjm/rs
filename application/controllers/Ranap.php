<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ranap extends CI_Controller {

    public function index()
    {
        $this->load->view('ranapHeader');
        $this->load->view('ranap/dashboard');
        $this->load->view('ranapFooter');
        
    }

    public function igdanak()
    {
        $this->load->view('ranapHeader');
        $this->load->view('ranap/insIgdAnak');
        $this->load->view('ranapFooter');
    }

}

/* End of file Ranap.php */
