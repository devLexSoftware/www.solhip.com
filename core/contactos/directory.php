<?php include("../config/bloque.php"); ?>

<div class="container-fluid">

  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="index.php?p=in">Inicio</a>
    </li>
    <li class="breadcrumb-item active">Directorio</li>
  </ol>

  <h1>Directorio</h1>
  <hr>
  <form role="form-horizontal" method="post" id="formDirectory" autocomplete="off" name="ListDirectory">

    <div class="card mb-3">
      <div class="card-header">
        <i class="fa fa-table"></i> Contactos</div>
      <div class="card-body">
        <div class="table-responsive" id="divTableDirectory">
          <?php include("templates/tableDirectory.php"); ?>
        </div>
      </div>
    </div>

  </form>

<script type="text/javascript">
    $(document).ready(function() {
      $('#tableList').DataTable();
    } );

</script>
