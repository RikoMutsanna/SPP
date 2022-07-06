<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //load library form validasi
        $this->load->library('form_validation');
        //load model admin
        $this->load->model('admin');
    }

    public function index()
    {

            if($this->admin->is_logged_in())
            {
                //jika memang session sudah terdaftar, maka redirect ke halaman dahsboard
                redirect("overview");

            }else{

                //jika session belum terdaftar

                //set form validation
                $this->form_validation->set_rules('username', 'Username', 'required|trim');
                $this->form_validation->set_rules('password', 'Password', 'required|trim');

                //set message form validation
                $this->form_validation->set_message('required', '<div class="alert alert-danger" style="margin-top: 3px">
                    <div class="header"><b><i class="fa fa-exclamation-circle"></i> {field}</b> harus diisi</div></div>');

                //cek validasi
                if ($this->form_validation->run() == TRUE) {

                //get data dari FORM
                $username = $this->input->post("username", TRUE);
                $password = MD5($this->input->post('password', TRUE));

                
                //checking data via model
                $checking = $this->admin->check_login('petugas', array('username' => $username), array('password' => $password));

                //jika ditemukan, maka create session
                if ($checking != FALSE) {
                    foreach ($checking as $apps) {

                        $session_data = array(
                            'user_id'   => $apps->id_petugas,
                            'user_name' => $apps->username,
                            'user_pass' => $apps->password,
                            'user_nama' => $apps->nama_petugas,
                            'level'      => $apps->level
                        );
                        //set session userdata
                        $this->session->set_userdata($session_data);

                        //redirect berdasarkan level user
                        if($this->session->userdata("level") == "Administrator"){
                            redirect('admin');
                        }else{
                            redirect('petugas');
                        }

                    }
               $user = $this->admin->get($username);

                  }elseif(empty($user)){
                    
                   $this->session->set_flashdata('message1', 'Gagal Mengauthentifikasi User');
                    redirect('login');
                }elseif (empty($password == $user->password)) {
                      $this->session->set_flashdata('message2', 'Password salah');
                      redirect('login');
                }else{
                     $data['error'] = '<div class="alert alert-danger" style="margin-top: 1px">
                        <div class="header"><b><i class="fa fa-times-circle"></i> Gagal</b> Data Tidak Valid!!</div></div>';
                    $this->load->view('login', $data);
                }


            }else{

                $this->load->view('login');
            }


        }

    }
   
 public function logout() {
//        destroy session
        $this->session->sess_destroy();
//        redirect ke halaman login
        redirect(site_url('login'));
    }
  
}
?>
