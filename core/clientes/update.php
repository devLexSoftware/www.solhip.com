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
      $result = mysqli_query($con,"SELECT Clientes.nombre, Clientes.find, Clientes.apellido, Clientes.nss, Clientes.rfc, Clientes.fechNacimiento, Clientes.nivAcademico, Clientes.nDependientes, Clientes.notas,
          DatosLocalizacion.calle, DatosLocalizacion.colonia, DatosLocalizacion.numInt, DatosLocalizacion.numExt, DatosLocalizacion.cp, DatosLocalizacion.antVivienda, DatosLocalizacion.tipVivienda,
          DatosLocalizacion.telCasa, DatosLocalizacion.telMovil, DatosLocalizacion.email
          FROM Clientes INNER JOIN DatosLocalizacion ON Clientes.id = DatosLocalizacion.pk_Cliente WHERE ref = '".$ref."'");
      $elemento = mysqli_fetch_array($result);

      $result2 = mysqli_query($con, "SELECT DatosLaboral.nomEmpresa, DatosLaboral.pueEmpresa, DatosLaboral.antEmpresa, DatosLaboral.calle, DatosLaboral.numInt, DatosLaboral.numExt, DatosLaboral.colonia, DatosLaboral.cp, DatosLaboral.ext, DatosLaboral.tel
          FROM DatosLaboral INNER JOIN Clientes ON DatosLaboral.pk_Cliente = Clientes.id Where Clientes.ref = '".$ref."'");
      $elemento2 = mysqli_fetch_array($result2);

      $result3 = mysqli_query($con, "SELECT PerfilCliente.nombre, PerfilCliente.banco, PerfilCliente.credito, PerfilCliente.solicitud, PerfilCliente.actividadEco
          FROM PerfilCliente INNER JOIN Clientes ON PerfilCliente.pk_Cliente = Clientes.id WHERE Clientes.ref = '".$ref."'");
      $elemento3 = mysqli_fetch_array($result3);

      $result4 = mysqli_query($con, "SELECT Contactos.parentezco, Contactos.edad FROM Contactos
        INNER JOIN Clientes ON Clientes.id = Contactos.pk_Cliente WHERE Clientes.ref = '$ref' AND parentezco != 'Familiar' AND parentezco != 'Amigo';");

      $result5 = mysqli_query($con, "SELECT Contactos.nombre, Contactos.apellido, Contactos.edad, Contactos.telCasa, Contactos.TelMovil FROM Contactos
        INNER JOIN Clientes ON Clientes.id = Contactos.pk_Cliente WHERE Clientes.ref = '$ref' AND (parentezco = 'Familiar' OR parentezco = 'Amigo');");
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

  <div class="row">
    <div class="col-md-11">
    <h1 style="margin: 0 0 0 0">Actualizar registro</h1>
  </div>
    <div class="col-md-1">
    <a  href="#" data-toggle="modal" data-target="#deleteModal" class="fa fa-trash fa-2x" style="text-decoration: none; text-align:right; padding: 5px 0 0 0"></a>
    </div>
  </div>

  <hr>
  <h4> <?php echo $elemento['nombre']." ".$elemento['apellido'] ; ?></h4>
  <form role="form-horizontal" method="post" id="formCliente" autocomplete="off" name="ClienteUpdate">
    <div class="form-group row ">
      <div class="form-group col-md-6">
        <p class="sMargen">Nombre cliente</p>
        <input class="form-control" type="text" name="cliNombre" value="<?php echo $elemento['nombre']; ?>" placeholder="Nombre">
        <span id="error" class="invalid-feedback"></span>
      </div>

      <div class="form-group col-md-6">
        <p class="sMargen">Apellido cliente</p>
        <input class="form-control" type="text" name="cliApellido" value="<?php echo $elemento['apellido']; ?>" placeholder="Apellido">
        <span id="error" class="invalid-feedback"></span>
      </div>
    </div>

    <br>
    <div class="form-group row ">

      <div class="form-group col-md-2">
        <p class="sMargen">NSS</p>
        <input class="form-control" type="text" name="cliNss" value="<?php echo $elemento['nss']; ?>" placeholder="NSS">
        <span id="error" class="invalid-feedback"></span>
      </div>

      <div class="form-group col-md-2">
        <p class="sMargen">RFC</p>
        <input class="form-control" type="text" name="cliRfc" value="<?php echo $elemento['rfc']; ?>" placeholder="RFC">
        <span id="error" class="invalid-feedback"></span>
      </div>
      <div class="form-group col-md-2">
        <p class="sMargen">Fecha Nacimiento</p>
        <input class="form-control" type="date" name="cliFechNacimiento" value="<?php echo $elemento['fechNacimiento']; ?>" placeholder="Fecha Nacimiento">
      </div>
      <div class="form-group col-md-6">
        <p class="sMargen">Nivel Académico</p>
        <input class="form-control" type="text" name="cliNivAcademico" value="<?php echo $elemento['nivAcademico']; ?>" placeholder="Nivel Académico">
        <span id="error" class="invalid-feedback"></span>
      </div>
    </div>
    <br>
    <h3>Dirección</h3>
    <hr>
    <div class="form-group row">
      <div class="form-group col-md-6">
        <input class="form-control" type="text" name="cliCalle" value="<?php echo $elemento['calle']; ?>" placeholder="Calle">
        <span id="error" class="invalid-feedback"></span>
      </div>
      <div class="form-group col-md-6">
        <input class="form-control" type="text" name="cliColonia" value="<?php echo $elemento['colonia']; ?>" placeholder="Colonia">
        <span id="error" class="invalid-feedback"></span>
      </div>
      <div class="form-group col-md-1">
        <input class="form-control" type="text" name="cliNumExt" value="<?php echo $elemento['numExt']; ?>" placeholder="# Exterior">
        <span id="error" class="invalid-feedback"></span>
      </div>
      <div class="form-group col-md-1">
        <input class="form-control" type="text" name="cliNumInt" value="<?php echo $elemento['numInt']; ?>" placeholder="# Interior">
      </div>
      <div class="form-group col-md-2">
        <input class="form-control" type="number" name="cliCP" value="<?php echo $elemento['cp']; ?>" placeholder="C.P.">
      </div>
      <div class="form-group col-md-2">
        <input class="form-control" type="number" name="cliAntiguedad" value="<?php echo $elemento['antVivienda']; ?>" placeholder="Antigüedad">
        <span id="error" class="invalid-feedback"></span>
      </div>
      <div class="form-group col-md-6">
        <select class="form-control" name="cliTipo" value="" placeholder="Tipo vivienda">
        <option selected="true" value="<?php echo $elemento['tipVivienda']; ?>"><?php echo $elemento['tipVivienda']; ?></option>
          <option value="Familiar">Familiar</option>
          <option value="Propia">Propia</option>
          <option value="Rentada">Rentada</option>
        </select>
      </div>

    </div>
    <br>

    <h3>Datos de localización</h3>
    <hr>
    <div class="form-group row">
      <div class="form-group col-md-2">
        <p class="sMargen">Teléfono Fijo</p>
        <input class="form-control" type="number" name="cliTelCasa" value="<?php echo $elemento['telCasa']; ?>" placeholder="Fijo">
        <span id="error" class="invalid-feedback"></span>
      </div>
      <div class="form-group col-md-2">
        <p class="sMargen">Teléfono Móvil</p>
        <input class="form-control" type="number" name="cliTelMovil" value="<?php echo $elemento['telMovil']; ?>" placeholder="Móvil">
        <span id="error" class="invalid-feedback"></span>
      </div>
      <div class="form-group col-md-2">
        <p class="sMargen">Correo</p>
        <input class="form-control" type="email" name="cliEmail" value="<?php echo $elemento['email']; ?>" placeholder="Email">
        <span id="error" class="invalid-feedback"></span>
      </div>
    </div>



    <br>
    <h3>Información Complementaria</h3>
    <hr>
    <div id="divContenidoDependientes">
    </div>
    <div class="form-group row" id="divDependientesOriginales1">
      <div class="form-group col-md-2">
        <p class="sMargen">Dependientes Económicos</p>
        <div class="input-group">
          <span class="input-group-btn">
            <button class="btn btn-secondary" type="button" onclick="CDependientesUpdate()">Borrar</button>
          </span>
          <select class="form-control" name="cliNDependientesAnterior" value="<?php echo $elemento['nDependientes']; ?>" placeholder="Dependientes" onchange="CDependientesUpdate(this.value)">
        </div>
          <option selected="true" value="<?php echo $elemento['nDependientes']; ?>"><?php echo $elemento['nDependientes']; ?></option>
        </select>
      </div>
      </div>
    </div>

    <div id="divDependientesOriginales2">
      <?php
      $count = 0;
      while ( $elemento4 = mysqli_fetch_array($result4) ) {
        echo '<div class="form-group row">
              <div class="form-group col-md-3">
                <p class="sMargen">Parentezco</p>
                  <select class="form-control" name="ConAnteriorName'.$count.'" value="" placeholder="Parentezco" >
                    <option selected="true" value="'.$elemento4['parentezco'].'">'.$elemento4['parentezco'].'</option>
                    <option>Padre</option>
                    <option>Madre</option>
                    <option>Hijo</option>
                    <option>Hija</option>
                    <option>Primo</option>
                    <option>Prima</option>
                    <option>Abuelo</option>
                    <option>Abuela</option>
                  </select>
              </div>
              <div class="form-group col-md-1">
          <p class="sMargen">Edad</p>
          <input class="form-control" type="number" name="ConAnteriorEdad'.$count.'" value="'.$elemento4['edad'].'" placeholder="Edad">
          </div>
          </div>';
          $count++;
        }
       ?>
    </div>

    <br>
    <h3>Información Laboral</h3>
    <hr>
    <div class="form-group row">
      <div class="form-group col-md-8">
        <p class="sMargen">Nombre de la Empresa</p>
        <input class="form-control" type="text" name="cliEmpresaNombre" value="<?php echo $elemento2['nomEmpresa']; ?>" placeholder="Nombre de la empresa">
        <span id="error" class="invalid-feedback"></span>
      </div>
      <div class="form-group col-md-4">
        <p class="sMargen">Puesto en la Empresa</p>
        <input class="form-control" type="text" name="cliEmpresaPuesto" value="<?php echo $elemento2['pueEmpresa']; ?>" placeholder="Puesto que desempeña">
        <span id="error" class="invalid-feedback"></span>
      </div>
      <div class="form-group col-md-6">
        <input class="form-control" type="text" name="cliEmpresaCalle" value="<?php echo $elemento2['calle']; ?>" placeholder="Calle">
        <span id="error" class="invalid-feedback"></span>
      </div>
      <div class="form-group col-md-6">
        <input class="form-control" type="text" name="cliEmpresaColonia" value="<?php echo $elemento2['colonia']; ?>" placeholder="Colonia">
        <span id="error" class="invalid-feedback"></span>
      </div>
      <div class="form-group col-md-1">
        <input class="form-control" type="number" name="cliEmpresaNExt" value="<?php echo $elemento2['numExt']; ?>" placeholder="# Exterior">
        <span id="error" class="invalid-feedback"></span>
      </div>
      <div class="form-group col-md-1">
        <input class="form-control" type="number" name="cliEmpresaNInt" value="<?php echo $elemento2['numInt']; ?>" placeholder="# Interior">
        <span id="error" class="invalid-feedback"></span>
      </div>
      <div class="form-group col-md-2">
        <input class="form-control" type="number" name="cliEmpresaCP" value="<?php echo $elemento2['cp']; ?>" placeholder="CP">
        <span id="error" class="invalid-feedback"></span>
      </div>
      <div class="form-group col-md-2">
        <input class="form-control" type="number" name="cliEmpresaAnt" value="<?php echo $elemento2['antEmpresa']; ?>" placeholder="Tiempo en la empresa">
        <span id="error" class="invalid-feedback"></span>
      </div>
      <div class="form-group col-md-2">
        <input class="form-control" type="number" name="cliEmpresaTel" value="<?php echo $elemento2['tel']; ?>" placeholder="Teléfono">
        <span id="error" class="invalid-feedback"></span>
      </div>
      <div class="form-group col-md-1">
        <input class="form-control" type="number" name="cliEmpresaTelExt" value="<?php echo $elemento2['ext']; ?>" placeholder="Extensión">
        <span id="error" class="invalid-feedback"></span>
      </div>
    </div>

    <br>
    <h3>Referencias</h3>
    <hr>

    <?php
      $count = 1;

      while ($elemento5 = mysqli_fetch_array($result5)) {

        if($count <= 2){
          echo '
          <h5>Familiar '.$count.'</h5>
          <div class="form-group row">
            <div class="form-group col-md-6">
              <input class="form-control" type="text" name="CliRefNombre'.($count-1).'" value="'.$elemento5['nombre'].'" placeholder="Nombre">
            </div>
            <div class="form-group col-md-6">
              <input class="form-control" type="text" name="CliRefApellido'.($count-1).'" value="'.$elemento5['apellido'].'" placeholder="Apellido">
            </div>
            <div class="form-group col-md-2">
              <input class="form-control" type="text" name="CliRefTel'.($count-1).'" value="'.$elemento5['telCasa'].'" placeholder="Teléfono Fijo">
            </div>
            <div class="form-group col-md-2">
              <input class="form-control" type="text" name="CliRefMov'.($count-1).'" value="'.$elemento5['telMovil'].'" placeholder="Teléfono Móvil">
            </div>
          </div>
          ';
        }
        else {
          echo '
          <h5>Amigo '.($count-2).'</h5>
          <div class="form-group row">
            <div class="form-group col-md-6">
              <input class="form-control" type="text" name="CliRefNombre'.($count-1).'" value="'.$elemento5['nombre'].'" placeholder="Nombre">
            </div>
            <div class="form-group col-md-6">
              <input class="form-control" type="text" name="CliRefApellido'.($count-1).'" value="'.$elemento5['apellido'].'" placeholder="Apellido">
            </div>
            <div class="form-group col-md-2">
              <input class="form-control" type="text" name="CliRefTel'.($count-1).'" value="'.$elemento5['telCasa'].'" placeholder="Teléfono Fijo">
            </div>
            <div class="form-group col-md-2">
              <input class="form-control" type="text" name="CliRefMov'.($count-1).'" value="'.$elemento5['telMovil'].'" placeholder="Teléfono Móvil">
            </div>
          </div>
          ';
        }
        $count++;
      }
     ?>



    <h3>Información para credito</h3>
    <hr>
    <div class="form-group row">
      <div class="form-group col-md-2">
        <p class="sMargen">Banco</p>
        <select class="form-control"  id="idBanco" name="cliBanco" value="" placeholder="Banco" onchange="CBanco(this.value)">
          <option selected="true" value="<?php echo $elemento3['banco']; ?>"><?php echo $elemento3['banco']; ?></option>
          <option value="Cofinavit">Cofinavit</option>
          <option value=">Santander persona moral">Santander persona moral</option>
          <option value="Santander">Santander</option>
          <option value="ScotianBank">ScotianBank</option>
          <option value="Afirme">Afirme</option>
          <option value="Banorte">Banorte</option>
          <option value="BanRegio">BanRegio</option>
          <option value="Hsbc">Hsbc</option>
        </select>
      </div>
      <div class="form-group col-md-2">
        <p class="sMargen">Monto de crédito</p>
        <input class="form-control" type="number" name="cliCredito" value="<?php echo $elemento3['credito']; ?>" placeholder="Crédito">
        <span id="error" class="invalid-feedback"></span>
      </div>
      <div class="form-group col-md-2">
        <p class="sMargen">Ingresos</p>
        <input class="form-control" type="number" name="cliSolicitud" value="<?php echo $elemento3['solicitud']; ?>" placeholder="Ingresos">
        <span id="error" class="invalid-feedback"></span>
      </div>
      <div class="form-group col-md-3" id="divPerfil">
        <p class="sMargen">Perfil</p>
        <select class="form-control" name="cliPerfil" value="<?php echo $elemento3['nombre']; ?>" placeholder="Perfil">
          <option selected="true" value="<?php echo $elemento3['nombre']; ?>"><?php echo $elemento3['nombre']; ?></option>
          <option value="Hipotecario en Confinanciamiento">Hipotecario en Confinanciamiento</option>
          <option value="Hipotecario Persona Fisica con Actividad Independiente">Hipotecario Persona Fisica con Actividad Independiente</option>
          <option value="Hipotecario Salario Fijo">Hipotecario Salario Fijo</option>
          <option value="COFINAVIT">COFINAVIT</option>
          <option value="Hipotecario Persona Fisica con Actividad Empresarial">Hipotecario Persona Fisica con Actividad Empresarial</option>
          <option value="Hipotecario Pensión">Hipotecario Pensión</option>
        </select>
      </div>
      <div class="form-group col-md-3" id="divActividad">
        <?php if ($elemento3[actividadEco] != ""): ?>
          <p class="sMargen">Perfil</p>
          <select class="form-control" name="cliActividad" value="<?php echo $elemento3['actividadEco']; ?>" placeholder="Perfil">
            <option selected="true" value="<?php echo $elemento3['actividadEco']; ?>"><?php echo $elemento3['actividadEco']; ?></option>
            <option value="Asalariados">Asalariados</option>
            <option value="Honorarios">Honorarios</option>
            <option value="Persona Fisica Actividad Emp">Persona Fisica Actividad Emp</option>
            <option value="Persona Fisica Accionista">Persona Fisica Accionista</option>
            <option value="Arrendadores">Arrendadores</option>
            <option value="EC Informall">EC Informal</option>
          </select>
        <?php endif; ?>
      </div>
    </div>
    <br>

    <div class="form-group row">
      <div class="form-group col-md-10">
        <p class="sMargen">Notas del cliente</p>
        <textarea class="form-control" name="cliNotas" rows="1" cols="50"><?php echo $elemento[notas]; ?></textarea>
      </div>
      <div class="form-group col-md-1"></div>
      <div class="form-group col-md-1">
        <p class="sMargen" style="color:#949494">Cliente</p>
        <button class="btn btn-success" type="submit" name="btnSiguiente">Guardar</button>
      </div>
    </div>




  </form>


  <div class="modal fade" id="deleteModal">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteModalLabel">Borrar</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body row">
          <div class="form-group col-md-12">
            <p class="sMargen">¿Esta seguro de borrar el registro: <?php echo $elemento[nombre]." ".$elemento[apellido]; ?>?</p>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-warning" type="button" data-dismiss="modal"  onclick="del('<?php echo $_GET[ref];?>', '<?php echo $elemento[find];?>')">Aceptar</button>
          <button class="btn btn-secundary" type="button" data-dismiss="modal">Cancelar</button>
        </div>
      </div>
    </div>
  </div>


</div>


<script src="../../recursos/js/CliGeneral.js"></script>
<script src="../../recursos/js/CliValidate.js"></script>
