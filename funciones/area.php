<?php
   
 function area($empleado){
    //$empleado = array();
  if(!empty($empleado)){
     switch($empleado){
      case '1':
        echo "Finanzas";
        break;
      case '2':
        echo "Ventas";
        break;
      case '3':
        echo "Legales";
        break;
      case '4':
        echo "Atencion";
        break;  
     }
   }
}

   
?>
