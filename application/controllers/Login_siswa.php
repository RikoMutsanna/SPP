<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_siswa extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //load library form validasi
        $this->load->library('form_validation');
        //load model admin
        $this->load->model('siswa');
    }

    public function index()
    {

            if($this->siswa->is_logged_in())
            {
                //jika memang session sudah terdaftar, maka redirect ke halaman dahsboard
                redirect("overview");

            }else{

                //jika session belum terdaftar

                //set form validation
                $this->form_validation->set_rules('nisn', 'Nisn', 'required');

                //set message form validation
                $this->form_validation->set_message('required', '<div class="alert alert-danger" style="margin-top: 3px">
                    <div class="header"><b><i class="fa fa-exclamation-circle"></i> {field}</b> harus diisi</div></div>');

                //cek validasi
                if ($this->form_validation->run() == TRUE) {

                //get data dari FORM
                $username = $this->input->post("nisn", TRUE);
              

                
                //checking data via model
                $checking = $this->siswa->check_login('siswa', array('nisn' => $username));

                //jika ditemukan, maka create session
                if ($checking != FALSE) {
                    foreach ($checking as $apps) {

                        $session_data = array(
                            'user_id'   => $apps->nisn,
                            'user_nis' => $apps->nis,
                            'user_name' => $apps->nama,
                            'user_id_kelas'=> $apps->id_kelas,
                            'user_alamat' => $apps->alamat,
                            'user_no_telp'      => $apps->no_telp,
                            'user_id_spp' => $apps->id_spp
                        );
                        //set session userdata
                        $this->session->set_userdata($session_data);

                        //redirect berdasarkan level user
                        redirect('siswa');
                    }
               $user = $this->siswa->get($username);

                  }elseif(empty($user)){
                    
                   $this->session->set_flashdata('message1', 'Gagal Mengauthentifikasi User');
                    redirect('login_siswa');
                }else{
                     $data['error'] = '<div class="alert alert-danger" style="margin-top: 1px">
                        <div class="header"><b><i class="fa fa-times-circle"></i> Gagal</b> Data Tidak Valid!!</div></div>';
                    $this->load->view('login_siswa', $data);
                }


            }else{

                $this->load->view('login_siswa');
            }


        }

    }
   
 public function logout() {
//        destroy session
        $this->session->sess_destroy();
//        redirect ke halaman login
        redirect(site_url('login_siswa'));
    }
  
}
?>
