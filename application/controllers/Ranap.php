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
        if($uri==""){
            $this->load->view('ranapHeader');
            $this->load->view('ranap/ranap');
            $this->load->view('ranapFooter');
            
        }else {
            $data['data'] = $this->m->getDetail($uri);
            $this->load->view('ranapHeader');
            $this->load->view('ranap/ranap', $data);
            $this->load->view('ranapFooter');
            
        }
         
   }

   public function addranap()
   {
       $datas = array(
           'no_rm'=>$this->input->post('rm'),
           'nama_pasien'=>$this->input->post('nama'),
           'tgl_lahir'=>$this->input->post('umur'),
           'telpon'=>$this->input->post('hp'),
           'jk'=>$this->input->post('jk'),
           'pendidikan'=>$this->input->post('pendidikan'),
           'alamat'=>$this->input->post('alamat'),
           'nama_wali'=>$this->input->post('penanggung'),
           'dokter'=>$this->input->post('dokter'),
           'bersalin_tgl'=>$this->input->post('tglbersalin'),
           'bersalin_jam'=>$this->input->post('jambersalin'),
           'bersalin_anak'=>$this->input->post('anakke'),

       );

       $this->db->insert('t_ranap', $datas);
       
       redirect('ranap/listranap','refresh');
       
   }

   public function listranap()
   {
       $this->load->view('ranapHeader');
       $this->load->view('ranap/dataranap');
       
   }
   function getListRanap()
   {
       $data = $this->m->getPasienRanap();
       $rr = array();
       foreach ($data->result() as $k ) {
           $rr[] = array(
               $k->tgl_masuk,
               $k->no_rm,
               $k->nama_pasien,
               $k->jk,
               $k->telpon,
               $k->dokter,
               '<a href="ranap/keluar"><button class="btn btn-sm btn-success">Check Out</button></a>'.
               '<a href="ranap/detail/'.$k->id_ranap.'"><button class="btn btn-sm btn-info">Detail</button></a>'
           );
       }
       $out = array('data'=>$rr);
       echo json_encode($out);
   }



}

/* End of file Ranap.php */
