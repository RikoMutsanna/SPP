<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas_model extends CI_Model
{
 private $_table = "kelas";
    public function rules()
    {
        return [

            ['field' => 'nama_kelas',
            'label' => 'Nama Kelas',
            'rules' => 'required'],

            ['field' => 'kompetensi_keahlian',
            'label' => 'Kompetensi Keahlian',
            'rules' => 'required']


            
           
        ];
    }


    public function getAll()
    {

       return $this->db->get($this->_table)->result();

    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_kelas" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id_kelas  = [""];
        $this->nama_kelas = $post["nama_kelas"];
        $this->kompetensi_keahlian = $post["kompetensi_keahlian"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
         $this->id_kelas  = $post["id"];
        $this->nama_kelas = $post["nama_kelas"];
        $this->kompetensi_keahlian = $post["kompetensi_keahlian"];
        $this->db->update($this->_table, $this, array('id_kelas' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_kelas" => $id));
    }
}