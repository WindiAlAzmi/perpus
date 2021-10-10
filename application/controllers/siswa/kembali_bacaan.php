<?php

class Kembali_bacaan extends CI_Controller{

    public function index(){
        $data['judul'] = 'Daftar Pengembalian Buku Bacaan ';
        $data['isi'] = 'Buku Bacaan';
        $data_user = $this->session->userdata('id');
        $status = 2;
        $id_jenis = 1;
        $data['transaksi'] = $this->m_siswa->pengembalian($data_user, $status, $id_jenis)->result();
        $data['user'] = $this->db->get_where('siswa', ['id' => $this->session->userdata('id')])->row_array();
        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar',$data);
        $this->load->view('siswa/v_pengembalian_bacaan',$data);
        $this->load->view('template_admin/footer');
    }

    public function lihat_bacaan($id_pengembalian)
    {
        $data['judul'] = 'Form Detail Pengembalian Buku Bacaan';
        $data['isi'] = 'Buku Bacaan';
        $data['data_buku'] = $this->m_siswa->detailPengembalian($id_pengembalian)->result();
        $data['user'] = $this->db->get_where('siswa', ['id' => $this->session->userdata('id')])->row_array();
        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar',$data);
        $this->load->view('siswa/v_detailPengembalian_bacaan',$data);
        $this->load->view('template_admin/footer');
    }



}