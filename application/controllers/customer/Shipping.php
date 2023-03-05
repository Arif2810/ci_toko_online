<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shipping extends CI_Controller {

  public function dataprovinsi(){
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
      CURLOPT_HTTPHEADER => array(
        // Silahkan diisi dengan api_key dari rajaongkir.com
        "key: "
      ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
      echo "cURL Error #:" . $err;
    } else {
      // Hasilnya dalam bentuk json
      // kita koversi ke array
      $array_response = json_decode($response, TRUE);
      $dataprovinsi = $array_response['rajaongkir']['results'];
      
      echo "<option value=''>-Pilih provinsi--</option>";

      foreach($dataprovinsi as $key => $tiap_provinsi){
        echo "<option value='".$tiap_provinsi['province_id']."' id_provinsi='".$tiap_provinsi['province_id']."'>";
        echo $tiap_provinsi['province'];
        echo "</option>";
      }
    }

  }

  public function datadistrik(){
    $id_provinsi_terpilih = $this->input->post('id_provinsi');
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://api.rajaongkir.com/starter/city?province=".$id_provinsi_terpilih,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
      CURLOPT_HTTPHEADER => array(
        // Silahkan diisi dengan api_key dari rajaongkir.com
        "key: "
      ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
      echo "cURL Error #:" . $err;
    } else {
      // echo $response;
      // Menjadikan array dari json
      $array_response = json_decode($response, TRUE);
      $data_distrik = $array_response['rajaongkir']['results'];

      // echo "<pre>";
      // print_r($data_distrik);
      // echo "</pre>";

      echo "<option value=''>--Pilih distrik--</option>";

      foreach($data_distrik as $key => $tiap_distrik){
        echo "<option value='' id_distrik='".$tiap_distrik['city_id']."' nama_provinsi='".$tiap_distrik['province']."' nama_distrik='".$tiap_distrik['city_name']."' tipe_distrik='".$tiap_distrik['type']."' kodepos='".$tiap_distrik['postal_code']."'>";
        echo $tiap_distrik['type']." ";
        echo $tiap_distrik['city_name'];
        echo "</option>";
      }
    }
  }

  public function jasaekspedisi(){
    echo "<option value=''>-- Pilih ekspedisi --</option>";
    echo "<option value='pos'>Pos Indonesia</option>";
    echo "<option value='tiki'>TIKI</option>";
    echo "<option value='jne'>JNE</option>";
  }

  public function datapaket(){
    $ekspedisi = $this->input->post('ekspedisi');
    $distrik = $this->input->post('distrik');
    $berat = $this->input->post('berat');

    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => "origin=419&destination=$distrik&weight=$berat&courier=$ekspedisi",
      CURLOPT_HTTPHEADER => array(
        "content-type: application/x-www-form-urlencoded",
        // Silahkan diisi dengan api_key dari rajaongkir.com
        "key: "
      ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
      echo "cURL Error #:" . $err;
    } else {
      // echo $response;
      
      // Dijadikan ke array
      $array_response = json_decode($response, TRUE);
      
      $paket = $array_response['rajaongkir']['results']['0']['costs'];

      // echo "<pre>";
      // print_r($paket);
      // echo "</pre>";

      echo "<option value=''>--Pilih paket--</option>";

      foreach($paket as $key => $tiap_paket){
        echo "<option paket='".$tiap_paket['service']."' ongkir='".$tiap_paket['cost']['0']['value']."' etd='".$tiap_paket['cost']['0']['etd']."'>";
        echo $tiap_paket['service']." ";
        echo "Rp.".number_format($tiap_paket['cost']['0']['value']).",- ";
        echo $tiap_paket['cost']['0']['etd'];
        echo "</option>";
      }

    }
  }





}