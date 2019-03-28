<!DOCTYPE html>
<html>
  <head>
       <?php 
        session_start();
        require_once 'funciones/listado.php';
        require_once 'funciones/funciones_conexion.inc.php';
        require_once 'funciones/empleados.inc.php';
        require_once 'funciones/cambiar_formato.php';
        require_once 'funciones/area.php';
        require_once 'funciones/calcular_edad.php';
          //comienzo a usar sesiones
        //si la session que contiene el valor del login esta vacia, 
       //o algun valor identificando una sesion abierta este vacio...
      if (empty($_SESSION['Login'])) { 
       //automaticamente redireccionar al login.php
        header('Location: login.php');
        exit;
      }
//si la sesion contiene valor, es porque se logueo y puedo mostrar el contenido
 ?>
    <meta charset="utf-8">
    <title>Panel</title>
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
  </head>
  <body>
     <?php
          $list = array();
          $list = Listar();
        ?>
    <!--nav-->
    <nav role="navigation" class="navbar navbar-custom">
        <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button data-target="#bs-content-row-navbar-collapse-5" data-toggle="collapse" class="navbar-toggle" type="button">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a href="#" class="navbar-brand">Panel de usuario</a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div id="bs-content-row-navbar-collapse-5" class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
              <li class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#"><?php echo $_SESSION['Login']; ?><b class="caret"></b></a>
                <ul role="menu" class="dropdown-menu">
                  <li><a href="#">Separated link</a></li>
                  <li class="divider"></li>
                  <li><a href="funciones/cerrar.php">Signout</a></li>
                </ul>
              </li>
            </ul>
          </div><!-- /.navbar-collapse -->
          
        </div><!-- /.container-fluid -->
      </nav>
    <!--header-->
    <div class="container-fluid">
    <!--documents-->
        <div class="row row-offcanvas row-offcanvas-left">
          <div class="col-xs-6 col-sm-3 sidebar-offcanvas" role="navigation">
            <ul class="list-group panel">
                <li class="list-group-item"><i class="glyphicon glyphicon-align-justify"></i> <b><?php echo $list[0]['nombre']; echo " ";echo $list[0]['apellido']; ?> </b></li>
                <li class="list-group-item"><a href="#"><i class="glyphicon glyphicon-home"></i>Dashboard </a></li>
              </ul>
          </div>
          <div class="col-xs-12 col-sm-9 content">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title">
                    <a href="javascript:void(0);" class="toggle-sidebar">
                        <span class="fa fa-angle-double-left" data-toggle="offcanvas" title="Maximize Panel"></span>
                    </a> 
                    Lista de Cumplea&ntilde;os de <strong><?php  echo date("F");?></strong>
                </h3>
              </div>
              <div class="panel-body">
                <div class="content-row">
                    <h2 class="content-row-title">TimeLine</h2>
                        <div class="row">
                          <div class="col-md-12">
                            <div class="timeline">
                              <dl>
                                <dt><?php  echo date("m/Y");  ?> <br />    
                                    </dt>
                                     <?php
                                        $MesHoy = date("m");
                                         $emp = array();                               
                                        $emp = total();
                                        
                                        $cant = count($emp);
                                        //echo $cant;
                                        for($i=0; $i<$cant; $i++){
                                           //$mes = substr($emp[$i]['fechaNacimiento'],5,2);
                                          if (($i%2 == 0) /*&& $emp[$i]['fechaNacimiento'] != 0*/){
                                      ?>
                                
                                <dd class="pos-right clearfix">
                                  <div class="circ"></div>
                                  <div class="time"><?php echo date("d/m"); ?></div>
                                  <div class="events">
                                    <div class="pull-left">
                                     <?php echo "<img  echo class='events-object img-rounded' width=70px height=70px src='dist/img/users/".$emp[$i]['login'].".jpg'>"; ?>
                                    </div>
                                    <div class="events-body">
                                      <h4 class="events-heading"><?php echo $emp[$i]['nombre']." ". $emp[$i]['apellido']; ?></h4>
                                      <p>Area: <?php area($emp[$i]['idArea']); ?></p>
                                      <p>Fecha de nacimiento: <?php echo $emp[$i]['fechaNacimiento']?> </p>
                                      <p>Cumple <?php CalculaEdad($emp[$i]['fechaNacimiento']); ?> a&ntilde;os</p>
                                    </div>
                                  </div>
                                </dd>
                                 <?php 
                                      } elseif (($i%2 != 0)/* && $emp[$i]['fechaNacimiento'] != 0*/) {
                                                        
                                                    
                                 ?>
                                <dd class="pos-left clearfix">
                                  <div class="circ"></div>
                                  <div class="time"><?php echo date("d/m"); ?></div>
                                  <div class="events">
                                    <div class="pull-left">
                                       <?php echo "<img  echo class='events-object img-rounded' width=70px height=70px src='dist/img/users/".$emp[$i]['login'].".jpg'>"; ?>
                                    </div>
                                    <div class="events-body">
                                      <h4 class="events-heading"><?php echo $emp[$i]['nombre']." ". $emp[$i]['apellido']; ?></h4>
                                      <p>Area: <?php area($emp[$i]['idArea']); ?></p>
                                      <p>Fecha de nacimiento: <?php echo $emp[$i]['fechaNacimiento']?> </p>
                                      <p>Cumple <?php CalculaEdad($emp[$i]['fechaNacimiento']); ?> a&ntilde;os</p>
                                    </div>
                                  </div>
                                </dd>
                                 <?php  }}?>
                               
                              </dl>
                            </div>
                          </div>
                       </div>
                    </div>
              </div><!-- panel body -->
            </div>
        </div><!-- content -->
      </div>
    </div>
    <!--footer-->
   
  </body>
</html>
