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
        $result = mysqli_query($con,"SELECT find FROM Clientes WHERE Clientes.ref = '".$ref."'");
        $elemento = mysqli_fetch_array($result);
  }

?>

<page backtop="5mm" backbottom="0mm" backleft="10mm" backright="12mm">

  <br><br>
    <h4 style="text-align: center"> ANEXO B - CARTA AUTORIZACIÓN PARA TRAMITACIÓN DE CRÉDITO </h4>

    <p style="text-align:right;"> Irapuato, Guanajuato. A <?php echo date('d'); ?> de <?php echo date('m');?> del <?php echo date('Y'); ?> </p>
    <br>

    <p style="text-align: justify"> <i style="font-size:12px;"><b><?php echo $elemento['find'];?></b></i>, (Nombre del solicitante) por mi propio derecho, autorizo en este acto a
    <b>FSG Broker, S.A. de C.V. </b>(en adelante "El Broker") para que en mi nombre y
    representación lleve a cabo todos los actos necesarios antes Scotiabank Inverlatg S.A., Institución de Banca
    Múltiple, Grupo Financiero Scotiabank Inverlat (en adelante "El Banco"), para tramitar el otrogamiento de un
    crédito o préstamo con los términos y condiciones establecidos por el Banco.
    </p>

    <p style="text-align: justify center">
    La presente autorización es única y exclusivamente para tramitar el otorgamiento de un crédito o préstamo, de
    manera que el Bróker se obliga a:
    </p>

    <p style="text-align: justify; padding:0 0 0 10mm">
    - Recibir la documentación e información del suscrito y entregarla al Banco.
    </p>

    <p style="text-align: justify; padding:0 0 0 10mm">
    - Estar en comunicación con el Banco, con el objeto de recabar y entregar toda la documentacion e
    información necesaria para el trámite antes indicado.
    </p>

    <p style="text-align: justify; padding:0 0 0 10mm">
    - Dar seguimiento al trámite de otorgamiento del crédito o préstamo ante el Banco.
    </p>

    <p style="text-align: justify; padding:0 0 0 10mm">
    - Obtener y comunicar el resultado de mi evaluación como posible acreditado del Banco, incluyendo la
    información inherente a la consulta en las Sociedades de Información Crediticia que el Banco efectúe.
    </p>

    <p style="text-align: justify; padding:0 0 0 10mm">
    - Llevar a cabo cualquier servicio relacionado con el trámite de otorgamiento del crédito o préstamo con el
    Banco.
    </p>

    <p style="text-align: justify"> El Bróker en ningúm momento está o estará autorizado para afirmar en mi representación contratos, convenios,
    cartas o cualquier otro documento, mediante los cuales se generen obligaciones a mi cargo frente al Banco.
    </p>

    <p style="text-align: justify">
    En este caso manifiesto y acepto que toda la documentación e información que proporcione el Bróker será
    verdadera, precisa, estará vigente, no estará modificada o alterada, no contendrá errores que sean de mi
    conocimiento y no conducirá el error, de manera que reconozco y estoy al tanto de las sanciones administrativos y
    penales aplicables a las personas que presentan declaraciones en falso.
    </p>

    <br>
    <br>
    <br>

    <p> Atentamente, </p>
    <br>
    <br>
    <br>
    <br>

    <label> <b>Nombre y Firma del Titular y/o Coacreditado </b></label>

    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

    <label>___________________________________</label>
    <br>
    <label> <b>Nombre y firma del Ejecutivo Broker.</b> </label>

</page>
