<?php

class Usuario{ //El objeto que almacena los datos
	private $nombre;
	private $email;
    private $password;
    private $password2;
	private $edad;
	private $domicilio;
	private $codAdmin;


	function __construct($nombre = "",$email = "", $password = "", $password2 = "", $edad = "", $domicilio = "", $codAdmin = ""){
		$this->nombre = $nombre;
		$this->email = $email;
        $this->password = $password;
        $this->password2 = $password2;
		$this->edad = $edad;
		$this->domicilio = $domicilio;
		$this->codAdmin = $codAdmin;
	} //Constructor con las variables por defecto.

	function get_nombre(){
		return $this->nombre;
	}

	function get_email(){
		return $this->email;
	}

    function get_password(){
		return $this->password;
	}

	function get_password2(){
		return $this->password2;
	}

    function get_edad(){
		return $this->edad;
	}

	function get_domicilio(){
		return $this->domicilio;
	}

	function get_codAdmin(){
		return $this->codAdmin;
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

	function comprobEmail(){
		$cont1=0;

		if(filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
		}else{
			$cont1++;
		}

		return $cont1;
	}

	function comprobEmailAlt($email){//Version externa
		$this->email = $email;
		$cont1=0;

		if(filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
		}else{
			$cont1++;
		}

		return $cont1;
	}


	/*
	Debe contener 8 chars
	Debe contener al menos 1 numero
	Debe contener al menos una minuscula
	Debe contener al menos una mayuscula
	*/

	function comprobPass(){
		$cont1=0;

		$uppercase = preg_match('@[A-Z]@', $this->password);
		$lowercase = preg_match('@[a-z]@', $this->password);
		$number = preg_match('@[0-9]@', $this->password);

		if(!$uppercase || !$lowercase || !$number || strlen($this->password) < 8) {
			$cont1++;
		}

		return $cont1;
		
	}

	function comprobPassAlt($password){ //Versión externa.
		$this->password = $password;
		
		$cont1=0;

		$uppercase = preg_match('@[A-Z]@', $this->password);
		$lowercase = preg_match('@[a-z]@', $this->password);
		$number = preg_match('@[0-9]@', $this->password);

		if(!$uppercase || !$lowercase || !$number || strlen($this->password) < 8) {
			$cont1++;
		}

		return $cont1;
		
	}

	function comprobPass2(){
		$cont1=0;

		$uppercase = preg_match('@[A-Z]@', $this->password2);
		$lowercase = preg_match('@[a-z]@', $this->password2);
		$number = preg_match('@[0-9]@', $this->password2);

		if(!$uppercase || !$lowercase || !$number || strlen($this->password2) < 8) {
			$cont1++;
		}

		return $cont1;
		
	}

	function comprobEdad(){
		$cont1=0;

		$soloNum = preg_match("/^[0-9]+$/", $this->edad);

		if (!$soloNum || strlen($this->edad) < 1 || strlen($this->edad) > 2) {
			$cont1++;
		}

		return $cont1;
	}

	function comprobDomic(){
		$cont1=0;

		if(strlen($this->domicilio) < 1){
			$cont1++;
		}

		return $cont1;
	}

	//FUNCIONES DE BDD

	function emailExistente($email){ //comprobar si el email existe en la BDD
        $this->email = $email;

        $conexion = Conexion::conectarBD();
		$sql = "SELECT * FROM usuarios WHERE email='$this->email'"; //en caso de existir devuelve solo 1 linea.

		$boolExiste = false;

		$numLineasSql = $conexion->query($sql);
		$numLineasSql = $numLineasSql->num_rows;
		
			if($numLineasSql > 0){
				$boolExiste = true;
			}

        Conexion::desconectarBD($conexion);

		return $boolExiste;
	}

	function comprobAdmin(){ //Comprueba si el usuario es administrador al acertar el código secreto.
		$cod = 1;
		if($this->codAdmin == "DAW2021"){ //Codigo experimental
			$cod = 2;
		}
		return $cod;
	}

	function registrarUser(){ //Introduce el usuario en la BDD
		$esAdmin = $this->comprobAdmin(); //1 -> No admin 2-> Admin
		$nombre = $this->nombre;
		$email = $this->email;
		$password = $this->password;
		$edad = $this->edad;
		$domicilio = $this->domicilio;

        $conexion = Conexion::conectarBD();
        $sql = "INSERT INTO usuarios (nombre, email, pass, edad, domicilio, tipo) VALUES ('$nombre', '$email','$password','$edad','$domicilio','$esAdmin');";

        $boolError = false;

        if ($conexion->query($sql)) { //Ejecutar la sentencia y comprobarla al mismo tiempo.
            $boolError = true;
        }
    
        Conexion::desconectarBD($conexion);	
        return $boolError;
    }

	function comprobUserBD($email,$contraseña){ //Comprueba si el mail y contraseña introducidos concuerdan con los existentes en la BDD.
        $this->contraseña = $contraseña;
        $contra2 = "";
        $this->email = $email;
        $contadorFin=0;

        $conexion = Conexion::conectarBD();
        $sql ="SELECT pass FROM usuarios WHERE email='$this->email'"; //El mail ya se ha comprobado anteriormente en otra función.

        if ($resultadocontraseña = $conexion->query($sql)) {
            while ($fila = $resultadocontraseña->fetch_assoc()){
                $contra2 = $fila['pass'];
            }
            if($this->contraseña == $contra2){
				$contadorFin++;
			}
            Conexion::desconectarBD($conexion);
            return $contadorFin;
            
        }else{
            Conexion::desconectarBD($conexion);
            return $contadorFin;
        }
    }

	function meterUserSesion(){ //Saca el nombre de usuario a partir del email.
        $resultNombre = "";

        $conexion = Conexion::conectarBD();
        $sql ="SELECT "."*". " FROM usuarios WHERE email='$this->email'";
        $resultadoquery = $conexion->query($sql);

        while ($fila = $resultadoquery->fetch_assoc()){
            $resultNombre = $fila['nombre'];
            
        }

        Conexion::desconectarBD($conexion);
        return $resultNombre;
    }

	function meterIdUserSesion($email){ //Esta función mete el id del usuario en la sesión y se usa en la creación de proyectos
        $conexion = Conexion::conectarBD();
        $sql ="SELECT "."*". " FROM usuarios WHERE email='$email'";
        $resultadoquery = $conexion->query($sql);

        $fila = $resultadoquery->fetch_assoc();

        $_SESSION['idUser'] = $fila['id_usr'];

        Conexion::desconectarBD($conexion);

    }

	function getUnUsuario($indice1){ //Esta función recoge solo un proyecto.
        $arrayMulti = [];

        $conexion = Conexion::conectarBD();
        $sql = "SELECT * FROM usuarios WHERE nombre='$indice1'";

        $result = $conexion->query($sql);
        
        if($result->num_rows > 0){

            while($row = $result->fetch_assoc()){
                $arrayMulti[0][0] = $row["nombre"];
                $arrayMulti[0][1] = $row["email"];
                $arrayMulti[0][2] = $row["edad"];
                $arrayMulti[0][3] = $row["tipo"];
            }
        }

        Conexion::desconectarBD($conexion);	
        return $arrayMulti;
    }

	function esAdmin($indice1){ //Comprueba si el usuario es administrador.
        $resultNombre = 1;

        $conexion = Conexion::conectarBD();
        $sql ="SELECT "."*". " FROM usuarios WHERE nombre='$indice1'";
        $resultadoquery = $conexion->query($sql);

        while ($fila = $resultadoquery->fetch_assoc()){
            $resultNombre = $fila['tipo'];
            
        }

        Conexion::desconectarBD($conexion);
        return $resultNombre;
    }

}
?>