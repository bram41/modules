<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {

    public function index()
    {
        $this->simple_login->cek_admin(); 
        $data['judul'] = "Daftar Log";
        $data['log'] = $this->db->get('log')->result_array();
        $data['username'] = $this->session->userdata('username');
		$this->load->view('dashboard/template/home_header', $data);
		$this->load->view('dashboard/template/home_sidebar');
		$this->load->view('dashboard/template/home_topbar', $data);
		$this->load->view('index', $data);
		$this->load->view('dashboard/template/home_footer');
    }

}