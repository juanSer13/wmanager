<?php
require("header.php");

// Obetener los datos de la BDD como un array
$proyecto1 = new Proyecto();
$usuario1 = new Usuario();
$arrayDatos = $proyecto1->getUnProyecto($_GET['p']);

if(isset($_GET['el'])){
    $proyecto1->borrarProyecto($_GET['el']);


?>

<main>

		<h1 class="tituloApartado" id="h1">Proyecto eliminado</h1>

        <form class="formRegistro formInicioSes" method="POST">
            <div>
                <p style="style='color:green'"><?php if(isset($_SESSION['nombre'])){echo "El proyecto ".$_GET['el']." se ha eliminado con éxito";} ?></p>
            </div>
            
            <div class="descProyecto">
            <a href="listaProyectos.php?p=Proyectos" class="botonEliminar">Volver a la lista</a>
            </div>
        </form>

        <br><br><br>
        <br><br><br>
</main>

<?php
}else{
?>

<main>

<h1 class="tituloApartado" id="h1"><?php echo $arrayDatos[0][0] ?></h1>

    <section>
        <article class="proyecto">
            <img src="img/edificio2.jpg">
            <br>
            <div class="descProyecto">
                <h3>Descripción:</h3>
                <p><?php echo $arrayDatos[0][1]?></p>

                <br>
                <h3>Fecha inicio: </h3>
                <p><?php echo $arrayDatos[0][2] ?></p>

                <br>
                <h3>Precio: </h3>
                <p><?php echo $arrayDatos[0][3]."€" ?></p>

                <br>
                <h3>Nombre creador:</h3>
                <p><?php echo $arrayDatos[0][4] ?></p>

                <br>
                <h3>Estado:</h3>
                <p><?php echo ucfirst($arrayDatos[0][5]) ?> </p>
                
            </div>

            <br><br>
            <div class="descProyecto">
            <a href="listaProyectos.php?p=Proyectos" class="botonEliminar">Volver</a>
            <br><br><br>

            <?php
                if(isset($_SESSION['haylog']) && $_SESSION['haylog'] == true && ($usuario1->esAdmin($_SESSION['nombre']) == 2)){
            ?>
            <a href="proyectoIndiv.php?p=<?php echo $arrayDatos[0][0] ?>&el=<?php echo $arrayDatos[0][0] ?>" class="botonEliminar">Eliminar</a>
            <?php
                }
            ?>
            </div>
            

        </article>
        
    </section>

</main>

<?php    
}
?>


<?php
require("footer.php");
?>