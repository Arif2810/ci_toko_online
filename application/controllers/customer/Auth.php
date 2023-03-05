<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
  public function __construct(){
    parent::__construct();
    $this->load->model('pelanggan_model');
  }

  public function login(){
    $this->load->view('templates_customer/header');
    $this->load->view('customer/login');
  }
  
  public function register(){
    $this->load->view('templates_customer/header');
    $this->load->view('customer/register');
  }

  public function register_action(){
    $post = $this->input->post();
    // Cek apakah email sudah digunakan?
    $email = $this->pelanggan_model->cek_email($post['email'])->num_rows();
    if($email == 1){
      echo
      "<script>
        alert('Gagal daftar, email sudah digunakan!');
        window.location = '".site_url('daftar')."';
      </script>";
    }
    else{
      $this->pelanggan_model->add($post);
      if($this->db->affected_rows() > 0){
        echo "<script>alert('Pendaftaran sukses, silahkan login')</script>";
      }
      echo "<script>window.location = '".site_url('login')."';</script>";
    }
  }

  public function login_action(){
    $post = $this->input->post();
    $query = $this->pelanggan_model->login($post);
    if($query->num_rows() > 0){
      $row = $query->row();
      $params = array(
        'id_pelanggan' => $row->id_pelanggan,
        'nama_pelanggan' => $row->nama_pelanggan,
        'email_pelanggan' => $row->email_pelanggan,
        'telepon_pelanggan' => $row->telepon_pelanggan,
      );
      $this->session->set_userdata($params);
      // echo $this->session->userdata('id_pelanggan');
      // die;
      echo "<script>alert('Login sukses');</script>";

      // Jika ada keranjang
      if(isset($_SESSION['keranjang']) OR !empty($_SESSION['keranjang'])){
        echo "<script>window.location = '".site_url('checkout')."';</script>";
      }
      echo "<script>window.location = '".site_url('riwayat')."';</script>";
    }
    else{
      echo "<script>alert('Login gagal!');</script>";
      echo "<script>window.location = '".site_url('login')."';</script>";
    }
  }

  public function logout(){
    $params = array(
      'id_pelanggan',
      'nama_pelanggan'
    );

    $this->session->unset_userdata($params);
    redirect('/');
  }




}