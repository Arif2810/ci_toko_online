<?php

class Report extends CI_Controller{
  function __construct(){
    parent::__construct();
    if($this->session->userdata('id_admin') == null){
      echo "<script>window.location='".site_url('admin/login')."'</script>";
    }
    $this->load->model('laporan_model');
  }

  public function index(){
    $post = $this->input->post(null, TRUE);
    $tgl_awal = $this->input->post('tgl_awal');
    $tgl_akhir = $this->input->post('tgl_akhir');

    if(empty($tgl_awal) || empty($tgl_akhir)){
      $data['reports'] = [];
      $data['tgl_awal'] = '';
      $data['tgl_akhir'] = '';
    }
    else{
      $data['tgl_awal'] = $tgl_awal;
      $data['tgl_akhir'] = $tgl_akhir;
      $data['reports'] = $this->laporan_model->get($post)->result();
    }
    $this->load->view('templates_admin/header');
    $this->load->view('templates_admin/navbar');
    $this->load->view('admin/laporan/laporan', $data);
    $this->load->view('templates_admin/footer');
  }

  public function process(){
    $post = $this->input->post(null, TRUE);
    $data['reports'] = $this->laporan_model->get($post)->result();
    $data['tgl_mulai'] = $post['tglm'];
    $data['tgl_selesai'] = $post['tgls'];

    // echo "<pre>";
    // print_r($data['reports']);
    // die;

    $this->load->view('templates_admin/header');
    $this->load->view('templates_admin/navbar');
    $this->load->view('admin/laporan/laporan_data', $data);
    $this->load->view('templates_admin/footer');

  }





}