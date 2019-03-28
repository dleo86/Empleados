<?php
   
   function total(){
   $Listado = array();
   //$cant = count($Listado);
   $mes = date("m");
    $SQL = "SELECT * FROM empleado WHERE MONTH(fechaNacimiento)='{$mes}'";
    //genero la conexion
    $linkConexion = ConexionBD();
    $rs = mysqli_query($linkConexion, $SQL);
    //por ser un solo registro el q debo traer, no aplico while
    $data = mysqli_fetch_array($rs);
    $i = 0;
    if ($data != false) {
            
        do {
            $Listado[$i]['fechaNacimiento'] = $data['fechaNacimiento'];
            $Listado[$i]['nombre'] = utf8_encode($data['nombre']);
            $Listado[$i]['apellido'] = utf8_encode($data['apellido']);
            $Listado[$i]['login'] = utf8_encode($data['login']);
            $Listado[$i]['idArea'] = $data['idArea'];
            $i++;
        }while ($data = mysqli_fetch_array($rs));
        return $Listado;
      }
     else{
         return 0;
      }   
}

   
?>
