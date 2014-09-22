<?php
class Education extends CI_Model {

    var $id             = '';
    var $uid            = '';
    var $particulars    = '';
    var $s_year         = '';
    var $e_year         = '';

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function get_last_ten_entries()
    {
        $query = $this->db->get('education', 10);
        return $query->result();
    }
    
    function get_list() 
    {
        $query = $this->db->get('education');
        return $query->result();
    }

    function insert_entry($input)
    {
        $this->db->insert('education', $input);
        return $this->db->insert_id();
    }

    function update_entry($input, $condition)
    {
        $this->db->update('education', $input, $condition);
    }

    function remove_entry($id) 
    {
        $this->db->delete('education', array('id'=>$id));
    }
}
    