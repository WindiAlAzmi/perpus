<?php

class Transaksi_buku extends CI_Controller{


    public function index(){
        $data['judul'] = 'Form Pinjam Buku Bacaan';
        $data['isi'] = 'Siswa';
        $data['user'] = $this->db->get_where('siswa', ['id' => $this->session->userdata('id')])->row_array();
        $data['id_trans'] = $this->m_siswa->id_trans();
        $jenis_buku = '1';
        $data['data_buku'] = $this->m_siswa->join2($jenis_buku)->result();
        $data_user = $this->session->userdata('id');
        //$data['bre'] = $this->db->query("SELECT *FROM transaksi_buku tr, siswa sw, buku bk WHERE
       // tr.id_siswa = sw.id AND tr.id_buku = bk.id AND tr.id_siswa='$data_user'")->result();
        $data['transaksi'] = $this->m_siswa->tigatable($data_user)->result();
        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar',$data);
        $this->load->view('siswa/v_tambahTransaksi_buku',$data);
        $this->load->view('template_admin/footer');
    }

    public function jumlah_buku(){
      $id = $this->input->post('id');
      $data = $this->m_siswa->jumlah_buku($id);
      echo json_encode($data);
    }

      public function tambah_transaksi_aksi(){
        //validasi 
        $this->form_validation->set_rules('id_buku', 'id_buku', 'trim|required' 
        , array('required' =>  'judul buku harus diisi! '));
        $this->form_validation->set_rules('tgl_pinjam', 'tgl_pinjam', 'trim|required' 
        , array('required' =>  'tanggal peminjaman harus diisi! '));
        $this->form_validation->set_rules('tgl_kembali', 'tgl_kembali', 'trim|required' 
        , array('required' =>  'tangal pengembalian harus diisi! '));;

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $id_transaksi = $this->input->post('id_transaksi');
            $id_siswa = $this->input->post('id_siswa');
            $id_buku = $this->input->post('id_buku');
            $tgl_pinjam = $this->input->post('tgl_pinjam');
            $tgl_kembali = $this->input->post('tgl_kembali');
            $status_transaksi = $this->input->post('status_transaksi');
            $status = $this->input->post('status');
         
            $data = array(
                'id_transaksi' => $id_transaksi,
                'id_siswa' => $id_siswa,
                'id_buku' => $id_buku,
                'tgl_pinjam' => $tgl_pinjam,
                'tgl_kembali' => $tgl_kembali,
                'status_transaksi' => $status_transaksi,
                'id_status' => $status
            );
            $this->m_siswa->insert_data($data, 'transaksi_buku');
            $this->session->set_flashdata('sukses', 'data berhasil ditambahkan');
            redirect('siswa/riwayat_buku');
        }
      }
}

