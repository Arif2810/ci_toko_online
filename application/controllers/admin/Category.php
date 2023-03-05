<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller{
  function __construct(){
    parent::__construct();
    if($this->session->userdata('id_admin') == null){
      echo "<script>window.location='".site_url('admin/login')."'</script>";
    }
    $this->load->model('category_model');
  }

  public function index(){
    $data['categories'] = $this->category_model->get()->result();
    $this->load->view('templates_admin/header');
    $this->load->view('templates_admin/navbar');
    $this->load->view('admin/kategori/kategori_data', $data);
    $this->load->view('templates_admin/footer');
  }

  public function add(){
    $this->load->view('templates_admin/header');
    $this->load->view('templates_admin/navbar');
    $this->load->view('admin/kategori/kategori_tambah');
    $this->load->view('templates_admin/footer');
  }

  public function add_action(){
    $post = $this->input->post(null, TRUE);
    $this->category_model->add($post);

    if($this->db->affected_rows() > 0){
      echo "<script>alert('Kategori produk berhasil ditambahkan');</script>";
      echo "<script>window.location = '".site_url('admin/kategori')."'</script>";
    }
    else{
      $error = $this->upload->display_errors();
      redirect('admin/kategori/tambah');
    }
  }

  public function edit($id){
    $data['category'] = $this->category_model->get($id)->row_array();
    $this->load->view('templates_admin/header');
    $this->load->view('templates_admin/navbar');
    $this->load->view('admin/kategori/kategori_edit', $data);
    $this->load->view('templates_admin/footer');
  }

  public function edit_action(){
    $post = $this->input->post(null, TRUE);
    $data['category'] = $this->category_model->update($post);

    if($this->db->affected_rows() > 0){
      echo "<script>alert('Kategori produk berhasil diubah');</script>";
      echo "<script>window.location = '".site_url('admin/kategori')."'</script>";
    }
    else{
      $error = $this->upload->display_errors();
      redirect('admin/kategori/ubah/'.$post['id_kategori']);
    }
  }

  public function delete($id){
    $this->db->query("DELETE FROM kategori WHERE id_kategori = '$id'");

    if($this->db->affected_rows() > 0){
      echo "<script>alert('Kategori berhasil dihapus');</script>";
      echo "<script>window.location = '".site_url('admin/kategori')."'</script>";
    }
    else{
      $error = $this->upload->display_errors();
      redirect('admin/kategori/ubah/'.$post['id_kategori']);
    }
  }





}

