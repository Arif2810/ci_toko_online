<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller{
  function __construct(){
    parent::__construct();
    if($this->session->userdata('id_admin') == null){
      echo "<script>window.location='".site_url('admin/login')."'</script>";
    }
    $this->load->model('product_model');
  }

  public function index(){
    $data['products'] = $this->product_model->get_product()->result();
    $this->load->view('templates_admin/header');
    $this->load->view('templates_admin/navbar');
    $this->load->view('admin/produk/produk_data', $data);
    $this->load->view('templates_admin/footer');
  }

  public function add(){
    $data['categories'] = $this->product_model->get_category()->result();
    // echo "<pre>";
    // print_r($data['categories']);
    // die;
    $this->load->view('templates_admin/header');
    $this->load->view('templates_admin/navbar');
    $this->load->view('admin/produk/produk_tambah', $data);
    $this->load->view('templates_admin/footer');
  }

  public function add_action(){
    $post = $this->input->post(null, TRUE);

    $namanamafoto = $_FILES["foto_produk"]["name"];
    $lokasilokasifoto = $_FILES["foto_produk"]["tmp_name"];
    move_uploaded_file($lokasilokasifoto[0], "./uploads/produk/".$namanamafoto[0]);
    $post['foto_produk'] = $namanamafoto[0];
    // menyimpan ke database
    $id_produk = $this->product_model->insert($post);

    // Membuat perulangan untuk memasukkan nama-nama foto ke tabel
    foreach($namanamafoto as $key => $tiap_nama){
      $tiap_lokasi = $lokasilokasifoto[$key];

		  move_uploaded_file($tiap_lokasi, "./uploads/produk/".$tiap_nama);

      // Memasukkan nama nama foto ke tabel produk_foto sesuai id_produk barusan
      $result = $this->db->query("INSERT INTO produk_foto(id_produk, nama_produk_foto) VALUES('$id_produk', '$tiap_nama')");
    }

    if($result){
      echo "<script>alert('Data berhasil ditambahkan');</script>";
      echo "<script>window.location = '".site_url('admin/barang')."'</script>";
    }

  }

  public function show($id){
    $data['product'] = $this->product_model->get_product($id)->row_array();
    $this->load->view('templates_admin/header');
    $this->load->view('templates_admin/navbar');
    $this->load->view('admin/produk/produk_detail', $data);
    $this->load->view('templates_admin/footer');
  }

  public function tambah_foto(){
    $post = $this->input->post(null, TRUE);
    $id_produk = $post['id_produk'];

    // upload produk foto
    $config['upload_path']   = './uploads/produk/';
		$config['allowed_types'] = 'gif|jpg|jpeg|png';
		$config['max_size']      = 2048;
		$config['file_name']     = 'produk'.date('ymd'). '-'. substr(md5(rand()),0,10);
		$this->load->library('upload', $config);

    if($_FILES['produk_foto']['name'] != null){
      if($this->upload->do_upload('produk_foto')){
        $post['produk_foto'] = $this->upload->data('file_name');
        $this->product_model->add_foto($post);

        if($this->db->affected_rows() > 0){
          echo "<script>alert('Foto produk berhasil ditambahkan');</script>";
        }
        echo "<script>window.location = '".site_url('admin/barang/detail/'.$id_produk)."'</script>";
      }
      else{
        $error = $this->upload->display_errors();
        redirect('admin/barang/detail/'.$id_produk);
      }
    }
  }

  public function hapus_foto($id_foto){
    // Mengambil data berdasarkan id
    $detailfoto = $this->product_model->get_foto($id_foto)->row_array();
    $id_produk = $detailfoto['id_produk'];
    $namafilefoto = $detailfoto['nama_produk_foto'];
    // echo "<pre>";
    // print_r($namafilefoto);
    // die;

    // Hapus file foto
    unlink("./uploads/produk/".$namafilefoto);

    // Hapus data di database
    $this->db->delete('produk_foto', array('id_produk_foto' => $id_foto));

    echo "<script>alert('Foto berhasil dihapus');</script>";
    echo "<script>window.location = '".site_url('admin/barang/detail/'.$id_produk)."'</script>";
  }

  public function edit($id){
    $data['product'] = $this->product_model->get_product($id)->row_array();
    $data['categories'] = $this->product_model->get_category()->result();
    $this->load->view('templates_admin/header');
    $this->load->view('templates_admin/navbar');
    $this->load->view('admin/produk/produk_edit', $data);
    $this->load->view('templates_admin/footer');
  }

  public function edit_action(){
    $post = $this->input->post(null, TRUE);
    // echo $post['foto'];
    // die;

    $namafoto = $_FILES["foto_produk"]["name"];
    $lokasifoto = $_FILES["foto_produk"]["tmp_name"];

    // Jika foto diubah
    if(!empty($lokasifoto)){
      move_uploaded_file($lokasifoto, "./uploads/produk/".$namafoto);
      
      $post['foto_produk'] = $namafoto;
      $get_foto = $this->product_model->get_foto_selected($post)->row_array();
      $id_foto_produk = $get_foto['id_produk_foto'];
      // Update database
      $this->product_model->update($post);
      $this->product_model->update_foto($id_foto_produk, $namafoto);

      // Menghapus foto lama
      unlink("./uploads/produk/".$post['foto']);
    }
    else{
      // Update database
      $post['foto_produk'] = $post['foto'];
      $this->product_model->update($post);
    }

    echo "<script>alert('Data berhasil diubah');</script>";
    echo "<script>window.location = '".site_url('admin/barang')."'</script>";
  }

  public function delete($id){
    $product_foto = $this->product_model->get_foto_produk($id)->result();

    // Menghapus gambar
    foreach($product_foto as $foto){
      unlink("./uploads/produk/".$foto->nama_produk_foto);
    }

    // Menghapus data pada tabel
    $this->db->delete('produk', ['id_produk' => $id]);
    $this->db->delete('produk_foto', ['id_produk' => $id]);

    if($this->db->affected_rows() > 0){
      echo "<script>alert('Produk berhasil dihapus');</script>";
      echo "<script>window.location = '".site_url('admin/barang')."'</script>";
    }
  }



}