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
      $result = mysqli_query($con,"SELECT hora, mensaje, accion FROM SolHip.Avisos ORDER BY hora desc;");
    }

    //--Solo mostrar 5 alertar;
    $salir=0;

    echo '<h6 class="dropdown-header">Alerta:</h6>';
    while ($elemento = mysqli_fetch_array($result)) {
      echo '
      <div class="dropdown-divider"></div>
      <a class="dropdown-item" style="pointer-events: none;">
        ';
            switch ($elemento['accion']) {
              case 'nuevo':
                echo '
                <span class="text-success">
                  <strong>
                  <i class="fa fa-long-arrow-up fa-fw"></i>Cliente nuevo
                  </strong>
                </span>';
                break;
              case 'actualizado':
                echo '
                <span class="text-success">
                  <strong>
                  <i class="fa fa-long-arrow-up fa-fw"></i>Cliente actualizado
                  </strong>
                </span>';
                break;
              case 'baja':
                echo '
                <span class="text-danger">
                  <strong>
                  <i class="fa fa-long-arrow-down fa-fw"></i>Cliente borrado
                  </strong>
                </span>';
                break;
              default:
                break;
            }
    echo '
        <span class="small float-right text-muted">'.$elemento['hora'].'</span>
        <div class="dropdown-message small">'.$elemento['mensaje'].'.</div>
      </a>
      <div class="dropdown-divider"></div>
      ';
      $salir++;
      if ($salir == 5) {
        break;
      }
    }
    echo '<a class="dropdown-item small" href="../templates/index.php?p=in">Mostrar todos los avisos</a>';
 ?>
