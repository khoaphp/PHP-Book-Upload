<?php

class SinhVien extends DB{
    public $ID;
    public $HOTEN;
    public $NAMSINH;

    public function getAll(){
        $query = "SELECT * FROM sinhvien";
        return mysqli_query($this->conn, $query);
    }

    public function getOne($ID){
        $query = "SELECT * FROM sinhvien WHERE ID=$ID";
        return mysqli_query($this->conn, $query);
    }
    
}