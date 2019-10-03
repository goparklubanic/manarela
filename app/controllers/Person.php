<?php

class Person extends Controller
{
    private $dewan;
    // public function __construct(){
    //     $this->dewan = '330413200419002';
    // }
    
    public function index(){
        
        $data['title']="Info Relawan";
        $data['person'] = $this->model('Model_person')->sayalah($_SESSION['dewan']);
        $data['diklat'] = $this->model('Model_person')->diklatsaya($_SESSION['dewan']);
        $data['tugas'] = $this->model('Model_person')->tugassaya($_SESSION['dewan']);
        $data['specs'] = $this->model('Model_person')->specsaya($_SESSION['dewan']);

        $this->view('template/header',$data);
        $this->view('person/index',$data);
        $this->view('template/footer');
    }

    public function update(){
        if($this->model("Model_person")->updatesaya($_POST) > 0 ){
            header("Location:".BASEURL."/Person");
        }
    }

    public function login(){

        $this->view('person/login');
    }

    public function otentik(){
        $data = $this->model('Model_person')->otentikasi($_POST);
        if( $data['row'] >= 1 ){
            $_SESSION['user'] = 'relawan';
            $_SESSION['dewan'] = $data['set']['kodeRelawan'];
            //$this->dewan = $data['set']['kodeRelawan'];
            header("Location:" . BASEURL . "/Person/");
        }else{
            echo "Otentikasi gagal";
        }
    }

    public function logout(){
        session_destroy();
        unset($_SESSION);
        header("Location:" . BASEURL . "/Person/login");
    }
}