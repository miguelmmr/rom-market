<?php
require_once('model/libreria.model.php');

class LibreriaController{

    private $model;

    public function __CONSTRUCT()
    {
        $this->model = new LibreriaModel();
    }
  
    public function ObtenerTableLibreriaByClienteId($clienteId){
        $tabla = $this->model->ObtenerTableLibreriaByClienteId($clienteId);
        if($tabla=='error'){
            echo('error');
        }
        else{
            return $tabla;
        }
    }

    public function juegoEnLibreriaCliente($juegoId, $clienteId){
        $existe = False;
        $filas = $this->model->juegoEnLibreriaCliente($juegoId, $clienteId);
        if($filas=='error'){
            echo('error');
        }
        else{

            if(sizeof($filas) > 0){
                $existe = True;
            }

            return $existe;
        }
    }

    public function ObtenerJuegoLibreriaById($libreria_id){
        $fila = $this->model->ObtenerJuegoLibreriaById($libreria_id);
        if($fila=='error'){
            echo('error');
        }
        else{
            return $fila;
        }
    }

    public function RegistrarJuegosLibreria($clienteId, $juegosId){
        $this->model->RegistrarJuegosLibreria($clienteId, $juegosId);

    }

    public function EliminarJuegoLibreria($libreriaId){
        $this->model->EliminarJuegoLibreria($libreriaId);

    }

    public function actualizarRatingPersonalLibreria($libreriaId, $ratingNuevo ){
        $this->model->actualizarRatingPersonalLibreria($libreriaId, $ratingNuevo );

    }


}