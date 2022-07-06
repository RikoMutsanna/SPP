<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Spp extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("spp_model");
         $this->load->model('admin');
        //cek session dan level user
        if($this->admin->is_role() != "Administrator"){
            redirect("login/");
        }
        
    }

    public function index()
    {
        $data["products"] = $this->spp_model->getAll();
        $this->load->view("admin/spp/list", $data);
    }

    public function add()
    {
        $product = $this->spp_model;
        $validation = $this->form_validation;
        $validation->set_rules($product->rules());

        if ($validation->run()) {
            $product->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');

        }

        
        $this->load->view("admin/spp/new_form");
    }

    public function edit($id)
    {
        if (!isset($id)) redirect('admin/spp');
       
        $product = $this->spp_model;
        $validation = $this->form_validation;
        $validation->set_rules($product->rules());

        if ($validation->run()) {
            $product->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["product"] = $product->getById($id);
        if (!$data["product"]) show_404();

        $this->load->view("admin/spp/edit_form", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->spp_model->delete($id)) {
            redirect(site_url('admin/spp'));
        }
    }
}