<?php

class Riwayat_buku extends CI_Controller{

    public function index(){
        $data['judul'] = 'Daftar Riwayat Peminjaman Buku Bacaan ';
        $data['isi'] = 'Peminjaman';
        $data_user = $this->session->userdata('id');
        $status = 1;
        //$data['bre'] = $this->db->query("SELECT *FROM transaksi_buku tr, siswa sw, buku bk WHERE
        //tr.id_siswa = sw.id AND tr.id_buku = bk.id AND tr.id_siswa='$data_user'")->result();
        $data['transaksi'] = $this->m_siswa->tigatable2($data_user, $status)->result();
        // var_dump($data['transaksi']);
        $data['user'] = $this->db->get_where('siswa', ['id' => $this->session->userdata('id')])->row_array();
        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar',$data);
        $this->load->view('siswa/v_riwayat_buku',$data);
        $this->load->view('template_admin/footer');
    }

    public function lihat_buku($id_transaksi)
    {
        $data['judul'] = 'Form detail Transaksi';
        $data['isi'] = 'Transaksi Buku bacaan';
        $data['data_buku'] = $this->m_siswa->lihat($id_transaksi)->result();
        //$data['data_buku'] = $this->db->query("SELECT *FROM transaksi_buku tr, siswa sw, buku bk WHERE
        //tr.id_siswa = sw.id AND tr.id_buku = bk.id AND tr.id_transaksi='$id_transaksi'")->result();
        $data['user'] = $this->db->get_where('siswa', ['id' => $this->session->userdata('id')])->row_array();
        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar',$data);
        $this->load->view('siswa/v_lihatBuku',$data);
        $this->load->view('template_admin/footer');
    }

    public function kembalikan_buku($id_transaksi)
    {
        $data = $this->m_siswa->getDataById_ts($id_transaksi);
        $data['id_status'] = 2; 

        $data2 = array(
           'id_status' =>  $data['id_status'],
        );

        $where = array(
          'id_transaksi' => $data['id_transaksi'],
        );
         
        $kembalikan = array(
            'id_siswa' => $data['id_siswa'],
            'id_buku' => $data['id_buku'],
            'tgl_pinjam' => $data['tgl_pinjam'],
            'tgl_kembali' => $data['tgl_kembali'],
            'tgl_kembalikan' => date('Y-m-d'),
            'status_transaksi' => 'diproses',
            'id_status' => $data['id_status']
        );
         $this->m_siswa->insert_data($kembalikan, 'pengembalian_buku');
         $this->m_siswa->update_data('transaksi_buku', $data2, $where);
         $this->session->set_flashdata('sukses', 'buku berhasil dikembalikan, harap melihat menu pengembalian untuk melihat status buku');
        redirect('siswa/riwayat_buku');
    }

    //public function soft_delete($id_transaksi){
      //$data = $this->m_siswa->getDataById_ts($id_transaksi);
     // $data['id_status'] = 3; 

      // $data2 = array(
       // 'id_status' =>  $data['id_status'],
       ///);

       // $where = array(
       // 'id_transaksi' => $data['id_transaksi'],
       // );

       // $this->m_siswa->update_data('transaksi_buku', $data2, $where);
      //  $this->session->set_flashdata('sukses', 'data berhasil dihapus');
       // redirect('siswa/riwayat_buku');

   // }

    public function hard_delete($id_transaksi){
        $where = array('id_transaksi' => $id_transaksi);
        $this->m_siswa->delete_data($where, 'transaksi_buku');
        $this->session->set_flashdata('sukses', 'data berhasil dihapus');
       redirect('siswa/riwayat_buku');

    }

}