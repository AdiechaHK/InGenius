<?php

class Blog_comment extends CI_Model {

    var $id          = '';
    var $blog_post       = '';
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
        $query = $this->db->get('blog_comment', 10);
        return $query->result();
    }
    
    function get_list() 
    {
        $query = $this->db->get('blog_comment');
        return $query->result();
    }

    function get_list_count() 
    {
        $query = $this->db->get('blog_comment');
        return $query->num_rows();
    }

    function get_list_by_page($page) {
        $query = $this->db->get('blog_comment', 10, 10 * ($page - 1));
        return $query->result();
    }

    function get_entry($condition) {
        $query = $this->db->get_where('blog_comment', $condition);
        return $query->result();
    }

    function get_entry_by_id($id) {
        $query = $this->db->get_where('blog_comment', array('id' => $id));
        return $query->row();
    }

    function insert_entry($input)
    {
        $this->db->insert('blog_comment', $input);
        return $this->db->insert_id();
    }

    function update_entry($input, $condition)
    {
        $this->db->update('blog_comment', $input, $condition);
    }

    function remove_entry($id) 
    {
        $this->db->delete('blog_comment', array('id'=>$id));
    }

    function get_blog_post_comment($id) {
        $this->db->select("`blog_comment`.`id` as id, `blog_comment`.`comment` as comment, `users`.`username` as user, `users`.`id` as user_id, `blog_comment`.`comment_at` as comment_at");
        $this->db->from("`blog_comment`");
        $this->db->join("`users`", "users.id = blog_comment.user");
        $this->db->where("`blog_comment`.`blog_post`", $id);
        $this->db->order_by("`blog_comment`.`comment_at`", "desc");
        // $this->db->limit(10, $page * 10);
        $query = $this->db->get();
        return $query->result();
    }

}
    