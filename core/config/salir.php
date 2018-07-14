<?php
    include("conexion.php");
    session_start();
    $con = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
    $result = mysqli_query($con,"UPDATE RegistroUsuarios SET estatus = 0 WHERE id = ".$_SESSION['pk']." ");    
    session_destroy();
    header('location: ../../index.php');
?>
