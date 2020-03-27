<?php

class Kategori extends CI_Model{

    public function getAllKategori()
    {
        return $this->db->get('category')->result_array();
    }

}