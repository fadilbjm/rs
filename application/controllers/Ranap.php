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
        if($this->uri->segment('3')==""){
            $this->load->view('ranapHeader');
            $this->load->view('ranap/insIgdAnak');
            $this->load->view('ranapFooter');
        }else {
            $rm = $this->uri->segment(3);
            $data['data'] = $this->m->getPasienRanap($rm);
            $this->load->view('ranapHeader');
            $this->load->view('ranap/insIgdAnak',$data);
            $this->load->view('ranapFooter');
        }
        
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
                anchor(base_url('ranap/igdanak/'.$k->no_rm), '<button class="btn btn-sm btn-primary">IGD Anak</button>')." ".anchor(base_url('ranap/igdibu/'.$k->no_rm), '<button class="btn btn-sm btn-primary">IGD Ibu</button>')
            );
        }
        $out = array(
                "recordsTotal"=>$datas->num_rows(),
                "recordsFiltered"=>$datas->num_rows(),
                'data'=>$data
            );
        echo json_encode($out);
            
    }


    function addigdanak()
    {
        $data = array(
            'no_rm'         => $this->input->post('rm'),
            'nama_pasien'   => $this->input->post('nama_pasien'),
            'umur'          => $this->input->post('umur'),
            'jk'            => $this->input->post('jk'),
            'pendidikan'    => $this->input->post('pendidikan'),
            'agama'         => $this->input->post('agama'),
            'alamat'        => $this->input->post('alamat'),
            'askes'         => $this->input->post('askes')
        );

        $this->db->insert('t_igdanak', $data);
        
        redirect('ranap/pasienranap');
        
    }

}

/* End of file Ranap.php */
