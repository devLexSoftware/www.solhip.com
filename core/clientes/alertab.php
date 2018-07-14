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
    }
 ?>


 <div class="modal fade" id="ModalBorrado" tabindex="-1" role="dialog" aria-labelledby="ModalBorradoLabel" aria-hidden="true" >
   <div class="modal-dialog" role="document" >
     <div class="modal-content" >
       <div class="modal-header">
         <h5 class="modal-title" id="ModalBorradoLabel">Aviso</h5>
         <button class="close" type="button" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">×</span>
         </button>
       </div>
       <div class="modal-body">Se borro el cliente: <?php echo $ref;?></div>
       <div class="modal-footer">
         <button class="btn btn-primary" type="button" data-dismiss="modal">Aceptar</button>
       </div>
     </div>
   </div>
 </div>
