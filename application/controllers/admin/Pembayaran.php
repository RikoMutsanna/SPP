<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("pembayaran_model");
        $this->load->model("select_model");
         $this->load->model('admin');
        //cek session dan level user
        if($this->admin->is_role() != "Administrator"){
            redirect("login/");
        }
    }

    public function index()
    {
        $data["products"] = $this->pembayaran_model->getAll();
        $this->load->view("admin/pembayaran/list", $data);
    }

    public function add()
    {
        $product = $this->pembayaran_model;
        $validation = $this->form_validation;
        $validation->set_rules($product->rules());

        if ($validation->run()) {
            $product->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');

        }

        $data['petugas'] = $this->select_model->petugas();
        $data['siswa'] = $this->select_model->siswa();
        $data['spp'] = $this->select_model->spp();
        $this->load->view("admin/pembayaran/new_form", $data);
    }

    public function edit($id)
    {
        if (!isset($id)) redirect('admin/pembayaran');
       
        $product = $this->pembayaran_model;
        $validation = $this->form_validation;
        $validation->set_rules($product->rules());

        if ($validation->run()) {
            $product->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["product"] = $product->getById($id);
        if (!$data["product"]) show_404();
        $data['petugas'] = $this->select_model->petugas();
        $data['siswa'] = $this->select_model->siswa();
        $data['spp'] = $this->select_model->spp();
        $this->load->view("admin/pembayaran/edit_form", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->pembayaran_model->delete($id)) {

            redirect(site_url('admin/pembayaran'));
             $this->session->set_flashdata('success', 'Berhasil Di Hapus');
        }
    }
}