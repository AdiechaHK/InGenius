<?php

class Media_cat extends CI_Model {

    var $id          = '';
    var $name        = '';
    var $description = '';

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function get_last_ten_entries()
    {
        $query = $this->db->get('media_cat', 10);
        return $query->result();
    }
    
    function get_list() 
    {
        $query = $this->db->get('media_cat');
        return $query->result();
    }

    function get_list_count() 
    {
        $query = $this->db->get('media_cat');
        return $query->num_rows();
    }

    function get_list_by_page($page) {
        $query = $this->db->get('media_cat', 10, 10 * ($page - 1));
        return $query->result();
    }

    function get_entry($condition) {
        $query = $this->db->get_where('media_cat', $condition);
        return $query->result();
    }

    function insert_entry($input)
    {
        $this->db->insert('media_cat', $input);
        return $this->db->insert_id();
    }

    function update_entry($input, $condition)
    {
        $this->db->update('media_cat', $input, $condition);
    }

    function remove_entry($id) 
    {
        $this->db->delete('media_cat', array('id'=>$id));
    }

}
    