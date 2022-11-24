<?php
require_once('model/juego.model.php');

class JuegoController{

    private $model;

    public function __CONSTRUCT()
    {
        $this->model = new JuegoModel();
    }
  
    public function ObtenerTableAllJuegos(){
        $tabla = $this->model->ObtenerTableAllJuegos();
        if($tabla=='error'){
            echo('error');
        }
        else{
            return $tabla;
        }
    }

    public function ObtenerJuegoById($juego_id){
        $fila = $this->model->ObtenerJuegobyId($juego_id);
        if($fila=='error'){
            echo('error');
        }
        else{
            return $fila;
        }
    }

    public function ObtenerImagenesSlider(){
        $tabla = $this->model->ObtenerImagenesSlider();
        if($tabla=='error'){
            echo('error');
        }
        else{
            return $tabla;
        }
    }

    public function ObtenerImagenesSecundariasJuegoById($juego_id){
        $tabla = $this->model->ObtenerImagenesSecundariasJuegoById($juego_id);
        if($tabla=='error'){
            echo('error');
        }
        else{
            return $tabla;
        }
    }

    public function ObtenerTableJuegosBySearch($search){
        $tabla = $this->model->ObtenerTableJuegosBySearch($search);
        if($tabla=='error'){
            echo('error');
        }
        else{
            return $tabla;
        }
    }

    public function ObtenerTableJuegosRecientes(){
        $tabla = $this->model->ObtenerTableJuegosRecientes();
        if($tabla=='error'){
            echo('error');
        }
        else{
            return $tabla;
        }
    }

    public function ObtenerTableMejoresJuegos(){
        $tabla = $this->model->ObtenerTableMejoresJuegos();
        if($tabla=='error'){
            echo('error');
        }
        else{
            return $tabla;
        }
    }

    public function actualizarRatingJuego($juegoId, $ratingNuevo, $cantRating){
        $this->model->actualizarRatingJuego($juegoId, $ratingNuevo, $cantRating);

    }


}