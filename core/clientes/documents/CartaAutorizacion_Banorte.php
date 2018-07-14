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
  <div style="width:100%; height:40px; background-color:red;" >
    <img src="../../../recursos/img/Bancos/banorte-logo.png" style="width:40%; float: right;" />
  </div>
    <h3 style="text-align: center"> Anexo "F" </h3>
    <h3 style="text-align: center"> CARTA AUTORIZACIÓN PARA TRAMITACIÓN DE CRÉDITO </h3>

    <div style="width:87%;">
      <p style="text-align:right; padding:0 5mm 0" >Fecha</p>
      <p style="text-align:right; padding:-2mm 0 20mm 0" ><?php echo date('d/m/Y');  ?></p>
    </div>

    <h4 style ="text-align: left"> Nombre del solicitante</h4>
    <div style="width:56%; height:50px; background-color:#e9ecef; margin:-3mm 0 0mm 0; border-style:solid; border-color:black; border-width: 1px;">
    <p style="text-align: center; " >
      <i style="font-size:16px; text-align:center;"> <b><?php echo $elemento['find'];?> </b></i>
    </p>
    </div>
    <p style="padding: -12mm 0 0 105mm">por mi propio derecho, autorizo en este acto a</p>

    <h4 style="text-align: left"> Nombre del Broker </h4>
      <div style="width:56%; height:50px; background-color:#e9ecef; margin:-3mm 0 0mm 0; border-style:solid; border-color:black; border-width: 1px;">
      </div>
      <!-- Aqui debe de ir un recuadro. Dentro debe de ir el nombre del broker FSG BROKER, SA DE CV -->
    <p style="padding: -12mm 0 0 105mm">(en adelante "El Broker")</p>


    <p style="text-align: justify">
    para que en mi nombre y representación lleve a cabo todos los actos necesarios ante Banorte, S.A.,
    Institución de Banca Múltiple, Grupo Financiero Banorte (en adelante "El Banco"), para tramitar el
    otorgamiento de un crédito o préstamo con los términos y condiciones establecids por el Banco.
    </p>

    <p style="text-align: justify">
      La presente autorización es única y exclusivamente para tramitar el otorgamiento de un crédito o pŕestamo de manera
      que el Bróker se obliga a:
    </p>

    <p style="text-align: justify">
    -Recibir la documentación e información del suscrito y entregarla al Banco.
    </p>

    <p style="text-align: justify">
    - Estar en comunicación con el Banco, con el objeto de recabar y entregar toda la documentacion e
    información necesaria para el trámite antes indicado.
    </p>

    <p style="text-align: justify">
    - Dar seguimiento al trámite de otorgamiento del crédito o préstamo ante el Banco.
    </p>

    <p style="text-align: justify">
    - Obtener y comunicar el resultado de mi evaluación como posible acreditado del Banco, incluyendo la
    información inherente a la consulta en las Sociedades de Información Crediticia que el Banco efectúe.
    </p>

    <p style="text-align: justify">
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

    <h4 style="text-align: left"> Nombre y Firma del Solicitante: </h4>
      <div style="width:40%; height:100px; background-color:#e9ecef; margin:-3mm 0 0mm 0; border-style:solid; border-color:black; border-width: 1px;">
      </div>

</page>
