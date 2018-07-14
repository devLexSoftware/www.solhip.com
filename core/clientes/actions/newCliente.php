<?php
include("../../config/conexion.php");
session_start();
/*function died($error) {
        echo "Lo sentimos, hubo un error en sus datos y el formulario no puede ser enviado en este momento. ";
        echo "Detalle de los errores.<br /><br />";
        echo $error."<br /><br />";
        echo "Por favor corrija estos errores e inténtelo de nuevo.<br /><br />";
        die();
    }*/
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
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
       empty($_POST['cliEmpresaNInt']) ||
       empty($_POST['cliEmpresaCP']) ||
       empty($_POST['cliEmpresaAnt']) ||
       empty($_POST['cliEmpresaTel']) ||
       empty($_POST['cliEmpresaTelExt']) ||

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

    $cli_NDepen = $_POST['cliNDependientes'];

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

    //--Insertar nuevo usuario
    $ref = "Cli-".substr($cli_nom,0, 3).substr($cli_ape, 0, 3)."-".substr($cli_fechNac,2, 2).substr($cli_fechNac,5, 2).substr($cli_fechNac,8, 2);
    $find = $cli_nom." ".$cli_ape;
    //$find = str_replace(' ', '', $cli_nom).str_replace(' ', '', $cli_ape);
    $result = mysqli_query($con,"INSERT INTO Clientes(usuCreacion,ref,nombre,apellido,fechNacimiento,nss,rfc,estado,find,nivAcademico,nDependientes,notas)
      VALUES('".$_SESSION['nombre']."', '".$ref."', '".$cli_nom."', '".$cli_ape."','".$cli_fechNac."', '".$cli_nss."','".$cli_rfc."', '".$cli_estado."', '".$find."', '".$cli_NivAca."', ".$cli_NDepen.", '".$cli_Notas."' );");
    $id = mysqli_insert_id($con);
    echo $id;

    //--Insertar direccion de usuario
    $result = mysqli_query($con,"INSERT INTO DatosLocalizacion(usuCreacion,pk_Cliente,calle,numInt,numExt,colonia,cp,tipVivienda,antVivienda,telCasa,telMovil,email)
      VALUES('".$_SESSION['nombre']."', ".$id.", '".$cli_cal."', '".$cli_NInt."', '".$cli_NExt."', '".$cli_col."', '".$cli_cp."', '".$cli_tipo."','".$cli_ant."','".$cli_tel."', '".$cli_mov."' ,'".$cli_ema."'  );");

    //--Insertar información Dependientes
    //--Datos de Dependientes

    $count = 0;
    while ($count < $cli_NDepen) {
      $cli_DepenPar= $_POST['cliContactoParentezco'.$count];
      $cli_DepenEda = $_POST['cliContactoEdad'.$count];
      $result = mysqli_query($con,"INSERT INTO Contactos(usuCreacion,pk_Cliente,parentezco,edad)
        VALUES('".$_SESSION['nombre']."', ".$id.", '".$cli_DepenPar."', '".$cli_DepenEda."');");
      $count++;
    }

    //--Insertar informacion laboral
    $result = mysqli_query($con,"INSERT INTO DatosLaboral(usuCreacion,pk_Cliente,nomEmpresa,pueEmpresa,antEmpresa,calle,numInt,numExt,colonia,cp,ext,tel)
      VALUES('".$_SESSION['nombre']."',".$id.", '".$cli_EmpNom."', '".$cli_EmpPue."', '".$cli_EmpAnt."', '".$cli_EmpCal."','".$cli_EmpNInt."',
      '".$cli_EmpNExt."','".$cli_EmpCol."','".$cli_EmpCp."','".$cli_EmpTelExt."','".$cli_EmpTel."' )");

    //--Insertar informacion Contactos
    $count = 0;
    $cli_ConParentezco = "Familiar";
    while ($count < 4) {
      $cli_ConNombre = $_POST['CliRefNombre'.$count];
      $cli_ConApellido = $_POST['CliRefApellido'.$count];
      $cli_ConTel = $_POST['CliRefTel'.$count];
      $cli_ConMov = $_POST['CliRefMov'.$count];
      $result = mysqli_query($con,"INSERT INTO Contactos(usuCreacion,pk_Cliente,nombre,apellido,parentezco,telCasa,telMovil)
        VALUES('".$_SESSION['nombre']."', ".$id.", '".$cli_ConNombre."', '".$cli_ConApellido."','".$cli_ConParentezco."','".$cli_ConTel."','".$cli_ConMov."');");
      if ($count == 1) {
        $cli_ConParentezco = "Amigo";
      }
      $count++;
    }

    //--Insertar informacion de perfil
    $result = mysqli_query($con,"INSERT INTO PerfilCliente(usuCreacion,pk_Cliente,banco,credito,solicitud,nombre,actividadEco)
      VALUES('".$_SESSION['nombre']."', ".$id.", '".$cli_Banco."', '".$cli_Credito."','".$cli_Solicitud."', '".$cli_Perfil."', '".$cli_Actividad."');");
    $id_Perfil = mysqli_insert_id($con);

    $result = mysqli_query($con,"INSERT INTO DocumentosCliente(usuCreacion,pk_PerfilCliente)
      VALUES('".$_SESSION['nombre']."', ".$id_Perfil.");");

    //--Para crear aviso
    $result = mysqli_query($con,"INSERT INTO Avisos(mensaje, accion,usuario)
      VALUES('Se agrego el cliente: $find','nuevo','$_SESSION[usuario]');");

    if ($error_message == "Exito") {
      //---Faltan campos
    header("Location: ../../templates/index.php?p=cS&ref=".$ref);
    }
    else{
      //---Añadir docomentos
      header("Location: ../../templates/index.php?p=cf&ref=".$ref);
    }

  }
?>
