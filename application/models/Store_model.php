<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Store_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function create($formArray)
    {
        $this->db->insert('restaurants', $formArray);
    }

    public function getStores()
    {
        $result = $this->db->get('restaurants')->result_array();
        return $result;
    }

    public function getStore($id)
    {
        $this->db->where('r_id', $id);
        $store = $this->db->get('restaurants')->row_array();
        return $store;

    }

    public function update($id, $formArray)
    {
        $this->db->where('r_id', $id);
        $this->db->update('restaurants', $formArray);
    }

    public function delete($id)
    {
        $this->db->where('r_id', $id);
        $this->db->delete('restaurants');
    }

    public function countStore()
    {
        $query = $this->db->get('restaurants');
        return $query->num_rows();
    }

    public function getResInfo()
    {
        $this->db->select('*');
        $this->db->from('restaurants');
        $this->db->join('res_category', 'restaurants.c_id = res_category.c_id');

        return $this->db->get()->result_array();

        //  $result = $this->db->get()->result_array();
        // return $result;

        // User rating
        // $this->db->select('rating');
        // $this->db->from('post_rating');
        // $this->db->where('u_id', $userid);
        // $this->db->where('r_id', $id);
        // $userRatingquery = $this->db->get();

    }

    public function upload_video($data)
    {
        $this->db->insert('video', $data);
    }

    public function get_all_search_kuliner($search)
    {
        $this->db->select('*');
        $this->db->from('restaurants');
        $this->db->order_by('restaurants.r_id', 'DESC');
        $this->db->like('restaurants.name', $search, 'both');
        $info = $this->db->get();
        return $info->result();
    }

    public function getData($rowno, $rowperpage, $search = "")
    {
        $this->db->select('*');
        $this->db->from('posts');

        if ($search != "") {
            $this->db->like('name', $search);
            $this->db->or_like('address', $search);
        }

        $this->db->limit($rowperpage, $rowno);
        $query = $this->db->get();

        return $query->result_array();

    }

    public function getrecordCount($search = '')
    {

        $this->db->select('count(*) as allcount');
        $this->db->from('posts');

        if ($search != '') {
            $this->db->like('name', $search);
            $this->db->or_like('address', $search);
        }

    }

    public function search($keyword)
    {
        $this->db->select('*');
        $query = $this->db->get('restaurants');
        $this->db->order_by('restaurants.r_id', 'DESC');
        $this->db->like('name', $keyword);
        return $query->result();

    }

    public function cari($key)
    {

        $this->db->like('name', $key);
        $query = $this->db->get('posts');
        return $query->result();

    }

    public function get_all_product()
    {
        $this->db->select('*');
        $this->db->from('restaurants');

        $this->db->join('res_category', 'res_category.r_id=restaurants.c_id');
        $this->db->join('users', 'users.u_id=restaurants.c_id');
        $this->db->order_by('restaurants.r_id', 'DESC');
        $info = $this->db->get();
        return $info->result();
    }

    public function get_all_search_product($search)
    {
        $this->db->select('*');
        $this->db->from('restaurants');

        $this->db->like('restaurants.name', $search, 'both');
        $this->db->or_like('restaurants.address', $search, 'both');

        $info = $this->db->get('');
        return $info->result();
    }

    public function cari_data($keyword)
    {
        $this->db->select('*');
        $this->db->from('restaurants');
        $this->db->like('name', $keyword);
        $this->db->or_like('address', $keyword);
        $query = $this->db->get();
        return $query->result();
    }

}