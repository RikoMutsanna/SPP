<?php defined('BASEPATH') OR exit('No direct script access allowed');

class History_model extends CI_Model
{
 private $_table = "pembayaran";


    public function getAll()
    {
        $this->db->select("pembayaran.id_bayar, pembayaran.id_petugas,petugas.nama_petugas,pembayaran.nisn,siswa.nama,pembayaran.tgl_bayar,pembayaran.bulan_dibayar,pembayaran.tahun_dibayar,pembayaran.id_spp,spp.nominal,pembayaran.jumlah_bayar");

         $this->db->join('siswa', 'pembayaran.nisn = siswa.nisn');
         $this->db->join('spp', 'pembayaran.id_spp = spp.id_spp');
           $this->db->join('petugas', 'pembayaran.id_petugas = petugas.id_petugas');
           $this->db->where('siswa.nisn', $this->session->userdata('user_id'));
           $this->db->from('pembayaran');
          
             $query = $this->db->get();
           return $query->result();

    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_bayar" => $id])->row();
    }

  
}