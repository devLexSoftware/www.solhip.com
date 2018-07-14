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
      $ref = $_GET['ref'];
      $result = mysqli_query($con,"SELECT Clientes.nombre, Clientes.apellido, Clientes.nss, Clientes.rfc, Clientes.fechNacimiento, Clientes.nivAcademico, Clientes.nDependientes,
          DatosLocalizacion.calle, DatosLocalizacion.colonia, DatosLocalizacion.numInt, DatosLocalizacion.numExt, DatosLocalizacion.cp, DatosLocalizacion.antVivienda, DatosLocalizacion.tipVivienda,
          DatosLocalizacion.telCasa, DatosLocalizacion.telMovil, DatosLocalizacion.email
          FROM Clientes INNER JOIN DatosLocalizacion ON Clientes.id = DatosLocalizacion.pk_Cliente WHERE ref = '".$ref."'");
      $elemento = mysqli_fetch_array($result);

      $result2 = mysqli_query($con, "SELECT DatosLaboral.nomEmpresa, DatosLaboral.pueEmpresa, DatosLaboral.antEmpresa, DatosLaboral.calle, DatosLaboral.numInt, DatosLaboral.numExt, DatosLaboral.colonia, DatosLaboral.cp, DatosLaboral.ext, DatosLaboral.tel
          FROM DatosLaboral INNER JOIN Clientes ON DatosLaboral.pk_Cliente = Clientes.id Where Clientes.ref = '".$ref."'");
      $elemento2 = mysqli_fetch_array($result2);

      $result3 = mysqli_query($con, "SELECT PerfilCliente.nombre, PerfilCliente.banco, PerfilCliente.credito, PerfilCliente.salario, DocumentosCliente.notas
          FROM DocumentosCliente INNER JOIN  PerfilCliente ON DocumentosCliente.pk_PerfilCliente = PerfilCliente.id
          INNER JOIN Clientes ON PerfilCliente.pk_Cliente = Clientes.id WHERE Clientes.ref = '".$ref."'");
      $elemento3 = mysqli_fetch_array($result3);

    }
 ?>

<div class="container-fluid">

  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="index.php?p=in">Inicio</a>
    </li>
    <li class="breadcrumb-item">
      <a href="index.php?p=lcs">Lista</a>
    </li>
    <li class="breadcrumb-item active">Cliente</li>
  </ol>


  <h1>Perfil del cliente</h1>
  <hr>
  <h4> <?php echo $elemento['nombre']." ".$elemento['apellido'] ; ?></h4>
  <h5> <?php echo $elemento3['nombre']; ?></h5>
  <form enctype="multipart/form-data" role="form-horizontal" action="../clientes/actions/documentCliente.php?ref=<?php echo $ref; ?>" method="post" id="formCliente" autocomplete="off" name="ClienteDocuments" >
    <?php include("templates/documentClientes.php"); ?>
    <hr>
    <h5>Documentos</h5>
    <div class="form-group row">
      <div class="form-group col-md-6">
        <p class="sMargen">Documentos</p>
        <select class="form-control" name="cliNDocumentos" value="0" placeholder="Documentos" onchange="CDocumentos(this.value)">
          <option value="0">0</option>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
          <option value="6">6</option>
          <option value="7">7</option>
          <option value="8">8</option>
          <option value="9">9</option>
          <option value="10">10</option>
          <option value="11">11</option>
          <option value="12">12</option>
          <option value="13">13</option>
          <option value="14">14</option>
          <option value="15">15</option>
          <option value="16">16</option>
          <option value="17">17</option>
          <option value="18">18</option>
          <option value="19">19</option>
          <option value="20">20</option>
        </select>
        <br>
        <h6>Documentos entregados</h6>
        <div id="divfiles" >
          <?php
            $lista = null;
              $count = 1;
              $ruta = "../../file/clients/".$ref."/";
              $directorio = opendir($ruta); //ruta actual
              $evento = "CBorrar(this.name, '$ref')";
              while ($archivo = readdir($directorio)){ //obtenemos un archivo 
                   if($archivo != '.' && $archivo != '..'){
                     if (is_dir($ruta.$archivo))
                     {
                      echo $count.'.- <a target="_blank" href="'.$ruta.$archivo.'" >'.$archivo.'  </a> ';
                      echo '----------<button style="color:red;" class="btn btn-link" type="button" name="'.$archivo.'" onclick="'.$evento.'" >Borrar</button>';
                      echo "<br>";
                      }
                      else {
                      echo  $count.'.- <a target="_blank" href="'.$ruta.$archivo.'" >'.$archivo.'  </a> ';
                      echo  '----------<button style="color:red;" class="btn btn-link" type="button" name="'.$archivo.'" onclick="'.$evento.'" >Borrar</button>';
                      echo  "<br>";
                      }
                    $count++;
                  }
                }
                echo $listar;
          ?>
        </div>
      </div>

      <div class="form-group col-md-6" name="divNDocumentos" id="divNDocumentos" style="height: 200px; overflow-y: scroll;">
      </div>
    </div>
    <div class="form-group row">
      <div class="form-group col-md-9">
        <p class="sMargen">Notas del cliente</p>
        <textarea class="form-control" name="cliNotas" rows="1" cols="50"><?php echo $elemento3[notas]; ?></textarea>
      </div>
      <div class="form-group col-md-1">
        <p class="sMargen">Guardar</p>
        <button class="btn btn-success" type="submit" name="btnGuardar" id="btnGuardar" >Cliente</button>
      </div>
      <div class="form-group col-md-2">
        <p class="sMargen">Guardar e Imprimir</p>
        <button class="btn btn-info" type="submit" name="btnImprimir" id="btnImprimir" >Carta</button>
      </div>
    </div>
  </form>
