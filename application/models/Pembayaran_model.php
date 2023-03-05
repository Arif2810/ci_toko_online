<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran_model extends CI_Model {

  public function get($id = null){
    $this->db->select('*');
    $this->db->from('pembayaran');
    if($id !== null){
      $this->db->where('id_pembelian', $id);
    }
    return $this->db->get();
  }

  public function add($post){
    $params = array(
      'id_pembelian' => $post['id_pembelian'],
      'nama'         => $post['nama'],
      'bank'         => $post['bank'],
      'jumlah'       => $post['jumlah'],
      'tanggal'      => date('Y-m-d'),
      'bukti'        => $post['bukti'],
    );

    $this->db->insert('pembayaran', $params);
  }

  public function update($post){
    $params = array(
      'resi_pengiriman' => $post['resi'],
      'status_pembelian' => $post['status']
    );
    $this->db->where('id_pembelian', $post['id_pembelian']);
    $this->db->update('pembelian', $params);
  }




}