<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $head = $this->load->view('admHeader');
        // $foot = $this->load->view('admFooter');
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

        $this->load->view('admHeader');
        $this->load->view('admin/pasien', $data);
        // $this->load->view('admFooter');
    }

    public function registrasi()
    {
        $head;
        $this->load->view('admin/regis');
        
    }

    function tes()
    {
        $data['data'] = $this->m->getTest()->result();
        foreach ($data['data'] as $d ) {
            $nomor = $d->nomor;
            echo $nomor;
            echo "<br>";
            $exp = explode('.', $nomor);
            $ss =$exp[2];
            if($ss>=99){
                $vars=$exp[1]+1;
                $joins = array($exp[0],$vars,"00");
                $imps = implode(".",$joins);
                echo $imps;
            }else{
                $aa = $exp[2]+1;
                $join = array($exp[0],$exp[1],$aa);
                $imp = implode(".",$join);
                echo $imp;
            }
            
        }
    }

}

/* End of file Admin.php */
