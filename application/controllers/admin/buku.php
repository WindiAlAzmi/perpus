<?php

class Buku extends CI_Controller{

    public function index(){
        $data['judul'] = 'Daftar Buku Bacaan';
        $data['isi'] = 'Buku Bacaan';
        $jenis_buku = '1';
         $data['data_buku'] = $this->m_admin->join2($jenis_buku)->result();
        //$data['data_buku'] = $this->m_admin->get_data('buku')->result();
        $data['user'] = $this->db->get_where('admin', ['id' => $this->session->userdata('id')])->row_array();
        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar',$data);
        $this->load->view('admin/v_buku',$data);
        $this->load->view('template_admin/footer');
    }

    public function lihat_buku_bacaan($id)
    {
        $data['judul'] = 'Form detail Buku Bacaan';
        $data['isi'] = 'Buku Bacaan';
        $data['data_buku'] = $this->m_admin->lihat($id)->result();
        //$data['data_buku'] = $this->db->query("SELECT *FROM transaksi_buku tr, siswa sw, buku bk WHERE
        //tr.id_siswa = sw.id AND tr.id_buku = bk.id AND tr.id_transaksi='$id_transaksi'")->result();
        $data['user'] = $this->db->get_where('admin', ['id' => $this->session->userdata('id')])->row_array();
        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar',$data);
        $this->load->view('admin/v_lihatBacaan',$data);
        $this->load->view('template_admin/footer');
    }

    public function tambah_buku(){
        $data['judul'] = 'Form Tambah Buku';
        $data['isi'] = 'Buku';
        $data['user'] = $this->db->get_where('admin', ['id' => $this->session->userdata('id')])->row_array();
        $data['id_buku'] = $this->m_admin->id_buku();
        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar',$data);
        $this->load->view('admin/v_tambahBuku',$data);
        $this->load->view('template_admin/footer');
    }

    public function tambah_buku_aksi(){
        //validasi 
        $this->form_validation->set_rules('nama', 'nama buku', 'trim|required' 
        , array('required' =>  'judul harus diisi! '));
        $this->form_validation->set_rules('pengarang', 'pengarang', 'trim|required' 
        , array('required' =>  'nama pengarang harus diisi! '));
        $this->form_validation->set_rules('penerbit', 'penerbit', 'trim|required' 
        , array('required' =>  'nama penerbit harus diisi! '));
        $this->form_validation->set_rules('tahun', 'tahun', 'trim|required' 
        , array('required' =>  'tahun terbit harus diisi! '));
        $this->form_validation->set_rules('lokasi', 'lokasi', 'trim|required',
        array('required' =>  'lokasi buku harus diisi! ') );
        $this->form_validation->set_rules('jumlah', 'jumlah', 'trim|required',
        array('required' =>  'jumlah buku harus diisi! ') );

        if ($this->form_validation->run() == FALSE) {
            $this->tambah_buku();
        } else {
            $id = $this->input->post('id');
            $judul = $this->input->post('nama');
            $pengarang = $this->input->post('pengarang');
            $penerbit = $this->input->post('penerbit');
            $tahun = $this->input->post('tahun');
            $lokasi = $this->input->post('lokasi');
            $jumlah = $this->input->post('jumlah');
            $id_jenisBuku = $this->input->post('id_jenisBuku');
         
            $data = array(
                'id' => $id,
                'judul' => $judul,
                'pengarang' => $pengarang,
                'penerbit' => $penerbit,
                'tahun' => $tahun,
                'lokasi' => $lokasi,
                'jumlah' => $jumlah,
                'id_jenisBuku' => $id_jenisBuku,
            );
            $this->m_admin->insert_data($data, 'buku');
            $this->session->set_flashdata('sukses', 'data berhasil ditambahkan');
            redirect('admin/buku');
        }
    
    }

    public function update_buku($id)
    {
    
        $data['judul'] = 'Form Update Data Buku';
        $data['isi'] = 'Data Buku';
        $data['user'] = $this->db->get_where('admin', ['id' => $this->session->userdata('id')])->row_array();
        $data['data_buku'] = $this->db->get_where('buku', ['id' => $id])->result();
        $data['id_buku'] = $this->m_admin->id_buku();
        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar',$data);
        $this->load->view('admin/v_updateBuku', $data);
        $this->load->view('template_admin/footer');

    }


