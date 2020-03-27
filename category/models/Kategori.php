<?php

class Kategori extends CI_Model{

    public function getAllKategori()
    {
        return $this->db->get('category')->result_array();
    }

    public function getKategori($id)
    {   
        $this->db->where('cat_id', $id);
        return $this->db->get('category')->result_array();
    }

    public function editKategori()
    {
        $id_kategori = $this->input->post('id_kategori', true);

		$row = $this->db->query('select cat_name from category where cat_id ="'.$id_kategori.'"');
		$kategori = $row->row();
        $namas = $kategori->cat_name;
        
        $nama_kategori = $this->input->post('nama_kategori', true);
        $data = array(
            'cat_name' => $nama_kategori
        );
        $this->db->where('cat_id', $id_kategori);
        $this->db->update('category', $data);

		
        $ip_address = $_SERVER['REMOTE_ADDR'];
        $username = $this->session->userdata('username');
        $keterangan = "Mengubah kategori $namas menjadi $nama_kategori";
        $data = array(
            'username' => $username,
            'ip' => $ip_address,
            'keterangan' => $keterangan
        );
        $this->db->insert('log', $data);    
    }

    public function tambahKategori()
    {
        $id_kategori = $this->input->post('id_kategori', true);
		$nama_kategori = $this->input->post('nama_kategori', true);
		$dataa = array(
			'cat_id' => $id_kategori,
			'cat_name' => $nama_kategori
		);

        $this->db->insert('category', $dataa);
        
        $ip_address = $_SERVER['REMOTE_ADDR'];
        $username = $this->session->userdata('username');
        $keterangan = "Menambahkan kategori $nama_kategori";
        $data = array(
            'username' => $username,
            'ip' => $ip_address,
            'keterangan' => $keterangan
        );
        $this->db->insert('log', $data);    
    }

    public function getBarangKategori($id)
    {
        $this->db->select('*');
        $this->db->where('category.cat_id', $id); // <-- There is never any reason to write this line!
        $this->db->from('products');
        $this->db->join('category', 'products.cat_id = category.cat_id');
        $query=$this->db->get();
        return $query->result_array();
    }
}