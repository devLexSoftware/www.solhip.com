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

    $error_message = "Exito";
    $cli_estado = "Completo";

    if(empty($_POST['cliNombre']) ||
       empty($_POST['cliApellido']) ||
       empty($_POST['cliNss']) ||
       empty($_POST['cliFechNacimiento']) ||
       empty($_POST['cliNivAcademico']) ||

       //Datos de direccion
       empty($_POST['cliCalle']) ||
       empty($_POST['cliColonia']) ||
       empty($_POST['cliNumExt']) ||
       empty($_POST['cliCP']) ||
       empty($_POST['cliAntiguedad']) ||
       empty($_POST['cliTipo']) ||


       //Datos de localizacion
       empty($_POST['cliTelCasa']) ||
       empty($_POST['cliTelMovil']) ||
       empty($_POST['cliEmail']) ||

       //Informacion Laboral
       empty($_POST['cliEmpresaNombre']) ||
       empty($_POST['cliEmpresaPuesto']) ||
       empty($_POST['cliEmpresaCalle']) ||
       empty($_POST['cliEmpresaColonia']) ||
       empty($_POST['cliEmpresaNExt']) ||
       empty($_POST['cliEmpresaAnt']) ||
       empty($_POST['cliEmpresaTel']) ||

       //Informacion credito
       empty($_POST['cliBanco']) ||
       empty($_POST['cliCredito']) ||
       empty($_POST['cliSolicitud']) ||
       empty($_POST['cliPerfil'])) {
         $error_message = "Faltan campos";
         $cli_estado = "Sin completar";
        }

    //--Datos de usuario
    $cli_nom= $_POST['cliNombre'];
    $cli_ape = $_POST['cliApellido'];
    $cli_nss = $_POST['cliNss'];
    $cli_rfc = $_POST['cliRfc'];
    $cli_fechNac = $_POST['cliFechNacimiento'];
    $cli_NivAca = $_POST['cliNivAcademico'];

    //--Datos Direccion
    $cli_cal = $_POST['cliCalle'];
    $cli_col = $_POST['cliColonia'];
    $cli_NExt = $_POST['cliNumExt'];
    $cli_NInt = $_POST['cliNumInt'];
    $cli_cp = $_POST['cliCP'];    
    $cli_ant = $_POST['cliAntiguedad'];
    $cli_tipo = $_POST['cliTipo'];

    //--Datos Localizacion
    $cli_tel = $_POST['cliTelCasa'];
    $cli_mov = $_POST['cliTelMovil'];
    $cli_ema = $_POST['cliEmail'];

    //--Informacion laboral
    $cli_EmpNom = $_POST['cliEmpresaNombre'];
    $cli_EmpPue = $_POST['cliEmpresaPuesto'];
    $cli_EmpCal = $_POST['cliEmpresaCalle'];
    $cli_EmpCol = $_POST['cliEmpresaColonia'];
    $cli_EmpNExt = $_POST['cliEmpresaNExt'];
    $cli_EmpNInt = $_POST['cliEmpresaNInt'];
    $cli_EmpCp = $_POST['cliEmpresaCP'];
    $cli_EmpAnt = $_POST['cliEmpresaAnt'];
    $cli_EmpTel = $_POST['cliEmpresaTel'];
    $cli_EmpTelExt = $_POST['cliEmpresaTelExt'];

    //--Informacion credito
    $cli_Banco = $_POST['cliBanco'];
    $cli_Credito = $_POST['cliCredito'];
    $cli_Solicitud = $_POST['cliSolicitud'];
    $cli_Perfil = $_POST['cliPerfil'];

    if (isset($_POST['cliActividad'])) {
      $cli_Actividad = $_POST['cliActividad'];
    }
    else {
      $cli_Actividad = "";
    }

    //--cliNotas
    $cli_Notas = $_POST['cliNotas'];

    $_SESSION['nombre'] = "otro";
    $ref = $_GET["ref"];
    $ref2 = "Cli-".substr($cli_nom,0, 3).substr($cli_ape, 0, 3)."-".substr($cli_fechNac,2, 2).substr($cli_fechNac,5, 2).substr($cli_fechNac,8, 2);
    $find = $cli_nom." ".$cli_ape;
    //$find = str_replace(' ', '', $cli_nom).str_replace(' ', '', $cli_ape);


    //--Tomar el numero de dependientes, si cambio ir a la opcion dos
    if (isset($_POST['cliNDependientesAnterior'])) {
      $cli_NDepen = $_POST['cliNDependientesAnterior'];
    }
    else {
      $cli_NDepen = $_POST['cliNDependientes'];
      //--Para borrar los contactos en caso de actualizarlos
      $result = mysqli_query($con,"DELETE FROM Contactos WHERE pk_Cliente in
        (SELECT id FROM Clientes WHERE ref= '$ref') and (parentezco != 'Amigo' and parentezco != 'Familiar');");

        echo $cli_NDepen;
      $count = 0;
      while ($count < $cli_NDepen) {
        $cli_DepenPar= $_POST['cliContactoParentezco'.$count];
        $cli_DepenEda = $_POST['cliContactoEdad'.$count];
        $result = mysqli_query($con,"SELECT id FROM Clientes WHERE ref = '$ref'");
          $elemento = mysqli_fetch_array($result);
        $result = mysqli_query($con,"INSERT INTO Contactos(usuCreacion,pk_Cliente,parentezco,edad)
          VALUES('".$_SESSION['nombre']."', ".$elemento['id'].", '".$cli_DepenPar."', '".$cli_DepenEda."');");
        $count++;
      }
    }

    //--Actualizar clientes
    $result = mysqli_query($con,"UPDATE Clientes SET ref = '$ref2', nombre = '$cli_nom', apellido = '$cli_ape', fechNacimiento = '$cli_fechNac',
      nss = '$cli_nss', rfc = '$cli_rfc', estado = '$cli_estado', find = '$find', nivAcademico = '$cli_NivAca', nDependientes = '$cli_NDepen', notas = '$cli_Notas' WHERE ref = '$ref';  ");

    //--Actualizar direccion del cliente
    $result = mysqli_query($con,"UPDATE DatosLocalizacion SET calle = '$cli_cal', numInt = '$cli_NInt', numExt = '$cli_NExt', colonia = '$cli_col',
      cp = '$cli_cp', tipVivienda = '$cli_tipo', antVivienda = '$cli_ant', telCasa = '$cli_tel', telMovil = '$cli_mov', email = '$cli_ema' WHERE pk_cliente in (Select id from Clientes WHERE ref = '$ref2');  ");

    //--Actualizar informacion laboral
    $result = mysqli_query($con,"UPDATE DatosLaboral SET nomEmpresa = '$cli_EmpNom', pueEmpresa = '$cli_EmpPue', antEmpresa = '$cli_EmpAnt',
      calle = '$cli_EmpCal', numInt = '$cli_EmpNInt', numExt = '$cli_EmpNExt', colonia = '$cli_EmpCol', cp = '$cli_EmpCp', ext = '$cli_EmpTelExt', tel = '$cli_EmpTel'
      WHERE pk_cliente in (Select id from Clientes WHERE ref = '$ref2');  ");

    //--Actualizar perfil, se necesita borrar los documentos en caso de cambiar el tipo de perfil
    $result = mysqli_query($con,"SELECT PerfilCliente.id FROM PerfilCliente
      INNER JOIN Clientes ON PerfilCliente.pk_cliente = Clientes.id WHERE Clientes.ref = '$ref2' AND PerfilCliente.nombre = '$cli_Perfil'");
    $elemento = mysqli_fetch_array($result);
    if ($elemento['id'] == "") {
      $result = mysqli_query($con,"DELETE FROM DocumentosCliente WHERE pk_PerfilCliente in
        (SELECT id FROM PerfilCliente WHERE pk_Cliente in
          (SELECT id FROM Clientes WHERE ref = '$ref2'));");
      $result = mysqli_query($con,"SELECT PerfilCliente.id FROM PerfilCliente
        INNER JOIN Clientes ON PerfilCliente.pk_cliente = Clientes.id WHERE Clientes.ref = '$ref2'");
        $elemento = mysqli_fetch_array($result);
      $result = mysqli_query($con,"INSERT INTO DocumentosCliente(usuCreacion,pk_PerfilCliente) VALUES('".$_SESSION['nombre']."', ".$elemento['id'].");");
    }

    //--Actualizar perfil del cliente
    $result = mysqli_query($con,"UPDATE PerfilCliente SET banco = '$cli_Banco', credito = '$cli_Credito', solicitud = '$cli_Solicitud', nombre = '$cli_Perfil',
      actividadEco = '$cli_Actividad'
      WHERE pk_cliente in (Select id from Clientes WHERE ref = '$ref2');  ");

    //--Actualizar referencias
    $result = mysqli_query($con, "SELECT Contactos.id FROM Contactos
      INNER JOIN Clientes ON Clientes.id = Contactos.pk_Cliente WHERE Clientes.ref = '$ref2' AND (parentezco = 'Familiar' OR parentezco = 'Amigo');");


      $count = 0;
      $cli_ConParentezco = "Familiar";
      while ($elemento = mysqli_fetch_array($result)) {
        //--Insertar informacion Contactos
        $cli_ConNombre = $_POST['CliRefNombre'.$count];
        $cli_ConApellido = $_POST['CliRefApellido'.$count];
        $cli_ConTel = $_POST['CliRefTel'.$count];
        $cli_ConMov = $_POST['CliRefMov'.$count];

        $result1 = mysqli_query($con,"UPDATE Contactos SET nombre = '$cli_ConNombre', apellido = '$cli_ConApellido', telCasa = '$cli_ConTel', telMovil = '$cli_ConMov'
          WHERE id = $elemento[id]");
        if ($count == 1) {
          $cli_ConParentezco = "Amigo";
        }
        $count++;
      }

    //--Para crear aviso
    $result = mysqli_query($con,"INSERT INTO Avisos(mensaje,accion,usuario)
      VALUES('Se actualizo informacion del cliente: $find','actualizado','$_SESSION[usuario]');");

    if ($error_message == "Exito") {
      //----Formulario completado
      header("Location: ../../templates/index.php?p=csA&ref=".$ref);
    }
    else{
      //----Formulario incompleto
      header("Location: ../../templates/index.php?p=lc&ref=".$ref);
    }
  }
?>
