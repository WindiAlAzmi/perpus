<?php

class Pinjam_bacaan extends CI_Controller{

    public function index(){
        $data['judul'] = 'Daftar Peminjaman Buku Bacaan ';
        $data['isi'] = 'Buku Bacaan';
        $status = 1;
        $id_jenis = 1;
        $id_kelas = $this->session->userdata('kelas');
        $data['transaksi'] = $this->m_wali->duatable($id_kelas, $id_jenis, $status)->result();
        $data['user'] = $this->db->get_where('wali_kelas', ['id' => $this->session->userdata('id')])->row_array();
        //$data_kelas = $this->m_wali->get_dataSiswa($this->session->userdata('kelas'))->result();
        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar',$data);
        $this->load->view('wali_kelas/v_pinjam_bacaan',$data);
        $this->load->view('template_admin/footer');
    }

    public function update_status(){
        $id_transaksi = $this->input->post('id_transaksi_alert');
        $status_transaksi = $this->input->post('status_transaksi_alert');
        $this->m_wali->update_status($id_transaksi, $status_transaksi);
    }

    public function lihat_bacaan($id_transaksi)
    {
        $data['judul'] = 'Form detail Buku Bacaan';
        $data['isi'] = 'Buku Bacaan';
        $data['data_buku'] = $this->m_wali->lihat($id_transaksi)->result();
        //$data['data_buku'] = $this->db->query("SELECT *FROM transaksi_buku tr, siswa sw, buku bk WHERE
        //tr.id_siswa = sw.id AND tr.id_buku = bk.id AND tr.id_transaksi='$id_transaksi'")->result();
        $data['user'] = $this->db->get_where('wali_kelas', ['id' => $this->session->userdata('id')])->row_array();
        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar',$data);
        $this->load->view('wali_kelas/v_lihatBacaan',$data);
        $this->load->view('template_admin/footer');
    }

}