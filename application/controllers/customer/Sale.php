<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sale extends CI_Controller {
  function __construct(){
    parent::__construct();
    $this->load->model(['pembelian_model', 'pembayaran_model', 'product_model']);
  }

  public function buy($id_produk){
    // echo $id_produk;
    // die;
    if(isset($_SESSION['keranjang'][$id_produk])){
      $_SESSION['keranjang'][$id_produk] += 1;
    }
    else{
      $_SESSION['keranjang'][$id_produk] = 1;
    }

    // echo "<pre>";
    // print_r($_SESSION);
    // echo "</pre>";
    // die;
    echo "<script>alert('Produk telah masuk ke keranjang belanja');</script>";
    echo "<script>window.location = '".site_url('keranjang')."';</script>";
  }

  public function cart(){
    // echo "<pre>";
    // var_dump($_SESSION['keranjang']);
    // die;
    if(empty($_SESSION['keranjang']) OR !isset($_SESSION['keranjang'])){
      echo "<script>alert('Keranjang belanja kosong, silahkan pilih produk!');</script>";
      echo "<script>window.location = '".site_url()."';</script>";
    }
    $this->load->view('templates_customer/header');
    $this->load->view('customer/keranjang');
  }

  public function hapus_cart($id_produk){
    unset($_SESSION['keranjang'][$id_produk]);
    echo "<script>alert('Produk dihapus dari keranjang!');</script>";
    echo "<script>window.location = '".site_url('keranjang')."';</script>";
  }

  public function checkout(){
    if($this->session->userdata('id_pelanggan') == null){
      echo "<script>alert('Silahkan login!');</script>";
      echo "<script>window.location = '".site_url('login')."';</script>";
    }
    if(!isset($_SESSION['keranjang'])){
      echo "<script>alert('Keranjang kosong!');</script>";
      echo "<script>window.location = '".site_url()."';</script>";
    }
    // $data['province'] = $this->dataprovinsi();
    $this->load->view('templates_customer/header');
    $this->load->view('customer/checkout');
  }

  public function checkout_proses(){
    $post = $this->input->post(null, TRUE);
    $post['tanggal_pembelian'] = date('Y-m-d');
    $post['total_pembelian'] = $post['totalbelanja'] + $post['ongkir'];

    // echo "<pre>";
    // var_dump($post);
    // die;
    // Menyimpan data ke tabel pembelian
    $id_pembelian = $this->pembelian_model->insert($post);

    foreach($_SESSION["keranjang"] as $id_produk => $jumlah){

      // Mendapatkan data produk berdasarkan id_produk
      $produk = $this->product_model->get($id_produk)->row_array();
      
      $nama = $produk['nama_produk'];
      $harga = $produk['harga_produk'];
      $berat = $produk['berat_produk'];
      $subberat = $produk['berat_produk'] * $jumlah;
      $subharga = $produk['harga_produk'] * $jumlah;

      // Insert ke tabel pembelian_produk
      $sql = "INSERT INTO pembelian_produk(id_pembelian, id_produk, nama, harga, berat, subberat, subharga, jumlah) VALUES('$id_pembelian', '$id_produk', '$nama', '$harga', '$berat', '$subberat', '$subharga', '$jumlah')";
      $this->db->query($sql);

      // Update stok
      $this->db->query("UPDATE produk SET stok_produk=stok_produk - $jumlah WHERE id_produk='$id_produk'");

      // Menghapus sessio keranjang
      unset($_SESSION['keranjang']);

      echo "<script>alert('Pembelian sukses');</script>";
      echo "<script>window.location = '".site_url('nota/'.$id_pembelian)."';</script>";
    }


  }

  public function history(){
    $id_pelanggan = $this->session->userdata('id_pelanggan');
    $data['riwayat'] = $this->pembelian_model->get($id_pelanggan)->result();
    // echo "<pre>";
    // var_dump($data['riwayat']);
    // die;
    $this->load->view('templates_customer/header');
    $this->load->view('customer/riwayat', $data);
  }

  public function nota($id_pembelian){
    $data['nota'] = $this->pembelian_model->get_pembelian($id_pembelian)->row_array();
    $id_pelanggan = $data['nota']['id_pelanggan'];
    if($this->session->userdata('id_pelanggan') != $id_pelanggan){
      echo "<script>alert('Akses ditolak!');</script>";
      echo "<script>window.location = '".site_url('riwayat')."'</script>";
    }
    // echo "<pre>";
    // var_dump($id_pelanggan);
    // die;
    $this->load->view('templates_customer/header');
    $this->load->view('customer/nota', $data);
  }

  public function pembayaran($id_pembelian){
    if(!$this->session->userdata('id_pelanggan')){
      echo "<script>alert('Silahkan login!');</script>";
      echo "<script>window.location = '".site_url('login')."'</script>";
      exit();
    }
    $pembelian = $this->pembelian_model->get_pelanggan($id_pembelian);
    if($pembelian->num_rows() == 0){
      echo "<script>alert('Data tidak ditemukan!');</script>";
      echo "<script>window.location = '".site_url('riwayat')."'</script>";
    }
    $data['get_pembelian'] = $pembelian->row_array();
    $id_pelanggan = $data['get_pembelian']['id_pelanggan'];
    if($this->session->userdata('id_pelanggan') != $id_pelanggan){
      echo "<script>alert('Akses ditolak!');</script>";
      echo "<script>window.location = '".site_url('riwayat')."'</script>";
    }
    $this->load->view('templates_customer/header');
    $this->load->view('customer/pembayaran', $data);
  }

  public function pembayaran_action(){
    $post = $this->input->post(null, TRUE);
    $id_pembelian = $post['id_pembelian'];
    // echo $id_pembelian;
    // die;
    // upload bukti foto
    $config['upload_path']   = './uploads/bukti/';
		$config['allowed_types'] = 'gif|jpg|jpeg|png';
		$config['max_size']      = 2048;
		$config['file_name']     = 'bukti'.date('ymd'). '-'. substr(md5(rand()),0,10);
		$this->load->library('upload', $config);

    if($_FILES['bukti']['name'] != null){
      if($this->upload->do_upload('bukti')){
        $post['bukti'] = $this->upload->data('file_name');
        $this->pembayaran_model->add($post);
        $this->pembelian_model->update($id_pembelian);

        if($this->db->affected_rows() > 0){
          echo "<script>alert('Terimakasih sudah melakukan pembayaran');</script>";
        }
        echo "<script>window.location = '".site_url('riwayat')."'</script>";
      }
      else{
        $error = $this->upload->display_errors();
        redirect('pembayaran/'.$id_pembelian);
      }
    }
  }
  
  public function lihat_pembayaran($id_pembelian){
    $data['pembelian'] = $this->pembelian_model->get_pembelian($id_pembelian)->row_array();
    $id_pelanggan = $data['pembelian']['id_pelanggan'];
    if($this->session->userdata('id_pelanggan') != $id_pelanggan){
      echo "<script>alert('Akses ditolak!');</script>";
      echo "<script>window.location = '".site_url('riwayat')."'</script>";
    }
    $data['pembayaran'] = $this->pembayaran_model->get($id_pembelian)->row_array();
    $this->load->view('templates_customer/header');
    $this->load->view('customer/lihat_pembayaran', $data);
  }



}