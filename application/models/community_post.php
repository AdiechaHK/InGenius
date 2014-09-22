<?php

class Community_post extends CI_Model {

    var $id          = '';
    var $c_id       = '';
    var $title     = '';
    var $description     = '';
    var $user     = '';
    var $post_at     = '';
    var $active     = '';
    var $privacy    = '';

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function get_last_ten_entries()
    {
        $query = $this->db->get('community_post', 10);
        return $query->result();
    }
    
    function get_list() 
    {
        $query = $this->db->get('community_post');
        return $query->result();
    }

    function get_list_count() 
    {
        $query = $this->db->get('community_post');
        return $query->num_rows();
    }

    function get_list_by_page($page) {
        $query = $this->db->get('community_post', 10, 10 * ($page - 1));
        return $query->result();
    }

    function get_entry_by_cid($cid, $like = false) {
        $this->db->select("`community_post`.`id` as id, `community_post`.`c_id` as c_id, `users`.`username` as user, `users`.`location` as location, `users`.`id` as user_id, `users`.`profile_pic` as profile_pic, `community_post`.`title` as title, `community_post`.`description` as description, `community_post`.`post_at` as post_at, `community_post`.`active` as active");
        $this->db->from("`community_post`");
        $this->db->join("`users`", "users.id = community_post.user");
        $condition["`community_post`.`c_id`"] = $cid;
        if(!$like) {
            $condition["`community_post`.`privacy`"] = 0;
        }
        $this->db->where($condition);
        $this->db->order_by("`community_post`.`post_at`", "desc");

        $query = $this->db->get();
        return $query->result();
    }

    function get_entry($condition) {
        $query = $this->db->get_where('community_post', $condition);
        return $query->result();
    }

    function get_entry_by_id($id) {
        $query = $this->db->get_where('community_post', array('id' => $id));
        return $query->row();
    }

    function insert_entry($input)
    {
        $this->db->insert('community_post', $input);
        return $this->db->insert_id();
    }

    function update_entry($input, $condition)
    {
        $this->db->update('community_post', $input, $condition);
    }

    function remove_entry($id) 
    {
        $this->db->delete('community_post', array('id'=>$id));
    }

}
    