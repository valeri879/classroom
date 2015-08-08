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

//    კლასების გადაცემა ბაზიდან
    public function myclasses()
    {
        $this->load->library('session');
        $this->load->model('classrooms');

        $classrooms = $this->classrooms->GetClasses();

        $data['classrooms'] = $classrooms;

        $this->load->view('includes/myclasses', $data);
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
        $this->load->view('includes/AddClassroom');

        $LecturerName = $this->session->user->Name;
        $LecturerSureName = $this->session->user->LastName;

        if (!$this->input->post('UploadClass') === false) {
            $config['upload_path'] = './assets/img/img';
            $config['allowed_types'] = 'gif|jpg|png';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('file')) {
                $data = array(
                    'upload_data' => $this->upload->data()
                );
                $imageName = $data['upload_data']['file_name'];

            } else {
                echo 'სურათი არ აიტვირთა';
            }

            $Random = rand(1000, 2000);

            $CourseName = $this->input->post('CourseName');
            $Privacy = $this->input->post('privacy');
            $Lecturer = $LecturerName . ' ' . $LecturerSureName;
            $Description = $this->input->post('Description');
            $CreateDate = date("Y-m-d H:i:s");
            $this->db->set('Cover', $imageName);//სურათი
            $this->db->set('Privacy', $Privacy);//ხილვადობა
            $this->db->set('CourseName', $CourseName);//კურსის სახლეი
            $this->db->set('random', $Random);//შემთხვევითი რიცხვი
            $this->db->set('Description', $Description);//კურსის აღწერა
            $this->db->set('Lecturer', $Lecturer);//ლექტორის სახელი
            $this->db->set('CreateTime', $CreateDate);//თარიღი
            $this->db->insert('Classrooms');
        }
    }

}
