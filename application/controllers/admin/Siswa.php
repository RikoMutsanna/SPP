<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("siswa_model");
        $this->load->model("select_model");
         $this->load->model('admin');
        //cek session dan level user
        if($this->admin->is_role() != "Administrator"){
            redirect("login/");
        }
        
    }

    public function index()
    {
        $data["products"] = $this->siswa_model->getAll();
        $this->load->view("admin/siswa/list", $data);
    }

    public function add()
    {
        $product = $this->siswa_model;
        $validation = $this->form_validation;
        $validation->set_rules($product->rules());

        if ($validation->run()) {
            $product->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');

        }

          $data['kelas'] = $this->select_model->kelas();
        $data['spp'] = $this->select_model->spp();
        $this->load->view("admin/siswa/new_form", $data);
    }

    public function edit($id)
    {
        if (!isset($id)) redirect('admin/siswa');
       
        $product = $this->siswa_model;
        $validation = $this->form_validation;
        $validation->set_rules($product->rules());

        if ($validation->run()) {
            $product->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["product"] = $product->getById($id);
        if (!$data["product"]) show_404();
        
        $data['kelas'] = $this->select_model->kelas();
        $data['spp'] = $this->select_model->spp();
        $this->load->view("admin/siswa/edit_form", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->siswa_model->delete($id)) {
            redirect(site_url('admin/siswa'));
        }
    }
}