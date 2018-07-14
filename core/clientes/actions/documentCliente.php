<?php
include("../../config/conexion.php");
session_start();


//--Para checar si ya existe el registro
$con = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
  if (mysqli_connect_errno()) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
  }
  else {

    $ref = $_GET['ref'];
    //--cliNotas
    $cli_Notas = $_POST['cliNotas'];
    $completo = 0;

    //--Para obtener el id del documento y el nombre del perfil
    $result = mysqli_query($con,"SELECT DocumentosCliente.id, DocumentosCliente.notas, PerfilCliente.nombre, PerfilCliente.actividadEco FROM DocumentosCliente
      INNER JOIN PerfilCliente ON PerfilCliente.id = DocumentosCliente.pk_PerfilCliente
      INNER JOIN Clientes ON  PerfilCliente.pk_Cliente = Clientes.id WHERE Clientes.ref = '".$ref."'");
    $elemento = mysqli_fetch_array($result);


    if ($elemento[actividadEco] == null) {
    switch ($elemento['nombre']) {
      case 'Hipotecario Salario Fijo':
      case 'Hipotecario en Confinanciamiento':
            //--Variables
            if(isset($_POST['solCreBancarioORI'])) {$solCreBancarioORI = 1;} else {$solCreBancarioORI = 0; $completo++;}
            if(isset($_POST['solCreBancarioCOP'])) {$solCreBancarioCOP = 1;} else {$solCreBancarioCOP = 0; $completo++;}

            if(isset($_POST['autTraCreditoORI'])) {$autTraCreditoORI = 1;} else {$autTraCreditoORI = 0; $completo++;}
            if(isset($_POST['autTraCreditoCOP'])) {$autTraCreditoCOP = 1;} else {$autTraCreditoCOP = 0; $completo++;}

            if(isset($_POST['autBurCreditoORI'])) {$autBurCreditoORI = 1;} else {$autBurCreditoORI = 0; $completo++;}
            if(isset($_POST['autBurCreditoCOP'])) {$autBurCreditoCOP = 1;} else {$autBurCreditoCOP = 0; $completo++;}

            if(isset($_POST['docActNacimientoORI'])) {$docActNacimientoORI = 1;} else {$docActNacimientoORI = 0; $completo++;}
            if(isset($_POST['docActNacimientoCOP'])) {$docActNacimientoCOP = 1;} else {$docActNacimientoCOP = 0; $completo++;}
            if($_POST['docActNacimientoCAN'] != "") {$docActNacimientoCAN = $_POST['docActNacimientoCAN'];} else {$docActNacimientoCAN = 0;}

            if(isset($_POST['docActMatrimonioORI'])) {$docActMatrimonioORI = 1;} else {$docActMatrimonioORI = 0; $completo++;}
            if(isset($_POST['docActMatrimonioCOP'])) {$docActMatrimonioCOP = 1;} else {$docActMatrimonioCOP = 0; $completo++;}
            if($_POST['docActMatrimonioCAN'] != "") {$docActMatrimonioCAN = $_POST['docActMatrimonioCAN'];} else {$docActMatrimonioCAN = 0;}

            if(isset($_POST['docIdentificacionORI'])) {$docIdentificacionORI = 1;} else {$docIdentificacionORI = 0; $completo++;}
            if(isset($_POST['docIdentificacionCOP'])) {$docIdentificacionCOP = 1;} else {$docIdentificacionCOP = 0; $completo++;}

            if(isset($_POST['docRfcORI'])) {$docRfcORI = 1;} else {$docRfcORI = 0; $completo++;}
            if(isset($_POST['docRfcCOP'])) {$docRfcCOP = 1;} else {$docRfcCOP = 0; $completo++;}

            if(isset($_POST['docCurpORI'])) {$docCurpORI = 1;} else {$docCurpORI = 0; $completo++;}
            if(isset($_POST['docCurpCOP'])) {$docCurpCOP = 1;} else {$docCurpCOP = 0; $completo++;}

            if(isset($_POST['docComDomicilioORI'])) {$docComDomicilioORI = 1;} else {$docComDomicilioORI = 0; $completo++;}
            if(isset($_POST['docComDomicilioCOP'])) {$docComDomicilioCOP = 1;} else {$docComDomicilioCOP = 0; $completo++;}

            if(isset($_POST['docPatronalORI'])) {$docPatronalORI = 1;} else {$docPatronalORI = 0; $completo++;}
            if(isset($_POST['docPatronalCOP'])) {$docPatronalCOP = 1;} else {$docPatronalCOP = 0; $completo++;}

            if(isset($_POST['docNominaORI'])) {$docNominaORI = 1;} else {$docNominaORI = 0; $completo++;}
            if(isset($_POST['docNominaCOP'])) {$docNominaCOP = 1;} else {$docNominaCOP = 0; $completo++;}
            if($_POST['docNominaCAN'] != "") {$docNominaCAN = $_POST['docNominaCAN'];} else {$docNominaCAN = 0;}

            if(isset($_POST['docEstCuentaORI'])) {$docEstCuentaORI = 1;} else {$docEstCuentaORI = 0; $completo++;}
            if(isset($_POST['docEstCuentaCOP'])) {$docEstCuentaCOP = 1;} else {$docEstCuentaCOP = 0; $completo++;}
            if($_POST['docEstCuentaCAN'] != "") {$docEstCuentaCAN = $_POST['docEstCuentaCAN'];} else {$docEstCuentaCAN = 0;}

            if ($completo == 0 ) {
              $completo = "Completo";
            }
            else {
              $completo = "Sin completar";
            }
            //--Para ingresa
            if (isset($elemento['id'])){
              $result = mysqli_query($con,"UPDATE DocumentosCliente SET solCreBancarioORI = $solCreBancarioORI, solCreBancarioCOP = $solCreBancarioCOP, autTraCreditoORI = $autTraCreditoORI, autTraCreditoCOP = $autTraCreditoCOP,
                autBurCreditoORI = $autBurCreditoORI, autBurCreditoCOP = $autBurCreditoCOP, docActNacimientoORI = $docActNacimientoORI, docActNacimientoCOP = $docActNacimientoCOP, docActNacimientoCAN = $docActNacimientoCAN,
                docActMatrimonioORI = $docActMatrimonioORI, docActMatrimonioCOP = $docActMatrimonioCOP, docActMatrimonioCAN = $docActMatrimonioCAN, docIdentificacionORI = $docIdentificacionORI, docIdentificacionCOP = $docIdentificacionCOP,
                docRfcORI = $docRfcORI, docRfcCOP = $docRfcCOP, docCurpORI = $docCurpORI, docCurpCOP = $docCurpCOP, docComDomicilioORI = $docComDomicilioORI, docComDomicilioCOP = $docComDomicilioCOP,
                docPatronalORI = $docPatronalORI, docPatronalCOP = $docPatronalCOP, docNominaORI = $docNominaORI, docNominaCOP = $docNominaCOP, docNominaCAN = $docNominaCAN, docEstCuentaORI = $docEstCuentaORI, docEstCuentaCOP = $docEstCuentaCOP, docEstCuentaCAN = $docEstCuentaCAN,
                estatus = '".$completo."', notas = '".$cli_Notas."' WHERE id = ".$elemento['id']."");
            }
        break;


      case 'Hipotecario Persona Fisica con Actividad Independiente':
          //--Variables
          if(isset($_POST['solCreBancarioORI'])) {$solCreBancarioORI = 1;} else {$solCreBancarioORI = 0; $completo++;}
          if(isset($_POST['solCreBancarioCOP'])) {$solCreBancarioCOP = 1;} else {$solCreBancarioCOP = 0; $completo++;}

          if(isset($_POST['autTraCreditoORI'])) {$autTraCreditoORI = 1;} else {$autTraCreditoORI = 0; $completo++;}
          if(isset($_POST['autTraCreditoCOP'])) {$autTraCreditoCOP = 1;} else {$autTraCreditoCOP = 0; $completo++;}

          if(isset($_POST['autBurCreditoORI'])) {$autBurCreditoORI = 1;} else {$autBurCreditoORI = 0; $completo++;}
          if(isset($_POST['autBurCreditoCOP'])) {$autBurCreditoCOP = 1;} else {$autBurCreditoCOP = 0; $completo++;}

          if(isset($_POST['docActNacimientoORI'])) {$docActNacimientoORI = 1;} else {$docActNacimientoORI = 0; $completo++;}
          if(isset($_POST['docActNacimientoCOP'])) {$docActNacimientoCOP = 1;} else {$docActNacimientoCOP = 0; $completo++;}
          if($_POST['docActNacimientoCAN'] != "") {$docActNacimientoCAN = $_POST['docActNacimientoCAN'];} else {$docActNacimientoCAN = 0;}

          if(isset($_POST['docActMatrimonioORI'])) {$docActMatrimonioORI = 1;} else {$docActMatrimonioORI = 0; $completo++;}
          if(isset($_POST['docActMatrimonioCOP'])) {$docActMatrimonioCOP = 1;} else {$docActMatrimonioCOP = 0; $completo++;}
          if($_POST['docActMatrimonioCAN'] != "") {$docActMatrimonioCAN = $_POST['docActMatrimonioCAN'];} else {$docActMatrimonioCAN = 0;}

          if(isset($_POST['docIdentificacionORI'])) {$docIdentificacionORI = 1;} else {$docIdentificacionORI = 0; $completo++;}
          if(isset($_POST['docIdentificacionCOP'])) {$docIdentificacionCOP = 1;} else {$docIdentificacionCOP = 0; $completo++;}

          if(isset($_POST['docRfcORI'])) {$docRfcORI = 1;} else {$docRfcORI = 0; $completo++;}
          if(isset($_POST['docRfcCOP'])) {$docRfcCOP = 1;} else {$docRfcCOP = 0; $completo++;}

          if(isset($_POST['docCurpORI'])) {$docCurpORI = 1;} else {$docCurpORI = 0; $completo++;}
          if(isset($_POST['docCurpCOP'])) {$docCurpCOP = 1;} else {$docCurpCOP = 0; $completo++;}

          if(isset($_POST['docComDomicilioORI'])) {$docComDomicilioORI = 1;} else {$docComDomicilioORI = 0; $completo++;}
          if(isset($_POST['docComDomicilioCOP'])) {$docComDomicilioCOP = 1;} else {$docComDomicilioCOP = 0; $completo++;}

          if(isset($_POST['docNominaORI'])) {$docNominaORI = 1;} else {$docNominaORI = 0; $completo++;}
          if(isset($_POST['docNominaCOP'])) {$docNominaCOP = 1;} else {$docNominaCOP = 0; $completo++;}
          if($_POST['docNominaCAN'] != "") {$docNominaCAN = $_POST['docNominaCAN'];} else {$docNominaCAN = 0;}

          if ($completo == 0 ) {
            $completo = "Completo";
          }
          else {
            $completo = "Incompleto";
          }
          //--Para ingresa
          if (isset($elemento['id'])){
            $result = mysqli_query($con,"UPDATE DocumentosCliente SET solCreBancarioORI = $solCreBancarioORI, solCreBancarioCOP = $solCreBancarioCOP, autTraCreditoORI = $autTraCreditoORI, autTraCreditoCOP = $autTraCreditoCOP,
              autBurCreditoORI = $autBurCreditoORI, autBurCreditoCOP = $autBurCreditoCOP, docActNacimientoORI = $docActNacimientoORI, docActNacimientoCOP = $docActNacimientoCOP, docActNacimientoCAN = $docActNacimientoCAN,
              docActMatrimonioORI = $docActMatrimonioORI, docActMatrimonioCOP = $docActMatrimonioCOP, docActMatrimonioCAN = $docActMatrimonioCAN, docIdentificacionORI = $docIdentificacionORI, docIdentificacionCOP = $docIdentificacionCOP,
              docRfcORI = $docRfcORI, docRfcCOP = $docRfcCOP, docCurpORI = $docCurpORI, docCurpCOP = $docCurpCOP, docComDomicilioORI = $docComDomicilioORI, docComDomicilioCOP = $docComDomicilioCOP,
              docNominaORI = $docNominaORI, docNominaCOP = $docNominaCOP, docNominaCAN = $docNominaCAN,
              estatus = '".$completo."', notas = '".$cli_Notas."' WHERE id = ".$elemento['id']."");
          }
      break;

      case 'COFINAVIT':

          //--Variables
          if(isset($_POST['docActNacimientoORI'])) {$docActNacimientoORI = 1;} else {$docActNacimientoORI = 0; $completo++;}
          if(isset($_POST['docActNacimientoCOP'])) {$docActNacimientoCOP = 1;} else {$docActNacimientoCOP = 0; $completo++;}
          if($_POST['docActNacimientoCAN'] != "") {$docActNacimientoCAN = $_POST['docActNacimientoCAN'];} else {$docActNacimientoCAN = 0;}

          if(isset($_POST['docActMatrimonioORI'])) {$docActMatrimonioORI = 1;} else {$docActMatrimonioORI = 0; $completo++;}
          if(isset($_POST['docActMatrimonioCOP'])) {$docActMatrimonioCOP = 1;} else {$docActMatrimonioCOP = 0; $completo++;}
          if($_POST['docActMatrimonioCAN'] != "") {$docActMatrimonioCAN = $_POST['docActMatrimonioCAN'];} else {$docActMatrimonioCAN = 0;}

          if(isset($_POST['docRfcORI'])) {$docRfcORI = 1;} else {$docRfcORI = 0; $completo++;}
          if(isset($_POST['docRfcCOP'])) {$docRfcCOP = 1;} else {$docRfcCOP = 0; $completo++;}

          if(isset($_POST['docCurpORI'])) {$docCurpORI = 1;} else {$docCurpORI = 0; $completo++;}
          if(isset($_POST['docCurpCOP'])) {$docCurpCOP = 1;} else {$docCurpCOP = 0; $completo++;}

          if(isset($_POST['autCreHipInfonavitORI'])) {$autCreHipInfonavitORI = 1;} else {$autCreHipInfonavitORI = 0; $completo++;}
          if(isset($_POST['autCreHipInfonavitCOP'])) {$autCreHipInfonavitCOP = 1;} else {$autCreHipInfonavitCOP = 0; $completo++;}

          if(isset($_POST['docAvaComercialORI'])) {$docAvaComercialORI = 1;} else {$docAvaComercialORI = 0; $completo++;}
          if(isset($_POST['docAvaComercialCOP'])) {$docAvaComercialCOP = 1;} else {$docAvaComercialCOP = 0; $completo++;}

          if(isset($_POST['solDicTecnicoORI'])) {$solDicTecnicoORI = 1;} else {$solDicTecnicoORI = 0; $completo++;}
          if(isset($_POST['solDicTecnicoCOP'])) {$solDicTecnicoCOP = 1;} else {$solDicTecnicoCOP = 0; $completo++;}

          if(isset($_POST['docIdeFirmadaORI'])) {$docIdeFirmadaORI = 1;} else {$docIdeFirmadaORI = 0; $completo++;}
          if(isset($_POST['docIdeFirmadaCOP'])) {$docIdeFirmadaCOP = 1;} else {$docIdeFirmadaCOP = 0; $completo++;}

          if(isset($_POST['docLisNominalORI'])) {$docLisNominalORI = 1;} else {$docLisNominalORI = 0; $completo++;}
          if(isset($_POST['docLisNominalCOP'])) {$docLisNominalCOP = 1;} else {$docLisNominalCOP = 0; $completo++;}

          if(isset($_POST['docConPropiedadORI'])) {$docConPropiedadORI = 1;} else {$docConPropiedadORI = 0; $completo++;}
          if(isset($_POST['docConPropiedadCOP'])) {$docConPropiedadCOP = 1;} else {$docConPropiedadCOP = 0; $completo++;}

          if(isset($_POST['docPreConfinavitORI'])) {$docPreConfinavitORI = 1;} else {$docPreConfinavitORI = 0; $completo++;}
          if(isset($_POST['docPreConfinavitCOP'])) {$docPreConfinavitCOP = 1;} else {$docPreConfinavitCOP = 0; $completo++;}

          if(isset($_POST['docEcoTecnologiasORI'])) {$docEcoTecnologiasORI = 1;} else {$docEcoTecnologiasORI = 0; $completo++;}
          if(isset($_POST['docEcoTecnologiasCOP'])) {$docEcoTecnologiasCOP = 1;} else {$docEcoTecnologiasCOP = 0; $completo++;}

          if(isset($_POST['docDetMovimientoORI'])) {$docDetMovimientoORI = 1;} else {$docDetMovimientoORI = 0; $completo++;}
          if(isset($_POST['docDetMovimientoCOP'])) {$docDetMovimientoCOP = 1;} else {$docDetMovimientoCOP = 0; $completo++;}

          if(isset($_POST['docConLaboralORI'])) {$docConLaboralORI = 1;} else {$docConLaboralORI = 0; $completo++;}
          if(isset($_POST['docConLaboralCOP'])) {$docConLaboralCOP = 1;} else {$docConLaboralCOP = 0; $completo++;}

          if(isset($_POST['docPredialORI'])) {$docPredialORI = 1;} else {$docPredialORI = 0; $completo++;}
          if(isset($_POST['docPredialCOP'])) {$docPredialCOP = 1;} else {$docPredialCOP = 0; $completo++;}

          if(isset($_POST['docMejoravitORI'])) {$docMejoravitORI = 1;} else {$docMejoravitORI = 0; $completo++;}
          if(isset($_POST['docMejoravitCOP'])) {$docMejoravitCOP = 1;} else {$docMejoravitCOP = 0; $completo++;}

          if(isset($_POST['docConTallerORI'])) {$docConTallerORI = 1;} else {$docConTallerORI = 0; $completo++;}
          if(isset($_POST['docConTallerCOP'])) {$docConTallerCOP = 1;} else {$docConTallerCOP = 0; $completo++;}

          if(isset($_POST['solCreInfonavitORI'])) {$solCreInfonavitORI = 1;} else {$solCreInfonavitORI = 0; $completo++;}
          if(isset($_POST['solCreInfonavitCOP'])) {$solCreInfonavitCOP = 1;} else {$solCreInfonavitCOP = 0; $completo++;}

          if(isset($_POST['docInsIrrevocableORI'])) {$docInsIrrevocableORI = 1;} else {$docInsIrrevocableORI = 0; $completo++;}
          if(isset($_POST['docInsIrrevocableCOP'])) {$docInsIrrevocableCOP = 1;} else {$docInsIrrevocableCOP = 0; $completo++;}

          if(isset($_POST['docAutBuroCreditoORI'])) {$docAutBuroCreditoORI = 1;} else {$docAutBuroCreditoORI = 0; $completo++;}
          if(isset($_POST['docAutBuroCreditoCOP'])) {$docAutBuroCreditoCOP = 1;} else {$docAutBuroCreditoCOP = 0; $completo++;}

          if(isset($_POST['docManifiestoORI'])) {$docManifiestoORI = 1;} else {$docManifiestoORI = 0; $completo++;}
          if(isset($_POST['docManifiestoCOP'])) {$docManifiestoCOP = 1;} else {$docManifiestoCOP = 0; $completo++;}

          if ($completo == 0 ) {
            $completo = "Completo";
          }
          else {
            $completo = "Incompleto";
          }
          //--Para ingresa
          if (isset($elemento['id'])){
            $result = mysqli_query($con,"UPDATE DocumentosCliente SET docActNacimientoORI = $docActNacimientoORI, docActNacimientoCOP = $docActNacimientoCOP, docActNacimientoCAN = $docActNacimientoCAN,
              docActMatrimonioORI = $docActMatrimonioORI, docActMatrimonioCOP = $docActMatrimonioCOP, docActMatrimonioCAN = $docActMatrimonioCAN,
              docRfcORI = $docRfcORI, docRfcCOP = $docRfcCOP, docCurpORI = $docCurpORI, docCurpCOP = $docCurpCOP, autCreHipInfonavitORI = $autCreHipInfonavitORI, autCreHipInfonavitCOP = $autCreHipInfonavitCOP,
              docAvaComercialORI = $docAvaComercialORI, docAvaComercialCOP = $docAvaComercialCOP, solDicTecnicoORI = $solDicTecnicoORI, solDicTecnicoCOP = $solDicTecnicoCOP,
              docIdeFirmadaORI = $docIdeFirmadaORI, docIdeFirmadaCOP = $docIdeFirmadaCOP, docLisNominalORI = $docLisNominalORI, docLisNominalCOP = $docLisNominalCOP,
              docConPropiedadORI = $docConPropiedadORI, docConPropiedadCOP = $docConPropiedadCOP, docPreConfinavitORI = $docPreConfinavitORI, docPreConfinavitCOP = $docPreConfinavitCOP,
              docEcoTecnologiasORI = $docEcoTecnologiasORI, docEcoTecnologiasCOP = $docEcoTecnologiasCOP, docDetMovimientoORI = $docDetMovimientoORI, docDetMovimientoCOP = $docDetMovimientoCOP,
              docConLaboralORI = $docConLaboralORI, docConLaboralCOP = $docConLaboralCOP, docPredialORI = $docPredialORI, docPredialCOP = $docPredialCOP, docMejoravitORI = $docMejoravitORI, docMejoravitCOP = $docMejoravitCOP,
              docConTallerORI = $docConTallerORI, docConTallerCOP = $docConTallerCOP, solCreInfonavitORI = $solCreInfonavitORI, solCreInfonavitCOP = $solCreInfonavitCOP,
              docInsIrrevocableORI = $docInsIrrevocableORI, docInsIrrevocableCOP = $docInsIrrevocableCOP, docAutBuroCreditoORI = $docAutBuroCreditoORI, docAutBuroCreditoCOP = $docAutBuroCreditoCOP,
              docManifiestoORI = $docManifiestoORI, docManifiestoCOP = $docManifiestoCOP,
              estatus = '".$completo."', notas = '".$cli_Notas."' WHERE id = ".$elemento['id']."");
          }
      break;

      case 'Hipotecario Persona Fisica con Actividad Empresarial':
          //--Variables
          if(isset($_POST['solCreBancarioORI'])) {$solCreBancarioORI = 1;} else {$solCreBancarioORI = 0; $completo++;}
          if(isset($_POST['solCreBancarioCOP'])) {$solCreBancarioCOP = 1;} else {$solCreBancarioCOP = 0; $completo++;}

          if(isset($_POST['autTraCreditoORI'])) {$autTraCreditoORI = 1;} else {$autTraCreditoORI = 0; $completo++;}
          if(isset($_POST['autTraCreditoCOP'])) {$autTraCreditoCOP = 1;} else {$autTraCreditoCOP = 0; $completo++;}

          if(isset($_POST['autBurCreditoORI'])) {$autBurCreditoORI = 1;} else {$autBurCreditoORI = 0; $completo++;}
          if(isset($_POST['autBurCreditoCOP'])) {$autBurCreditoCOP = 1;} else {$autBurCreditoCOP = 0; $completo++;}

          if(isset($_POST['docActNacimientoORI'])) {$docActNacimientoORI = 1;} else {$docActNacimientoORI = 0; $completo++;}
          if(isset($_POST['docActNacimientoCOP'])) {$docActNacimientoCOP = 1;} else {$docActNacimientoCOP = 0; $completo++;}
          if($_POST['docActNacimientoCAN'] != "") {$docActNacimientoCAN = $_POST['docActNacimientoCAN'];} else {$docActNacimientoCAN = 0;}

          if(isset($_POST['docActMatrimonioORI'])) {$docActMatrimonioORI = 1;} else {$docActMatrimonioORI = 0; $completo++;}
          if(isset($_POST['docActMatrimonioCOP'])) {$docActMatrimonioCOP = 1;} else {$docActMatrimonioCOP = 0; $completo++;}
          if($_POST['docActMatrimonioCAN'] != "") {$docActMatrimonioCAN = $_POST['docActMatrimonioCAN'];} else {$docActMatrimonioCAN = 0;}

          if(isset($_POST['docIdentificacionORI'])) {$docIdentificacionORI = 1;} else {$docIdentificacionORI = 0; $completo++;}
          if(isset($_POST['docIdentificacionCOP'])) {$docIdentificacionCOP = 1;} else {$docIdentificacionCOP = 0; $completo++;}

          if(isset($_POST['docRfcORI'])) {$docRfcORI = 1;} else {$docRfcORI = 0; $completo++;}
          if(isset($_POST['docRfcCOP'])) {$docRfcCOP = 1;} else {$docRfcCOP = 0; $completo++;}

          if(isset($_POST['docCurpORI'])) {$docCurpORI = 1;} else {$docCurpORI = 0; $completo++;}
          if(isset($_POST['docCurpCOP'])) {$docCurpCOP = 1;} else {$docCurpCOP = 0; $completo++;}

          if(isset($_POST['docComDomicilioORI'])) {$docComDomicilioORI = 1;} else {$docComDomicilioORI = 0; $completo++;}
          if(isset($_POST['docComDomicilioCOP'])) {$docComDomicilioCOP = 1;} else {$docComDomicilioCOP = 0; $completo++;}

          if(isset($_POST['docNominaORI'])) {$docNominaORI = 1;} else {$docNominaORI = 0; $completo++;}
          if(isset($_POST['docNominaCOP'])) {$docNominaCOP = 1;} else {$docNominaCOP = 0; $completo++;}
          if($_POST['docNominaCAN'] != "") {$docNominaCAN = $_POST['docNominaCAN'];} else {$docNominaCAN = 0;}

          if(isset($_POST['docDecAnualORI'])) {$docDecAnualORI = 1;} else {$docDecAnualORI = 0; $completo++;}
          if(isset($_POST['docDecAnualCOP'])) {$docDecAnualCOP = 1;} else {$docDecAnualCOP = 0; $completo++;}

          if(isset($_POST['docDecParcialORI'])) {$docDecParcialORI = 1;} else {$docDecParcialORI = 0; $completo++;}
          if(isset($_POST['docDecParcialCOP'])) {$docDecParcialCOP = 1;} else {$docDecParcialCOP = 0; $completo++;}

          if(isset($_POST['solAltSecretariaORI'])) {$solAltSecretariaORI = 1;} else {$solAltSecretariaORI = 0; $completo++;}
          if(isset($_POST['solAltSecretariaCOP'])) {$solAltSecretariaCOP = 1;} else {$solAltSecretariaCOP = 0; $completo++;}


          if ($completo == 0 ) {
            $completo = "Completo";
          }
          else {
            $completo = "Incompleto";
          }
          //--Para ingresa
          if (isset($elemento['id'])){
            $result = mysqli_query($con,"UPDATE DocumentosCliente SET solCreBancarioORI = $solCreBancarioORI, solCreBancarioCOP = $solCreBancarioCOP, autTraCreditoORI = $autTraCreditoORI, autTraCreditoCOP = $autTraCreditoCOP,
              autBurCreditoORI = $autBurCreditoORI, autBurCreditoCOP = $autBurCreditoCOP, docActNacimientoORI = $docActNacimientoORI, docActNacimientoCOP = $docActNacimientoCOP, docActNacimientoCAN = $docActNacimientoCAN,
              docActMatrimonioORI = $docActMatrimonioORI, docActMatrimonioCOP = $docActMatrimonioCOP, docActMatrimonioCAN = $docActMatrimonioCAN, docIdentificacionORI = $docIdentificacionORI, docIdentificacionCOP = $docIdentificacionCOP,
              docRfcORI = $docRfcORI, docRfcCOP = $docRfcCOP, docCurpORI = $docCurpORI, docCurpCOP = $docCurpCOP, docComDomicilioORI = $docComDomicilioORI, docComDomicilioCOP = $docComDomicilioCOP,
              docNominaORI = $docNominaORI, docNominaCOP = $docNominaCOP, docNominaCAN = $docNominaCAN, docDecAnualORI = $docDecAnualORI, docDecAnualCOP = $docDecAnualCOP,
              docDecParcialORI = $docDecParcialORI, docDecParcialCOP = $docDecParcialCOP, solAltSecretariaORI = $solAltSecretariaORI, solAltSecretariaCOP = $solAltSecretariaCOP,
              estatus = '".$completo."', notas = '".$cli_Notas."' WHERE id = ".$elemento['id']."");
          }
      break;

      case 'Hipotecario Pension':
          //--Variables
          if(isset($_POST['solCreBancarioORI'])) {$solCreBancarioORI = 1;} else {$solCreBancarioORI = 0; $completo++;}
          if(isset($_POST['solCreBancarioCOP'])) {$solCreBancarioCOP = 1;} else {$solCreBancarioCOP = 0; $completo++;}

          if(isset($_POST['autTraCreditoORI'])) {$autTraCreditoORI = 1;} else {$autTraCreditoORI = 0; $completo++;}
          if(isset($_POST['autTraCreditoCOP'])) {$autTraCreditoCOP = 1;} else {$autTraCreditoCOP = 0; $completo++;}

          if(isset($_POST['autBurCreditoORI'])) {$autBurCreditoORI = 1;} else {$autBurCreditoORI = 0; $completo++;}
          if(isset($_POST['autBurCreditoCOP'])) {$autBurCreditoCOP = 1;} else {$autBurCreditoCOP = 0; $completo++;}

          if(isset($_POST['docActNacimientoORI'])) {$docActNacimientoORI = 1;} else {$docActNacimientoORI = 0; $completo++;}
          if(isset($_POST['docActNacimientoCOP'])) {$docActNacimientoCOP = 1;} else {$docActNacimientoCOP = 0; $completo++;}
          if($_POST['docActNacimientoCAN'] != "") {$docActNacimientoCAN = $_POST['docActNacimientoCAN'];} else {$docActNacimientoCAN = 0;}

          if(isset($_POST['docIdentificacionORI'])) {$docIdentificacionORI = 1;} else {$docIdentificacionORI = 0; $completo++;}
          if(isset($_POST['docIdentificacionCOP'])) {$docIdentificacionCOP = 1;} else {$docIdentificacionCOP = 0; $completo++;}

          if(isset($_POST['docComDomicilioORI'])) {$docComDomicilioORI = 1;} else {$docComDomicilioORI = 0; $completo++;}
          if(isset($_POST['docComDomicilioCOP'])) {$docComDomicilioCOP = 1;} else {$docComDomicilioCOP = 0; $completo++;}

          if(isset($_POST['docConvenioORI'])) {$docConvenioORI = 1;} else {$docConvenioORI = 0; $completo++;}
          if(isset($_POST['docConvenioCOP'])) {$docConvenioCOP = 1;} else {$docConvenioCOP = 0; $completo++;}

          if(isset($_POST['docPenMensualORI'])) {$docPenMensualORI = 1;} else {$docPenMensualORI = 0; $completo++;}
          if(isset($_POST['docPenMensualCOP'])) {$docPenMensualCOP = 1;} else {$docPenMensualCOP = 0; $completo++;}
          if($_POST['docPenMensualCAN'] != "") {$docPenMensualCAN = $_POST['docPenMensualCAN'];} else {$docPenMensualCAN = 0;}

          if(isset($_POST['docPenCuentaORI'])) {$docPenCuentaORI = 1;} else {$docPenCuentaORI = 0; $completo++;}
          if(isset($_POST['docPenCuentaCOP'])) {$docPenCuentaCOP = 1;} else {$docPenCuentaCOP = 0; $completo++;}
          if($_POST['docPenCuentaCAN'] != "") {$docPenCuentaCAN = $_POST['docPenCuentaCAN'];} else {$docPenCuentaCAN = 0;}


          if ($completo == 0 ) {
            $completo = "Completo";
          }
          else {
            $completo = "Incompleto";
          }
          //--Para ingresa
          if (isset($elemento['id'])){
            $result = mysqli_query($con,"UPDATE DocumentosCliente SET solCreBancarioORI = $solCreBancarioORI, solCreBancarioCOP = $solCreBancarioCOP, autTraCreditoORI = $autTraCreditoORI, autTraCreditoCOP = $autTraCreditoCOP,
              autBurCreditoORI = $autBurCreditoORI, autBurCreditoCOP = $autBurCreditoCOP, docActNacimientoORI = $docActNacimientoORI, docActNacimientoCOP = $docActNacimientoCOP, docActNacimientoCAN = $docActNacimientoCAN,
              docIdentificacionORI = $docIdentificacionORI, docIdentificacionCOP = $docIdentificacionCOP, docComDomicilioORI = $docComDomicilioORI, docComDomicilioCOP = $docComDomicilioCOP,
              docConvenioORI = $docConvenioORI, docConvenioCOP = $docConvenioCOP, docPenMensualORI = $docPenMensualORI, docPenMensualCOP = $docPenMensualCOP, docPenMensualCAN = $docPenMensualCAN,
              docPenCuentaORI = $docPenCuentaORI, docPenCuentaCOP = $docPenCuentaCOP, docPenCuentaCAN = $docPenCuentaCAN,
              estatus = '".$completo."', notas = '".$cli_Notas."' WHERE id = ".$elemento['id']."");
          }
      break;

      case 'Persona Moral':
          //--Variables
          if(isset($_POST['sol97ORI'])) {$sol97ORI = 1;} else {$sol97ORI = 0; $completo++;}
          if(isset($_POST['sol97COP'])) {$sol97COP = 1;} else {$sol97COP = 0; $completo++;}

          if(isset($_POST['docActNacimientoORI'])) {$docActNacimientoORI = 1;} else {$docActNacimientoORI = 0; $completo++;}
          if(isset($_POST['docActNacimientoCOP'])) {$docActNacimientoCOP = 1;} else {$docActNacimientoCOP = 0; $completo++;}
          if($_POST['docActNacimientoCAN'] != "") {$docActNacimientoCAN = $_POST['docActNacimientoCAN'];} else {$docActNacimientoCAN = 0;}

          if(isset($_POST['docActMatrimonioORI'])) {$docActMatrimonioORI = 1;} else {$docActMatrimonioORI = 0; $completo++;}
          if(isset($_POST['docActMatrimonioCOP'])) {$docActMatrimonioCOP = 1;} else {$docActMatrimonioCOP = 0; $completo++;}
          if($_POST['docActMatrimonioCAN'] != "") {$docActMatrimonioCAN = $_POST['docActMatrimonioCAN'];} else {$docActMatrimonioCAN = 0;}

          if(isset($_POST['docIdentificacionORI'])) {$docIdentificacionORI = 1;} else {$docIdentificacionORI = 0; $completo++;}
          if(isset($_POST['docIdentificacionCOP'])) {$docIdentificacionCOP = 1;} else {$docIdentificacionCOP = 0; $completo++;}

          if(isset($_POST['docComDomicilioORI'])) {$docComDomicilioORI = 1;} else {$docComDomicilioORI = 0; $completo++;}
          if(isset($_POST['docComDomicilioCOP'])) {$docComDomicilioCOP = 1;} else {$docComDomicilioCOP = 0; $completo++;}

          if(isset($_POST['docSitFiscalORI'])) {$docSitFiscalORI = 1;} else {$docSitFiscalORI = 0; $completo++;}
          if(isset($_POST['docSitFiscalCOP'])) {$docSitFiscalCOP = 1;} else {$docSitFiscalCOP = 0; $completo++;}

          if(isset($_POST['docEstCuentaORI'])) {$docEstCuentaORI = 1;} else {$docEstCuentaORI = 0; $completo++;}
          if(isset($_POST['docEstCuentaCOP'])) {$docEstCuentaCOP = 1;} else {$docEstCuentaCOP = 0; $completo++;}
          if($_POST['docEstCuentaCAN'] != "") {$docEstCuentaCAN = $_POST['docEstCuentaCAN'];} else {$docEstCuentaCAN = 0;}

          if(isset($_POST['docActConstitutivaORI'])) {$docActConstitutivaORI = 1;} else {$docActConstitutivaORI = 0; $completo++;}
          if(isset($_POST['docActConstitutivaCOP'])) {$docActConstitutivaCOP = 1;} else {$docActConstitutivaCOP = 0; $completo++;}

          if ($completo == 0 ) {
            $completo = "Completo";
          }
          else {
            $completo = "Incompleto";
          }
          //--Para ingresa
          if (isset($elemento['id'])){
            $result = mysqli_query($con,"UPDATE DocumentosCliente SET sol97ORI = $sol97ORI, sol97COP = $sol97COP,
              docActNacimientoORI = $docActNacimientoORI, docActNacimientoCOP = $docActNacimientoCOP, docActNacimientoCAN = $docActNacimientoCAN,
              docActMatrimonioORI = $docActMatrimonioORI, docActMatrimonioCOP = $docActMatrimonioCOP, docActMatrimonioCAN = $docActMatrimonioCAN,
              docIdentificacionORI = $docIdentificacionORI, docIdentificacionCOP = $docIdentificacionCOP, docComDomicilioORI = $docComDomicilioORI, docComDomicilioCOP = $docComDomicilioCOP,
              docComDomicilioORI = $docComDomicilioORI, docComDomicilioCOP = $docComDomicilioCOP, docSitFiscalORI = $docSitFiscalORI, docSitFiscalCOP = $docSitFiscalCOP,
              docEstCuentaORI = $docEstCuentaORI, docEstCuentaCOP = $docEstCuentaCOP, docEstCuentaCAN = $docEstCuentaCAN,
              docActConstitutivaORI = $docActConstitutivaORI, docActConstitutivaCOP = $docActConstitutivaCOP,
              estatus = '".$completo."', notas = '".$cli_Notas."' WHERE id = ".$elemento['id']."");
          }
      break;


      default:
        # code...
        break;
    }
  }
  elseif ($elemento[actividadEco] != "") {
    switch ($elemento['actividadEco']) {
      case 'Asalariados':
      if(isset($_POST['solCreBancarioORI'])) {$solCreBancarioORI = 1;} else {$solCreBancarioORI = 0; $completo++;}
      if(isset($_POST['solCreBancarioCOP'])) {$solCreBancarioCOP = 1;} else {$solCreBancarioCOP = 0; $completo++;}

      if(isset($_POST['docIdentificacionORI'])) {$docIdentificacionORI = 1;} else {$docIdentificacionORI = 0; $completo++;}
      if(isset($_POST['docIdentificacionCOP'])) {$docIdentificacionCOP = 1;} else {$docIdentificacionCOP = 0; $completo++;}

      if(isset($_POST['docActMatrimonioORI'])) {$docActMatrimonioORI = 1;} else {$docActMatrimonioORI = 0; $completo++;}
      if(isset($_POST['docActMatrimonioCOP'])) {$docActMatrimonioCOP = 1;} else {$docActMatrimonioCOP = 0; $completo++;}
      if($_POST['docActMatrimonioCAN'] != "") {$docActMatrimonioCAN = $_POST['docActMatrimonioCAN'];} else {$docActMatrimonioCAN = 0;}

      if(isset($_POST['docComDomicilioORI'])) {$docComDomicilioORI = 1;} else {$docComDomicilioORI = 0; $completo++;}
      if(isset($_POST['docComDomicilioCOP'])) {$docComDomicilioCOP = 1;} else {$docComDomicilioCOP = 0; $completo++;}

      if(isset($_POST['docNominaORI'])) {$docNominaORI = 1;} else {$docNominaORI = 0; $completo++;}
      if(isset($_POST['docNominaCOP'])) {$docNominaCOP = 1;} else {$docNominaCOP = 0; $completo++;}
      if($_POST['docNominaCAN'] != "") {$docNominaCAN = $_POST['docNominaCAN'];} else {$docNominaCAN = 0;}

      if(isset($_POST['docEstCuentaORI'])) {$docEstCuentaORI = 1;} else {$docEstCuentaORI = 0; $completo++;}
      if(isset($_POST['docEstCuentaCOP'])) {$docEstCuentaCOP = 1;} else {$docEstCuentaCOP = 0; $completo++;}
      if($_POST['docEstCuentaCAN'] != "") {$docEstCuentaCAN = $_POST['docEstCuentaCAN'];} else {$docEstCuentaCAN = 0;}

      if(isset($_POST['docSaludORI'])) {$docSaludORI = 1;} else {$docSaludORI = 0; $completo++;}
      if(isset($_POST['docSaludCOP'])) {$docSaludCOP = 1;} else {$docSaludCOP = 0; $completo++;}

      if(isset($_POST['docCotizacionORI'])) {$docCotizacionORI = 1;} else {$docCotizacionORI = 0; $completo++;}
      if(isset($_POST['docCotizacionCOP'])) {$docCotizacionCOP = 1;} else {$docCotizacionCOP = 0; $completo++;}

      if(isset($_POST['docApoyoORI'])) {$docApoyoORI = 1;} else {$docApoyoORI = 0; $completo++;}
      if(isset($_POST['docApoyoCOP'])) {$docApoyoCOP = 1;} else {$docApoyoCOP = 0; $completo++;}

      if ($completo == 0 ) {
        $completo = "Completo";
      }
      else {
        $completo = "Incompleto";
      }
      //--Para ingresa
      if (isset($elemento['id'])){
        $result = mysqli_query($con,"UPDATE DocumentosCliente SET solCreBancarioORI = $solCreBancarioORI, solCreBancarioCOP = $solCreBancarioCOP,
          docIdentificacionORI = $docIdentificacionORI, docIdentificacionCOP = $docIdentificacionCOP, docComDomicilioORI = $docComDomicilioORI, docComDomicilioCOP = $docComDomicilioCOP,
          docActMatrimonioORI = $docActMatrimonioORI, docActMatrimonioCOP = $docActMatrimonioCOP, docActMatrimonioCAN = $docActMatrimonioCAN,
          docNominaORI = $docNominaORI, docNominaCOP = $docNominaCOP, docNominaCAN = $docNominaCAN, docEstCuentaORI = $docEstCuentaORI, docEstCuentaCOP = $docEstCuentaCOP, docEstCuentaCAN = $docEstCuentaCAN,
          docSaludORI = $docSaludORI, docSaludCOP = $docSaludCOP, docCotizacionORI = $docCotizacionORI, docCotizacionCOP = $docCotizacionCOP, docApoyoORI = $docApoyoORI, docApoyoCOP = $docApoyoCOP,
          estatus = '".$completo."', notas = '".$cli_Notas."' WHERE id = ".$elemento['id']."");
      }

      break;

      case 'Honorarios':
      if(isset($_POST['solCreBancarioORI'])) {$solCreBancarioORI = 1;} else {$solCreBancarioORI = 0; $completo++;}
      if(isset($_POST['solCreBancarioCOP'])) {$solCreBancarioCOP = 1;} else {$solCreBancarioCOP = 0; $completo++;}

      if(isset($_POST['docIdentificacionORI'])) {$docIdentificacionORI = 1;} else {$docIdentificacionORI = 0; $completo++;}
      if(isset($_POST['docIdentificacionCOP'])) {$docIdentificacionCOP = 1;} else {$docIdentificacionCOP = 0; $completo++;}

      if(isset($_POST['docActMatrimonioORI'])) {$docActMatrimonioORI = 1;} else {$docActMatrimonioORI = 0; $completo++;}
      if(isset($_POST['docActMatrimonioCOP'])) {$docActMatrimonioCOP = 1;} else {$docActMatrimonioCOP = 0; $completo++;}
      if($_POST['docActMatrimonioCAN'] != "") {$docActMatrimonioCAN = $_POST['docActMatrimonioCAN'];} else {$docActMatrimonioCAN = 0;}

      if(isset($_POST['docComDomicilioORI'])) {$docComDomicilioORI = 1;} else {$docComDomicilioORI = 0; $completo++;}
      if(isset($_POST['docComDomicilioCOP'])) {$docComDomicilioCOP = 1;} else {$docComDomicilioCOP = 0; $completo++;}

      if(isset($_POST['docEstCuentaORI'])) {$docEstCuentaORI = 1;} else {$docEstCuentaORI = 0; $completo++;}
      if(isset($_POST['docEstCuentaCOP'])) {$docEstCuentaCOP = 1;} else {$docEstCuentaCOP = 0; $completo++;}
      if($_POST['docEstCuentaCAN'] != "") {$docEstCuentaCAN = $_POST['docEstCuentaCAN'];} else {$docEstCuentaCAN = 0;}

      if(isset($_POST['docSaludORI'])) {$docSaludORI = 1;} else {$docSaludORI = 0; $completo++;}
      if(isset($_POST['docSaludCOP'])) {$docSaludCOP = 1;} else {$docSaludCOP = 0; $completo++;}

      if(isset($_POST['docCotizacionORI'])) {$docCotizacionORI = 1;} else {$docCotizacionORI = 0; $completo++;}
      if(isset($_POST['docCotizacionCOP'])) {$docCotizacionCOP = 1;} else {$docCotizacionCOP = 0; $completo++;}

      if(isset($_POST['docApoyoORI'])) {$docApoyoORI = 1;} else {$docApoyoORI = 0; $completo++;}
      if(isset($_POST['docApoyoCOP'])) {$docApoyoCOP = 1;} else {$docApoyoCOP = 0; $completo++;}

      if(isset($_POST['docRecHonorariosORI'])) {$docRecHonorariosORI = 1;} else {$docRecHonorariosORI = 0; $completo++;}
      if(isset($_POST['docRecHonorariosCOP'])) {$docRecHonorariosCOP = 1;} else {$docRecHonorariosCOP = 0; $completo++;}
      if($_POST['docRecHonorariosCAN'] != "") {$docRecHonorariosCAN = $_POST['docRecHonorariosCAN'];} else {$docRecHonorariosCAN = 0;}

      if(isset($_POST['docDecAnualORI'])) {$docDecAnualORI = 1;} else {$docDecAnualORI = 0; $completo++;}
      if(isset($_POST['docDecAnualCOP'])) {$docDecAnualCOP = 1;} else {$docDecAnualCOP = 0; $completo++;}

      if(isset($_POST['docRfcORI'])) {$docRfcORI = 1;} else {$docRfcORI = 0; $completo++;}
      if(isset($_POST['docRfcCOP'])) {$docRfcCOP = 1;} else {$docRfcCOP = 0; $completo++;}

      if ($completo == 0 ) {
        $completo = "Completo";
      }
      else {
        $completo = "Incompleto";
      }
      //--Para ingresa
      if (isset($elemento['id'])){
        $result = mysqli_query($con,"UPDATE DocumentosCliente SET solCreBancarioORI = $solCreBancarioORI, solCreBancarioCOP = $solCreBancarioCOP,
          docIdentificacionORI = $docIdentificacionORI, docIdentificacionCOP = $docIdentificacionCOP, docComDomicilioORI = $docComDomicilioORI, docComDomicilioCOP = $docComDomicilioCOP,
          docActMatrimonioORI = $docActMatrimonioORI, docActMatrimonioCOP = $docActMatrimonioCOP, docActMatrimonioCAN = $docActMatrimonioCAN,
          docEstCuentaORI = $docEstCuentaORI, docEstCuentaCOP = $docEstCuentaCOP, docEstCuentaCAN = $docEstCuentaCAN,
          docSaludORI = $docSaludORI, docSaludCOP = $docSaludCOP, docCotizacionORI = $docCotizacionORI, docCotizacionCOP = $docCotizacionCOP, docApoyoORI = $docApoyoORI, docApoyoCOP = $docApoyoCOP,
          docRecHonorariosORI = $docRecHonorariosORI, docRecHonorariosCOP = $docRecHonorariosCOP, docRecHonorariosCAN = $docRecHonorariosCAN,
          docDecAnualORI = $docDecAnualORI, docDecAnualCOP = $docDecAnualCOP, docRfcORI = $docRfcORI, docRfcCOP = $docRfcCOP,
          estatus = '".$completo."', notas = '".$cli_Notas."' WHERE id = ".$elemento['id']."");
      }

      break;

      case 'Persona Fisica Actividad Emp':
      if(isset($_POST['solCreBancarioORI'])) {$solCreBancarioORI = 1;} else {$solCreBancarioORI = 0; $completo++;}
      if(isset($_POST['solCreBancarioCOP'])) {$solCreBancarioCOP = 1;} else {$solCreBancarioCOP = 0; $completo++;}

      if(isset($_POST['docIdentificacionORI'])) {$docIdentificacionORI = 1;} else {$docIdentificacionORI = 0; $completo++;}
      if(isset($_POST['docIdentificacionCOP'])) {$docIdentificacionCOP = 1;} else {$docIdentificacionCOP = 0; $completo++;}

      if(isset($_POST['docActMatrimonioORI'])) {$docActMatrimonioORI = 1;} else {$docActMatrimonioORI = 0; $completo++;}
      if(isset($_POST['docActMatrimonioCOP'])) {$docActMatrimonioCOP = 1;} else {$docActMatrimonioCOP = 0; $completo++;}
      if($_POST['docActMatrimonioCAN'] != "") {$docActMatrimonioCAN = $_POST['docActMatrimonioCAN'];} else {$docActMatrimonioCAN = 0;}

      if(isset($_POST['docComDomicilioORI'])) {$docComDomicilioORI = 1;} else {$docComDomicilioORI = 0; $completo++;}
      if(isset($_POST['docComDomicilioCOP'])) {$docComDomicilioCOP = 1;} else {$docComDomicilioCOP = 0; $completo++;}

      if(isset($_POST['docEstCuentaORI'])) {$docEstCuentaORI = 1;} else {$docEstCuentaORI = 0; $completo++;}
      if(isset($_POST['docEstCuentaCOP'])) {$docEstCuentaCOP = 1;} else {$docEstCuentaCOP = 0; $completo++;}
      if($_POST['docEstCuentaCAN'] != "") {$docEstCuentaCAN = $_POST['docEstCuentaCAN'];} else {$docEstCuentaCAN = 0;}

      if(isset($_POST['docSaludORI'])) {$docSaludORI = 1;} else {$docSaludORI = 0; $completo++;}
      if(isset($_POST['docSaludCOP'])) {$docSaludCOP = 1;} else {$docSaludCOP = 0; $completo++;}

      if(isset($_POST['docCotizacionORI'])) {$docCotizacionORI = 1;} else {$docCotizacionORI = 0; $completo++;}
      if(isset($_POST['docCotizacionCOP'])) {$docCotizacionCOP = 1;} else {$docCotizacionCOP = 0; $completo++;}

      if(isset($_POST['docApoyoORI'])) {$docApoyoORI = 1;} else {$docApoyoORI = 0; $completo++;}
      if(isset($_POST['docApoyoCOP'])) {$docApoyoCOP = 1;} else {$docApoyoCOP = 0; $completo++;}

      if(isset($_POST['docDecAnualORI'])) {$docDecAnualORI = 1;} else {$docDecAnualORI = 0; $completo++;}
      if(isset($_POST['docDecAnualCOP'])) {$docDecAnualCOP = 1;} else {$docDecAnualCOP = 0; $completo++;}

      if(isset($_POST['docRfcORI'])) {$docRfcORI = 1;} else {$docRfcORI = 0; $completo++;}
      if(isset($_POST['docRfcCOP'])) {$docRfcCOP = 1;} else {$docRfcCOP = 0; $completo++;}

      if(isset($_POST['docEstFinancierosORI'])) {$docEstFinancierosORI = 1;} else {$docEstFinancierosORI = 0; $completo++;}
      if(isset($_POST['docEstFinancierosCOP'])) {$docEstFinancierosCOP = 1;} else {$docEstFinancierosCOP = 0; $completo++;}
      if($_POST['docEstFinancierosCAN'] != "") {$docEstFinancierosCAN = $_POST['docEstFinancierosCAN'];} else {$docEstFinancierosCAN = 0;}

      if(isset($_POST['docRepComercialORI'])) {$docRepComercialORI = 1;} else {$docRepComercialORI = 0; $completo++;}
      if(isset($_POST['docRepComercialCOP'])) {$docRepComercialCOP = 1;} else {$docRepComercialCOP = 0; $completo++;}

      if ($completo == 0 ) {
        $completo = "Completo";
      }
      else {
        $completo = "Incompleto";
      }
      //--Para ingresa
      if (isset($elemento['id'])){
        $result = mysqli_query($con,"UPDATE DocumentosCliente SET solCreBancarioORI = $solCreBancarioORI, solCreBancarioCOP = $solCreBancarioCOP,
          docIdentificacionORI = $docIdentificacionORI, docIdentificacionCOP = $docIdentificacionCOP, docComDomicilioORI = $docComDomicilioORI, docComDomicilioCOP = $docComDomicilioCOP,
          docActMatrimonioORI = $docActMatrimonioORI, docActMatrimonioCOP = $docActMatrimonioCOP, docActMatrimonioCAN = $docActMatrimonioCAN,
          docEstCuentaORI = $docEstCuentaORI, docEstCuentaCOP = $docEstCuentaCOP, docEstCuentaCAN = $docEstCuentaCAN,
          docSaludORI = $docSaludORI, docSaludCOP = $docSaludCOP, docCotizacionORI = $docCotizacionORI, docCotizacionCOP = $docCotizacionCOP, docApoyoORI = $docApoyoORI, docApoyoCOP = $docApoyoCOP,
          docDecAnualORI = $docDecAnualORI, docDecAnualCOP = $docDecAnualCOP, docRfcORI = $docRfcORI, docRfcCOP = $docRfcCOP,
          docEstFinancierosORI = $docEstFinancierosORI, docEstFinancierosCOP = $docEstFinancierosCOP, docEstFinancierosCAN = $docEstFinancierosCAN,
          docRepComercialORI = $docRepComercialORI, docRepComercialCOP = $docRepComercialCOP,
          estatus = '".$completo."', notas = '".$cli_Notas."' WHERE id = ".$elemento['id']."");
      }

      break;

      case 'Persona Fisica Accionistas':
      if(isset($_POST['solCreBancarioORI'])) {$solCreBancarioORI = 1;} else {$solCreBancarioORI = 0; $completo++;}
      if(isset($_POST['solCreBancarioCOP'])) {$solCreBancarioCOP = 1;} else {$solCreBancarioCOP = 0; $completo++;}

      if(isset($_POST['docIdentificacionORI'])) {$docIdentificacionORI = 1;} else {$docIdentificacionORI = 0; $completo++;}
      if(isset($_POST['docIdentificacionCOP'])) {$docIdentificacionCOP = 1;} else {$docIdentificacionCOP = 0; $completo++;}

      if(isset($_POST['docActMatrimonioORI'])) {$docActMatrimonioORI = 1;} else {$docActMatrimonioORI = 0; $completo++;}
      if(isset($_POST['docActMatrimonioCOP'])) {$docActMatrimonioCOP = 1;} else {$docActMatrimonioCOP = 0; $completo++;}
      if($_POST['docActMatrimonioCAN'] != "") {$docActMatrimonioCAN = $_POST['docActMatrimonioCAN'];} else {$docActMatrimonioCAN = 0;}

      if(isset($_POST['docComDomicilioORI'])) {$docComDomicilioORI = 1;} else {$docComDomicilioORI = 0; $completo++;}
      if(isset($_POST['docComDomicilioCOP'])) {$docComDomicilioCOP = 1;} else {$docComDomicilioCOP = 0; $completo++;}

      if(isset($_POST['docEstCuentaORI'])) {$docEstCuentaORI = 1;} else {$docEstCuentaORI = 0; $completo++;}
      if(isset($_POST['docEstCuentaCOP'])) {$docEstCuentaCOP = 1;} else {$docEstCuentaCOP = 0; $completo++;}
      if($_POST['docEstCuentaCAN'] != "") {$docEstCuentaCAN = $_POST['docEstCuentaCAN'];} else {$docEstCuentaCAN = 0;}

      if(isset($_POST['docSaludORI'])) {$docSaludORI = 1;} else {$docSaludORI = 0; $completo++;}
      if(isset($_POST['docSaludCOP'])) {$docSaludCOP = 1;} else {$docSaludCOP = 0; $completo++;}

      if(isset($_POST['docCotizacionORI'])) {$docCotizacionORI = 1;} else {$docCotizacionORI = 0; $completo++;}
      if(isset($_POST['docCotizacionCOP'])) {$docCotizacionCOP = 1;} else {$docCotizacionCOP = 0; $completo++;}

      if(isset($_POST['docApoyoORI'])) {$docApoyoORI = 1;} else {$docApoyoORI = 0; $completo++;}
      if(isset($_POST['docApoyoCOP'])) {$docApoyoCOP = 1;} else {$docApoyoCOP = 0; $completo++;}

      if(isset($_POST['docDecAnualORI'])) {$docDecAnualORI = 1;} else {$docDecAnualORI = 0; $completo++;}
      if(isset($_POST['docDecAnualCOP'])) {$docDecAnualCOP = 1;} else {$docDecAnualCOP = 0; $completo++;}

      if(isset($_POST['docRelPatrimonialORI'])) {$docRelPatrimonialORI = 1;} else {$docRelPatrimonialORI = 0; $completo++;}
      if(isset($_POST['docRelPatrimonialCOP'])) {$docRelPatrimonialCOP = 1;} else {$docRelPatrimonialCOP = 0; $completo++;}

      if ($completo == 0 ) {
        $completo = "Completo";
      }
      else {
        $completo = "Incompleto";
      }
      //--Para ingresa
      if (isset($elemento['id'])){
        $result = mysqli_query($con,"UPDATE DocumentosCliente SET solCreBancarioORI = $solCreBancarioORI, solCreBancarioCOP = $solCreBancarioCOP,
          docIdentificacionORI = $docIdentificacionORI, docIdentificacionCOP = $docIdentificacionCOP, docComDomicilioORI = $docComDomicilioORI, docComDomicilioCOP = $docComDomicilioCOP,
          docActMatrimonioORI = $docActMatrimonioORI, docActMatrimonioCOP = $docActMatrimonioCOP, docActMatrimonioCAN = $docActMatrimonioCAN,
          docEstCuentaORI = $docEstCuentaORI, docEstCuentaCOP = $docEstCuentaCOP, docEstCuentaCAN = $docEstCuentaCAN,
          docSaludORI = $docSaludORI, docSaludCOP = $docSaludCOP, docCotizacionORI = $docCotizacionORI, docCotizacionCOP = $docCotizacionCOP, docApoyoORI = $docApoyoORI, docApoyoCOP = $docApoyoCOP,
          docDecAnualORI = $docDecAnualORI, docDecAnualCOP = $docDecAnualCOP, docRelPatrimonialORI = $docRelPatrimonialORI, docRelPatrimonialCOP = $docRelPatrimonialCOP,
          estatus = '".$completo."', notas = '".$cli_Notas."' WHERE id = ".$elemento['id']."");
      }

      break;

      case 'Arrendadores':
      if(isset($_POST['solCreBancarioORI'])) {$solCreBancarioORI = 1;} else {$solCreBancarioORI = 0; $completo++;}
      if(isset($_POST['solCreBancarioCOP'])) {$solCreBancarioCOP = 1;} else {$solCreBancarioCOP = 0; $completo++;}

      if(isset($_POST['docIdentificacionORI'])) {$docIdentificacionORI = 1;} else {$docIdentificacionORI = 0; $completo++;}
      if(isset($_POST['docIdentificacionCOP'])) {$docIdentificacionCOP = 1;} else {$docIdentificacionCOP = 0; $completo++;}

      if(isset($_POST['docActMatrimonioORI'])) {$docActMatrimonioORI = 1;} else {$docActMatrimonioORI = 0; $completo++;}
      if(isset($_POST['docActMatrimonioCOP'])) {$docActMatrimonioCOP = 1;} else {$docActMatrimonioCOP = 0; $completo++;}
      if($_POST['docActMatrimonioCAN'] != "") {$docActMatrimonioCAN = $_POST['docActMatrimonioCAN'];} else {$docActMatrimonioCAN = 0;}

      if(isset($_POST['docComDomicilioORI'])) {$docComDomicilioORI = 1;} else {$docComDomicilioORI = 0; $completo++;}
      if(isset($_POST['docComDomicilioCOP'])) {$docComDomicilioCOP = 1;} else {$docComDomicilioCOP = 0; $completo++;}

      if(isset($_POST['docEstCuentaORI'])) {$docEstCuentaORI = 1;} else {$docEstCuentaORI = 0; $completo++;}
      if(isset($_POST['docEstCuentaCOP'])) {$docEstCuentaCOP = 1;} else {$docEstCuentaCOP = 0; $completo++;}
      if($_POST['docEstCuentaCAN'] != "") {$docEstCuentaCAN = $_POST['docEstCuentaCAN'];} else {$docEstCuentaCAN = 0;}

      if(isset($_POST['docSaludORI'])) {$docSaludORI = 1;} else {$docSaludORI = 0; $completo++;}
      if(isset($_POST['docSaludCOP'])) {$docSaludCOP = 1;} else {$docSaludCOP = 0; $completo++;}

      if(isset($_POST['docCotizacionORI'])) {$docCotizacionORI = 1;} else {$docCotizacionORI = 0; $completo++;}
      if(isset($_POST['docCotizacionCOP'])) {$docCotizacionCOP = 1;} else {$docCotizacionCOP = 0; $completo++;}

      if(isset($_POST['docApoyoORI'])) {$docApoyoORI = 1;} else {$docApoyoORI = 0; $completo++;}
      if(isset($_POST['docApoyoCOP'])) {$docApoyoCOP = 1;} else {$docApoyoCOP = 0; $completo++;}

      if(isset($_POST['docDecAnualORI'])) {$docDecAnualORI = 1;} else {$docDecAnualORI = 0; $completo++;}
      if(isset($_POST['docDecAnualCOP'])) {$docDecAnualCOP = 1;} else {$docDecAnualCOP = 0; $completo++;}

      if(isset($_POST['docRfcORI'])) {$docRfcORI = 1;} else {$docRfcORI = 0; $completo++;}
      if(isset($_POST['docRfcCOP'])) {$docRfcCOP = 1;} else {$docRfcCOP = 0; $completo++;}

      if(isset($_POST['docConComercialORI'])) {$docConComercialORI = 1;} else {$docConComercialORI = 0; $completo++;}
      if(isset($_POST['docConComercialCOP'])) {$docConComercialCOP = 1;} else {$docConComercialCOP = 0; $completo++;}

      if(isset($_POST['docTenenciasORI'])) {$docTenenciasORI = 1;} else {$docTenenciasORI = 0; $completo++;}
      if(isset($_POST['docTenenciasCOP'])) {$docTenenciasCOP = 1;} else {$docTenenciasCOP = 0; $completo++;}

      if ($completo == 0 ) {
        $completo = "Completo";
      }
      else {
        $completo = "Incompleto";
      }
      //--Para ingresa
      if (isset($elemento['id'])){
        $result = mysqli_query($con,"UPDATE DocumentosCliente SET solCreBancarioORI = $solCreBancarioORI, solCreBancarioCOP = $solCreBancarioCOP,
          docIdentificacionORI = $docIdentificacionORI, docIdentificacionCOP = $docIdentificacionCOP, docComDomicilioORI = $docComDomicilioORI, docComDomicilioCOP = $docComDomicilioCOP,
          docActMatrimonioORI = $docActMatrimonioORI, docActMatrimonioCOP = $docActMatrimonioCOP, docActMatrimonioCAN = $docActMatrimonioCAN,
          docEstCuentaORI = $docEstCuentaORI, docEstCuentaCOP = $docEstCuentaCOP, docEstCuentaCAN = $docEstCuentaCAN,
          docSaludORI = $docSaludORI, docSaludCOP = $docSaludCOP, docCotizacionORI = $docCotizacionORI, docCotizacionCOP = $docCotizacionCOP, docApoyoORI = $docApoyoORI, docApoyoCOP = $docApoyoCOP,
          docDecAnualORI = $docDecAnualORI, docDecAnualCOP = $docDecAnualCOP, docRfcORI = $docRfcORI, docRfcCOP = $docRfcCOP, docConComercialORI = $docConComercialORI, docConComercialCOP = $docConComercialCOP,
          docTenenciasORI = $docTenenciasORI, docTenenciasCOP = $docTenenciasCOP,
          estatus = '".$completo."', notas = '".$cli_Notas."' WHERE id = ".$elemento['id']."");
      }

      break;

      case 'EC. Informal':
      if(isset($_POST['solCreBancarioORI'])) {$solCreBancarioORI = 1;} else {$solCreBancarioORI = 0; $completo++;}
      if(isset($_POST['solCreBancarioCOP'])) {$solCreBancarioCOP = 1;} else {$solCreBancarioCOP = 0; $completo++;}

      if(isset($_POST['docIdentificacionORI'])) {$docIdentificacionORI = 1;} else {$docIdentificacionORI = 0; $completo++;}
      if(isset($_POST['docIdentificacionCOP'])) {$docIdentificacionCOP = 1;} else {$docIdentificacionCOP = 0; $completo++;}

      if(isset($_POST['docActMatrimonioORI'])) {$docActMatrimonioORI = 1;} else {$docActMatrimonioORI = 0; $completo++;}
      if(isset($_POST['docActMatrimonioCOP'])) {$docActMatrimonioCOP = 1;} else {$docActMatrimonioCOP = 0; $completo++;}
      if($_POST['docActMatrimonioCAN'] != "") {$docActMatrimonioCAN = $_POST['docActMatrimonioCAN'];} else {$docActMatrimonioCAN = 0;}

      if(isset($_POST['docComDomicilioORI'])) {$docComDomicilioORI = 1;} else {$docComDomicilioORI = 0; $completo++;}
      if(isset($_POST['docComDomicilioCOP'])) {$docComDomicilioCOP = 1;} else {$docComDomicilioCOP = 0; $completo++;}

      if(isset($_POST['docEstCuentaORI'])) {$docEstCuentaORI = 1;} else {$docEstCuentaORI = 0; $completo++;}
      if(isset($_POST['docEstCuentaCOP'])) {$docEstCuentaCOP = 1;} else {$docEstCuentaCOP = 0; $completo++;}
      if($_POST['docEstCuentaCAN'] != "") {$docEstCuentaCAN = $_POST['docEstCuentaCAN'];} else {$docEstCuentaCAN = 0;}

      if(isset($_POST['docSaludORI'])) {$docSaludORI = 1;} else {$docSaludORI = 0; $completo++;}
      if(isset($_POST['docSaludCOP'])) {$docSaludCOP = 1;} else {$docSaludCOP = 0; $completo++;}

      if(isset($_POST['docCotizacionORI'])) {$docCotizacionORI = 1;} else {$docCotizacionORI = 0; $completo++;}
      if(isset($_POST['docCotizacionCOP'])) {$docCotizacionCOP = 1;} else {$docCotizacionCOP = 0; $completo++;}

      if(isset($_POST['docApoyoORI'])) {$docApoyoORI = 1;} else {$docApoyoORI = 0; $completo++;}
      if(isset($_POST['docApoyoCOP'])) {$docApoyoCOP = 1;} else {$docApoyoCOP = 0; $completo++;}

      if ($completo == 0 ) {
        $completo = "Completo";
      }
      else {
        $completo = "Incompleto";
      }
      //--Para ingresa
      if (isset($elemento['id'])){
        $result = mysqli_query($con,"UPDATE DocumentosCliente SET solCreBancarioORI = $solCreBancarioORI, solCreBancarioCOP = $solCreBancarioCOP,
          docIdentificacionORI = $docIdentificacionORI, docIdentificacionCOP = $docIdentificacionCOP, docComDomicilioORI = $docComDomicilioORI, docComDomicilioCOP = $docComDomicilioCOP,
          docActMatrimonioORI = $docActMatrimonioORI, docActMatrimonioCOP = $docActMatrimonioCOP, docActMatrimonioCAN = $docActMatrimonioCAN,
          docEstCuentaORI = $docEstCuentaORI, docEstCuentaCOP = $docEstCuentaCOP, docEstCuentaCAN = $docEstCuentaCAN,
          docSaludORI = $docSaludORI, docSaludCOP = $docSaludCOP, docCotizacionORI = $docCotizacionORI, docCotizacionCOP = $docCotizacionCOP, docApoyoORI = $docApoyoORI, docApoyoCOP = $docApoyoCOP,
          estatus = '".$completo."', notas = '".$cli_Notas."' WHERE id = ".$elemento['id']."");
      }

      break;

      case 'PM del Accionista':

      if(isset($_POST['docEstCuentaORI'])) {$docEstCuentaORI = 1;} else {$docEstCuentaORI = 0; $completo++;}
      if(isset($_POST['docEstCuentaCOP'])) {$docEstCuentaCOP = 1;} else {$docEstCuentaCOP = 0; $completo++;}
      if($_POST['docEstCuentaCAN'] != "") {$docEstCuentaCAN = $_POST['docEstCuentaCAN'];} else {$docEstCuentaCAN = 0;}

      if(isset($_POST['docDecAnualORI'])) {$docDecAnualORI = 1;} else {$docDecAnualORI = 0; $completo++;}
      if(isset($_POST['docDecAnualCOP'])) {$docDecAnualCOP = 1;} else {$docDecAnualCOP = 0; $completo++;}

      if(isset($_POST['docRfcORI'])) {$docRfcORI = 1;} else {$docRfcORI = 0; $completo++;}
      if(isset($_POST['docRfcCOP'])) {$docRfcCOP = 1;} else {$docRfcCOP = 0; $completo++;}

      if(isset($_POST['docEstFinancierosORI'])) {$docEstFinancierosORI = 1;} else {$docEstFinancierosORI = 0; $completo++;}
      if(isset($_POST['docEstFinancierosCOP'])) {$docEstFinancierosCOP = 1;} else {$docEstFinancierosCOP = 0; $completo++;}
      if($_POST['docEstFinancierosCAN'] != "") {$docEstFinancierosCAN = $_POST['docEstFinancierosCAN'];} else {$docEstFinancierosCAN = 0;}

      if(isset($_POST['docLegalORI'])) {$docLegalORI = 1;} else {$docLegalORI = 0; $completo++;}
      if(isset($_POST['docLegalCOP'])) {$docLegalCOP = 1;} else {$docLegalCOP = 0; $completo++;}

      if ($completo == 0 ) {
        $completo = "Completo";
      }
      else {
        $completo = "Incompleto";
      }
      //--Para ingresa
      if (isset($elemento['id'])){
        $result = mysqli_query($con,"UPDATE DocumentosCliente SET docEstCuentaORI = $docEstCuentaORI, docEstCuentaCOP = $docEstCuentaCOP, docEstCuentaCAN = $docEstCuentaCAN,
          docDecAnualORI = $docDecAnualORI, docDecAnualCOP = $docDecAnualCOP, docRfcORI = $docRfcORI, docRfcCOP = $docRfcCOP,
          docEstFinancierosORI = $docEstFinancierosORI, docEstFinancierosCOP = $docEstFinancierosCOP, docEstFinancierosCAN = $docEstFinancierosCAN,
          docLegalORI = $docLegalORI, docLegalCOP = $docLegalCOP,
          estatus = '".$completo."', notas = '".$cli_Notas."' WHERE id = ".$elemento['id']."");
      }

      break;

      case 'Aval':
      if(isset($_POST['docIdentificacionORI'])) {$docIdentificacionORI = 1;} else {$docIdentificacionORI = 0; $completo++;}
      if(isset($_POST['docIdentificacionCOP'])) {$docIdentificacionCOP = 1;} else {$docIdentificacionCOP = 0; $completo++;}

      if(isset($_POST['docActMatrimonioORI'])) {$docActMatrimonioORI = 1;} else {$docActMatrimonioORI = 0; $completo++;}
      if(isset($_POST['docActMatrimonioCOP'])) {$docActMatrimonioCOP = 1;} else {$docActMatrimonioCOP = 0; $completo++;}
      if($_POST['docActMatrimonioCAN'] != "") {$docActMatrimonioCAN = $_POST['docActMatrimonioCAN'];} else {$docActMatrimonioCAN = 0;}

      if(isset($_POST['docComDomicilioORI'])) {$docComDomicilioORI = 1;} else {$docComDomicilioORI = 0; $completo++;}
      if(isset($_POST['docComDomicilioCOP'])) {$docComDomicilioCOP = 1;} else {$docComDomicilioCOP = 0; $completo++;}

      if ($completo == 0 ) {
        $completo = "Completo";
      }
      else {
        $completo = "Incompleto";
      }
      //--Para ingresa
      if (isset($elemento['id'])){
        $result = mysqli_query($con,"UPDATE DocumentosCliente SET
          docIdentificacionORI = $docIdentificacionORI, docIdentificacionCOP = $docIdentificacionCOP, docComDomicilioORI = $docComDomicilioORI, docComDomicilioCOP = $docComDomicilioCOP,
          docActMatrimonioORI = $docActMatrimonioORI, docActMatrimonioCOP = $docActMatrimonioCOP, docActMatrimonioCAN = $docActMatrimonioCAN,
          estatus = '".$completo."', notas = '".$cli_Notas."' WHERE id = ".$elemento['id']."");
      }

      break;
    }
  }

    //--Para crear aviso
    $result = mysqli_query($con,"SELECT find FROM Clientes WHERE ref = '$ref';");
    $elemento = mysqli_fetch_array($result);
    $result1 = mysqli_query($con,"INSERT INTO Avisos(mensaje,accion,usuario)
      VALUES('Se recibio nuevos documentos de cliente: $elemento[find]','actualizado','$_SESSION[usuario]');");

    //--Para guardar Documentos
    $cli_NDocumentos = $_POST['cliNDocumentos'];
    $count = 1;

    //--Creacion de carpetas
    $target_path = "../../../file/clients/".$ref;
    if (!file_exists($target_path))
      mkdir($target_path, 0777, true);
    $target_path = $target_path."/";

    while ($count <= $cli_NDocumentos) {
      $nombre = 'cliDocument'.$count;
      $target = $target_path . basename( $_FILES[$nombre]['name']);
      move_uploaded_file($_FILES[$nombre]['tmp_name'], $target);
    /*  if(move_uploaded_file($_FILES[$nombre]['tmp_name'], $target_path)) {
        echo "El archivo ". basename( $_FILES[$nombre]['name']). " ha sido subido";
      }
      else{
        echo "Ha ocurrido un error, trate de nuevo!";
      }*/
      $count++;
    }

    //--Para imprimir
    if(array_key_exists('btnImprimir',$_POST)){
      header("Location: ../../templates/index.php?p=im&ref=".$ref);
    }
    else{
      header("Location: ../../templates/index.php?p=lc&ref=".$ref);
    }
  }
 ?>
