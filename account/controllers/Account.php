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

    public function hapusAkun()
    {
        $this->db->where('id_user', $this->session->userdata('id'));
        $data = $this->db->get('users')->result_array();

        foreach ($data as $p) :
            $nama = $p['nama'];
        endforeach;

        $ip_address = $_SERVER['REMOTE_ADDR'];
        $username = $this->session->userdata('username');
        $keterangan = "Menghapus akun $nama";
        $data = array(
            'username' => $username,
            'ip' => $ip_address,
            'keterangan' => $keterangan
        );
        $this->db->insert('log', $data);

        $this->db->where('id_user', $this->session->userdata('id'));
        $this->db->delete('users');

        redirect('login/logout');
    }

}