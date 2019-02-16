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
        $kodeJenis =  $this->input->post('jenis');
        // melakukan cek dan tambah  pada jenis
        $data['getJenis'] = $this->m->getJenis()->rows();
        $data = array(
                'id_obat'   =>  $this->input->post('id'),
                'nama_obat' =>  $this->input->post('nama'),
                'stok'      =>  $this->input->post('stok'),
                'harga'     =>  $this->input->post('harga'),
                'jenis_obat'=> 
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
        echo date('D d-M-Y');
        /* foreach ($data['a'] as $d ) {
            echo $d[2];
        } */
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
        $kodePemb = "";
        $data['a']=$this->m->cekKodePemb()->row();
        if($data['a']->status === "sudah"){
            $kodePemb = $data['a']->kode_pembayaran+1;
            
        }else {
            $kodePemb = $data['a']->kode_pembayaran;
        }

        $tipe = $this->input->get('q');
        if ($tipe === "puyer") {
            $puyer=$this->input->post("puyer");
            $pecah = explode(":",$puyer);            
                    
            $data = array(
                    'kode_pembayaran'   => $kodePemb ,
                    'nama_obat' => $pecah[0], 
                    'banyak'    =>  $this->input->post('banyak'),
                    'subtotal'  =>  $pecah[1],
                    'status'    =>  'belum'
                );
            $this->db->insert('t_semen',$data);
            
            redirect('apoteker/kasir');
            
        }elseif ($tipe === "biasa") {
            echo "lkfasijdlkasf";
        }else {
            echo "access forbidden please tell to admin!";
        } 
    }

    function delKasir()
    {
        $this->db->delete('t_semen',array('id_semen'=>$this->uri->segment(3)));
        
        redirect('apoteker/kasir');
        
    }
    function bayar()
    {
        $kode = $this->input->post('id');
        $kembalian = $this->input->post('uang') - $this->input->post('tot');
        
        $data = array(
            'kode_pembayaran'=>$kode,
            'total'=>$this->input->post('tot'),
            'kembalian'=>$kembalian,
            'tgl'=>date("D, d - M - Y")
        );
        $this->db->query(" UPDATE `t_semen` SET `status` = 'sudah' WHERE kode_pembayaran = '$kode' AND status = 'belum' ");
        $this->db->insert('t_pembayaran', $data);
        
        redirect('apoteker/kasir');
        
        
    }
    

}

/* End of file Apoteker.php */
