<?php
require("header.php");

//Variables para almacenar los datos del formulario.
$nombre="";
$email="";
$password="";
$password2="";
$edad="";
$domicilio="";
$codAdmin="";
//Variables para almacenar el texto de los errores de formato.
$errorNombre="";
$errorEmail="";
$errorPassword="";
$errorPassword2="";
$errorEdad="";
$errorDomicilio="";
$errorCodAdmin="";
//Variables para almacenar el texto de los errores de BDD.
$errorRepe="";
$errorInterno="";

if(isset($_POST["registro"])){
    $nombre = htmlspecialchars(trim($_POST["nombre"]));
    $email = htmlspecialchars(trim($_POST["email"]));
    $password = htmlspecialchars(trim($_POST["password"]));
    $password2 = htmlspecialchars(trim($_POST["password2"]));
    $edad = htmlspecialchars(trim($_POST["edad"]));
    $domicilio = htmlspecialchars(trim($_POST["domicilio"]));
    $codAdmin = htmlspecialchars(trim($_POST["codAdmin"]));

    $usuario1 = new Usuario($nombre,$email,$password,$password2,$edad,$domicilio,$codAdmin); //objeto a comprobar


    //Comprobaciones
    if($usuario1->comprobNombre()){
        $errorNombre = "*Nombre no es correcto";
    }

    if($usuario1->comprobEmail()){
        $errorEmail = "*Email no es correcto";
    }

    if($usuario1->comprobPass()){
        $errorPassword = "*Contraseña no es correcta";
    }

    if($usuario1->comprobPass2()){
        $errorPassword2 = "*Contraseña 2 no es correcta";
    }

    if($usuario1->comprobEdad()){
        $errorEdad = "*Edad no es correcta";
    }

    if($password != $password2){
        $errorDosContras = "*Las contraseñas no coinciden";
    }

    if($usuario1->comprobDomic()){
        $errorDomicilio = "*Domicilio no es correcto";
    }

    if($errorNombre == "" && $errorEmail == "" && $errorPassword == "" && $errorPassword2 == "" && $errorDosContras == "" && $errorEdad == "" && $errorDomicilio == ""){
        if($usuario1->emailExistente($email)){
            $errorRepe = "*El usuario ya existe en la BDD";
        }else{
            if($usuario1->registrarUser()){
                $errorInterno = "El usuario: ".$nombre." se ha registrado con éxito.";
            }else{
                $errorInterno = "*Ha ocurrido un error a la hora de registrar el usuario";
            }
        }
    }

}
?>

<main>

<h1 class="tituloApartado" id="h1">Registro</h1>

<form class="formRegistro" method="POST">
    <div>
        <label>Nombre (4 - 25 char): </label>
        <input type="text" name="nombre" value="<?php echo $nombre ?>">
        <?php if($errorNombre != ""){echo "<p>".$errorNombre."</p>";} ?>
    </div>

    <div>
        <label>Email: </label>
        <input type="text" name="email" value="<?php echo $email ?>">
        <?php if($errorEmail != ""){echo "<p>".$errorEmail."</p>";} ?>
    </div>

    <div>
        <label>Contraseña: </label>
        <input type="text" name="password" value="<?php echo $password ?>">
        <?php if($errorPassword != ""){echo "<p>".$errorPassword."</p>";} ?>
    </div>

    <div>
        <label>Repetir contraseña: </label>
        <input type="text" name="password2" value="<?php echo $password2 ?>">
        <?php if($errorPassword2 != ""){echo "<p>".$errorPassword2."</p>";} ?>
        <?php if($password != $password2){echo "<p>Las contraseñas no son iguales</p>";} ?>
    </div>

    <div>
        <label>Edad: </label>
        <input type="text" name="edad" value="<?php echo $edad ?>">
        <?php if($errorEdad != ""){echo "<p>".$errorEdad."</p>";} ?>
    </div>

    <div>
        <label>Domicilio: </label>
        <input type="text" name="domicilio" value="<?php echo $domicilio ?>">
        <?php if($errorDomicilio != ""){echo "<p>".$errorDomicilio."</p>";} ?>
    </div>
    
    <div>
        <label>Código administrador (opcional): </label>
        <input type="text" name="codAdmin" value="<?php echo $codAdmin ?>">
    </div>

    <div>
        <?php echo "<p style='color:red;'>".$errorRepe."</p>" ?>
        <?php echo "<p style='color:green;'>".$errorInterno."</p>" ?>
    </div>

    

    <div>
        <input type="submit" class="botonEnviar" name="registro" value="Registrar">
    </div>
    
</form>

</main>

<?php
require("footer.php");
?>