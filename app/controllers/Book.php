<?php

class Book extends Controller{

    public $ModelBook;
    public $ModelCategory;

    function __construct(){
        $this->ModelBook = $this->model("ModelBook");
        $this->ModelCategory = $this->model("ModelCategory");
    }

    public function list(){
        $mang = $this->ModelBook->List();
        $this->view("MasterLayout", [
            "Detail"=>"Book/list",
            "MangBook"=>$mang
        ]);
    }

    public function add(){

        // XU ly Them
        if(isset($_POST["btnAddNew"])){
            $Category = $_POST["Category"];
            settype($Category, "int");

            $Title = $_POST["Title"];

            $BookImage = $_FILES["BookImage"];

            $Price = $_POST["Price"];
            settype($Price, "int");

            $Description = $_POST["Description"];

            $Order = $_POST["Order"];
            settype($Order, "int");

            if(isset($_POST["active"])){
                $active = 1;
            }else{
                $active = 0;
            }

            if($this->ModelBook->Add($Category, $Title, $BookImage, $Price, $Description, $Order, $active)){
                header("location:../Book/List");
            }

        }

        $mang = $this->ModelCategory->Menu2Cap();

        $this->view("MasterLayout", [
            "Detail"=>"Book/add",
            "MangCat"=>$mang
        ]);

    }
    
    public function index(){
       
        $this->view("MasterLayout", [
            "Detail"=>"Book/index"
        ]);
        
    }

    

}