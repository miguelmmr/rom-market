<?php
    echo 'prueba';
    $conn= new mysqli("localhost","root","1212","rom_market");
    mysqli_set_charset($conn,"utf8");

    $qry="SELECT * from genero";
    $result=$conn->query($qry);

    foreach($result as $rs){
        echo $rs['nombre'];
    }
?>

