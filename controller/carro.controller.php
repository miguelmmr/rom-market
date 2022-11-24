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

    public function ObtenerCantJuegosCarro($clienteId){
        $cant = $this->model->ObtenerCantJuegosCarro($clienteId);

        return $cant;
    }

    public function RegistrarJuegoCarro($clienteId, $juegoId){
        $this->model->RegistrarJuegoCarro($clienteId, $juegoId);

    }

    public function EliminarJuegoCarro($carroId){
        $this->model->EliminarJuegoCarro($carroId);

    }

    public function EliminarJuegosCarroByClienteId($clienteId){
        $this->model->EliminarJuegosCarroByClienteId($clienteId);

    }

}