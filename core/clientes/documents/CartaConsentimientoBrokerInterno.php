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

    <label style="font-size: 98px"> FSG </label>
    <label style="font-size: 40px"> Broker </label>

    <h5 style="text-align: center"> CONSENTIMIENTO PARA EL TRÁMITE DE CRÉDITO HIPOTECÁRIO </h5>

    <p style="text-align:right;"> (Ciudad)___________, a _____ de  ____________de 20___</p>
    <br>

    <p style="text-align: justify"> (Nombre del Solicitante) <i style="font-size:12px;"><b><?php echo $elemento['find'];?></b></i> por mi propio derecho,
    autorizo en este acto a FSG Broker, S.A. de C.V. (en adelante "El Agente Hipotecário") a referir mis
    datos de contacto a HSBC y comparto mi información confidencial con el mismo para que en mi
    nombre y representación lleve a cabo todos los actos necesarios ante HSBC Mexico SA, Institución
    de Banca Múltiple Grupo Financiero HSBC (en adelante "El Banco"), para tramitar el otorgamiento
    de un crédito o préstamo con los términos y condiciones establecidos por el Banco.
    </p>

    <p style="text-align: justify">
    La presente autorización es única y exclusivamente para tramitar el otrogamiento de un crédito o
    préstamo, por lo que no comprende la realización de actos jurídicos para efectos de dominio o
    administración de bienes, de manera que el Agente Hipotecario se obliga a:
    </p>

    <p style="text-align: justify; padding:0 0 0 10mm">
    - Recibir la documentación e información del suscrito y entregarla al Banco.
    </p>

    <p style="text-align: justify; padding:0 0 0 10mm">
    - Estar en comunicación con el Banco, con el objeto de recabar y entregar toda la
    documentación e información necesaria para el trámite antes indicado.
    </p>

    <p style="text-align: justify; padding:0 0 0 10mm">
    - Dar seguiminto al trámite de otrogamiento del crédito o préstamo ante el banco.
    </p>

    <p style="text-align: justify; padding:0 0 0 10mm">
    - Obtener y comunicar el resultado de mi evaluación como posible acreditado del Banco,
    incluyendo la información inherente a la consulta en las Sociedades de Información
    Crediticia que el Banco efectue.
    </p>

    <p style="text-align: justify; padding:0 0 0 10mm">
    - Llevar a cabo cualquier servicio relacionado con el trámite del otorgamiento del crédito o
    préstamo con el Banco.
      </p>

    <p style="text-align: justify">
    Además confirmo haber sido informado del Aviso de Provacidad del Banco.
    </p>

    <p style="text-align: justify">
    El Agente Hipotecario en ningun momento esta o estara autorizado para firmar en mi
    representación contratos, convenios, cartas o cualquier otro documento, mediante los cuales se
    generen obligaciones a mi cargo frente al Banco.
    </p>

    <p style="text-align: justify">
    En este acto manifiesto y acepto que toda la documentacin e informaci´´on que proporcione al
    Agente Hipotecario sera verdadera, precisa, estara vigente, no estara modificada o alterada, no
    contendra errores que sean de mi conocimiento y no conducira al error, de manera que reconozco
    y estoy al tanto de las sanciones administrativas y penales aplicables a las personas que presentan
    declaraciones en falso.
    </p>

    <p style="text-align: justify">
    Atentamente,
    </p>


    <p style="text-align: center">
    ______________________________
    </p>
    <p style="text-align: center">
    Nombre y Firma
    </p>

    <br>
    <br>
    <p style="text-align: center">
    Testigos:
    </p>
    <p style="margin:10mm 0 0 0; font-size:14px;"> INTERNAL</p>
</page>
