<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $head = $this->load->view('admHeader');
        $foot = $this->load->view('admFooter');
    }
    

    
    public function index()
    {
        $head;
        $this->load->view('admin/dashboard');
        
        $foot;
    }

    public function pasien()
    {
        $data['data']=$this->m->getPasien();

        $head;
        $this->load->view('admin/pasien', $data);
        $foot;
    }

}

/* End of file Admin.php */
