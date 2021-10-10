<?php

class M_admin extends CI_Model{

    public function id_admin(){
        $this->db->select('RIGHT(admin.id,3) as kode', FALSE);
        $this->db->order_by('id', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('admin');
        if($query->num_rows() <> 0){
            $data = $query->row();
            $kode = intval($data->kode)+1;
        }else{
            $kode = 1;
        }
    
        $kodemax = str_pad($kode,3,"0",STR_PAD_LEFT);
        $kodejadi = "SD-".$kodemax;
        return $kodejadi;

    }

    public function id_wali(){
        $this->db->select('RIGHT(wali_kelas.id,3) as kode', FALSE);
        $this->db->order_by('id', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('wali_kelas');
        if($query->num_rows() <> 0){
            $data = $query->row();
            $kode = intval($data->kode)+1;
        }else{
            $kode = 1;
        }
    
        $kodemax = str_pad($kode,3,"0",STR_PAD_LEFT);
        $kodejadi = "WL-".$kodemax;
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
        $kodejadi = "SW-".$kodemax;
        return $kodejadi;

    }

    public function id_berita(){
        $this->db->select('RIGHT(pemberitahuan.id,3) as kode', FALSE);
        $this->db->order_by('id', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('pemberitahuan');
        if($query->num_rows() <> 0){
            $data = $query->row();
            $kode = intval($data->kode)+1;
        }else{
            $kode = 1;
        }
    
        $kodemax = str_pad($kode,3,"0",STR_PAD_LEFT);
        $kodejadi = "PM-".$kodemax;
        return $kodejadi;

    }

    public function id_buku(){
        $this->db->select('RIGHT(buku.id,3) as kode', FALSE);
        $this->db->order_by('id', 'DESC');
        $this->db->limit(1);
        $this->db->where('buku.id_jenisBuku', 1);
        $query = $this->db->get('buku');
        if($query->num_rows() <> 0){
            $data = $query->row();
            $kode = intval($data->kode)+1;
        }else{
            $kode = 1;
        }
    
        $kodemax = str_pad($kode,3,"0",STR_PAD_LEFT);
        $kodejadi = "BK-".$kodemax;
        return $kodejadi;

    }


    public function id_buku_paket(){
        $this->db->select('RIGHT(buku.id,3) as kode', FALSE);
        $this->db->order_by('id', 'DESC');
        $this->db->limit(1);
        $this->db->where('buku.id_jenisBuku', 2);
        $query = $this->db->get('buku');
        if($query->num_rows() <> 0){
            $data = $query->row();
            $kode = intval($data->kode)+1;
        }else{
            $kode = 1;
        }
    
        $kodemax = str_pad($kode,3,"0",STR_PAD_LEFT);
        $kodejadi = "PK-".$kodemax;
        return $kodejadi;

    }


    public function get_data($table)
    {
        return $this->db->get($table);
    }


    public function insert_data($data, $table){
       return  $this->db->insert($table, $data);
   }


   
   public function update_data($table, $data, $where){
    $this->db->update($table, $data, $where);
}

public function delete_data($where, $table){
    $this->db->where($where);
    $this->db->delete($table);
}

public function more_berita($id)
{
    $berita = $this->db->where('id', $id)->get('pemberitahuan');

    if ($berita ->num_rows() > 0) {
        return $berita ->result();
    } else {
        return false;
    }
}

public function joinAnggota_wali(){
    $this->db->select('*');
    $this->db->from('wali_kelas');
    $this->db->join('kelas','wali_kelas.kelas = kelas.id_kelas');
    $this->db->order_by('wali_kelas.id','DESC');
    $query = $this->db->get();
    return $query;

}

public function joinAnggota_siswa(){
    $this->db->select('*');
    $this->db->from('siswa');
    $this->db->join('kelas','siswa.kelas = kelas.id_kelas');
    $this->db->order_by('siswa.id','DESC');
    $query = $this->db->get();
    return $query;

}


public function cariWali($id){
    $this->db->select('*');
    $this->db->from('wali_kelas');
    $this->db->join('kelas','wali_kelas.kelas = kelas.id_kelas');
    $this->db->where('wali_kelas.id', $id);
    $this->db->order_by('wali_kelas.id','DESC');
    $query = $this->db->get();
    return $query;

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

public function get_bacaan($id_siswa){
    $this->db->select('*');
    $this->db->from('transaksi_buku');
    $this->db->join('jenis_buku','transaksi_buku.id_jenis = jenis_buku.id_jenis');
    $this->db->where('transaksi_buku.id_siswa', $id_siswa);
    $this->db->where('jenis_buku.id_jenis', 1);
    $query = $this->db->get()->num_rows();
    return $query;

}

public function kembali_bacaan($id_siswa){
    $this->db->select('*');
    $this->db->from('pengembalian_buku');
    $this->db->join('jenis_buku','pengembalian_buku.id_jenis = jenis_buku.id_jenis');
    $this->db->where('pengembalian_buku.id_siswa', $id_siswa);
    $this->db->where('pengembalian_buku.id_jenis', 1);
    $query = $this->db->get()->num_rows();
    return $query;


}

public function get_paket($id_siswa){
    $this->db->select('*');
    $this->db->from('transaksi_buku');
    $this->db->join('jenis_buku','transaksi_buku.id_jenis = jenis_buku.id_jenis');
    $this->db->where('transaksi_buku.id_siswa', $id_siswa);
    $this->db->where('jenis_buku.id_jenis', 2);
    $query = $this->db->get()->num_rows();
    return $query;

}

public function kembali_paket($id_siswa){
    $this->db->select('*');
    $this->db->from('pengembalian_buku');
    $this->db->join('jenis_buku','pengembalian_buku.id_jenis = jenis_buku.id_jenis');
    $this->db->where('pengembalian_buku.id_siswa', $id_siswa);
    $this->db->where('pengembalian_buku.id_jenis', 2);
    $query = $this->db->get()->num_rows();
    return $query;


}

public function lihat($id) {
    $this->db->select('*');
    $this->db->from('buku');
    $this->db->where('buku.id', $id);
    $query = $this->db->get();
    return $query;
}

public function laporan($status, $id_jenis, $dari, $sampai) {
    $this->db->select('*');
    $this->db->from('pengembalian_buku');
    $this->db->join('siswa','pengembalian_buku.id_siswa=siswa.id');
    $this->db->join('buku','pengembalian_buku.id_buku=buku.id');
    $this->db->join('status','pengembalian_buku.id_status=status.id');
    $this->db->join('kelas','pengembalian_buku.id_kelas=kelas.id_kelas');
    $this->db->join('jenis_buku','pengembalian_buku.id_jenis=jenis_buku.id_jenis');
    $this->db->where('pengembalian_buku.id_status', $status);
    $this->db->where('pengembalian_buku.id_jenis', $id_jenis);
    $this->db->where('pengembalian_buku.tgl_pinjam>=', $dari);
    $this->db->where('pengembalian_buku.tgl_kembalikan<=', $sampai);
    $this->db->order_by('pengembalian_buku.id_pengembalian','DESC');
    $query = $this->db->get();
    return $query;
}

public function laporan2($status, $id_jenis) {
    $this->db->select('*');
    $this->db->from('pengembalian_buku');
    $this->db->join('siswa','pengembalian_buku.id_siswa=siswa.id');
    $this->db->join('buku','pengembalian_buku.id_buku=buku.id');
    $this->db->join('status','pengembalian_buku.id_status=status.id');
    $this->db->join('kelas','pengembalian_buku.id_kelas=kelas.id_kelas');
    $this->db->join('jenis_buku','pengembalian_buku.id_jenis=jenis_buku.id_jenis');
    $this->db->where('pengembalian_buku.id_status', $status);
    $this->db->where('pengembalian_buku.id_jenis', $id_jenis);
    $this->db->order_by('pengembalian_buku.id_pengembalian','DESC');
    $query = $this->db->get();
    return $query;
}


}