<?php

class Media_content extends CI_Model {

    var $id   = '';
    var $cat  = '';
    var $name = '';
    var $link = '';
    var $type = '';

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function get_last_ten_entries()
    {
        $query = $this->db->get('media_content', 10);
        return $query->result();
    }
    
    function get_list() 
    {
        $query = $this->db->get('media_content');
        return $query->result();
    }

    function get_entry($condition) {
        $query = $this->db->get_where('media_content', $condition);
        return $query->result();
    }

    function get_by_id($id) {
        $query = $this->db->get_where('media_content', array('id'=> $id));
        return $query->row();
    }

    function insert_entry($input)
    {
        $this->db->insert('media_content', $input);
        return $this->db->insert_id();
    }

    function update_entry($input, $condition)
    {
        $this->db->update('media_content', $input, $condition);
    }

    function get_list_count() {
        $query = $this->db->get('media_content');
        return $query->num_rows();
    }

    function get_list_by_cat_and_page($cat, $type, $page) {
        $query = $this->db->get_where('media_content', array('cat'=> $cat, 'type'=> $type), 10, 10 * ($page - 1));
        return $query->result();
    }

    function get_list_by_cat($cat, $type) {
        $query = $this->db->get_where('media_content', array('cat'=> $cat, 'type'=> $type));
        return $query->result();
    }

    function remove_entry($id) 
    {
        $media = $this->get_by_id($id);
        if($media != NULL) {
            $arr = explode("/", $media->link);
            $indx = (integer) sizeof($arr);
            // echo $indx;
            $filename = './client_images/' . $arr[$indx - 1];
            // echo $filename;
            if(is_file($filename)) {
                // echo "file found";
                unlink($filename);
            }
            $this->db->delete('media_content', array('id'=>$id));
        }
    }

}
    