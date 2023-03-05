<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_model extends CI_Model {

  public function get($post){
    $this->db->select('*, pelanggan.nama_pelanggan as nama_pelanggan');
    $this->db->from('pembelian');
    $this->db->join('pelanggan', 'pelanggan.id_pelanggan = pembelian.id_pelanggan', 'left');
    $this->db->where('tanggal_pembelian >=', $post['tgl_awal']);
    $this->db->where('tanggal_pembelian <=', $post['tgl_akhir']);
    return $this->db->get();
  }





}