<?php
function ControlesValidos(){
    $MensajeError='';
   
    $_POST['login']=trim($_POST['login']); //limpio espacios al login
    if (strlen($_POST['login'])<3){
        //la longitud del login es menor a 3 caracteres
        $MensajeError.='La longitud del usuario debe ser mayor a 3 caracteres <br />';
    }
  
    return $MensajeError;
}

function Activacion($User) {
    //aseguro el dato q voy a actualizar en la tabla: q sea 0 o 1.   && !mysqli_query($MiConexion, $sSQL)
        $MensajeError = 'Este correo ya ha sido registrado 2. <br />';
        $anio = date(Y);
        $hoy = date("Y-m-d H:i:s"); 
        $SQL = "UPDATE empleado SET Activo = 1 WHERE login= '{$User}'"; 
        
        $MiConexion = ConexionBD();
        if (!mysqli_query($MiConexion, $SQL)) {
            return false;
        } else {
            return true;
        } 
}

function DatosUsuarioCorrecto($User, $Pass) {
    $MensajeError='';
    $DatosUsuario = array();
    //genero la consulta sql con los parametros enviados
    //entre comillas simples cada parametro por ser cadenas
    //si fueran numeros no haria falta q lleven comillas simples
    $SQL = "SELECT login, clave FROM empleado WHERE login='$User' AND clave='$Pass'";
   
    $linkConexion = ConexionBD();
    $rs = mysqli_query($linkConexion, $SQL);
  
    $data = mysqli_fetch_array($rs);
    //si $data trajo algo, entonces cargo mis valores
    if ($data != false) {
        $DatosUsuario['login'] = utf8_encode($data['login']);
        $DatosUsuario['clave'] = $data['clave'];
        
        return $DatosUsuario;
    }else
        {
        $MensajeError='Usuario incorrecto o inactivo';
        return false;
    }
}

?>