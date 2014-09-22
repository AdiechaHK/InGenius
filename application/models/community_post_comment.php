<?php

class Community_post_comment extends CI_Model {

    var $id          = '';
    var $post_id       = '';
    var $user     = '';
    var $comment     = '';
    var $comment_at     = '';

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function get_last_ten_entries()
    {
        $query = $this->db->get('community_post_comment', 10);
        return $query->result();
    }
    
    function get_list() 
    {
        $query = $this->db->get('community_post_comment');
        return $query->result();
    }

    function get_list_count() 
    {
        $query = $this->db->get('community_post_comment');
        return $query->num_rows();
    }

    function get_list_by_page($page) {
        $query = $this->db->get('community_post_comment', 10, 10 * ($page - 1));
        return $query->result();
    }

    function get_entry($condition) {
        $query = $this->db->get_where('community_post_comment', $condition);
        return $query->result();
    }

    function get_entry_by_post($pid) {
        $this->db->select("`community_post_comment`.`id` as id, `community_post_comment`.`comment` as comment, `users`.`username` as user");
        $this->db->from("`community_post_comment`");
        $this->db->join("`users`", "users.id = community_post_comment.user");
        $this->db->where("`community_post_comment`.`post_id`", $pid);
        $this->db->order_by("`community_post_comment`.`comment_at`", "desc");
        $query = $this->db->get();
        return $query->result();
    }

    function get_entry_by_id($id) {
        $query = $this->db->get_where('community_post_comment', array('id' => $id));
        return $query->row();
    }

    function insert_entry($input)
    {
        $this->db->insert('community_post_comment', $input);
        return $this->db->insert_id();
    }

    function update_entry($input, $condition)
    {
        $this->db->update('community_post_comment', $input, $condition);
    }

    function remove_entry($id) 
    {
        $this->db->delete('community_post_comment', array('id'=>$id));
    }

}
    