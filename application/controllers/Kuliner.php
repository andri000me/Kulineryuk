<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kuliner extends CI_Controller
{

    public function index()
    {
        $this->load->model('Store_model');
        $stores = $this->Store_model->getResInfo();
        $data['stores'] = $stores;
        $this->load->view('front/partials/header');
        $this->load->view('front/home_page', $data);
        $this->load->view('front/partials/footer');
    }

}