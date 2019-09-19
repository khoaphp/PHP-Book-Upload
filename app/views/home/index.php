<?php
while($row = mysqli_fetch_array($data["Mang"])){
    echo "<h2><a href='./detail/".$row["ID"]."'>" . 
    $row["HOTEN"] . 
    "</a></h2>";
}
?>