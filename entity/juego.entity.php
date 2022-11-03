<?php

class Juego
{
    private $juego_id;
    private $nombre;
    private $descripcion;
    private $precio;
    private $rating;
    private $cant_rating;
    private $promocion;
    private $fecha_lanzamiento;
    private $link_descarga;
    private $estado;

    
    public function __GET($juego_id){ 

      return $this->$juego_id; 
      
    }

    public function __SET($juego_id, $variable){

      return $this->$juego_id = $variable; 

    }


}