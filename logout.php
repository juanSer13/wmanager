<?php
require("header.php");


if(isset($_SESSION["haylog"]) && $_SESSION["haylog"] === true){
?>

<main>

		<h1 class="tituloApartado">Cerrar sesión</h1>

        <form class="formRegistro formInicioSes" method="POST">
            <div>
                <p style="style='color:green'"><?php if(isset($_SESSION['nombre'])){echo "La sesión de ".$_SESSION['nombre']." se ha cerrado con éxito.";} ?></p>
            </div>
            
            <div class="descProyecto">
            <a href="index.php?p=Inicio" class="botonEliminar">Volver al inicio</a>
            </div>
        </form>

        <br><br><br>
        <br><br><br>
</main>

<?php

    $_SESSION["nombre"] = "";
    $_SESSION["haylog"] = false;
    $_SESSION["email"] = "";
    $_SESSION["contraseña"] = "";

}else{
?>

<main>

		<h1 class="tituloApartado">Cerrar sesión</h1>

        <form class="formRegistro formInicioSes" method="POST">
            <div>
                <p style="style='color:green'"><?php if(isset($_SESSION['nombre'])){echo "No hay ninguna sesión iniciada.";} ?></p>
            </div>
            
            <div class="descProyecto">
            <a href="index.php?p=Inicio" class="botonEliminar">Volver al inicio</a>
            </div>
        </form>

        <br><br><br>
        <br><br><br>
</main>

<?php
}
?>



<?php
require("footer.php");
?>