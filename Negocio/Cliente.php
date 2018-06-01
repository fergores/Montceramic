<?php

require_once "../Datos/DA_Clientes.php";

class Cliente {

    private $IdCliente;
    private $IdPieza;
    private $nombre;
    private $fecha;
    private $correo;

    public function __construct ($IdCliente=null, $IdPieza=null, $nombre=null, $fecha=null, $correo=null) {
        $this->IdCliente = $IdCliente; 
        $this->IdPieza = $IdPieza;   
        $this->nombre = $nombre;
        $this->fecha  = $fecha;
        $this->correo = $correo; 
    }

    public function getIdCliente() {
        return $this->IdCliente;
    }
    public function getIdPieza() {
        return $this->IdPieza;
    }
    public function getNombre() {
        return $this->nombre;
    }
    public function getFecha() {
        return $this->fecha;
    }
    public function getCorreo() {
        return $this->correo;
    }

    public function setIdCliente($IdCliente) {
        $this->IdCliente = $IdCliente;
    }
    public function setIdPieza($IdPieza) {
        $this->IdPieza = $IdPieza;
    }
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }
    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }
    public function setCorreo($correo) {
        $this->correo = $correo;
    }

    public function Insertar(&$error) {
    	$objDataCliente = new DA_Cliente();
        $resultado = $objDataCliente->Insertar($error,$this->IdCliente, $this->IdPieza, $this->nombre, $this->fecha, $this->correo);
	    return $resultado;
    }

    public function Modificar(&$error) {
        $objDataCliente = new DA_Cliente();
        $resultado = $objDataCliente->Modificar($error,$this->IdCliente, $this->IdPieza, $this->nombre, $this->fecha, $this->correo);
	    return $resultado;
    }

    public function Eliminar(&$error){
        $objDataCliente = new DA_Cliente();
        $resultado = $objDataCliente->Eliminar($error,$this->IdCliente);
	    return $resultado;
    }


    public function buscarPorIdCliente(&$error, $IdCliente) {

    	$objDataCliente = new DA_Cliente();
        $registro = $objDataCliente->buscarPorIdCliente($error, $IdCliente);
        if ($registro)
        	return new self($IdCliente, $registro['IdPieza'], $registro['nombre'], $registro['fecha'], $registro['correo']);
        else 
        	return false;
    }

    public function Listar(&$error) {
        $objDataCliente = new DA_Cliente();
        $arrayRegistros = $objDataCliente->Listar($error);
        
        if (!$arrayRegistros)
        	return false;
        else {
        	$arrayClientes = array();
        	foreach ($arrayRegistros as $registro) {
        		$objgClientes = new Cliente($registro['IdCliente'] , $registro['IdPieza'], $registro['nombre'], $registro['fecha'], $registro['correo'] );
        		$arrayClientes[]=$objgClientes;
        	}

        	return $arrayClientes;

        } 
        	
    }

}

?>