<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Restaurant extends CI_Controller
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
        $this->load->view('front/restaurant', $stores);
        $this->load->view('front/partials/footer');

        // ambil key
        if ($this->input->post('submit')) {
            $data['keyword'] = $this->input->post();
        }

        // load lib
        $this->load->library('pagination');

        // config
        // $config['total_rows'] = $this->Store_model->countAllRes();
        // $config['per_page'] = 12;

        // iniltialize
        // $this->pagination->initialize($config);

        /* $stores['start'] = $this->url->segment(3);
    $stores['stores'] = $this->store_model->getResInfo($config['per_page'], $stores['start']); */

    }

    public function search_keyword()
    {
        $keyword = $this->input->post('keyword');
        $stores['stores'] = $this->Store_model->cari_data($keyword);
        $this->load->view('front/partials/header');
        $this->load->view('front/search', $stores);
        $this->load->view('front/partials/footer');
    }

    public function cari()
    {
        $key = $this->input->post('name');
        $stores['stores'] = $this->Store_model->cari($key);
        $this->load->view('front/partials/header');
        $this->load->view('front/search', $stores);
        $this->load->view('front/partials/footer');
    }

    public function search()
    {

        $search = $this->input->get('search');

        if (!empty($search)) {
            $stores = array();
            $stores['get_all_product'] = $this->Store_model->search($search);
            $stores['search'] = $search;

            if ($stores['get_all_product']) {
                $this->load->view('front/partials/header');
                $this->load->view('front/search', $stores);
                $this->load->view('front/partials/footer');
            } else {
                redirect('error');
            }
        } else {
            redirect('error');
        }
    }

    /* public function loadRecord($rowno = 0)
// {

// Search text
$search_text = "";
if ($this->input->post('submit') != null) {
$search_text = $this->input->post('search');
$this->session->set_userstore$stores(array("search" => $search_text));
} else {
if ($this->session->userstore$stores('search') != null) {
$search_text = $this->session->userstore$stores('search');
}
}

// Row per page
$rowperpage = 5;

// Row position
if ($rowno != 0) {
$rowno = ($rowno - 1) * $rowperpage;
}

// All records count
$allcount = $this->Store_model->getrecordCount($search_text);

// Get  records
$users_record = $this->Store_model->getstore$stores($rowno, $rowperpage, $search_text);

// Pagination Configuration
$config['base_url'] = base_url() . 'index.php/User/loadRecord';
$config['use_page_numbers'] = true;
$config['total_rows'] = $allcount;
$config['per_page'] = $rowperpage;

// Initialize
$this->pagination->initialize($config);

$stores['pagination'] = $this->pagination->create_links();
$stores['result'] = $users_record;
$stores['row'] = $rowno;
$stores['search'] = $search_text;

// Load view
$this->load->view('restaurant', $stores);

//  }

 */

}
