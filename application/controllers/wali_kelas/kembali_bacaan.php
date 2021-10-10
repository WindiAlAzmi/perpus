<?php

class Kembali_bacaan extends CI_Controller{

    public function index(){
        $data['judul'] = 'Daftar Pengembalian Buku Bacaan ';
        $data['isi'] = 'Buku Bacaan';
        $id_jenis = 1;
        $status = 2;
        $id_kelas = $this->session->userdata('kelas');
       $data['transaksi'] = $this->m_wali->kembali($id_kelas, $id_jenis,  $status)->result();
        $data['user'] = $this->db->get_where('wali_kelas', ['id' => $this->session->userdata('id')])->row_array();
        $data_kelas = $this->m_wali->get_dataSiswa($this->session->userdata('kelas'))->result();
        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar',$data);
        $this->load->view('wali_kelas/v_kembali_bacaan',$data);
        $this->load->view('template_admin/footer');
    }

    public function update_status(){
        $id_pengembalian = $this->input->post('id_pengembalian_alert');
        $status_transaksi = $this->input->post('status_transaksi_alert');
        $this->m_wali->update_status_pengembalian($id_pengembalian, $status_transaksi);
    }

    public function lihat_bacaan($id_pengembalian)
    {
        $data['judul'] = 'Form detail Buku Bacaan';
        $data['isi'] = 'Buku Bacaan';
        $data['data_buku'] = $this->m_wali->lihat_pengembalian($id_pengembalian)->result();
        //$data['data_buku'] = $this->db->query("SELECT *FROM transaksi_buku tr, siswa sw, buku bk WHERE
        //tr.id_siswa = sw.id AND tr.id_buku = bk.id AND tr.id_transaksi='$id_transaksi'")->result();
        $data['user'] = $this->db->get_where('wali_kelas', ['id' => $this->session->userdata('id')])->row_array();
        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar',$data);
        $this->load->view('wali_kelas/v_lihatBacaan_kembali',$data);
        $this->load->view('template_admin/footer');
    }


}