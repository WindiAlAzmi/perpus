<?php

class M_siswa extends CI_Model{

    public function id_trans(){
        $this->db->select('RIGHT(transaksi_buku.id_transaksi,3) as kode', FALSE);
        $this->db->order_by('id_transaksi', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('transaksi_buku');
        if($query->num_rows() <> 0){
            $data = $query->row();
            $kode = intval($data->kode)+1;
        }else{
            $kode = 1;
        }
    
        $kodemax = str_pad($kode,3,"0",STR_PAD_LEFT);
        $kodejadi = "TS-".$kodemax;
        return $kodejadi;

    }

    public function id_pengembalian(){
        $this->db->select('RIGHT(pengembalian_buku.id_pengembalian,3) as kode', FALSE);
        $this->db->order_by('id_pengembalian', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('pengembalian_buku');
        if($query->num_rows() <> 0){
            $data = $query->row();
            $kode = intval($data->kode)+1;
        }else{
            $kode = 1;
        }
    
        $kodemax = str_pad($kode,3,"0",STR_PAD_LEFT);
        $kodejadi = "PG-".$kodemax;
        return $kodejadi;

    }


    public function id_siswa(){
        $this->db->select('RIGHT(siswa.id,3) as kode', FALSE);
        $this->db->order_by('id', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('siswa');
        if($query->num_rows() <> 0){
            $data = $query->row();
            $kode = intval($data->kode)+1;
        }else{
            $kode = 1;
        }
    
        $kodemax = str_pad($kode,3,"0",STR_PAD_LEFT);
        $kodejadi = "SW".$kodemax;
        return $kodejadi;

    }

    public function tigatable2($data_user, $status) {
        $this->db->select('*');
        $this->db->from('transaksi_buku');
        $this->db->join('siswa','transaksi_buku.id_siswa=siswa.id');
        $this->db->join('buku','transaksi_buku.id_buku=buku.id');
        $this->db->join('status','transaksi_buku.id_status=status.id');
        $this->db->where('transaksi_buku.id_siswa', $data_user);
        $this->db->where('transaksi_buku.id_status', $status);
        $this->db->order_by('transaksi_buku.id_transaksi','DESC');
        $query = $this->db->get();
        return $query;
    }

    public function tigatable3($data_user, $status, $id_jenis) {
        $this->db->select('*');
        $this->db->from('transaksi_buku');
        $this->db->join('siswa','transaksi_buku.id_siswa=siswa.id');
        $this->db->join('buku','transaksi_buku.id_buku=buku.id');
        $this->db->join('status','transaksi_buku.id_status=status.id');
        $this->db->join('jenis_buku','transaksi_buku.id_jenis=jenis_buku.id_jenis');
        $this->db->where('transaksi_buku.id_siswa', $data_user);
        $this->db->where('transaksi_buku.id_status', $status);
        $this->db->where('transaksi_buku.id_jenis', $id_jenis);
        $this->db->order_by('transaksi_buku.id_transaksi','DESC');
        $query = $this->db->get();
        return $query;
    }


    public function pengembalian($data_user, $status, $id_jenis) {
        $this->db->select('*');
        $this->db->from('pengembalian_buku');
        $this->db->join('siswa','pengembalian_buku.id_siswa=siswa.id');
        $this->db->join('buku','pengembalian_buku.id_buku=buku.id');
        $this->db->join('status','pengembalian_buku.id_status=status.id');
        $this->db->join('jenis_buku','pengembalian_buku.id_jenis=jenis_buku.id_jenis');
        $this->db->where('pengembalian_buku.id_siswa', $data_user);
        $this->db->where('pengembalian_buku.id_status', $status);
        $this->db->where('pengembalian_buku.id_jenis', $id_jenis);
        $this->db->order_by('pengembalian_buku.id_pengembalian','DESC');
        $query = $this->db->get();
        return $query;
    }

    public function tigatable($data_user){
        $this->db->select('*');
        $this->db->from('transaksi_buku');
        $this->db->join('siswa','transaksi_buku.id_siswa=siswa.id');
        $this->db->join('buku','transaksi_buku.id_buku=buku.id');
        $this->db->join('status','transaksi_buku.id_status=status.id');
        $this->db->where('transaksi_buku.id_siswa', $data_user);
        $this->db->order_by('transaksi_buku.id_transaksi','DESC');
        $query = $this->db->get();
        return $query;
    }

    public function lihat($id_transaksi) {
        $this->db->select('*');
        $this->db->from('transaksi_buku');
        $this->db->join('siswa','transaksi_buku.id_siswa=siswa.id');
        $this->db->join('buku','transaksi_buku.id_buku=buku.id');
        $this->db->join('status','transaksi_buku.id_status=status.id');
        $this->db->join('jenis_buku','transaksi_buku.id_jenis=jenis_buku.id_jenis');
        $this->db->where('transaksi_buku.id_transaksi', $id_transaksi);
        $query = $this->db->get();
        return $query;
    }

    public function detailPengembalian($id_pengembalian) {
        $this->db->select('*');
        $this->db->from('pengembalian_buku');
        $this->db->join('siswa','pengembalian_buku.id_siswa=siswa.id');
        $this->db->join('buku','pengembalian_buku.id_buku=buku.id');
        $this->db->join('status','pengembalian_buku.id_status=status.id');
        $this->db->join('jenis_buku','pengembalian_buku.id_jenis=jenis_buku.id_jenis');
        $this->db->where('pengembalian_buku.id_pengembalian', $id_pengembalian);
        $query = $this->db->get();
        return $query;
    }

    public function jumlah_buku($id) {
        $this->db->select('jumlah');
        $this->db->from('buku');
        $this->db->where('id', $id);
        return $this->db->get()->row_array();
    }

    public function getDataById_ts($id_transaksi){
        $this->db->select('*');
        $this->db->from('transaksi_buku');
        $this->db->join('siswa','transaksi_buku.id_siswa=siswa.id');
        $this->db->join('buku','transaksi_buku.id_buku=buku.id');
        $this->db->where('transaksi_buku.id_transaksi', $id_transaksi);
        return $query = $this->db->get()->row_array();
    

    }

    public function getDataById_Pg($id_pengembalian){
        $this->db->select('*');
        $this->db->from('pengembalian_buku');
        $this->db->join('siswa','pengembalian_buku.id_siswa=siswa.id');
        $this->db->join('buku','pengembalian_buku.id_buku=buku.id');
        $this->db->where('pengembalian_buku.id_pengembalian', $id_pengembalian);
        return $query = $this->db->get()->row_array();
    }


    
    public function deleteTransaksi_buku2($id_transaksi) {
        $this->db->where('id_transaksi', $id_transaksi);
        $this->db->delete('transaksi_buku');
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
    
    public function get_data($table)
    {
        return $this->db->get($table);
    }


    public function insert_data($data, $table){
        $this->db->insert($table, $data);
   }


   
   public function update_data($table, $data, $where){
    $this->db->update($table, $data, $where);
}

public function delete_data($where, $table){
    $this->db->where($where);
    $this->db->delete($table);
}




    }