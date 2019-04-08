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
        $db = $this->m->login($where)->num_rows();
        if($db > 0){
            echo 'suc';
        }
        else {
            echo 'fail';
        }
    }

}

/* End of file Login.php */
