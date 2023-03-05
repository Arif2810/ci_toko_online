<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembelian_model extends CI_Model {

  public function get($id = null){
    $this->db->select('*');
    $this->db->from('pembelian');
    if($id !== null){
      $this->db->where('id_pelanggan', $id);
    }
    return $this->db->get();
  }

  public function get_pembelian($id_pembelian = null){
    $this->db->select('pembelian.*, pelanggan.nama_pelanggan as nama_pelanggan, pelanggan.telepon_pelanggan as telepon_pelanggan, pelanggan.email_pelanggan as email_pelanggan');
    $this->db->from('pembelian');
    $this->db->join('pelanggan', 'pelanggan.id_pelanggan = pembelian.id_pelanggan');
    if($id_pembelian != null){
      $this->db->where('id_pembelian', $id_pembelian);
    }
    return $this->db->get();
  }

  public function get_pelanggan($id_pembelian){
    $this->db->select('*');
    $this->db->where('id_pembelian', $id_pembelian);
    return $this->db->get('pembelian');
  }

  public function update($id_pembelian){
    $params = array(
      'status_pembelian' => 'Sudah kirim pembayaran'
    );
    $this->db->where('id_pembelian', $id_pembelian);
    $this->db->update('pembelian', $params);

  }

  public function insert($post){
    $params = array(
      'id_pelanggan' => $this->session->userdata('id_pelanggan'),
      'tanggal_pembelian' => $post['tanggal_pembelian'],
      'total_pembelian' => $post['total_pembelian'],
      'alamat_pengiriman' => $post['alamat_pengiriman'],
      'resi_pengiriman' => '',
      'totalberat' => $post['total_berat'],
      'provinsi' => $post['provinsi'],
      'distrik' => $post['distrik'],
      'tipe' => $post['tipe'],
      'kodepos' => $post['kodepos'],
      'ekspedisi' => $post['ekspedisi'],
      'paket' => $post['paket'],
      'ongkir' => $post['ongkir'],
      'estimasi' => $post['estimasi'],
    );

    $this->db->insert('pembelian', $params);
    return $this->db->insert_id();
  }


}