<?php

function Listar(){
    $Listado=array();
    //me conecto
    $MiConexion=ConexionBD();
    //si todo es correcto...
    if ($MiConexion!=false){
        //le paso la consulta que necesito
        $SQL = "SELECT login, nombre, apellido FROM empleado WHERE login = '{$_SESSION['Login']}'";
        //genera el conjunto de registros que devuelve la consulta
        $rs = mysqli_query($MiConexion, $SQL);
        $i=0;  //armo el listado para devolverlo y usarlo en el otro script
        while ($data = mysqli_fetch_array($rs)) {
            $Listado[$i]['login'] = $data['login'];
            $Listado[$i]['nombre'] = $data['nombre'];
            $Listado[$i]['apellido'] = $data['apellido'];
           
            $i++;
        }
    }
    return $Listado;
}
    


?>