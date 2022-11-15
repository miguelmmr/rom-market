<?php
    if(isset($_POST['submit'])){
        if(!empty($_POST['usuario']) && !empty($_POST['contrasena'])){
            include('connection.php');
            $usuario=$_POST['usuario'];
            $correo=$_POST['correo'];
            $nombre=$_POST['nombre'];
            $apellido=$_POST['apellido'];
            $tarjeta=$_POST['tarjeta'];
            $direccion=$_POST['direccion'];

            $contrasena_hashed = password_hash($_POST['contrasena'], PASSWORD_DEFAULT);

            $stmt="INSERT INTO `rom_market`.`persona` (`correo`, `usuario`, `contrasena`, `nombre`, `apellido`, `cuenta_bancaria`, `direccion`, `estado`) VALUES ('".$correo."', '".$usuario."', '".$contrasena_hashed."', '".$nombre."', '".$apellido."', '".$tarjeta."', '".$direccion."', 'A');";
            $result=$conn->query($stmt);

            session_start();
            $qry2="SELECT cliente_id from persona p, cliente c where c.persona_id = p.persona_id and p.usuario='$user'";
            echo $qry2;
            $result=$conn->query($qry2);
            $row=$result->fetch_array();
            $_SESSION['user'] = $user;
            $_SESSION['pass'] = $_POST['contrasena'];
            $_SESSION['clienteId'] = $row[0];

            header('Location: ../inicio.php');
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