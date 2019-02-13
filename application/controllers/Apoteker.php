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
        
        $data['edt'] = $this->m->getObatEdit($id);
        $this->load->view('apotHeader');
        
        $this->load->view('apoteker/edtobat', $data);
        $this->load->view('apotFooter');
        
    }

}

/* End of file Apoteker.php */
