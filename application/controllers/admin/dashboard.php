<?php

class Dashboard extends CI_Controller{

    public function index(){
        $data['judul'] = 'Halo';
         $data['isi'] = 'Dashboard';
         $data['user'] = $this->db->get_where('admin', ['id' => $this->session->userdata('id')])->row_array();
          $this->load->view('template_admin/header', $data);
          $this->load->view('template_admin/sidebar', $data);
          $this->load->view('admin/v_admin',$data);
          $this->load->view('template_admin/footer', $data);
      }
}