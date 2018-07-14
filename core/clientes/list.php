<?php include("../config/bloque.php"); ?>

<div class="container-fluid">

  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="index.php?p=in">Inicio</a>
    </li>
    <li class="breadcrumb-item active">Clientes</li>
  </ol>

  <h1>Clientes</h1>
  <hr>
  <form role="form-horizontal" method="post" id="formCliente" autocomplete="off" name="ListClient">    
    <button type="button" id="mostrar" name="boton1"  class="btn btn-outline-info">Filtros</button>
    <hr>
    
    <div class="form-group row" id="target" style="display: none;">
      <div class="form-group col-md-6">
        <p class="sMargen">Nombre cliente</p>
        <input class="form-control" type="text" name="filNombre" id="idfilNombre" value="" placeholder="Todos" onchange="filtrarListaClientes()">
        <span id="error" class="invalid-feedback"></span>
      </div>
      <div class="form-group col-md-2">
        <p class="sMargen">Estatus</p>
        <select class="form-control" name="filEstatus" id="idfilEstatus" value="Todos" onchange="filtrarListaClientes()">
          <option value="Todos">Todos</option>
          <option value="Sin completar">Sin completar</option>
          <option value="Sin perfil">Sin perfil</option>
          <option value="Sin documentos">Sin documentos</option>
          <option value="Completado">Completado</option>
        </select>
      </div>
      <div class="form-group col-md-2">
        <p class="sMargen">Banco</p>
        <select class="form-control" name="filBanco" id="idfilBanco" value="Todos" onchange="filtrarListaClientes()">
          <option value="Todos">Todos</option>
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
        <p class="sMargen">Perfil</p>
        <select class="form-control" name="filPerfil" id="idfilPerfil" value="Todos" onchange="filtrarListaClientes()">
          <option value="Todos">Todos</option>
          <option value="Hipotecario en Confinanciamiento">Hipotecario en Confinanciamiento</option>
          <option value="Hipotecario Persona Fisica con Actividad Independiente">Hipotecario Persona Fisica con Actividad Independiente</option>
          <option value="Hipotecario Salario Fijo">Hipotecario Salario Fijo</option>
          <option value="COFINAVIT">COFINAVIT</option>
          <option value="Hipotecario Persona Fisica con Actividad Empresarial">Hipotecario Persona Fisica con Actividad Empresarial</option>
          <option value="Hipotecario Pensión">Hipotecario Pensión</option>
        </select>
      </div>
    </div>

    <div class="card mb-3">
      <div class="card-header">
        <i class="fa fa-table"></i> Clientes</div>
      <div class="card-body">
        <div class="table-responsive" id="divTableClientes">
          <?php include("templates/tableClientes.php"); ?>
        </div>
      </div>
    </div>



  </form>

<script type="text/javascript">
    $(document).ready(function() {
      $('#tableList').DataTable();
    } );

</script>

<script type="text/javascript">
 $(document).ready(function() {
        $('#mostrar').click(function() {
                $('#target').slideToggle("fast");
        });
    });
</script>
