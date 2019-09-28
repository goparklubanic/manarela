<?php

class Home extends Controller
{
  // method default
  public function index($hal = 1)
  {
    $data['title']="Relawan";
    $data['relawan'] = $this->model('Model_relawan')->mbeberRelawan($hal);
    $data['nomorHalaman'] = $hal;
    $this->view('template/header',$data);
    $this->view('template/navbar',$data);
    $this->view('relawan/index',$data);
    $this->view('template/footer');
    $this->view('relawan/modals');
  }
}
