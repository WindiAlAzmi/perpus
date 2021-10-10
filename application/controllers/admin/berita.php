<?php

class Berita extends CI_Controller{

    public function index(){
        $data['judul'] = 'Daftar Pemberitahuan';
        $data['isi'] = 'pemberitahuan';
        $data['data_berita'] = $this->db->get('pemberitahuan')->result();
        $data['user'] = $this->db->get_where('admin', ['id' => $this->session->userdata('id')])->row_array();
        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/v_berita',$data);
        $this->load->view('template_admin/footer');
    }


    public function tambah_berita(){
        $data['judul'] = 'Form Tambah Pemberitahuan';
        $data['isi'] = 'Pemberitahuan';
        $data['id_berita'] = $this->m_admin->id_berita();
        $data['user'] = $this->db->get_where('admin', ['id' => $this->session->userdata('id')])->row_array();
        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/v_tambahBerita',$data);
        $this->load->view('template_admin/footer');
    }
    public function tambah_berita_aksi(){
        //validasi 
        $this->form_validation->set_rules('judul', 'nama berita', 'trim|required' 
        , array('required' =>  ' judul pemberitahuan harus diisi! '));
        $this->form_validation->set_rules('isi', 'isi', 'trim|required',
        array('required' =>  'isi pemberitahuan harus diisi! ') );

        if ($this->form_validation->run() == FALSE) {
            $this->tambah_berita();
        } else {
            $id = $this->input->post('id');
            $judul= $this->input->post('judul');
            $isi= $this->input->post('isi');
         
            $data = array(
                'id' => $id,
                'judul' => $judul,
                'isi' => $isi,
            );
            $this->m_admin->insert_data($data, 'pemberitahuan');
            $this->session->set_flashdata('sukses', 'data berhasil ditambahkan');
            redirect('admin/berita');
        }
    
    }


    public function lihat_berita($id)
    {
        $data['judul'] = 'Form Lihat Pemberitahuan';
        $data['isi'] = 'Pemberitahuan';
        $data['data_berita'] = $this->m_admin->more_berita($id);
        $data['user'] = $this->db->get_where('admin', ['id' => $this->session->userdata('id')])->row_array();
        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/v_lihatBerita',$data);
        $this->load->view('template_admin/footer');
    }

    public function update_berita($id) { 
        $data['judul'] = 'Form Update Data Pemberitahuan';
        $data['isi'] = 'Data Pemberitahuan';
        $data['user'] = $this->db->get_where('admin', ['id' => $this->session->userdata('id')])->row_array();
        $data['data_berita'] = $this->db->get_where('pemberitahuan', ['id' => $id])->result();
        $data['id_berita'] = $this->m_admin->id_berita();
        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar',$data);
        $this->load->view('admin/v_updateBerita', $data);
        $this->load->view('template_admin/footer');

    }

    public function update_berita_aksi(){
        //validasi 
        $this->form_validation->set_rules('judul', 'judul', 'trim|required' 
        , array('required' =>  ' judul pemberitahuan harus diisi! '));
        $this->form_validation->set_rules('isi', 'isi', 'trim|required',
        array('required' =>  'isi dari pemberitahuan harus diisi! ') );

        $id = $this->input->post('id');

        if ($this->form_validation->run() == FALSE) {
            $this->update_berita($id);
        } else {
            $id = $this->input->post('id');
            $judul = $this->input->post('judul');
            $isi = $this->input->post('isi');
         
            $data = array(
                'id' => $id,
                'judul' => $judul,
                'isi' => $isi,
            );
         
            $where = array(
                'id' => $id
            );

            $this->m_admin->update_data('pemberitahuan', $data, $where);
            $this->session->set_flashdata('sukses', 'data berhasil diubah');
            redirect('admin/berita');
        }

    }

    public function hapus_berita($id){
        $where = array('id' => $id);
        $this->m_admin->delete_data($where, 'pemberitahuan');
        $this->session->set_flashdata('sukses', 'data berhasil dihapus');
       redirect('admin/berita');

    }


  
}