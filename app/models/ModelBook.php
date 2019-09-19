<?php
class ModelBook extends DB{
    function List(){
        $qr = "
        SELECT * FROM Book, Category
        WHERE Book.IDCate = Category.id
        ";
        return mysqli_query($this->conn, $qr);
    }

    function Add($Category, $Title, $BookImage, $Price, $Description, $Order, $active){
       $kq = false;

       $Title_KD = $this->changeTitle($Title);

       // Upload
       $arr = json_decode($this->Upload( $BookImage, "./images/upload/" ));
       print_r($arr);

       // Insert db
       if( $arr->kq == 1 ){
           echo $qr = "INSERT INTO book VALUES(
               null,
               $Category, '$Title', '$Title_KD', '$arr->file',
               $Price, '$Description' , $Order, $active
           )";
           if(mysqli_query($this->conn, $qr)){
               $kq = true;
           }
        }

       return $kq;
    }

    function Upload($img, $target_dir){
        $target_file = $target_dir . basename($img["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        
        // Check if image file is a actual image or fake image
        $check = getimagesize($img["tmp_name"]);
            if($check !== false) {
                //echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                //echo "File is not an image.";
                $uploadOk = 0;
            }
        
        
        // Check file size
        if ($img["size"] > 500000) {
            //echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            $kq = new Upload(0, "");
        // if everything is ok, try to upload file
        } else {
            $newFile = $this->PhatSinhRandomKey(10) . basename($img["name"]);
            $new = $target_dir . $newFile;
            if (move_uploaded_file($img["tmp_name"], $new)) {
                $kq = new Upload(1, $newFile);
            } else {
                $kq = new Upload(0, "");
            }
        }
        return json_encode($kq);
    }

    function PhatSinhRandomKey($n){
        $s = "";
        
        $m = array(0,1,2,3,4,5,6,7,8,9,"a", "b", "c", "d", "e", "f", "g","h","i", "j");
        
        for($i=1; $i<=$n; $i++){
            $r = rand(0, count($m)-1);
            $s = $s . $m[$r];
        }
        
        return $s;
    }
}

class Upload{
    public $kq;
    public $file;
    function __construct($k, $f){
        $this->kq = $k;
        $this->file = $f;
    }
}


?>