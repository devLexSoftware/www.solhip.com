function CBanco(banco) {
    var div = "";
    if (banco == "Santander" || banco == "BanRegio" || banco == "Afirme") {
        div = '  <p class="sMargen">Perfil</p>' +
            '<select class="form-control" name="cliPerfil" value="" placeholder="Perfil" onchange="CActividad(this.value)">' +
            '<option selected="true" disabled="disabled">Perfil</option>' +
            '<option value="Persona Moral">Persona Moral</option>' +
            '<option value="Hipotecario en Confinanciamiento">Hipotecario en Confinanciamiento</option>' +
            '<option value="Hipotecario Persona Fisica con Actividad Independiente">Hipotecario Persona Fisica con Actividad Independiente</option>' +
            '<option value="Hipotecario Salario Fijo">Hipotecario Salario Fijo</option>' +
            '<option value="COFINAVIT">COFINAVIT</option>' +
            '<option value="Hipotecario Persona Fisica con Actividad Empresarial">Hipotecario Persona Fisica con Actividad Empresarial</option>' +
            '<option value="Hipotecario Pensión">Hipotecario Pensión</option>' +
            '<option value="Hipotecario Pensión">Hipotecario Pensión</option>' +
            '</select>' +
            '<span id="error" class="invalid-feedback"></span>';
    } else {
        div = '  <p class="sMargen">Perfil</p>' +
            '<select class="form-control" name="cliPerfil" value="" placeholder="Perfil">' +
            '<option selected="true" disabled="disabled">Perfil</option>' +
            '<option value="Hipotecario en Confinanciamiento">Hipotecario en Confinanciamiento</option>' +
            '<option value="Hipotecario Persona Fisica con Actividad Independiente">Hipotecario Persona Fisica con Actividad Independiente</option>' +
            '<option value="Hipotecario Salario Fijo">Hipotecario Salario Fijo</option>' +
            '<option value="COFINAVIT">COFINAVIT</option>' +
            '<option value="Hipotecario Persona Fisica con Actividad Empresarial">Hipotecario Persona Fisica con Actividad Empresarial</option>' +
            '<option value="Hipotecario Pensión">Hipotecario Pensión</option>' +
            '<option value="Hipotecario Pensión">Hipotecario Pensión</option>' +
            '</select>' +
            '<span id="error" class="invalid-feedback"></span>';
    }
    //--Para actualizar perfil
    $("#divPerfil").html(div);
}

function CActividad(perfil) {
    var act = "";
    if (perfil == "Persona Moral" && document.getElementById('idBanco').value == "BanRegio") {
        act = '<p class="sMargen">Actividad Económica</p>' +
            '<select class="form-control" name="cliActividad" value="" placeholder="Actividad">' +
            '<option selected="true" disabled="disabled">Actividad</option>' +
            '<option value="Asalariados">Asalariados</option>' +
            '<option value="Honorarios">Honorarios</option>' +
            '<option value="Persona Fisica Actividad Emp">Persona Fisica Actividad Emp</option>' +
            '<option value="Persona Fisica Accionista">Persona Fisica Accionista</option>' +
            '<option value="Arrendadores">Arrendadores</option>' +
            '<option value="EC Informall">EC. Informal</option>' +
            '<option selected="true" disabled="disabled">Complementos</option>' +
            '<option value="PM del Accionista">PM del Accionista</option>' +
            '<option value="Aval">Aval</option>' +
            '</select>';
    } else {
        act = "";
    }
    //--Para elegir BanRegio
    $("#divActividad").html(act);
}



function del(re, nombre) {
    $.ajax({
        type: 'POST', //aqui puede ser igual get
        url: '../clientes/actions/deleteClient.php', //aqui va tu direccion donde esta tu funcion php
        data: { ref: re, nom: nombre }, //aqui tus datos
        success: function(data) {
            location.href = "index.php?p=lcd&ref=" + nombre
        },
        error: function(data) {
            alert('Hubo algun error, intente nuevamente')
        }
    });
}

function CDependientes(cant) {
    var count = 0;
    var cadena = "";
    var par = "cliContactoParentezco";
    var eda = "cliContactoEdad";
    while (count < cant) {
        cadena = cadena +
            '<div class="form-group row"> ' +
            '<div class="form-group col-md-3"> ' +
            '<p class="sMargen">Parentezco</p> ' +
            '<select class="form-control" name=' + par + count + ' value="" placeholder="Parentezco"> ' +
            '<option selected="selected">Parentezco</option> ' +
            '<option>Padre</option> ' +
            '<option>Madre</option> ' +
            '<option>Hijo</option> ' +
            '<option>Hija</option> ' +
            '<option>Primo</option> ' +
            '<option>Prima</option> ' +
            '<option>Abuelo</option> ' +
            '<option>Abuela</option> ' +
            '<option>Otro</option> ' +
            '</select>' +
            '</div> ' +
            '<div class="form-group col-md-1"> ' +
            '<p class="sMargen">Edad</p> ' +
            '<input class="form-control" type="number" name=' + eda + count + ' value="" placeholder="Edad" required> ' +
            '</div>' +
            '</div>';
        count++;
    }
    $("#divDependientes").html(cadena);
}

