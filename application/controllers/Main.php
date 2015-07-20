<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller

{
    public function index()
    {
        $this->load->library('session');

        $data = array();
        $data["user_info"] = false;
        if (isset($_POST)) {
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

    public function logout()
    {
        $this->load->library('session');
        $this->session->unset_userdata('user');
        redirect('Main');
    }

    public function myclasses()
    {
        $this->load->library('session');
        $this->load->view('includes/myclasses');
    }

    public function classroom()
    {
        $this->load->library('session');
        $this->load->view('includes/classroom');
    }

// ახალი კლასის დამატება
    public function AddClassroom()
    {
        $this->load->library('session');
        $imageName = '';

        $config['upload_path'] = './assets/img/img';
        $config['allowed_types'] = 'gif|jpg|png';
        $this->load->library('upload', $config);

        if (isset($_POST['AddClass'])) {

            if (!$this->upload->do_upload('Cover')) {
                $error = array('error' => $this->upload->display_errors());
                echo 'სურათი არ აიტვირთა </br>';
                echo print_r($error);
            } else {
                $data = array('upload_data' => $this->upload->data());
                print_r($data);
                $imageName = $data['upload_data']['file_name'];
//            $this->load->view('upload_success', $data);
            }

            $this->load->view('includes/AddClassroom');
            $this->load->model('AddClassroom');

            $CourseName = $this->input->post('CourseName');
            $Lecturer = $this->session->user->Name . ' ' . $this->session->user->LastName;
            $Description = $this->input->post('Description');
            $CreateDate = date("Y-m-d H:i:s");
            $Privacy = '1';

            $this->db->set('Cover', $imageName);//სურათი
            $this->db->set('Privacy', $Privacy);//ხილვადობა
            $this->db->set('CourseName', $CourseName);//კურსის სახლეი
            $this->db->set('Description', $Description);//კურსის აღწერა
            $this->db->set('Lecturer', $Lecturer);//ლექტორის სახელი
            $this->db->set('CreateTime', $CreateDate);//თარიღი
            $this->db->insert('Classrooms');


        } else {
            $this->load->view('includes/AddClassroom');
        }
    }
}
