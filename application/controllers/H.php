<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class H extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $header = $this->load->view('header');
        $footer = $this->load->view('footer');
    }

    public function index()
    {
        $header;
        $this->load->view('home/home');
        
        $footer;
    }

}

/* End of file H.php */
