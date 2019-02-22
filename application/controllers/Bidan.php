<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Bidan extends CI_Controller {

    public function index()
    {
        $this->load->view('ranapHeader');
        $this->load->view('ranap/dashboard');
        $this->load->view('ranapFooter');
        
    }

    public function registrasi()
    {
        $this->load->view('ranapHeader');
        $this->load->view('ranap/registrasi');
        $this->load->view('ranapFooter');
    }

}

/* End of file Bidan.php */
