<?php

class M_buku extends CI_Model{
    
    public function id_buku(){
        $this->db->select('RIGHT(buku.id_buku,3) as kode', FALSE);
        $this->db->order_by('id_buku', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('buku');
        if($query->num_rows() <> 0){
            $data = $query->row();
            $kode = intval($data->kode)+1;
        }else{
            $kode = 1;
        }
    
        $kodemax = str_pad($kode,3,"0",STR_PAD_LEFT);
        $kodejadi = "BK".$kodemax;
        return $kodejadi;

    }

    public function get_data($table){
        return $this->db->get($table);
    }

    public function insert_data($data, $table){
        $this->db->insert($table, $data);
   }

    public function join2($jenis_buku){
            $this->db->select('*');
            $this->db->from('buku');
            $this->db->join('jenis_buku','buku.id_jenisBuku = jenis_buku.id_jenis');
            $this->db->where('jenis_buku.id_jenis', $jenis_buku);
            $this->db->order_by('buku.id','DESC');
            $query = $this->db->get();
            return $query;
        
    }

}