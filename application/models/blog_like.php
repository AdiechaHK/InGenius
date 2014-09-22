<?php

class Blog_like extends CI_Model {

    var $id          = '';
    var $blog_post       = '';
    var $user     = '';
    var $like     = '';

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function get_last_ten_entries()
    {
        $query = $this->db->get('blog_like', 10);
        return $query->result();
    }
    
    function get_list() 
    {
        $query = $this->db->get('blog_like');
        return $query->result();
    }

    function get_list_count() 
    {
        $query = $this->db->get('blog_like');
        return $query->num_rows();
    }

    function get_list_by_page($page) {
        $query = $this->db->get('blog_like', 10, 10 * ($page - 1));
        return $query->result();
    }

    function get_entry($condition) {
        $query = $this->db->get_where('blog_like', $condition);
        return $query->result();
    }

    function get_entry_by_id($id) {
        $query = $this->db->get_where('blog_like', array('id' => $id));
        return $query->row();
    }

    function insert_entry($input)
    {
        $this->db->insert('blog_like', $input);
        return $this->db->insert_id();
    }

    function update_entry($input, $condition)
    {
        $this->db->update('blog_like', $input, $condition);
    }

    function remove_entry($id) 
    {
        $this->db->delete('blog_like', array('id'=>$id));
    }

    function count_for_post($id)
    {
        $this->db->from('blog_like');
        $this->db->where('blog_post', $id);
        return $this->db->count_all_results();
    }

}
    