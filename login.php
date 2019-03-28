<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Login</title>
        <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no">
        <link rel="shortcut icon" href="favicon_16.ico"/>
        <link rel="bookmark" href="favicon_16.ico"/>
        <!-- site css -->
        <link rel="stylesheet" href="dist/css/site.min.css">
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,800,700,400italic,600italic,700italic,800italic,300italic" rel="stylesheet" type="text/css">
        <!-- <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'> -->
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
        <!--[if lt IE 9]>
          <script src="js/html5shiv.js"></script>
          <script src="js/respond.min.js"></script>
        <![endif]-->
        <script type="text/javascript" src="dist/js/site.min.js"></script>
        <style>
            body {
                padding-top: 40px;
                padding-bottom: 40px;
                background-color: #303641;
                color: #C1C3C6
            }
        </style>
        <?php
         session_start();
         require_once 'funciones/funciones_conexion.inc.php';
         require_once 'funciones/validar.inc.php';
         if (!empty($_POST['btnLogin'])) {
              echo "Ingreso con el boton";  
              $_SESSION['Mensaje'] = ControlesValidos();
              $_SESSION['Mensaje'].= DatosUsuarioCorrecto($_POST['login'], $_POST['clave']);
              //si la funcion devuelve los mensajes, los mostrare mas abajo
              //si la funcion devuelve un mensaje vacio, entonces ya puedo loguear
              if (!empty($_SESSION['Mensaje'])) {     
                    $_SESSION['clave']=$_POST['clave'];
                    $_SESSION['Login']=$_POST['login'];
                    header('Location: index.php');
                    exit;
              }
              else{
                  $_SESSION['Mensaje'] = "Usuario incorecto";
                  header('Location: login.php');
                  exit;
              }
        }
      ?>
    </head>
    <body>
          <?php
            if (empty($_SESSION['Mensaje']) && !empty($_POST['btnLogin'])) {
                echo $_SESSION['Mensaje'];
            }
            ?>
        <div class="container">


            <form class="form-signin" role="form" method="post" >
              <?php  if (!empty($_SESSION['Mensaje'])){  ?>
                <!--MENSAJE DE ERROR-->
                <div class="col-md-12">
                    <div class="alert alert-warning alert-dismissable">
                        <strong>Atenci&oacute;n!</strong> Los datos ingresados son incorrectos.
                    </div>
                </div>
                <!-- FIN MENSAJE ERROR-->
               <?php } ?>
                <h3 class="form-signin-heading">Ingreso</h3>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="glyphicon glyphicon-user"></i>
                        </div>
                        <input class="form-control" placeholder="Usuario" name="login" autocomplete="off" value="<?php echo!empty($_POST['login']) ? $_POST['login'] : ''; ?>" />
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class=" glyphicon glyphicon-lock "></i>
                        </div>
                        <input class="form-control" placeholder="Clave" type=password name= "clave" autocomplete="off" value="<?php echo!empty($_POST['clave']) ? $_POST['clave'] : ''; ?>" />
                    </div>
                </div>

                <button type="submit" class="btn btn-lg btn-primary btn-block" name="btnLogin" value="btnLogin">Ingresar</button>
            </form>

        </div>
        <div class="clearfix"></div>
        <br><br>
        <!--footer-->

    </body>
</html>
<?php 
//destruyo aqui directamente toda variable de sesion mientras no se encuentre logueado
session_destroy();
$_SESSION = array(); ?>