<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Video extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Store_model');
    }

    public function index()
    {
        $this->load->model('Store_model');
        $stores = $this->Store_model->getResInfo();
        $stores['stores'] = $stores;
        $this->load->view('front/partials/header');
        $this->load->view('front/video', $stores);
        $this->load->view('front/partials/footer');
    }

    

}