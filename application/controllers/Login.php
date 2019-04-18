<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('status') !== 'login'){
            
        }else {
            if($this->session->userdata('job') == 'admin'){
                redirect('admin');
            }elseif ($this->session->userdata('job') == 'apoteker') {
                redirect('apoteker');
            }elseif ($this->session->userdata('job') == 'bidan') {
                reddirect('ranap');
            }
        }
    }
    

    public function index()
    {
        $this->load->view('login/login');
        
    }

    function proc()
    {
        // $n =;
        $user = md5( $this->input->post('username'));
        $pass = md5($this->input->post('pass'));
        $where = array(
            'username' => $user,
            'password' => $pass
        );
        $db = $this->m->login($where);
        if($db->num_rows() > 0){
            // echo 'suc';
            $perm = "";
            $user = "";
            foreach ($db->result() as $f ) {
                $perm = $f->posisi;
                $user = $f->nama_pegawai;
            }
            $this->session->set_userdata(array('status' => 'login', 'perm' => $perm, 'user' => $user));
            // echo $this->session->userdata('status')." ".$this->session->userdata('perm').anchor(base_url('logout'),'LOGOUT');
            redirect(base_url($perm));
        }
        else {
            redirect('login?stat=wrong');
        }
    }

    function logout()
    {
        
        $this->session->sess_destroy();
        redirect('login');
    }

}

/* End of file Login.php */
