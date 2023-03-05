<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan_model extends CI_Model {

  public function get($id = null){
    $this->db->select('*');
    if($id != null){
      $this->db->where('id_pelanggan', $id);
    }
    return $this->db->get('pelanggan');
  }

  public function cek_email($email){
    $this->db->select('*');
    $this->db->where('email_pelanggan', $email);
    return $this->db->get('pelanggan');
  }

  public function add($post){
    $params = array(
      'email_pelanggan' => $post['email'],
      'password_pelanggan' => $post['password'],
      'nama_pelanggan' => $post['nama'],
      'telepon_pelanggan' => $post['telepon'],
      'alamat_pelanggan' => $post['alamat']
    );
    $this->db->insert('pelanggan', $params);
  }

  public function login($post){
    $email = $post['email'];
    $password = $post['password'];
    $this->db->select('*');
    $this->db->where('email_pelanggan', $email);
    $this->db->where('password_pelanggan', $password);
    $this->db->from('pelanggan');
    return $this->db->get();
  }






}