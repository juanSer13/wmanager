<?php
require("header.php");

$proyecto1 = new Proyecto();
$usuario1 = new Usuario();

//Variables del objeto
$idUser ="";
$fechaInicio="";
$nombreProyecto="";
$nombreCreador="";
$descripcion="";
$estadoProyecto="";
$presupuesto="";
//Variables para almacenar el texto de errores de formato.
$errorNombreProyecto="";
$errorPresupuesto="";
$errorDescripcion="";
//Variables para almacenar el texto de errores de BDD.
$errorExiste="";
$errorRegistro="";
$todoCorrecto="";

if(isset($_POST['crearProyecto'])){
    $nombreProyecto = htmlspecialchars(trim($_POST["nombreProyecto"]));
    $descripcion = htmlspecialchars(trim($_POST["descripcion"]));
    $presupuesto = htmlspecialchars(trim($_POST["presupuesto"]));
    $nombreCreador = $_SESSION['nombre'];
    $idUser = $_SESSION['idUser'];
    $fechaInicio = $proyecto1->fecha();
    $estadoProyecto = "en progreso"; //pendiente, en progreso, completado  //No integrado.

    $proyecto1 = new Proyecto($idUser,$fechaInicio,$nombreProyecto,$nombreCreador,$descripcion,$estadoProyecto,$presupuesto);

    if($proyecto1->comprobNombre()){
        $errorNombreProyecto = "*El nombre de proyecto introducido no es válido";
    }

    if($proyecto1->comprobPrecio()){
        $errorPresupuesto = "*El presupuesto introducido no es válido";
    }

    if($proyecto1->comprobDescripcion()){
        $errorDescripcion = "*La descripción introducida no es válida";
    }

    if($errorNombreProyecto == "" && $errorPresupuesto == "" && $errorDescripcion == ""){
        if($proyecto1->proyectoExiste()){
            $errorExiste = "*El proyecto ya existe en la BDD";
        }else{
            if($proyecto1->registrarProyecto()){
                $todoCorrecto = "El proyecto ".$nombreProyecto." se ha creado con éxito.";
            }else{
                $errorRegistro = "*Ha ocurrido un error al introducir el proyecto en la BDD";
            }
        }
    }

}
?>

<?php
    if(isset($_SESSION['haylog']) && $_SESSION['haylog'] == true && ($usuario1->esAdmin($_SESSION['nombre']) == 2)){
?>



<main>

<h1 class="tituloApartado">Crear nuevo proyecto</h1>

<form class="formRegistro" method="POST">
    <div>
        <label>Nombre proyecto (4 - 15 char): </label>
        <input type="text" name="nombreProyecto" value="<?php echo $nombreProyecto ?>">
        <?php if($errorNombreProyecto != ""){echo "<p>".$errorNombreProyecto."</p>";} ?>
    </div>

    <div>
        <label>Presupuesto (€): </label>
        <input type="text" name="presupuesto" value="<?php echo $presupuesto ?>">
        <?php if($errorPresupuesto != ""){echo "<p>".$errorPresupuesto."</p>";} ?>
    </div>

    <div>
        <label>Descripción (200 char max): </label>
        <textarea name="descripcion"><?php echo $descripcion ?></textarea>
        <?php if($errorDescripcion != ""){echo "<p>".$errorDescripcion."</p>";} ?>
    </div>

    <div>
        <?php echo "<p style='color:red;'>".$errorExiste."</p>" ?>
        <?php echo "<p style='color:red;'>".$errorRegistro."</p>" ?>
        <?php echo "<p style='color:green;'>".$todoCorrecto."</p>" ?>
    </div>

    

    <div>
        <input type="submit" class="botonEnviar" name="crearProyecto" value="Crear Proyecto">
    </div>
    
</form>

</main>

<?php
    }else{
?>

<main>

		<h1 class="tituloApartado">Crear proyecto</h1>

        <form class="formRegistro formInicioSes" method="POST">
            <div>
                <p style="style='color:red'"><?php echo "El usuario no tiene permiso para crear proyectos." ?></p>
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