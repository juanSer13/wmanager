<?php

class Usuario{
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
	}

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

	function comprobNombre(){
		$cont1=0;

		if(preg_match('/^[A-Za-z0-9!#$%&"*+/=?^_`{|}~\,.@()<>[]-]*$',$this->nombre)){
			$cont1++;
		}

		return $cont1;
	}

	/*
	function comprobForm(){
		$textoError = "<p style='color:red;'><b>Los siguientes campos son incorrectos:</b></p>";
        $cont1 = 0;

		if(strlen($this->nombre) == 0){
			$textoError = $textoError . "<p style='color:red;'>No se ha introducido un nombre.</p>";
			$cont1++;
		}
		if(strlen($this->nombre) < 3){
			$textoError = $textoError . "<p style='color:red;'>El nombre tiene menos de 3 chars</p>";
			$cont1++;
		}
        if(($this->password) != ($this->password2)){
			$textoError = $textoError . "<p style='color:red;'>Las contraseñas no son iguales</p>";
			$cont1++;
		}else{
			if(strlen($this->password) == 0){
				$textoError = $textoError . "<p style='color:red;'>No se ha introducido la contraseña 1</p>";
				$cont1++;
			}
            if(strlen($this->password2) == 0){
                $textoError = $textoError . "<p style='color:red;'>No se ha introducido la contraseña 2</p>";
				$cont1++;
            }
		}
		if(strlen($this->email) == 0){
			$textoError = $textoError . "<p style='color:red;'>No se ha introducido un correo.</p>";
			$cont1++;
		}

        if (preg_match('/^[(a-z0-9\_\-\.)]+@[(a-z0-9\_\-\.)]+\.[(a-z)]{2,15}$/i',$this->email)){
        }else{
            $textoError = $textoError . "<p style='color:red;'>El formato del correo no es correcto.</p>";
			$cont1++;
        }
								
		if ($cont1 > 0) {
			return $textoError;
		}else{
			$textoError = "sin errores";
			return $textoError;
		}
	}
	*/

}
?>