<?php include("../config/bloque.php");

?>
<?php
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
      $ref = $_GET['ref'];
      $result = mysqli_query($con,"SELECT nombre,apellido FROM Clientes WHERE ref = '".$ref."'");
      $elemento = mysqli_fetch_array($result);
    }
 ?>
<div class="container-fluid">

   <!-- Breadcrumbs-->
   <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="index.php?p=in">Inicio</a>
    </li>
    <li class="breadcrumb-item active">Clientes</li>
  </ol>


  <h1>Aviso</h1>
  <hr>
  <h3>Registro no completo</h3>

  <div class="form-group row ">
    <div class="form-group col-md-6">
      <p class="sMargen">El usuario <?php echo ($elemento['nombre']." ".$elemento['apellido']  )?> falta información para completar su registro.</p>
    </div>
  </div>
  <div class="form-group row ">
    <div class="form-group col-md-6">
      <p class="sMargen">Se quedara en estado pendiente hasta completar su información.</p>
      <h4>Documentos</h4>
      <a href="../templates/index.php?p=csA&ref=<?php echo $ref;  ?>">Ver Documentos</a>
    </div>
  </div>

</div>
