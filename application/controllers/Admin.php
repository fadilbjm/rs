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
        $data['data'] = $this->m->getRM();
        $head;
        $this->load->view('admin/regis',$data);
        
    }

    /* function tes()
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
    } */

    function procReg()
    {
        if ($_GET['q']=="belum") {
            $where = array(
                'no_rm' => $this->input->post('rm'),
                'no_ktp'=> $this->input->post('nik'),
                'nama'  => $this->input->post('nama'),
                'tgl_lahir'=> $this->input->post('tgl_lahir'),
                'nama_wali'=> $this->input->post('wali'),
                'alamat'    => $this->input->post('alamat'),
                'no_bpjs'   => $this->input->post('bpjs'),
                'jk'        => $this->input->post('jk'),
                'telpon'    => $this->input->post('hp')
            );
            $this->db->insert('t_pasien', $where);
            
            redirect('admin/registrasi');
            
        }else{
            echo "masih dalam pengembangan";
        }
    }
    
    public function tes()
    {
        $a = 1;
        echo substr_count($a,1);
    }

}

/* End of file Admin.php */
