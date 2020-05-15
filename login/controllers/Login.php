<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function index() {
    // Fungsi Login
        $valid = $this->form_validation;
        $username = $this->input->post('username'); 
        $password = $this->input->post('password'); 
        $valid->set_rules('username','Username','required');
        $valid->set_rules('password','Password','required');

        if($valid->run()) { 
            $this->simple_login->login($username,$password,base_url('dashboard'), base_url('login')); 
        }
        
        if($this->session->userdata('username') == '') {
            $this->load->view('account/v_login');
        } else {
            redirect('beranda');
        }
    }
    
    public function logout(){
        $this->simple_login->logout(); 
    }

    public function verifikasi($id)
    {
        if($this->session->userdata('username') != '') {
            redirect(site_url('beranda'));
        } else {
            $data['id_user'] = $id;
            $this->load->view('verifikasi', $data);
        }
    }

    public function verif()
    {
        $id = $this->input->post('id'); 
        $token = $this->input->post('token'); 

        $this->db->where("id_user", $id);
        $row = $this->db->get("users")->row();
        $tokendb = $row->token;

        if($token == $tokendb){
            $data = array(
                'token' => 0,
                'role' => 0
            );
            $this->db->where('id_user', $id);
            $this->db->update('users', $data);

            $this->session->set_flashdata('sukses','Verifikasi berhasil, silahkan login');
            redirect('login');
        } else {
            $data = array(
                'token' => random_string('numeric', 4)
            );
            $this->db->where('id_user', $id);
            $this->db->update('users', $data);

            $this->session->set_flashdata('sukses','Verifikasi gagal, cek email untuk nomor token baru');
            redirect("login/verifikasi/$id");
        }

    }
}