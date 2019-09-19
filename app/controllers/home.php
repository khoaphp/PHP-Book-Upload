<?php

class Home extends Controller{

    public function index(){
        //1 - load Model (Chứa data cần hiển thị)
        $teo = $this->model("SinhVien");

        // Goi ham $teo->DanhSachSV();
        $mangSV = $teo->getAll();

        //2 - load View (Giao diện) cần hiển thị
        /*
        $this->view("home/index", 
            [
                "Mang" => $mangSV
            ]
        );
        */
        $this->view("MasterLayout", [
            "Detail"=>"home/index",
            "Mang" => $mangSV
        ]);
        
    }

}