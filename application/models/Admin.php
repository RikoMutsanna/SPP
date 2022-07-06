    <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Model
{


     function __construct(){
  parent::__construct();
  $this->load->database();
 }
    //fungsi cek session logged in
  public function get($username){
        $this->db->where('username', $username); // Untuk menambahkan Where Clause : username='$username'
        $result = $this->db->get('petugas')->row(); // Untuk mengeksekusi dan mengambil data hasil query
        return $result;
    }
    function is_logged_in()
    {
        return $this->session->userdata('id_petugas');
    }

    //fungsi cek level
    function is_role()
    {
        return $this->session->userdata('level');
    }

    //fungsi check login
    function check_login($table, $field1, $field2)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($field1);
        $this->db->where($field2);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result();
        }
    }
     public function getAllUsers(){
  $query = $this->db->get('petugas');
  return $query->result(); 
 }

 public function insert($Petugas){
  $this->db->insert('petugas', $petugas);
  return $this->db->insert_id(); 
 }

 public function getUser($id){
  $query = $this->db->get_where('petugas',array('id_petugas'=>$id));
  return $query->row_array();
 }

 public function activate($data, $id){
  $this->db->where('petugas.id_petugas', $id);
  return $this->db->update('petugas', $data);
 }
}