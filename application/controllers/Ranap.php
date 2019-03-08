<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ranap extends CI_Controller {

    public function index()
    {
        $this->load->view('ranapHeader');
        $this->load->view('ranap/dashboard');
        $this->load->view('ranapFooter');
        
    }

   public function pasien()
   {
       $this->load->view('ranapHeader');
       $this->load->view('ranap/pasien');
       
   }
   function get()
   {
    $data=array();
    $datas=$this->m->getPasien();
    foreach ($datas->result() as $k ) {
        $data[] = array(
            $k->no_rm,
            $k->nama,
            $k->no_bpjs,
            $k->jk,
            $k->telpon,
            anchor(base_url('ranap/regisranap/'.$k->no_rm.'/'.$k->nama), '<button class="btn btn-sm btn-info">Buat Rawat Inap</button>')
        );
    }
    $out = array(
            "recordsTotal"=>$datas->num_rows(),
            "recordsFiltered"=>$datas->num_rows(),
            'data'=>$data
        );
    echo json_encode($out);
   }

   public function regisranap()
   {
       $uri =$this->uri->segment(3);
        $this->load->view('ranapHeader');
        
            $data['px']= $this->m->getDetail($uri);
            $this->load->view('ranap/ranap', $data);
            $this->load->view('ranapFooter');
         
   }



}

/* End of file Ranap.php */
