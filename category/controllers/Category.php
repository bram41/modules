<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

	function __construct()
	{
        parent::__construct();
        $this->simple_login->cek_login(); 
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

}