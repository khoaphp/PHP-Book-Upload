<?php

class App{

    // /sinhvien/chitiet/1

    protected $controller = 'home';
    protected $method = 'index';
    protected $params = [];

    public function __construct(){
        $url = $this->checkURL(); // Array ( [0] => home )
        
        if( file_exists("../app/controllers/". $url[0] .".php") ){
            $this->controller = $url[0];
            unset($url[0]);
        }

        require_once "../app/controllers/". $this->controller . ".php";
        $this->controller = new $this->controller;

        //xu ly Method
        if(isset($url[1])){
            if( method_exists( $this->controller, $url[1] ) ){
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        //Xu ly params
        $this->params = $url ? array_values($url) : [];

        //public/home/index
        call_user_func_array([$this->controller, $this->method], $this->params);

    }

    public function checkURL(){
        if( isset($_GET["url"]) ){
            return explode("/", filter_var(trim($_GET["url"])));
        }
    }

}