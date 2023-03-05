<?php

class Admin_model extends CI_Model{

  public function login($post){
    $username = $post['user'];
    $password = $post['pass'];
    $this->db->select('*');
    $this->db->where('username', $username);
    $this->db->where('password', $password);
    return $this->db->get('admin');
  }



}