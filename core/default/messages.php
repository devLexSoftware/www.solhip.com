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

    echo '<h6 class="dropdown-header">Te recuerdo:</h6>';
    while ($elemento = mysqli_fetch_array($result)) {
      echo '

      <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="../templates/index.php?p=cu&ref='.$elemento["ref"].'">
        <strong>'.$elemento['find'].'</strong>
        <span class="small float-right text-muted">Tiene pendiente: ';
        echo '</span>
        <div class="dropdown-message small">';
          if($elemento['estado'] == "Sin completar"){ echo 'Completar Información. ';}
          if($elemento['estatus'] == "Sin completar"){ echo 'Entregar documentos. ';}
        echo '</div>
      </a>
      <div class="dropdown-divider"></div>
      ';
    }
    echo '<a class="dropdown-item small" href="../templates/index.php?p=in">Mostrar todos los mensajes</a>';
 ?>
