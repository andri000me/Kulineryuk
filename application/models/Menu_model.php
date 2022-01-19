<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function create($formArray)
    {
        $this->db->insert('dishesh', $formArray);
    }

    public function getMenu()
    {
        $result = $this->db->get('dishesh')->result_array();
        return $result;
    }

    public function getKat()
    {
        $this->db->select('*');
        $this->db->from('kul_kategori');

        $result = $this->db->get()->result_array();
        return $result;

    }

    public function getKate($id)
    {
        $this->db->where('k_id', $id);
        $kat = $this->db->get('kul_kategori')->row_array();
        return $kat;
    }

    public function getSingleDish($id)
    {
        $this->db->where('d_id', $id);
        $dish = $this->db->get(' ')->row_array();
        return $dish;
    }

    public function update($id, $formArray)
    {
        $this->db->where('d_id', $id);
        $this->db->update('dishesh', $formArray);
    }

    public function delete($id)
    {
        $this->db->where('d_id', $id);
        $this->db->delete('dishesh');
    }

    public function countDish()
    {
        $query = $this->db->get('dishesh');
        return $query->num_rows();
    }

    public function getDishesh($id)
    {
        $this->db->where('r_id', $id);
        $dish = $this->db->get('dishesh')->result_array();
        return $dish;
    }

    public function getVideo($id)
    {
        $this->db->where('r_id ', $id);
        $video = $this->db->get('restaurants')->result_array();
        return $video;
    }

    public function getDishesh2($id)
    {

        $this->db->where('k_id', $id);
        $dish = $this->db->get('dishesh')->result_array();
        return $dish;
    }

}