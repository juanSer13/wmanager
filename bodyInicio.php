<?php

$proyecto1 = new Proyecto();

$arrayDatos = $proyecto1->get3Proyecto();

$cont2 = 0;
$limite3 = 3;
?>

<main>

		<h1 class="tituloApartado">Últimos proyectos</h1>

		<section>

        <?php
        for($cont1 = 0; $cont1 < count($arrayDatos) ; $cont1++){
        ?>
            <article class="proyecto">
				<img src="img/breta1.jpeg">
                <h2><?php echo $arrayDatos[$cont1][0] ?></h2>
				
				<div class="descProyecto">
                    <h3>Descripción:</h3>
                    <p><?php echo $arrayDatos[$cont1][1] ?></p>
                </div>
			</article>

        <?php
        }
        ?>
		</section>

	</main>