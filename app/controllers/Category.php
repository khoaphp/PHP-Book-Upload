<?php
class Category extends Controller{

    public $ModelCategory;

    function __construct(){
        $this->ModelCategory = $this->model("ModelCategory");
    }

    public function index(){

    }

    public function list(){
        $mang = $this->ModelCategory->List();
        
        $this->view("MasterLayout", [
            "Detail"=>"Category/list",
            "Mang" => $mang
        ]);

    }

    public function add(){

        if(isset($_POST["btnAddNew"])){
            $name = $_POST["name"];
            $ordering = $_POST["ordering"];

            if(isset($_POST["active"])){
                $active = 1;
            }else{
                $active = 0;
            }

            $selectLevel = $_POST["selectLevel"];
            settype($selectLevel, "int");
            
            if( $this->ModelCategory->Add($name, $ordering, $active, $selectLevel) ){
                header("location:../Category/list");
            }
            
        }

        $this->view("MasterLayout", [
            "Detail"=>"Category/add",
            "MangCap0" => $this->ModelCategory->ListLevel0()
        ]);
        

    }

    public function edit($id){

        if(isset($_POST["btnEdit"])){
            $name = $_POST["name"];
            $ordering = $_POST["ordering"];

            if(isset($_POST["active"])){
                $active = 1;
            }else{
                $active = 0;
            }

            $id = $_POST["ID"];
            settype($id, "int");

            $selectLevel = $_POST["selectLevel"];
            settype($selectLevel, "int");

            
            if( $this->ModelCategory->Update($id, $name, $ordering, $active, $selectLevel) ){
                header("location:../../Category/list");
            }
            
        }
            
        $cat = $this->ModelCategory->Detail($id);

        $this->view("MasterLayout", [
            "Detail"=>"Category/edit",
            "CurrentCat"=>$cat,
            "MangCap0" => $this->ModelCategory->ListLevel0()
        ]);
    }

    function delete($id){
        $cat = $this->ModelCategory->Delete($id);
        header("location:../../Category/list");
    }

    function menu(){
        $menu2Cap = $this->ModelCategory->Menu2Cap();
        
    }

}
?>