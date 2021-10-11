<?php

class M_wali extends CI_Model
{   
    public function id_wali(){
        $this->db->select('RIGHT(wali_kelas.id,3) as id', FALSE);
        $this->db->order_by('id', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('wali_kelas');
        if($query->num_rows() <> 0){
            $data = $query->row();
            $kode = intval($data->id)+1;
        }else{
            $kode = 1;
        }
    
        $kodemax = str_pad($kode,3,"0",STR_PAD_LEFT);
        $kodejadi = "WS".$kodemax;
        return $kodejadi;

    }

    public function get_data($table)
    {
        return $this->db->get($table);
    }

    public function get_dataSiswa($id)
    {
        $this->db->select('*');
        $this->db->from('siswa');
        $this->db->where('kelas', $id);
        return  $this->db->get();
    }

    public function duatable($id_kelas, $id_jenis, $status) {
        $this->db->select('*');
        $this->db->from('transaksi_buku');
        $this->db->join('siswa','transaksi_buku.id_siswa=siswa.id');
        $this->db->join('buku','transaksi_buku.id_buku=buku.id');
        $this->db->join('status','transaksi_buku.id_status=status.id');
        $this->db->join('jenis_buku','transaksi_buku.id_jenis=jenis_buku.id_jenis');
        $this->db->join('kelas','transaksi_buku.id_kelas=kelas.id_kelas');
        $this->db->where('transaksi_buku.id_kelas', $id_kelas);
        $this->db->where('transaksi_buku.id_jenis', $id_jenis);
        $this->db->where('transaksi_buku.id_status', $status);
        $this->db->order_by('transaksi_buku.id_transaksi','DESC');
        $query = $this->db->get();
        return $query;
    }

    public function update_status($id_transaksi, $status_transaksi) {
        $this->db->set('status_transaksi', $status_transaksi);
        $this->db->where('transaksi_buku.id_transaksi', $id_transaksi);
        $this->db->update('transaksi_buku');
    }

    public function update_status_pengembalian($id_pengembalian, $status_transaksi) {
        $this->db->set('status_transaksi', $status_transaksi);
        $this->db->where('pengembalian_buku.id_pengembalian', $id_pengembalian);
        $this->db->update('pengembalian_buku');
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

    public function lihat_pengembalian($id_pengembalian) {
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


    public function kembali($id_kelas, $id_jenis, $status) {
        $this->db->select('*');
        $this->db->from('pengembalian_buku');
        $this->db->join('siswa','pengembalian_buku.id_siswa=siswa.id');
        $this->db->join('buku','pengembalian_buku.id_buku=buku.id');
        $this->db->join('status','pengembalian_buku.id_status=status.id');
        $this->db->join('jenis_buku','pengembalian_buku.id_jenis=jenis_buku.id_jenis');
        $this->db->where('pengembalian_buku.id_kelas', $id_kelas);
        $this->db->where('pengembalian_buku.id_jenis', $id_jenis);
        $this->db->where('pengembalian_buku.id_status', $status);
        $this->db->order_by('pengembalian_buku.id_pengembalian','DESC');
        $query = $this->db->get();
        return $query;
    }

    public function laporan($status, $id_jenis, $dari, $sampai, $id_kelas) {
        $this->db->select('*');
        $this->db->from('pengembalian_buku');
        $this->db->join('siswa','pengembalian_buku.id_siswa=siswa.id');
        $this->db->join('buku','pengembalian_buku.id_buku=buku.id');
        $this->db->join('status','pengembalian_buku.id_status=status.id');
        $this->db->join('kelas','pengembalian_buku.id_kelas=kelas.id_kelas');
        $this->db->join('jenis_buku','pengembalian_buku.id_jenis=jenis_buku.id_jenis');
        $this->db->where('pengembalian_buku.id_status', $status);
        $this->db->where('pengembalian_buku.id_jenis', $id_jenis);
        $this->db->where('pengembalian_buku.tgl_pinjam >=', $dari);
        $this->db->where('pengembalian_buku.tgl_kembalikan <=', $sampai);
        $this->db->where('pengembalian_buku.id_kelas', $id_kelas);
        $this->db->order_by('pengembalian_buku.id_pengembalian','DESC');
        $query = $this->db->get();
        return $query;
    }
    
    public function laporan2($status, $id_jenis, $id_kelas) {
        $this->db->select('*');
        $this->db->from('pengembalian_buku');
        $this->db->join('siswa','pengembalian_buku.id_siswa=siswa.id');
        $this->db->join('buku','pengembalian_buku.id_buku=buku.id');
        $this->db->join('status','pengembalian_buku.id_status=status.id');
        $this->db->join('kelas','pengembalian_buku.id_kelas=kelas.id_kelas');
        $this->db->join('jenis_buku','pengembalian_buku.id_jenis=jenis_buku.id_jenis');
        $this->db->where('pengembalian_buku.id_status', $status);
        $this->db->where('pengembalian_buku.id_jenis', $id_jenis);
        $this->db->where('pengembalian_buku.id_kelas', $id_kelas);
        $this->db->order_by('pengembalian_buku.id_pengembalian','DESC');
        $query = $this->db->get();
        return $query;
    }
    
    

}