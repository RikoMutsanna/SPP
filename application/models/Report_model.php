<?php  defined('BASEPATH') OR exit('No direct script access allowed');
class Report_model extends CI_Model {
  
  public function view_by_date($date){
        $this->db->where('DATE(tgl)', $date); // Tambahkan where tanggal nya
        
    return $this->db->get('transaksi')->result();// Tampilkan data transaksi sesuai tanggal yang diinput oleh user pada filter
  }

    
  public function view_by_month($month, $year){
        $this->db->where('bulan_dibayar', $month); // Tambahkan where bulan
        $this->db->where('tahun_dibayar', $year); // Tambahkan where tahun
        
    return $this->db->get('pembayaran')->result(); // Tampilkan data transaksi sesuai bulan dan tahun yang diinput oleh user pada filter
  }
    
  public function view_by_year($year){
        $this->db->where('tahun_dibayar', $year); // Tambahkan where tahun
        
    return $this->db->get('pembayaran')->result(); // Tampilkan data transaksi sesuai tahun yang diinput oleh user pada filter
  }
    
  public function view_all(){
    return $this->db->get('pembayaran')->result(); // Tampilkan semua data transaksi
  }
    
    public function option_tahun(){
        $this->db->select('tahun_dibayar AS tahun'); // Ambil Tahun dari field tgl
        $this->db->from('pembayaran'); // select ke tabel transaksi
        $this->db->order_by('tahun_dibayar'); // Urutkan berdasarkan tahun secara Ascending (ASC)
        $this->db->group_by('tahun_dibayar'); // Group berdasarkan tahun pada field tgl
        
        return $this->db->get()->result(); // Ambil data pada tabel transaksi sesuai kondisi diatas
    }
}