function CDocumentos(cant) {
    var count = 1;
    var cadena = "";
    var par = "cliDocument";
    while (count <= cant) {
        cadena = cadena +
            '<p class="sMargen">Documento:' + count + '</p> ' +
            '<input class="form-group" type="file" name="' + par + count + '" value="">';
        count++;

    }
    $("#divNDocumentos").html(cadena);
}

function CBorrar(doc, ref) {
    var confirmacion = confirm("¿Quieres borrar el documento seleccionado?");
    if (confirmacion == true) {
        var ref = ref;
        $.post("../clientes/templates/filesClients.php", { documento: doc, ref: ref }, function(data) {
            $("#divfiles").html(data);
        });
    }

}

function CDependientesUpdate() {
    document.getElementById('divDependientesOriginales1').innerHTML = "";
    document.getElementById('divDependientesOriginales2').innerHTML = "";

    document.getElementById('divContenidoDependientes').innerHTML = '<div class="form-group row">' +

        '<div class="form-group col-md-2">' +
        '<p class="sMargen">Dependientes Económicos</p>' +
        '<select class="form-control" name="cliNDependientes" value="0" placeholder="Dependientes" onchange="CDependientes(this.value)">' +
        '<option value="0">0</option>' +
        '<option value="1">1</option>' +
        '<option value="2">2</option>' +
        '<option value="3">3</option>' +
        '<option value="4">4</option>' +
        '<option value="5">5</option>' +
        '<option value="6">6</option>' +
        '<option value="7">7</option>' +
        '<option value="8">8</option>' +
        '</select>' +
        '</div>' +
        '</div>' +
        '<div id="divDependientes">' +
        '</div>';
}

function buscarCliente() {
    location.href = "index.php?p=csr&ref=" + $('#idfilName').val();
}


function filtrarListaClientes() {
    var filtro = "";
    var campo = "";
    var and = 0;
    if ($('#idfilNombre').val() != "") {
        var res = $('#idfilNombre').val();
        campo = " MATCH(Clientes.find) AGAINST('" + res + "')";
        //filtro.push(campo);
        filtro = filtro + campo;
        and++;
    }
    campo = "";
    if ($('#idfilEstatus').val() != "Todos") {
        if (and != 0)
            campo = " AND";
        campo = campo + " Clientes.estado= '" + $('#idfilEstatus').val() + "'";
        filtro = filtro + campo;
        and++;
    }
    campo = "";
    if ($('#idfilBanco').val() != "Todos") {
        if (and != 0)
            campo = " AND";
        campo = campo + " PerfilCliente.banco= '" + $('#idfilBanco').val() + "'";
        filtro = filtro + campo;
        //filtro.push($('#idfilBanco').val());
        and++;
    }
    campo = "";
    if ($('#idfilPerfil').val() != "Todos") {
        if (and != 0)
            campo = " AND";
        campo = campo + " PerfilCliente.nombre= '" + $('#idfilPerfil').val() + "'";
        filtro = filtro + campo;
        //filtro.push($('#idfilBanco').val());
        and++;
    }
    $.post("../clientes/templates/tableClientes.php", { filtro: filtro }, function(data) {
        $("#divTableClientes").html(data);
        $('#tableList').DataTable();
    });

}



function enviarDatosEmpleado() {

    //div donde se mostrará lo resultados
    divResultado = document.getElementById('resultado');
    //recogemos los valores de los inputs

    //--Informacion principal
    cliNombre = document.Cliente.cliNombre.value;
    cliApellido = document.Cliente.cliApellido.value;
    cliNss = document.Cliente.cliNss.value;
    cliRfc = document.Cliente.cliRfc.value;
    cliFechNacimiento = document.Cliente.cliFechNacimiento.value;
    cliNivAcademico = document.Cliente.cliNivAcademico.value;

    //--Informacion direccion
    cliCalle = document.Cliente.cliCalle.value;
    cliColonia = document.Cliente.cliColonia.value;
    cliNumExt = document.Cliente.cliNumExt.value;
    cliNumInt = document.Cliente.cliNumInt.value;
    cliCP = document.Cliente.cliCP.value;
    cliAntiguedad = document.Cliente.cliAntiguedad.value;
    cliTipo = document.Cliente.cliTipo.value;

    //--Informacion localizacion
    cliTelCasa = document.Cliente.cliTelCasa.value;
    cliTelMovil = document.Cliente.cliTelMovil.value;
    cliEmail = document.Cliente.cliEmail.value;

    //--Informacion laboral
    cliEmail = document.Cliente.cliEmail.value;
    cliEmail = document.Cliente.cliEmail.value;
    cliEmail = document.Cliente.cliEmail.value;


    //instanciamos el objetoAjax
    ajax = objetoAjax();

    //uso del medotod POST
    //archivo que realizará la operacion
    //registro.php
    ajax.open("POST", "registro.php", true);
    //cuando el objeto XMLHttpRequest cambia de estado, la función se inicia
    ajax.onreadystatechange = function() {
        //la función responseText tiene todos los datos pedidos al servidor
        if (ajax.readyState == 4) {
            //mostrar resultados en esta capa
            divResultado.innerHTML = ajax.responseText
                //llamar a funcion para limpiar los inputs
            LimpiarCampos();
        }
    }
    ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    //enviando los valores a registro.php para que inserte los datos
    ajax.send("nombre=" + nom + "&apellido=" + ape + "&web=" + web)
}