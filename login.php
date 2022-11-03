<?php
    if(isset($_POST['submit'])){
        if(!empty($_POST['usuario']) && !empty($_POST['contrasena'])){
            include('./model/connection.php');
            $user=$_POST['usuario'];
            $pass_hashed = password_hash($_POST['contrasena'], PASSWORD_DEFAULT);
            $qry="SELECT * FROM persona where usuario='".$user."' and contrasena = '".$pass_hashed."'";
            echo $qry;
            echo "<br>";
            $result=$conn->query($qry);
            if(empty($result)){
                //header('Location: index.php?userlogin=fail');
                echo "usuario o pass incorrecto";
            }
            else{
                session_start();
                $qry2="SELECT cliente_id from persona p, cliente c where c.persona_id = p.persona_id and p.usuario='$user'";
                echo $qry2;
                $result=$conn->query($qry2);
                $row=$result->fetch_array();
                $_SESSION['user'] = $user;
                $_SESSION['pass'] = $_POST['contrasena'];
                $_SESSION['idCliente'] = $row[0];
                echo "exito ";
                echo  $_SESSION['idCliente'];
            }
        }
        else{
            //header('Location: index.php?userlogin=fail');
            echo 'segundo else';
        }
    }
    else{
        echo 'tercer else';
    }
    mysqli_close($conn);
?>