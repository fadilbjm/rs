<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        // $head = $this->load->view('admHeader');
        // $foot = $this->load->view('admFooter');
    }
    

    
    public function index()
    {
        $this->load->view('admHeader');
        $this->load->view('admin/dashboard');
        $this->load->view('admFooter');
        
    }

    public function pasien()
    {
        $data['data']=$this->m->getPasien();
        $data['rm'] = $this->m->getRM();
        $this->load->view('admHeader');
        $this->load->view('admin/pasien', $data);
        // $this->load->view('admFooter');
    }

    public function registrasirajal()
    {
        
        $data['poli'] = $this->m->getPoli();
        $data['dokter'] = $this->m->getDokter();
        $data['keluhan'] =$this->m->getKeluhan();
        $this->load->view('admHeader');
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
            
            redirect('admin/pasien');
            
        }else{
            $nama="";
            $norm = $this->input->post('rm');
            $nnama['n'] = $this->m->getNamaPasien($norm);
            foreach($nnama['n']->result() as $p){
                $nama = $p->nama;
                echo $nama;
            }

            $data = array(
                'id_rajal' => date('ymdhis'),
                'no_rm' => $norm,
                'nama' =>$nama,
                'keluhan'=> $this->input->post('keluhan'),
                'dokter'    =>  $this->input->post('dokter'),
                // 'diagnosa'  => $this->input->post('diagnosa'),
                'poli'      => $this->input->post('poli'),
                'tgl_periksa' =>date('M/d/Y')
            );
            $this->db->insert('t_rajal', $data);
            redirect('admin/registrasi');
        }
    }

    public function updDiag()
    {
        $id     = $this->input->post('id');
        $data = array('diagnosa'=>$this->input->post('diagnosa'));
        $this->db->where('id_rajal', $id);
        $this->db->update('t_rajal', $data);
        
        redirect('admin/registrasi');
        
    }

    public function diag()
    {
        
        $this->load->view('admin/diagnosa');
    }
    
    public function tes()
    {
        ###################################################################################
        #########                   #####     #######                #####        #########
        #########                    ###      #######                 ###         #########
        #########                             #######                             #########
        ###################################################################################
                                              #######
                                              #######
                                              #######
                                              #######
                                              #######
                                              #######
                                              #######
                                            ###########
                                        ######       ######
                                        ######       ######
                                        ######       ######
    }

    public function registrasiranap()
    {
        if($this->uri->segment(3)!= "") 
        {
            $this->load->view('admHeader');
            $this->load->view('admin/ranap');
            $this->load->view('admFooter');
            
        }else {
            echo "masuk dengan no <b>RM</b>!";
            
            header("Refresh:2;url=".base_url('admin/pasien'));
            
        }
    }
    

}

/* End of file Admin.php */
