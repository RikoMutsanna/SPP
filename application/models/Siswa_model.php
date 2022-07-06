<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa_model extends CI_Model
{
 private $_table = "siswa";
    public function rules()
    {
        return [

            ['field' => 'nama',
            'label' => 'Nama',
            'rules' => 'required'],

            ['field' => 'alamat',
            'label' => 'Alamat',
            'rules' => 'required']


            
           
        ];
    }


    public function getAll()
    {

       $this->db->select("siswa.nisn,siswa.nis,siswa.nama,siswa.id_kelas,kelas.nama_kelas,siswa.alamat,siswa.no_telp,siswa.id_spp,spp.nominal");
       $this->db->join('kelas', 'siswa.id_kelas=kelas.id_kelas');
       $this->db->join('spp', 'siswa.id_spp=spp.id_spp');
       $this->db->from('siswa');
       $query =  $this->db->get();
       return $query->result();

    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["nisn" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->nisn  = $post["nisn"];
        $this->nis = $post["nis"];
        $this->nama  = $post["nama"];
        $this->id_kelas = $post["id_kelas"];
        $this->alamat = $post["alamat"];
         $this->no_telp = $post["no_telp"];
        $this->id_spp = $post["id_spp"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
         $this->nisn  = $post["id"];
        $this->nis = $post["nis"];
        $this->nama  = $post["nama"];
        $this->id_kelas = $post["id_kelas"];
        $this->alamat = $post["alamat"];
         $this->no_telp = $post["no_telp"];
        $this->id_spp = $post["id_spp"];
        $this->db->update($this->_table, $this, array('nisn' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("nisn" => $id));
    }
}