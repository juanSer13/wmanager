<?php
    session_start();

    require("./lib/conexion.php");
    require("clasesFunc.php");
    require("clasesFuncProy.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title>WM: Workman Manager</title>

	<meta charset="utf-8">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet">
    <!--Font awesome ext-->
    <script src="https://kit.fontawesome.com/5e20b01124.js" crossorigin="anonymous"></script>
    <!--jQuery-->    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!--Fancy box-->
    <link rel="stylesheet" href="fancybox/source/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
    <script type="text/javascript" src="fancybox/source/jquery.fancybox.pack.js?v=2.1.5"></script>

    <!--Helpers-->
    <link rel="stylesheet" href="fancybox/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" type="text/css"
        media="screen" />
    <script type="text/javascript" src="fancybox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
    <script type="text/javascript" src="fancybox/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>

    <link rel="stylesheet" href="fancybox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" type="text/css"
        media="screen" />
    <script type="text/javascript" src="fancybox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>
    

    <!--JAVASCRIPT/JQUERY-->
    <script>
        
        $(document).ready(function () {

            var showMenu = false;

            //Mostrar o esconder la el menú de movil
            $("#menuBarras").ready(function(){
                $("#menuMovil").hide();
            });

            $("#menuBarras").click(function(){
                if(showMenu == false){
                    $("#menuMovil").show("fast");
                    showMenu = true;
                }else{
                    $("#menuMovil").hide("fast");
                    showMenu = false;
                }
            });


            //Tamaño de iconos footer dinámico
            $("#footerIcons1").mouseover(function(){
                $("#footerIcons1").animate({
                    fontSize: 85
                }, 400);
            });
            
            $("#footerIcons1").mouseleave(function(){
                $("#footerIcons1").animate({
                    fontSize: 55
                }, 400);
            });

            $("#footerIcons2").mouseover(function(){
                $("#footerIcons2").animate({
                    fontSize: 85
                }, 400);
            });
            
            $("#footerIcons2").mouseleave(function(){
                $("#footerIcons2").animate({
                    fontSize: 55
                }, 400);
            });

            $("#footerIcons3").mouseover(function(){
                $("#footerIcons3").animate({
                    fontSize: 85
                }, 400);
            });
            
            $("#footerIcons3").mouseleave(function(){
                $("#footerIcons3").animate({
                    fontSize: 55
                }, 400);
            });

            $("#footerIcons4").mouseover(function(){
                $("#footerIcons4").animate({
                    fontSize: 85
                }, 400);
            });
            
            $("#footerIcons4").mouseleave(function(){
                $("#footerIcons4").animate({
                    fontSize: 55
                }, 400);
            });

            $("#footerIcons5").mouseover(function(){
                $("#footerIcons5").animate({
                    fontSize: 85
                }, 400);
            });
            
            $("#footerIcons5").mouseleave(function(){
                $("#footerIcons5").animate({
                    fontSize: 55
                }, 400);
            });


            //Todos los h1
            $("#h1").ready(function(){
                $("#h1").css("opacity", "0");

                $("#h1").animate({
                    opacity: 1
                }, "slow");
            });

            //3 primeros proyectos

            $("#proy1").css("opacity", "0");
            $("#proy2").css("opacity", "0");
            $("#proy3").css("opacity", "0");

            $("#proy1").ready(function(){
                $("#proy1").animate({
                    opacity: 1
                }, 1200);
            });

            setTimeout(function () {
                $("#proy2").ready(function(){
                $("#proy2").animate({
                    opacity: 1
                }, 1200);
            });
            }, 800);

            setTimeout(function () {
                $("#proy3").ready(function(){
                $("#proy3").animate({
                    opacity: 1
                }, 1200);
            });    
            }, 800);

            

            //Lista de proyectos.

            $("#listaProyectos").ready(function(){
                $("#listaProyectos").css("opacity", "0");

                $("#listaProyectos").animate({
                    opacity: 1
                }, 1200);
            });


            //FECHA (DATE)
            var fecha = new Date();
            var diaSemana = fecha.getDay();
            var diaSemanaText = "";
            var diaMes = fecha.getDate();
            var mes = fecha.getMonth();
            var mesText = "";

            switch(diaSemana) {
                case 0:
                    diaSemanaText = "Lunes";    
                break;

                case 1:
                    diaSemanaText = "Martes";   
                break;

                case 2:
                    diaSemanaText = "Miercoles";   
                break;

                case 3:
                    diaSemanaText = "Jueves";   
                break;

                case 4:
                    diaSemanaText = "Viernes";   
                break;

                case 5:
                    diaSemanaText = "Sábado";   
                break;

                case 6:
                    diaSemanaText = "Domingo";   
                break;

                default:
                    diaSemanaText = "";
            }

            switch(mes){
                case 0:
                    mesText = "Enero";
                break;

                case 1:
                    mesText = "Febrero";
                break;

                case 2:
                    mesText = "Marzo";
                break;

                case 3:
                    mesText = "Abril";
                break;

                case 4:
                    mesText = "Mayo";
                break;

                case 5:
                    mesText = "Junio";
                break;

                case 6:
                    mesText = "Julio";
                break;

                case 7:
                    mesText = "Agosto";
                break;

                case 8:
                    mesText = "Septiembre";
                break;

                case 9:
                    mesText = "Octubre";
                break;

                case 10:
                    mesText = "Noviembre";
                break;

                case 11:
                    mesText = "Diciembre";
                break;

                default:
                    mesText = "";
            }

            document.getElementById("fechaActual").innerHTML = diaSemanaText + " " + diaMes + " de " + mesText;
            document.getElementById("footerInfoSubFecha").style.paddingBottom = "0px";
            document.getElementById("footerInfoSubFecha").style.paddingTop = "0px";


            //POSICION (AJAX)

            //Variables de localización;
            var latitud;
            var longitud;
            var hayUbicacion = false;
            var tiempo;
            var ciudad;
            var hayUbicacionFinal = false;

            //Función que devuelve la latitud y longitud desde el navegador.
            function localizar() {
                navigator.geolocation.getCurrentPosition(Ubicacion, error);

                function Ubicacion(posicion) {
                    latitud = posicion.coords.latitude;
                    longitud = posicion.coords.longitude;

                    hayUbicacion = true;
                    //alert("Longitud: " + longitud);
                    //alert("Latitud: " + latitud);
                }

                function error() {
                    alert("No pudimos encontrar tu ubicación exacta");
                    hayUbicacion = false;
                }
            }

            //Esta funcion usa la latitud y longitud para obtener los datos de la api externa.
            function localizar2() {
                $.ajax({
                        type: "GET",
                        url: 'http://api.openweathermap.org/data/2.5/weather?lat=' + latitud + '&lon=' +
                            longitud + "&units=metric&appid=9f50a805aa0089a1edd1829a5db029f0",
                        dataType: "jsonp"
                    })

                    .done(function (data) {
                        //alert("Correcto. La longitud es: " + longitud + " y la latitud es " + latitud);
                        console.log(data);
                        tiempo = data.main.temp;
                        ciudad = data.name;
                        hayUbicacionFinal = true;

                        $("#datosAjax").text(ciudad.toUpperCase() + " - Hacen " + tiempo + " °C");

                        //$('<label/>', {
                          //  id: "ubiIco"
                        //}).before('#datosAjax');

                        //$("#ubiIco").addClass("fas fa-map-marker-alt");
                        //alert("En " + ciudad + " hace " + tiempo + " grados");
                    })

                    .fail(function () {
                        hayUbicacionFinal = false;
                        alert("Fallo en la conexión con el servidor del tiempo");
                    })
            }

            $("#datosAjax").ready(function(){
               
                
            //Obtener latitud y longitud
            localizar();

            //Obtener localización y temperatura
            setTimeout(function () {
                localizar2();
            }, 3000);

            });


            crearGaleria();

            function crearGaleria(){
                //GALERIA FANCYBOX

            $('<h2/>', {
                    text: "GALERÍA"
                }).appendTo('#div1');

                $('<div/>', {
                    id: "galPrin",
                }).appendTo('#div1');

                $("#galPrin").addClass("galeria");

                $('<a/>', {
                    id: "linkImg1",
                    href: "img/edificioGal1.jpg",
                    rel: "galPrin",
                    title: "Edificio proyecto 1"
                }).appendTo('#galPrin');

                $('<img/>', {
                    id: "img1",
                    src: "img/edificioGal1.jpg"
                }).appendTo('#linkImg1');

                $('<a/>', {
                    id: "linkImg2",
                    href: "img/edificioGal2.jpg",
                    rel: "galPrin",
                    title: "Edificio proyecto 2"
                }).appendTo('#galPrin');

                $('<img/>', {
                    id: "img2",
                    src: "img/edificioGal2.jpg"
                }).appendTo('#linkImg2');

                $('<a/>', {
                    id: "linkImg3",
                    href: "img/edificioGal3.jpg",
                    rel: "galPrin",
                    title: "Edificio proyecto 3"
                }).appendTo('#galPrin');

                $('<img/>', {
                    id: "img3",
                    src: "img/edificioGal3.jpg"
                }).appendTo('#linkImg3');

                $('<a/>', {
                    id: "linkImg4",
                    href: "img/edificioGal4.jpg",
                    rel: "galPrin",
                    title: "Edificio proyecto 4"
                }).appendTo('#galPrin');

                $('<img/>', {
                    id: "img4",
                    src: "img/edificioGal1.jpg"
                }).appendTo('#linkImg4');

                $("#galPrin a").fancybox({

                    openEffect: 'fade',
                    closeEffect: 'fade',
                    closeBtn: true,
                    helpers: {
                        title: 'over'
                    },
                    thumbs: {
                        width: 50
                    },
                    buttons: {},
                    changeSpeed: 12000,
                    overlay: {
                        css: {
                            'background': 'rgba(0,0,0,0.5)'
                        }
                    }
                });
            }

        });

    </script>

</head>

<!--PHP-->

<body>
	<header>
        
		<nav>

            <div class="menuMov" id="menuBarras"> <!--Menú de navegación movil-->
                <label class="fas fa-bars iconoMenu"></label>
                <h2><?php echo $_GET['p'] ?></h2>
            </div>

            <ul class="menu1"> <!--Menú de navegación PC-->
                <a href="index.php?p=Inicio"><li><label class="fas fa-home"></label> Inicio</li></a>
                <a href="listaProyectos.php?p=Proyectos"><li><label class="fas fa-tasks"></label> Proyectos</li></a>
                <?php
                if(isset($_SESSION['haylog']) && $_SESSION['haylog'] == true){
                ?>
                <a href="contacto.php?p=Usuario"><li><label class="fas fa-address-book"></label> Usuario</li></a>
                <?php
                }else{
                ?>
                <a href="contactoNoUser.php?p=Contacto"><li><label class="fas fa-address-book"></label> Contacto</li></a>
                <?php    
                }
                ?>

            </ul>

            <div class="menuTitulo">
                <h1>WM</h1>
                <h2>Workman Manager</h2>
            </div> <!--Titulo PC-->

            <ul class="menu2"> <!--Menú de navegación 2 PC-->
                
                <?php
                if(isset($_SESSION['haylog']) && $_SESSION['haylog'] == true){
                ?>

                <li><?php echo $_SESSION['nombre'] ?></li>
                <a href="logout.php?p=Cerrar sesión"><li>Cerrar sesión</li></a>
                
                <?php
                }else{
                ?>
                
                <a href="registro.php?=Registro"><li>Registrarse</li></a>
                <a href="iniciarSesion.php?=Iniciar sesión"><li>Iniciar Sesión</li></a>
                <?php
                }
                ?>

                
            </ul>

        </nav>

        <div id="menuMovil"> <!--Menú de navegación movil-->
            <ul class="menu1mov">
                <a href="index.php?p=Inicio"><li><label class="fas fa-home"></label> Inicio</li></a>
                <a href="listaProyectos.php?p=Proyectos"><li><label class="fas fa-tasks"></label> Proyectos</li></a>
                <?php
                if(isset($_SESSION['haylog']) && $_SESSION['haylog'] == true){
                ?>
                <a href="contacto.php?p=Usuario"><li><label class="fas fa-address-book"></label> Usuario</li></a>
                <?php
                }else{
                ?>
                <a href="contactoNoUser.php?p=Contacto"><li><label class="fas fa-address-book"></label> Contacto</li></a>
                <?php    
                }
                ?>
            </ul>
        </div>

        <div class="menuMovInf">
            <?php
                if(isset($_SESSION['haylog']) && $_SESSION['haylog'] == true){
            ?>

                <h2 class="nombreUser"><a><label class="fas fa-user iconoUser"></label><?php echo ucfirst($_SESSION['nombre']) ?></a></h2>

                <h2 class="logo"><a href="#">WM</a></h2>

                <h2 class="login-register"><a href="logout.php?p=Cerrar sesión">LOGOUT</a></h2>
                
            <?php
                }else{
            ?>
                <h2 class="nombreUser"><a href="registro.php?p=Registro"><label class="fas fa-user iconoUser"></label> REGISTRO</a></h2>

                <h2 class="logo"><a href="#">WM</a></h2>

                <h2 class="login-register"><a href="iniciarSesion.php?p=Inciar sesión">LOGIN</a></h2>
            <?php
                }
            ?>
        </div>

	</header>
    
