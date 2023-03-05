<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

  public function index(){
    if($this->session->userdata('id_admin') == null){
      echo "<script>window.location = '".site_url('admin/login')."';</script>";
    }

    $this->load->view('templates_admin/header');
    $this->load->view('templates_admin/navbar');
    $this->load->view('admin/dashboard');
    $this->load->view('templates_admin/footer');
  }




}