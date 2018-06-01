<?php

require_once 'ConexionMontceramic.php';

class DA_Cliente {

	const TABLA = 'client';

	public function Insertar(&$error, $IdCliente, $IdPieza, $nombre, $fecha, $correo) {
    	$conexion = new ConexionMontceramic();
        
        $consulta = $conexion->prepare('INSERT INTO ' . self::TABLA . ' ($IdCliente,$IdPieza, $nombre, $fecha, $correo) VALUES(:$IdCliente,$IdPieza, $nombre, $fecha, $correo)');
        
        $consulta->bindParam(':IdCliente', $IdCliente);
		$consulta->bindParam(':IdPieza', $IdPieza);
        $consulta->bindParam(':nombre', $nombre);
        $consulta->bindParam(':fecha', $fecha);
        $consulta->bindParam(':correo', $correo);
        
        $resultado = $consulta->execute();
        $conexion = null;

        if (!$resultado)
            $error=($consulta->errorInfo())[2];

	    return $resultado;
    }

    public function Modificar(&$error, $IdCliente, $IdPieza, $nombre, $fecha, $correo) {
        $conexion = new ConexionMontceramic();

        $consulta = $conexion->prepare('UPDATE ' . self::TABLA . ' SET nombre = :nombre, correo = :correo WHERE IdCliente = :IdCliente');

        $consulta->bindParam(':IdCliente', $IdCliente);
		$consulta->bindParam(':IdPieza', $IdPieza);
        $consulta->bindParam(':nombre', $nombre);
        $consulta->bindParam(':fecha', $fecha);
        $consulta->bindParam(':correo', $correo);

        $resultado= $consulta->execute();

        //echo $consulta->queryString . "</br>";
        //echo $num_ss .$nombre . $edad;
        $conexion = null;

		if (!$resultado)
            $error=($consulta->errorInfo())[2];

        return $resultado;
        
    }

    public function Eliminar(&$error, $IdCliente){
        $conexion = new ConexionMontceramic();
        $consulta = $conexion->prepare('DELETE FROM ' . self::TABLA . ' WHERE IdCliente = :IdCliente');
        $consulta->bindParam(':IdCliente', $IdCliente);
        $resultado=$consulta->execute();
        $conexion = null;

        if (!$resultado)
            $error=($consulta->errorInfo())[2];

        return $resultado;
    }

    public function buscarPorIdCliente(&$error, $IdCliente) {
        $conexion = new ConexionHospital();
        $consulta = $conexion->prepare('SELECT nombre, correo FROM ' . self::TABLA . ' WHERE IdCliente = :IdCliente');
        $consulta->bindParam(':IdCliente', $IdCliente);
        $resultado = $consulta->execute();
        
        if (!$resultado)
            $error=($consulta->errorInfo())[2];
        else
            $registro = $consulta->fetch();
        
        $conexion = null;

        return $registro;
    }

    public function Listar(&$error) {
        $conexion = new ConexionMontceramic();
        $consulta = $conexion->prepare('SELECT IdCliente, IdPieza, nombre, fecha, correo FROM ' . self::TABLA);
        $resultado = $consulta->execute();

        if (!$resultado)
            $error=($consulta->errorInfo())[2];
        else
            $arrayRegistros = $consulta->fetchAll();
        
        $conexion = null;
        
        return $arrayRegistros;
    }

}

?>