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

		if(strlen($this->descripcion) < 1){
			$cont1++;
		}

		if(strlen($this->descripcion) > 200){
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

    function get3Proyecto(){ //Esta funcion solo recoge 2 apartados de la linea y las devuelve en un array adaptable
        $arrayMulti = [];

        $conexion = Conexion::conectarBD();
        $sql = "SELECT * FROM proyectos LIMIT 3";

        $result = $conexion->query($sql);

        if($result->num_rows > 0){
            $cont1 = 0;

            while($row = $result->fetch_assoc()){
                $arrayMulti[$cont1][0] = $row["nombre"];
                $arrayMulti[$cont1][1] = $row["detalles"];
                $cont1++;
            }
        }

        Conexion::desconectarBD($conexion);	
        return $arrayMulti;
    }

    function getTodos(){ //Esta función reune cada apartado de las lineas
        $arrayMulti = [];

        $conexion = Conexion::conectarBD();
        $sql = "SELECT * FROM proyectos";

        $result = $conexion->query($sql);
        
        if($result->num_rows > 0){
            $cont1 = 0;

            while($row = $result->fetch_assoc()){
                $arrayMulti[$cont1][0] = $row["nombre"];
                $arrayMulti[$cont1][1] = $row["detalles"];
                $arrayMulti[$cont1][2] = $row["fechainicio"];
                $arrayMulti[$cont1][3] = $row["precio"];
                
                $cont1++;
            }
        }

        Conexion::desconectarBD($conexion);	
        return $arrayMulti;
    }

    function getUnProyecto($indice1){ //Esta función recoge solo un proyecto.
        $arrayMulti = [];

        $conexion = Conexion::conectarBD();
        $sql = "SELECT * FROM proyectos WHERE nombre='$indice1'";

        $result = $conexion->query($sql);
        
        if($result->num_rows > 0){

            while($row = $result->fetch_assoc()){
                $arrayMulti[0][0] = $row["nombre"];
                $arrayMulti[0][1] = $row["detalles"];
                $arrayMulti[0][2] = $row["fechainicio"];
                $arrayMulti[0][3] = $row["precio"];
                $arrayMulti[0][4] = $row["nombrecreador"];
                $arrayMulti[0][5] = $row["estado"];
            }
        }

        Conexion::desconectarBD($conexion);	
        return $arrayMulti;
    }

    function getTodos2(){
        $arrayMulti = [];

        $inicio = 0;
        $cuantos = 5;
        $anterior = 0;
        $siguiente = 0;

            if(isset($_GET['cont'])){
	            $inicio=$_GET['cont'];
            }

            if($inicio == 0){
                echo "<h2>Mostrando los comentarios " . ($inicio + 1) . " a " . ($inicio + $cuantos) . " desde los más recientes hacia atrás </h2>";
            }else{
                echo "<h2>Mostrando los comentarios " . $inicio . " a " . ($inicio + $cuantos) . " desde los más recientes hacia atrás </h2>";
            }
        

	    $conexion = Conexion::conectarBD();
   	    $result2 = $conexion->query("Select count(*) AS allCom FROM proyectos");
	    $result = $conexion->query("SELECT * FROM proyectos limit $inicio,$cuantos;");

	    $columnas = $result->field_count;
	    $campos = $result->fetch_fields();

	    $filas = $result->num_rows;
	    $fila2 = $result2->fetch_assoc();
	    $totalfilas = $fila2['allCom'];

            while($fila = $result->fetch_assoc()){ //Recorrer filas;
		        foreach($fila as $indice=>$valor){ //Recorrer horizontalmente.

                if($indice == "nombre"){
                    $arrayMulti[$indice][0] = $valor;
                }

			    if($indice == "detalles"){
				    $arrayMulti[$indice][1] = $valor;
			    }

			    if($indice == "fechainicio"){
			        $arrayMulti[$indice][2] = $valor;
			    }

                if($indice == "precio"){
			        $arrayMulti[$indice][3] = $valor;
			    }
		    }

		    echo "<br>";
	        }

            if($inicio+$cuantos<$totalfilas){
	            $siguiente = $inicio+$cuantos;
            }else{
	            $siguiente = $inicio;
            }

            if($inicio-$cuantos>=0){
		        $anterior = $inicio-$cuantos;
	        }else{
		        $anterior = $inicio;
	        }

            //$arrayMulti[sizeof($arrayMulti) + 1][0] = $anterior;
            //$arrayMulti[sizeof($arrayMulti) + 1][0] = $siguiente;

            echo "<a href='listaProyectos.php?cont=$anterior' style='color:black; text-decoration:underline'>Ver anteriores</a> ";
            echo "<a href='listaProyectos.php?cont=$siguiente' style='color:black; text-decoration:underline'>Ver siguientes</a>";

            Conexion::desconectarBD($conexion);
            return $arrayMulti;
    }

    function borrarProyecto($indice1){
        $conexion = Conexion::conectarBD();
        $sql = "DELETE FROM proyectos WHERE nombre='$indice1';";

        $boolError = false;

        if ($conexion->query($sql)) { //Ejecutar la sentencia y comprobarla al mismo tiempo.
            $boolError = true;
        }
    
        Conexion::desconectarBD($conexion);	
        return $boolError;
    }

}


?>