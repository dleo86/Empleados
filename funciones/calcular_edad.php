<?php
//fecha actual
function CalculaEdad( $fecha ){
   $dia=date("d");
   $mes=date("m");
   $anio=date("Y");

//fecha de nacimiento
   list($anionac,$mesnac,$dianac) = explode("-",$fecha);

//si el mes es el mismo pero el día inferior aun no ha cumplido años, le quitaremos un año al actual

   if (($mesnac == $mes) && ($dianac > $dia)) {
       $anio=($anio-1);
        }
//si el mes es superior al actual tampoco habrá cumplido años, por eso le quitamos un año al actual
   if ($mesnac > $mes) {
       $anio=($anio-1);
   }
//ya no habría mas condiciones, ahora simplemente restamos los años y mostramos el resultado como su edad
   $edad=($anio-$anionac);
   echo $edad;
  }
?>