<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {

	function __construct()
	{
          parent::__construct();
          $this->load->model('mBeranda');
          
     }
     
     public function index()
     {
          $data['kategori'] = $this->mBeranda->getAllKategori();
          $data['title'] = "RentALL";
          $this->load->view('template/beranda_header', $data);
          $this->load->view('index', $data);
          $this->load->view('template/beranda_footer');
     }
     
     public function daftar($id)
     {
          $data['product'] = $this->mBeranda->getProduct($id);
          $data['title'] = "Daftar Produk";
          $this->load->view('template/beranda_header', $data);
          $this->load->view('daftar', $data);
          $this->load->view('template/beranda_footer');
     }

     public function product($id)
     {
          $data['product'] = $this->mBeranda->getDetail($id);
          $data['title'] = "Detail Produk";
          $this->load->view('template/beranda_header', $data);
          $this->load->view('product', $data);
          $this->load->view('template/beranda_footer');
     }

     public function atc()
     {
          if ($this->simple_login->cek_login() == TRUE ) {
               $this->load->view('account/beranda');
          } else {
               $this->form_validation->set_rules('durasi', 'Durasi', 'trim|required');

               if ($this->form_validation->run() == false) {
                    redirect('');
               } else {
                    $this->mBeranda->addTC();
               }
          }
     }

     public function login()
     {
          $this->load->view('account/beranda');
     }

     public function keranjang()
     {
          
          if ($this->simple_login->cek_login() == TRUE){
               redirect('');
          } else {
               $data['product'] = $this->mBeranda->getATC();
               $data['price'] = $this->mBeranda->getTotal();
               $data['title'] = "Keranjang Belanja";
               $this->load->view('template/beranda_header', $data);
               $this->load->view('keranjang', $data);
               $this->load->view('template/beranda_footer');
          }
     }

     public function editatc()
     {
          $this->form_validation->set_rules('durasi', 'Durasi', 'trim|required');

          if ($this->form_validation->run() == false) {
               redirect('beranda/keranjang');
          } else {
               $id = $this->input->post('id', true);
               $durasi = $this->input->post('durasi', true);
               if ($durasi == 0) {
                    $this->hapusatc($id);
               } else {
                    $data = array(
                         'qty' => $durasi
                    );
                    $this->db->where('cart_id', $id);
                    $this->db->update('cart', $data);
                    redirect('beranda/keranjang');
               }

          }
     }

     public function hapusatc($id)
     {
          $this->db->where('cart_id', $id);
          $this->db->delete('cart');
          redirect('beranda/keranjang');
     }

     public function co()
     {
          $this->mBeranda->co();
     }

     public function berhasil()
     {
          $this->load->view('template/beranda_header');
          $this->load->view('berhasil');
          $this->load->view('template/beranda_footer');
     }
}