<?php

class Spesialisasi extends Controller
{
  
  public function __construct(){
    if(!isset($_SESSION['user']) && $_SESSION['user'] !== 'admin' ){
      
      header("Location:".BASEURL."/Admin");
    }
  }
  
  // method default
  public function index()
  {
    $data['title']="Spesialisasi";
    $this->view('template/header',$data);
    $this->view('template/navbar');
    $this->view('spesialisasi/index',$data);
    $this->view('template/footer');
  }

  public function save(){
    $i = 0;
    foreach($_POST['kompetensi'] AS $i => $spec){
      $data=array('kodeRelawan'=>$_POST['spc_kodeRelawan'] , 'jobSpec'=>$spec );
      $x = $this->model("Model_spesialisasi")->nambahSpesialisasi($data);
      $i+=$x;
    }
    if($i > 0){
      $_SESSION['pesan'] = $i .' Kompetensi Ditambahkan ke '.$_POST['spc_kodeRelawan'];
    }else{
      $_SESSION['pesan'] = '0 Kompetensi Ditambahkan ke '.$_POST['spc_kodeRelawan'];
    }
    header("Location:".BASEURL."/Spesialisasi");
  }

  public function kompetensiRelawan($kr){
    $kompetensi = $this->model('Model_spesialisasi')->kompetensiRelawan($kr);
    echo json_encode($kompetensi,JSON_PRETTY_PRINT);
  }
  
  public function relawanKompeten($kompetensi){
    $relawan = $this->model('Model_spesialisasi')->relawanKompeten($kompetensi);
    echo json_encode($relawan,JSON_PRETTY_PRINT);
  }
}
