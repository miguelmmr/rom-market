<?php

    class JuegoModel {
        
        /*----Devuelve todos los Juegos con su imagen principal--*/
        public function ObtenerTableAllJuegos(){
            include('connection.php');
            $stmt = "select * from juego j, imagen_juego ij where j.juego_id = ij.juego and ij.tipo_imagen = 'P'";
            $result = $conn->query($stmt);
            $result->fetch_all();
            if($result){
                return $result;
            }
            else{
                return 'error';
            }
        }

        /*----Devuelve todos los Juegos con su imagen principal ordenado por fecha lanzamiento--*/
        public function ObtenerTableJuegosRecientes(){
            include('connection.php');
            $stmt = "select * from juego j, imagen_juego ij where j.juego_id = ij.juego and ij.tipo_imagen = 'P' order by j.fecha_lanzamiento desc limit 4";
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