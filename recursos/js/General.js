

//---Para cargar los mensajes cuando se realiza una accion
function messages() {
  $('#divmessages').load('../default/messages.php');
}

//---Mostrar todos los mensajes y alertas
function showall(o){
  if (o == "mensajes") {
    $("#divallmessages").load('../default/allmessages.php');
  }
  else if (o == "alertas") {
    $("#divallalerts").load('../default/allalerts.php');
  }
}


function abrir(archivo,ref){
  switch (archivo) {

    //***********   Para sistema
    case "about":
    $("#divContenido").load('../../core/about/index.php');
    break;
    case "inM":
      messages();
        $("#divContenido").load('../../core/default/inicio.php');
      $('#ModalEnvioCorreo').modal('show');
      break;

    //***********    Para Clienes
    //---Para menu de inicio
    case "in":
      $("#divContenido").load('../../core/default/inicio.php');
      break;
    //---Para ingresar datos de clientes
    case "Clientes":
      $("#divContenido").load('../../core/clientes/index.php');
      break;
    //---Para Mostrar todos los clientes
    case "ListClientes":
      $("#divContenido").load('../../core/clientes/list.php');
      break;
    case "lcs":
        $("#divContenido").load('../../core/clientes/list.php');
      break;
    //----Para buscar clientes desde el menu
    case "csr":
        $("#divContenido").load('../clientes/templates/searchClient.php?ref='+ref);
      break;
    //---Para guardar documentos de un cliente
    case "lc":
      messages();
      $("#divContenido").load('../../core/clientes/list.php');
      $('#ModalCambioDocumentos').modal('show');
      break;
    //---Para borrar clientes y mandar mensaje
    case "lcd":
      $("#divContenido").load('../../core/clientes/list.php');
      $('#ModalBorrado').modal('show');
      break;
    case "im":
      messages();
      $("#divContenido").load('../../core/clientes/list.php');
      window.open("../../core/clientes/actions/imprimir.php?ref="+ref+"&f=d", "nombre de la ventana");
      break;
    case "imba":
      messages();
      $("#divContenido").load('../../core/clientes/list.php');
      window.open("../../core/clientes/actions/imprimir.php?ref="+ref+"&f=b", "nombre de la ventana");
      break;
    case "imbr":
      messages();
      $("#divContenido").load('../../core/clientes/list.php');
      window.open("../../core/clientes/actions/imprimir.php?ref="+ref+"&f=br", "nombre de la ventana");
      break;
    //---Para modificar un clientes
    case "cu":
      $("#divContenido").load('../../core/clientes/update.php?ref='+ref);
      break;
    //---Para campos faltantes en clientes
    case "cf":
    messages();
    $("#divContenido").load('../../core/clientes/aviso.php?ref='+ref);
      break;
    //---Para avanzar a los documentos de clientes
    case "cs":
    messages();
    $("#divContenido").load('../../core/clientes/documentos.php?ref='+ref);
      break;
    case "csA":
    messages();
    $("#divContenido").load('../../core/clientes/documentos.php?ref='+ref);
    $('#ModalCambioDocumentos').modal('show');
      break;

    //***********    Para directorio
    case "ListDirectory":
      $("#divContenido").load('../../core/contactos/directory.php');
      break;

    default:
    break;
  }
}
