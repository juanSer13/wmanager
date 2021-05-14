<?php

$proyecto1 = new Proyecto();
$usuario1 = new Usuario();
$arrayDatos = $proyecto1->get3Proyecto();
$contId = 1;
?>

<main>

		<h1 class="tituloApartado" id="h1">Últimos proyectos</h1>

        <?php
        if(sizeof($arrayDatos) < 1){
        ?>
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

        <br><br><br>
        <br><br><br>
        
        <?php
        }else{
        ?>

        <section>

        <?php
        for($cont1 = 0; $cont1 < count($arrayDatos) ; $cont1++){
        ?>
            <article class="proyecto" id="proy<?php echo $contId ?>">
				<img src="img/edificio2.jpg">
                <h2><?php echo $arrayDatos[$cont1][0] ?></h2>
				
				<div class="descProyecto">
                    <h3>Descripción:</h3>
                    <p style="font-size:20px"><?php echo $arrayDatos[$cont1][1] ?></p>
                </div>
			</article>

        <?php
        $contId++;
        }
        ?>
		</section>

        <?php
        if(count($arrayDatos) < 1){
        ?>
        <br><br>
        <?php
        }
        ?>


        <?php
        }
        ?>

	</main>