<?php

class mOrder extends CI_Model{

    public function getStatus($id)
    {
        $row = $this->db->query("select status from orders where order_num = $id");
		$status = $row->row();
        return $status->status;
    }

    public function prosesOrder($id)
    {
        if ($id == 1) {
            $data = array('status' => 2 );
        } else if ($id == 2) {
            $data = array('status' => 3 );
        }
        $order_num = $this->session->userdata('order_num');
        $this->db->where('order_num', $order_num);
        $this->db->update('orders', $data);
    }

}