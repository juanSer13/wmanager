<?php
require("header.php");

//Variables para almacenar los datos del formulario.
$email = "";
$password = "";
//Variables para almacenar el texto de los errores de formato.
$errorEmail="";
$errorPassword="";
//Variables para almacenar el texto de los errores de BDD.
$errorExistente="";
$errorNoMatch="";
$todoCorrecto="";

if(isset($_SESSION["haylog"]) && $_SESSION["haylog"] === true){

?>


<main>

		<h1 class="tituloApartado" id="h1">Iniciar sesión</h1>

        <form class="formRegistro formInicioSes" method="POST">
            <div>
                <p style="style='color:green'"><?php if(isset($_SESSION['nombre'])){echo "Ya se ha iniciado sesión como ".$_SESSION['nombre']." anteriormente.";} ?></p>
            </div>
            
            <div class="descProyecto">
            <a href="index.php?p=Inicio" class="botonEliminar">Volver al inicio</a>
            </div>
        </form>

        <br><br><br>
        <br><br><br>
</main>


<?php


}else{

if(isset($_POST['login'])){
    $usuarioAux1 = new Usuario();

    $email = htmlspecialchars(trim($_POST['email']));
 	$password = htmlspecialchars(trim($_POST['password']));


    if($usuarioAux1->comprobEmailAlt($email)){
        $errorEmail = "*Email no es correcto";
    }

    if($usuarioAux1->comprobPassAlt($password)){
        $errorPassword = "*Contraseña no válida.";
    }

    if($errorEmail == "" && $errorPassword == ""){
        if($usuarioAux1->emailExistente($email)){
            if($usuarioAux1->comprobUserBD($email,$password)){
                $usuarioAux1->meterIdUserSesion($email);
                $_SESSION['nombre'] = $usuarioAux1->meterUserSesion();
                $_SESSION['haylog'] = true;
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                $todoCorrecto = "El usuario ". $_SESSION['nombre'] ." ha iniciado sesión correctamente.";
            }else{
                $errorNoMatch = "*El usuario o contraseña no son correctos";
            }
        }else{
            $errorExistente = "*El usuario no existe en la base de datos";
        }
    }
}

?>

    <main>

		<h1 class="tituloApartado" id="h1">Iniciar sesión</h1>

        <form class="formRegistro formInicioSes" method="POST">
            <div>
                <label>Correo electrónico: </label>
                <input type="text" name="email" value="<?php echo $email ?>">
                <?php if($errorEmail != ""){echo "<p>".$errorEmail."</p>";} ?>
            </div>

            <div>
                <label>Contraseña: </label>
                <input type="text" name="password" value="<?php echo $password ?>">
                <?php if($errorPassword != ""){echo "<p>".$errorPassword."</p>";} ?>
            </div>

            <div>
                <?php if($errorExistente){echo "<p>".$errorExistente."</p>";} ?>
                <?php if($errorNoMatch){echo "<p>".$errorNoMatch."</p>";} ?>
                <?php if($todoCorrecto){echo "<p style='color:green;'>".$todoCorrecto."</p>";} ?>
            </div>

            <div>
                <input type="submit" class="botonEnviar" name="login" value="Iniciar">
            </div>
            
        </form>

		

	</main>

<?php

}

?>

<?php
require("footer.php");
?>