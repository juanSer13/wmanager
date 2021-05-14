//NO FUNCIONA EL EXTERNO

function ponerFecha(){
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
}