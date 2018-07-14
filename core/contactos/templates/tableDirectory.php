<?php

define('DB_SERVER','localhost');
define('DB_NAME','SolHip');
define('DB_USER','root');
define('DB_PASS','q1w2e3');



session_start();
$con = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
mysqli_set_charset($con,"utf8");

  if (mysqli_connect_errno()) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
  }
  else {
    $count_modal = 0;

    $result = mysqli_query($con,'SELECT nombre, puesto, banco, telOficina, telMovil, email, direccion, notas FROM directorio');


    echo '
    <table class="table table-striped table-bordered" cellspacing="0" width="100%" id="tableList">
      <thead>
        <tr class="info">
          <th>Nombre</th>
          <th>Banco/DLLO</th>
          <th>Puesto</th>
          <th>Contacto</th>
          <th>Dirección</th>
        </tr>
      </thead>
      <tbody> ';
      while($elemento = mysqli_fetch_array($result)){
        echo '
        <tr>
          <td>'.$elemento[nombre].'</td>
          <td>'.$elemento[banco].'</td>
          <td>'.$elemento[puesto].'</td>
          <td>
              <button type="button" class="btn btn-info" style="padding:0 0 0 0; width:80px;" data-toggle="modal" data-target="#exampleModal'.$count_modal.'">Info</button>
          </td>
          <td>
          ';
          if ($elemento[direccion] != "" || $elemento[notas] != "") {
            echo '<button type="button" class="btn btn-outline-info" style="padding:0 0 0 0; width:80px; " data-toggle="modal" data-target="#exampleModal2'.$count_modal.'">Dirección</button>';
          }
          echo '
          </td>
          </tr>

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
                  <div class="form-group col-md-4">
                    <p class="sMargen"><b>Número Oficina</b></p>
                    <p class="sMargen">'.$elemento[telOficina].'</p>
                  </div>
                  <div class="form-group col-md-4">
                    <p class="sMargen"><b>Número móvil</b></p>
                    <p class="sMargen">'.$elemento[telMovil].'</p>
                  </div>
                  <div class="form-group col-md-4">
                    <p class="sMargen"><b>email</b></p>
                    <p class="sMargen">'.$elemento[email].'</p>
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
                  <h5 class="modal-title" id="exampleModalLabel2'.$count_modal.'">Dirección</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <div class="modal-body row">
                  <div class="form-group col-md-8">
                    <p class="sMargen"><b>Información</b></p>
                    <p class="sMargen">'.$elemento[direccion].'</p>
                  </div>
                  <div class="form-group col-md-4">
                    <p class="sMargen"><b>Notas</b></p>
                    <p class="sMargen">'.$elemento[notas].'</p>
                  </div>
                </div>
                <div class="modal-footer">
                  <button class="btn btn-primary" type="button" data-dismiss="modal">Aceptar</button>
                </div>
              </div>
            </div>
          </div>

        
        ';
        $count_modal++;
      }
      echo '
      </tbody>
    </table>
    ';
  }

mysqli_close($con);

 ?>
