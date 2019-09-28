<?php

class Penugasan extends Controller
{
  // method default
  public function index($kodeRelawan)
  {
    $data['title']="Penugasan";
    $data['kodeRelawan'] = $kodeRelawan;
    $data['relawan'] = $this->model('Model_relawan')->ndelokRelawan($kodeRelawan);
    $data['penugasan'] = $this->model('Model_penugasan')->penugasanRelawan($kodeRelawan);
    $this->view('template/header',$data);
    $this->view('template/navbar');
    $this->view('penugasan/index',$data);
    $this->view('template/footer');
  }

  public function simpan(){
    // namaTugas,lokasiTugas,skope,tanggalMulai,tanggalSelesai
    if( $this->model('Model_penugasan')->nambahPenugasan($_POST) > 0 ){
      $_SESSION['pesan'] = "Data penugasan berhasil ditambahkan";
    }else{
      $_SESSION['pesan'] = "Data penugasan gagal ditambahkan";
    }
    header("Location:".BASEURL."/penugasan/".$_POST['kodeRelawan']);
  }

  public function batal($idx,$kr){
    // namaTugas,lokasiTugas,skope,tanggalMulai,tanggalSelesai
    $data['idxPenugasan'] = $idx;
    if( $this->model('Model_penugasan')->mbusakPenugasan($data) > 0 ){
      $_SESSION['pesan'] = "Data penugasan berhasil dihapus";
    }else{
      $_SESSION['pesan'] = "Data penugasan gagal dihapus";
    }
    header("Location:".BASEURL."/penugasan/".$kr);
  }

  // method Event diklat
  public function event($hal = 1)
  {
    $data['relawan'] = $this->model('Model_relawan')->mbeberRelawan(1); 
    $data['title']="Event Penugasan";
    $data['tugas']=$this->model('Model_penugasan')->mbeberPenugasan($hal);
    $data['nomorHalaman'] = $hal;
    $this->view('template/header',$data);
    $this->view('template/navbar');
    $this->view('penugasan/eventTugas',$data);
    $this->view('template/footer');
  }

  public function spEvent(){
    foreach($_POST['relawan'] AS $i=>$kode){

      $data = array(
        'kodeRelawan' => $kode ,
        'namaTugas' => $_POST['namaTugas'] , 
        'lokasiTugas' =>$_POST['lokasiTugas'] , 
        'skope'=>$_POST['skope'] ,
        'tanggalMulai' => $_POST['tanggalMulai'] , 
        'tanggalSelesai' => $_POST['tanggalSelesai']
      );

      $result = $this->model('Model_penugasan')->nambahPenugasan($data);
      if( $result > 0 ){
        header("Location:".BASEURL."/Penugasan/event");
      }
    }
  }
}
