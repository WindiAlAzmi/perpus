<?php

class Siswa extends CI_Controller{


    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('nama_admin')) {
            redirect('auth');
        }
    }

    public function index(){
       // $data['judul'] = 'Daftar Siswa';
        //$data['isi'] = 'Siswa';
       // $data['data_siswa'] = $this->db->get('siswa')->result();
        $user = $this->db->get_where('siswa', ['nis' => $this->session->userdata('id')])->row_array();
        var_dump($user);
        //$this->load->view('template_admin/header', $user);
        $this->load->view('template_admin/sidebar', $user);
        //$this->load->view('admin/v_siswa',$user);
        //$this->load->view('template_admin/footer', $user);
    }

    public function tambah_siswa(){
        $data['judul'] = 'Form Tambah siswa';
        $data['isi'] = 'Siswa';
        $data['id_siswa'] = $this->m_siswa->id_siswa();
        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/v_tambahSiswa',$data);
        $this->load->view('template_admin/footer');
    }


}