<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_model extends CI_Model{

  public function get($id = null){
    $this->db->select('*');
    $this->db->from('kategori');
    if($id != null){
      $this->db->where('id_kategori', $id);
    }
    return $this->db->get();
  }

  public function add($post){
    $params = array(
      'nama_kategori' => $post['nama_kategori']
    );
    $this->db->insert('kategori', $params);
  }

  public function update($post){
    $this->db->set('nama_kategori', $post['nama_kategori']);
    $this->db->where('id_kategori', $post['id_kategori']);
    $this->db->update('kategori');
  }



}