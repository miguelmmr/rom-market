<?php
    if(isset($_POST['submit'])){
        if(!empty($_POST['usuario']) && !empty($_POST['contrasena'])){
            include('./model/connection.php');
            $usuario=$_POST['usuario'];
            $correo=$_POST['correo'];
            $nombre=$_POST['nombre'];
            $apellido=$_POST['apellido'];
            $tarjeta=$_POST['tarjeta'];
            $direccion=$_POST['direccion'];

            $contrasena_hashed = password_hash($_POST['contrasena'], PASSWORD_DEFAULT);

            $stmt="INSERT INTO `rom_market`.`persona` (`correo`, `usuario`, `contrasena`, `nombre`, `apellido`, `cuenta_bancaria`, `direccion`, `estado`) VALUES ('".$correo."', '".$usuario."', '".$contrasena_hashed."', '".$nombre."', '".$apellido."', '".$tarjeta."', '".$direccion."', 'A');";
            echo $stmt;
            $result=$conn->query($stmt);

            echo "<br>";
            echo $stmt;
        }
        else{
            header('Location: index.php?userlogin=fail');
            echo 'segundo else';
        }
    }
    else{
        echo 'tercer else';
    }
    mysqli_close($conn);
?>