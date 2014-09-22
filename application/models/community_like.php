<?php

class Community_like extends CI_Model {

    var $id          = '';
    var $community       = '';
    var $user     = '';

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function get_last_ten_entries()
    {
        $query = $this->db->get('community_like', 10);
        return $query->result();
    }
    
    function get_list() 
    {
        $query = $this->db->get('community_like');
        return $query->result();
    }

    function get_list_count() 
    {
        $query = $this->db->get('community_like');
        return $query->num_rows();
    }

    function get_list_by_page($page) {
        $query = $this->db->get('community_like', 10, 10 * ($page - 1));
        return $query->result();
    }

    function get_entry($condition) {
        $query = $this->db->get_where('community_like', $condition);
        return $query->result();
    }

    function get_entry_by_id($id) {
        $query = $this->db->get_where('community_like', array('id' => $id));
        return $query->row();
    }

    function get_like($c_id, $u_id) {
        $query = $this->db->get_where('community_like', array('community' => $c_id, 'user' => $u_id));
        return $query->row();
    }

    function insert_entry($input)
    {
        $this->db->insert('community_like', $input);
        return $this->db->insert_id();
    }

    function update_entry($input, $condition)
    {
        $this->db->update('community_like', $input, $condition);
    }

    function remove_entry($id) 
    {
        $this->db->delete('community_like', array('id'=>$id));
    }


}
    