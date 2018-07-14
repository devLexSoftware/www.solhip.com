<?php include("../config/bloque.php"); ?>



<!DOCTYPE html>
<html lang="en">

<head>

  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Solidez Hipotecaria</title>
  <!-- Bootstrap core CSS-->
  <link href="../../recursos/bootstrap/css/bootstrap.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="../../recursos/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="../../recursos/css/sb-admin.css" rel="stylesheet">



  <!-- Otros -->
  <link href="../../recursos/css/complementos.css" rel="stylesheet">
  <!-- Para las tablas -->
  <link href="../../recursos/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <script type="text/javascript">
  window.onload=function(){
    query=window.location.search.substring(1);
    q=query.split("&");
    vars=[];
    for(i=0;i<q.length;i++){
      x=q[i].split("=");
      k=x[0];
      v=x[1];
      vars[k]=v;
    }
    abrir(vars['p'],vars['ref']);
  };

  </script>
</head>
<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
  <img src="../../recursos/img/sistema/logo.png"  style="height:30px; width:40px;">
    <a class="navbar-brand" href="index.php?p=in" style="padding: 5px 0px 5px 10px;">Solidez <b>Hipotecaria</b></a>    
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>


    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Perfil">
          <a class="nav-link" href="#">
            <?php if ($_SESSION[foto] != null) {
              echo '<img class="fa fa-2x fa-fw" src="data:image/png;base64,<?php echo base64_encode($_SESSION[foto]); ?>" />';
            }
              else {
                echo '<img class="fa fa-2x fa-fw" src="../../recursos/img/sistema/default-user.png" style:"width:10px; height:auto;"/>';
              }
              ?>
            <span class="nav-link-text"><?php echo ($_SESSION[usuario]); ?>  </span>
          </a>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Informacion">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-user"></i>
            <span class="nav-link-text">Captura Información</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents">
            <li>
              <a href="../templates/index.php?p=ListClientes" onclick="abrir('ListClientes')">Listado</a>
            </li>
            <li>
              <a href="../templates/index.php?p=Clientes" onclick="abrir('Clientes')">Nuevo cliente</a>
            </li>
          </ul>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Generales">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePages" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-file"></i>
            <span class="nav-link-text" >Contactos</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseExamplePages">
            <li>
              <a href="../templates/index.php?p=ListDirectory" onclick="abrir('ListDirectory')">Listado</a>
            </li>
          </ul>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Bitacora">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-book"></i>
            <span class="nav-link-text">Bitácora</span>
          </a>

        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Contactos">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseContacs" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-list"></i>
            <span class="nav-link-text">Generales</span>
          </a>

        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Eventos">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseEvents" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-calendar"></i>
            <span class="nav-link-text">Eventos</span>
          </a>

        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Administrador">
          <a class="nav-link" href="#" >
            <i class="fa fa-fw fa-gear"></i>
            <span class="nav-link-text">Administrador</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="About">
          <a class="nav-link" href="../templates/index.php?p=about" onclick="abrir('about')">
            <i class="fa fa-fw fa-inbox"></i>
            <span class="nav-link-text">Soporte</span>
          </a>
        </li>
      </ul>


      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="messagesDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-envelope"></i>
            <span class="d-lg-none">Mensajes
              <span class="badge badge-pill badge-primary">1</span>
            </span>
            <span class="indicator text-primary d-none d-lg-block">
              <i class="fa fa-fw fa-circle"></i>
            </span>
          </a>
          <div class="dropdown-menu" aria-labelledby="messagesDropdown" id="divmessages">
            <?php include('../default/messages.php'); ?>
            <script type="text/javascript">
              setInterval(function() {
                 $('#divmessages').load('../default/messages.php');
               }, 60 * 1000);
            </script>
          </div>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-bell"></i>
            <span class="d-lg-none">Alerts
              <span class="badge badge-pill badge-warning">1</span>
            </span>
            <span class="indicator text-warning d-none d-lg-block">
              <i class="fa fa-fw fa-circle"></i>
            </span>
          </a>
          <div class="dropdown-menu" aria-labelledby="alertsDropdown" id="divalerts">
            <?php include('../default/alerts.php'); ?>
          </div>
        </li>

        <li class="nav-item">
          <form class="form-inline my-2 my-lg-0 mr-lg-2">
            <div class="input-group">
              <input class="form-control" type="text" placeholder="Buscar cliente" id="idfilName">
              <span class="input-group-btn">
                <button class="btn btn-primary" type="button" onclick="buscarCliente()">
                  <i class="fa fa-search"></i>
                </button>
              </span>
            </div>
          </form>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Salir</a>
        </li>
      </ul>
    </div>
  </nav>

  <div class="content-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div id="divContenido" class="form-group col-md-12">
            <!-- Contenido de la página, esto varia dependiendo del modulo-->
        </div>
      </div>
    </div>


    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Lex Software Copyright © 2018. Todos los derechos reservados</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Aviso</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">¿Desea cerrar sesión?</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="../config/salir.php">Salir</a>
          </div>
        </div>
      </div>
    </div>

    <?php include("../clientes/alerta.php") ?>
    <?php include("../clientes/alertab.php") ?>
    <?php include("../about/alerta.php") ?>

    <!-- Bootstrap core JavaScript-->
    <script src="../../recursos/vendor/jquery/jquery.min.js"></script>
    <script src="../../recursos/validate/dist/jquery.validate.min.js"></script>
    <script src="../../recursos/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="../../recursos/vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="../../recursos/js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <!-- Toggle between fixed and static navbar-->
    <script>
    $('#toggleNavPosition').click(function() {
      $('body').toggleClass('fixed-nav');
      $('nav').toggleClass('fixed-top static-top');
    });

    </script>
    <!-- Toggle between dark and light navbar-->
    <script>
    $('#toggleNavColor').click(function() {
      $('nav').toggleClass('navbar-dark navbar-light');
      $('nav').toggleClass('bg-dark bg-light');
      $('body').toggleClass('bg-dark bg-light');
    });
    </script>

    <!-- Js para llamar formularios -->
    <script src="../../recursos/js/General.js"></script>
    <script src="../../recursos/js/CliGeneral.js"></script>
    <!-- Para tablas -->
    <script src="../../recursos/vendor/datatables/jquery.dataTables.js"></script>
    <script src="../../recursos/vendor/datatables/dataTables.bootstrap4.js"></script>

  </div>
</body>

<script type="text/javascript">
   var cierraSesionIrLogeo = "../config/bloque.php";
    setTimeout(function(){ windows.location=cierraSesionIrLogeo; }, 5600);
</script>

</html>
