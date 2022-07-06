<?php

class Overview extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        //load model admin
        $this->load->model('admin');
        //cek session dan level user
        if($this->admin->is_role() != "Petugas"){
            redirect("login");
        }
    }

	public function index()
	{
        // load view admin/overview.php
        $this->load->view("petugas/overview");
	}
	
}
?>	