<?php

class Login extends Controller{

    public function index(){
    
        $chuoi = "";

        if( isset($_POST["btnLogin"]) ){
            $chuoi = "XU LY LOGIN DI";
        }else{
            $chuoi = "HELLO";
        }

        $this->view("Login", ["CHUOI"=>$chuoi]);

        // lan dau tien: /login

        // khach hang click nut Login
        
    }

}