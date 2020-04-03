<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

	function __construct()
	{
        parent::__construct();
        $this->simple_login->cek_admin(); 
        $this->load->model('Kategori');
	}
	
	public function index()
	{
		$data['judul'] = "Daftar Kategori";
        $data['kategori'] = $this->Kategori->getAllKategori();
        $data['username'] = $this->session->userdata('username');
		$this->load->view('dashboard/template/home_header', $data);
		$this->load->view('dashboard/template/home_sidebar');
		$this->load->view('dashboard/template/home_topbar', $data);
		$this->load->view('index', $data);
		$this->load->view('dashboard/template/home_footer');
    }

    public function barang()
    {
		$data['judul'] = "Daftar Barang";
        $data['kategori'] = $this->Kategori->getAllKategori();
        $data['username'] = $this->session->userdata('username');
		$this->load->view('dashboard/template/home_header', $data);
		$this->load->view('dashboard/template/home_sidebar');
		$this->load->view('dashboard/template/home_topbar', $data);
		$this->load->view('barang', $data);
		$this->load->view('dashboard/template/home_footer');
	}
	
	public function daftar($id)
	{
		$data['judul'] = "Daftar Produk";
        $data['barang'] = $this->Kategori->getBarangKategori($id);
        $data['username'] = $this->session->userdata('username');
		$this->load->view('dashboard/template/home_header', $data);
		$this->load->view('dashboard/template/home_sidebar');
		$this->load->view('dashboard/template/home_topbar', $data);
		$this->load->view('products/index', $data);
		$this->load->view('dashboard/template/home_footer');
	}

	public function add()
	{
		$data['judul'] = "Tambah Kategori";
        $data['username'] = $this->session->userdata('username');
		$this->load->view('dashboard/template/home_header', $data);
		$this->load->view('dashboard/template/home_sidebar');
		$this->load->view('dashboard/template/home_topbar', $data);
		$this->load->view('add');
		$this->load->view('dashboard/template/home_footer');
	}


	public function edit($id)
	{
		$data['judul'] = "Edit Produk";
		$data['edit'] = $this->Kategori->getKategori($id);
        $data['username'] = $this->session->userdata('username');
		$this->load->view('dashboard/template/home_header', $data);
		$this->load->view('dashboard/template/home_sidebar');
		$this->load->view('dashboard/template/home_topbar', $data);
		$this->load->view('edit', $data);
		$this->load->view('dashboard/template/home_footer');
	}

    public function tambah_category()
    {
		$this->form_validation->set_rules('id_kategori', 'ID', 'trim|required');
		$this->form_validation->set_rules('nama_kategori', 'Nama', 'trim|required');

		if ($this->form_validation->run() == false) {
			$data['errors'] = null;
			$this->load->view('dashboard/template/home_header', $data);
			$this->load->view('dashboard/template/home_sidebar');
			$this->load->view('dashboard/template/home_topbar', $data);
			$this->load->view('add', $data);
			$this->load->view('dashboard/template/home_footer');
		} else {
			$this->Kategori->tambahKategori();
			redirect('category');
		}
    }

	public function edit_kategori()
	{
		$this->form_validation->set_rules('id_kategori', 'ID', 'trim|required');
		$this->form_validation->set_rules('nama_kategori', 'Nama', 'trim|required');

		if ($this->form_validation->run() == false) {
			$data['errors'] = null;
			$this->load->view('dashboard/template/home_header', $data);
			$this->load->view('dashboard/template/home_sidebar');
			$this->load->view('dashboard/template/home_topbar', $data);
			$this->load->view('add', $data);
			$this->load->view('dashboard/template/home_footer');
		} else {
			$this->Kategori->editKategori();
			redirect('category');
		}
	}

    public function delete($id)
    {
		$row = $this->db->query('select prod_name from products where cat_id ="'.$id.'"');
		$kategori = $row->row();
		$namaa = $kategori->prod_name;
		if($namaa != null){ 
			$this->session->set_flashdata('error', 'Kategori tidak dapat dihapus karena terdapat produk');
		} else {
			$row = $this->db->query('select cat_name from category where cat_id ="'.$id.'"');
			$kategori = $row->row();
			$nama = $kategori->cat_name;

			$this->db->where('cat_id', $id);
			$this->db->delete('category');
			
			$ip_address = $_SERVER['REMOTE_ADDR'];
			$username = $this->session->userdata('username');
			$keterangan = "Menghapus kategori $nama";
			$data = array(
				'username' => $username,
				'ip' => $ip_address,
				'keterangan' => $keterangan
			);
			$this->db->insert('log', $data);
		}
		
		redirect('category'); 
    }

	

}