<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {

     var $data;

	function __construct()
	{
          parent::__construct();
          $this->load->model('mBeranda');
          $this->load->library('pagination');
          $this->data = $this->mBeranda->getAllKategori();
     }
     
     public function index()
     {
          $query = "SELECT * FROM products"; // Query untuk menampilkan semua data siswa
          $config['base_url'] = base_url('beranda/index');
          $config['total_rows'] = $this->db->count_all('products'); //total row
          $config['per_page'] = 3;
          $config['uri_segment'] = 3;
          $choice = $config["total_rows"] / $config["per_page"];
          $config["num_links"] = floor($choice);

          // Style Pagination 
          $config['first_link']       = 'First';
          $config['last_link']        = 'Last';
          $config['next_link']        = 'Next';
          $config['prev_link']        = 'Prev';
          $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
          $config['full_tag_close']   = '</ul></nav></div>';
          $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
          $config['num_tag_close']    = '</span></li>';
          $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
          $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
          $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
          $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
          $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
          $config['prev_tagl_close']  = '</span>Next</li>';
          $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
          $config['first_tagl_close'] = '</span></li>';
          $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
          $config['last_tagl_close']  = '</span></li>';
          // End style pagination
          
          $this->pagination->initialize($config); // Set konfigurasi paginationnya
          $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
          $data['product'] = $this->mBeranda->getAllProduct($config["per_page"], $data['page']);           
   
          $data['pagination'] = $this->pagination->create_links();

          $data['kategori'] = $this->data;
          $data['title'] = "RentALL";
          $this->load->view('template/beranda_header', $data);
          $this->load->view('index', $data);
          $this->load->view('template/beranda_footer');
     }

     public function search(){
          // Ambil data NIS yang dikirim via ajax post
          $keyword = $this->input->post('keyword');
          $produk = $this->mBeranda->search($keyword);
          $data['product'] = $produk;
          $hasil = $this->load->view('indexSearch', $data, true);
         
          // Buat sebuah array
          $callback = array(
               'hasil' => $hasil, // Set array hasil dengan isi dari view.php yang diload tadi
          );
          echo json_encode($callback); // konversi varibael $callback menjadi JSON
     }

     public function daftar($id)
     {
          $data['kategori'] = $this->data;
          $data['product'] = $this->mBeranda->getProduct($id);
          $data['title'] = "Daftar Produk";
          $this->load->view('template/beranda_header', $data);
          $this->load->view('daftar', $data);
          $this->load->view('template/beranda_footer');
     }

     public function product($id)
     {
          $data['kategori'] = $this->data;
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
               $data['kategori'] = $this->data;
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
                    $this->session->set_flashdata('sukses', 'Berhasil mengubah jumlah produk ');
                    redirect('beranda/keranjang');
               }

          }
     }

     public function hapusatc($id)
     {
          $this->db->where('cart_id', $id);
          $this->db->delete('cart');
          $this->session->set_flashdata('sukses', 'Berhasil menghapus produk dari keranjang');
          redirect('beranda/keranjang');
     }

     public function co()
     {
          $id_user = $this->session->userdata('id');
          $query = $this->db->query('select * from users where id_user = "'.$id_user.'"')->result_array();
          $email = $query['0']['email'];
          // Konfigurasi email
          $config = [
               'mailtype'  => 'html',
               'charset'   => 'utf-8',
               'protocol'  => 'smtp',
               'smtp_host' => 'ssl://smtp.gmail.com',
               'smtp_user' => 'supermairosbro101@gmail.com',    // Ganti dengan email gmail kamu
               'smtp_pass' => 'akuseorangkapiten',      // Password gmail kamu
               'smtp_port' => 465,
               'crlf'      => "\r\n",
               'newline'   => "\r\n"
          ];
          $this->load->library('email', $config);
          $this->email->from('no-reply@rentall.com', 'rentall.com | abraham');
          $this->email->to($email);
          $this->email->subject('Pesanan Rentall');
          $this->email->message("Pesanan pada rentall telah kami terima dan sudah pada pemrosesan barang");
     
          $this->mBeranda->co();
          
     }

     public function berhasil()
     {
          $data['kategori'] = $this->data;
          $data['title'] = "Pesanan Berhasil";
          $this->load->view('template/beranda_header', $data);
          $this->load->view('berhasil');
          $this->load->view('template/beranda_footer');
     }

     public function pesanan()
     {
          if ($this->simple_login->cek_login() == TRUE){
               redirect('');
          } else {
          $data['kategori'] = $this->data;
               $data['order'] = $this->mBeranda->getOrder();
               $data['title'] = "Daftar Pesanan";
               $this->load->view('template/beranda_header', $data);
               $this->load->view('pesanan', $data);
               $this->load->view('template/beranda_footer');
          }
     }

     public function pembayaran()
     {
               $data['title'] = "Cara Pembayaran";
               $data['kategori'] = $this->data;
               $this->load->view('template/beranda_header', $data);
               $this->load->view('pembayaran');
               $this->load->view('template/beranda_footer');
     }

     public function about()
     {
               $data['title'] = "Tentang RentALL";
          $data['kategori'] = $this->data;
               $this->load->view('template/beranda_header', $data);
               $this->load->view('about');
               $this->load->view('template/beranda_footer');
     }
}