    public function update_buku_aksi(){
        //validasi 
        $this->form_validation->set_rules('nama', 'nama buku', 'trim|required' 
        , array('required' =>  'judul harus diisi! '));
        $this->form_validation->set_rules('pengarang', 'pengarang', 'trim|required' 
        , array('required' =>  'nama pengarang harus diisi! '));
        $this->form_validation->set_rules('penerbit', 'penerbit', 'trim|required' 
        , array('required' =>  'nama penerbit harus diisi! '));
        $this->form_validation->set_rules('tahun', 'tahun', 'trim|required' 
        , array('required' =>  'tahun terbit harus diisi! '));
        $this->form_validation->set_rules('lokasi', 'lokasi', 'trim|required',
        array('required' =>  'lokasi buku harus diisi! ') );
        $this->form_validation->set_rules('jumlah', 'jumlah', 'trim|required',
        array('required' =>  'jumlah buku harus diisi! ') );

        $id = $this->input->post('id');

        if ($this->form_validation->run() == FALSE) {
            $this->update_buku($id);
        } else {
            $id = $this->input->post('id');
            $judul= $this->input->post('nama');
            $pengarang = $this->input->post('pengarang');
            $penerbit = $this->input->post('penerbit');
            $tahun = $this->input->post('tahun');
            $lokasi = $this->input->post('lokasi');
            $jumlah = $this->input->post('jumlah');
            $id_jenisBuku = $this->input->post('id_jenisBuku');
         
            $data = array(
                'id' => $id,
                'judul' => $judul,
                'pengarang' => $pengarang,
                'penerbit' => $penerbit,
                'tahun' => $tahun,
                'lokasi' => $lokasi,
                'jumlah' => $jumlah,
                'id_jenisBuku' => $id_jenisBuku,
            );
         
            $where = array(
                'id' => $id
            );

            $this->m_admin->update_data('buku', $data, $where);
            $this->session->set_flashdata('sukses', 'data berhasil diubah');
            redirect('admin/buku');
        }
    }

    public function hapus_buku($id){
        $where = array('id' => $id);
        $this->m_admin->delete_data($where, 'buku');
        $this->session->set_flashdata('sukses', 'data berhasil dihapus');
       redirect('admin/buku');

    }

    public function data_paket(){
        $data['judul'] = 'Daftar Buku Paket Pelajaran';
        $data['isi'] = 'Buku Paket Pelajaran';
        $jenis_buku = '2';
        $data['data_buku2'] = $this->m_admin->join2($jenis_buku)->result();
        $data['user'] = $this->db->get_where('admin', ['id' => $this->session->userdata('id')])->row_array();
        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar',$data);
        $this->load->view('admin/v_buku_paket',$data);
        $this->load->view('template_admin/footer');
    }


    public function lihat_buku_paket($id)
    {
        $data['judul'] = 'Form detail Buku Paket Pelajaran';
        $data['isi'] = 'Buku Paket';
        $data['data_buku'] = $this->m_admin->lihat($id)->result();
        //$data['data_buku'] = $this->db->query("SELECT *FROM transaksi_buku tr, siswa sw, buku bk WHERE
        //tr.id_siswa = sw.id AND tr.id_buku = bk.id AND tr.id_transaksi='$id_transaksi'")->result();
        $data['user'] = $this->db->get_where('admin', ['id' => $this->session->userdata('id')])->row_array();
        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar',$data);
        $this->load->view('admin/v_lihatPaket',$data);
        $this->load->view('template_admin/footer');
    }

    public function tambah_buku_paket(){
        $data['judul'] = 'Form Tambah Buku Paket Pelajaran';
        $data['isi'] = 'Buku Paket Pelajaran';
        $data['user'] = $this->db->get_where('admin', ['id' => $this->session->userdata('id')])->row_array();
        $data['id_buku_paket'] = $this->m_admin->id_buku_paket();
        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar',$data);
        $this->load->view('admin/v_tambahBuku_paket',$data);
        $this->load->view('template_admin/footer');
    }

