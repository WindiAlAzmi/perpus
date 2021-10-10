<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    
        public function index(){
            if ($this->session->userdata('nama_siswa')) {
                redirect('siswa/dashboard');
            } else if ($this->session->userdata('nama_waliKelas')) {
                redirect('wali_kelas/dashboard');
            } else if ($this->session->userdata('nama_admin')) {
                redirect('admin/dashboard');
            }

            $this->form_validation->set_rules('id', 'id', 'trim|required');
            $this->form_validation->set_rules('password', 'password', 'trim|required');

            if($this->form_validation->run() == FALSE){
                $this->load->view('auth/v_login');
            }else{
                //jika validasi sukses 
                $this->_login();

            }
          
        }

        private function _login(){
            $level = $this->input->post('level');
            $id = $this->input->post('id');
            $password = $this->input->post('password');

            if ($level === "siswa") {
                $siswa = $this->db->get_where('siswa', ['nis' => $id])->row_array();
    
                if ($siswa) {
    
                    if ($password === $siswa["password"]) {
    
                        $data = [
                            'id' => $siswa['id'],
                            'nama_siswa' => $siswa['nama'],
                            'kelas' => $siswa['kelas']
                        ];
                        $this->session->set_userdata($data);
                        redirect('siswa/dashboard');
                    } else {
                        $this->session->set_flashdata('message', '<div class="alert
                        alert-danger" role="alert"> password yang anda masukkan salah !  </div>');
                        redirect('auth');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert
                    alert-danger" role="alert"> id yang anda masukkan salah !  </div>');
                    redirect('auth');
                }

        }else if ($level  === "wali_kelas") {

            $wali_kelas = $this->db->get_where('wali_kelas', ['nip' => $id])->row_array();

            if ($wali_kelas) {

                if ($password === $wali_kelas["password"]) {

                    $data = [
                        'id' => $wali_kelas['id'],
                        'nama_waliKelas' => $wali_kelas['nama'],
                        'kelas' => $wali_kelas['kelas']
                    ];

                    $this->session->set_userdata($data);
                    redirect('wali_kelas/dashboard');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert
                        alert-danger" role="alert"> password yang anda masukkan salah !  </div>');
                        redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert
                    alert-danger" role="alert"> id yang anda masukkan salah !  </div>');
                    redirect('auth');
            }
        } else if ($level === "admin") {

            $admin = $this->db->get_where('admin', ['id' => $id])->row_array();

            if ($admin) {

                if ($password === $admin["password"]) {
                    $data = [
                        'id' => $admin['id'],
                        'nama_admin' => $admin['nama']
                    ];

                    $this->session->set_userdata($data);
                    redirect('admin/dashboard');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert
                        alert-danger" role="alert"> password yang anda masukkan salah !  </div>');
                        redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert
                alert-danger" role="alert"> id yang anda masukkan salah !  </div>');
                redirect('auth');
            }
        }
    }
       
    public function logout()
    {
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('nama_siswa');
        $this->session->unset_userdata('nama_waliKelas');
        $this->session->unset_userdata('nama_admin');

        $this->session->set_flashdata('message', '<div class="alert
        alert-success" role="alert">you have been logout!  </div>');
        redirect('auth');
    }

}