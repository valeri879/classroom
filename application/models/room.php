<?php

class rooms extends CI_Model
{

    public function DetRooms()
    {
//
        $this->db->select('id,Name,LastName,Role');
        $this->db->from('users');
        $this->db->where('Email', $Email);
        $this->db->where('Password', md5($Password));
        $query = $this->db->get();
        return $query->row();
    }

}