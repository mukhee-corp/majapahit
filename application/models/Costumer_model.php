<?php
 
class Costumer_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
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
        $this->db->order_by('id_costumer', 'desc');
        return $this->db->get('costumer')->result_array();
    }
        
    /*
     * function to add new costumer
     */
    function add_costumer($params)
    {
        $this->db->insert('costumer',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update costumer
     */
    function update_costumer($id_costumer,$params)
    {
        $this->db->where('id_costumer',$id_costumer);
        return $this->db->update('costumer',$params);
    }
    
    /*
     * function to delete costumer
     */
    function delete_costumer($id_costumer)
    {
        return $this->db->delete('costumer',array('id_costumer'=>$id_costumer));
    }
}
