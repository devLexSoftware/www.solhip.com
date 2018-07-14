<?php
define('DB_SERVER','localhost');
define('DB_NAME','SolHip');
define('DB_USER','root');
define('DB_PASS','q1w2e3');
session_start();
/*function died($error) {
        echo "Lo sentimos, hubo un error en sus datos y el formulario no puede ser enviado en este momento. ";
        echo "Detalle de los errores.<br /><br />";
        echo $error."<br /><br />";
        echo "Por favor corrija estos errores e inténtelo de nuevo.<br /><br />";
        die();
    }*/

$count_modal = 0;
$con = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
  if (mysqli_connect_errno()) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
  }
  else {
    $ref = $_GET['ref'];
    $result = mysqli_query($con,"SELECT PerfilCliente.nombre, PerfilCliente.estado, PerfilCliente.banco, PerfilCliente.actividadEco
        FROM PerfilCliente INNER JOIN Clientes ON Clientes.id = PerfilCliente.pk_Cliente WHERE Clientes.ref = '".$ref."'");
    $elemento = mysqli_fetch_array($result);

    $result2 = mysqli_query($con,"SELECT * FROM DocumentosCliente
        INNER JOIN PerfilCliente ON PerfilCliente.id = DocumentosCliente.pk_PerfilCliente
        INNER JOIN Clientes ON Clientes.id = PerfilCliente.pk_Cliente WHERE Clientes.ref = '".$ref."'");
    $elemento2 = mysqli_fetch_array($result2);

if ($elemento[actividadEco] == null) {

    switch ($elemento['nombre']) {
      case 'Hipotecario Salario Fijo':
      case 'Hipotecario en Confinanciamiento':
      echo '
      <table class="table table-striped table-hover" table-layout: fixed;>
        <thead>
          <tr class="info">
            <th style="width: 80%;">Documento</th>
            <th style="text-align:left; width: 10%;">Estatus</th>
            <th style="width: 10%;"></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td style="width: 80%;">Solicitud de crédito bancario llenado y firmado.</td>
            <td style="width: 10%;">
              <input type="checkbox" class="form-check-input" name="solCreBancarioORI" ';if ($elemento2['solCreBancarioORI'] != 0) echo 'checked'; echo'>Original <br>
              <input type="checkbox" class="form-check-input" name="solCreBancarioCOP" ';if ($elemento2['solCreBancarioCOP'] != 0) echo 'checked'; echo'>Copia
            </td>
            <td style="width: 10%;"></td>
          </tr>
          <tr>
            <td style="width: 80%;">Autorización de Tramitación de Crédito firmada.</td>
            <td style="width: 10%;">
              <input type="checkbox" class="form-check-input" name="autTraCreditoORI" ';if ($elemento2['autTraCreditoORI']!= 0) echo 'checked'; echo'>Original <br>
              <input type="checkbox" class="form-check-input" name="autTraCreditoCOP" ';if ($elemento2['autTraCreditoCOP'] != 0) echo 'checked'; echo'>Copia
            </td>
            <td style="width: 10%;"></td>
          </tr>
          <tr>
            <td style="width: 80%;">Autorización de Buró de Crédito.</td>
            <td style="width: 10%;">
              <input type="checkbox" class="form-check-input" name="autBurCreditoORI" ';if ($elemento2['autBurCreditoORI'] != 0) echo 'checked'; echo'>Original <br>
              <input type="checkbox" class="form-check-input" name="autBurCreditoCOP" ';if ($elemento2['autBurCreditoCOP'] != 0) echo 'checked'; echo'>Copia
            </td>
            <td style="width: 10%;"></td>
          </tr>
          <tr>
            <td style="width: 80%;">Acta de Nacimiento original (2).</td>
            <td style="width: 10%;">
              <input type="checkbox" class="form-check-input" name="docActNacimientoORI" ';if ($elemento2['docActNacimientoORI'] != 0) echo 'checked'; echo'>Original <br>
              <input type="checkbox" class="form-check-input" name="docActNacimientoCOP" ';if ($elemento2['docActNacimientoCOP'] != 0) echo 'checked'; echo'>Copia
            </td>
            <td style="width: 10%;">Cantidad<input type="number" class="form-control" name="docActNacimientoCAN" placeholder="0" value="';if ($elemento2['docActNacimientoORI'] != 0 or $elemento2['docActNacimientoCOP'] != 0) echo $elemento2['docActNacimientoCAN']; echo'"></td>
          </tr>
          <tr>
            <td style="width: 80%;">Acta de Matrimonio original (2 si aplica).</td>
            <td style="width: 10%;">
              <input type="checkbox" class="form-check-input" name="docActMatrimonioORI" ';if ($elemento2['docActMatrimonioORI'] != 0) echo 'checked'; echo'>Original <br>
              <input type="checkbox" class="form-check-input" name="docActMatrimonioCOP" ';if ($elemento2['docActMatrimonioCOP'] != 0) echo 'checked'; echo'>Copia
            </td>
            <td style="width: 10%;">Cantidad<input type="number" class="form-control" name="docActMatrimonioCAN" placeholder="0" value="';if ($elemento2['docActMatrimonioORI'] != 0 or $elemento2['docActMatrimonioCOP'] != 0) echo $elemento2['docActMatrimonioCAN']; echo'"></td>
          </tr>
          <tr>
            <td style="width: 80%;">Identificación original.</td>
            <td style="width: 10%;">
              <input type="checkbox" class="form-check-input" name="docIdentificacionORI" ';if ($elemento2['docIdentificacionORI'] != 0) echo 'checked'; echo'>Original <br>
              <input type="checkbox" class="form-check-input" name="docIdentificacionCOP" ';if ($elemento2['docIdentificacionCOP'] != 0) echo 'checked'; echo'>Copia
            </td>
            <td style="width: 10%;"></td>
          </tr>
          <tr>
            <td style="width: 80%;">RFC en documento oficial del SAT.</td>
            <td style="width: 10%;">
              <input type="checkbox" class="form-check-input" name="docRfcORI" ';if ($elemento2['docRfcORI'] != 0) echo 'checked'; echo'>Original <br>
              <input type="checkbox" class="form-check-input" name="docRfcCOP" ';if ($elemento2['docRfcCOP'] != 0) echo 'checked'; echo'>Copia
            </td>
            <td style="width: 10%;"></td>
          </tr>
          <tr>
            <td style="width: 80%;">CURP</td>
            <td style="width: 10%;">
              <input type="checkbox" class="form-check-input" name="docCurpORI" ';if ($elemento2['docCurpORI'] != 0) echo 'checked'; echo'>Original <br>
              <input type="checkbox" class="form-check-input" name="docCurpCOP" ';if ($elemento2['docCurpCOP'] != 0) echo 'checked'; echo'>Copia
            </td>
            <td style="width: 10%;"></td>
          </tr>
          <tr>
            <td style="width: 80%;">Comprobante de domicilio original.</td>
            <td style="width: 10%;">
              <input type="checkbox" class="form-check-input" name="docComDomicilioORI" ';if ($elemento2['docComDomicilioORI'] != 0) echo 'checked'; echo'>Original <br>
              <input type="checkbox" class="form-check-input" name="docComDomicilioCOP" ';if ($elemento2['docComDomicilioCOP'] != 0) echo 'checked'; echo'>Copia
            </td>
            <td style="width: 10%;"></td>
          </tr>
          <tr>
            <td style="width: 80%;">Carta Patronal en donde se indique puesto, antigüedad, sueldo bruto, numero de seguro social, CURP y RFC. (2)</td>
            <td style="width: 10%;">
              <input type="checkbox" class="form-check-input" name="docPatronalORI" ';if ($elemento2['docPatronalORI'] != 0) echo 'checked'; echo'>Original <br>
              <input type="checkbox" class="form-check-input" name="docPatronalCOP" ';if ($elemento2['docPatronalORI'] != 0) echo 'checked'; echo'>Copia
            </td>
            <td style="width: 10%;"></td>
          </tr>
          <tr>
            <td style="width: 80%;">Últimos 6 recibos de nomina.</td>
            <td style="width: 10%;">
              <input type="checkbox" class="form-check-input" name="docNominaORI" ';if ($elemento2['docNominaORI'] != 0) echo 'checked'; echo'>Original<br>
              <input type="checkbox" class="form-check-input" name="docNominaCOP" ';if ($elemento2['docNominaCOP'] != 0) echo 'checked'; echo'>Copia<br>
            </td>
            <td style="width: 10%;">Cantidad<input type="number" class="form-control" name="docNominaCAN" placeholder="0" value="';if ($elemento2['docNominaORI']!= 0 or $elemento2['docNominaCOP']!= 0) echo $elemento2['docNominaCAN']; echo'"></td>
          </tr>
          <tr>
            <td style="width: 80%;">Últimos 3 estados de cuenta bancarios donde depositan el sueldo.</td>
            <td style="width: 10%;">
              <input type="checkbox" class="form-check-input" name="docEstCuentaORI" ';if ($elemento2['docEstCuentaORI'] != 0) echo 'checked'; echo'>Original<br>
              <input type="checkbox" class="form-check-input" name="docEstCuentaCOP" ';if ($elemento2['docEstCuentaCOP'] != 0) echo 'checked'; echo'>Copia<br>
            </td>
            <td style="width: 10%;">Cantidad<input type="number" class="form-control" name="docEstCuentaCAN" placeholder="0" value="';if ($elemento2['docEstCuentaORI'] != 0 or $elemento2['docEstCuentaCOP'] != 0) echo $elemento2['docEstCuentaCAN']; echo'"></td>
          </tr>
        </tbody>
      </table>
        ';

        break;
        case 'Hipotecario Persona Fisica con Actividad Independiente':
        echo '
        <table class="table table-striped table-hover" table-layout: fixed;>
          <thead>
            <tr class="info">
              <th style="width: 80%;">Documento</th>
              <th style="text-align:left; width: 10%;">Estatus</th>
              <th style="width: 10%;"></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td style="width: 80%;">Solicitud de crédito bancario llenado y firmado.</td>
              <td style="width: 10%;">
                <input type="checkbox" class="form-check-input" name="solCreBancarioORI" ';if ($elemento2['solCreBancarioORI'] != 0) echo 'checked'; echo'>Original <br>
                <input type="checkbox" class="form-check-input" name="solCreBancarioCOP" ';if ($elemento2['solCreBancarioCOP'] != 0) echo 'checked'; echo'>Copia
              </td>
              <td style="width: 10%;"></td>
            </tr>
            <tr>
              <td style="width: 80%;">Autorización de Tramitación de Crédito firmada.</td>
              <td style="width: 10%;">
                <input type="checkbox" class="form-check-input" name="autTraCreditoORI" ';if ($elemento2['autTraCreditoORI']!= 0) echo 'checked'; echo'>Original <br>
                <input type="checkbox" class="form-check-input" name="autTraCreditoCOP" ';if ($elemento2['autTraCreditoCOP'] != 0) echo 'checked'; echo'>Copia
              </td>
              <td style="width: 10%;"></td>
            </tr>
            <tr>
              <td style="width: 80%;">Autorización de Buró de Crédito.</td>
              <td style="width: 10%;">
                <input type="checkbox" class="form-check-input" name="autBurCreditoORI" ';if ($elemento2['autBurCreditoORI'] != 0) echo 'checked'; echo'>Original <br>
                <input type="checkbox" class="form-check-input" name="autBurCreditoCOP" ';if ($elemento2['autBurCreditoCOP'] != 0) echo 'checked'; echo'>Copia
              </td>
              <td style="width: 10%;"></td>
            </tr>
            <tr>
              <td style="width: 80%;">Acta de Nacimiento original (2).</td>
              <td style="width: 10%;">
                <input type="checkbox" class="form-check-input" name="docActNacimientoORI" ';if ($elemento2['docActNacimientoORI'] != 0) echo 'checked'; echo'>Original <br>
                <input type="checkbox" class="form-check-input" name="docActNacimientoCOP" ';if ($elemento2['docActNacimientoCOP'] != 0) echo 'checked'; echo'>Copia
              </td>
              <td style="width: 10%;">Cantidad<input type="number" class="form-control" name="docActNacimientoCAN" placeholder="0" value="';if ($elemento2['docActNacimientoORI'] != 0 or $elemento2['docActNacimientoCOP'] != 0) echo $elemento2['docActNacimientoCAN']; echo'"></td>
            </tr>
            <tr>
              <td style="width: 80%;">Acta de Matrimonio original (2 si aplica).</td>
              <td style="width: 10%;">
                <input type="checkbox" class="form-check-input" name="docActMatrimonioORI" ';if ($elemento2['docActMatrimonioORI'] != 0) echo 'checked'; echo'>Original <br>
                <input type="checkbox" class="form-check-input" name="docActMatrimonioCOP" ';if ($elemento2['docActMatrimonioCOP'] != 0) echo 'checked'; echo'>Copia
              </td>
              <td style="width: 10%;">Cantidad<input type="number" class="form-control" name="docActMatrimonioCAN" placeholder="0" value="';if ($elemento2['docActMatrimonioORI'] != 0 or $elemento2['docActMatrimonioCOP'] != 0) echo $elemento2['docActMatrimonioCAN']; echo'"></td>
            </tr>
            <tr>
              <td style="width: 80%;">Identificación original.</td>
              <td style="width: 10%;">
                <input type="checkbox" class="form-check-input" name="docIdentificacionORI" ';if ($elemento2['docIdentificacionORI'] != 0) echo 'checked'; echo'>Original <br>
                <input type="checkbox" class="form-check-input" name="docIdentificacionCOP" ';if ($elemento2['docIdentificacionCOP'] != 0) echo 'checked'; echo'>Copia
              </td>
              <td style="width: 10%;"></td>
            </tr>
            <tr>
              <td style="width: 80%;">RFC en documento oficial del SAT.</td>
              <td style="width: 10%;">
                <input type="checkbox" class="form-check-input" name="docRfcORI" ';if ($elemento2['docRfcORI'] != 0) echo 'checked'; echo'>Original <br>
                <input type="checkbox" class="form-check-input" name="docRfcCOP" ';if ($elemento2['docRfcCOP'] != 0) echo 'checked'; echo'>Copia
              </td>
              <td style="width: 10%;"></td>
            </tr>
            <tr>
              <td style="width: 80%;">CURP</td>
              <td style="width: 10%;">
                <input type="checkbox" class="form-check-input" name="docCurpORI" ';if ($elemento2['docCurpORI'] != 0) echo 'checked'; echo'>Original <br>
                <input type="checkbox" class="form-check-input" name="docCurpCOP" ';if ($elemento2['docCurpCOP'] != 0) echo 'checked'; echo'>Copia
              </td>
              <td style="width: 10%;"></td>
            </tr>
            <tr>
              <td style="width: 80%;">Comprobante de domicilio original.</td>
              <td style="width: 10%;">
                <input type="checkbox" class="form-check-input" name="docComDomicilioORI" ';if ($elemento2['docComDomicilioORI'] != 0) echo 'checked'; echo'>Original <br>
                <input type="checkbox" class="form-check-input" name="docComDomicilioCOP" ';if ($elemento2['docComDomicilioCOP'] != 0) echo 'checked'; echo'>Copia
              </td>
              <td style="width: 10%;"></td>
            </tr>
            <tr>
              <td style="width: 80%;">Últimos 6 recibos de nomina.</td>
              <td style="width: 10%;">
                <input type="checkbox" class="form-check-input" name="docNominaORI" ';if ($elemento2['docNominaORI'] != 0) echo 'checked'; echo'>Original<br>
                <input type="checkbox" class="form-check-input" name="docNominaCOP" ';if ($elemento2['docNominaCOP'] != 0) echo 'checked'; echo'>Copia<br>
              </td>
              <td style="width: 10%;">Cantidad<input type="number" class="form-control" name="docNominaCAN" placeholder="0" value="';if ($elemento2['docNominaORI']!= 0 or $elemento2['docNominaCOP']!= 0) echo $elemento2['docNominaCAN']; echo'"></td>
            </tr>
          </tbody>
        </table>
          ';
          break;

      case 'COFINAVIT':
          echo '
          <table class="table table-striped table-hover" table-layout: fixed;>
            <thead>
              <tr class="info">
                <th style="width: 80%;">Documento</th>
                <th style="text-align:left; width: 10%;">Estatus</th>
                <th style="width: 10%;"></th>
              </tr>
            </thead>
            <tbody>
            <tr>
              <td style="width: 80%;">Acta de Nacimiento original (2).</td>
              <td style="width: 10%;">
                <input type="checkbox" class="form-check-input" name="docActNacimientoORI" ';if ($elemento2['docActNacimientoORI'] != 0) echo 'checked'; echo'>Original <br>
                <input type="checkbox" class="form-check-input" name="docActNacimientoCOP" ';if ($elemento2['docActNacimientoCOP'] != 0) echo 'checked'; echo'>Copia
              </td>
              <td style="width: 10%;">Cantidad<input type="number" class="form-control" name="docActNacimientoCAN" placeholder="0" value="';if ($elemento2['docActNacimientoORI'] != 0 or $elemento2['docActNacimientoCOP'] != 0) echo $elemento2['docActNacimientoCAN']; echo'"></td>
            </tr>
            <tr>
              <td style="width: 80%;">Acta de Matrimonio original (2 si aplica).</td>
              <td style="width: 10%;">
                <input type="checkbox" class="form-check-input" name="docActMatrimonioORI" ';if ($elemento2['docActMatrimonioORI'] != 0) echo 'checked'; echo'>Original <br>
                <input type="checkbox" class="form-check-input" name="docActMatrimonioCOP" ';if ($elemento2['docActMatrimonioCOP'] != 0) echo 'checked'; echo'>Copia
              </td>
              <td style="width: 10%;">Cantidad<input type="number" class="form-control" name="docActMatrimonioCAN" placeholder="0" value="';if ($elemento2['docActMatrimonioORI'] != 0 or $elemento2['docActMatrimonioCOP'] != 0) echo $elemento2['docActMatrimonioCAN']; echo'"></td>
            </tr>
            <tr>
              <td style="width: 80%;">RFC en documento oficial del SAT.</td>
              <td style="width: 10%;">
                <input type="checkbox" class="form-check-input" name="docRfcORI" ';if ($elemento2['docRfcORI'] != 0) echo 'checked'; echo'>Original <br>
                <input type="checkbox" class="form-check-input" name="docRfcCOP" ';if ($elemento2['docRfcCOP'] != 0) echo 'checked'; echo'>Copia
              </td>
              <td style="width: 10%;"></td>
            </tr>
            <tr>
              <td style="width: 80%;">CURP</td>
              <td style="width: 10%;">
                <input type="checkbox" class="form-check-input" name="docCurpORI" ';if ($elemento2['docCurpORI'] != 0) echo 'checked'; echo'>Original <br>
                <input type="checkbox" class="form-check-input" name="docCurpCOP" ';if ($elemento2['docCurpCOP'] != 0) echo 'checked'; echo'>Copia
              </td>
              <td style="width: 10%;"></td>
            </tr>
            <tr>
              <td style="width: 80%;">Carta de autorización de crédito hipotecario en confinanciamiento con el INFONAVIT.</td>
              <td style="width: 10%;">
                <input type="checkbox" class="form-check-input" name="autCreHipInfonavitORI" ';if ($elemento2['autCreHipInfonavitORI'] != 0) echo 'checked'; echo'>Original <br>
                <input type="checkbox" class="form-check-input" name="autCreHipInfonavitCOP" ';if ($elemento2['autCreHipInfonavitCOP'] != 0) echo 'checked'; echo'>Copia
              </td>
              <td style="width: 10%;"></td>
            </tr>
            <tr>
              <td style="width: 80%;">Avalúo comercial.</td>
              <td style="width: 10%;">
                <input type="checkbox" class="form-check-input" name="docAvaComercialORI" ';if ($elemento2['docAvaComercialORI'] != 0) echo 'checked'; echo'>Original <br>
                <input type="checkbox" class="form-check-input" name="docAvaComercialCOP" ';if ($elemento2['docAvaComercialCOP'] != 0) echo 'checked'; echo'>Copia
              </td>
              <td style="width: 10%;"></td>
            </tr>
            <tr>
              <td style="width: 80%;">Formato de dictamen técnico de calidad.</td>
              <td style="width: 10%;">
                <input type="checkbox" class="form-check-input" name="solDicTecnicoORI" ';if ($elemento2['solDicTecnicoORI'] != 0) echo 'checked'; echo'>Original <br>
                <input type="checkbox" class="form-check-input" name="solDicTecnicoCOP" ';if ($elemento2['solDicTecnicoCOP'] != 0) echo 'checked'; echo'>Copia
              </td>
              <td style="width: 10%;"></td>
            </tr>
            <tr>
              <td style="width: 80%;">Copia de credencial de elector o pasaporte legible y completo. Registrar la leyenda “Cotejado contra su original” y firmado por el promotor de vivienda.</td>
              <td style="width: 10%;">
                <input type="checkbox" class="form-check-input" name="docIdeFirmadaORI" ';if ($elemento2['docIdeFirmadaORI'] != 0) echo 'checked'; echo'>Original <br>
                <input type="checkbox" class="form-check-input" name="docIdeFirmadaCOP" ';if ($elemento2['docIdeFirmadaCOP'] != 0) echo 'checked'; echo'>Copia
              </td>
              <td style="width: 10%;"></td>
            </tr>
            <tr>
              <td style="width: 80%;">Consulta de lista nominal en caso de credencial de elector.</td>
              <td style="width: 10%;">
                <input type="checkbox" class="form-check-input" name="docLisNominalORI" ';if ($elemento2['docLisNominalORI'] != 0) echo 'checked'; echo'>Original <br>
                <input type="checkbox" class="form-check-input" name="docLisNominalCOP" ';if ($elemento2['docLisNominalCOP'] != 0) echo 'checked'; echo'>Copia
              </td>
              <td style="width: 10%;"></td>
            </tr>
            <tr>
              <td style="width: 80%;">Constancia de propiedad o no propiedad, no mayor a 60 dias.(Solicitarlo en Centro de Gobierno).</td>
              <td style="width: 10%;">
                <input type="checkbox" class="form-check-input" name="docConPropiedadORI" ';if ($elemento2['docConPropiedadORI'] != 0) echo 'checked'; echo'>Original <br>
                <input type="checkbox" class="form-check-input" name="docConPropiedadCOP" ';if ($elemento2['docConPropiedadCOP'] != 0) echo 'checked'; echo'>Copia
              </td>
              <td style="width: 10%;"></td>
            </tr>
            <tr>
              <td style="width: 80%;">Precalificación del CONFINAVIT impreso y firmado por el cliente.</td>
              <td style="width: 10%;">
                <input type="checkbox" class="form-check-input" name="docPreConfinavitORI" ';if ($elemento2['docPreConfinavitORI'] != 0) echo 'checked'; echo'>Original <br>
                <input type="checkbox" class="form-check-input" name="docPreConfinavitCOP" ';if ($elemento2['docPreConfinavitCOP'] != 0) echo 'checked'; echo'>Copia
              </td>
              <td style="width: 10%;"></td>
            </tr>
            <tr>
              <td style="width: 80%;">Ecotecnologias impreso y firmado por el cliente.</td>
              <td style="width: 10%;">
                <input type="checkbox" class="form-check-input" name="docEcoTecnologiasORI" ';if ($elemento2['docEcoTecnologiasORI'] != 0) echo 'checked'; echo'>Original <br>
                <input type="checkbox" class="form-check-input" name="docEcoTecnologiasCOP" ';if ($elemento2['docEcoTecnologiasCOP'] != 0) echo 'checked'; echo'>Copia
              </td>
              <td style="width: 10%;"></td>
            </tr>
            <tr>
              <td style="width: 80%;">Detalle de movimientos (¿Cuanto llevo ahorrado?).</td>
              <td style="width: 10%;">
                <input type="checkbox" class="form-check-input" name="docDetMovimientoORI" ';if ($elemento2['docDetMovimientoORI'] != 0) echo 'checked'; echo'>Original <br>
                <input type="checkbox" class="form-check-input" name="docDetMovimientoCOP" ';if ($elemento2['docDetMovimientoCOP'] != 0) echo 'checked'; echo'>Copia
              </td>
              <td style="width: 10%;"></td>
            </tr>
            <tr>
              <td style="width: 80%;">Constancia laboral completa.</td>
              <td style="width: 10%;">
                <input type="checkbox" class="form-check-input" name="docConLaboralORI" ';if ($elemento2['docConLaboralORI'] != 0) echo 'checked'; echo'>Original <br>
                <input type="checkbox" class="form-check-input" name="docConLaboralCOP" ';if ($elemento2['docConLaboralCOP'] != 0) echo 'checked'; echo'>Copia
              </td>
              <td style="width: 10%;"></td>
            </tr>
            <tr>
              <td style="width: 80%;">Predial vigente.</td>
              <td style="width: 10%;">
                <input type="checkbox" class="form-check-input" name="docPredialORI" ';if ($elemento2['docPredialORI'] != 0) echo 'checked'; echo'>Original <br>
                <input type="checkbox" class="form-check-input" name="docPredialCOP" ';if ($elemento2['docPredialCOP'] != 0) echo 'checked'; echo'>Copia
              </td>
              <td style="width: 10%;"></td>
            </tr>
            <tr>
              <td style="width: 80%;">Impresa la imagen del Mejoravit para ver que este correcto el RFC con su homoclave.</td>
              <td style="width: 10%;">
                <input type="checkbox" class="form-check-input" name="docMejoravitORI" ';if ($elemento2['docMejoravitORI'] != 0) echo 'checked'; echo'>Original <br>
                <input type="checkbox" class="form-check-input" name="docMejoravitCOP" ';if ($elemento2['docMejoravitCOP'] != 0) echo 'checked'; echo'>Copia
              </td>
              <td style="width: 10%;"></td>
            </tr>
            <tr>
              <td style="width: 80%;">Constancia del taller “Saber Para Decidir”.</td>
              <td style="width: 10%;">
                <input type="checkbox" class="form-check-input" name="docConTallerORI" ';if ($elemento2['docConTallerORI'] != 0) echo 'checked'; echo'>Original <br>
                <input type="checkbox" class="form-check-input" name="docConTallerCOP" ';if ($elemento2['docConTallerCOP'] != 0) echo 'checked'; echo'>Copia
              </td>
              <td style="width: 10%;"></td>
            </tr>
            <tr>
              <td style="width: 80%;">Solicitud de crédito del INFONAVIT firmada. (Debe ser llenada manualmente y no en digital).</td>
              <td style="width: 10%;">
                <input type="checkbox" class="form-check-input" name="solCreInfonavitORI" ';if ($elemento2['solCreInfonavitORI'] != 0) echo 'checked'; echo'>Original <br>
                <input type="checkbox" class="form-check-input" name="solCreInfonavitCOP" ';if ($elemento2['solCreInfonavitCOP'] != 0) echo 'checked'; echo'>Copia
              </td>
              <td style="width: 10%;"></td>
            </tr>
            <tr>
              <td style="width: 80%;">Carta de instrucción irrevocable firmada. (Solo en segundo campo).</td>
              <td style="width: 10%;">
                <input type="checkbox" class="form-check-input" name="docInsIrrevocableORI" ';if ($elemento2['docInsIrrevocableORI'] != 0) echo 'checked'; echo'>Original <br>
                <input type="checkbox" class="form-check-input" name="docInsIrrevocableCOP" ';if ($elemento2['docInsIrrevocableCOP'] != 0) echo 'checked'; echo'>Copia
              </td>
              <td style="width: 10%;"></td>
            </tr>
            <tr>
              <td style="width: 80%;">Formato de autorización de consulta de buró de crédito. (4 Tantos y no se registra la fecha en que se firma el formato. Se entrega a INFONAVIT)</td>
              <td style="width: 10%;">
                <input type="checkbox" class="form-check-input" name="docAutBuroCreditoORI" ';if ($elemento2['docAutBuroCreditoORI'] != 0) echo 'checked'; echo'>Original <br>
                <input type="checkbox" class="form-check-input" name="docAutBuroCreditoCOP" ';if ($elemento2['docAutBuroCreditoCOP'] != 0) echo 'checked'; echo'>Copia
              </td>
              <td style="width: 10%;"></td>
            </tr>
            <tr>
              <td style="width: 80%;">Formato de manifiesto y acuerdo. (Firmado con su debida huella digital).</td>
              <td style="width: 10%;">
                <input type="checkbox" class="form-check-input" name="docManifiestoORI" ';if ($elemento2['docManifiestoORI'] != 0) echo 'checked'; echo'>Original <br>
                <input type="checkbox" class="form-check-input" name="docManifiestoCOP" ';if ($elemento2['docManifiestoCOP'] != 0) echo 'checked'; echo'>Copia
              </td>
              <td style="width: 10%;"></td>
            </tr>
            </tbody>
          </table>
          ';
        break;

        case 'Hipotecario Persona Fisica con Actividad Empresarial':
        echo '
        <table class="table table-striped table-hover" table-layout: fixed;>
          <thead>
            <tr class="info">
              <th style="width: 80%;">Documento</th>
              <th style="text-align:left; width: 10%;">Estatus</th>
              <th style="width: 10%;"></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td style="width: 80%;">Solicitud de crédito bancario llenado y firmado.</td>
              <td style="width: 10%;">
                <input type="checkbox" class="form-check-input" name="solCreBancarioORI" ';if ($elemento2['solCreBancarioORI'] != 0) echo 'checked'; echo'>Original <br>
                <input type="checkbox" class="form-check-input" name="solCreBancarioCOP" ';if ($elemento2['solCreBancarioCOP'] != 0) echo 'checked'; echo'>Copia
              </td>
              <td style="width: 10%;"></td>
            </tr>
            <tr>
              <td style="width: 80%;">Autorización de Tramitación de Crédito firmada.</td>
              <td style="width: 10%;">
                <input type="checkbox" class="form-check-input" name="autTraCreditoORI" ';if ($elemento2['autTraCreditoORI']!= 0) echo 'checked'; echo'>Original <br>
                <input type="checkbox" class="form-check-input" name="autTraCreditoCOP" ';if ($elemento2['autTraCreditoCOP'] != 0) echo 'checked'; echo'>Copia
              </td>
              <td style="width: 10%;"></td>
            </tr>
            <tr>
              <td style="width: 80%;">Autorización de Buró de Crédito.</td>
              <td style="width: 10%;">
                <input type="checkbox" class="form-check-input" name="autBurCreditoORI" ';if ($elemento2['autBurCreditoORI'] != 0) echo 'checked'; echo'>Original <br>
                <input type="checkbox" class="form-check-input" name="autBurCreditoCOP" ';if ($elemento2['autBurCreditoCOP'] != 0) echo 'checked'; echo'>Copia
              </td>
              <td style="width: 10%;"></td>
            </tr>
            <tr>
              <td style="width: 80%;">Acta de Nacimiento original (2).</td>
              <td style="width: 10%;">
                <input type="checkbox" class="form-check-input" name="docActNacimientoORI" ';if ($elemento2['docActNacimientoORI'] != 0) echo 'checked'; echo'>Original <br>
                <input type="checkbox" class="form-check-input" name="docActNacimientoCOP" ';if ($elemento2['docActNacimientoCOP'] != 0) echo 'checked'; echo'>Copia
              </td>
              <td style="width: 10%;">Cantidad<input type="number" class="form-control" name="docActNacimientoCAN" placeholder="0" value="';if ($elemento2['docActNacimientoORI'] != 0 or $elemento2['docActNacimientoCOP'] != 0) echo $elemento2['docActNacimientoCAN']; echo'"></td>
            </tr>
            <tr>
              <td style="width: 80%;">Acta de Matrimonio original (2 si aplica).</td>
              <td style="width: 10%;">
                <input type="checkbox" class="form-check-input" name="docActMatrimonioORI" ';if ($elemento2['docActMatrimonioORI'] != 0) echo 'checked'; echo'>Original <br>
                <input type="checkbox" class="form-check-input" name="docActMatrimonioCOP" ';if ($elemento2['docActMatrimonioCOP'] != 0) echo 'checked'; echo'>Copia
              </td>
              <td style="width: 10%;">Cantidad<input type="number" class="form-control" name="docActMatrimonioCAN" placeholder="0" value="';if ($elemento2['docActMatrimonioORI'] != 0 or $elemento2['docActMatrimonioCOP'] != 0) echo $elemento2['docActMatrimonioCAN']; echo'"></td>
            </tr>
            <tr>
              <td style="width: 80%;">Identificación original.</td>
              <td style="width: 10%;">
                <input type="checkbox" class="form-check-input" name="docIdentificacionORI" ';if ($elemento2['docIdentificacionORI'] != 0) echo 'checked'; echo'>Original <br>
                <input type="checkbox" class="form-check-input" name="docIdentificacionCOP" ';if ($elemento2['docIdentificacionCOP'] != 0) echo 'checked'; echo'>Copia
              </td>
              <td style="width: 10%;"></td>
            </tr>
            <tr>
              <td style="width: 80%;">RFC en documento oficial del SAT.</td>
              <td style="width: 10%;">
                <input type="checkbox" class="form-check-input" name="docRfcORI" ';if ($elemento2['docRfcORI'] != 0) echo 'checked'; echo'>Original <br>
                <input type="checkbox" class="form-check-input" name="docRfcCOP" ';if ($elemento2['docRfcCOP'] != 0) echo 'checked'; echo'>Copia
              </td>
              <td style="width: 10%;"></td>
            </tr>
            <tr>
              <td style="width: 80%;">CURP</td>
              <td style="width: 10%;">
                <input type="checkbox" class="form-check-input" name="docCurpORI" ';if ($elemento2['docCurpORI'] != 0) echo 'checked'; echo'>Original <br>
                <input type="checkbox" class="form-check-input" name="docCurpCOP" ';if ($elemento2['docCurpCOP'] != 0) echo 'checked'; echo'>Copia
              </td>
              <td style="width: 10%;"></td>
            </tr>
            <tr>
              <td style="width: 80%;">Comprobante de domicilio original.</td>
              <td style="width: 10%;">
                <input type="checkbox" class="form-check-input" name="docComDomicilioORI" ';if ($elemento2['docComDomicilioORI'] != 0) echo 'checked'; echo'>Original <br>
                <input type="checkbox" class="form-check-input" name="docComDomicilioCOP" ';if ($elemento2['docComDomicilioCOP'] != 0) echo 'checked'; echo'>Copia
              </td>
              <td style="width: 10%;"></td>
            </tr>
            <tr>
              <td style="width: 80%;">Últimos 6 recibos de nomina.</td>
              <td style="width: 10%;">
                <input type="checkbox" class="form-check-input" name="docNominaORI" ';if ($elemento2['docNominaORI'] != 0) echo 'checked'; echo'>Original<br>
                <input type="checkbox" class="form-check-input" name="docNominaCOP" ';if ($elemento2['docNominaCOP'] != 0) echo 'checked'; echo'>Copia<br>
              </td>
              <td style="width: 10%;">Cantidad<input type="number" class="form-control" name="docNominaCAN" placeholder="0" value="';if ($elemento2['docNominaORI']!= 0 or $elemento2['docNominaCOP']!= 0) echo $elemento2['docNominaCAN']; echo'"></td>
            </tr>
            <tr>
              <td style="width: 80%;">Declaración Anual.</td>
              <td style="width: 10%;">
                <input type="checkbox" class="form-check-input" name="docDecAnualORI" ';if ($elemento2['docDecAnualORI'] != 0) echo 'checked'; echo'>Original<br>
                <input type="checkbox" class="form-check-input" name="docDecAnualCOP" ';if ($elemento2['docDecAnualCOP'] != 0) echo 'checked'; echo'>Copia<br>
              </td>
              <td style="width: 10%;"></td>
            </tr>
            <tr>
              <td style="width: 80%;">Declaración Parcial.</td>
              <td style="width: 10%;">
                <input type="checkbox" class="form-check-input" name="docDecParcialORI" ';if ($elemento2['docDecParcialORI'] != 0) echo 'checked'; echo'>Original<br>
                <input type="checkbox" class="form-check-input" name="docDecParcialCOP" ';if ($elemento2['docDecParcialCOP'] != 0) echo 'checked'; echo'>Copia<br>
              </td>
              <td style="width: 10%;"></td>
            </tr>
            <tr>
              <td style="width: 80%;">Alta de Secretaria de Hacienda y Crédito Público.</td>
              <td style="width: 10%;">
                <input type="checkbox" class="form-check-input" name="solAltSecretariaORI" ';if ($elemento2['solAltSecretariaORI'] != 0) echo 'checked'; echo'>Original<br>
                <input type="checkbox" class="form-check-input" name="solAltSecretariaCOP" ';if ($elemento2['solAltSecretariaCOP'] != 0) echo 'checked'; echo'>Copia<br>
              </td>
              <td style="width: 10%;"></td>
            </tr>
          </tbody>
        </table>
          ';
          break;

          case 'Hipotecario Pension':
          echo '
          <table class="table table-striped table-hover" table-layout: fixed;>
            <thead>
              <tr class="info">
                <th style="width: 80%;">Documento</th>
                <th style="text-align:left; width: 10%;">Estatus</th>
                <th style="width: 10%;"></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td style="width: 80%;">Solicitud de crédito bancario llenado y firmado.</td>
                <td style="width: 10%;">
                  <input type="checkbox" class="form-check-input" name="solCreBancarioORI" ';if ($elemento2['solCreBancarioORI'] != 0) echo 'checked'; echo'>Original <br>
                  <input type="checkbox" class="form-check-input" name="solCreBancarioCOP" ';if ($elemento2['solCreBancarioCOP'] != 0) echo 'checked'; echo'>Copia
                </td>
                <td style="width: 10%;"></td>
              </tr>
              <tr>
                <td style="width: 80%;">Autorización de Tramitación de Crédito firmada.</td>
                <td style="width: 10%;">
                  <input type="checkbox" class="form-check-input" name="autTraCreditoORI" ';if ($elemento2['autTraCreditoORI']!= 0) echo 'checked'; echo'>Original <br>
                  <input type="checkbox" class="form-check-input" name="autTraCreditoCOP" ';if ($elemento2['autTraCreditoCOP'] != 0) echo 'checked'; echo'>Copia
                </td>
                <td style="width: 10%;"></td>
              </tr>
              <tr>
                <td style="width: 80%;">Autorización de Buró de Crédito.</td>
                <td style="width: 10%;">
                  <input type="checkbox" class="form-check-input" name="autBurCreditoORI" ';if ($elemento2['autBurCreditoORI'] != 0) echo 'checked'; echo'>Original <br>
                  <input type="checkbox" class="form-check-input" name="autBurCreditoCOP" ';if ($elemento2['autBurCreditoCOP'] != 0) echo 'checked'; echo'>Copia
                </td>
                <td style="width: 10%;"></td>
              </tr>
              <tr>
                <td style="width: 80%;">Acta de Nacimiento original (2).</td>
                <td style="width: 10%;">
                  <input type="checkbox" class="form-check-input" name="docActNacimientoORI" ';if ($elemento2['docActNacimientoORI'] != 0) echo 'checked'; echo'>Original <br>
                  <input type="checkbox" class="form-check-input" name="docActNacimientoCOP" ';if ($elemento2['docActNacimientoCOP'] != 0) echo 'checked'; echo'>Copia
                </td>
                <td style="width: 10%;">Cantidad<input type="number" class="form-control" name="docActNacimientoCAN" placeholder="0" value="';if ($elemento2['docActNacimientoORI'] != 0 or $elemento2['docActNacimientoCOP'] != 0) echo $elemento2['docActNacimientoCAN']; echo'"></td>
              </tr>
              <tr>
                <td style="width: 80%;">Identificación original.</td>
                <td style="width: 10%;">
                  <input type="checkbox" class="form-check-input" name="docIdentificacionORI" ';if ($elemento2['docIdentificacionORI'] != 0) echo 'checked'; echo'>Original <br>
                  <input type="checkbox" class="form-check-input" name="docIdentificacionCOP" ';if ($elemento2['docIdentificacionCOP'] != 0) echo 'checked'; echo'>Copia
                </td>
                <td style="width: 10%;"></td>
              </tr>
              <tr>
                <td style="width: 80%;">Comprobante de domicilio original.</td>
                <td style="width: 10%;">
                  <input type="checkbox" class="form-check-input" name="docComDomicilioORI" ';if ($elemento2['docComDomicilioORI'] != 0) echo 'checked'; echo'>Original <br>
                  <input type="checkbox" class="form-check-input" name="docComDomicilioCOP" ';if ($elemento2['docComDomicilioCOP'] != 0) echo 'checked'; echo'>Copia
                </td>
                <td style="width: 10%;"></td>
              </tr>
              <tr>
                <td style="width: 80%;">Convenio de pensión.</td>
                <td style="width: 10%;">
                  <input type="checkbox" class="form-check-input" name="docConvenioORI" ';if ($elemento2['docConvenioORI'] != 0) echo 'checked'; echo'>Original <br>
                  <input type="checkbox" class="form-check-input" name="docConvenioCOP" ';if ($elemento2['docConvenioCOP'] != 0) echo 'checked'; echo'>Copia
                </td>
                <td style="width: 10%;"></td>
              </tr>
              <tr>
                <td style="width: 80%;">Últimos 3 recibos de pensión mensual.</td>
                <td style="width: 10%;">
                  <input type="checkbox" class="form-check-input" name="docPenMensualORI" ';if ($elemento2['docPenMensualORI'] != 0) echo 'checked'; echo'>Original <br>
                  <input type="checkbox" class="form-check-input" name="docPenMensualCOP" ';if ($elemento2['docPenMensualCOP'] != 0) echo 'checked'; echo'>Copia
                </td>
                <td style="width: 10%;">Cantidad<input type="number" class="form-control" name="docPenMensualCAN" placeholder="0" value="';if ($elemento2['docPenMensualORI'] != 0 or $elemento2['docPenMensualCOP'] != 0) echo $elemento2['docPenMensualCAN']; echo'"></td>
              </tr>
              <tr>
                <td style="width: 80%;">Últimos 3 estados de cuenta bancarios donde se deposita la pensión.</td>
                <td style="width: 10%;">
                  <input type="checkbox" class="form-check-input" name="docPenCuentaORI" ';if ($elemento2['docPenCuentaORI'] != 0) echo 'checked'; echo'>Original <br>
                  <input type="checkbox" class="form-check-input" name="docPenCuentaCOP" ';if ($elemento2['docPenCuentaCOP'] != 0) echo 'checked'; echo'>Copia
                </td>
                <td style="width: 10%;">Cantidad<input type="number" class="form-control" name="docPenCuentaCAN" placeholder="0" value="';if ($elemento2['docPenCuentaORI'] != 0 or $elemento2['docPenCuentaCOP'] != 0) echo $elemento2['docPenCuentaCAN']; echo'"></td>
              </tr>
            </tbody>
          </table>
            ';
            break;

          case 'Persona Moral':
          echo '
          <table class="table table-striped table-hover" table-layout: fixed;>
            <thead>
              <tr class="info">
                <th style="width: 80%;">Documento</th>
                <th style="text-align:left; width: 10%;">Estatus</th>
                <th style="width: 10%;"></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td style="width: 80%;">Solicitud 097.</td>
                <td style="width: 10%;">
                  <input type="checkbox" class="form-check-input" name="sol97ORI" ';if ($elemento2['sol97ORI'] != 0) echo 'checked'; echo'>Original <br>
                  <input type="checkbox" class="form-check-input" name="sol97COP" ';if ($elemento2['sol97COP'] != 0) echo 'checked'; echo'>Copia
                </td>
                <td style="width: 10%;"></td>
              </tr>
              <tr>
                <td style="width: 80%;">Acta de Nacimiento original (2).</td>
                <td style="width: 10%;">
                  <input type="checkbox" class="form-check-input" name="docActNacimientoORI" ';if ($elemento2['docActNacimientoORI'] != 0) echo 'checked'; echo'>Original <br>
                  <input type="checkbox" class="form-check-input" name="docActNacimientoCOP" ';if ($elemento2['docActNacimientoCOP'] != 0) echo 'checked'; echo'>Copia
                </td>
                <td style="width: 10%;">Cantidad<input type="number" class="form-control" name="docActNacimientoCAN" placeholder="0" value="';if ($elemento2['docActNacimientoORI'] != 0 or $elemento2['docActNacimientoCOP'] != 0) echo $elemento2['docActNacimientoCAN']; echo'"></td>
              </tr>
              <tr>
                <td style="width: 80%;">Acta de Matrimonio original (2 si aplica).</td>
                <td style="width: 10%;">
                  <input type="checkbox" class="form-check-input" name="docActMatrimonioORI" ';if ($elemento2['docActMatrimonioORI'] != 0) echo 'checked'; echo'>Original <br>
                  <input type="checkbox" class="form-check-input" name="docActMatrimonioCOP" ';if ($elemento2['docActMatrimonioCOP'] != 0) echo 'checked'; echo'>Copia
                </td>
                <td style="width: 10%;">Cantidad<input type="number" class="form-control" name="docActMatrimonioCAN" placeholder="0" value="';if ($elemento2['docActMatrimonioORI'] != 0 or $elemento2['docActMatrimonioCOP'] != 0) echo $elemento2['docActMatrimonioCAN']; echo'"></td>
              </tr>
              <tr>
                <td style="width: 80%;">Identificación original.</td>
                <td style="width: 10%;">
                  <input type="checkbox" class="form-check-input" name="docIdentificacionORI" ';if ($elemento2['docIdentificacionORI'] != 0) echo 'checked'; echo'>Original <br>
                  <input type="checkbox" class="form-check-input" name="docIdentificacionCOP" ';if ($elemento2['docIdentificacionCOP'] != 0) echo 'checked'; echo'>Copia
                </td>
                <td style="width: 10%;"></td>
              </tr>
              <tr>
                <td style="width: 80%;">Comprobante de domicilio original.</td>
                <td style="width: 10%;">
                  <input type="checkbox" class="form-check-input" name="docComDomicilioORI" ';if ($elemento2['docComDomicilioORI'] != 0) echo 'checked'; echo'>Original <br>
                  <input type="checkbox" class="form-check-input" name="docComDomicilioCOP" ';if ($elemento2['docComDomicilioCOP'] != 0) echo 'checked'; echo'>Copia
                </td>
                <td style="width: 10%;"></td>
              </tr>
              <tr>
                <td style="width: 80%;">Constancia de situación fiscal.</td>
                <td style="width: 10%;">
                  <input type="checkbox" class="form-check-input" name="docSitFiscalORI" ';if ($elemento2['docSitFiscalORI'] != 0) echo 'checked'; echo'>Original <br>
                  <input type="checkbox" class="form-check-input" name="docSitFiscalCOP" ';if ($elemento2['docSitFiscalCOP'] != 0) echo 'checked'; echo'>Copia
                </td>
                <td style="width: 10%;"></td>
              </tr>
              <tr>
                <td style="width: 80%;">Últimos 6 estados de cuenta.</td>
                <td style="width: 10%;">
                  <input type="checkbox" class="form-check-input" name="docEstCuentaORI" ';if ($elemento2['docEstCuentaORI'] != 0) echo 'checked'; echo'>Original <br>
                  <input type="checkbox" class="form-check-input" name="docEstCuentaCOP" ';if ($elemento2['docEstCuentaCOP'] != 0) echo 'checked'; echo'>Copia
                </td>
                <td style="width: 10%;">Cantidad<input type="number" class="form-control" name="docEstCuentaCAN" placeholder="0" value="';if ($elemento2['docEstCuentaORI'] != 0 or $elemento2['docEstCuentaCOP'] != 0) echo $elemento2['docEstCuentaCAN']; echo'"></td>
              </tr>
              <tr>
                <td style="width: 80%;">Acta constitutiva.</td>
                <td style="width: 10%;">
                  <input type="checkbox" class="form-check-input" name="docActConstitutivaORI" ';if ($elemento2['docActConstitutivaORI'] != 0) echo 'checked'; echo'>Original <br>
                  <input type="checkbox" class="form-check-input" name="docActConstitutivaCOP" ';if ($elemento2['docActConstitutivaCOP'] != 0) echo 'checked'; echo'>Copia
                </td>
                <td style="width: 10%;"></td>
              </tr>
            </tbody>
          </table>
            ';
            break;
      default:
        # code...
        break;
    }
  }
  elseif ($elemento[actividadEco] != "") {
    switch ($elemento['actividadEco']) {
      case 'Asalariados':
      echo '
      <table class="table table-striped table-hover" table-layout: fixed;>
        <thead>
          <tr class="info">
            <th style="width: 80%;">Documento</th>
            <th style="text-align:left; width: 10%;">Estatus</th>
            <th style="width: 10%;"></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td style="width: 80%;">Solicitud de crédito bancario llenado y firmado.</td>
            <td style="width: 10%;">
              <input type="checkbox" class="form-check-input" name="solCreBancarioORI" ';if ($elemento2['solCreBancarioORI'] != 0) echo 'checked'; echo'>Original <br>
              <input type="checkbox" class="form-check-input" name="solCreBancarioCOP" ';if ($elemento2['solCreBancarioCOP'] != 0) echo 'checked'; echo'>Copia
            </td>
            <td style="width: 10%;"></td>
          </tr>
          <tr>
            <td style="width: 80%;">Acta de Matrimonio original (2 si aplica).</td>
            <td style="width: 10%;">
              <input type="checkbox" class="form-check-input" name="docActMatrimonioORI" ';if ($elemento2['docActMatrimonioORI'] != 0) echo 'checked'; echo'>Original <br>
              <input type="checkbox" class="form-check-input" name="docActMatrimonioCOP" ';if ($elemento2['docActMatrimonioCOP'] != 0) echo 'checked'; echo'>Copia
            </td>
            <td style="width: 10%;">Cantidad<input type="number" class="form-control" name="docActMatrimonioCAN" placeholder="0" value="';if ($elemento2['docActMatrimonioORI'] != 0 or $elemento2['docActMatrimonioCOP'] != 0) echo $elemento2['docActMatrimonioCAN']; echo'"></td>
          </tr>
          <tr>
            <td style="width: 80%;">Identificación original.</td>
            <td style="width: 10%;">
              <input type="checkbox" class="form-check-input" name="docIdentificacionORI" ';if ($elemento2['docIdentificacionORI'] != 0) echo 'checked'; echo'>Original <br>
              <input type="checkbox" class="form-check-input" name="docIdentificacionCOP" ';if ($elemento2['docIdentificacionCOP'] != 0) echo 'checked'; echo'>Copia
            </td>
            <td style="width: 10%;"></td>
          </tr>
          <tr>
            <td style="width: 80%;">Comprobante de domicilio original.</td>
            <td style="width: 10%;">
              <input type="checkbox" class="form-check-input" name="docComDomicilioORI" ';if ($elemento2['docComDomicilioORI'] != 0) echo 'checked'; echo'>Original <br>
              <input type="checkbox" class="form-check-input" name="docComDomicilioCOP" ';if ($elemento2['docComDomicilioCOP'] != 0) echo 'checked'; echo'>Copia
            </td>
            <td style="width: 10%;"></td>
          </tr>
          <tr>
            <td style="width: 80%;">Últimos 2 recibos de nomina.</td>
            <td style="width: 10%;">
              <input type="checkbox" class="form-check-input" name="docNominaORI" ';if ($elemento2['docNominaORI'] != 0) echo 'checked'; echo'>Original<br>
              <input type="checkbox" class="form-check-input" name="docNominaCOP" ';if ($elemento2['docNominaCOP'] != 0) echo 'checked'; echo'>Copia<br>
            </td>
            <td style="width: 10%;">Cantidad<input type="number" class="form-control" name="docNominaCAN" placeholder="0" value="';if ($elemento2['docNominaORI']!= 0 or $elemento2['docNominaCOP']!= 0) echo $elemento2['docNominaCAN']; echo'"></td>
          </tr>
          <tr>
            <td style="width: 80%;">Últimos 2 estados de cuenta bancarios donde depositan el sueldo.</td>
            <td style="width: 10%;">
              <input type="checkbox" class="form-check-input" name="docEstCuentaORI" ';if ($elemento2['docEstCuentaORI'] != 0) echo 'checked'; echo'>Original<br>
              <input type="checkbox" class="form-check-input" name="docEstCuentaCOP" ';if ($elemento2['docEstCuentaCOP'] != 0) echo 'checked'; echo'>Copia<br>
            </td>
            <td style="width: 10%;">Cantidad<input type="number" class="form-control" name="docEstCuentaCAN" placeholder="0" value="';if ($elemento2['docEstCuentaORI'] != 0 or $elemento2['docEstCuentaCOP'] != 0) echo $elemento2['docEstCuentaCAN']; echo'"></td>
          </tr>
          <tr>
            <td style="width: 80%;">Cuestionario de salud.</td>
            <td style="width: 10%;">
              <input type="checkbox" class="form-check-input" name="docSaludORI" ';if ($elemento2['docSaludORI'] != 0) echo 'checked'; echo'>Original <br>
              <input type="checkbox" class="form-check-input" name="docSaludCOP" ';if ($elemento2['docSaludCOP'] != 0) echo 'checked'; echo'>Copia
            </td>
            <td style="width: 10%;"></td>
          </tr>
          <tr>
            <td style="width: 80%;">Cotización.</td>
            <td style="width: 10%;">
              <input type="checkbox" class="form-check-input" name="docCotizacionORI" ';if ($elemento2['docCotizacionORI'] != 0) echo 'checked'; echo'>Original <br>
              <input type="checkbox" class="form-check-input" name="docCotizacionCOP" ';if ($elemento2['docCotizacionCOP'] != 0) echo 'checked'; echo'>Copia
            </td>
            <td style="width: 10%;"></td>
          </tr>
          <tr>
            <td style="width: 80%;">Carta de apoyo.</td>
            <td style="width: 10%;">
              <input type="checkbox" class="form-check-input" name="docApoyoORI" ';if ($elemento2['docApoyoORI'] != 0) echo 'checked'; echo'>Original <br>
              <input type="checkbox" class="form-check-input" name="docApoyoCOP" ';if ($elemento2['docApoyoCOP'] != 0) echo 'checked'; echo'>Copia
            </td>
            <td style="width: 10%;"></td>
          </tr>
        </tbody>
      </table>
        ';
        break;

        case 'Honorarios':
        echo '
        <table class="table table-striped table-hover" table-layout: fixed;>
          <thead>
            <tr class="info">
              <th style="width: 80%;">Documento</th>
              <th style="text-align:left; width: 10%;">Estatus</th>
              <th style="width: 10%;"></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td style="width: 80%;">Solicitud de crédito bancario llenado y firmado.</td>
              <td style="width: 10%;">
                <input type="checkbox" class="form-check-input" name="solCreBancarioORI" ';if ($elemento2['solCreBancarioORI'] != 0) echo 'checked'; echo'>Original <br>
                <input type="checkbox" class="form-check-input" name="solCreBancarioCOP" ';if ($elemento2['solCreBancarioCOP'] != 0) echo 'checked'; echo'>Copia
              </td>
              <td style="width: 10%;"></td>
            </tr>
            <tr>
              <td style="width: 80%;">Acta de Matrimonio original (2 si aplica).</td>
              <td style="width: 10%;">
                <input type="checkbox" class="form-check-input" name="docActMatrimonioORI" ';if ($elemento2['docActMatrimonioORI'] != 0) echo 'checked'; echo'>Original <br>
                <input type="checkbox" class="form-check-input" name="docActMatrimonioCOP" ';if ($elemento2['docActMatrimonioCOP'] != 0) echo 'checked'; echo'>Copia
              </td>
              <td style="width: 10%;">Cantidad<input type="number" class="form-control" name="docActMatrimonioCAN" placeholder="0" value="';if ($elemento2['docActMatrimonioORI'] != 0 or $elemento2['docActMatrimonioCOP'] != 0) echo $elemento2['docActMatrimonioCAN']; echo'"></td>
            </tr>
            <tr>
              <td style="width: 80%;">Identificación original.</td>
              <td style="width: 10%;">
                <input type="checkbox" class="form-check-input" name="docIdentificacionORI" ';if ($elemento2['docIdentificacionORI'] != 0) echo 'checked'; echo'>Original <br>
                <input type="checkbox" class="form-check-input" name="docIdentificacionCOP" ';if ($elemento2['docIdentificacionCOP'] != 0) echo 'checked'; echo'>Copia
              </td>
              <td style="width: 10%;"></td>
            </tr>
            <tr>
              <td style="width: 80%;">Comprobante de domicilio original.</td>
              <td style="width: 10%;">
                <input type="checkbox" class="form-check-input" name="docComDomicilioORI" ';if ($elemento2['docComDomicilioORI'] != 0) echo 'checked'; echo'>Original <br>
                <input type="checkbox" class="form-check-input" name="docComDomicilioCOP" ';if ($elemento2['docComDomicilioCOP'] != 0) echo 'checked'; echo'>Copia
              </td>
              <td style="width: 10%;"></td>
            </tr>
            <tr>
              <td style="width: 80%;">Últimos 2 estados de cuenta bancarios donde depositan el sueldo.</td>
              <td style="width: 10%;">
                <input type="checkbox" class="form-check-input" name="docEstCuentaORI" ';if ($elemento2['docEstCuentaORI'] != 0) echo 'checked'; echo'>Original<br>
                <input type="checkbox" class="form-check-input" name="docEstCuentaCOP" ';if ($elemento2['docEstCuentaCOP'] != 0) echo 'checked'; echo'>Copia<br>
              </td>
              <td style="width: 10%;">Cantidad<input type="number" class="form-control" name="docEstCuentaCAN" placeholder="0" value="';if ($elemento2['docEstCuentaORI'] != 0 or $elemento2['docEstCuentaCOP'] != 0) echo $elemento2['docEstCuentaCAN']; echo'"></td>
            </tr>
            <tr>
              <td style="width: 80%;">Cuestionario de salud.</td>
              <td style="width: 10%;">
                <input type="checkbox" class="form-check-input" name="docSaludORI" ';if ($elemento2['docSaludORI'] != 0) echo 'checked'; echo'>Original <br>
                <input type="checkbox" class="form-check-input" name="docSaludCOP" ';if ($elemento2['docSaludCOP'] != 0) echo 'checked'; echo'>Copia
              </td>
              <td style="width: 10%;"></td>
            </tr>
            <tr>
              <td style="width: 80%;">Cotización.</td>
              <td style="width: 10%;">
                <input type="checkbox" class="form-check-input" name="docCotizacionORI" ';if ($elemento2['docCotizacionORI'] != 0) echo 'checked'; echo'>Original <br>
                <input type="checkbox" class="form-check-input" name="docCotizacionCOP" ';if ($elemento2['docCotizacionCOP'] != 0) echo 'checked'; echo'>Copia
              </td>
              <td style="width: 10%;"></td>
            </tr>
            <tr>
              <td style="width: 80%;">Carta de apoyo.</td>
              <td style="width: 10%;">
                <input type="checkbox" class="form-check-input" name="docApoyoORI" ';if ($elemento2['docApoyoORI'] != 0) echo 'checked'; echo'>Original <br>
                <input type="checkbox" class="form-check-input" name="docApoyoCOP" ';if ($elemento2['docApoyoCOP'] != 0) echo 'checked'; echo'>Copia
              </td>
              <td style="width: 10%;"></td>
            </tr>
            <tr>
              <td style="width: 80%;">Recibo de honorarios.</td>
              <td style="width: 10%;">
                <input type="checkbox" class="form-check-input" name="docRecHonorariosORI" ';if ($elemento2['docRecHonorariosORI'] != 0) echo 'checked'; echo'>Original <br>
                <input type="checkbox" class="form-check-input" name="docRecHonorariosCOP" ';if ($elemento2['docRecHonorariosCOP'] != 0) echo 'checked'; echo'>Copia
              </td>
              <td style="width: 10%;">Cantidad<input type="number" class="form-control" name="docRecHonorariosCAN" placeholder="0" value="';if ($elemento2['docRecHonorariosORI'] != 0 or $elemento2['docRecHonorariosCOP'] != 0) echo $elemento2['docRecHonorariosCAN']; echo'"></td>
            </tr>
            <tr>
              <td style="width: 80%;">Declaración anual.</td>
              <td style="width: 10%;">
                <input type="checkbox" class="form-check-input" name="docDecAnualORI" ';if ($elemento2['docDecAnualORI'] != 0) echo 'checked'; echo'>Original <br>
                <input type="checkbox" class="form-check-input" name="docDecAnualCOP" ';if ($elemento2['docDecAnualCOP'] != 0) echo 'checked'; echo'>Copia
              </td>
              <td style="width: 10%;"></td>
            </tr>
            <tr>
              <td style="width: 80%;">RFC en documento oficial del SAT.</td>
              <td style="width: 10%;">
                <input type="checkbox" class="form-check-input" name="docRfcORI" ';if ($elemento2['docRfcORI'] != 0) echo 'checked'; echo'>Original <br>
                <input type="checkbox" class="form-check-input" name="docRfcCOP" ';if ($elemento2['docRfcCOP'] != 0) echo 'checked'; echo'>Copia
              </td>
              <td style="width: 10%;"></td>
            </tr>
          </tbody>
        </table>
          ';
          break;

          case 'Persona Fisica Actividad Emp':
          echo '
          <table class="table table-striped table-hover" table-layout: fixed;>
            <thead>
              <tr class="info">
                <th style="width: 80%;">Documento</th>
                <th style="text-align:left; width: 10%;">Estatus</th>
                <th style="width: 10%;"></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td style="width: 80%;">Solicitud de crédito bancario llenado y firmado.</td>
                <td style="width: 10%;">
                  <input type="checkbox" class="form-check-input" name="solCreBancarioORI" ';if ($elemento2['solCreBancarioORI'] != 0) echo 'checked'; echo'>Original <br>
                  <input type="checkbox" class="form-check-input" name="solCreBancarioCOP" ';if ($elemento2['solCreBancarioCOP'] != 0) echo 'checked'; echo'>Copia
                </td>
                <td style="width: 10%;"></td>
              </tr>
              <tr>
                <td style="width: 80%;">Acta de Matrimonio original (2 si aplica).</td>
                <td style="width: 10%;">
                  <input type="checkbox" class="form-check-input" name="docActMatrimonioORI" ';if ($elemento2['docActMatrimonioORI'] != 0) echo 'checked'; echo'>Original <br>
                  <input type="checkbox" class="form-check-input" name="docActMatrimonioCOP" ';if ($elemento2['docActMatrimonioCOP'] != 0) echo 'checked'; echo'>Copia
                </td>
                <td style="width: 10%;">Cantidad<input type="number" class="form-control" name="docActMatrimonioCAN" placeholder="0" value="';if ($elemento2['docActMatrimonioORI'] != 0 or $elemento2['docActMatrimonioCOP'] != 0) echo $elemento2['docActMatrimonioCAN']; echo'"></td>
              </tr>
              <tr>
                <td style="width: 80%;">Identificación original.</td>
                <td style="width: 10%;">
                  <input type="checkbox" class="form-check-input" name="docIdentificacionORI" ';if ($elemento2['docIdentificacionORI'] != 0) echo 'checked'; echo'>Original <br>
                  <input type="checkbox" class="form-check-input" name="docIdentificacionCOP" ';if ($elemento2['docIdentificacionCOP'] != 0) echo 'checked'; echo'>Copia
                </td>
                <td style="width: 10%;"></td>
              </tr>
              <tr>
                <td style="width: 80%;">Comprobante de domicilio original.</td>
                <td style="width: 10%;">
                  <input type="checkbox" class="form-check-input" name="docComDomicilioORI" ';if ($elemento2['docComDomicilioORI'] != 0) echo 'checked'; echo'>Original <br>
                  <input type="checkbox" class="form-check-input" name="docComDomicilioCOP" ';if ($elemento2['docComDomicilioCOP'] != 0) echo 'checked'; echo'>Copia
                </td>
                <td style="width: 10%;"></td>
              </tr>
              <tr>
                <td style="width: 80%;">Últimos 2 estados de cuenta bancarios donde depositan el sueldo.</td>
                <td style="width: 10%;">
                  <input type="checkbox" class="form-check-input" name="docEstCuentaORI" ';if ($elemento2['docEstCuentaORI'] != 0) echo 'checked'; echo'>Original<br>
                  <input type="checkbox" class="form-check-input" name="docEstCuentaCOP" ';if ($elemento2['docEstCuentaCOP'] != 0) echo 'checked'; echo'>Copia<br>
                </td>
                <td style="width: 10%;">Cantidad<input type="number" class="form-control" name="docEstCuentaCAN" placeholder="0" value="';if ($elemento2['docEstCuentaORI'] != 0 or $elemento2['docEstCuentaCOP'] != 0) echo $elemento2['docEstCuentaCAN']; echo'"></td>
              </tr>
              <tr>
                <td style="width: 80%;">Cuestionario de salud.</td>
                <td style="width: 10%;">
                  <input type="checkbox" class="form-check-input" name="docSaludORI" ';if ($elemento2['docSaludORI'] != 0) echo 'checked'; echo'>Original <br>
                  <input type="checkbox" class="form-check-input" name="docSaludCOP" ';if ($elemento2['docSaludCOP'] != 0) echo 'checked'; echo'>Copia
                </td>
                <td style="width: 10%;"></td>
              </tr>
              <tr>
                <td style="width: 80%;">Cotización.</td>
                <td style="width: 10%;">
                  <input type="checkbox" class="form-check-input" name="docCotizacionORI" ';if ($elemento2['docCotizacionORI'] != 0) echo 'checked'; echo'>Original <br>
                  <input type="checkbox" class="form-check-input" name="docCotizacionCOP" ';if ($elemento2['docCotizacionCOP'] != 0) echo 'checked'; echo'>Copia
                </td>
                <td style="width: 10%;"></td>
              </tr>
              <tr>
                <td style="width: 80%;">Carta de apoyo.</td>
                <td style="width: 10%;">
                  <input type="checkbox" class="form-check-input" name="docApoyoORI" ';if ($elemento2['docApoyoORI'] != 0) echo 'checked'; echo'>Original <br>
                  <input type="checkbox" class="form-check-input" name="docApoyoCOP" ';if ($elemento2['docApoyoCOP'] != 0) echo 'checked'; echo'>Copia
                </td>
                <td style="width: 10%;"></td>
              </tr>
              <tr>
                <td style="width: 80%;">Declaración anual.</td>
                <td style="width: 10%;">
                  <input type="checkbox" class="form-check-input" name="docDecAnualORI" ';if ($elemento2['docDecAnualORI'] != 0) echo 'checked'; echo'>Original <br>
                  <input type="checkbox" class="form-check-input" name="docDecAnualCOP" ';if ($elemento2['docDecAnualCOP'] != 0) echo 'checked'; echo'>Copia
                </td>
                <td style="width: 10%;"></td>
              </tr>
              <tr>
                <td style="width: 80%;">RFC en documento oficial del SAT.</td>
                <td style="width: 10%;">
                  <input type="checkbox" class="form-check-input" name="docRfcORI" ';if ($elemento2['docRfcORI'] != 0) echo 'checked'; echo'>Original <br>
                  <input type="checkbox" class="form-check-input" name="docRfcCOP" ';if ($elemento2['docRfcCOP'] != 0) echo 'checked'; echo'>Copia
                </td>
                <td style="width: 10%;"></td>
              </tr>
              <tr>
                <td style="width: 80%;">Estados financieros.</td>
                <td style="width: 10%;">
                  <input type="checkbox" class="form-check-input" name="docEstFinancierosORI" ';if ($elemento2['docEstFinancierosORI'] != 0) echo 'checked'; echo'>Original<br>
                  <input type="checkbox" class="form-check-input" name="docEstFinancierosCOP" ';if ($elemento2['docEstFinancierosCOP'] != 0) echo 'checked'; echo'>Copia<br>
                </td>
                <td style="width: 10%;">Cantidad<input type="number" class="form-control" name="docEstFinancierosCAN" placeholder="0" value="';if ($elemento2['docEstFinancierosORI'] != 0 or $elemento2['docEstFinancierosCOP'] != 0) echo $elemento2['docEstFinancierosCAN']; echo'"></td>
              </tr>
              <tr>
                <td style="width: 80%;">Reporte de giro comercial.</td>
                <td style="width: 10%;">
                  <input type="checkbox" class="form-check-input" name="docRepComercialORI" ';if ($elemento2['docRepComercialORI'] != 0) echo 'checked'; echo'>Original <br>
                  <input type="checkbox" class="form-check-input" name="docRepComercialCOP" ';if ($elemento2['docRepComercialCOP'] != 0) echo 'checked'; echo'>Copia
                </td>
                <td style="width: 10%;"></td>
              </tr>
            </tbody>
          </table>
            ';
            break;

            case 'Persona Fisica Accionistas':
            echo '
            <table class="table table-striped table-hover" table-layout: fixed;>
              <thead>
                <tr class="info">
                  <th style="width: 80%;">Documento</th>
                  <th style="text-align:left; width: 10%;">Estatus</th>
                  <th style="width: 10%;"></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td style="width: 80%;">Solicitud de crédito bancario llenado y firmado.</td>
                  <td style="width: 10%;">
                    <input type="checkbox" class="form-check-input" name="solCreBancarioORI" ';if ($elemento2['solCreBancarioORI'] != 0) echo 'checked'; echo'>Original <br>
                    <input type="checkbox" class="form-check-input" name="solCreBancarioCOP" ';if ($elemento2['solCreBancarioCOP'] != 0) echo 'checked'; echo'>Copia
                  </td>
                  <td style="width: 10%;"></td>
                </tr>
                <tr>
                  <td style="width: 80%;">Acta de Matrimonio original (2 si aplica).</td>
                  <td style="width: 10%;">
                    <input type="checkbox" class="form-check-input" name="docActMatrimonioORI" ';if ($elemento2['docActMatrimonioORI'] != 0) echo 'checked'; echo'>Original <br>
                    <input type="checkbox" class="form-check-input" name="docActMatrimonioCOP" ';if ($elemento2['docActMatrimonioCOP'] != 0) echo 'checked'; echo'>Copia
                  </td>
                  <td style="width: 10%;">Cantidad<input type="number" class="form-control" name="docActMatrimonioCAN" placeholder="0" value="';if ($elemento2['docActMatrimonioORI'] != 0 or $elemento2['docActMatrimonioCOP'] != 0) echo $elemento2['docActMatrimonioCAN']; echo'"></td>
                </tr>
                <tr>
                  <td style="width: 80%;">Identificación original.</td>
                  <td style="width: 10%;">
                    <input type="checkbox" class="form-check-input" name="docIdentificacionORI" ';if ($elemento2['docIdentificacionORI'] != 0) echo 'checked'; echo'>Original <br>
                    <input type="checkbox" class="form-check-input" name="docIdentificacionCOP" ';if ($elemento2['docIdentificacionCOP'] != 0) echo 'checked'; echo'>Copia
                  </td>
                  <td style="width: 10%;"></td>
                </tr>
                <tr>
                  <td style="width: 80%;">Comprobante de domicilio original.</td>
                  <td style="width: 10%;">
                    <input type="checkbox" class="form-check-input" name="docComDomicilioORI" ';if ($elemento2['docComDomicilioORI'] != 0) echo 'checked'; echo'>Original <br>
                    <input type="checkbox" class="form-check-input" name="docComDomicilioCOP" ';if ($elemento2['docComDomicilioCOP'] != 0) echo 'checked'; echo'>Copia
                  </td>
                  <td style="width: 10%;"></td>
                </tr>
                <tr>
                  <td style="width: 80%;">Últimos 2 estados de cuenta bancarios donde depositan el sueldo.</td>
                  <td style="width: 10%;">
                    <input type="checkbox" class="form-check-input" name="docEstCuentaORI" ';if ($elemento2['docEstCuentaORI'] != 0) echo 'checked'; echo'>Original<br>
                    <input type="checkbox" class="form-check-input" name="docEstCuentaCOP" ';if ($elemento2['docEstCuentaCOP'] != 0) echo 'checked'; echo'>Copia<br>
                  </td>
                  <td style="width: 10%;">Cantidad<input type="number" class="form-control" name="docEstCuentaCAN" placeholder="0" value="';if ($elemento2['docEstCuentaORI'] != 0 or $elemento2['docEstCuentaCOP'] != 0) echo $elemento2['docEstCuentaCAN']; echo'"></td>
                </tr>
                <tr>
                  <td style="width: 80%;">Cuestionario de salud.</td>
                  <td style="width: 10%;">
                    <input type="checkbox" class="form-check-input" name="docSaludORI" ';if ($elemento2['docSaludORI'] != 0) echo 'checked'; echo'>Original <br>
                    <input type="checkbox" class="form-check-input" name="docSaludCOP" ';if ($elemento2['docSaludCOP'] != 0) echo 'checked'; echo'>Copia
                  </td>
                  <td style="width: 10%;"></td>
                </tr>
                <tr>
                  <td style="width: 80%;">Cotización.</td>
                  <td style="width: 10%;">
                    <input type="checkbox" class="form-check-input" name="docCotizacionORI" ';if ($elemento2['docCotizacionORI'] != 0) echo 'checked'; echo'>Original <br>
                    <input type="checkbox" class="form-check-input" name="docCotizacionCOP" ';if ($elemento2['docCotizacionCOP'] != 0) echo 'checked'; echo'>Copia
                  </td>
                  <td style="width: 10%;"></td>
                </tr>
                <tr>
                  <td style="width: 80%;">Carta de apoyo.</td>
                  <td style="width: 10%;">
                    <input type="checkbox" class="form-check-input" name="docApoyoORI" ';if ($elemento2['docApoyoORI'] != 0) echo 'checked'; echo'>Original <br>
                    <input type="checkbox" class="form-check-input" name="docApoyoCOP" ';if ($elemento2['docApoyoCOP'] != 0) echo 'checked'; echo'>Copia
                  </td>
                  <td style="width: 10%;"></td>
                </tr>
                <tr>
                  <td style="width: 80%;">Declaración anual.</td>
                  <td style="width: 10%;">
                    <input type="checkbox" class="form-check-input" name="docDecAnualORI" ';if ($elemento2['docDecAnualORI'] != 0) echo 'checked'; echo'>Original <br>
                    <input type="checkbox" class="form-check-input" name="docDecAnualCOP" ';if ($elemento2['docDecAnualCOP'] != 0) echo 'checked'; echo'>Copia
                  </td>
                  <td style="width: 10%;"></td>
                </tr>
                <tr>
                  <td style="width: 80%;">Relación patrimonial.</td>
                  <td style="width: 10%;">
                    <input type="checkbox" class="form-check-input" name="docRelPatrimonialORI" ';if ($elemento2['docRelPatrimonialORI'] != 0) echo 'checked'; echo'>Original <br>
                    <input type="checkbox" class="form-check-input" name="docRelPatrimonialCOP" ';if ($elemento2['docRelPatrimonialCOP'] != 0) echo 'checked'; echo'>Copia
                  </td>
                  <td style="width: 10%;"></td>
                </tr>
              </tbody>
            </table>
              ';
              break;
              case 'Arrendadores':
              echo '
              <table class="table table-striped table-hover" table-layout: fixed;>
                <thead>
                  <tr class="info">
                    <th style="width: 80%;">Documento</th>
                    <th style="text-align:left; width: 10%;">Estatus</th>
                    <th style="width: 10%;"></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td style="width: 80%;">Solicitud de crédito bancario llenado y firmado.</td>
                    <td style="width: 10%;">
                      <input type="checkbox" class="form-check-input" name="solCreBancarioORI" ';if ($elemento2['solCreBancarioORI'] != 0) echo 'checked'; echo'>Original <br>
                      <input type="checkbox" class="form-check-input" name="solCreBancarioCOP" ';if ($elemento2['solCreBancarioCOP'] != 0) echo 'checked'; echo'>Copia
                    </td>
                    <td style="width: 10%;"></td>
                  </tr>
                  <tr>
                    <td style="width: 80%;">Acta de Matrimonio original (2 si aplica).</td>
                    <td style="width: 10%;">
                      <input type="checkbox" class="form-check-input" name="docActMatrimonioORI" ';if ($elemento2['docActMatrimonioORI'] != 0) echo 'checked'; echo'>Original <br>
                      <input type="checkbox" class="form-check-input" name="docActMatrimonioCOP" ';if ($elemento2['docActMatrimonioCOP'] != 0) echo 'checked'; echo'>Copia
                    </td>
                    <td style="width: 10%;">Cantidad<input type="number" class="form-control" name="docActMatrimonioCAN" placeholder="0" value="';if ($elemento2['docActMatrimonioORI'] != 0 or $elemento2['docActMatrimonioCOP'] != 0) echo $elemento2['docActMatrimonioCAN']; echo'"></td>
                  </tr>
                  <tr>
                    <td style="width: 80%;">Identificación original.</td>
                    <td style="width: 10%;">
                      <input type="checkbox" class="form-check-input" name="docIdentificacionORI" ';if ($elemento2['docIdentificacionORI'] != 0) echo 'checked'; echo'>Original <br>
                      <input type="checkbox" class="form-check-input" name="docIdentificacionCOP" ';if ($elemento2['docIdentificacionCOP'] != 0) echo 'checked'; echo'>Copia
                    </td>
                    <td style="width: 10%;"></td>
                  </tr>
                  <tr>
                    <td style="width: 80%;">Comprobante de domicilio original.</td>
                    <td style="width: 10%;">
                      <input type="checkbox" class="form-check-input" name="docComDomicilioORI" ';if ($elemento2['docComDomicilioORI'] != 0) echo 'checked'; echo'>Original <br>
                      <input type="checkbox" class="form-check-input" name="docComDomicilioCOP" ';if ($elemento2['docComDomicilioCOP'] != 0) echo 'checked'; echo'>Copia
                    </td>
                    <td style="width: 10%;"></td>
                  </tr>
                  <tr>
                    <td style="width: 80%;">Últimos 2 estados de cuenta bancarios donde depositan el sueldo.</td>
                    <td style="width: 10%;">
                      <input type="checkbox" class="form-check-input" name="docEstCuentaORI" ';if ($elemento2['docEstCuentaORI'] != 0) echo 'checked'; echo'>Original<br>
                      <input type="checkbox" class="form-check-input" name="docEstCuentaCOP" ';if ($elemento2['docEstCuentaCOP'] != 0) echo 'checked'; echo'>Copia<br>
                    </td>
                    <td style="width: 10%;">Cantidad<input type="number" class="form-control" name="docEstCuentaCAN" placeholder="0" value="';if ($elemento2['docEstCuentaORI'] != 0 or $elemento2['docEstCuentaCOP'] != 0) echo $elemento2['docEstCuentaCAN']; echo'"></td>
                  </tr>
                  <tr>
                    <td style="width: 80%;">Cuestionario de salud.</td>
                    <td style="width: 10%;">
                      <input type="checkbox" class="form-check-input" name="docSaludORI" ';if ($elemento2['docSaludORI'] != 0) echo 'checked'; echo'>Original <br>
                      <input type="checkbox" class="form-check-input" name="docSaludCOP" ';if ($elemento2['docSaludCOP'] != 0) echo 'checked'; echo'>Copia
                    </td>
                    <td style="width: 10%;"></td>
                  </tr>
                  <tr>
                    <td style="width: 80%;">Cotización.</td>
                    <td style="width: 10%;">
                      <input type="checkbox" class="form-check-input" name="docCotizacionORI" ';if ($elemento2['docCotizacionORI'] != 0) echo 'checked'; echo'>Original <br>
                      <input type="checkbox" class="form-check-input" name="docCotizacionCOP" ';if ($elemento2['docCotizacionCOP'] != 0) echo 'checked'; echo'>Copia
                    </td>
                    <td style="width: 10%;"></td>
                  </tr>
                  <tr>
                    <td style="width: 80%;">Carta de apoyo.</td>
                    <td style="width: 10%;">
                      <input type="checkbox" class="form-check-input" name="docApoyoORI" ';if ($elemento2['docApoyoORI'] != 0) echo 'checked'; echo'>Original <br>
                      <input type="checkbox" class="form-check-input" name="docApoyoCOP" ';if ($elemento2['docApoyoCOP'] != 0) echo 'checked'; echo'>Copia
                    </td>
                    <td style="width: 10%;"></td>
                  </tr>
                  <tr>
                    <td style="width: 80%;">Declaración anual.</td>
                    <td style="width: 10%;">
                      <input type="checkbox" class="form-check-input" name="docDecAnualORI" ';if ($elemento2['docDecAnualORI'] != 0) echo 'checked'; echo'>Original <br>
                      <input type="checkbox" class="form-check-input" name="docDecAnualCOP" ';if ($elemento2['docDecAnualCOP'] != 0) echo 'checked'; echo'>Copia
                    </td>
                    <td style="width: 10%;"></td>
                  </tr>
                  <tr>
                    <td style="width: 80%;">RFC en documento oficial del SAT.</td>
                    <td style="width: 10%;">
                      <input type="checkbox" class="form-check-input" name="docRfcORI" ';if ($elemento2['docRfcORI'] != 0) echo 'checked'; echo'>Original <br>
                      <input type="checkbox" class="form-check-input" name="docRfcCOP" ';if ($elemento2['docRfcCOP'] != 0) echo 'checked'; echo'>Copia
                    </td>
                    <td style="width: 10%;"></td>
                  </tr>
                  <tr>
                    <td style="width: 80%;">Contratos de renta y/o recibos.</td>
                    <td style="width: 10%;">
                      <input type="checkbox" class="form-check-input" name="docConComercialORI" ';if ($elemento2['docConComercialORI'] != 0) echo 'checked'; echo'>Original <br>
                      <input type="checkbox" class="form-check-input" name="docConComercialCOP" ';if ($elemento2['docConComercialCOP'] != 0) echo 'checked'; echo'>Copia
                    </td>
                    <td style="width: 10%;"></td>
                  </tr>
                  <tr>
                    <td style="width: 80%;">Tenencias de las propiedades.</td>
                    <td style="width: 10%;">
                      <input type="checkbox" class="form-check-input" name="docTenenciasORI" ';if ($elemento2['docTenenciasORI'] != 0) echo 'checked'; echo'>Original <br>
                      <input type="checkbox" class="form-check-input" name="docTenenciasCOP" ';if ($elemento2['docTenenciasCOP'] != 0) echo 'checked'; echo'>Copia
                    </td>
                    <td style="width: 10%;"></td>
                  </tr>
                </tbody>
              </table>
                ';
                break;
                case 'EC. Informal':
                echo '
                <table class="table table-striped table-hover" table-layout: fixed;>
                  <thead>
                    <tr class="info">
                      <th style="width: 80%;">Documento</th>
                      <th style="text-align:left; width: 10%;">Estatus</th>
                      <th style="width: 10%;"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td style="width: 80%;">Solicitud de crédito bancario llenado y firmado.</td>
                      <td style="width: 10%;">
                        <input type="checkbox" class="form-check-input" name="solCreBancarioORI" ';if ($elemento2['solCreBancarioORI'] != 0) echo 'checked'; echo'>Original <br>
                        <input type="checkbox" class="form-check-input" name="solCreBancarioCOP" ';if ($elemento2['solCreBancarioCOP'] != 0) echo 'checked'; echo'>Copia
                      </td>
                      <td style="width: 10%;"></td>
                    </tr>
                    <tr>
                      <td style="width: 80%;">Acta de Matrimonio original (2 si aplica).</td>
                      <td style="width: 10%;">
                        <input type="checkbox" class="form-check-input" name="docActMatrimonioORI" ';if ($elemento2['docActMatrimonioORI'] != 0) echo 'checked'; echo'>Original <br>
                        <input type="checkbox" class="form-check-input" name="docActMatrimonioCOP" ';if ($elemento2['docActMatrimonioCOP'] != 0) echo 'checked'; echo'>Copia
                      </td>
                      <td style="width: 10%;">Cantidad<input type="number" class="form-control" name="docActMatrimonioCAN" placeholder="0" value="';if ($elemento2['docActMatrimonioORI'] != 0 or $elemento2['docActMatrimonioCOP'] != 0) echo $elemento2['docActMatrimonioCAN']; echo'"></td>
                    </tr>
                    <tr>
                      <td style="width: 80%;">Identificación original.</td>
                      <td style="width: 10%;">
                        <input type="checkbox" class="form-check-input" name="docIdentificacionORI" ';if ($elemento2['docIdentificacionORI'] != 0) echo 'checked'; echo'>Original <br>
                        <input type="checkbox" class="form-check-input" name="docIdentificacionCOP" ';if ($elemento2['docIdentificacionCOP'] != 0) echo 'checked'; echo'>Copia
                      </td>
                      <td style="width: 10%;"></td>
                    </tr>
                    <tr>
                      <td style="width: 80%;">Comprobante de domicilio original.</td>
                      <td style="width: 10%;">
                        <input type="checkbox" class="form-check-input" name="docComDomicilioORI" ';if ($elemento2['docComDomicilioORI'] != 0) echo 'checked'; echo'>Original <br>
                        <input type="checkbox" class="form-check-input" name="docComDomicilioCOP" ';if ($elemento2['docComDomicilioCOP'] != 0) echo 'checked'; echo'>Copia
                      </td>
                      <td style="width: 10%;"></td>
                    </tr>
                    <tr>
                      <td style="width: 80%;">Últimos 2 estados de cuenta bancarios donde depositan el sueldo.</td>
                      <td style="width: 10%;">
                        <input type="checkbox" class="form-check-input" name="docEstCuentaORI" ';if ($elemento2['docEstCuentaORI'] != 0) echo 'checked'; echo'>Original<br>
                        <input type="checkbox" class="form-check-input" name="docEstCuentaCOP" ';if ($elemento2['docEstCuentaCOP'] != 0) echo 'checked'; echo'>Copia<br>
                      </td>
                      <td style="width: 10%;">Cantidad<input type="number" class="form-control" name="docEstCuentaCAN" placeholder="0" value="';if ($elemento2['docEstCuentaORI'] != 0 or $elemento2['docEstCuentaCOP'] != 0) echo $elemento2['docEstCuentaCAN']; echo'"></td>
                    </tr>
                    <tr>
                      <td style="width: 80%;">Cuestionario de salud.</td>
                      <td style="width: 10%;">
                        <input type="checkbox" class="form-check-input" name="docSaludORI" ';if ($elemento2['docSaludORI'] != 0) echo 'checked'; echo'>Original <br>
                        <input type="checkbox" class="form-check-input" name="docSaludCOP" ';if ($elemento2['docSaludCOP'] != 0) echo 'checked'; echo'>Copia
                      </td>
                      <td style="width: 10%;"></td>
                    </tr>
                    <tr>
                      <td style="width: 80%;">Cotización.</td>
                      <td style="width: 10%;">
                        <input type="checkbox" class="form-check-input" name="docCotizacionORI" ';if ($elemento2['docCotizacionORI'] != 0) echo 'checked'; echo'>Original <br>
                        <input type="checkbox" class="form-check-input" name="docCotizacionCOP" ';if ($elemento2['docCotizacionCOP'] != 0) echo 'checked'; echo'>Copia
                      </td>
                      <td style="width: 10%;"></td>
                    </tr>
                    <tr>
                      <td style="width: 80%;">Carta de apoyo.</td>
                      <td style="width: 10%;">
                        <input type="checkbox" class="form-check-input" name="docApoyoORI" ';if ($elemento2['docApoyoORI'] != 0) echo 'checked'; echo'>Original <br>
                        <input type="checkbox" class="form-check-input" name="docApoyoCOP" ';if ($elemento2['docApoyoCOP'] != 0) echo 'checked'; echo'>Copia
                      </td>
                      <td style="width: 10%;"></td>
                    </tr>
                  </tbody>
                </table>
                  ';
                  break;
                  case 'PM del Accionista':
                  echo '
                  <table class="table table-striped table-hover" table-layout: fixed;>
                    <thead>
                      <tr class="info">
                        <th style="width: 80%;">Documento</th>
                        <th style="text-align:left; width: 10%;">Estatus</th>
                        <th style="width: 10%;"></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td style="width: 80%;">Últimos 2 estados de cuenta bancarios donde depositan el sueldo.</td>
                        <td style="width: 10%;">
                          <input type="checkbox" class="form-check-input" name="docEstCuentaORI" ';if ($elemento2['docEstCuentaORI'] != 0) echo 'checked'; echo'>Original<br>
                          <input type="checkbox" class="form-check-input" name="docEstCuentaCOP" ';if ($elemento2['docEstCuentaCOP'] != 0) echo 'checked'; echo'>Copia<br>
                        </td>
                        <td style="width: 10%;">Cantidad<input type="number" class="form-control" name="docEstCuentaCAN" placeholder="0" value="';if ($elemento2['docEstCuentaORI'] != 0 or $elemento2['docEstCuentaCOP'] != 0) echo $elemento2['docEstCuentaCAN']; echo'"></td>
                      </tr>
                      <tr>
                        <td style="width: 80%;">Declaración anual.</td>
                        <td style="width: 10%;">
                          <input type="checkbox" class="form-check-input" name="docDecAnualORI" ';if ($elemento2['docDecAnualORI'] != 0) echo 'checked'; echo'>Original <br>
                          <input type="checkbox" class="form-check-input" name="docDecAnualCOP" ';if ($elemento2['docDecAnualCOP'] != 0) echo 'checked'; echo'>Copia
                        </td>
                        <td style="width: 10%;"></td>
                      </tr>
                      <tr>
                        <td style="width: 80%;">RFC en documento oficial del SAT.</td>
                        <td style="width: 10%;">
                          <input type="checkbox" class="form-check-input" name="docRfcORI" ';if ($elemento2['docRfcORI'] != 0) echo 'checked'; echo'>Original <br>
                          <input type="checkbox" class="form-check-input" name="docRfcCOP" ';if ($elemento2['docRfcCOP'] != 0) echo 'checked'; echo'>Copia
                        </td>
                        <td style="width: 10%;"></td>
                      </tr>
                      <tr>
                        <td style="width: 80%;">Estados financieros.</td>
                        <td style="width: 10%;">
                          <input type="checkbox" class="form-check-input" name="docEstFinancierosORI" ';if ($elemento2['docEstFinancierosORI'] != 0) echo 'checked'; echo'>Original<br>
                          <input type="checkbox" class="form-check-input" name="docEstFinancierosCOP" ';if ($elemento2['docEstFinancierosCOP'] != 0) echo 'checked'; echo'>Copia<br>
                        </td>
                        <td style="width: 10%;">Cantidad<input type="number" class="form-control" name="docEstFinancierosCAN" placeholder="0" value="';if ($elemento2['docEstFinancierosORI'] != 0 or $elemento2['docEstFinancierosCOP'] != 0) echo $elemento2['docEstFinancierosCAN']; echo'"></td>
                      </tr>
                      <tr>
                        <td style="width: 80%;">Documentación legal</td>
                        <td style="width: 10%;">
                          <input type="checkbox" class="form-check-input" name="docLegalORI" ';if ($elemento2['docLegalORI'] != 0) echo 'checked'; echo'>Original<br>
                          <input type="checkbox" class="form-check-input" name="docLegalCOP" ';if ($elemento2['docLegalCOP'] != 0) echo 'checked'; echo'>Copia<br>
                        </td>
                        <td style="width: 10%;"></td>
                      </tr>
                    </tbody>
                  </table>
                    ';
                    break;
                    case 'Aval':
                    echo '
                    <table class="table table-striped table-hover" table-layout: fixed;>
                      <thead>
                        <tr class="info">
                          <th style="width: 80%;">Documento</th>
                          <th style="text-align:left; width: 10%;">Estatus</th>
                          <th style="width: 10%;"></th>
                        </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <td style="width: 80%;">Acta de Matrimonio original (2 si aplica).</td>
                        <td style="width: 10%;">
                          <input type="checkbox" class="form-check-input" name="docActMatrimonioORI" ';if ($elemento2['docActMatrimonioORI'] != 0) echo 'checked'; echo'>Original <br>
                          <input type="checkbox" class="form-check-input" name="docActMatrimonioCOP" ';if ($elemento2['docActMatrimonioCOP'] != 0) echo 'checked'; echo'>Copia
                        </td>
                        <td style="width: 10%;">Cantidad<input type="number" class="form-control" name="docActMatrimonioCAN" placeholder="0" value="';if ($elemento2['docActMatrimonioORI'] != 0 or $elemento2['docActMatrimonioCOP'] != 0) echo $elemento2['docActMatrimonioCAN']; echo'"></td>
                      </tr>
                      <tr>
                        <td style="width: 80%;">Identificación original.</td>
                        <td style="width: 10%;">
                          <input type="checkbox" class="form-check-input" name="docIdentificacionORI" ';if ($elemento2['docIdentificacionORI'] != 0) echo 'checked'; echo'>Original <br>
                          <input type="checkbox" class="form-check-input" name="docIdentificacionCOP" ';if ($elemento2['docIdentificacionCOP'] != 0) echo 'checked'; echo'>Copia
                        </td>
                        <td style="width: 10%;"></td>
                      </tr>
                      <tr>
                        <td style="width: 80%;">Comprobante de domicilio original.</td>
                        <td style="width: 10%;">
                          <input type="checkbox" class="form-check-input" name="docComDomicilioORI" ';if ($elemento2['docComDomicilioORI'] != 0) echo 'checked'; echo'>Original <br>
                          <input type="checkbox" class="form-check-input" name="docComDomicilioCOP" ';if ($elemento2['docComDomicilioCOP'] != 0) echo 'checked'; echo'>Copia
                        </td>
                        <td style="width: 10%;"></td>
                      </tr>
                      </tbody>
                    </table>
                      ';
                      break;
        }
  }
}
