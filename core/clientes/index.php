<?php include("../config/bloque.php"); ?>
<div class="container-fluid">

  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="index.php?p=in">Inicio</a>
    </li>
    <li class="breadcrumb-item active">Clientes</li>
  </ol>


  <h1>Nuevo registro</h1>
  <hr>

  <form role="form-horizontal" method="post" id="formCliente" autocomplete="off" name="Cliente">

    <div class="form-group row ">
      <div class="form-group col-md-6">
        <p class="sMargen">Nombre cliente</p>
        <input class="form-control" type="text" name="cliNombre" value="" placeholder="Nombre">
        <span id="error" class="invalid-feedback"></span>
      </div>

      <div class="form-group col-md-6">
        <p class="sMargen">Apellido cliente</p>
        <input class="form-control" type="text" name="cliApellido" value="" placeholder="Apellido">
        <span id="error" class="invalid-feedback"></span>
      </div>
    </div>

    <div class="form-group row ">

      <div class="form-group col-md-2">
        <p class="sMargen">NSS</p>
        <input class="form-control" type="text" name="cliNss" value="" placeholder="NSS">
        <span id="error" class="invalid-feedback"></span>
      </div>

      <div class="form-group col-md-2">
        <p class="sMargen">RFC</p>
        <input class="form-control" type="text" name="cliRfc" value="" placeholder="RFC">
        <span id="error" class="invalid-feedback"></span>
      </div>
      <div class="form-group col-md-2">
        <p class="sMargen">Fecha Nacimiento</p>
        <input class="form-control" type="date" name="cliFechNacimiento" value="" placeholder="Fecha Nacimiento">
      </div>
      <div class="form-group col-md-6">
        <p class="sMargen">Nivel Académico</p>
        <input class="form-control" type="text" name="cliNivAcademico" value="" placeholder="Nivel Académico">
        <span id="error" class="invalid-feedback"></span>
      </div>
    </div>

    <br>
    <h3>Dirección</h3>
    <hr>
    <div class="form-group row">
      <div class="form-group col-md-6">
        <p class="sMargen">Calle</p>
        <input class="form-control" type="text" name="cliCalle" value="" placeholder="Calle">
        <span id="error" class="invalid-feedback"></span>
      </div>
      <div class="form-group col-md-6">
        <p class="sMargen">Colonia</p>
        <input class="form-control" type="text" name="cliColonia" value="" placeholder="Colonia">
        <span id="error" class="invalid-feedback"></span>
      </div>
      <div class="form-group col-md-1">
        <p class="sMargen"># Ext</p>
        <input class="form-control" type="number" min="0" name="cliNumExt" value="" placeholder="#">
        <span id="error" class="invalid-feedback"></span>
      </div>
      <div class="form-group col-md-1">
        <p class="sMargen"># Int</p>
        <input class="form-control" type="number" name="cliNumInt" value="" placeholder="#">
      </div>
      <div class="form-group col-md-2">
        <p class="sMargen">C.P.</p>
        <input class="form-control" type="number" min="0" name="cliCP" value="" placeholder="C.P.">
        <span id="error" class="invalid-feedback"></span>
      </div>
      <div class="form-group col-md-2">
        <p class="sMargen">Antigüedad</p>
        <input class="form-control" type="number" name="cliAntiguedad" value="" placeholder="Antigüedad">
        <span id="error" class="invalid-feedback"></span>
      </div>
      <div class="form-group col-md-6">
        <p class="sMargen">Tipo de vivienda</p>
        <select class="form-control" name="cliTipo" value="" placeholder="Tipo vivienda">
          <option selected="true" value="Familiar">Familiar</option>
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
        <input class="form-control" type="text" name="cliTelCasa" value="" placeholder="Fijo">
        <span id="error" class="invalid-feedback"></span>
      </div>
      <div class="form-group col-md-2">
        <p class="sMargen">Teléfono Móvil</p>
        <input class="form-control" type="text" name="cliTelMovil" value="" placeholder="Móvil">
        <span id="error" class="invalid-feedback"></span>
      </div>
      <div class="form-group col-md-2">
        <p class="sMargen">Correo</p>
        <input class="form-control" type="email" name="cliEmail" value="" placeholder="Email">
        <span id="error" class="invalid-feedback"></span>
      </div>
    </div>
    <br>
    <h3>Información Complementaria</h3>
    <hr>

    <div class="form-group row">
      <div class="form-group col-md-2">
        <p class="sMargen">Dependientes Económicos</p>
        <select class="form-control" name="cliNDependientes" value="0" placeholder="Dependientes" onchange="CDependientes(this.value)">
          <option value="0">0</option>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
          <option value="6">6</option>
          <option value="7">7</option>
          <option value="8">8</option>
        </select>
      </div>
    </div>

    <div id="divDependientes">
    </div>

    <br>
    <h3>Información Laboral</h3>
    <hr>
    <div class="form-group row">
      <div class="form-group col-md-8">
        <p class="sMargen">Nombre de la Empresa</p>
        <input class="form-control" type="text" name="cliEmpresaNombre" value="" placeholder="Nombre de la empresa">
        <span id="error" class="invalid-feedback"></span>
      </div>
      <div class="form-group col-md-4">
        <p class="sMargen">Puesto en la Empresa</p>
        <input class="form-control" type="text" name="cliEmpresaPuesto" value="" placeholder="Puesto que desempeña">
        <span id="error" class="invalid-feedback"></span>
      </div>
      <div class="form-group col-md-6">
        <p class="sMargen">Calle</p>
        <input class="form-control" type="text" name="cliEmpresaCalle" value="" placeholder="Calle">
        <span id="error" class="invalid-feedback"></span>
      </div>
      <div class="form-group col-md-6">
        <p class="sMargen">Colonia</p>
        <input class="form-control" type="text" name="cliEmpresaColonia" value="" placeholder="Colonia">
        <span id="error" class="invalid-feedback"></span>
      </div>
      <div class="form-group col-md-1">
        <p class="sMargen"># Ext</p>
        <input class="form-control" type="number" name="cliEmpresaNExt" value="" placeholder="#">
        <span id="error" class="invalid-feedback"></span>
      </div>
      <div class="form-group col-md-1">
        <p class="sMargen"># Int</p>
        <input class="form-control" type="number" name="cliEmpresaNInt" value="" placeholder="#">
        <span id="error" class="invalid-feedback"></span>
      </div>
      <div class="form-group col-md-2">
        <p class="sMargen">C.P.</p>
        <input class="form-control" type="number" name="cliEmpresaCP" value="" placeholder="C.P.">
        <span id="error" class="invalid-feedback"></span>
      </div>
      <div class="form-group col-md-2">
        <p class="sMargen">Antigüedad</p>
        <input class="form-control" type="number" name="cliEmpresaAnt" value="" placeholder="Antigüedad">
        <span id="error" class="invalid-feedback"></span>
      </div>
      <div class="form-group col-md-2">
        <p class="sMargen">Teléfono</p>
        <input class="form-control" type="number" name="cliEmpresaTel" value="" placeholder="Teléfono">
        <span id="error" class="invalid-feedback"></span>
      </div>
      <div class="form-group col-md-1">
        <p class="sMargen">Extensión</p>
        <input class="form-control" type="number" name="cliEmpresaTelExt" value="" placeholder="Ext.">
        <span id="error" class="invalid-feedback"></span>
      </div>
    </div>

    <br>
    <h3>Referencias</h3>
    <hr>

    <h5>Familiar 1</h5>
    <div class="form-group row">
      <div class="form-group col-md-6">
        <input class="form-control" type="text" name='CliRefNombre0' value="" placeholder="Nombre">
        <span id="error" class="invalid-feedback"></span>
      </div>
      <div class="form-group col-md-6">
        <input class="form-control" type="text" name='CliRefApellido0' value="" placeholder="Apellido">
        <span id="error" class="invalid-feedback"></span>
      </div>
      <div class="form-group col-md-2">
        <input class="form-control" type="number" name='CliRefTel0' value="" placeholder="Teléfono Fijo">
        <span id="error" class="invalid-feedback"></span>
      </div>
      <div class="form-group col-md-2">
        <input class="form-control" type="number" name='CliRefMov0' value="" placeholder="Teléfono Móvil">
        <span id="error" class="invalid-feedback"></span>
      </div>
    </div>
    <h5>Familiar 2</h5>
    <div class="form-group row">
      <div class="form-group col-md-6">
        <input class="form-control" type="text" name='CliRefNombre1' value="" placeholder="Nombre">
        <span id="error" class="invalid-feedback"></span>
      </div>
      <div class="form-group col-md-6">
        <input class="form-control" type="text" name='CliRefApellido1' value="" placeholder="Apellido">
        <span id="error" class="invalid-feedback"></span>
      </div>
      <div class="form-group col-md-2">
        <input class="form-control" type="number" name='CliRefTel1' value="" placeholder="Teléfono Fijo">
        <span id="error" class="invalid-feedback"></span>
      </div>
      <div class="form-group col-md-2">
        <input class="form-control" type="number" name='CliRefMov1' value="" placeholder="Teléfono Móvil">
        <span id="error" class="invalid-feedback"></span>
      </div>
    </div>
    <hr>
    <h5>Amigo 1</h5>
    <div class="form-group row">
      <div class="form-group col-md-6">
        <input class="form-control" type="text" name='CliRefNombre2' value="" placeholder="Nombre">
        <span id="error" class="invalid-feedback"></span>
      </div>
      <div class="form-group col-md-6">
        <input class="form-control" type="text" name='CliRefApellido2' value="" placeholder="Apellido">
        <span id="error" class="invalid-feedback"></span>
      </div>
      <div class="form-group col-md-2">
        <input class="form-control" type="number" name='CliRefTel2' value="" placeholder="Teléfono Fijo">
        <span id="error" class="invalid-feedback"></span>
      </div>
      <div class="form-group col-md-2">
        <input class="form-control" type="number" name='CliRefMov2' value="" placeholder="Teléfono Móvil">
        <span id="error" class="invalid-feedback"></span>
      </div>
    </div>
    <h5>Amigo 2</h5>
    <div class="form-group row">
      <div class="form-group col-md-6">
        <input class="form-control" type="text" name='CliRefNombre3' value="" placeholder="Nombre">
        <span id="error" class="invalid-feedback"></span>
      </div>
      <div class="form-group col-md-6">
        <input class="form-control" type="text" name='CliRefApellido3' value="" placeholder="Apellido">
        <span id="error" class="invalid-feedback"></span>
      </div>
      <div class="form-group col-md-2">
        <input class="form-control" type="number" name='CliRefTel3' value="" placeholder="Teléfono Fijo">
        <span id="error" class="invalid-feedback"></span>
      </div>
      <div class="form-group col-md-2">
        <input class="form-control" type="number" name='CliRefMov3' value="" placeholder="Teléfono Móvil">
        <span id="error" class="invalid-feedback"></span>
      </div>
    </div>

    <h3>Información para credito</h3>
    <hr>
    <div class="form-group row">
      <div class="form-group col-md-2">
        <p class="sMargen">Banco</p>
        <select class="form-control" id="idBanco" name="cliBanco" value="" placeholder="Banco" onchange="CBanco(this.value)">
          <option selected="true" disabled="disabled">Banco</option>
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
        <input class="form-control" type="number" name="cliCredito" value="" placeholder="Crédito">
        <span id="error" class="invalid-feedback"></span>
      </div>
      <div class="form-group col-md-2">
        <p class="sMargen">Solicitud de crédito</p>
        <input class="form-control" type="number" name="cliSolicitud" value="" placeholder="Solicitud">
        <span id="error" class="invalid-feedback"></span>
      </div>
      <div class="form-group col-md-3" id="divPerfil">
        <p class="sMargen">Perfil</p>
        <select class="form-control" name="cliPerfil" value="" placeholder="Perfil">
          <option selected="true" disabled="disabled">Perfil</option>
          <option value="Hipotecario en Confinanciamiento">Hipotecario en Confinanciamiento</option>
          <option value="Hipotecario Persona Fisica con Actividad Independiente">Hipotecario Persona Fisica con Actividad Independiente</option>
          <option value="Hipotecario Salario Fijo">Hipotecario Salario Fijo</option>
          <option value="COFINAVIT">COFINAVIT</option>
          <option value="Hipotecario Persona Fisica con Actividad Empresarial">Hipotecario Persona Fisica con Actividad Empresarial</option>
          <option value="Hipotecario Pensión">Hipotecario Pensión</option>
        </select>
        <span id="error" class="invalid-feedback"></span>
      </div>
      <div class="form-group col-md-3" id="divActividad">
      </div>
    </div>
    <br>

    <div class="form-group row">
      <div class="form-group col-md-10">
        <p class="sMargen">Notas del cliente</p>
        <textarea class="form-control" name="cliNotas" rows="1" cols="50"></textarea>
      </div>
      <div class="form-group col-md-1"></div>
      <div class="form-group col-md-1">
        <p class="sMargen" style="color:#949494">Cliente</p>
        <button class="btn btn-success" type="submit" name="btnSiguiente">Guardar</button>
      </div>
    </div>

  </form>


<!--
  <a class="btn btn-primary" href="#" id="toggleNavPosition">Toggle Fixed/Static Navbar</a>
  <a class="btn btn-primary" href="#" id="toggleNavColor">Toggle Navbar Color</a>
   Blank div to give the page height to preview the fixed vs. static navbar-->
</div>

    <script src="../../recursos/js/CliGeneral.js"></script>
    <script src="../../recursos/js/CliValidate.js"></script>



<!--


-->
