<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct()
	{
        parent::__construct();
        $this->simple_login->cek_admin();  
	}
	
	public function index()
	{
		$data['judul'] = "Dashboard";
        $data['username'] = $this->session->userdata('username');
		$this->load->view('template/home_header', $data);
		$this->load->view('template/home_sidebar');
		$this->load->view('template/home_topbar', $data);
		$this->load->view('dashboardv');
		$this->load->view('template/home_footer');
	}
}
