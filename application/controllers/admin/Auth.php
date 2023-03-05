<?php

class Auth extends CI_Controller{
  function __construct(){
    parent::__construct();
    $this->load->model('admin_model');
  }

  public function login(){
    if($this->session->userdata('id_admin')){
      echo "<script>window.location = '".site_url('admin')."';</script>";
    }
    $this->load->view('templates_admin/header');
    $this->load->view('admin/login');
    $this->load->view('templates_admin/footer');
  }

  public function login_action(){
    $post = $this->input->post(null, TRUE);
    $query = $this->admin_model->login($post);

    if($query->num_rows() > 0){
      $row = $query->row_array();
      $params = array(
        'id_admin' => $row['id_admin'],
        'username' => $row['username'],
        'nama_lengkap' => $row['nama_lengkap']
      );

      $this->session->set_userdata($params);
      echo "<script>alert('Login sukses');</script>";
      echo "<script>window.location='".site_url('admin')."'</script>";
    }
    else{
      echo "<script>alert('Login gagal!');</script>";
      echo "<script>window.location='".site_url('admin')."'</script>";
    }
  }

  public function logout(){
    $params = array(
      'id_admin',
      'username',
      'nama_lengkap'
    );

    $this->session->unset_userdata($params);
    echo "<script>alert('Anda telah logout!');</script>";
    echo "<script>window.location='".site_url('admin/login')."'</script>";
  }



}