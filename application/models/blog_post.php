<?php

class Blog_post extends CI_Model {

    var $id          = '';
    var $title       = '';
    var $details     = '';
    var $post_at     = '';
    var $post_by     = '';
    var $active     = '';

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function get_last_ten_entries()
    {
        $query = $this->db->get('blog_post', 10);
        return $query->result();
    }
    
    function get_list() 
    {
        $query = $this->db->get('blog_post');
        return $query->result();
    }

    function get_list_count() 
    {
        $query = $this->db->get('blog_post');
        return $query->num_rows();
    }

    function get_list_by_page($page) {
        $query = $this->db->get('blog_post', 10, 10 * ($page - 1));
        return $query->result();
    }

    function get_entry($condition) {
        $query = $this->db->get_where('blog_post', $condition);
        return $query->result();
    }

    function get_entry_by_id($id) {
        $query = $this->db->get_where('blog_post', array('id' => $id));
        return $query->row();
    }

    function insert_entry($input)
    {
        $this->db->insert('blog_post', $input);
        return $this->db->insert_id();
    }

    function update_entry($input, $condition)
    {
        $this->db->update('blog_post', $input, $condition);
    }

    function remove_entry($id) 
    {
        $this->db->delete('blog_post', array('id'=>$id));
    }

}
    