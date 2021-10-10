<?php

class Pinjam_paket extends CI_Controller{

    public function index(){
        $data['judul'] = 'Daftar Peminjaman Buku Paket Pelajaran ';
        $data['isi'] = 'Buku Paket';
        $data_user = $this->session->userdata('id');
        $status = 1;
        $id_jenis = 2;
        //$data['bre'] = $this->db->query("SELECT *FROM transaksi_buku tr, siswa sw, buku bk WHERE
        //tr.id_siswa = sw.id AND tr.id_buku = bk.id AND tr.id_siswa='$data_user'")->result();
        //$data['transaksi'] = $this->m_siswa->tigatable2($data_user, $status)->result();
        $data['transaksi'] = $this->m_siswa->tigatable3($data_user, $status, $id_jenis)->result();
        // var_dump($data['transaksi']);
        $data['user'] = $this->db->get_where('siswa', ['id' => $this->session->userdata('id')])->row_array();
        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar',$data);
        $this->load->view('siswa/v_riwayat_paket',$data);
        $this->load->view('template_admin/footer');
    }


    public function jumlah_buku(){
        $id = $this->input->post('id');
        $data = $this->m_siswa->jumlah_buku($id);
        echo json_encode($data);
      }
  

    public function tambah_paket(){
        $data['judul'] = 'Form Pinjam Buku Paket Pelajaran';
        $data['isi'] = 'Peminjaman';
        $data['user'] = $this->db->get_where('siswa', ['id' => $this->session->userdata('id')])->row_array();
        $data['id_trans'] = $this->m_siswa->id_trans();
        $jenis_buku = '2';
        $data['data_buku'] = $this->m_siswa->join2($jenis_buku)->result();
        //$id_jenis = '2';
        //$data_user = $this->session->userdata('id');
        //$data['transaksi'] = $this->m_siswa->tigatable3($data_user, $id_jenis)->result();
        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar',$data);
        $this->load->view('siswa/v_tambah_paket',$data);
        $this->load->view('template_admin/footer');
    }

    public function tambah_paket_aksi(){
        //validasi 
        $this->form_validation->set_rules('id_buku', 'id_buku', 'trim|required' 
        , array('required' =>  'judul buku harus diisi! '));
        $this->form_validation->set_rules('tgl_pinjam', 'tgl_pinjam', 'trim|required' 
        , array('required' =>  'tanggal peminjaman harus diisi! '));
        $this->form_validation->set_rules('tgl_kembali', 'tgl_kembali', 'trim|required' 
        , array('required' =>  'tangal pengembalian harus diisi! '));;

        if ($this->form_validation->run() == FALSE) {
            $this->tambah_paket();
        } else {
            $id_transaksi = $this->input->post('id_transaksi');
            $id_siswa = $this->input->post('id_siswa');
            $id_buku = $this->input->post('id_buku');
            $tgl_pinjam = $this->input->post('tgl_pinjam');
            $tgl_kembali = $this->input->post('tgl_kembali');
            $status_transaksi = $this->input->post('status_transaksi');
            $status = $this->input->post('status');
            $id_jenis = $this->input->post('id_jenis');
            $id_kelas = $this->input->post('id_kelas');

            $data = array(
                'id_transaksi' => $id_transaksi,
                'id_siswa' => $id_siswa,
                'id_buku' => $id_buku,
                'tgl_pinjam' => $tgl_pinjam,
                'tgl_kembali' => $tgl_kembali,
                'status_transaksi' => $status_transaksi,
                'id_status' => $status,
                'id_jenis' => $id_jenis,
                'id_kelas' => $id_kelas
            );
            $this->m_siswa->insert_data($data, 'transaksi_buku');
            $this->session->set_flashdata('sukses', 'data berhasil ditambahkan');
            redirect('siswa/pinjam_paket');
        }
      }


    public function lihat_paket($id_transaksi)
    {
        $data['judul'] = 'Form detail Buku Paket Pelajaran';
        $data['isi'] = 'Buku Paket';
        $data['data_buku'] = $this->m_siswa->lihat($id_transaksi)->result();
        //$data['data_buku'] = $this->db->query("SELECT *FROM transaksi_buku tr, siswa sw, buku bk WHERE
        //tr.id_siswa = sw.id AND tr.id_buku = bk.id AND tr.id_transaksi='$id_transaksi'")->result();
        $data['user'] = $this->db->get_where('siswa', ['id' => $this->session->userdata('id')])->row_array();
        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar',$data);
        $this->load->view('siswa/v_lihatPaket',$data);
        $this->load->view('template_admin/footer');
    }

    public function kembalikan_paket($id_transaksi)
    {
        $data = $this->m_siswa->getDataById_ts($id_transaksi);
        $data['id_pengembalian'] = $this->m_siswa->id_pengembalian();
        $data['id_status'] = 2; 

        $data2 = array(
           'id_status' =>  $data['id_status'],
        );

        $where = array(
          'id_transaksi' => $data['id_transaksi'],
        );
         
        $kembalikan = array(
            'id_pengembalian' => $data['id_pengembalian'],
            'id_siswa' => $data['id_siswa'],
            'id_buku' => $data['id_buku'],
            'tgl_pinjam' => $data['tgl_pinjam'],
            'tgl_kembali' => $data['tgl_kembali'],
            'tgl_kembalikan' => date('Y-m-d'),
            'status_transaksi' => 'diproses',
            'id_status' => $data['id_status'],
            'id_jenis' => $data['id_jenis'],
            'id_kelas' => $data['id_kelas']
        );
         $this->m_siswa->insert_data($kembalikan, 'pengembalian_buku');
         $this->m_siswa->update_data('transaksi_buku', $data2, $where);
         $this->session->set_flashdata('sukses', 'buku berhasil dikembalikan, harap melihat menu pengembalian untuk melihat status buku');
        redirect('siswa/pinjam_paket');
    }

    public function hard_delete($id_transaksi){
        $where = array('id_transaksi' => $id_transaksi);
        $this->m_siswa->delete_data($where, 'transaksi_buku');
        $this->session->set_flashdata('sukses', 'data berhasil dihapus');
       redirect('siswa/pinjam_paket');

    }

}