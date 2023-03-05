<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model {

  public function get($id = null){
    $this->db->select('*');
    $this->db->from('produk');
    if($id !== null){
      $this->db->where('id_produk', $id);
    }
    return $this->db->get();
  }

  public function get_search($keyword){
    $this->db->select('*');
    $this->db->like('nama_produk', $keyword);
    $this->db->or_like('deskripsi_produk', $keyword);
    $this->db->from('produk');
    return $this->db->get();
  }

  public function get_product($id = null){
    $this->db->select('produk.*, kategori.nama_kategori as nama_kategori');
    $this->db->from('produk');
    $this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori');
    if($id != null){
      $this->db->where('id_produk', $id);
    }
    return $this->db->get();
  }

  public function insert($post){
    $params = array(
      'id_kategori' => $post['id_kategori'],
      'nama_produk' => $post['nama_produk'],
      'harga_produk' => $post['harga_produk'],
      'berat_produk' => $post['berat_produk'],
      'foto_produk' => $post['foto_produk'],
      'deskripsi_produk' => $post['deskripsi_produk'],
      'stok_produk' => $post['stok_produk']
    );
    $this->db->insert('produk', $params);
    return $this->db->insert_id();
  }

  public function add_foto($post){
    $params = array(
      'id_produk' => $post['id_produk'],
      'nama_produk_foto' => $post['produk_foto'],
    );

    $this->db->insert('produk_foto', $params);
  }

  public function get_foto($id = null){
    $this->db->select('*');
    $this->db->from('produk_foto');
    if($id != null){
      $this->db->where('id_produk_foto', $id);
    }
    return $this->db->get();
  }
  
  public function get_foto_produk($id = null){
    $this->db->select('*');
    $this->db->from('produk_foto');
    if($id != null){
      $this->db->where('id_produk', $id);
    }
    return $this->db->get();
  }

  public function get_foto_selected($post){
    $this->db->select('*');
    $this->db->from('produk_foto');
    $this->db->where('nama_produk_foto', $post['foto']);
    return $this->db->get();
  }

  public function get_category($id = null){
    $this->db->select('*');
    $this->db->from('kategori');
    if($id != null){
      $this->db->where('id_kategori', $id);
    }
    return $this->db->get();
  }

  public function update($post){
    $params = array(
      'id_kategori' => $post['id_kategori'], 
      'nama_produk' => $post['nama'], 
      'harga_produk' => $post['harga'], 
      'berat_produk' => $post['berat'], 
      'foto_produk' => $post['foto_produk'], 
      'deskripsi_produk' => $post['deskripsi'], 
      'stok_produk' => $post['stok']
    );

    $this->db->where('id_produk', $post['id']);
    $this->db->update('produk', $params);
  }

  public function update_foto($id, $namafoto){
    $params = array(
      'nama_produk_foto' => $namafoto
    );

    $this->db->where('id_produk_foto', $id);
    $this->db->update('produk_foto', $params);
  }



}