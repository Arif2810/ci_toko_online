<?php

class Customer extends CI_Controller{
  function __construct(){
    parent::__construct();
    if($this->session->userdata('id_admin') == null){
      echo "<script>window.location='".site_url('admin/login')."'</script>";
    }
    $this->load->model('pelanggan_model');
  }

  public function index(){
    $data['customers'] = $this->pelanggan_model->get()->result();
    $this->load->view('templates_admin/header');
    $this->load->view('templates_admin/navbar');
    $this->load->view('admin/pelanggan/pelanggan_data', $data);
    $this->load->view('templates_admin/footer');
  }

  public function delete($id){
    $this->db->query("DELETE FROM pelanggan WHERE id_pelanggan = '$id'");

    if($this->db->affected_rows() > 0){
      echo "<script>alert('Data pelanggan berhasil dihapus');</script>";
      echo "<script>window.location = '".site_url('admin/pelanggan')."'</script>";
    }
    else{
      $error = $this->upload->display_errors();
      redirect('admin/pelanggan');
    }
  }


}