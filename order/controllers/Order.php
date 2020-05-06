<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {

	function __construct()
	{
        parent::__construct();
		$this->simple_login->cek_admin(); 
		$this->load->model('mOrder');
    }
    
	public function index()
	{
		$data['judul'] = "Daftar Order";
        $data['orders'] = $this->db->query('select * from orders, users where orders.cust_id = users.id_user')->result_array();
        $data['username'] = $this->session->userdata('username');
		$this->load->view('dashboard/template/home_header', $data);
		$this->load->view('dashboard/template/home_sidebar');
		$this->load->view('dashboard/template/home_topbar', $data);
		$this->load->view('index', $data);
		$this->load->view('dashboard/template/home_footer');
	}

	public function proses($id)
	{
		$data['judul'] = "Daftar Product";
        $data['orders'] = $this->db->query("select * from orderitems od, products p, category c where od.order_num = $id and p.prod_id = od.prod_id and p.cat_id = c.cat_id ")->result_array();
		$data['username'] = $this->session->userdata('username');
		$data['status'] = $this->mOrder->getStatus($id);
		$data['nomor'] = $id; 
		$this->session->set_userdata('order_num', $id); 
		$this->load->view('dashboard/template/home_header', $data);
		$this->load->view('dashboard/template/home_sidebar');
		$this->load->view('dashboard/template/home_topbar', $data);
		$this->load->view('proses', $data);
		$this->load->view('dashboard/template/home_footer');		
	}

	public function proses_order($id)
	{
		$this->mOrder->prosesOrder($id);
		$this->session->unset_userdata('order_num');
		redirect('order');
	}
	
}