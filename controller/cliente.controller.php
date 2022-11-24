<?php
require_once('model/cliente.model.php');

class ClienteController{

    private $model;

    public function __CONSTRUCT()
    {
        $this->model = new ClienteModel();
    }
  
    public function ObtenerSaldoByClienteId($clienteId){
        $saldo = $this->model->ObtenerSaldoByClienteId($clienteId);
        if($saldo=='error'){
            echo('error');
        }
        else{
            return $saldo;
        }
    }

    public function ObtenerClienteById($clienteId){
        $fila = $this->model->ObtenerClienteById($clienteId);
        if($fila=='error'){
            echo('error');
        }
        else{
            return $fila;
        }
    }

    public function ActualizarSaldoClienteById($saldo, $clienteId){
        $this->model->ActualizarSaldoClienteById($saldo, $clienteId);

    }



}