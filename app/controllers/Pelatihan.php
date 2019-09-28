<?php

class Pelatihan extends Controller
{
  
  public function __construct(){
    if(!isset($_SESSION['user']) && $_SESSION['user'] !== 'admin' ){
      
      header("Location:".BASEURL."/Admin");
    }
  }
  
  // method default
  public function index($kodeRelawan)
  {
    
    $data['title']="Pelatihan Relawan";
    $data['kodeRelawan'] = $kodeRelawan;
    $data['relawan'] = $this->model('Model_relawan')->ndelokRelawan($kodeRelawan);
    $data['pelatihan'] = $this->model('Model_pelatihan')->pelatihanRelawan($kodeRelawan);
    $this->view('template/header',$data);
    $this->view('template/navbar');
    $this->view('pelatihan/index',$data);
    $this->view('template/footer');
  }

  // method Event diklat
  public function event($hal = 1)
  {
    $data['relawan'] = $this->model('Model_relawan')->mbeberRelawan(1); 
    $data['title']="Event Diklat";
    $data['diklat']=$this->model('Model_pelatihan')->mbeberPelatihan($hal);
    $data['nomorHalaman'] = $hal;
    $this->view('template/header',$data);
    $this->view('template/navbar');
    $this->view('pelatihan/eventDiklat',$data);
    $this->view('template/footer');
  }

  public function simpan(){
    if( $this->model('Model_pelatihan')->nambahPelatihan($_POST) > 0 ){
      $_SESSION['pesan'] = "Data pelatihan berhasil ditambahkan";
    }else{
      $_SESSION['pesan'] = "Data pelatihan gagal ditambahkan";
    }

    header("Location:".BASEURL."/pelatihan/".$_POST['kodeRelawan']);
  }

  public function batal($idx,$kr){
    $latihan['idxPelatihan'] = $idx;
    if( $this->model('Model_pelatihan')->mbusakPelatihan($latihan) > 0 ){
      $_SESSION['pesan'] = "Data pelatihan berhasil dihapus";
    }else{
      $_SESSION['pesan'] = "Data pelatihan gagal dihapus";
    }
    header("Location:".BASEURL."/pelatihan/".$kr);
  }

  public function spEvent(){
    foreach($_POST['relawan'] AS $i=>$kode){

      $data = array('kodeRelawan'=>$kode , 'namaPelatihan'=>$_POST['nama'] ,'jenjang'=>$_POST['jenjang'] , 'tanggalMulai' =>$_POST['tanggalMulai'],'tanggalSelesai'=>$_POST['tanggalSelesai'],'jamKurikulum'=>$_POST['jamKurikulum']);

      $result = $this->model('Model_pelatihan')->nambahPelatihan($data);
      if( $result > 0 ){
        header("Location:".BASEURL."/Pelatihan/event");
      }
    }
  }

  public function peserta($id){
    $data['pelatihan'] = $this->model("Model_pelatihan")->ndelokPelatihan($id);
    $data['title'] = "Peserta Diklat";
    $data['peserta'] = $this->model("Model_pelatihan")->pesertaPelatihan($id);

    $this->view('template/header',$data);
    $this->view('template/navbar');
    $this->view('pelatihan/peserta',$data);
    $this->view('template/footer');
  }

}
