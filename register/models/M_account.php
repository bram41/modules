<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_account extends CI_Model{

    function daftar($data)
    {
        $this->db->insert('users', $data);
        $id = $this->db->insert_id();
        redirect("login/verifikasi/$id");
    }
} 

?>