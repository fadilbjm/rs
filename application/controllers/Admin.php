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
        $data['data'] = $this->m->getPenyakit();
        $this->load->view('admHeader');
        $this->load->view('admin/dashboard',$data);
        // $this->load->view('admFooter');
        
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
                anchor(base_url('admin/registrasi/'.$k->no_rm.'/'.$k->nama), '<button class="btn btn-sm btn-info">Buat Rajal</button>')
            );
        }
        $out = array(
                "recordsTotal"=>$datas->num_rows(),
                "recordsFiltered"=>$datas->num_rows(),
                'data'=>$data
            );
        echo json_encode($out);
        
    }

    public function pasien()
    {
        $data['data']=$this->m->getPasien();
        $data['rm'] = $this->m->getRM();
        $this->load->view('admHeader');
        $this->load->view('admin/pasien', $data);
        // $this->load->view('admFooter');
    }

    public function registrasi()
    {
        
        $data['poli'] = $this->m->getPoli();
        $data['dokter'] = $this->m->getDokter();
        $data['keluhan'] =$this->m->getKeluhan();
        $this->load->view('admHeader');
        $this->load->view('admin/regis',$data);
        
    }

    function tes()
    {
        ###
        echo $this->db->join('t_plo', 'no = adf', 'left');
        
    }

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
    
    /*public function tes()
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
###                                     ####           ####                             ###
###                                                                                     ###
####                                                                                   ####
  ####                                                                                 ####
  ####                                                                                 ####
  #######                                                                         #######
  #######################################################################################

    }*/

    public function getDoc()
    {
        $data =array();
        $datas = $this->m->getDokter();
        foreach ($datas->result() as $d ) {
            $data[]=array(
                $d->nama_pegawai,
                $d->poli
            );
        }
        $out = array(
            'data'=>$data
        );
        echo json_encode($out);
        
    }


    function getPenyakit()
    {
        
    }

    

}

/* End of file Admin.php */
