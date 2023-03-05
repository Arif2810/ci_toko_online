<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {
  function __construct(){
    parent::__construct();
    $this->load->model('product_model');
  }

  public function show($id){
    $data['product'] = $this->product_model->get($id)->row_array();
    $this->load->view('templates_customer/header');
    $this->load->view('customer/detail', $data);
  }

  public function search(){
    $keyword = $this->input->get('keyword');
    $data['products'] = $this->product_model->get_search($keyword)->result();
    $data['keyword'] = $keyword;
    $this->load->view('templates_customer/header');
    $this->load->view('customer/pencarian', $data);
  }



}