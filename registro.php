<?php
require("header.php");

$nombre="";
$email="";
$password="";
$password2="";
$edad="";
$domicilio="";
$codAdmin="";

if(isset($_POST["registro"])){
    $nombre = htmlspecialchars(trim($_POST["nombre"]));
    $email = htmlspecialchars(trim($_POST["email"]));
    $password = htmlspecialchars(trim($_POST["password"]));
    $password2 = htmlspecialchars(trim($_POST["password2"]));
    $edad = htmlspecialchars(trim($_POST["edad"]));
    $domicilio = htmlspecialchars(trim($_POST["domicilio"]));
    $codAdmin = htmlspecialchars(trim($_POST["codAdmin"]));

    $usuario1 = new Usuario($nombre,$email,$password,$password2,$edad,$domicilio,$codAdmin); //objeto a comprobar

    $errorNombre="";

    if($usuario1->comprobNombre()){

    }else{
        $errorNombre = "Nombre no es correcto";
    }

    /*
    if(($usuario1->comprobForm()) == "sin errores"){ //clase usuario devuelve texto no bool
        echo "<p style='color:green;'>*No hay errores en el formulario</p>";
        if($usuario1->emailExistente($email)){
            echo "<p style='color:red;'>*El correo ya existe en la BDD</p>";
        }else{
            if($usuario1->registrarUser()){
                echo "<h1 color='green'>El usuario " . $nombre . " ha sido registrado con éxito.</h1>";
            }else{
                echo "<p color='red'><b>Ha ocurrido un error a la hora de registrar el usuario.</b></p>";
            }
        }
    }else{
        echo $usuario1->comprobForm();
    }*/


}
?>

<main>

<h1 class="tituloApartado">Registro</h1>

<form class="formRegistro" method="POST">
    <div>
        <label>Nombre: </label>
        <input type="text" name="nombre" value="">
        <p>*Hola, soy un error.</p>
    </div>

    <div>
        <label>Email: </label>
        <input type="text" name="email" value="">
        <p>*Hola, soy un error.</p>
    </div>

    <div>
        <label>Contraseña: </label>
        <input type="text" name="password" value="">
    </div>

    <div>
        <label>Repetir contraseña: </label>
        <input type="text" name="password2" value="">
    </div>

    <div>
        <label>Edad: </label>
        <input type="text" name="edad" value="">
    </div>

    <div>
        <label>Domicilio: </label>
        <input type="text" name="domicilio" value="">
    </div>
    
    <div>
        <label>Código administrador (opcional): </label>
        <input type="text" name="codAdmin" value="">
    </div>

    <div>
        <input type="submit" class="botonEnviar" name="registro" value="Registrar">
    </div>
    
</form>

</main>

<?php
require("footer.php");
?>