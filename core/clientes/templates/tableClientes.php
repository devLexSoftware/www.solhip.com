<?php
define('DB_SERVER','localhost');
define('DB_NAME','SolHip');
define('DB_USER','root');
define('DB_PASS','q1w2e3');
session_start();
/*function died($error) {
        echo "Lo sentimos, hubo un error en sus datos y el formulario no puede ser enviado en este momento. ";
        echo "Detalle de los errores.<br /><br />";
        echo $error."<br /><br />";
        echo "Por favor corrija estos errores e inténtelo de nuevo.<br /><br />";
        die();
    }*/

$count_modal = 0;
$con = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
  if (mysqli_connect_errno()) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
  }
  else {
  if($origen == 'bus'){
    $filtro =" WHERE MATCH(Clientes.find) AGAINST('".$_GET['ref']."') AND PerfilCliente.estado is null";
  }
  else {
    $filtro = $_POST['filtro'];
    if ($filtro != null)
    {
      $filtro = " WHERE ".$filtro." AND PerfilCliente.estado is null";
    }
    else {
        $filtro = " WHERE PerfilCliente.estado is null";
    }
  }
    $result = mysqli_query($con,'SELECT Clientes.ref, Clientes.nombre, Clientes.apellido, Clientes.estado, PerfilCliente.banco, PerfilCliente.nombre as perfil,
      PerfilCliente.credito, PerfilCliente.solicitud,
      DatosLocalizacion.telCasa, DatosLocalizacion.telMovil, DatosLocalizacion.email FROM Clientes
              INNER JOIN PerfilCliente ON Clientes.id = PerfilCliente.pk_Cliente
              INNER JOIN DatosLocalizacion ON Clientes.id = DatosLocalizacion.pk_Cliente'.$filtro);
    if ($origen == 'bus') {
      echo '<h4>Resultados: '.mysqli_num_rows($result).'</h4>';
    }
    echo '
    <table class="table table-striped table-bordered" cellspacing="0" width="100%" id="tableList">
      <thead>
        <tr class="info">
          <th>Cliente</th>
          <th>Estado</th>
          <th>Banco</th>
          <th>Perfil</th>
          <th>Información</th>
          <th>Opciones</th>
        </tr>
      </thead>
      <tbody> ';
      while($elemento = mysqli_fetch_array($result)){
        echo '
        <tr>
          <td>'.$elemento["nombre"].' '.$elemento["apellido"].'</td>
          <td>'.$elemento["estado"].'</td>
          <td>'.$elemento["banco"].'</td>
          <td>'.$elemento["perfil"].'</td>
          <td>
              <button type="button" class="btn btn-info" style="padding:0 0 0 0; width:80px;" data-toggle="modal" data-target="#exampleModal'.$count_modal.'">Info</button>
          </td>
          <td>
              <button type="button" class="btn btn-outline-info" style="padding:0 0 0 0; width:80px; " data-toggle="modal" data-target="#exampleModal2'.$count_modal.'">Acciones</button>
          </td>

          <div class="modal fade" id="exampleModal'.$count_modal.'">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel'.$count_modal.'">Información</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <div class="modal-body row">
                  <div class="form-group col-md-3">
                    <p class="sMargen"><b>Num fijo</b></p>
                    <p class="sMargen" >'.$elemento["telCasa"].'</p>
                  </div>
                  <div class="form-group col-md-3">
                    <p class="sMargen"><b>Num móvil</b></p>
                    <p class="sMargen">'.$elemento["telMovil"].'</p>
                  </div>
                  <div class="form-group col-md-3">
                    <p class="sMargen"><b>Monto</b></p>
                    <p class="sMargen">'.$elemento["solicitud"].'</p>
                  </div>                
                </div>
                <div class="modal-footer">
                  <button class="btn btn-primary" type="button" data-dismiss="modal">Aceptar</button>
                </div>
              </div>
            </div>
          </div>
          <div class="modal fade" id="exampleModal2'.$count_modal.'">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel2'.$count_modal.'">Opciones</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <div class="modal-body row">
                  <div class="form-group col-md-3">
                    <p class="sMargen"><b>Información</b></p>
                    <a style="text-decoration: none;" href="../templates/index.php?p=cu&ref='.$elemento["ref"].'" class="" style="text-align:right;">Ver/Editar</a>
                  </div>
                  <div class="form-group col-md-3">
                    <p class="sMargen"><b>Archivos</b></p>
                    <a style="text-decoration: none;" href="../templates/index.php?p=cs&ref='.$elemento["ref"].'" class="" style="text-align:center;"> Agregar</a>
                  </div>
                  ';
                  if ($elemento['banco'] == "Afirme" || $elemento['banco'] == "Banorte" || $elemento['banco'] == "BanRegio" || $elemento['banco'] == "HSBC" || $elemento['banco'] == "Scotiabank" ) {
                    echo '
                    <div class="form-group col-md-4">
                      <p class="sMargen"><b>Autorización</b></p>
                      <a style="text-decoration: none;" href="../templates/index.php?p=imba&ref='.$elemento["ref"].'" class="" style="text-align:center;">Imprimir</a>
                    </div>';
                  }
                  if ($elemento['banco'] == "HSBC") {
                    echo '
                    <div class="form-group col-md-2">
                    <p class="sMargen">Búro Cre</p>
                      <a style="text-decoration: none;" href="../templates/index.php?p=imbr&ref='.$elemento["ref"].'" class="" style="text-align:center;">Imprimir</a>
                    </div>
                    ';
                  }
                  echo '
                </div>
                <div class="modal-footer">
                  <button class="btn btn-primary" type="button" data-dismiss="modal">Aceptar</button>
                </div>
              </div>
            </div>
          </div>
        </tr>
        ';
        $count_modal++;
      }
      echo '
      </tbody>
    </table>
    ';

  }


  //<td><a href="../templates/index.php?p=cu&ref='.$elemento["ref"].'">Editar</a></td>
  //<td><a href="../templates/index.php?p=cs&ref='.$elemento["ref"].'">Documentos</a></td>
  ?>
