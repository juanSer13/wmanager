<?php
    session_start();

    require("./lib/conexion.php");
    require("clasesFunc.php");


?>

<!DOCTYPE html>
<html>
<head>
	<title>Workman Manager: Inicio</title>

	<meta charset="utf-8">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/5e20b01124.js" crossorigin="anonymous"></script>
</head>

<body>
	<header>

        
		<nav>


            <div class="menuMov"> <!--Menú de navegación movil-->
                <label class="fas fa-bars iconoMenu"></label>
                <h2>Inicio</h2>
            </div>

            <ul class="menu1"> <!--Menú de navegación PC-->
                <a href="index.php?p=index"><li><label class="fas fa-home"></label> Inicio</li></a>
                <a href="listaProyectos.php?p=listaProyectos"><li><label class="fas fa-tasks"></label> Proyectos</li></a>
                <a href="contacto.php?p=contacto"><li><label class="fas fa-address-book"></label> Contacto</li></a>
            </ul>

            <div class="menuTitulo">
                <h1>WM</h1>
                <h2>Workman Manager</h2>
            </div> <!--Titulo PC-->

            <ul class="menu2"> <!--Menú de navegación 2 PC-->
                <a href="registro.php?=registro"><li>Registrarse</li></a>
                <a href="iniciarSesion.php?=iniciarSesion"><li>Iniciar Sesión</li></a>
            </ul>

        </nav>

        <div> <!--Menú de navegación movil-->
            <ul class="menu1mov ">
                <a href="index.php?p=index"><li><label class="fas fa-home"></label> Inicio</li></a>
                <a href="listaProyectos.php?p=listaProyectos"><li><label class="fas fa-tasks"></label> Proyectos</li></a>
                <a href="contacto.php?p=contacto"><li><label class="fas fa-address-book"></label> Contacto</li></a>
            </ul>
        </div>

        <div class="menuMovInf">
                <h2 class="nombreUser"><a href="registro.php?=registro"><label class="fas fa-user iconoUser"></label> USUARIO</a></h2>

                <h2 class="logo"><a href="#">WM</a></h2>

                <h2 class="login-register"><a href="iniciarSesion.php?=iniciarSesion">LOGIN</a></h2>
        </div>



		

	</header>
