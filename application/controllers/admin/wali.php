<?php

class Wali extends CI_Controller{


    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('nama_admin')) {
            redirect('auth');
        }
    }

    public function index(){
        $data['judul'] = 'Daftar Wali Kelas';
        $data['isi'] = 'Wali Kelas';
        $data['data_wali'] = $this->m_wali->get_data('wali_kelas')->result();
        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/v_waliKelas',$data);
        $this->load->view('template_admin/footer');
    }

    public function tambah_wali(){
        $data['judul'] = 'Form Tambah Wali Kelas';
        $data['isi'] = 'Wali Kelas';
        $data['id_wali'] = $this->m_wali->id_wali();
        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/v_tambahWali',$data);
        $this->load->view('template_admin/footer');
    }

    public function tambah_wali_aksi()
    {
        $this->form_validation->set_rules('nama', 'Nama Wali Kelas', 'trim|required' 
        , array('required' =>  ' nama wali kelas harus diisi! '));
        $this->form_validation->set_rules('nip', 'nip', 'trim|required',
        array('required' =>  'nip harus diisi! ') );
        $this->form_validation->set_rules('password', 'password', 'trim|required',
        array('required' =>  ' password harus diisi! ') );
        $this->form_validation->set_rules('kelas', 'kelas', 'trim|required',
        array('required' =>  ' kelas  harus diisi! ') );


        $nip = $this->input->post('nip');
        $kelas = $this->input->post('kelas');
        $wali_kelas = $this->db->get_where('wali_kelas', ['nip' => $nip])->row_array();
        $nama_kelas = $this->db->get_where('wali_kelas', ['kelas' => $kelas])->row_array();

        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
           Data harus diisi <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span> </button> </div>');
            redirect('admin/tambah_wali');
        } else if ($wali_kelas !== NULL) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Nip sudah terdaftar <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span> </button> </div>');
            redirect('admin/tambah_wali');
        } else if ($nama_kelas !== NULL) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Kelas sudah terisi <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span> </button> </div>');
            redirect('admin/tambah_wali');
        } else {
            $id = $this->input->post('id_wali');
            $nama  = $this->input->post('nama');
            $password  = $this->input->post('password');


            $data = array(
                'id'           => $id,
                'nama'           => $nama,
                'nip'         => $nip,
                'password'     => $password,
                'kelas'        => $kelas,
                
            );
            $this->m_wali->insert_data($data, 'wali_kelas');

            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Data berhasil ditambahkan <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span> </button> </div>');

            redirect('admin/wali');
        }
    }
 
}