<?php
//
//class LogIn_Controller extends CI_Controller
//{
//
//    function __construct()
//    {
//        parent::__construct();
//        $this->load->model('log_in', '', TRUE);
//
//    }
//
//    public function LogIn()
//    {
//
//        $data['title'] = "My Real Title";
//        $data['heading'] = "My Real Heading";
//
//        $this->load->view('index', $data);
//
//
//        $this->load->library('session');
//        $this->load->model('Log_in');
//        $query = $this->Log_in->sign_in();
//
//        //Field validation succeeded.  Validate against database
//        $Email = $this->input->post('Email');
//        $Password = $this->input->post('Password');
//        //query the database
//        $result = $this->log_in->sign_in($Email, $Password);
//
//        if ($result) {
//
//            $this->db->select('Name');
//            $this->db->from('users');
//            $this->db->where('Email', $Email);
//            $Name = $this->db->get()->result();
//
////            $data['Name'] = $Name;
//
//
//
//            $this->session->set_userdata('logged_in');
//
//
//        } else {
//            echo "მოცემული მომხმარებელი სისტემაში ვერ მოიძებნა";
//        }
//    }
//}