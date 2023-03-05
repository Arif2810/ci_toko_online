<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
  function __construct(){
    parent::__construct();
    $this->load->model('product_model');
  }

  public function index(){
    $data['products'] = $this->product_model->get()->result();
    $this->load->view('templates_customer/header');
    $this->load->view('customer/dashboard', $data);
  }




}