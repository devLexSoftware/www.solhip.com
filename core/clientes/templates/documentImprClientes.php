<?php

    $count2_modal = 0;
    $con = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
      if (mysqli_connect_errno()) {
        echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
      }
      else {
        $ref = $_GET['ref'];
        $count = 1;
        $count2 = 1;
        $result = mysqli_query($con,"SELECT PerfilCliente.nombre, PerfilCliente.estado, PerfilCliente.banco
            FROM PerfilCliente INNER JOIN Clientes ON Clientes.id = PerfilCliente.pk_Cliente WHERE Clientes.ref = '".$ref."'");
        $elemento = mysqli_fetch_array($result);

        $result2 = mysqli_query($con,"SELECT * FROM DocumentosCliente
            INNER JOIN PerfilCliente ON PerfilCliente.id = DocumentosCliente.pk_PerfilCliente
            INNER JOIN Clientes ON Clientes.id = PerfilCliente.pk_Cliente WHERE Clientes.ref = '".$ref."'");
        $elemento2 = mysqli_fetch_array($result2);

        $result3 = mysqli_query($con,"SELECT nombre, apellido, find FROM Clientes WHERE Clientes.ref = '".$ref."'");
        $elemento3 = mysqli_fetch_array($result3);

  }

?>


<page backtop="0mm" backbottom="0mm" backleft="10mm" backright="2mm">
  <div class="" style="height:70px; background-color:#1585ab; ">
    <img src="../../../recursos/img/sistema/logo.png" alt=""  style="width:15%;"><label for="" style="color:white; font-size:30px;">Solidez Hipotecaria</label>
  </div>
  <h5 style="text-align:right;">Fecha: <?php echo date('d-m-Y');  ?></h5>

  <br>
  <h4>Relación de documentos entregados por el cliente.</h4>
  <label for="">El cliente: <?php echo $elemento3['nombre']." ".$elemento3['apellido'];?>  entrego los documentos que a continuación se listan:</label>
  <br><br>
  <hr style="border: solid 1px #999; margin: 0 0 10mm;">
  <h5>Documentos entregados</h5>

  <table>
    <tr>
       <?php if($elemento2['solCreBancarioORI'] != null){
       if ($elemento2['solCreBancarioORI'] == 1 or $elemento2['solCreBancarioCOP'] == 1) { echo '<td style="width: 125mm;">'.$count++.'.- Solicitud de crédito bancario llenado y firmado.</td>'; }
       if ($elemento2['solCreBancarioORI'] == 1) { echo '<td style="width: 12mm;">Original</td>'; }
       if ($elemento2['solCreBancarioORI'] == 1 and $elemento2['solCreBancarioCOP'] == 1) { echo '<td style="width: 2mm;">-</td>'; }
       if ($elemento2['solCreBancarioCOP'] == 1) { echo '<td style="width: 12mm;">Copia</td>'; } } ?>
    </tr>
    <tr>
       <?php if($elemento2['autTraCreditoORI'] != null){
       if ($elemento2['autTraCreditoORI'] == 1 or $elemento2['autTraCreditoCOP'] == 1) { echo '<td style="width: 125mm;">'.$count++.'.- Autorización de Tramitación de Crédito firmada.</td>'; }
       if ($elemento2['autTraCreditoORI'] == 1) { echo '<td style="width: 12mm;">Original</td>'; }
       if ($elemento2['autTraCreditoORI'] == 1 and $elemento2['autTraCreditoCOP'] == 1) { echo '<td style="width: 2mm;">-</td>'; }
       if ($elemento2['autTraCreditoCOP'] == 1) { echo '<td style="width: 12mm;">Copia</td>'; } } ?>
    </tr>
    <tr>
      <?php if($elemento2['autBurCreditoORI'] != null){
       if ($elemento2['autBurCreditoORI'] == 1 or $elemento2['autBurCreditoCOP'] == 1) { echo '<td style="width: 125mm;">'.$count++.'.- Autorización de Buró de Crédito.</td>'; }
       if ($elemento2['autBurCreditoORI'] == 1) { echo '<td style="width: 12mm;">Original</td>'; }
       if ($elemento2['autBurCreditoORI'] == 1 and $elemento2['autBurCreditoCOP'] == 1) { echo '<td style="width: 2mm;">-</td>'; }
       if ($elemento2['autBurCreditoCOP'] == 1) { echo '<td style="width: 12mm;">Copia</td>'; } } ?>
    </tr>
    <tr>
       <?php if($elemento2['docActNacimientoORI'] != null){
       if ($elemento2['docActNacimientoORI'] == 1 or $elemento2['docActNacimientoCOP'] == 1) { echo '<td style="width: 125mm;">'.$count++.'.- Acta de Nacimiento original (2).</td>'; }
       if ($elemento2['docActNacimientoORI'] == 1) { echo '<td style="width: 12mm;">Original</td>'; }
       if ($elemento2['docActNacimientoORI'] == 1 and $elemento2['docActNacimientoCOP'] == 1) { echo '<td style="width: 2mm;">-</td>'; }
       if ($elemento2['docActNacimientoCOP'] == 1) { echo '<td style="width: 12mm;">Copia</td>'; }
     /* if ($elemento2['docActNacimientoORI'] == 1 or $elemento2['docActNacimientoCOP'] == 1) { echo '<td style="width: 12mm;">Cantidad:'.$elemento2['docActNacimientoCAN'].' </td>'; } */} ?>
    </tr>
    <tr>
       <?php if($elemento2['docActMatrimonioORI'] != null){
       if ($elemento2['docActMatrimonioORI'] == 1 or $elemento2['docActMatrimonioCOP'] == 1) { echo '<td style="width: 125mm;">'.$count++.'.- Acta de Matrimonio original (2 si aplica).</td>'; }
       if ($elemento2['docActMatrimonioORI'] == 1) { echo '<td style="width: 12mm;">Original</td>'; }
       if ($elemento2['docActMatrimonioORI'] == 1 and $elemento2['docActMatrimonioCOP'] == 1) { echo '<td style="width: 2mm;">-</td>'; }
       if ($elemento2['docActMatrimonioCOP'] == 1) { echo '<td style="width: 12mm;">Copia</td>'; }
       if ($elemento2['docActMatrimonioORI'] == 1 or $elemento2['docActMatrimonioCOP'] == 1) { echo '<td style="width: 12mm;">Cantidad:'.$elemento2['docActMatrimonioCAN'].' </td>'; } } ?>
    </tr>

    <tr>
       <?php if($elemento2['docIdentificacionORI'] != null){
       if ($elemento2['docIdentificacionORI'] == 1 or $elemento2['docIdentificacionCOP'] == 1) { echo '<td style="width: 125mm;">'.$count++.'.- Identificación original.</td>'; }
       if ($elemento2['docIdentificacionORI'] == 1) { echo '<td style="width: 12mm;">Original</td>'; }
       if ($elemento2['docIdentificacionORI'] == 1 and $elemento2['docIdentificacionCOP'] == 1) { echo '<td style="width: 2mm;">-</td>'; }
       if ($elemento2['docIdentificacionCOP'] == 1) { echo '<td style="width: 12mm;">Copia</td>'; } } ?>
    </tr>

    <tr>
       <?php if($elemento2['docRfcORI'] != null){
       if ($elemento2['docRfcORI'] == 1 or $elemento2['docRfcCOP'] == 1) { echo '<td style="width: 125mm;">'.$count++.'.- RFC en documento oficial del SAT.</td>'; }
       if ($elemento2['docRfcORI'] == 1) { echo '<td style="width: 12mm;">Original</td>'; }
       if ($elemento2['docRfcORI'] == 1 and $elemento2['docRfcCOP'] == 1) { echo '<td style="width: 2mm;">-</td>'; }
       if ($elemento2['docRfcCOP'] == 1) { echo '<td style="width: 12mm;">Copia</td>'; } } ?>
    </tr>
    <tr>
       <?php if($elemento2['docCurpORI'] != null){
       if ($elemento2['docCurpORI'] == 1 or $elemento2['docCurpCOP'] == 1) { echo '<td style="width: 125mm;">'.$count++.'.- CURP</td>'; }
       if ($elemento2['docCurpORI'] == 1) { echo '<td style="width: 12mm;">Original</td>'; }
       if ($elemento2['docCurpORI'] == 1 and $elemento2['docCurpCOP'] == 1) { echo '<td style="width: 2mm;">-</td>'; }
       if ($elemento2['docCurpCOP'] == 1) { echo '<td style="width: 12mm;">Copia</td>'; } } ?>
    </tr>
    <tr>
       <?php if($elemento2['docComDomicilioORI'] != null){
       if ($elemento2['docComDomicilioORI'] == 1 or $elemento2['docComDomicilioCOP'] == 1) { echo '<td style="width: 125mm;">'.$count++.'.- Comprobante de domicilio original.</td>'; }
       if ($elemento2['docComDomicilioORI'] == 1) { echo '<td style="width: 12mm;">Original</td>'; }
       if ($elemento2['docComDomicilioORI'] == 1 and $elemento2['docComDomicilioCOP'] == 1) { echo '<td style="width: 2mm;">-</td>'; }
       if ($elemento2['docComDomicilioCOP'] == 1) { echo '<td style="width: 12mm;">Copia</td>'; } } ?>
    </tr>
    <tr>
       <?php if($elemento2['docPatronalORI'] != null){
       if ($elemento2['docPatronalORI'] == 1 or $elemento2['docPatronalCOP'] == 1) { echo '<td style="width: 125mm;">'.$count++.'.- Carta Patronal en donde se indique puesto, antigüedad</td>'; }
       } ?>
    </tr>
    <tr>
       <?php if($elemento2['docPatronalORI'] != null){
       if ($elemento2['docPatronalORI'] == 1 or $elemento2['docPatronalCOP'] == 1) { echo '<td style="width: 125mm;">        sueldo bruto,numero de seguro social, CURP y RFC. (2).</td>'; }
       if ($elemento2['docPatronalORI'] == 1) { echo '<td style="width: 12mm;">Original</td>'; }
       if ($elemento2['docPatronalORI'] == 1 and $elemento2['docPatronalCOP'] == 1) { echo '<td style="width: 2mm;">-</td>'; }
       if ($elemento2['docPatronalCOP'] == 1) { echo '<td style="width: 12mm;">Copia</td>'; }
     /*if ($elemento2['docPatronalORI'] == 1 or $elemento2['docPatronalCOP'] == 1) { echo '<td style="width: 12mm;">Cantidad:'.$elemento2['docNominaCAN'].' </td>'; } */} ?>
    </tr>
    <tr>
      <?php if($elemento2['docNominaORI'] != null){
       if($elemento2['docNominaORI'] == 1 or $elemento2['docNominaCOP'] == 1) { echo '<td style="width: 125mm;">'.$count++.'.- Últimos 6 recibos de nomina.</td>'; }
       if($elemento2['docNominaORI'] == 1) { echo '<td style="width: 12mm;">Original</td>'; }
       if($elemento2['docNominaORI'] == 1 and $elemento2['docNominaCOP'] == 1) { echo '<td style="width: 2mm;">-</td>'; }
       if($elemento2['docNominaCOP'] == 1) { echo '<td style="width: 12mm;">Copia</td>'; }
     /*if($elemento2['docNominaORI'] == 1 or $elemento2['docNominaCOP'] == 1) { echo '<td style="width: 12mm;">Cantidad:'.$elemento2['docNominaCAN'].' </td>'; }  */}?>
    </tr>
    <tr>
      <?php if($elemento2['docEstCuentaORI'] != null){
       if($elemento2['docEstCuentaORI'] == 1 or $elemento2['docEstCuentaCOP'] == 1) { echo '<td style="width: 125mm;">'.$count++.'.- Últimos 3 estados de cuenta bancarios donde depositan el sueldo.</td>'; }
       if($elemento2['docEstCuentaORI'] == 1) { echo '<td style="width: 12mm;">Original</td>'; }
       if($elemento2['docEstCuentaORI'] == 1 and $elemento2['docEstCuentaCOP'] == 1) { echo '<td style="width: 2mm;">-</td>'; }
       if($elemento2['docEstCuentaCOP'] == 1) { echo '<td style="width: 12mm;">Copia</td>'; }
       if($elemento2['docEstCuentaORI'] == 1 or $elemento2['docEstCuentaCOP'] == 1) { echo '<td style="width: 12mm;">Cantidad:'.$elemento2['docEstCuentaCAN'].' </td>'; }   }?>
    </tr>
    <tr>
      <?php if($elemento2['docAvaComercialORI'] != null){
       if($elemento2['docAvaComercialORI'] == 1 or $elemento2['docAvaComercialCOP'] == 1) { echo '<td style="width: 125mm;">'.$count++.'.- Avalúo comercial.</td>'; }
       if($elemento2['docAvaComercialORI'] == 1) { echo '<td style="width: 12mm;">Original</td>'; }
       if($elemento2['docAvaComercialORI'] == 1 and $elemento2['docAvaComercialCOP'] == 1) { echo '<td style="width: 2mm;">-</td>'; }
       if($elemento2['docAvaComercialCOP'] == 1) { echo '<td style="width: 12mm;">Copia</td>'; }   }?>
    </tr>
    <tr>
      <?php if($elemento2['solDicTecnicoORI'] != null){
       if($elemento2['solDicTecnicoORI'] == 1 or $elemento2['solDicTecnicoCOP'] == 1) { echo '<td style="width: 125mm;">'.$count++.'.- Formato de dictamen técnico de calidad.</td>'; }
       if($elemento2['solDicTecnicoORI'] == 1) { echo '<td style="width: 12mm;">Original</td>'; }
       if($elemento2['solDicTecnicoORI'] == 1 and $elemento2['solDicTecnicoCOP'] == 1) { echo '<td style="width: 2mm;">-</td>'; }
       if($elemento2['solDicTecnicoCOP'] == 1) { echo '<td style="width: 12mm;">Copia</td>'; }   }?>
    </tr>
    <tr>
       <?php if($elemento2['docIdeFirmadaORI'] != null){
       if ($elemento2['docIdeFirmadaORI'] == 1 or $elemento2['docIdeFirmadaCOP'] == 1) { echo '<td style="width: 125mm;">'.$count++.'.- Copia de credencial de elector o pasaporte. Registrar la leyenda  </td>'; }
       } ?>
    </tr>
    <tr>
       <?php if($elemento2['docIdeFirmadaORI'] != null){
       if ($elemento2['docIdeFirmadaORI'] == 1 or $elemento2['docIdeFirmadaCOP'] == 1) { echo '<td style="width: 125mm;">“Cotejado contra su original” y firmado por el promotor de vivienda.</td>'; }
       if ($elemento2['docIdeFirmadaORI'] == 1) { echo '<td style="width: 12mm;">Original</td>'; }
       if ($elemento2['docIdeFirmadaORI'] == 1 and $elemento2['docPatronalCOP'] == 1) { echo '<td style="width: 2mm;">-</td>'; }
       if ($elemento2['docIdeFirmadaCOP'] == 1) { echo '<td style="width: 12mm;">Copia</td>'; }} ?>
    </tr>

    <tr>
      <?php if($elemento2['docLisNominalORI'] != null){
       if($elemento2['docLisNominalORI'] == 1 or $elemento2['docLisNominalCOP'] == 1) { echo '<td style="width: 125mm;">'.$count++.'.- Consulta de lista nominal en caso de credencial de elector.</td>'; }
       if($elemento2['docLisNominalORI'] == 1) { echo '<td style="width: 12mm;">Original</td>'; }
       if($elemento2['docLisNominalORI'] == 1 and $elemento2['docLisNominalCOP'] == 1) { echo '<td style="width: 2mm;">-</td>'; }
       if($elemento2['docLisNominalCOP'] == 1) { echo '<td style="width: 12mm;">Copia</td>'; }   }?>
    </tr>

    <tr>
      <?php if($elemento2['docConPropiedadORI'] != null){
       if($elemento2['docConPropiedadORI'] == 1 or $elemento2['docConPropiedadCOP'] == 1) { echo '<td style="width: 125mm;">'.$count++.'.- Constancia de propiedad o no propiedad</td>'; }
     }?>
    </tr>
    <tr>
      <?php if($elemento2['docConPropiedadORI'] != null){
       if($elemento2['docConPropiedadORI'] == 1 or $elemento2['docConPropiedadCOP'] == 1) { echo '<td style="width: 125mm;">no mayor a 60 dias.(Solicitarlo en Centro de Gobierno).</td>'; }
       if($elemento2['docConPropiedadORI'] == 1) { echo '<td style="width: 12mm;">Original</td>'; }
       if($elemento2['docConPropiedadORI'] == 1 and $elemento2['docConPropiedadCOP'] == 1) { echo '<td style="width: 2mm;">-</td>'; }
       if($elemento2['docConPropiedadCOP'] == 1) { echo '<td style="width: 12mm;">Copia</td>'; }   }?>
    </tr>
    <tr>
      <?php if($elemento2['docPreConfinavitORI'] != null){
       if($elemento2['docPreConfinavitORI'] == 1 or $elemento2['docPreConfinavitCOP'] == 1) { echo '<td style="width: 125mm;">'.$count++.'.- Precalificación del CONFINAVIT impreso y firmado por el cliente.</td>'; }
       if($elemento2['docPreConfinavitORI'] == 1) { echo '<td style="width: 12mm;">Original</td>'; }
       if($elemento2['docPreConfinavitORI'] == 1 and $elemento2['docPreConfinavitCOP'] == 1) { echo '<td style="width: 2mm;">-</td>'; }
       if($elemento2['docPreConfinavitCOP'] == 1) { echo '<td style="width: 12mm;">Copia</td>'; }   }?>
    </tr>
    <tr>
      <?php if($elemento2['docEcoTecnologiasORI'] != null){
       if($elemento2['docEcoTecnologiasORI'] == 1 or $elemento2['docPreConfindocEcoTecnologiasCOPavitCOP'] == 1) { echo '<td style="width: 125mm;">'.$count++.'.- Ecotecnologias impreso y firmado por el cliente.</td>'; }
       if($elemento2['docEcoTecnologiasORI'] == 1) { echo '<td style="width: 12mm;">Original</td>'; }
       if($elemento2['docEcoTecnologiasORI'] == 1 and $elemento2['docEcoTecnologiasCOP'] == 1) { echo '<td style="width: 2mm;">-</td>'; }
       if($elemento2['docEcoTecnologiasCOP'] == 1) { echo '<td style="width: 12mm;">Copia</td>'; }   }?>
    </tr>
    <tr>
      <?php if($elemento2['docDetMovimientoORI'] != null){
       if($elemento2['docDetMovimientoORI'] == 1 or $elemento2['docDetMovimientoCOP'] == 1) { echo '<td style="width: 125mm;">'.$count++.'.- Detalle de movimientos (¿Cuanto llevo ahorrado?).</td>'; }
       if($elemento2['docDetMovimientoORI'] == 1) { echo '<td style="width: 12mm;">Original</td>'; }
       if($elemento2['docDetMovimientoORI'] == 1 and $elemento2['docDetMovimientoCOP'] == 1) { echo '<td style="width: 2mm;">-</td>'; }
       if($elemento2['docDetMovimientoCOP'] == 1) { echo '<td style="width: 12mm;">Copia</td>'; }   }?>
    </tr>
    <tr>
      <?php if($elemento2['docConLaboralORI'] != null){
       if($elemento2['docConLaboralORI'] == 1 or $elemento2['docConLaboralCOP'] == 1) { echo '<td style="width: 125mm;">'.$count++.'.- Constancia laboral completa.</td>'; }
       if($elemento2['docConLaboralORI'] == 1) { echo '<td style="width: 12mm;">Original</td>'; }
       if($elemento2['docConLaboralORI'] == 1 and $elemento2['docConLaboralCOP'] == 1) { echo '<td style="width: 2mm;">-</td>'; }
       if($elemento2['docConLaboralCOP'] == 1) { echo '<td style="width: 12mm;">Copia</td>'; }   }?>
    </tr>
    <tr>
      <?php if($elemento2['docPredialORI'] != null){
       if($elemento2['docPredialORI'] == 1 or $elemento2['docPredialCOP'] == 1) { echo '<td style="width: 125mm;">'.$count++.'.- Predial vigente.</td>'; }
       if($elemento2['docPredialORI'] == 1) { echo '<td style="width: 12mm;">Original</td>'; }
       if($elemento2['docPredialORI'] == 1 and $elemento2['docPredialCOP'] == 1) { echo '<td style="width: 2mm;">-</td>'; }
       if($elemento2['docPredialCOP'] == 1) { echo '<td style="width: 12mm;">Copia</td>'; }   }?>
    </tr>
    <tr>
      <?php if($elemento2['docMejoravitORI'] != null){
       if($elemento2['docMejoravitORI'] == 1 or $elemento2['docMejoravitCOP'] == 1) { echo '<td style="width: 125mm;">'.$count++.'.- Impresa la imagen del Mejoravit</td>'; }
     }?>
    </tr>
    <tr>
      <?php if($elemento2['docMejoravitORI'] != null){
       if($elemento2['docMejoravitORI'] == 1 or $elemento2['docMejoravitCOP'] == 1) { echo '<td style="width: 125mm;">para ver que este correcto el RFC con su homoclave.</td>'; }
       if($elemento2['docMejoravitORI'] == 1) { echo '<td style="width: 12mm;">Original</td>'; }
       if($elemento2['docMejoravitORI'] == 1 and $elemento2['docMejoravitCOP'] == 1) { echo '<td style="width: 2mm;">-</td>'; }
       if($elemento2['docMejoravitCOP'] == 1) { echo '<td style="width: 12mm;">Copia</td>'; }   }?>
    </tr>
    <tr>
      <?php if($elemento2['docConTallerORI'] != null){
       if($elemento2['docConTallerORI'] == 1 or $elemento2['docConTallerCOP'] == 1) { echo '<td style="width: 125mm;">'.$count++.'.- Constancia del taller “Saber Para Decidir”.</td>'; }
       if($elemento2['docConTallerORI'] == 1) { echo '<td style="width: 12mm;">Original</td>'; }
       if($elemento2['docConTallerORI'] == 1 and $elemento2['docConTallerCOP'] == 1) { echo '<td style="width: 2mm;">-</td>'; }
       if($elemento2['docConTallerCOP'] == 1) { echo '<td style="width: 12mm;">Copia</td>'; }   }?>
    </tr>
    <tr>
      <?php if($elemento2['solCreInfonavitORI'] != null){
       if($elemento2['solCreInfonavitORI'] == 1 or $elemento2['solCreInfonavitCOP'] == 1) { echo '<td style="width: 125mm;">'.$count++.'.- Solicitud de crédito del INFONAVIT firmada.</td>'; }
       if($elemento2['solCreInfonavitORI'] == 1) { echo '<td style="width: 12mm;">Original</td>'; }
       if($elemento2['solCreInfonavitORI'] == 1 and $elemento2['solCreInfonavitCOP'] == 1) { echo '<td style="width: 2mm;">-</td>'; }
       if($elemento2['solCreInfonavitCOP'] == 1) { echo '<td style="width: 12mm;">Copia</td>'; }   }?>
    </tr>
    <tr>
      <?php if($elemento2['solCreInfonavitORI'] != null){
       if($elemento2['solCreInfonavitORI'] == 1 or $elemento2['solCreInfonavitCOP'] == 1) { echo '<td style="width: 125mm;">(Debe ser llenada manualmente y no en digital).</td>'; }
       if($elemento2['solCreInfonavitORI'] == 1) { echo '<td style="width: 12mm;">Original</td>'; }
       if($elemento2['solCreInfonavitORI'] == 1 and $elemento2['solCreInfonavitCOP'] == 1) { echo '<td style="width: 2mm;">-</td>'; }
       if($elemento2['solCreInfonavitCOP'] == 1) { echo '<td style="width: 12mm;">Copia</td>'; }   }?>
    </tr>
    <tr>
      <?php if($elemento2['docInsIrrevocableORI'] != null){
       if($elemento2['docInsIrrevocableORI'] == 1 or $elemento2['docInsIrrevocableCOP'] == 1) { echo '<td style="width: 125mm;">'.$count++.'.- Carta de instrucción irrevocable firmada. (Solo en segundo campo).</td>'; }
       if($elemento2['docInsIrrevocableORI'] == 1) { echo '<td style="width: 12mm;">Original</td>'; }
       if($elemento2['docInsIrrevocableORI'] == 1 and $elemento2['docInsIrrevocableCOP'] == 1) { echo '<td style="width: 2mm;">-</td>'; }
       if($elemento2['docInsIrrevocableCOP'] == 1) { echo '<td style="width: 12mm;">Copia</td>'; }   }?>
    </tr>
    <tr>
      <?php if($elemento2['docAutBuroCreditoORI'] != null){
       if($elemento2['docAutBuroCreditoORI'] == 1 or $elemento2['docAutBuroCreditoCOP'] == 1) { echo '<td style="width: 125mm;">'.$count++.'.- Formato de autorización de consulta de buró de crédito.</td>'; }
       if($elemento2['docAutBuroCreditoORI'] == 1) { echo '<td style="width: 12mm;">Original</td>'; }
       if($elemento2['docAutBuroCreditoORI'] == 1 and $elemento2['docAutBuroCreditoCOP'] == 1) { echo '<td style="width: 2mm;">-</td>'; }
       if($elemento2['docAutBuroCreditoCOP'] == 1) { echo '<td style="width: 12mm;">Copia</td>'; }
     /*if($elemento2['docAutBuroCreditoORI'] == 1 or $elemento2['docAutBuroCreditoCOP'] == 1) { echo '<td style="width: 12mm;">Cantidad:'.$elemento2['docAutBuroCreditoCAN'].' </td>'; }   */}?>
    </tr>
    <tr>
      <?php if($elemento2['docAutBuroCreditoORI'] != null){
       if($elemento2['docAutBuroCreditoORI'] == 1 or $elemento2['docAutBuroCreditoCOP'] == 1) { echo '<td style="width: 125mm;">(4 Tantos y no se registra la fecha en que se firma el formato)</td>'; }
       if($elemento2['docAutBuroCreditoORI'] == 1) { echo '<td style="width: 12mm;">Original</td>'; }
       if($elemento2['docAutBuroCreditoORI'] == 1 and $elemento2['docAutBuroCreditoCOP'] == 1) { echo '<td style="width: 2mm;">-</td>'; }
       if($elemento2['docAutBuroCreditoCOP'] == 1) { echo '<td style="width: 12mm;">Copia</td>'; }
       if($elemento2['docAutBuroCreditoORI'] == 1 or $elemento2['docAutBuroCreditoCOP'] == 1) { echo '<td style="width: 12mm;">Cantidad:'.$elemento2['docAutBuroCreditoCAN'].' </td>'; }   }?>
    </tr>
    <tr>
      <?php if($elemento2['docManifiestoORI'] != null){
       if($elemento2['docManifiestoORI'] == 1 or $elemento2['docManifiestoCOP'] == 1) { echo '<td style="width: 125mm;">'.$count++.'.- Formato de manifiesto y acuerdo. (Firmado con su debida huella digital). </td>'; }
       if($elemento2['docManifiestoORI'] == 1) { echo '<td style="width: 12mm;">Original</td>'; }
       if($elemento2['docManifiestoORI'] == 1 and $elemento2['docManifiestoCOP'] == 1) { echo '<td style="width: 2mm;">-</td>'; }
       if($elemento2['docManifiestoCOP'] == 1) { echo '<td style="width: 12mm;">Copia</td>'; }   }?>
    </tr>

    <tr>
      <?php if($elemento2['docDecAnualORI'] != null){
       if($elemento2['docDecAnualORI'] == 1 or $elemento2['docDecAnualCOP'] == 1) { echo '<td  style="width: 125mm;">'.$count++.'.- Declaración Anual. </td>'; }
       if($elemento2['docDecAnualORI'] == 1) { echo '<td  style="width: 12mm;">Original</td>'; }
       if($elemento2['docDecAnualORI'] == 1 and $elemento2['docDecAnualCOP'] == 1) { echo '<td  style="width: 2mm;">-</td>'; }
       if($elemento2['docDecAnualCOP'] == 1) { echo '<td  style="width: 12mm;">Copia</td>'; }   }?>
    </tr>
    <tr>
      <?php if($elemento2['docDecParcialORI'] != null){
       if($elemento2['docDecParcialORI'] == 1 or $elemento2['docDecParcialCOP'] == 1) { echo '<td  style="width: 125mm;">'.$count++.'.- Declaración Parcial. </td>'; }
       if($elemento2['docDecParcialORI'] == 1) { echo '<td  style="width: 12mm;">Original</td>'; }
       if($elemento2['docDecParcialORI'] == 1 and $elemento2['docDecParcialCOP'] == 1) { echo '<td  style="width: 2mm;">-</td>'; }
       if($elemento2['docDecParcialCOP'] == 1) { echo '<td  style="width: 12mm;">Copia</td>'; }   }?>
    </tr>
    <tr>
      <?php if($elemento2['solAltSecretariaORI'] != null){
       if($elemento2['solAltSecretariaORI'] == 1 or $elemento2['solAltSecretariaCOP'] == 1) { echo '<td  style="width: 125mm;">'.$count++.'.- Alta de Secretaria de Hacienda y Crédito Público. </td>'; }
       if($elemento2['solAltSecretariaORI'] == 1) { echo '<td  style="width: 12mm;">Original</td>'; }
       if($elemento2['solAltSecretariaORI'] == 1 and $elemento2['solAltSecretariaCOP'] == 1) { echo '<td  style="width: 2mm;">-</td>'; }
       if($elemento2['solAltSecretariaCOP'] == 1) { echo '<td  style="width: 12mm;">Copia</td>'; }   }?>
    </tr>
    <tr>
      <?php if($elemento2['docConvenioORI'] != null){
       if($elemento2['docConvenioORI'] == 1 or $elemento2['docConvenioCOP'] == 1) { echo '<td  style="width: 125mm;">'.$count++.'.- Convenio de pensión.</td>'; }
       if($elemento2['docConvenioORI'] == 1) { echo '<td  style="width: 12mm;">Original</td>'; }
       if($elemento2['docConvenioORI'] == 1 and $elemento2['docConvenioCOP'] == 1) { echo '<td  style="width: 2mm;">-</td>'; }
       if($elemento2['docConvenioCOP'] == 1) { echo '<td  style="width: 12mm;">Copia</td>'; }   }?>
    </tr>
    <tr>
      <?php if($elemento2['docPenMensualORI'] != null){
       if($elemento2['docPenMensualORI'] == 1 or $elemento2['docPenMensualCOP'] == 1) { echo '<td  style="width: 125mm;">'.$count++.'.- Últimos 3 recibos de pensión mensual.</td>'; }
       if($elemento2['docPenMensualORI'] == 1) { echo '<td  style="width: 12mm;">Original</td>'; }
       if($elemento2['docPenMensualORI'] == 1 and $elemento2['docPenMensualCOP'] == 1) { echo '<td  style="width: 2mm;">-</td>'; }
       if($elemento2['docPenMensualCOP'] == 1) { echo '<td  style="width: 12mm;">Copia</td>'; }
     /*if($elemento2['docPenMensualORI'] == 1 or $elemento2['docPenMensualCOP'] == 1) { echo '<td  style="width: 12mm;">Cantidad:'.$elemento2['docPenMensualCAN'].' </td>'; }   */}?>
    </tr>
    <tr>
      <?php if($elemento2['docPenCuentaORI'] != null){
       if($elemento2['docPenCuentaORI'] == 1 or $elemento2['docPenCuentaCOP'] == 1) { echo '<td  style="width: 125mm;">'.$count++.'.- Últimos 3 recibos de pensión mensual.</td>'; }
       if($elemento2['docPenCuentaORI'] == 1) { echo '<td  style="width: 12mm;">Original</td>'; }
       if($elemento2['docPenCuentaORI'] == 1 and $elemento2['docPenCuentaCOP'] == 1) { echo '<td  style="width: 2mm;">-</td>'; }
       if($elemento2['docPenCuentaCOP'] == 1) { echo '<td  style="width: 12mm;">Copia</td>'; }
     /*if($elemento2['docPenCuentaORI'] == 1 or $elemento2['docPenCuentaCOP'] == 1) { echo '<td  style="width: 12mm;">Cantidad:'.$elemento2['docPenCuentaCAN'].' </td>'; }   */}?>
    </tr>
    <tr>
      <?php if($elemento2['sol97ORI'] != null){
       if($elemento2['sol97ORI'] == 1 or $elemento2['sol97COP'] == 1) { echo '<td  style="width: 125mm;">'.$count++.'.- Solicitud 97.</td>'; }
       if($elemento2['sol97ORI'] == 1) { echo '<td  style="width: 12mm;">Original</td>'; }
       if($elemento2['sol97ORI'] == 1 and $elemento2['sol97COP'] == 1) { echo '<td  style="width: 2mm;">-</td>'; }
       if($elemento2['sol97COP'] == 1) { echo '<td  style="width: 12mm;">Copia</td>'; }
     /*if($elemento2['docPenCuentaORI'] == 1 or $elemento2['docPenCuentaCOP'] == 1) { echo '<td  style="width: 12mm;">Cantidad:'.$elemento2['docPenCuentaCAN'].' </td>'; }   */}?>
    </tr>
    <tr>
      <?php if($elemento2['docSitFiscalORI'] != null){
       if($elemento2['docSitFiscalORI'] == 1 or $elemento2['docSitFiscalCOP'] == 1) { echo '<td  style="width: 125mm;">'.$count++.'.- Constancia de situación Fiscal.</td>'; }
       if($elemento2['docSitFiscalORI'] == 1) { echo '<td  style="width: 12mm;">Original</td>'; }
       if($elemento2['docSitFiscalORI'] == 1 and $elemento2['docSitFiscalCOP'] == 1) { echo '<td  style="width: 2mm;">-</td>'; }
       if($elemento2['docSitFiscalCOP'] == 1) { echo '<td  style="width: 12mm;">Copia</td>'; }
     /*if($elemento2['docPenCuentaORI'] == 1 or $elemento2['docPenCuentaCOP'] == 1) { echo '<td  style="width: 12mm;">Cantidad:'.$elemento2['docPenCuentaCAN'].' </td>'; }   */}?>
    </tr>
    <tr>
      <?php if($elemento2['docActConstitutivaORI'] != null){
       if($elemento2['docActConstitutivaORI'] == 1 or $elemento2['docActConstitutivaCOP'] == 1) { echo '<td  style="width: 125mm;">'.$count++.'.- Acta constitutiva de la empresa.</td>'; }
       if($elemento2['docActConstitutivaORI'] == 1) { echo '<td  style="width: 12mm;">Original</td>'; }
       if($elemento2['docActConstitutivaORI'] == 1 and $elemento2['docActConstitutivaCOP'] == 1) { echo '<td  style="width: 2mm;">-</td>'; }
       if($elemento2['docActConstitutivaCOP'] == 1) { echo '<td  style="width: 12mm;">Copia</td>'; }
     /*if($elemento2['docPenCuentaORI'] == 1 or $elemento2['docPenCuentaCOP'] == 1) { echo '<td  style="width: 12mm;">Cantidad:'.$elemento2['docPenCuentaCAN'].' </td>'; }   */}?>
    </tr>

    <tr>
      <?php if($elemento2['docSaludORI'] != null){
       if($elemento2['docSaludORI'] == 1 or $elemento2['docSaludCOP'] == 1) { echo '<td  style="width: 125mm;">'.$count++.'.- Cuestionario de salud.</td>'; }
       if($elemento2['docSaludORI'] == 1) { echo '<td  style="width: 12mm;">Original</td>'; }
       if($elemento2['docSaludORI'] == 1 and $elemento2['docSaludCOP'] == 1) { echo '<td  style="width: 2mm;">-</td>'; }
       if($elemento2['docSaludCOP'] == 1) { echo '<td  style="width: 12mm;">Copia</td>'; }
     /*if($elemento2['docPenCuentaORI'] == 1 or $elemento2['docPenCuentaCOP'] == 1) { echo '<td  style="width: 12mm;">Cantidad:'.$elemento2['docPenCuentaCAN'].' </td>'; }   */}?>
    </tr>
    <tr>
      <?php if($elemento2['docCotizacionORI'] != null){
       if($elemento2['docCotizacionORI'] == 1 or $elemento2['docCotizacionCOP'] == 1) { echo '<td  style="width: 125mm;">'.$count++.'.- Cotización.</td>'; }
       if($elemento2['docCotizacionORI'] == 1) { echo '<td  style="width: 12mm;">Original</td>'; }
       if($elemento2['docCotizacionORI'] == 1 and $elemento2['docCotizacionCOP'] == 1) { echo '<td  style="width: 2mm;">-</td>'; }
       if($elemento2['docCotizacionCOP'] == 1) { echo '<td  style="width: 12mm;">Copia</td>'; }
     /*if($elemento2['docPenCuentaORI'] == 1 or $elemento2['docPenCuentaCOP'] == 1) { echo '<td  style="width: 12mm;">Cantidad:'.$elemento2['docPenCuentaCAN'].' </td>'; }   */}?>
    </tr>
    <tr>
      <?php if($elemento2['docApoyoORI'] != null){
       if($elemento2['docApoyoORI'] == 1 or $elemento2['docApoyoCOP'] == 1) { echo '<td  style="width: 125mm;">'.$count++.'.- Carta de apoyo.</td>'; }
       if($elemento2['docApoyoORI'] == 1) { echo '<td  style="width: 12mm;">Original</td>'; }
       if($elemento2['docApoyoORI'] == 1 and $elemento2['docApoyoCOP'] == 1) { echo '<td  style="width: 2mm;">-</td>'; }
       if($elemento2['docApoyoCOP'] == 1) { echo '<td  style="width: 12mm;">Copia</td>'; }
     /*if($elemento2['docPenCuentaORI'] == 1 or $elemento2['docPenCuentaCOP'] == 1) { echo '<td  style="width: 12mm;">Cantidad:'.$elemento2['docPenCuentaCAN'].' </td>'; }   */}?>
    </tr>
    <tr>
      <?php if($elemento2['docRelPatrimonialORI'] != null){
       if($elemento2['docRelPatrimonialORI'] == 1 or $elemento2['docRelPatrimonialCOP'] == 1) { echo '<td  style="width: 125mm;">'.$count++.'.- Relación Patrimonial.</td>'; }
       if($elemento2['docRelPatrimonialORI'] == 1) { echo '<td  style="width: 12mm;">Original</td>'; }
       if($elemento2['docRelPatrimonialORI'] == 1 and $elemento2['docRelPatrimonialCOP'] == 1) { echo '<td  style="width: 2mm;">-</td>'; }
       if($elemento2['docRelPatrimonialCOP'] == 1) { echo '<td  style="width: 12mm;">Copia</td>'; }
     /*if($elemento2['docPenCuentaORI'] == 1 or $elemento2['docPenCuentaCOP'] == 1) { echo '<td  style="width: 12mm;">Cantidad:'.$elemento2['docPenCuentaCAN'].' </td>'; }   */}?>
    </tr>
    <tr>
      <?php if($elemento2['docRepComercialORI'] != null){
       if($elemento2['docRepComercialORI'] == 1 or $elemento2['docRepComercialCOP'] == 1) { echo '<td  style="width: 125mm;">'.$count++.'.- Reporte de Giro Comercial.</td>'; }
       if($elemento2['docRepComercialORI'] == 1) { echo '<td  style="width: 12mm;">Original</td>'; }
       if($elemento2['docRepComercialORI'] == 1 and $elemento2['docRepComercialCOP'] == 1) { echo '<td  style="width: 2mm;">-</td>'; }
       if($elemento2['docRepComercialCOP'] == 1) { echo '<td  style="width: 12mm;">Copia</td>'; }
     /*if($elemento2['docPenCuentaORI'] == 1 or $elemento2['docPenCuentaCOP'] == 1) { echo '<td  style="width: 12mm;">Cantidad:'.$elemento2['docPenCuentaCAN'].' </td>'; }   */}?>
    </tr>
    <tr>
      <?php if($elemento2['docLegalORI'] != null){
       if($elemento2['docLegalORI'] == 1 or $elemento2['docLegalCOP'] == 1) { echo '<td  style="width: 125mm;">'.$count++.'.- Documentación Legal.</td>'; }
       if($elemento2['docLegalORI'] == 1) { echo '<td  style="width: 12mm;">Original</td>'; }
       if($elemento2['docLegalORI'] == 1 and $elemento2['docLegalCOP'] == 1) { echo '<td  style="width: 2mm;">-</td>'; }
       if($elemento2['docLegalCOP'] == 1) { echo '<td  style="width: 12mm;">Copia</td>'; }
     /*if($elemento2['docPenCuentaORI'] == 1 or $elemento2['docPenCuentaCOP'] == 1) { echo '<td  style="width: 12mm;">Cantidad:'.$elemento2['docPenCuentaCAN'].' </td>'; }   */}?>
    </tr>
    <tr>
      <?php if($elemento2['docConComercialORI'] != null){
       if($elemento2['docConComercialORI'] == 1 or $elemento2['docConComercialCOP'] == 1) { echo '<td  style="width: 125mm;">'.$count++.'.- Contratos de Renta y/o Recibos.</td>'; }
       if($elemento2['docConComercialORI'] == 1) { echo '<td  style="width: 12mm;">Original</td>'; }
       if($elemento2['docConComercialORI'] == 1 and $elemento2['docConComercialCOP'] == 1) { echo '<td  style="width: 2mm;">-</td>'; }
       if($elemento2['docConComercialCOP'] == 1) { echo '<td  style="width: 12mm;">Copia</td>'; }
     if($elemento2['docConComercialORI'] == 1 or $elemento2['docConComercialCOP'] == 1) { echo '<td  style="width: 12mm;">Cantidad:'.$elemento2['docConComercialCAN'].' </td>'; }   }?>
    </tr>
    <tr>
      <?php if($elemento2['docTenenciasORI'] != null){
       if($elemento2['docTenenciasORI'] == 1 or $elemento2['docTenenciasCOP'] == 1) { echo '<td  style="width: 125mm;">'.$count++.'.- Tenencia de las Propiedades.</td>'; }
       if($elemento2['docTenenciasORI'] == 1) { echo '<td  style="width: 12mm;">Original</td>'; }
       if($elemento2['docTenenciasORI'] == 1 and $elemento2['docTenenciasCOP'] == 1) { echo '<td  style="width: 2mm;">-</td>'; }
       if($elemento2['docTenenciasCOP'] == 1) { echo '<td  style="width: 12mm;">Copia</td>'; }
     /*if($elemento2['docPenCuentaORI'] == 1 or $elemento2['docPenCuentaCOP'] == 1) { echo '<td  style="width: 12mm;">Cantidad:'.$elemento2['docPenCuentaCAN'].' </td>'; }   */}?>
    </tr>
    <tr>
      <?php if($elemento2['docRecHonorariosORI'] != null){
       if($elemento2['docRecHonorariosORI'] == 1 or $elemento2['docRecHonorariosCOP'] == 1) { echo '<td  style="width: 125mm;">'.$count++.'.- Recibos de Honorarios.</td>'; }
       if($elemento2['docRecHonorariosORI'] == 1) { echo '<td  style="width: 12mm;">Original</td>'; }
       if($elemento2['docRecHonorariosORI'] == 1 and $elemento2['docRecHonorariosCOP'] == 1) { echo '<td  style="width: 2mm;">-</td>'; }
       if($elemento2['docRecHonorariosCOP'] == 1) { echo '<td  style="width: 12mm;">Copia</td>'; }
     if($elemento2['docRecHonorariosORI'] == 1 or $elemento2['docRecHonorariosCOP'] == 1) { echo '<td  style="width: 12mm;">Cantidad:'.$elemento2['docRecHonorariosCAN'].' </td>'; }   }?>
    </tr>
    <tr>
      <?php if($elemento2['docEstFinancierosORI'] != null){
       if($elemento2['docEstFinancierosORI'] == 1 or $elemento2['docEstFinancierosCOP'] == 1) { echo '<td  style="width: 125mm;">'.$count++.'.- Estados Financieros.</td>'; }
       if($elemento2['docEstFinancierosORI'] == 1) { echo '<td  style="width: 12mm;">Original</td>'; }
       if($elemento2['docEstFinancierosORI'] == 1 and $elemento2['docEstFinancierosCOP'] == 1) { echo '<td  style="width: 2mm;">-</td>'; }
       if($elemento2['docEstFinancierosCOP'] == 1) { echo '<td  style="width: 12mm;">Copia</td>'; }
     if($elemento2['docEstFinancierosORI'] == 1 or $elemento2['docEstFinancierosCOP'] == 1) { echo '<td  style="width: 12mm;">Cantidad:'.$elemento2['docEstFinancierosCAN'].' </td>'; }   }?>
    </tr>
  </table>
  <hr style="border: solid 1px #999; margin: 0 0 10mm;">
  <h5>Documentos pendientes</h5>
  <table>
    <tr>
       <?php if($elemento2['solCreBancarioORI'] != null){
       if ($elemento2['solCreBancarioORI'] == 0 or $elemento2['solCreBancarioCOP'] == 0) { echo '<td style="width: 125mm;">'.$count++.'.- Solicitud de crédito bancario llenado y firmado.</td>'; }
       if ($elemento2['solCreBancarioORI'] == 0) { echo '<td style="width: 12mm;">Original</td>'; }
       if ($elemento2['solCreBancarioORI'] == 0 and $elemento2['solCreBancarioCOP'] == 0) { echo '<td style="width: 2mm;">-</td>'; }
       if ($elemento2['solCreBancarioCOP'] == 0) { echo '<td style="width: 12mm;">Copia</td>'; } } ?>
    </tr>
    <tr>
       <?php if($elemento2['autTraCreditoORI'] != null){
       if ($elemento2['autTraCreditoORI'] == 0 or $elemento2['autTraCreditoCOP'] == 0) { echo '<td style="width: 125mm;">'.$count++.'.- Autorización de Tramitación de Crédito firmada.</td>'; }
       if ($elemento2['autTraCreditoORI'] == 0) { echo '<td style="width: 12mm;">Original</td>'; }
       if ($elemento2['autTraCreditoORI'] == 0 and $elemento2['autTraCreditoCOP'] == 0) { echo '<td style="width: 2mm;">-</td>'; }
       if ($elemento2['autTraCreditoCOP'] == 0) { echo '<td style="width: 12mm;">Copia</td>'; } } ?>
    </tr>
    <tr>
      <?php if($elemento2['autBurCreditoORI'] != null){
       if ($elemento2['autBurCreditoORI'] == 0 or $elemento2['autBurCreditoCOP'] == 0) { echo '<td style="width: 125mm;">'.$count++.'.- Autorización de Buró de Crédito.</td>'; }
       if ($elemento2['autBurCreditoORI'] == 0) { echo '<td style="width: 12mm;">Original</td>'; }
       if ($elemento2['autBurCreditoORI'] == 0 and $elemento2['autBurCreditoCOP'] == 0) { echo '<td style="width: 2mm;">-</td>'; }
       if ($elemento2['autBurCreditoCOP'] == 0) { echo '<td style="width: 12mm;">Copia</td>'; } } ?>
    </tr>
    <tr>
       <?php if($elemento2['docActNacimientoORI'] != null){
       if ($elemento2['docActNacimientoORI'] == 0 or $elemento2['docActNacimientoCOP'] == 0) { echo '<td style="width: 125mm;">'.$count++.'.- Acta de Nacimiento original (2).</td>'; }
       if ($elemento2['docActNacimientoORI'] == 0) { echo '<td style="width: 12mm;">Original</td>'; }
       if ($elemento2['docActNacimientoORI'] == 0 and $elemento2['docActNacimientoCOP'] == 0) { echo '<td style="width: 2mm;">-</td>'; }
       if ($elemento2['docActNacimientoCOP'] == 0) { echo '<td style="width: 12mm;">Copia</td>'; }
     /* if ($elemento2['docActNacimientoORI'] == 0 or $elemento2['docActNacimientoCOP'] == 0) { echo '<td style="width: 12mm;">Cantidad:'.$elemento2['docActNacimientoCAN'].' </td>'; } */} ?>
    </tr>
    <tr>
       <?php if($elemento2['docActMatrimonioORI'] != null){
       if ($elemento2['docActMatrimonioORI'] == 0 or $elemento2['docActMatrimonioCOP'] == 0) { echo '<td style="width: 125mm;">'.$count++.'.- Acta de Matrimonio original (2 si aplica).</td>'; }
       if ($elemento2['docActMatrimonioORI'] == 0) { echo '<td style="width: 12mm;">Original</td>'; }
       if ($elemento2['docActMatrimonioORI'] == 0 and $elemento2['docActMatrimonioCOP'] == 0) { echo '<td style="width: 2mm;">-</td>'; }
       if ($elemento2['docActMatrimonioCOP'] == 0) { echo '<td style="width: 12mm;">Copia</td>'; }
       if ($elemento2['docActMatrimonioORI'] == 0 or $elemento2['docActMatrimonioCOP'] == 0) { echo '<td style="width: 12mm;">Cantidad:'.$elemento2['docActMatrimonioCAN'].' </td>'; } } ?>
    </tr>

    <tr>
       <?php if($elemento2['docIdentificacionORI'] != null){
       if ($elemento2['docIdentificacionORI'] == 0 or $elemento2['docIdentificacionCOP'] == 0) { echo '<td style="width: 125mm;">'.$count++.'.- Identificación original.</td>'; }
       if ($elemento2['docIdentificacionORI'] == 0) { echo '<td style="width: 12mm;">Original</td>'; }
       if ($elemento2['docIdentificacionORI'] == 0 and $elemento2['docIdentificacionCOP'] == 0) { echo '<td style="width: 2mm;">-</td>'; }
       if ($elemento2['docIdentificacionCOP'] == 0) { echo '<td style="width: 12mm;">Copia</td>'; } } ?>
    </tr>

    <tr>
       <?php if($elemento2['docRfcORI'] != null){
       if ($elemento2['docRfcORI'] == 0 or $elemento2['docRfcCOP'] == 0) { echo '<td style="width: 125mm;">'.$count++.'.- RFC en documento oficial del SAT.</td>'; }
       if ($elemento2['docRfcORI'] == 0) { echo '<td style="width: 12mm;">Original</td>'; }
       if ($elemento2['docRfcORI'] == 0 and $elemento2['docRfcCOP'] == 0) { echo '<td style="width: 2mm;">-</td>'; }
       if ($elemento2['docRfcCOP'] == 0) { echo '<td style="width: 12mm;">Copia</td>'; } } ?>
    </tr>
    <tr>
       <?php if($elemento2['docCurpORI'] != null){
       if ($elemento2['docCurpORI'] == 0 or $elemento2['docCurpCOP'] == 0) { echo '<td style="width: 125mm;">'.$count++.'.- CURP</td>'; }
       if ($elemento2['docCurpORI'] == 0) { echo '<td style="width: 12mm;">Original</td>'; }
       if ($elemento2['docCurpORI'] == 0 and $elemento2['docCurpCOP'] == 0) { echo '<td style="width: 2mm;">-</td>'; }
       if ($elemento2['docCurpCOP'] == 0) { echo '<td style="width: 12mm;">Copia</td>'; } } ?>
    </tr>
    <tr>
       <?php if($elemento2['docComDomicilioORI'] != null){
       if ($elemento2['docComDomicilioORI'] == 0 or $elemento2['docComDomicilioCOP'] == 0) { echo '<td style="width: 125mm;">'.$count++.'.- Comprobante de domicilio original.</td>'; }
       if ($elemento2['docComDomicilioORI'] == 0) { echo '<td style="width: 12mm;">Original</td>'; }
       if ($elemento2['docComDomicilioORI'] == 0 and $elemento2['docComDomicilioCOP'] == 0) { echo '<td style="width: 2mm;">-</td>'; }
       if ($elemento2['docComDomicilioCOP'] == 0) { echo '<td style="width: 12mm;">Copia</td>'; } } ?>
    </tr>
    <tr>
       <?php if($elemento2['docPatronalORI'] != null){
       if ($elemento2['docPatronalORI'] == 0 or $elemento2['docPatronalCOP'] == 0) { echo '<td style="width: 125mm;">'.$count++.'.- Carta Patronal en donde se indique puesto, antigüedad</td>'; }
       } ?>
    </tr>
    <tr>
       <?php if($elemento2['docPatronalORI'] != null){
       if ($elemento2['docPatronalORI'] == 0 or $elemento2['docPatronalCOP'] == 0) { echo '<td style="width: 125mm;">        sueldo bruto,numero de seguro social, CURP y RFC. (2).</td>'; }
       if ($elemento2['docPatronalORI'] == 0) { echo '<td style="width: 12mm;">Original</td>'; }
       if ($elemento2['docPatronalORI'] == 0 and $elemento2['docPatronalCOP'] == 0) { echo '<td style="width: 2mm;">-</td>'; }
       if ($elemento2['docPatronalCOP'] == 0) { echo '<td style="width: 12mm;">Copia</td>'; }
     /*if ($elemento2['docPatronalORI'] == 0 or $elemento2['docPatronalCOP'] == 0) { echo '<td style="width: 12mm;">Cantidad:'.$elemento2['docNominaCAN'].' </td>'; } */} ?>
    </tr>
    <tr>
      <?php if($elemento2['docNominaORI'] != null){
       if($elemento2['docNominaORI'] == 0 or $elemento2['docNominaCOP'] == 0) { echo '<td style="width: 125mm;">'.$count++.'.- Últimos 6 recibos de nomina.</td>'; }
       if($elemento2['docNominaORI'] == 0) { echo '<td style="width: 12mm;">Original</td>'; }
       if($elemento2['docNominaORI'] == 0 and $elemento2['docNominaCOP'] == 0) { echo '<td style="width: 2mm;">-</td>'; }
       if($elemento2['docNominaCOP'] == 0) { echo '<td style="width: 12mm;">Copia</td>'; }
     /*if($elemento2['docNominaORI'] == 0 or $elemento2['docNominaCOP'] == 0) { echo '<td style="width: 12mm;">Cantidad:'.$elemento2['docNominaCAN'].' </td>'; }  */}?>
    </tr>
    <tr>
      <?php if($elemento2['docEstCuentaORI'] != null){
       if($elemento2['docEstCuentaORI'] == 0 or $elemento2['docEstCuentaCOP'] == 0) { echo '<td style="width: 125mm;">'.$count++.'.- Últimos 3 estados de cuenta bancarios donde depositan el sueldo.</td>'; }
       if($elemento2['docEstCuentaORI'] == 0) { echo '<td style="width: 12mm;">Original</td>'; }
       if($elemento2['docEstCuentaORI'] == 0 and $elemento2['docEstCuentaCOP'] == 0) { echo '<td style="width: 2mm;">-</td>'; }
       if($elemento2['docEstCuentaCOP'] == 0) { echo '<td style="width: 12mm;">Copia</td>'; }
       if($elemento2['docEstCuentaORI'] == 0 or $elemento2['docEstCuentaCOP'] == 0) { echo '<td style="width: 12mm;">Cantidad:'.$elemento2['docEstCuentaCAN'].' </td>'; }   }?>
    </tr>
    <tr>
      <?php if($elemento2['docAvaComercialORI'] != null){
       if($elemento2['docAvaComercialORI'] == 0 or $elemento2['docAvaComercialCOP'] == 0) { echo '<td style="width: 125mm;">'.$count++.'.- Avalúo comercial.</td>'; }
       if($elemento2['docAvaComercialORI'] == 0) { echo '<td style="width: 12mm;">Original</td>'; }
       if($elemento2['docAvaComercialORI'] == 0 and $elemento2['docAvaComercialCOP'] == 0) { echo '<td style="width: 2mm;">-</td>'; }
       if($elemento2['docAvaComercialCOP'] == 0) { echo '<td style="width: 12mm;">Copia</td>'; }   }?>
    </tr>
    <tr>
      <?php if($elemento2['solDicTecnicoORI'] != null){
       if($elemento2['solDicTecnicoORI'] == 0 or $elemento2['solDicTecnicoCOP'] == 0) { echo '<td style="width: 125mm;">'.$count++.'.- Formato de dictamen técnico de calidad.</td>'; }
       if($elemento2['solDicTecnicoORI'] == 0) { echo '<td style="width: 12mm;">Original</td>'; }
       if($elemento2['solDicTecnicoORI'] == 0 and $elemento2['solDicTecnicoCOP'] == 0) { echo '<td style="width: 2mm;">-</td>'; }
       if($elemento2['solDicTecnicoCOP'] == 0) { echo '<td style="width: 12mm;">Copia</td>'; }   }?>
    </tr>
    <tr>
       <?php if($elemento2['docIdeFirmadaORI'] != null){
       if ($elemento2['docIdeFirmadaORI'] == 0 or $elemento2['docIdeFirmadaCOP'] == 0) { echo '<td style="width: 125mm;">'.$count++.'.- Copia de credencial de elector o pasaporte. Registrar la leyenda  </td>'; }
       } ?>
    </tr>
    <tr>
       <?php if($elemento2['docIdeFirmadaORI'] != null){
       if ($elemento2['docIdeFirmadaORI'] == 0 or $elemento2['docIdeFirmadaCOP'] == 0) { echo '<td style="width: 125mm;">“Cotejado contra su original” y firmado por el promotor de vivienda.</td>'; }
       if ($elemento2['docIdeFirmadaORI'] == 0) { echo '<td style="width: 12mm;">Original</td>'; }
       if ($elemento2['docIdeFirmadaORI'] == 0 and $elemento2['docPatronalCOP'] == 0) { echo '<td style="width: 2mm;">-</td>'; }
       if ($elemento2['docIdeFirmadaCOP'] == 0) { echo '<td style="width: 12mm;">Copia</td>'; }} ?>
    </tr>

    <tr>
      <?php if($elemento2['docLisNominalORI'] != null){
       if($elemento2['docLisNominalORI'] == 0 or $elemento2['docLisNominalCOP'] == 0) { echo '<td style="width: 125mm;">'.$count++.'.- Consulta de lista nominal en caso de credencial de elector.</td>'; }
       if($elemento2['docLisNominalORI'] == 0) { echo '<td style="width: 12mm;">Original</td>'; }
       if($elemento2['docLisNominalORI'] == 0 and $elemento2['docLisNominalCOP'] == 0) { echo '<td style="width: 2mm;">-</td>'; }
       if($elemento2['docLisNominalCOP'] == 0) { echo '<td style="width: 12mm;">Copia</td>'; }   }?>
    </tr>

    <tr>
      <?php if($elemento2['docConPropiedadORI'] != null){
       if($elemento2['docConPropiedadORI'] == 0 or $elemento2['docConPropiedadCOP'] == 0) { echo '<td style="width: 125mm;">'.$count++.'.- Constancia de propiedad o no propiedad</td>'; }
     }?>
    </tr>
    <tr>
      <?php if($elemento2['docConPropiedadORI'] != null){
       if($elemento2['docConPropiedadORI'] == 0 or $elemento2['docConPropiedadCOP'] == 0) { echo '<td style="width: 125mm;">no mayor a 60 dias.(Solicitarlo en Centro de Gobierno).</td>'; }
       if($elemento2['docConPropiedadORI'] == 0) { echo '<td style="width: 12mm;">Original</td>'; }
       if($elemento2['docConPropiedadORI'] == 0 and $elemento2['docConPropiedadCOP'] == 0) { echo '<td style="width: 2mm;">-</td>'; }
       if($elemento2['docConPropiedadCOP'] == 0) { echo '<td style="width: 12mm;">Copia</td>'; }   }?>
    </tr>
    <tr>
      <?php if($elemento2['docPreConfinavitORI'] != null){
       if($elemento2['docPreConfinavitORI'] == 0 or $elemento2['docPreConfinavitCOP'] == 0) { echo '<td style="width: 125mm;">'.$count++.'.- Precalificación del CONFINAVIT impreso y firmado por el cliente.</td>'; }
       if($elemento2['docPreConfinavitORI'] == 0) { echo '<td style="width: 12mm;">Original</td>'; }
       if($elemento2['docPreConfinavitORI'] == 0 and $elemento2['docPreConfinavitCOP'] == 0) { echo '<td style="width: 2mm;">-</td>'; }
       if($elemento2['docPreConfinavitCOP'] == 0) { echo '<td style="width: 12mm;">Copia</td>'; }   }?>
    </tr>
    <tr>
      <?php if($elemento2['docEcoTecnologiasORI'] != null){
       if($elemento2['docEcoTecnologiasORI'] == 0 or $elemento2['docPreConfindocEcoTecnologiasCOPavitCOP'] == 0) { echo '<td style="width: 125mm;">'.$count++.'.- Ecotecnologias impreso y firmado por el cliente.</td>'; }
       if($elemento2['docEcoTecnologiasORI'] == 0) { echo '<td style="width: 12mm;">Original</td>'; }
       if($elemento2['docEcoTecnologiasORI'] == 0 and $elemento2['docEcoTecnologiasCOP'] == 0) { echo '<td style="width: 2mm;">-</td>'; }
       if($elemento2['docEcoTecnologiasCOP'] == 0) { echo '<td style="width: 12mm;">Copia</td>'; }   }?>
    </tr>
    <tr>
      <?php if($elemento2['docDetMovimientoORI'] != null){
       if($elemento2['docDetMovimientoORI'] == 0 or $elemento2['docDetMovimientoCOP'] == 0) { echo '<td style="width: 125mm;">'.$count++.'.- Detalle de movimientos (¿Cuanto llevo ahorrado?).</td>'; }
       if($elemento2['docDetMovimientoORI'] == 0) { echo '<td style="width: 12mm;">Original</td>'; }
       if($elemento2['docDetMovimientoORI'] == 0 and $elemento2['docDetMovimientoCOP'] == 0) { echo '<td style="width: 2mm;">-</td>'; }
       if($elemento2['docDetMovimientoCOP'] == 0) { echo '<td style="width: 12mm;">Copia</td>'; }   }?>
    </tr>
    <tr>
      <?php if($elemento2['docConLaboralORI'] != null){
       if($elemento2['docConLaboralORI'] == 0 or $elemento2['docConLaboralCOP'] == 0) { echo '<td style="width: 125mm;">'.$count++.'.- Constancia laboral completa.</td>'; }
       if($elemento2['docConLaboralORI'] == 0) { echo '<td style="width: 12mm;">Original</td>'; }
       if($elemento2['docConLaboralORI'] == 0 and $elemento2['docConLaboralCOP'] == 0) { echo '<td style="width: 2mm;">-</td>'; }
       if($elemento2['docConLaboralCOP'] == 0) { echo '<td style="width: 12mm;">Copia</td>'; }   }?>
    </tr>
    <tr>
      <?php if($elemento2['docPredialORI'] != null){
       if($elemento2['docPredialORI'] == 0 or $elemento2['docPredialCOP'] == 0) { echo '<td style="width: 125mm;">'.$count++.'.- Predial vigente.</td>'; }
       if($elemento2['docPredialORI'] == 0) { echo '<td style="width: 12mm;">Original</td>'; }
       if($elemento2['docPredialORI'] == 0 and $elemento2['docPredialCOP'] == 0) { echo '<td style="width: 2mm;">-</td>'; }
       if($elemento2['docPredialCOP'] == 0) { echo '<td style="width: 12mm;">Copia</td>'; }   }?>
    </tr>
    <tr>
      <?php if($elemento2['docMejoravitORI'] != null){
       if($elemento2['docMejoravitORI'] == 0 or $elemento2['docMejoravitCOP'] == 0) { echo '<td style="width: 125mm;">'.$count++.'.- Impresa la imagen del Mejoravit</td>'; }
     }?>
    </tr>
    <tr>
      <?php if($elemento2['docMejoravitORI'] != null){
       if($elemento2['docMejoravitORI'] == 0 or $elemento2['docMejoravitCOP'] == 0) { echo '<td style="width: 125mm;">para ver que este correcto el RFC con su homoclave.</td>'; }
       if($elemento2['docMejoravitORI'] == 0) { echo '<td style="width: 12mm;">Original</td>'; }
       if($elemento2['docMejoravitORI'] == 0 and $elemento2['docMejoravitCOP'] == 0) { echo '<td style="width: 2mm;">-</td>'; }
       if($elemento2['docMejoravitCOP'] == 0) { echo '<td style="width: 12mm;">Copia</td>'; }   }?>
    </tr>
    <tr>
      <?php if($elemento2['docConTallerORI'] != null){
       if($elemento2['docConTallerORI'] == 0 or $elemento2['docConTallerCOP'] == 0) { echo '<td style="width: 125mm;">'.$count++.'.- Constancia del taller “Saber Para Decidir”.</td>'; }
       if($elemento2['docConTallerORI'] == 0) { echo '<td style="width: 12mm;">Original</td>'; }
       if($elemento2['docConTallerORI'] == 0 and $elemento2['docConTallerCOP'] == 0) { echo '<td style="width: 2mm;">-</td>'; }
       if($elemento2['docConTallerCOP'] == 0) { echo '<td style="width: 12mm;">Copia</td>'; }   }?>
    </tr>
    <tr>
      <?php if($elemento2['solCreInfonavitORI'] != null){
       if($elemento2['solCreInfonavitORI'] == 0 or $elemento2['solCreInfonavitCOP'] == 0) { echo '<td style="width: 125mm;">'.$count++.'.- Solicitud de crédito del INFONAVIT firmada.</td>'; }
       if($elemento2['solCreInfonavitORI'] == 0) { echo '<td style="width: 12mm;">Original</td>'; }
       if($elemento2['solCreInfonavitORI'] == 0 and $elemento2['solCreInfonavitCOP'] == 0) { echo '<td style="width: 2mm;">-</td>'; }
       if($elemento2['solCreInfonavitCOP'] == 0) { echo '<td style="width: 12mm;">Copia</td>'; }   }?>
    </tr>
    <tr>
      <?php if($elemento2['solCreInfonavitORI'] != null){
       if($elemento2['solCreInfonavitORI'] == 0 or $elemento2['solCreInfonavitCOP'] == 0) { echo '<td style="width: 125mm;">(Debe ser llenada manualmente y no en digital).</td>'; }
       if($elemento2['solCreInfonavitORI'] == 0) { echo '<td style="width: 12mm;">Original</td>'; }
       if($elemento2['solCreInfonavitORI'] == 0 and $elemento2['solCreInfonavitCOP'] == 0) { echo '<td style="width: 2mm;">-</td>'; }
       if($elemento2['solCreInfonavitCOP'] == 0) { echo '<td style="width: 12mm;">Copia</td>'; }   }?>
    </tr>
    <tr>
      <?php if($elemento2['docInsIrrevocableORI'] != null){
       if($elemento2['docInsIrrevocableORI'] == 0 or $elemento2['docInsIrrevocableCOP'] == 0) { echo '<td style="width: 125mm;">'.$count++.'.- Carta de instrucción irrevocable firmada. (Solo en segundo campo).</td>'; }
       if($elemento2['docInsIrrevocableORI'] == 0) { echo '<td style="width: 12mm;">Original</td>'; }
       if($elemento2['docInsIrrevocableORI'] == 0 and $elemento2['docInsIrrevocableCOP'] == 0) { echo '<td style="width: 2mm;">-</td>'; }
       if($elemento2['docInsIrrevocableCOP'] == 0) { echo '<td style="width: 12mm;">Copia</td>'; }   }?>
    </tr>
    <tr>
      <?php if($elemento2['docAutBuroCreditoORI'] != null){
       if($elemento2['docAutBuroCreditoORI'] == 0 or $elemento2['docAutBuroCreditoCOP'] == 0) { echo '<td style="width: 125mm;">'.$count++.'.- Formato de autorización de consulta de buró de crédito.</td>'; }
       if($elemento2['docAutBuroCreditoORI'] == 0) { echo '<td style="width: 12mm;">Original</td>'; }
       if($elemento2['docAutBuroCreditoORI'] == 0 and $elemento2['docAutBuroCreditoCOP'] == 0) { echo '<td style="width: 2mm;">-</td>'; }
       if($elemento2['docAutBuroCreditoCOP'] == 0) { echo '<td style="width: 12mm;">Copia</td>'; }
     /*if($elemento2['docAutBuroCreditoORI'] == 0 or $elemento2['docAutBuroCreditoCOP'] == 0) { echo '<td style="width: 12mm;">Cantidad:'.$elemento2['docAutBuroCreditoCAN'].' </td>'; }   */}?>
    </tr>
    <tr>
      <?php if($elemento2['docAutBuroCreditoORI'] != null){
       if($elemento2['docAutBuroCreditoORI'] == 0 or $elemento2['docAutBuroCreditoCOP'] == 0) { echo '<td style="width: 125mm;">(4 Tantos y no se registra la fecha en que se firma el formato)</td>'; }
       if($elemento2['docAutBuroCreditoORI'] == 0) { echo '<td style="width: 12mm;">Original</td>'; }
       if($elemento2['docAutBuroCreditoORI'] == 0 and $elemento2['docAutBuroCreditoCOP'] == 0) { echo '<td style="width: 2mm;">-</td>'; }
       if($elemento2['docAutBuroCreditoCOP'] == 0) { echo '<td style="width: 12mm;">Copia</td>'; }
       if($elemento2['docAutBuroCreditoORI'] == 0 or $elemento2['docAutBuroCreditoCOP'] == 0) { echo '<td style="width: 12mm;">Cantidad:'.$elemento2['docAutBuroCreditoCAN'].' </td>'; }   }?>
    </tr>
    <tr>
      <?php if($elemento2['docManifiestoORI'] != null){
       if($elemento2['docManifiestoORI'] == 0 or $elemento2['docManifiestoCOP'] == 0) { echo '<td style="width: 125mm;">'.$count++.'.- Formato de manifiesto y acuerdo. (Firmado con su debida huella digital). </td>'; }
       if($elemento2['docManifiestoORI'] == 0) { echo '<td style="width: 12mm;">Original</td>'; }
       if($elemento2['docManifiestoORI'] == 0 and $elemento2['docManifiestoCOP'] == 0) { echo '<td style="width: 2mm;">-</td>'; }
       if($elemento2['docManifiestoCOP'] == 0) { echo '<td style="width: 12mm;">Copia</td>'; }   }?>
    </tr>

    <tr>
      <?php if($elemento2['docDecAnualORI'] != null){
       if($elemento2['docDecAnualORI'] == 0 or $elemento2['docDecAnualCOP'] == 0) { echo '<td  style="width: 125mm;">'.$count++.'.- Declaración Anual. </td>'; }
       if($elemento2['docDecAnualORI'] == 0) { echo '<td  style="width: 12mm;">Original</td>'; }
       if($elemento2['docDecAnualORI'] == 0 and $elemento2['docDecAnualCOP'] == 0) { echo '<td  style="width: 2mm;">-</td>'; }
       if($elemento2['docDecAnualCOP'] == 0) { echo '<td  style="width: 12mm;">Copia</td>'; }   }?>
    </tr>
    <tr>
      <?php if($elemento2['docDecParcialORI'] != null){
       if($elemento2['docDecParcialORI'] == 0 or $elemento2['docDecParcialCOP'] == 0) { echo '<td  style="width: 125mm;">'.$count++.'.- Declaración Parcial. </td>'; }
       if($elemento2['docDecParcialORI'] == 0) { echo '<td  style="width: 12mm;">Original</td>'; }
       if($elemento2['docDecParcialORI'] == 0 and $elemento2['docDecParcialCOP'] == 0) { echo '<td  style="width: 2mm;">-</td>'; }
       if($elemento2['docDecParcialCOP'] == 0) { echo '<td  style="width: 12mm;">Copia</td>'; }   }?>
    </tr>
    <tr>
      <?php if($elemento2['solAltSecretariaORI'] != null){
       if($elemento2['solAltSecretariaORI'] == 0 or $elemento2['solAltSecretariaCOP'] == 0) { echo '<td  style="width: 125mm;">'.$count++.'.- Alta de Secretaria de Hacienda y Crédito Público. </td>'; }
       if($elemento2['solAltSecretariaORI'] == 0) { echo '<td  style="width: 12mm;">Original</td>'; }
       if($elemento2['solAltSecretariaORI'] == 0 and $elemento2['solAltSecretariaCOP'] == 0) { echo '<td  style="width: 2mm;">-</td>'; }
       if($elemento2['solAltSecretariaCOP'] == 0) { echo '<td  style="width: 12mm;">Copia</td>'; }   }?>
    </tr>
    <tr>
      <?php if($elemento2['docConvenioORI'] != null){
       if($elemento2['docConvenioORI'] == 0 or $elemento2['docConvenioCOP'] == 0) { echo '<td  style="width: 125mm;">'.$count++.'.- Convenio de pensión.</td>'; }
       if($elemento2['docConvenioORI'] == 0) { echo '<td  style="width: 12mm;">Original</td>'; }
       if($elemento2['docConvenioORI'] == 0 and $elemento2['docConvenioCOP'] == 0) { echo '<td  style="width: 2mm;">-</td>'; }
       if($elemento2['docConvenioCOP'] == 0) { echo '<td  style="width: 12mm;">Copia</td>'; }   }?>
    </tr>
    <tr>
      <?php if($elemento2['docPenMensualORI'] != null){
       if($elemento2['docPenMensualORI'] == 0 or $elemento2['docPenMensualCOP'] == 0) { echo '<td  style="width: 125mm;">'.$count++.'.- Últimos 3 recibos de pensión mensual.</td>'; }
       if($elemento2['docPenMensualORI'] == 0) { echo '<td  style="width: 12mm;">Original</td>'; }
       if($elemento2['docPenMensualORI'] == 0 and $elemento2['docPenMensualCOP'] == 0) { echo '<td  style="width: 2mm;">-</td>'; }
       if($elemento2['docPenMensualCOP'] == 0) { echo '<td  style="width: 12mm;">Copia</td>'; }
     /*if($elemento2['docPenMensualORI'] == 0 or $elemento2['docPenMensualCOP'] == 0) { echo '<td  style="width: 12mm;">Cantidad:'.$elemento2['docPenMensualCAN'].' </td>'; }   */}?>
    </tr>
    <tr>
      <?php if($elemento2['docPenCuentaORI'] != null){
       if($elemento2['docPenCuentaORI'] == 0 or $elemento2['docPenCuentaCOP'] == 0) { echo '<td  style="width: 125mm;">'.$count++.'.- Últimos 3 recibos de pensión mensual.</td>'; }
       if($elemento2['docPenCuentaORI'] == 0) { echo '<td  style="width: 12mm;">Original</td>'; }
       if($elemento2['docPenCuentaORI'] == 0 and $elemento2['docPenCuentaCOP'] == 0) { echo '<td  style="width: 2mm;">-</td>'; }
       if($elemento2['docPenCuentaCOP'] == 0) { echo '<td  style="width: 12mm;">Copia</td>'; }
     /*if($elemento2['docPenCuentaORI'] == 0 or $elemento2['docPenCuentaCOP'] == 0) { echo '<td  style="width: 12mm;">Cantidad:'.$elemento2['docPenCuentaCAN'].' </td>'; }   */}?>
    </tr>
    <tr>
      <?php if($elemento2['sol97ORI'] != null){
       if($elemento2['sol97ORI'] == 0 or $elemento2['sol97COP'] == 0) { echo '<td  style="width: 125mm;">'.$count++.'.- Solicitud 97.</td>'; }
       if($elemento2['sol97ORI'] == 0) { echo '<td  style="width: 12mm;">Original</td>'; }
       if($elemento2['sol97ORI'] == 0 and $elemento2['sol97COP'] == 0) { echo '<td  style="width: 2mm;">-</td>'; }
       if($elemento2['sol97COP'] == 0) { echo '<td  style="width: 12mm;">Copia</td>'; }
     /*if($elemento2['docPenCuentaORI'] == 0 or $elemento2['docPenCuentaCOP'] == 0) { echo '<td  style="width: 12mm;">Cantidad:'.$elemento2['docPenCuentaCAN'].' </td>'; }   */}?>
    </tr>
    <tr>
      <?php if($elemento2['docSitFiscalORI'] != null){
       if($elemento2['docSitFiscalORI'] == 0 or $elemento2['docSitFiscalCOP'] == 0) { echo '<td  style="width: 125mm;">'.$count++.'.- Constancia de situación Fiscal.</td>'; }
       if($elemento2['docSitFiscalORI'] == 0) { echo '<td  style="width: 12mm;">Original</td>'; }
       if($elemento2['docSitFiscalORI'] == 0 and $elemento2['docSitFiscalCOP'] == 0) { echo '<td  style="width: 2mm;">-</td>'; }
       if($elemento2['docSitFiscalCOP'] == 0) { echo '<td  style="width: 12mm;">Copia</td>'; }
     /*if($elemento2['docPenCuentaORI'] == 0 or $elemento2['docPenCuentaCOP'] == 0) { echo '<td  style="width: 12mm;">Cantidad:'.$elemento2['docPenCuentaCAN'].' </td>'; }   */}?>
    </tr>
    <tr>
      <?php if($elemento2['docActConstitutivaORI'] != null){
       if($elemento2['docActConstitutivaORI'] == 0 or $elemento2['docActConstitutivaCOP'] == 0) { echo '<td  style="width: 125mm;">'.$count++.'.- Acta constitutiva de la empresa.</td>'; }
       if($elemento2['docActConstitutivaORI'] == 0) { echo '<td  style="width: 12mm;">Original</td>'; }
       if($elemento2['docActConstitutivaORI'] == 0 and $elemento2['docActConstitutivaCOP'] == 0) { echo '<td  style="width: 2mm;">-</td>'; }
       if($elemento2['docActConstitutivaCOP'] == 0) { echo '<td  style="width: 12mm;">Copia</td>'; }
     /*if($elemento2['docPenCuentaORI'] == 0 or $elemento2['docPenCuentaCOP'] == 0) { echo '<td  style="width: 12mm;">Cantidad:'.$elemento2['docPenCuentaCAN'].' </td>'; }   */}?>
    </tr>

    <tr>
      <?php if($elemento2['docSaludORI'] != null){
       if($elemento2['docSaludORI'] == 0 or $elemento2['docSaludCOP'] == 0) { echo '<td  style="width: 125mm;">'.$count++.'.- Cuestionario de salud.</td>'; }
       if($elemento2['docSaludORI'] == 0) { echo '<td  style="width: 12mm;">Original</td>'; }
       if($elemento2['docSaludORI'] == 0 and $elemento2['docSaludCOP'] == 0) { echo '<td  style="width: 2mm;">-</td>'; }
       if($elemento2['docSaludCOP'] == 0) { echo '<td  style="width: 12mm;">Copia</td>'; }
     /*if($elemento2['docPenCuentaORI'] == 0 or $elemento2['docPenCuentaCOP'] == 0) { echo '<td  style="width: 12mm;">Cantidad:'.$elemento2['docPenCuentaCAN'].' </td>'; }   */}?>
    </tr>
    <tr>
      <?php if($elemento2['docCotizacionORI'] != null){
       if($elemento2['docCotizacionORI'] == 0 or $elemento2['docCotizacionCOP'] == 0) { echo '<td  style="width: 125mm;">'.$count++.'.- Cotización.</td>'; }
       if($elemento2['docCotizacionORI'] == 0) { echo '<td  style="width: 12mm;">Original</td>'; }
       if($elemento2['docCotizacionORI'] == 0 and $elemento2['docCotizacionCOP'] == 0) { echo '<td  style="width: 2mm;">-</td>'; }
       if($elemento2['docCotizacionCOP'] == 0) { echo '<td  style="width: 12mm;">Copia</td>'; }
     /*if($elemento2['docPenCuentaORI'] == 0 or $elemento2['docPenCuentaCOP'] == 0) { echo '<td  style="width: 12mm;">Cantidad:'.$elemento2['docPenCuentaCAN'].' </td>'; }   */}?>
    </tr>
    <tr>
      <?php if($elemento2['docApoyoORI'] != null){
       if($elemento2['docApoyoORI'] == 0 or $elemento2['docApoyoCOP'] == 0) { echo '<td  style="width: 125mm;">'.$count++.'.- Carta de apoyo.</td>'; }
       if($elemento2['docApoyoORI'] == 0) { echo '<td  style="width: 12mm;">Original</td>'; }
       if($elemento2['docApoyoORI'] == 0 and $elemento2['docApoyoCOP'] == 0) { echo '<td  style="width: 2mm;">-</td>'; }
       if($elemento2['docApoyoCOP'] == 0) { echo '<td  style="width: 12mm;">Copia</td>'; }
     /*if($elemento2['docPenCuentaORI'] == 0 or $elemento2['docPenCuentaCOP'] == 0) { echo '<td  style="width: 12mm;">Cantidad:'.$elemento2['docPenCuentaCAN'].' </td>'; }   */}?>
    </tr>
    <tr>
      <?php if($elemento2['docRelPatrimonialORI'] != null){
       if($elemento2['docRelPatrimonialORI'] == 0 or $elemento2['docRelPatrimonialCOP'] == 0) { echo '<td  style="width: 125mm;">'.$count++.'.- Relación Patrimonial.</td>'; }
       if($elemento2['docRelPatrimonialORI'] == 0) { echo '<td  style="width: 12mm;">Original</td>'; }
       if($elemento2['docRelPatrimonialORI'] == 0 and $elemento2['docRelPatrimonialCOP'] == 0) { echo '<td  style="width: 2mm;">-</td>'; }
       if($elemento2['docRelPatrimonialCOP'] == 0) { echo '<td  style="width: 12mm;">Copia</td>'; }
     /*if($elemento2['docPenCuentaORI'] == 0 or $elemento2['docPenCuentaCOP'] == 0) { echo '<td  style="width: 12mm;">Cantidad:'.$elemento2['docPenCuentaCAN'].' </td>'; }   */}?>
    </tr>
    <tr>
      <?php if($elemento2['docRepComercialORI'] != null){
       if($elemento2['docRepComercialORI'] == 0 or $elemento2['docRepComercialCOP'] == 0) { echo '<td  style="width: 125mm;">'.$count++.'.- Reporte de Giro Comercial.</td>'; }
       if($elemento2['docRepComercialORI'] == 0) { echo '<td  style="width: 12mm;">Original</td>'; }
       if($elemento2['docRepComercialORI'] == 0 and $elemento2['docRepComercialCOP'] == 0) { echo '<td  style="width: 2mm;">-</td>'; }
       if($elemento2['docRepComercialCOP'] == 0) { echo '<td  style="width: 12mm;">Copia</td>'; }
     /*if($elemento2['docPenCuentaORI'] == 0 or $elemento2['docPenCuentaCOP'] == 0) { echo '<td  style="width: 12mm;">Cantidad:'.$elemento2['docPenCuentaCAN'].' </td>'; }   */}?>
    </tr>
    <tr>
      <?php if($elemento2['docLegalORI'] != null){
       if($elemento2['docLegalORI'] == 0 or $elemento2['docLegalCOP'] == 0) { echo '<td  style="width: 125mm;">'.$count++.'.- Documentación Legal.</td>'; }
       if($elemento2['docLegalORI'] == 0) { echo '<td  style="width: 12mm;">Original</td>'; }
       if($elemento2['docLegalORI'] == 0 and $elemento2['docLegalCOP'] == 0) { echo '<td  style="width: 2mm;">-</td>'; }
       if($elemento2['docLegalCOP'] == 0) { echo '<td  style="width: 12mm;">Copia</td>'; }
     /*if($elemento2['docPenCuentaORI'] == 0 or $elemento2['docPenCuentaCOP'] == 0) { echo '<td  style="width: 12mm;">Cantidad:'.$elemento2['docPenCuentaCAN'].' </td>'; }   */}?>
    </tr>
    <tr>
      <?php if($elemento2['docConComercialORI'] != null){
       if($elemento2['docConComercialORI'] == 0 or $elemento2['docConComercialCOP'] == 0) { echo '<td  style="width: 125mm;">'.$count++.'.- Contratos de Renta y/o Recibos.</td>'; }
       if($elemento2['docConComercialORI'] == 0) { echo '<td  style="width: 12mm;">Original</td>'; }
       if($elemento2['docConComercialORI'] == 0 and $elemento2['docConComercialCOP'] == 0) { echo '<td  style="width: 2mm;">-</td>'; }
       if($elemento2['docConComercialCOP'] == 0) { echo '<td  style="width: 12mm;">Copia</td>'; }
     if($elemento2['docConComercialORI'] == 0 or $elemento2['docConComercialCOP'] == 0) { echo '<td  style="width: 12mm;">Cantidad:'.$elemento2['docConComercialCAN'].' </td>'; }   }?>
    </tr>
    <tr>
      <?php if($elemento2['docTenenciasORI'] != null){
       if($elemento2['docTenenciasORI'] == 0 or $elemento2['docTenenciasCOP'] == 0) { echo '<td  style="width: 125mm;">'.$count++.'.- Tenencia de las Propiedades.</td>'; }
       if($elemento2['docTenenciasORI'] == 0) { echo '<td  style="width: 12mm;">Original</td>'; }
       if($elemento2['docTenenciasORI'] == 0 and $elemento2['docTenenciasCOP'] == 0) { echo '<td  style="width: 2mm;">-</td>'; }
       if($elemento2['docTenenciasCOP'] == 0) { echo '<td  style="width: 12mm;">Copia</td>'; }
     /*if($elemento2['docPenCuentaORI'] == 0 or $elemento2['docPenCuentaCOP'] == 0) { echo '<td  style="width: 12mm;">Cantidad:'.$elemento2['docPenCuentaCAN'].' </td>'; }   */}?>
    </tr>
    <tr>
      <?php if($elemento2['docRecHonorariosORI'] != null){
       if($elemento2['docRecHonorariosORI'] == 0 or $elemento2['docRecHonorariosCOP'] == 0) { echo '<td  style="width: 125mm;">'.$count++.'.- Recibos de Honorarios.</td>'; }
       if($elemento2['docRecHonorariosORI'] == 0) { echo '<td  style="width: 12mm;">Original</td>'; }
       if($elemento2['docRecHonorariosORI'] == 0 and $elemento2['docRecHonorariosCOP'] == 0) { echo '<td  style="width: 2mm;">-</td>'; }
       if($elemento2['docRecHonorariosCOP'] == 0) { echo '<td  style="width: 12mm;">Copia</td>'; }
     if($elemento2['docRecHonorariosORI'] == 0 or $elemento2['docRecHonorariosCOP'] == 0) { echo '<td  style="width: 12mm;">Cantidad:'.$elemento2['docRecHonorariosCAN'].' </td>'; }   }?>
    </tr>
    <tr>
      <?php if($elemento2['docEstFinancierosORI'] != null){
       if($elemento2['docEstFinancierosORI'] == 0 or $elemento2['docEstFinancierosCOP'] == 0) { echo '<td  style="width: 125mm;">'.$count++.'.- Estados Financieros.</td>'; }
       if($elemento2['docEstFinancierosORI'] == 0) { echo '<td  style="width: 12mm;">Original</td>'; }
       if($elemento2['docEstFinancierosORI'] == 0 and $elemento2['docEstFinancierosCOP'] == 0) { echo '<td  style="width: 2mm;">-</td>'; }
       if($elemento2['docEstFinancierosCOP'] == 0) { echo '<td  style="width: 12mm;">Copia</td>'; }
     if($elemento2['docEstFinancierosORI'] == 0 or $elemento2['docEstFinancierosCOP'] == 0) { echo '<td  style="width: 12mm;">Cantidad:'.$elemento2['docEstFinancierosCAN'].' </td>'; }   }?>
    </tr>




  </table>
<br>
<br><br>
<br><br>
<p style="text-align:center;"><?php echo $elemento3['find']; ?></p>
<br>
<h5 style="text-align:center;">Calzada de Las Villas #859, Col. Quinta Las Villas. Irapuato, Guanajuato. C.P.36670</h5>
</page>
