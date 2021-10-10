<?php

class Jenis extends CI_Controller
{
    public function index()
    {
        $data['judul'] = 'Daftar Jenis Buku';
        $data['isi'] = 'Jenis Buku';
        $data['data_jenisBuku'] = $this->m_jenis->get_data('jenis_buku')->result();
        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/v_jenisBuku', $data);
        $this->load->view('template_admin/footer');
    }


    public function tambah_jenis_buku()
    {
        $data['judul'] = 'Form Tambah Jenis Buku';
        $data['isi'] = 'Jenis Buku';
        $data['id_jenis'] = $this->m_jenis->id_jenis();
        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/v_form_tambah_jenisBuku', $data);
        $this->load->view('template_admin/footer');
    }

    public function simpan()
    {
        //validasi 

        $this->form_validation->set_rules(
            'nama_jenis',
            'Nama Jenis Buku',
            'required',
            array('required' =>  ' nama jenis buku harus diisi! ')
        );

        if ($this->form_validation->run() == FALSE) {
            $this->tambah_jenis_buku();
        } else {
            $id_jenis = $this->input->post('id_jenis');
            $nama_jenis = $this->input->post('nama_jenis');

            $data = array(
                'id_jenis' =>  $id_jenis,
                'nama_jenis' => $nama_jenis
            );
            $this->m_jenis->insert_data($data, 'jenis_buku');
            $this->session->set_flashdata('sukses', 'data berhasil ditambahkan');
            redirect('admin/jenis');
        }
    }


    public function update_jenis($id)
    {
        $where = array('id_jenis' => $id);
        $data['jenis_buku'] = $this->db->query("SELECT *FROM jenis_buku WHERE jenis_buku.id_jenis = '$id'")->result();
        $data['judul'] = 'Form Tambah Jenis Buku';
        $data['isi'] = 'Jenis Buku';
        $data['id_jenis'] = $this->m_jenis->id_jenis();
        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/v_form_update_jenisBuku', $data);
        $this->load->view('template_admin/footer');
    }

    public function update_jenis_aksi()
    {

        $this->form_validation->set_rules(
            'nama_jenis',
            'Nama Jenis Buku',
            'required',
            array('required' =>  ' nama jenis buku harus diisi! ')
        );

        $id = $this->input->post('id_jenis');

        if ($this->form_validation->run() == FALSE) {
           
            $this->update_jenis($id);
        } else {
            $id_jenis = $this->input->post('id_jenis');
            $nama_jenis = $this->input->post('nama_jenis');

            $data = array(
                'id_jenis' =>  $id_jenis,
                'nama_jenis' => $nama_jenis
            );

            $where = array(
                'id_jenis' => $id
            );

            $this->m_jenis->update_data('jenis_buku', $data, $where);
            $this->session->set_flashdata('sukses', 'data berhasil diubah');
            redirect('admin/jenis');
        }
    }

    public function hapus_jenis($id){
        $where = array('id_jenis' => $id);
        $this->m_jenis->delete_data($where, 'jenis_buku');
        $this->session->set_flashdata('sukses', 'data berhasil dihapus');
       redirect('admin/jenis');

    }
}
