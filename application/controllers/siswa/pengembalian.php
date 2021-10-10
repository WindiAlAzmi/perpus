<?php

class Pengembalian extends CI_Controller{

    public function index(){
        $data['judul'] = 'Daftar Riwayat Pengembalian Buku Bacaan ';
        $data['isi'] = 'pengembalian';
        $data_user = $this->session->userdata('id');
        $status = 1;
        $data['transaksi'] = $this->m_siswa->pengembalian($data_user, $status)->result();
        $data['user'] = $this->db->get_where('siswa', ['id' => $this->session->userdata('id')])->row_array();
        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar',$data);
        $this->load->view('siswa/v_pengembalian',$data);
        $this->load->view('template_admin/footer');
    }

    public function lihat_buku($id_pengembalian)
    {
        $data['judul'] = 'Form Detail Transaksi';
        $data['isi'] = 'Transaksi Buku bacaan';
        $data['data_buku'] = $this->m_siswa->detailPengembalian($id_pengembalian)->result();
        $data['user'] = $this->db->get_where('siswa', ['id' => $this->session->userdata('id')])->row_array();
        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar',$data);
        $this->load->view('siswa/v_detailPengembalian',$data);
        $this->load->view('template_admin/footer');
    }


    public function soft_delete($id_pengembalian){
        $data = $this->m_siswa->getDataById_Pg($id_pengembalian);
        $data['id_status'] = 3; 
        $data2 = array(
           'id_status' =>  $data['id_status'],
        );
        $where = array(
            'id_pengembalian' => $data['id_pengembalian'],
        );

        $this->m_siswa->update_data('pengembalian_buku', $data2, $where);
        $this->session->set_flashdata('sukses', 'data berhasil dihapus');
        redirect('siswa/pengembalian');

    }
}