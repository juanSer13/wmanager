<?php
require("header.php");


?>

    <main>

		<h1 class="tituloApartado">Lista de proyectos</h1>

        <div class="listaProyectos">
            
            <form>

                <table>
                    <tr class="encaTabla">
                        <td>NOMBRE</td>
                        <td min-width="300px">DESCRIPCIÓN</td>
                        <td>REALIZADO</td>
                        <td>ELIMINAR</td>
                        <td>VER</td>
                    </tr>
                    <tr>
                        <td>Proyecto hola hola hola hola hla</td>
                        <td>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eius, corporis quis autem laboriosam inventore enim veritatis aspernatur, quos debitis, iure neque dolor odio vel porro sint incidunt ea delectus doloremque!</td>
                        <td class="center"><label class="fas fa-times"></label></td>
                        <td class="center"><input type="checkbox"></td>
                        <td><a href="proyectoIndiv.php?=proyectoIndiv" class="botonVerProy">VER</a></td>
                    </tr>
                    <tr>
                        <td>Proyecto hola 2</td>
                        <td>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eius, corporis quis autem laboriosam inventore enim veritatis aspernatur, quos debitis, iure neque dolor odio vel porro sint incidunt ea delectus doloremque!</td>
                        <td class="center"><label class="fas fa-check"></label></td>
                        <td class="center"><input type="checkbox"></td>
                        <td><a href="proyectoIndiv.php?=proyectoIndiv" class="botonVerProy">VER</td>
                    </tr>
            </table>

            <input type="submit" value="Eliminar proyectos seleccionados" class="botonEliminar">   
            <a href="crearProyecto.php?=crearProyecto" class="botonEliminar botonCrear1">Crear nuevo proyecto</a>

            </form>

            
        </div>

		

	</main>


<?php
require("footer.php");
?>