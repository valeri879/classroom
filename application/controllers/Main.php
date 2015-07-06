<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller

{
    public function index() {
        $this->load->library('session');

        $data = array();
        $data["user_info"] = false;
        if(isset($_POST)){
            $this->load->model('Login');
            $Email = $this->input->post('Email');
            $Password = $this->input->post('Password');
            $result = $this->Login->sign_in($Email, $Password);
            if ($result) {
                $data["user_info"] = $result;
                $this->session->user = $result;
            }
        }
        $this->load->view('index', $data);
        $data["user_info"] = $result;
        $this->session->user = $result;
    }
    public function logout(){
        $this->load->library('session');
        $this->session->unset_userdata('user');
        redirect('Main');
    }
    public function myclasses(){
        $this->load->library('session');
        $this->load->view('includes/myclasses');
    }

}
