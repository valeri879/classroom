<?php

class classrooms extends CI_Model
{

    public function GetClasses(){

        $Lec = $this->session->user->Name . '' . $this->session->user->LastName;

        $this->db->select('*');
//        $query = $this->db->get('classrooms');
        return $this->db->get('classrooms');

    }

}