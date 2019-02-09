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
        $foot;
    }

}

/* End of file Admin.php */
