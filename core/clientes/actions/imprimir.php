<?php



error_reporting(E_ALL);
ini_set('display_errors', '1');

define('DB_SERVER','localhost');
define('DB_NAME','SolHip');
define('DB_USER','root');
define('DB_PASS','q1w2e3');
session_start();


require_once '../../../componentes/vendor/autoload.php';
use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;

$archivo = $_GET['f'];
try {
    ob_start();
    switch ($archivo) {
      case 'd':
        include '../templates/documentImprClientes.php';
        break;
      case 'br':
        include '../documents/CartaConsentimientoBrokerInterno.php';
        break;
      case 'b':
      $con = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
        if (mysqli_connect_errno()) {
          echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        }
        else {
          $result = mysqli_query($con,"SELECT PerfilCliente.banco FROM PerfilCliente
            INNER JOIN Clientes ON PerfilCliente.pk_Cliente = Clientes.id WHERE Clientes.ref = '$_GET[ref]';");
          $elemento = mysqli_fetch_array($result);
          switch ($elemento['banco']) {
            case 'Banorte':
              include '../documents/CartaAutorizacion_Banorte.php';
              break;
            case 'Afirme':
              include '../documents/CartaAutorizacion_Afirme.php';
              break;
            case 'BanRegio':
              include '../documents/CartaAutorizacion_BanRegio.php';
              break;
            case 'HSBC':
              include '../documents/CartaAutorizacion_HSBC.php';
              break;
            case 'Scotiabank':
              include '../documents/CartaAutorizacion_Scotiabank.php';
              break;          
            default:
              # code...
              break;
          }
        }
        break;
      default:
        # code...
        break;
    }
    $content = ob_get_clean();
    $html2pdf = new Html2Pdf('P', 'A4', 'fr', true, 'UTF-8', 3);
    $html2pdf->pdf->SetDisplayMode('fullpage');
    $html2pdf->writeHTML($content);
    $html2pdf->output('exemple03.pdf');
} catch (Html2PdfException $e) {
    $formatter = new ExceptionFormatter($e);
    echo $formatter->getHtmlMessage();
}

?>
