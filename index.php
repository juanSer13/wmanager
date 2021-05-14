<?php //Estructura principal.

    if(!isset($_GET['p'])){$_GET['p'] = "Inicio";} //Menú coge p para el texto, esto se aplica 1 vez.
    
    require("./header.php"); 
    require("./bodyInicio.php"); 
    require("./footer.php");
?>