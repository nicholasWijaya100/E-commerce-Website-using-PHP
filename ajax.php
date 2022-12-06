<?php
    include("koneksi.php");
    if($_POST['jenis'] == "loadmenu"){
        $stmt = $conn -> prepare("select * from menu");
        $stmt -> execute();

        $arr = [];
        foreach($stmt as $row){
            array_push($arr,$row);
        }

        echo json_encode($arr);
    }
?>