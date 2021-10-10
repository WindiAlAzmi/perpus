<?php

class Anggota extends CI_Controller{


    public function index(){
        $data['judul'] = 'Daftar Admin';
        $data['isi'] = 'Admin';
        $data['data_admin'] = $this->m_admin->get_data('admin')->result();
        $data['user'] = $this->db->get_where('admin', ['id' => $this->session->userdata('id')])->row_array();
        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar',$data);
        $this->load->view('admin/v_anggota',$data);
        $this->load->view('template_admin/footer');
    }

    public function tambah_admin(){
        $data['judul'] = 'Form Tambah Admin';
        $data['isi'] = 'Admin';
        $data['user'] = $this->db->get_where('admin', ['id' => $this->session->userdata('id')])->row_array();
        $data['id_admin'] = $this->m_admin->id_admin();
        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar',$data);
        $this->load->view('admin/v_tambahAdmin',$data);
        $this->load->view('template_admin/footer');
    }

    public function tambah_admin_aksi(){
            //validasi 
            $this->form_validation->set_rules('nama', 'Nama admin', 'trim|required' 
            , array('required' =>  ' nama admin  harus diisi! '));
            $this->form_validation->set_rules('password', 'password', 'trim|required',
            array('required' =>  'password harus diisi! ') );
    
            if ($this->form_validation->run() == FALSE) {
                $this->tambah_admin();
            } else {
                $id = $this->input->post('id');
                $nama= $this->input->post('nama');
                $password= $this->input->post('password');
             
                $data = array(
                    'id' => $id,
                    'nama' => $nama,
                    'password' => $password,
                );
                $this->m_admin->insert_data($data, 'admin');
                $this->session->set_flashdata('sukses', 'data berhasil ditambahkan');
                redirect('admin/anggota');
            }
        
        }

    public function update_admin($id)
    {
    
        $data['judul'] = 'Form Update Data Admin';
        $data['isi'] = 'Data Admin';
        $data['user'] = $this->db->get_where('admin', ['id' => $this->session->userdata('id')])->row_array();
        $data['admin'] = $this->db->get_where('admin', ['id' => $id])->result();
        $data['id_admin'] = $this->m_admin->id_admin();
        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar',$data);
        $this->load->view('admin/v_form_update_admin', $data);
        $this->load->view('template_admin/footer');

    }

    public function update_admin_aksi(){
        //validasi 
        $this->form_validation->set_rules('nama', 'Nama admin', 'trim|required' 
        , array('required' =>  ' nama admin  harus diisi! '));
        $this->form_validation->set_rules('password', 'password', 'trim|required',
        array('required' =>  'password harus diisi! ') );

        $id = $this->input->post('id');

        if ($this->form_validation->run() == FALSE) {
            $this->update_admin($id);
        } else {
            $id = $this->input->post('id');
            $nama= $this->input->post('nama');
            $password= $this->input->post('password');
         
            $data = array(
                'id' => $id,
                'nama' => $nama,
                'password' => $password,
            );
         
            $where = array(
                'id' => $id
            );

            $this->m_admin->update_data('admin', $data, $where);
            $this->session->set_flashdata('sukses', 'data berhasil diubah');
            redirect('admin/anggota');
        }

    }

    public function hapus_admin($id){
        $where = array('id' => $id);
        $this->m_admin->delete_data($where, 'admin');
        $this->session->set_flashdata('sukses', 'data berhasil dihapus');
       redirect('admin/anggota');

    }

    public function data_wali(){
        $data['judul'] = 'Daftar Wali Kelas';
        $data['isi'] = 'Wali Kelas';
        $data['user'] = $this->db->get_where('admin', ['id' => $this->session->userdata('id')])->row_array();
        $data['data_wali'] = $this->m_admin->joinAnggota_wali()->result();
        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar',$data);
        $this->load->view('admin/v_waliKelas',$data);
        $this->load->view('template_admin/footer');
    }

    public function tambah_wali(){
        $data['judul'] = 'Form Tambah Wali Kelas';
        $data['isi'] = 'Wali Kelas';
        $data['user'] = $this->db->get_where('admin', ['id' => $this->session->userdata('id')])->row_array();
        $data['id_wali'] = $this->m_admin->id_wali();
        $data['kelas'] = $this->m_admin->get_data('kelas')->result();
        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar',$data);
        $this->load->view('admin/v_tambahWali',$data);
        $this->load->view('template_admin/footer');
    }

