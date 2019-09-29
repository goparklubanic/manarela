<?php

class Person extends Controller
{
    private $dewan;
    public function __construct(){
        $this->dewan = '330413200419002';
    }
    
    public function index(){
        
        $data['title']="Info Relawan";
        $data['person'] = $this->model('Model_person')->sayalah($this->dewan);
        $data['diklat'] = $this->model('Model_person')->diklatsaya($this->dewan);
        $data['tugas'] = $this->model('Model_person')->tugassaya($this->dewan);
        $data['specs'] = $this->model('Model_person')->specsaya($this->dewan);

        $this->view('template/header',$data);
        $this->view('person/index',$data);
        $this->view('template/footer');
    }

    public function update(){
        if($this->model("Model_person")->updatesaya($_POST) > 0 ){
            header("Location:".BASEURL."/Person");
        }
    }
}