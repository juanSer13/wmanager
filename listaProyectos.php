<?php
require("header.php");

// Obetener los datos de la BDD como un array
$proyecto1 = new Proyecto();
$usuario1 = new Usuario();
// Limita de registros por página

$arrayDatos = $proyecto1->getTodos();

if(sizeof($arrayDatos) > 0){
?>

<main>

<h1 class="tituloApartado">Lista de proyectos</h1>

<div class="listaProyectos">
    
    <form>

        <table>
            <tr class="encaTabla">
                <td>NOMBRE</td>
                <td min-width="300px">DESCRIPCIÓN</td>
                <td>INICIO</td>
                <td>PRESUPUESTO</td>
                <td>VER</td>
            </tr>

            <?php
            for($cont1 = 0 ; $cont1 < sizeof($arrayDatos) ; $cont1++){
            ?>

            <tr>
                <td><?php echo $arrayDatos[$cont1][0] ?></td>
                <td><?php echo $arrayDatos[$cont1][1] ?></td>
                <td class="center"><?php echo $arrayDatos[$cont1][2] ?></td>
                <td class="center"><?php echo $arrayDatos[$cont1][3]."€" ?></td>
                <td><a href="proyectoIndiv.php?p=<?php echo $arrayDatos[$cont1][0]?>" class="botonVerProy">VER</a></td>
            </tr>

            <?php
            }
            ?>

    </table>

    <?php
    if(isset($_SESSION['haylog']) && $_SESSION['haylog'] == true && ($usuario1->esAdmin($_SESSION['nombre']) == 2)){
    ?>

    <br><br>  
    <a href="crearProyecto.php?p=Crear proyecto" class="botonEliminar botonCrear1">Crear nuevo proyecto</a>

    <?php
    }
    ?>
    </form>

    
</div>

</main>

<?php
}else{
?>

<main>

		<h1 class="tituloApartado">Lista de proyectos</h1>

        <form class="formRegistro formInicioSes" method="POST">
            <div>
                <p style="text-align:center;color:yellow;"><?php if(isset($_SESSION['nombre'])){echo "No hay proyectos que mostrar actualmente, solo los administradores pueden crear nuevos proyectos.";} ?></p>
            </div>

            <?php
            if(isset($_SESSION['haylog']) && $_SESSION['haylog'] == true && ($usuario1->esAdmin($_SESSION['nombre']) == 2)){
            ?>
            <div>
                <a href="crearProyecto.php?p=Crear proyecto" class="botonEliminar">Crear nuevo proyecto</a>
            </div>
            <?php
            }else{
            ?>
            <div>
                <a href="registro.php?p=Registro" class="botonEliminar">Registrarse</a>
            </div>
            <?php
            }
            ?>
        </form>

        <br><br><br><br>
        <br><br><br><br>
        
</main>


<?php
}

?>




<?php
require("footer.php");
?>