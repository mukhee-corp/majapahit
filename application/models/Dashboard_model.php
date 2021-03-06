<?php

 
class Dashboard_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function tampil_costumer()
    {
        $this->db->select('id_costumer, nama, email, COUNT(nama) as total');
        $this->db->group_by('nama'); 
        $this->db->order_by('total', 'desc'); 
        $hasil = $this->db->get('costumer');
        return $hasil;
    }
        /*
     * Get costumer by id_costumer
     */
    function get_costumer($id_costumer)
    {
        return $this->db->get_where('costumer',array('id_costumer'=>$id_costumer))->row_array();
    }
        
    /*
     * Get all costumer
     */
    function get_all_costumer()
    {
        $this->db->select('costumer.nama, costumer.email, hadiah.poin');
        $this->db->from('costumer');
        $this->db->join('hadiah', 'costumer.id_costumer = hadiah.id_hadiah');
        $query = $this->db->get()->result_array();

        //$this->db->order_by('id_costumer', 'desc');
        return $query;
    }
}
