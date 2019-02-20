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
        
        $jenisFix =  $this->input->post('jenis');
        $data = array(
                
                'nama_obat' =>  $this->input->post('nama'),
                'stok'      =>  $this->input->post('stok'),
                'harga'     =>  $this->input->post('harga'),
                'jenis_obat'=>  $jenisFix
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
       /* $pdf = new FPDF('p','mm',array(100,140));
       $pdf->AddPage();
       $pdf->SetFont('Arial', 'B',12);
       $pdf->cell(110,7,"hellooooooo world!",1,6,"C");
       $pdf->cell(11,7,"hellooooooo world!");
       $pdf->output(); */
        /* foreach ($data['a'] as $d ) {
            echo $d[2];
        } */
    }

    public function kasir()
    {
        $data['kode'] = $this->m->getKodePembayaran();
        $data['total'] = $this->m->hitungTotal();
        $data['pemb'] = $this->m->getPemb();
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
            $idObat = $this->input->post('kode');
            $cekObat = $this->m->cekIdObat($idObat);
            if($cekObat->num_rows()>=1){
                $ins = $cekObat->row();
                $inss = array(
                    'kode_pembayaran'=>$kodePemb,
                    'nama_obat'=>$ins->nama_obat,
                    'banyak'=>$this->input->post('banyak'),
                    'subtotal'=>$this->input->post('banyak')*$ins->harga,
                    'status'=>'belum'
                );
            $stok = $ins->stok - $this->input->post('banyak');
            if ($ins->stok <= 0 ) {
                echo "<h3>Obat Habis!.</h3>";
                header('Refresh:2;url='.base_url('apoteker/kasir'));
            }else{
                $this->db->update('t_obat', array('stok'=>$stok));
                
                $this->db->insert('t_semen',$inss);
                
                redirect('apoteker/kasir');
            }
            
            }else{
                echo "<h3>data tidak ditemukan!.</h3>";
                header('Refresh:2;url='.base_url('apoteker/kasir'));
                
            }
        }else {
            echo "<h2>access forbidden please tell to admin!</h2>";
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
            'bayar'=>$this->input->post('uang'),
            'total'=>$this->input->post('tot'),
            'kembalian'=>$kembalian,
            'tgl'=>date("D, d - M - Y")
        );
        $this->db->query(" UPDATE `t_semen` SET `status` = 'sudah' WHERE kode_pembayaran = '$kode' AND status = 'belum' ");
        $this->db->insert('t_pembayaran', $data);
        
        redirect('apoteker/kasir');
        
        
    }

    function cetak()
    {
        echo "<h1>lah bujuk printer belom ada!</h1>";
        /* $data['a'] = $this->m->forCetak();
        $c = new FPDF("p",'cm',array(11,14));
        $c->addpage();
        $c->setfont("Arial","B",12);
        $c->cell(11,2"RSIA IBUNDA",0,1,"C");
        $c->cell(11,2"Bukti Pembayaran",0,1,"C");
        $c->setfont("Arial","B",9);
        foreach ($data['a']->result() as $cc ) {
            $c->cell(11,2"",0,1,"C")
        } */
    }
    

}

/* End of file Apoteker.php */
