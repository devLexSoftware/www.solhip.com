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
      $result = mysqli_query($con,"SELECT Clientes.ref, Clientes.find, Clientes.estado, DocumentosCliente.estatus FROM Clientes
      	INNER JOIN PerfilCliente ON PerfilCliente.pk_Cliente = Clientes.id
      	INNER JOIN DocumentosCliente ON DocumentosCliente.pk_PerfilCliente = PerfilCliente.id
      	WHERE Clientes.estado = 'Sin completar' OR DocumentosCliente.estatus = 'Sin completar';");
    }
?>


<div class="card mb-3">
  <div class="card-header">
    <i class="fa fa-envelope-o"  style="color:#007bff;"></i> Mensajes</div>
  <div class="list-group list-group-flush small pre-scrollable" style="max-height:400px;">
    <?php
    $count=0;
      while ($elemento = mysqli_fetch_array($result)) {
        echo '
        <a class="list-group-item list-group-item-action" href="../templates/index.php?p=cu&ref='.$elemento["ref"].'">
          <div class="media">
            <img class="d-flex mr-3 rounded-circle" alt="">
            <div class="media-body">
              <strong>'.$elemento[find].'</strong>.
              ';
                if($elemento['estado'] == "Sin completar"){ echo 'Tiene información sin completar. ';}
                if($elemento['estatus'] == "Sin completar"){ echo 'Tiene documentos pendientes por entregar.';}
              echo '
              <div class="text-muted smaller">Perfil: '.$elemento[nombre].'</div>
            </div>
          </div>
        </a>';
        } ?>
  </div>
  <div class="card-footer small text-muted">Parte de los mensajes</div>
</div>
