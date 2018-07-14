// JavaScript Validación
$('document').ready(function(){
  // Validación para campos de texto exclusivo, sin caracteres especiales ni números
  var nameregex = /^[a-zA-Z ]+$/;
  $.validator.addMethod("validname", function( value, element ) {
    return this.optional( element ) || nameregex.test( value );
  });

  // Máscara para validación de Email
  var eregex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  $.validator.addMethod("validemail", function( value, element ) {
    return this.optional( element ) || eregex.test( value );
  });

  $("#formCliente").validate({
    rules:
    {

//--Validación para informacion principal
      cliNombre: {
        required: true,
        validname: true,
        minlength: 1
      },
      cliApellido: {
        required: true,
        validname: true,
        minlength: 1
      },
      cliNss: {
        minlength: 9,
        maxlength: 12
      },
      cliRfc: {
        minlength: 10,
        maxlength: 16
      },
      cliFechNacimiento:{
        required: true
      },
      cliNivAcademico: {
        validname: true
      },
//--Validación para informacion direccion
      cliCalle: {
        required: true
      },
      cliColonia: {
        required: true
      },
      cliNumExt: {
        required: true
      },
      cliCP: {
      },
      cliAntiguedad: {
        required: true
      },
//--Validación para informacion localizacion
      cliTelCasa: {
        required: true
      },
      cliTelMovil: {
      },
      cliEmail: {
        validemail: true,
        required: true
      },
//--Validación para Información empresa
      cliEmpresaNombre: {
        minlength: 4
      },
      cliEmpresaPuesto: {
        validname: true,
        minlength: 1
      },
      cliEmpresaCalle: {
        minlength: 4
      },
      cliEmpresaColonia: {
        minlength: 4
      },
      cliEmpresaCP: {
        minlength: 4
      },
      cliEmpresaAnt: {
      },
//--Validacion para referencias
      CliRefNombre0:{
        validname: true,
        minlength: 4
      },
      CliRefApellido0:{
        validname: true,
        minlength: 4
      },
      CliRefNombre1:{
        validname: true,
        minlength: 4
      },
      CliRefApellido1:{
        validname: true,
        minlength: 4
      },
      CliRefNombre2:{
        validname: true,
        minlength: 4
      },
      CliRefApellido2:{
        validname: true,
        minlength: 4
      },
      CliRefNombre3:{
        validname: true,
        minlength: 4
      },
      CliRefApellido3:{
        validname: true,
        minlength: 4
      }

    },


//--Mensaje para Perfil

//--Mensajes para informacion principal
    messages:
    {
      cliNombre: {
       required: "Ingresa nombre(s)",
       validname: "El nombre contiene caracteres no permitidos",
       minlength: "El nombre es demasiado corto"
      },
      cliApellido: {
        required: "Ingresa apellido(s)",
        validname: "El apellido contiene caracteres no permitidos",
        minlength: "El apellido es demasiado corto"
      },
      cliNss: {
        maxlength: "NSS muy largo",
        minlength: "NSS muy corto"
      },
      cliRfc: {
        maxlength: "RFC muy largo",
        minlength: "RFC muy corto"
      },
//--Mensajes para informacion direccion
      cliCalle: {
        required: "Ingresa la calle"
      },
      cliColonia: {
        required: "Ingresa la colonia"
      },
      cliNumExt: {
        required: "Ingresa un número"
      },
      cliAntiguedad: {
        required: "Ingresa la antigüedad"
      },
//--Mensajes para informacion localizacion
      cliTelCasa: {
        required: "Ingresa un número de localización",
        minlength: "Número muy largo",
        maxlength: "Número muy corto"
      },
      cliEmail: {
        validemail: "Introduzca correctamente su correo",
        required: "Ingresa un correo de localización"
      },
//--Mensajes para informacion de empresa
      cliEmpresaNombre: {
        minlength: "El nombre es demasiado corto"
      },
      cliEmpresaPuesto: {
        validname: "El nombre contiene caracteres no permitidos",
        minlength: "El nombre es demasiado corto"
      },
      cliEmpresaCalle: {
        minlength: "El nombre es demasiado corto"
      },
      cliEmpresaColonia: {
        minlength: "El nombre es demasiado corto"
      },
      cliEmpresaCP: {
        minlength: "El nombre es demasiado corto"
      },
      cliEmpresaAnt: {
      },
      //--Validacion para referencias
      CliRefNombre0:{
        validname: "El nombre contiene caracteres no permitidos",
        minlength: "El nombre es demasiado corto"
      },
      CliRefApellido0:{
        validname: "El apellido contiene caracteres no permitidos",
        minlength: "El apellido es demasiado corto"
      },
      CliRefNombre1:{
        validname: "El nombre contiene caracteres no permitidos",
        minlength: "El nombre es demasiado corto"
      },
      CliRefApellido1:{
        validname: "El apellido contiene caracteres no permitidos",
        minlength: "El apellido es demasiado corto"
      },
      CliRefNombre2:{
        validname: "El nombre contiene caracteres no permitidos",
        minlength: "El nombre es demasiado corto"
      },
      CliRefApellido2:{
        validname: "El apellido contiene caracteres no permitidos",
        minlength: "El apellido es demasiado corto"
      },
      CliRefNombre3:{
        validname: "El nombre contiene caracteres no permitidos",
        minlength: "El nombre es demasiado corto"
      },
      CliRefApellido3:{
        validname: "El apellido contiene caracteres no permitidos",
        minlength: "El apellido es demasiado corto"
      }
    },


    errorPlacement : function(error, element) {
      $(element).closest('.form-group').find('.invalid-feedback').html(error.html());
    },
    highlight : function(element) {
      $(element).closest('.form-control').removeClass('is-valid').addClass('is-invalid');
    },
    unhighlight: function(element, errorClass, validClass) {
      $(element).closest('.form-control').removeClass('is-invalid').addClass('is-valid');
      $(element).closest('.form-group').find('.invalid-feedback').html('');
    },

    submitHandler: function(form) {
      query=window.location.search.substring(1);
      q=query.split("&");
      vars=[];
      for(i=0;i<q.length;i++){
        x=q[i].split("=");
        k=x[0];
        v=x[1];
        vars[k]=v;
      }

      switch (form.name) {
        case "Cliente":
          form.action="../clientes/actions/newCliente.php";
          break;
        case "ClienteUpdate":
          form.action="../clientes/actions/updateCliente.php?ref="+vars['ref'];
          break;
        default:

      }
      form.submit();
    }
  });
})
