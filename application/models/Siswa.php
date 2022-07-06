    <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Model
{


     function __construct(){
  parent::__construct();
  $this->load->database();
 }
    //fungsi cek session logged in
  public function get($username){
        $this->db->where('nisn', $username); // Untuk menambahkan Where Clause : username='$username'
        $result = $this->db->get('siswa')->row(); // Untuk mengeksekusi dan mengambil data hasil query
        return $result;
    }
    function is_logged_in()
    {
        return $this->session->userdata('nisn');
    }

    //fungsi cek level

    //fungsi check login
    function check_login($table, $field1)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($field1);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result();
        }
    }
  }