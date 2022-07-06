<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran_model extends CI_Model
{
 private $_table = "pembayaran";

    public function rules()
    {
        return [

            ['field' => 'tgl_bayar',
            'label' => 'Tanggal',
            'rules' => 'required'],

            ['field' => 'jumlah_bayar',
            'label' => 'Jumlah',
            'rules' => 'required'],

           ['field' => 'id_bayar',
           'label' => 'ID Pembayaran',
           'rules' =>'min_length[0]|max_length[25]|is_unique[pembayaran.id_bayar]']


            
           
        ];
    }


    public function getAll()
    {
        $this->db->select("pembayaran.id_bayar, pembayaran.id_petugas,petugas.nama_petugas,pembayaran.nisn,siswa.nama,pembayaran.tgl_bayar,pembayaran.bulan_dibayar,pembayaran.tahun_dibayar,pembayaran.id_spp,spp.nominal,pembayaran.jumlah_bayar");

         $this->db->join('siswa', 'pembayaran.nisn = siswa.nisn');
         $this->db->join('spp', 'pembayaran.id_spp = spp.id_spp');
           $this->db->join('petugas', 'pembayaran.id_petugas = petugas.id_petugas');
           
           $this->db->from('pembayaran');
          
             $query = $this->db->get();
           return $query->result();

    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_bayar" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id_bayar = $post["id_bayar"];
        $this->id_petugas  = $post["id_petugas"];
        $this->nisn = $post["nisn"];
        $this->tgl_bayar  = $post["tgl_bayar"];
        $this->bulan_dibayar = $post["bulan_dibayar"];
        $this->tahun_dibayar = $post["tahun_dibayar"];
        $this->id_spp = $post["id_spp"];
        $this->jumlah_bayar = $post["jumlah_bayar"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_petugas  = $post["id_petugas"];
        $this->nisn = $post["nisn"];
        $this->tgl_bayar  = $post["tgl_bayar"];
        $this->bulan_dibayar = $post["bulan_dibayar"];
        $this->tahun_dibayar = $post["tahun_dibayar"];
        $this->id_spp = $post["id_spp"];
        $this->jumlah_bayar = $post["jumlah_bayar"];
        $this->db->update($this->_table, $this, array('id_bayar' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_bayar" => $id));
    }
}