    public function tambah_wali_aksi()
    {
        $this->form_validation->set_rules('nama', 'Nama Wali Kelas', 'trim|required');
        $this->form_validation->set_rules('nip', 'nip', 'trim|required');
        $this->form_validation->set_rules('password', 'password', 'trim|required');
        $this->form_validation->set_rules('kelas', 'kelas', 'trim|required');


        $nip = $this->input->post('nip');
        $kelas = $this->input->post('kelas');
        $wali_kelas = $this->db->get_where('wali_kelas', ['nip' => $nip])->row_array();
        $nama_kelas = $this->db->get_where('wali_kelas', ['kelas' => $kelas])->row_array();

        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata('message',  'Data harus diisi');
            redirect('admin/anggota/tambah_wali');
        } else if ($wali_kelas !== NULL) {
            $this->session->set_flashdata('message', 'NIP udah terdaftar');
            redirect('admin/anggota/tambah_wali');
        } else if ($nama_kelas !== NULL) {
            $this->session->set_flashdata('message', 'Kelas sudah ditempati oleh wali kelas lain');
            redirect('admin/anggota/tambah_wali');
        } else {
            $id = $this->input->post('id');
            $nama  = $this->input->post('nama');
            $password  = $this->input->post('password');


            $data = array(
                'id'           => $id,
                'nama'           => $nama,
                'nip'         => $nip,
                'password'     => $password,
                'kelas'        => $kelas,
                
            );
            $this->m_admin->insert_data($data, 'wali_kelas');
            $this->session->set_flashdata('sukses', 'data berhasil ditambahkan');
            redirect('admin/anggota/data_wali');
           
        }
    }

        public function update_wali($id) { 
        $data['judul'] = 'Form Update Data Wali Kelas';
        $data['isi'] = 'Data Wali Kelas';
        $data['user'] = $this->db->get_where('admin', ['id' => $this->session->userdata('id')])->row_array();
        //$data['data_wali'] = $this->db->get_where('wali_kelas', ['id' => $id])->result();
        $data['data_wali'] = $this->m_admin->cariWali($id)->result();
        $data['kelas'] = $this->m_admin->get_data('kelas')->result();
        $data['data_wali1'] = $this->m_admin->joinAnggota_wali()->result();
        var_dump($data['data_wali']);
        $data['id_wali'] = $this->m_admin->id_wali();
        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar',$data);
        $this->load->view('admin/v_updateWali', $data);
        $this->load->view('template_admin/footer');

    }

    public function update_wali_aksi(){
        //validasi 
        $this->form_validation->set_rules('nama', 'Nama wali kelas', 'trim|required' 
        , array('required' =>  ' nama wali kelas  harus diisi! '));
        $this->form_validation->set_rules('nip', 'nip', 'trim|required' 
        , array('required' =>  ' nip harus diisi! '));
        $this->form_validation->set_rules('password', 'password', 'trim|required',
        array('required' =>  'password harus diisi! ') );
        $this->form_validation->set_rules('kelas', 'kelas', 'trim|required' 
        , array('required' =>  ' kelas harus diisi! '));

        $id = $this->input->post('id');

        if ($this->form_validation->run() == FALSE) {
            $this->update_wali($id);
        } else {
            $id = $this->input->post('id');
            $nama  = $this->input->post('nama');
            $nip = $this->input->post('nip');
            $password  = $this->input->post('password');
            $kelas  = $this->input->post('kelas');

         
            $data = array(
                'id'           => $id,
                'nama'           => $nama,
                'nip'         => $nip,
                'password'     => $password,
                'kelas'        => $kelas,
                
            );
         
            $where = array(
                'id' => $id
            );

            $this->m_admin->update_data('wali_kelas', $data, $where);
            $this->session->set_flashdata('sukses', 'data berhasil diubah');
            redirect('admin/anggota/data_wali');
        }

    }

    public function hapus_wali($id){
        $where = array('id' => $id);
        $this->m_admin->delete_data($where, 'wali_kelas');
        $this->session->set_flashdata('sukses', 'data berhasil dihapus');
       redirect('admin/anggota/data_wali');

    }

    public function data_siswa(){
        $data['judul'] = 'Daftar Siswa';
        $data['isi'] = 'Siswa';
        $data['user'] = $this->db->get_where('admin', ['id' => $this->session->userdata('id')])->row_array();
        //$data['data_siswa'] = $this->m_admin->get_data('siswa')->result();
        $data['data_siswa'] = $this->m_admin->joinAnggota_siswa()->result();
        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar',$data);
        $this->load->view('admin/v_siswa',$data);
        $this->load->view('template_admin/footer');
    }


    public function tambah_siswa(){
        $data['judul'] = 'Form Tambah Siswa';
        $data['isi'] = 'Siswa';
        $data['user'] = $this->db->get_where('admin', ['id' => $this->session->userdata('id')])->row_array();
        $data['id_siswa'] = $this->m_admin->id_siswa();
        $data['kelas'] = $this->m_admin->get_data('kelas')->result();
        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar',$data);
        $this->load->view('admin/v_tambahSiswa',$data);
        $this->load->view('template_admin/footer');
    }

    public function tambah_siswa_aksi()
    {
        $this->form_validation->set_rules('nama', 'Nama Wali Kelas', 'trim|required');
        $this->form_validation->set_rules('nis', 'nis', 'trim|required');
        $this->form_validation->set_rules('password', 'password', 'trim|required');
        $this->form_validation->set_rules('kelas', 'kelas', 'trim|required');


        $nis = $this->input->post('nis');
        $kelas = $this->input->post('kelas');
        $siswa = $this->db->get_where('siswa', ['nis' => $nis])->row_array();
        $nama_kelas = $this->db->get_where('wali_kelas', ['kelas' => $kelas])->row_array();
        var_dump($kelas);
        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata('message',  'Data harus diisi');
            redirect('admin/anggota/tambah_siswa');
        } else if ($siswa !== NULL) {
            $this->session->set_flashdata('message', 'NIS udah terdaftar');
            redirect('admin/anggota/tambah_siswa');
        } else if ($nama_kelas === NULL) {
            $this->session->set_flashdata('message', 'Kelas tidak ada');
            redirect('admin/anggota/tambah_siswa');
        } else {
            $id = $this->input->post('id');
            $nama  = $this->input->post('nama');
            $password  = $this->input->post('password');


            $data = array(
                'id'           => $id,
                'nama'           => $nama,
                'nis'         => $nis,
                'password'     => $password,
                'kelas'        => $kelas,
                
            );
            $this->m_admin->insert_data($data, 'siswa');
            $this->session->set_flashdata('sukses', 'data berhasil ditambahkan');
            redirect('admin/anggota/data_siswa');
           
        }
    }

    public function update_siswa($id) { 
        $data['judul'] = 'Form Update Data Siswa';
        $data['isi'] = 'Data Siswa';
        $data['user'] = $this->db->get_where('admin', ['id' => $this->session->userdata('id')])->row_array();
        $data['data_siswa'] = $this->db->get_where('siswa', ['id' => $id])->result();
        $data['kelas'] = $this->m_admin->get_data('kelas')->result();
        $data['id_siswa'] = $this->m_admin->id_siswa();
        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar',$data);
        $this->load->view('admin/v_updateSiswa', $data);
        $this->load->view('template_admin/footer');

    }

    public function update_siswa_aksi(){
        //validasi 
        $this->form_validation->set_rules('nama', 'Nama siswa', 'trim|required' 
        , array('required' =>  ' nama siswa  harus diisi! '));
        $this->form_validation->set_rules('nis', 'nis', 'trim|required' 
        , array('required' =>  ' nis harus diisi! '));
        $this->form_validation->set_rules('password', 'password', 'trim|required',
        array('required' =>  'password harus diisi! ') );
        $this->form_validation->set_rules('kelas', 'kelas', 'trim|required' 
        , array('required' =>  'kelas harus diisi! '));

        $id = $this->input->post('id');

        if ($this->form_validation->run() == FALSE) {
            $this->update_siswa($id);
        } else {
            $id = $this->input->post('id');
            $nama  = $this->input->post('nama');
            $nis = $this->input->post('nis');
            $password  = $this->input->post('password');
            $kelas  = $this->input->post('kelas');

         
            $data = array(
                'id'           => $id,
                'nama'           => $nama,
                'nis'         => $nis,
                'password'     => $password,
                'kelas'        => $kelas,
                
            );
         
            $where = array(
                'id' => $id
            );

            $this->m_admin->update_data('siswa', $data, $where);
            $this->session->set_flashdata('sukses', 'data berhasil diubah');
            redirect('admin/anggota/data_siswa');
        }

    }

    public function hapus_siswa($id){
        $where = array('id' => $id);
        $this->m_admin->delete_data($where, 'siswa');
        $this->session->set_flashdata('sukses', 'data berhasil dihapus');
       redirect('admin/anggota/data_siswa');

    }


}