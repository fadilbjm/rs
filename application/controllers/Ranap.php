<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ranap extends CI_Controller {

    public function index()
    {
        $this->load->view('ranapHeader');
        $this->load->view('ranap/dashboard');
        
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
        // hitung sisa kamar
        /* $dkamar = $this->db->get('t_kamar');
        foreach ($dkamar->result() as $d ) {
            
        } */
        // end
        $data['kamar'] = $this->db->get('t_kamar');

       $data['dokter'] = $this->m->getDokter();

       $uri =$this->uri->segment(3);
        if($uri==""){
            $this->load->view('ranapHeader');
            $this->load->view('ranap/ranap',$data);
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
           'hp'=>$this->input->post('hp'),
           'jk'=>$this->input->post('jk'),
           'p_jawab'=>$this->input->post('penanggung'),
           'dokter'=>$this->input->post('dokter'),
           'kamar'=>$this->input->post('kamar'),
           'bpjs'=>$this->input->post('bpjs'),
           'status'=>'ada'

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
               $k->hp,
               $k->dokter,
               '<a href="'.base_url('ranap/keluar/'.$k->id_ranap).'"><button class="btn btn-sm btn-success">Check Out</button></a> '.
               '<a href="'.base_url('ranap/detail/'.$k->id_ranap).'" target="_blank"><button class="btn btn-sm btn-info">Detail</button></a><br>'.
               '<a href="'.base_url('kesalahan').'"><button class="btn btn-sm btn-danger"><i class="fas fa-bug    "></i> Lapor Kesalahan</button></a>'
           );
       }
       $out = array('data'=>$rr);
       echo json_encode($out);
   }

   function getListRanap2()
   {
       $data = $this->m->getPasienRanap2();
       $rr = array();
       foreach ($data->result() as $k ) {
           $rr[] = array(
               $k->tgl_keluar,
               $k->no_rm,
               $k->nama_pasien,
               $k->jk,
               $k->hp,
               $k->dokter,
               '<a href="'.base_url('kesalahan').'"><button class="btn btn-sm btn-danger"><i class="fas fa-bug    "></i> Lapor Kesalahan</button></a>'
           );
       }
       $out = array('data'=>$rr);
       echo json_encode($out);
   }



   public function ruang()
   {
        $this->load->view('ranapHeader');
        $this->load->view('ranap/ruang');
        
   }
   function getRuang()
   {
       $ruang = $this->db->get('t_kamar');

       $bed = array();
       foreach($ruang->result() as $q){
           $bed[] = array(
                $q->nama_kamar,
                $q->tipe,
                '0',
                '0',
                $q->bed,
                anchor('ranap/edtruang/'.$q->id_kamar, '<button class="btn btn-sm btn-outline-warning"><i class="fas fa-pencil-alt    "></i> Edit</button>')
           );
       }
       $data=array('data'=>$bed);
       echo json_encode($data);
   }

   function addrooms()
   {
       $data=array(
           'nama_kamar'=>$this->input->post('nama'),
           'bed'=>$this->input->post('bed'),
           'tipe'=>$this->input->post('tipe')
       );
       $this->db->insert('t_kamar', $data);
       
       redirect('ranap/ruang');
       
   }

   function keluar()
   {
       date_default_timezone_set('asia/makassar');
       $uri = $this->uri->segment(3);
       $where = array('id_ranap'=>$uri);
       $data = array('status'=>'pulang',
                'tgl_keluar'=>date('Y-m-d H:i:s')        
    );
       $this->db->update('t_ranap', $data, $where);
       
       redirect('ranap/listranap');
       
   }

   function detail()
   {
       $uri = $this->uri->segment(3);
       $w =array('id_ranap'=>$uri);
       $data = $this->m->getUniversal('t_ranap',$w);
       foreach ($data->result() as $p ) {
           echo "<table border='1'>
                <tr>
                    <th>ID RANAP</th>
                    <th>NOMOR RM</th>
                    <th>NAMA PASIEN</th>
                    <th>GENDER</th>
                    <th>KAMAR</th>
                    <th>TGL LAHIR</th>
                    <th>TGL INAP MASUK</th>
                    <th>DOKTER</th>
                    <th>NO. BPJS</th>
                    <th>PENANGGUNG JAWAB PASIEN</th>
                    <th>PASIEN MENULAR?</th>
                    <th>NO. HP</th>
                    <th>KETERANGAN</th>
                    <th>PENGGUNA</th>
                </tr>

                <tr>
                    <td>$p->id_ranap</td>
                    <td>$p->no_rm</td>
                    <td>$p->nama_pasien</td>
                    <td>$p->jk</td>
                    <td>$p->kamar</td>
                    <td>$p->tgl_lahir</td>
                    <td>$p->tgl_masuk</td>
                    <td>$p->dokter</td>
                    <td>$p->bpjs</td>
                    <td>$p->p_jawab</td>
                    <td>$p->menular</td>
                    <td>$p->hp</td>
                    <td>$p->ket</td>
                    <td>$p->user</td>
                </tr>
           </table>";
        }
        echo "<a href='javascript:window.close()'><button><h3>Kembali</h3></button></a>";
   }

//    menghitung jumkah sisa kamar
   function hitungKamar()
   {
    $dkamar = $this->db->get('t_kamar');
    foreach ($dkamar->result() as $d ) {
        $dranap = $this->db->query("SELECT COUNT(kamar) AS jum FROM t_ranap WHERE kamar = '$d->nama_kamar'");
        echo $d->bed - $dranap->row()->jum;
    }
   }
}

/* End of file Ranap.php */
