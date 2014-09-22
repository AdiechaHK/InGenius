<?php

class Users extends CI_Model {

    var $id         = '';
    var $username   = '';
    var $password   = '';
    var $email      = '';
    var $profile_pic= '';
    var $dob        = '';
    var $gender     = '';
    var $location   = '';
    var $workplace  = '';
    var $bio        = '';
    var $is_admin   = '';

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function get_last_ten_entries()
    {
        $query = $this->db->get('users', 10);
        return $query->result();
    }
    
    function get_list() 
    {
        $query = $this->db->get('users');
        return $query->result();
    }

    function get_entry($condition) {
        $query = $this->db->get_where('users', $condition);
        return $query->result();
    }

    function insert_entry($input)
    {
        $this->db->insert('users', $input);
        return $this->db->insert_id();
    }

    function get_entry_by_id($id) {
        $query = $this->db->get_where('users', array('id' => $id));
        return $query->row();
    }

    function update_entry($input, $condition)
    {
        $this->db->update('users', $input, $condition);
    }

    function remove_entry($id) 
    {
        $this->db->delete('users', array('id'=>$id));
    }

    function login($arr) 
    {
        $umail = $arr['email'];
        $upass = md5($arr['password']);
        $res = array('status'=> "FAIL");
        $r = $this->get_entry(array('email'=> $umail));
        $n = sizeof($r);
        if($n == 1) {
            $user = $r[0];
            if($user->password == $upass) {
                $res['data'] = $user;
                $res['status'] = "SUCCESS";
            } else {
                $res['data'] = "Invalid password.";
            }
        } else if($n == 0) {
            $res['data'] = "user not found.";
        } else {
            $res['data'] = "unexpected multiple user found, please contact developer.";            
        }
        return $res; 
    }
}
    