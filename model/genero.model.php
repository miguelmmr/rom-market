<?php

    class GeneroModel {
        
        /*----Devuelve todos los Juegos con su imagen principal--*/
        public function ObtenerTableAllGeneros(){
            include('connection.php');
            $stmt = "select * from genero";
            $result = $conn->query($stmt);
            $result->fetch_all();
            if($result){
                return $result;
            }
            else{
                return 'error';
            }
        }


    }
?>