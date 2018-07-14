<?php include("../config/bloque.php");

  define('DB_SERVER','localhost');
  define('DB_NAME','SolHip');
  define('DB_USER','root');
  define('DB_PASS','q1w2e3');

  session_start();
  $con = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
    if (mysqli_connect_errno()) {
      echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    else {
          $result = mysqli_query($con,"SELECT hora, mensaje, accion, usuario FROM SolHip.Avisos ORDER BY hora desc;");
    }
?>

<div class="card mb-3">
  <div class="card-header">
    <i class="fa fa-bell-o" style="color:#ffc107 ;"></i> Alertas</div>
  <div class="list-group list-group-flush small pre-scrollable" style="max-height:400px;">
    <?php
      while ($elemento = mysqli_fetch_array($result)) {
        echo '
        <a class="list-group-item list-group-item-action" style="pointer-events: none;">
          <div class="media">
            <div class="media-body">
              <strong>'.$elemento[mensaje].'</strong>.
              ';
                if($elemento['estado'] == "Sin completar"){ echo 'Tiene información sin completar. ';}
                if($elemento['estatus'] == "Sin completar"){ echo 'Tiene documentos pendientes por entregar.';}
              echo '
              <div class="text-muted smaller">Día y hora: '.$elemento[hora].' por el usuario: <strong>'.$elemento[usuario].'</strong></div>
            </div>
          </div>
        </a>';

        } ?>
  </div>
  <div class="card-footer small text-muted">Alertas!!</div>
</div>
