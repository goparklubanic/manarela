<?php

class Admin extends Controller
{
    public function index(){
        $data['title'] = "Management Relawan";
        $this->view("admin/index",$data);
    }

    public function otentik(){
        $kunciotentik = [
            '3ab64324fec382c00c858dc179f24c73',
            '7cb90c928d75624fc6e0d6001986b4c3'
        ];
        $sandi = md5("{$_POST['username']}_\$_{$_POST['password']}");

        if ( $sandi === $kunciotentik[0] || $sandi === $kunciotentik[1] ){
            $_SESSION['user'] = 'admin';
            header("Location:".BASEURL);
        }
    }

    public function signout(){
        session_destroy();
        session_unset();
        unset($_SESSION);
        header("Location:".BASEURL."/Admin/");
    }
}