<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class History extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("history_model");
    }

    public function index()
    {
        $data["products"] = $this->history_model->getAll();
        $this->load->view("siswa/history/list", $data);
    }

   
    }
