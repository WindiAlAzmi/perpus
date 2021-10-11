<?php

class Laporan extends CI_Controller{
    public function __construct(){
       parent::__construct();
        $this->load->helper('tgl_indo_helper');
        $this->load->library('pdf_report');
    } 
    public function peminjaman_bacaan(){
        $data['judul'] = 'Laporan Peminjaman Buku Bacaan';
        $data['isi'] = 'Buku Bacaan';
        $data['user'] = $this->db->get_where('wali_kelas', ['id' => $this->session->userdata('id')])->row_array();

        $status = 2;
        $id_jenis = 1;
        $id_kelas = $this->session->userdata('kelas');

        $dari = $this->input->post('dari');
        $sampai = $this->input->post('sampai');
       
       $dari1 =  $this->session->set_userdata('tanggal_awal', $dari); //buat session, nama sessionnya tanggal awal. 
       $sampai1 =  $this->session->set_userdata('tanggal_akhir', $sampai);

        if(empty($dari) || empty($sampai)) {
           $data['laporan'] = $this->m_wali->laporan2($status, $id_jenis, $id_kelas)->result();
           $this->load->view('template_admin/header', $data);
           $this->load->view('template_admin/sidebar',$data);
           $this->load->view('wali_kelas/v_awal_laporan',$data);
           $this->load->view('wali_kelas/v_laporan_bacaan',$data);
           $this->load->view('wali_kelas/v_akhir_laporan',$data);
           $this->load->view('template_admin/footer');
        }else {
             $data['laporan'] = $this->m_wali->laporan($status, $id_jenis, $dari, $sampai, $id_kelas)->result();
             $this->load->view('template_admin/header', $data);
             $this->load->view('template_admin/sidebar',$data);
             $this->load->view('wali_kelas/v_awal_laporan',$data);
             $this->load->view('wali_kelas/v_laporan_bacaan',$data);
             $this->load->view('wali_kelas/v_akhir_laporan',$data);
             $this->load->view('template_admin/footer');
        }
    }
    public function peminjaman_paket(){
        $data['judul'] = 'Laporan Peminjaman Buku Paket Pelajaran';
        $data['isi'] = 'Buku Paket';
        $data['user'] = $this->db->get_where('wali_kelas', ['id' => $this->session->userdata('id')])->row_array();

         $status = 2;
        $id_jenis = 2;
        $id_kelas = $this->session->userdata('kelas');
        $dari = $this->input->post('dari');
        $sampai = $this->input->post('sampai');
        $this->session->set_userdata('tanggal_awal', $dari); //buat session, nama sessionnya tanggal awal. 
        $this->session->set_userdata('tanggal_akhir', $sampai);

        if(empty($dari) || empty($sampai)) {
           $data['laporan'] = $this->m_wali->laporan2($status, $id_jenis, $id_kelas)->result();
           $this->load->view('template_admin/header', $data);
           $this->load->view('template_admin/sidebar',$data);
           $this->load->view('wali_kelas/v_awal_laporan',$data);
           $this->load->view('wali_kelas/v_laporan_paket',$data);
           $this->load->view('wali_kelas/v_akhir_laporan',$data);
           $this->load->view('template_admin/footer');
        }else {
            $data['laporan'] = $this->m_wali->laporan($status, $id_jenis, $dari, $sampai, $id_kelas)->result();
            $this->load->view('template_admin/header', $data);
            $this->load->view('template_admin/sidebar',$data);
            $this->load->view('wali_kelas/v_awal_laporan',$data);
            $this->load->view('wali_kelas/v_laporan_paket',$data);
            $this->load->view('wali_kelas/v_akhir_laporan',$data);
            $this->load->view('template_admin/footer');
             
        }
    }


    public function cetak_laporan(){
        $status = 2;
        $id_jenis = 1;
        $id_kelas = $this->session->userdata('kelas');
        if(empty($this->session->userdata('tanggal_awal')) || empty($this->session->userdata('tanggal_akhir'))){
            $data['laporan'] = $this->m_wali->laporan2($status, $id_jenis, $id_kelas)->result();
            $this->load->view('wali_kelas/laporan/pdf_buku_bacaan', $data);
        }else {
        $data['laporan'] = $this->m_wali->laporan($status, $id_jenis,$this->session->userdata('tanggal_awal'), $this->session->userdata('tanggal_akhir'), $id_kelas)->result();
        $this->load->view('wali_kelas/laporan/pdf_buku_bacaan', $data);
        }
    
}

    public function cetak_laporan_paket(){
        $status = 2;
        $id_jenis = 2;
        $id_kelas = $this->session->userdata('kelas');
        if(empty($this->session->userdata('tanggal_awal')) || empty($this->session->userdata('tanggal_akhir'))){
            $data['laporan'] = $this->m_wali->laporan2($status, $id_jenis, $id_kelas)->result();
            $this->load->view('wali_kelas/laporan/pdf_buku_paket', $data);
        }else {
        $data['laporan'] = $this->m_wali->laporan($status, $id_jenis,$this->session->userdata('tanggal_awal'), $this->session->userdata('tanggal_akhir'), $id_kelas)->result();
        $this->load->view('wali_kelas/laporan/pdf_buku_paket', $data);
        }
      
    }



    



}