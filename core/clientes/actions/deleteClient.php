<?php
include("../../config/conexion.php");


error_reporting(E_ALL);
ini_set('display_errors', '1');

session_start();
/*function died($error) {
        echo "Lo sentimos, hubo un error en sus datos y el formulario no puede ser enviado en este momento. ";
        echo "Detalle de los errores.<br /><br />";
        echo $error."<br /><br />";
        echo "Por favor corrija estos errores e inténtelo de nuevo.<br /><br />";
        die();
    }*/

$con = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
  if (mysqli_connect_errno()) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
  }
  else {
      $ref = $_POST["ref"];
      $usuario = $_POST["nom"];

      $result = mysqli_query($con,"SET FOREIGN_KEY_CHECKS=0;");

      $result = mysqli_query($con,"DELETE DocumentosCliente, PerfilCliente, Contactos, DatosLocalizacion, Clientes FROM Clientes
        LEFT JOIN PerfilCliente ON PerfilCliente.pk_Cliente = Clientes.id
        LEFT JOIN DocumentosCliente ON DocumentosCliente.pk_PerfilCliente = PerfilCliente.id
        LEFT JOIN Contactos ON Contactos.pk_Cliente = Clientes.id
        LEFT JOIN DatosLocalizacion ON DatosLocalizacion.pk_Cliente = Clientes.id
        WHERE Clientes.ref = '$ref';");

      //--Para crear aviso
      $result = mysqli_query($con,"INSERT INTO Avisos(mensaje,accion,usuario)
        VALUES('Se dio de baja el usuario: $usuario','baja','$_SESSION[usuario]');");

      $result = mysqli_query($con,"SET FOREIGN_KEY_CHECKS=1;");
  }
