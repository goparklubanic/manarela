<?php

class App {

  // class properties
  protected $controller = 'Home';
  protected $method = 'index';
  protected $params = [];

  public function __construct()
  {

    $url = $this->parseURL();

    // menangani controller. controller = elemen ke-0 array $url;
    $urlmethod = ucfirst($url[0]);
    if( file_exists('../app/controllers/'. $urlmethod . '.php') ){
      //echo "file ". ucfirst($url[0]).'.php ada di folder app/controllers';
      $this->controller = $urlmethod;
      unset($url[0]);
    }else{
      // echo "Tidak Ada File ".$url[0].'.php di folder /app/controllers <br />';
    }

    require_once '../app/controllers/'. $this->controller. '.php';
    $this->controller = new $this->controller;

    // menangani method

    if( isset($url[1]) )
    {
      if( method_exists( $this->controller, $url[1]) )
      {
        $this->method = $url[1];
        unset($url[1]);
      }
    }

    // menangani parameters

    if( !empty($url) )
    {
      $this->params = array_values($url);
    }

    // jalankan controller, method, serta kirim parameter yang ada.
    call_user_func_array([$this->controller, $this->method],$this->params);

    // jurus debugging
    /*
    echo "<pre>";
    var_dump($url);
    echo "</pre>";
    */
  }

  public function parseURL(){

    if(isset($_GET['url'])){
      // $url berikut masih bisa menyisakan tanda slash di akhir baris
      // $url =
      // Untuk menghilangkan slash di akhir baris, gunakan sintaks berikut
      $url = rtrim($_GET['url'],"/");

      // Sintaks berikut mengamankan url dari karakter 'aneh/asing/jahat';
      $url = filter_var($url, FILTER_SANITIZE_URL );

      // pecah url berdasarkan karakter slash
      $url = explode("/",$url);

      return $url;
    }
  }

}
