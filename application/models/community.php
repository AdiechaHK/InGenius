<?php

class Community extends CI_Model {

    var $id          = '';
    var $name       = '';
    var $icon     = '';
    var $small_desc     = '';
    var $created_at     = '';

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function get_last_ten_entries()
    {
        $query = $this->db->get('community', 10);
        return $query->result();
    }
    
    function get_list() 
    {
        $query = $this->db->get('community');
        return $query->result();
    }

    function get_list_count() 
    {
        $query = $this->db->get('community');
        return $query->num_rows();
    }

    function get_list_by_page($page) {
        $query = $this->db->get('community', 10, 10 * ($page - 1));
        return $query->result();
    }

    function get_entry($condition) {
        $query = $this->db->get_where('community', $condition);
        return $query->result();
    }

    function get_entry_by_id($id) {
        $query = $this->db->get_where('community', array('id' => $id));
        return $query->row();
    }

    function insert_entry($input)
    {
        $this->db->insert('community', $input);
        return $this->db->insert_id();
    }

    function update_entry($input, $condition)
    {
        $this->db->update('community', $input, $condition);
    }

    function get_detail_list($uid = NULL) {
        $q = "SELECT 
                `community`.`id` as id,
                `community`.`name` as name,
                `community`.`icon` as icon,
                `c_post`.`posts` as posts,
                `c_debate`.`debate` as debate,
                `c_like`.`c_likes` as c_likes
            FROM
                `community` as community
            LEFT JOIN 
                (SELECT
                    `c_id` as cid,
                    count(`c_id`) as posts
                FROM
                    `community_post`
                GROUP BY 
                    `c_id`
                ) as `c_post`
            ON
                `community`.`id` = `c_post`.`cid`
            LEFT JOIN 
                (SELECT
                    `c_id` as cid,
                    count(`c_id`) as debate
                FROM
                    `community_discussion`
                GROUP BY 
                    `c_id`
                ) as `c_debate`
            ON
                `community`.`id` = `c_debate`.`cid`
            LEFT JOIN 
                (SELECT
                    `community` as cid,
                    count(`community`) as c_likes
                FROM
                    `community_like`
                GROUP BY 
                    `community`
                ) as `c_like`
            ON
                `community`.`id` = `c_like`.`cid`";
        $query = $this->db->query($q);
        return $query->result();
    }

    function remove_entry($id) 
    {
        $comm = $this->get_entry_by_id($id);
        if($comm != NULL) {
            $arr = explode("/", $comm->icon);
            $indx = (integer) sizeof($arr);
            // echo $indx;
            $filename = './client_images/' . $arr[$indx - 1];
            // echo $filename;
            if(is_file($filename)) {
                // echo "file found";
                unlink($filename);
            }
        }
        $this->db->delete('community', array('id'=>$id));
    }

}
    