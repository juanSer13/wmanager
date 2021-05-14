<?php

Class Conexion{

	public static function conectarBD(){

	//Declaración aquí - la funcion no recorre el código anterior
	$bd = "wmanager_db";
	$servidor = "localhost";
	$usuario = "root";
	$password = "";

	$mysqli = new mysqli($servidor, $usuario, $password, $bd); 

		if ($mysqli->connect_errno) { 
			echo "Error en la conexión a la base de datos: \n";
			echo "Razón: \n"; 
			echo "Errno: " . $mysqli->connect_errno . "\n"; 
			echo "Error: " . $mysqli->connect_error . "\n";

			exit;
		}

		//Forzar el charset a utf8
		$mysqli->set_charset("utf8");

		return $mysqli;
	}

	public static function desconectarBD($mysqli){
  		$mysqli->close();
	}
}

?>