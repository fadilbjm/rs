<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Apoteker extends CI_Controller {

    public function index()
    {
        $this->load->view('apotHeader');
        $this->load->view('apoteker/dashboard');
        $this->load->view('apotFooter');
        
    }

    public function obat()
    {
        $data['obat'] = $this->m->getObat();
        $this->load->view('apotHeader');
        $this->load->view('apoteker/obat',$data);
        $this->load->view('apotFooter');
    }

    function insObat()
    {
        $data = array(
                'id_obat'   =>  $this->input->post('id'),
                'nama_obat' =>  $this->input->post('nama'),
                'stok'      =>  $this->input->post('stok'),
                'harga'     =>  $this->input->post('harga'),
                'jenis_obat'=>  $this->input->post('jenis')
                );
        $this->db->insert('t_obat', $data);
        
        redirect('apoteker/obat');
        
        
    }

    function edtObat()
    {
        $id = $this->uri->segment(3);
        $data=array(
            'nama_obat' => $this->input->post('nama'),
            'stok' => $this->input->post('stok'),
            'harga' => $this->input->post('harga'),
            'jenis_obat' => $this->input->post('jenis')
        );

        $this->db->where('id_obat',$id);
        $this->db->update('t_obat', $data);
        

        
        redirect('apoteker/obat');
        
        
    }

    function delObat()
    {
        echo "Hubungi Admin.... .... .... .... ..... ...... ........ .......... .............. .................. .....................";
    }

    public function tes()
    {
        echo 4*4;
        
    }

    public function kasir()
    {
        $data['kode'] = $this->m->getKodePembayaran();
        $data['total'] = $this->m->hitungTotal();
        $this->load->view('apotHeader');
        $this->load->view('apoteker/kasir', $data);
        $this->load->view('apotFooter');
        
    }

    function addKasir()
    {
        $tipe = $this->input->get('q');
        if ($tipe === "puyer") {
            $puyer=$this->input->post("puyer");
            $pecah = explode(":",$puyer);            
            
            $data = array(
                    'kode_pembayaran'   => $this->input->post('id') ,
                    'nama_obat' => $pecah[0], 
                    'banyak'    =>  $banyak,
                    'subtotal'  =>  $pecah[1],
                    'status'    =>  'belum'
                );
        }elseif ($tipe === "biasa") {
            echo "lkfasijdlkasf";
        }else {
            echo "access forbidden";
        } 
        }
    

}

/* End of file Apoteker.php */
