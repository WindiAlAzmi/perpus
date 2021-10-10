<?php 

class Dashboard extends CI_Controller{

    public function index(){
        $data['judul'] = 'Selamat Datang';
         $data['isi'] = 'Wali Kelas';
         $data['data_berita'] = $this->db->get('pemberitahuan')->result();
         $data['user'] = $this->db->get_where('wali_kelas', ['id' => $this->session->userdata('id')])->row_array();
          $this->load->view('template_admin/header', $data);
          $this->load->view('template_admin/sidebar', $data);
          $this->load->view('wali_kelas/v_dashboard',$data);
          $this->load->view('template_admin/footer', $data);
      }

      public function lihat_berita($id)
      {
          $data['judul'] = 'Form Lihat Pemberitahuan';
          $data['isi'] = 'Pemberitahuan';
          $data['user'] = $this->db->get_where('wali_kelas', ['id' => $this->session->userdata('id')])->row_array();
          $data['data_berita'] = $this->m_admin->more_berita($id);
          $this->load->view('template_admin/header', $data);
          $this->load->view('template_admin/sidebar');
          $this->load->view('wali_kelas/v_lihatBerita',$data);
          $this->load->view('template_admin/footer');
      }
}