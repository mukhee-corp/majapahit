<?php
 
class Hadiah_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get hadiah by id_hadiah
     */
    function get_hadiah($id_hadiah)
    {
        return $this->db->get_where('hadiah',array('id_hadiah'=>$id_hadiah))->row_array();
    }
        
    /*
     * Get all hadiah
     */
    function get_all_hadiah()
    {
        $this->db->order_by('id_hadiah', 'desc');
        return $this->db->get('hadiah')->result_array();
    }
        
    /*
     * function to add new hadiah
     */
    function add_hadiah($params)
    {
        $this->db->insert('hadiah',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update hadiah
     */
    function update_hadiah($id_hadiah,$params)
    {
        $this->db->where('id_hadiah',$id_hadiah);
        return $this->db->update('hadiah',$params);
    }
    
    /*
     * function to delete hadiah
     */
    function delete_hadiah($id_hadiah)
    {
        return $this->db->delete('hadiah',array('id_hadiah'=>$id_hadiah));
    }
}
