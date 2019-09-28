<?php

class Relawan extends Controller
{
  // method default
  public function index($hal =  1)
  {
    $data['title']="Relawan";
    $data['relawan'] = $this->model('Model_relawan')->mbeberRelawan($hal);
    $data['nomorHalaman'] = $hal;
    $this->view('template/header',$data);
    $this->view('template/navbar');
    $this->view('relawan/index',$data);
    $this->view('template/footer');
    $this->view('relawan/modals');
  }
  
  public function cari($nama)
  {
    $data['title']="Relawan";
    $data['relawan'] = $this->model('Model_relawan')->nguyakRelawan($nama);
    $this->view('template/header',$data);
    $this->view('template/navbar',$data);
    $this->view('relawan/cari',$data);
    $this->view('template/footer');
    $this->view('relawan/modals');
  }

  public function simpan(){
    print_r($_POST);
    if ($this->model('Model_relawan')->nambahRelawan($_POST) > 0){
      $_SESSION['pesan'] = "Data relawan berhasil ditambahkan";
    }else{
      $_SESSION['pesan'] = "Data relawan gagal ditambahkan";
    }
    header("Location:".BASEURL."/relawan");
  }

  public function buang($id){
    $data['kodeRelawan'] = $id;
    if($this->model('Model_relawan')->mbusakRelawan($data) > 0 ){
      $_SESSION['pesan'] = "Data relawan berhasil dihapus";
    }else{
      $_SESSION['pesan'] = "Data relawan gagal dihapus";
    }
    header("Location:".BASEURL."/relawan");
  }

  public function carijson($nama)
  {
    $data['relawan'] = $this->model('Model_relawan')->nguyakRelawan($nama);
    echo json_encode($data['relawan'] , JSON_PRETTY_PRINT);
  }
}
