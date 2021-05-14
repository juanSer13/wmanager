<?php

class Proyecto{
    private $idUser;
    private $fechaInicio;
    private $nombre;
    private $nombreCreador;
    private $descripcion;
    private $estado;
    private $precio;

    function __construct($idUser = "", $fechaInicio = "", $nombre="", $nombreCreador ="", $descripcion = "", $estado ="", $precio = ""){
        $this->idUser = $idUser;
        $this->fechaInicio = $fechaInicio;
        $this->nombre = $nombre;
        $this->nombreCreador = $nombreCreador;
        $this->descripcion = $descripcion;
        $this->estado = $estado;
        $this->precio = $precio;

    }

    function get_idUser(){
        return $this->idUser;
    }

    function get_fechaInicio(){
        return $this->fechaInicio;
    }

    function get_nombre(){
        return $this->nombre;
    }

    function get_nombreCreador(){
        return $this->nombreCreador;
    }

    function get_descripcion(){
        return $this->descripcion;
    }

    function get_estado(){
        return $this->estado;
    }

    function get_precio(){
        return $this->precio;
    }

    //COMPROBACIONES FORMULARIO
    function comprobNombre(){
        $cont1=0;

		if(strlen($this->nombre) < 4){
			$cont1++;
		}

		if(strlen($this->nombre) > 25){
			$cont1++;
		}

		return $cont1;
    }

    function comprobPrecio(){
        $cont1=0;

        //$soloNum = preg_match('^[0-9]*$', $this->precio);

        if(!is_numeric($this->precio) || substr($this->precio, 0,0) == "0" || strlen($this->precio) < 1 || strlen($this->precio) > 6 ){
            $cont1++;
        }

        return $cont1;
    }

    function comprobDescripcion(){
        $cont1=0;

		if(strlen($this->nombre) < 1){
			$cont1++;
		}

		if(strlen($this->nombre) > 300){
			$cont1++;
		}

		return $cont1;
    }

    function fecha(){ //Obtiene la fecha como string
        $fecha = date('Y-m-d');
        return $fecha;
    }
    
    //FUNCIONES DE BDD
    function proyectoExiste(){ //comprobar si el proyecto existe en la BDD

        $conexion = Conexion::conectarBD();
		$sql = "SELECT * FROM proyectos WHERE nombre='$this->nombre'"; //en caso de existir devuelve solo 1 linea.

		$boolExiste = false;
		$numLineasSql = $conexion->query($sql);
		$numLineasSql = $numLineasSql->num_rows;
		
			if($numLineasSql > 0){
				$boolExiste = true;
			}

        Conexion::desconectarBD($conexion);

		return $boolExiste;
	}

    function registrarProyecto(){ //Introduce el proyecto en la BDD
        $idUser = $this->idUser;
        $fechaInicio = $this->fechaInicio;
        $nombre = $this->nombre;
        $nombreCreador = $this->nombreCreador;
        $descripcion = $this->descripcion;
        $estado = $this->estado;
        $precio = $this->precio;

        $conexion = Conexion::conectarBD();
        $sql = "INSERT INTO proyectos (id_usr, fechainicio, nombre, nombrecreador, detalles, estado, precio) VALUES ('$idUser', '$fechaInicio','$nombre','$nombreCreador','$descripcion','$estado','$precio');";

        $boolError = false;

        if ($conexion->query($sql)) { //Ejecutar la sentencia y comprobarla al mismo tiempo.
            $boolError = true;
        }
    
        Conexion::desconectarBD($conexion);	
        return $boolError;
    }

    function get3Proyecto(){
        $arrayMulti = [];

        $conexion = Conexion::conectarBD();
        $sql = "SELECT * FROM proyectos";

        $result = $conexion->query($sql);

        if($result->num_rows > 0){
            $cont1 = 0;

            while($row = $result->fetch_assoc()){
                $arrayMulti[$cont1][0] = $row["nombre"];
                $arrayMulti[$cont1][1] = $row["detalles"];
                $cont1++;
            }
            return $arrayMulti;

        }
    }

}


?>