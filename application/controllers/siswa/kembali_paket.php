<?php

class Kembali_paket extends CI_Controller{

    public function index(){
        $data['judul'] = 'Daftar Pengembalian Buku Paket Pelajaran ';
        $data['isi'] = 'Buku Paket';
        $data_user = $this->session->userdata('id');
        $status = 2;
        $id_jenis = 2;
        $data['transaksi'] = $this->m_siswa->pengembalian($data_user, $status, $id_jenis)->result();
        $data['user'] = $this->db->get_where('siswa', ['id' => $this->session->userdata('id')])->row_array();
        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar',$data);
        $this->load->view('siswa/v_pengembalian_paket',$data);
        $this->load->view('template_admin/footer');
    }

    public function lihat_paket($id_pengembalian)
    {
        $data['judul'] = 'Form Detail Pengembalian Buku Paket Pelajaran';
        $data['isi'] = 'Buku Paket';
        $data['data_buku'] = $this->m_siswa->detailPengembalian($id_pengembalian)->result();
        $data['user'] = $this->db->get_where('siswa', ['id' => $this->session->userdata('id')])->row_array();
        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar',$data);
        $this->load->view('siswa/v_detailPengembalian_paket',$data);
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