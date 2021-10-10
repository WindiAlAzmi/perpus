<?php

class M_berita extends CI_Model{
    public function edit_berita($id){
        $this->db->where('id_pemberitahuan', $id);
        return $this->db->get('pemberitahuan')->row_array();
    }

    public function update($id_pemberitahuan, $data) {
        $this->db->where('id_pemberitahuan',$id_pemberitahuan);
        $this->db->update('pemberitahuan', $data);
    }

    public function hapus_berita($id){
        $this->db->where('id_pemberitahuan', $id);
        $this->db->delete('pemberitahuan');
    }
}