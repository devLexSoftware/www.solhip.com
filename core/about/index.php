<?php include("../config/bloque.php"); ?>
<div class="container-fluid">

  <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="index.php?p=in">Inicio</a>
    </li>
    <li class="breadcrumb-item active">Acerca</li>
  </ol>


  <h1>Contacto</h1>
  <hr>

  <form role="form-horizontal" method="post" action="../about/actions/email.php" id="formContacto" autocomplete="off" name="Contacto">

    <div class="form-group row ">
      <div class="form-group col-md-10">
        <p>Lex Software esta para ayudarte con tu trabajo, es por ello que si encuentras algun problema o tienes dudas sobre funcionamiento de tu sistema, tienes los siguientes formas para contactarnos:</p>
      </div>
      <div class="form-group col-md-6">
        <h6>Correo: soportelexsoftware@gmail.com</h6>
        <h6>Teléfono contacto: 462-146-7027</h6>
        <h6>Teléfono desarrollo: 462-629-4473</h6>
      </div>
      <div class="form-group col-md-4">
        <img src="../../../recursos/img/sistema/logoLex.jpg" style="width:50%;" alt="">
      </div>
    </div>
    <hr>
    <div class="form-group row ">
      <div class="form-group col-md-5">
        <p class="sMargen">Manda tus comentarios o problemas, nuestro equipo se pondra en contacto</p>
        <textarea class="form-control" name="cliEmail" rows="3" cols="50"></textarea>
      </div>
    </div>

    <div class="form-group row ">
      <div class="form-group col-md-5">
        <p class="sMargen"  style="color:#949494">Enviar</p>
        <button type="submit" class="btn btn-primary" name="button">Correo</button>
      </div>
    </div>

  </form>
