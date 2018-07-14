 <?php include("../config/bloque.php");

?>

 <div class="container-fluid">

   <!-- Breadcrumbs-->
   <ol class="breadcrumb">
     <li class="breadcrumb-item">
       <a href="#">Inicio</a>
     </li>
     <li class="breadcrumb-item active">Búsqueda</li>
   </ol>

   <h1>Resultados de la búsqueda</h1>
   <hr>

   <form role="form-horizontal" method="post" id="formCliente" autocomplete="off" name="ListClient">     
     <div class="" id="divTableClientes">
       <?php $origen = "bus"; include("tableClientes.php"); ?>
     </div>
  </form>
