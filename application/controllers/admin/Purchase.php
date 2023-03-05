<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Purchase extends CI_Controller{
  function __construct(){
    parent::__construct();
    if($this->session->userdata('id_admin') == null){
      echo "<script>window.location='".site_url('admin/login')."'</script>";
    }
    $this->load->model(['pembelian_model', 'pembayaran_model']);
  }

  public function index(){
    $data['pembelian'] = $this->pembelian_model->get_pembelian()->result();
    $this->load->view('templates_admin/header');
    $this->load->view('templates_admin/navbar');
    $this->load->view('admin/pembelian/pembelian_data', $data);
    $this->load->view('templates_admin/footer');
  }

  public function show($id){
    $data['detail'] = $this->pembelian_model->get_pembelian($id)->row_array();
    $this->load->view('templates_admin/header');
    $this->load->view('templates_admin/navbar');
    $this->load->view('admin/pembelian/pembelian_detail', $data);
    $this->load->view('templates_admin/footer');
  }

  public function pembayaran($id){
    $data['pembayaran'] = $this->pembayaran_model->get($id)->row_array();
    $this->load->view('templates_admin/header');
    $this->load->view('templates_admin/navbar');
    $this->load->view('admin/pembelian/pembayaran', $data);
    $this->load->view('templates_admin/footer');
  }

  public function pembayaran_action(){
    $post = $this->input->post(null, TRUE);
    $this->pembayaran_model->update($post);

    if($this->db->affected_rows() > 0){
      echo "<script>alert('Data pembelian terupdate');</script>";
      echo "<script>window.location = '".site_url('admin/pembelian')."'</script>";
    }
    else{
      $error = $this->upload->display_errors();
      redirect('admin/pembayaran/'.$post['id_pembelian']);
    }
  }


}