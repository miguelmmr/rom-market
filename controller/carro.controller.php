<?php
require_once('model/carro.model.php');

class CarroController{

    private $model;

    public function __CONSTRUCT()
    {
        $this->model = new CarroModel();
    }
  
    public function ObtenerTableCarroByClienteId($clienteId){
        $tabla = $this->model->ObtenerTableCarroByClienteId($clienteId);
        if($tabla=='error'){
            echo('error');
        }
        else{
            return $tabla;
        }
    }

    public function RegistrarCarro($clienteId, $juegoId){
        $this->model->RegistrarCarro($clienteId, $juegoId);

    }

    public function EliminarCarro($carroId){
        $this->model->EliminarCarro($carroId);

    }

    public function ObtenerCantJuegosCarro($clienteId){
        $cant = $this->model->ObtenerCantJuegosCarro($clienteId);

        return $cant;
    }



}