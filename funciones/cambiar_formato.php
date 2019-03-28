<?php
function Formato($Fecha_Nacimiento){
    
    $anio = substr($Fecha_Nacimiento, 0,4);
    $mes = substr($Fecha_Nacimiento, 5,3);
    $dia = substr($Fecha_Nacimiento, 8,2);
    
    echo $dia . '/' . $mes . $anio;
}
?>