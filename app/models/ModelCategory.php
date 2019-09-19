<?php

class ModelCategory extends DB{
    public $id;
    public $name; // Thể thao 
    public $ordering;
    public $active;

    function List(){
        $qr = "SELECT * FROM Category";
        return mysqli_query($this->conn, $qr);
    }

    function Add($name, $ordering, $active, $selectLevel){
        $qr = "INSERT INTO Category VALUES(
            null, '$name',$ordering ,$active, $selectLevel
        )";
        return mysqli_query($this->conn, $qr);
    }

    function Detail($id){
        $qr = "SELECT * FROM Category
        WHERE id=$id";
        return mysqli_query($this->conn, $qr);
    }

    function Update($id, $name, $ordering, $active, $selectLevel){
        $qr = "UPDATE Category SET
            name='$name',
            ordering='$ordering',
            active='$active',
            level='$selectLevel'
            WHERE id='$id'
        ";
        return mysqli_query($this->conn, $qr);
    }

    function Delete($id){
        $qr = "DELETE FROM Category WHERE id='$id'";
        return mysqli_query($this->conn, $qr);
    }

    function ListLevel0(){
        $qr = "SELECT * FROM Category WHERE level=0";
        return mysqli_query($this->conn, $qr);
    }

    ///// Demo

    function ListLevel_Con($id_Cha){
        $qr = "SELECT * FROM Category WHERE level=$id_Cha";
        return mysqli_query($this->conn, $qr);
    }

    function Menu2Cap(){

        $qr0 = "SELECT * FROM Category WHERE level=0";
        $mang0 = mysqli_query($this->conn, $qr0);
        $MangBu = [];
        while($row0 = mysqli_fetch_array($mang0)){

            $qr1 = "SELECT * FROM Category WHERE level=" . $row0["id"];
            $mang1 = mysqli_query($this->conn, $qr1);
            $mangCap2 = [];
            while($row1 = mysqli_fetch_array($mang1)){
                array_push($mangCap2, new Cap2( $row1["id"], $row1["name"] ));
            }

            $cap1 = new Cap1(
                $row0["id"],
                $row0["name"],
                $mangCap2
            );
            array_push($MangBu, $cap1);
        }
        return  json_encode($MangBu);
    }
}

class Cap1{
    public $id;
    public $name;
    public $mang;
    function __construct($Id, $Name, $Mang){
        $this->id = $Id;
        $this->name = $Name;
        $this->mang = $Mang;
    }
}

class Cap2{
    public $id;
    public $name;
    function __construct($Id, $Name){
        $this->id = $Id;
        $this->name = $Name;
    }
}

?>