    public function tambah_buku_paket_aksi(){
        //validasi 
        $this->form_validation->set_rules('nama', 'nama buku', 'trim|required' 
        , array('required' =>  'judul harus diisi! '));
        $this->form_validation->set_rules('pengarang', 'pengarang', 'trim|required' 
        , array('required' =>  'nama pengarang harus diisi! '));
        $this->form_validation->set_rules('penerbit', 'penerbit', 'trim|required' 
        , array('required' =>  'nama penerbit harus diisi! '));
        $this->form_validation->set_rules('tahun', 'tahun', 'trim|required' 
        , array('required' =>  'tahun terbit harus diisi! '));
        $this->form_validation->set_rules('lokasi', 'lokasi', 'trim|required',
        array('required' =>  'lokasi buku harus diisi! ') );
        $this->form_validation->set_rules('jumlah', 'jumlah', 'trim|required',
        array('required' =>  'jumlah buku harus diisi! ') );

        if ($this->form_validation->run() == FALSE) {
            $this->tambah_buku_paket();
        } else {
            $id = $this->input->post('id');
            $judul = $this->input->post('nama');
            $pengarang = $this->input->post('pengarang');
            $penerbit = $this->input->post('penerbit');
            $tahun = $this->input->post('tahun');
            $lokasi = $this->input->post('lokasi');
            $jumlah = $this->input->post('jumlah');
            $id_jenisBuku = $this->input->post('id_jenisBuku');
         
            $data = array(
                'id' => $id,
                'judul' => $judul,
                'pengarang' => $pengarang,
                'penerbit' => $penerbit,
                'tahun' => $tahun,
                'lokasi' => $lokasi,
                'jumlah' => $jumlah,
                'id_jenisBuku' => $id_jenisBuku,
            );

            $this->m_admin->insert_data($data, 'buku');
            $this->session->set_flashdata('sukses', 'data berhasil ditambahkan');
            redirect('admin/buku/data_paket');
        }
    
    }

    public function update_buku_paket($id)
    {
    
        $data['judul'] = 'Form Update Data Buku Paket Pelajaran';
        $data['isi'] = 'Data Buku Paket Pelajaran';
        $data['user'] = $this->db->get_where('admin', ['id' => $this->session->userdata('id')])->row_array();
        $data['data_buku_paket'] = $this->db->get_where('buku', ['id' => $id])->result();
        var_dump($data['data_buku_paket']);
        $data['id_buku_paket'] = $this->m_admin->id_buku_paket();
        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar',$data);
        $this->load->view('admin/v_updateBuku_paket', $data);
        $this->load->view('template_admin/footer');

    }


    public function update_buku_paket_aksi(){
        //validasi 
        $this->form_validation->set_rules('nama', 'nama buku', 'trim|required' 
        , array('required' =>  'judul harus diisi! '));
        $this->form_validation->set_rules('pengarang', 'pengarang', 'trim|required' 
        , array('required' =>  'nama pengarang harus diisi! '));
        $this->form_validation->set_rules('penerbit', 'penerbit', 'trim|required' 
        , array('required' =>  'nama penerbit harus diisi! '));
        $this->form_validation->set_rules('tahun', 'tahun', 'trim|required' 
        , array('required' =>  'tahun terbit harus diisi! '));
        $this->form_validation->set_rules('lokasi', 'lokasi', 'trim|required',
        array('required' =>  'lokasi buku harus diisi! ') );
        $this->form_validation->set_rules('jumlah', 'jumlah', 'trim|required',
        array('required' =>  'jumlah buku harus diisi! ') );

        $id = $this->input->post('id');

        if ($this->form_validation->run() == FALSE) {
            $this->update_buku($id);
        } else {
            $id = $this->input->post('id');
            $judul= $this->input->post('nama');
            $pengarang = $this->input->post('pengarang');
            $penerbit = $this->input->post('penerbit');
            $tahun = $this->input->post('tahun');
            $lokasi = $this->input->post('lokasi');
            $jumlah = $this->input->post('jumlah');
            $id_jenisBuku = $this->input->post('id_jenisBuku');
         
            $data = array(
                'id' => $id,
                'judul' => $judul,
                'pengarang' => $pengarang,
                'penerbit' => $penerbit,
                'tahun' => $tahun,
                'lokasi' => $lokasi,
                'jumlah' => $jumlah,
                'id_jenisBuku' => $id_jenisBuku,
            );
         
            $where = array(
                'id' => $id
            );

            $this->m_admin->update_data('buku', $data, $where);
            $this->session->set_flashdata('sukses', 'data berhasil diubah');
            redirect('admin/buku/data_paket');
        }
    }

    public function hapus_buku_paket($id){
        $where = array('id' => $id);
        $this->m_admin->delete_data($where, 'buku');
        $this->session->set_flashdata('sukses', 'data berhasil dihapus');
       redirect('admin/buku/data_paket');

    }
}