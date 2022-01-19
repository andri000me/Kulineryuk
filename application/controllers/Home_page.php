<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home_page extends CI_Controller
{
    public function index()
    {
        $this->load->model('Menu_model');
        $kategori = $this->Menu_model->getKat();
        $data['kul_kategori'] = $kategori;
        $this->load->view('front/partials/header');
        $this->load->view('front/home_page', $data);
        $this->load->view('front/partials/footer');
    }

    public function sendMail()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'name', 'trim|required');
        $this->form_validation->set_rules('email', 'email', 'trim|required');
        $this->form_validation->set_rules('subject', 'subject', 'trim|required');
        $this->form_validation->set_rules('message', 'message', 'trim|required');

        if ($this->form_validation->run() == true) {
            $name = $this->input->post('name');
            $emailFrom = $this->input->post('email');
            $subject = $this->input->post('subject');
            $message = $this->input->post('message');

            $toEmail = "rahulrajendrashewale@gmail.com";
            $mailHeaders = "From: " . $name . "<" . $emailFrom . ">\r\n";
            if (mail($toEmail, $subject, $message, $mailHeaders)) {
                $this->session->set_flashdata("msg", "mail has been sent successfully");
            } else {
                $this->session->set_flashdata("msg", "mail is not sent, try again.");
            }
            redirect(base_url() . 'home/index');
        } else {
            redirect(base_url() . 'home/index');
        }
    }

   

}