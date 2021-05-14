<?php
require("header.php");

// Obetener los datos de la BDD como un array
$usuario1 = new Usuario();
$arrayDatos = $usuario1->getUnUsuario($_SESSION['nombre']);


if(isset($_SESSION['haylog']) && $_SESSION['haylog'] == true){
?>


<main>

<h1 class="tituloApartado" id="h1">Usuario</h1>

    <section>
        <article class="proyecto">
            <img src="img/breta1.jpeg">
            <br>
            <div class="descProyecto">
                <h3>Nombre:</h3>
                <p><?php echo $arrayDatos[0][0]?></p>

                <br>
                <h3>Email: </h3>
                <p><?php echo $arrayDatos[0][1] ?></p>

                <br>
                <h3>Edad: </h3>
                <p><?php echo $arrayDatos[0][2]." años" ?></p>

                <br>
                <h3>Tipo: </h3>
                <p><?php if($arrayDatos[0][3] == 1){echo "Trabajador";}else{echo "Administrador";}  ?></p>
                
            </div>

            <br><br>
            <div class="descProyecto">
            <a href="listaProyectos.php?p=Proyectos" class="botonEliminar botonCrear1">Volver</a>
            </div>
            

        </article>

        <br><br><br>
        
    </section>



</main>



<?php
}else{
?>

<main>

		<h1 class="tituloApartado" id="h1">Usuario</h1>

        <form class="formRegistro formInicioSes" method="POST">
            <div>
                <p style="style='color:red'"><?php if(isset($_SESSION['nombre'])){echo "No hay ningún usuario activo";} ?></p>
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