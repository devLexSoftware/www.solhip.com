<?php
define('DB_SERVER','localhost');
define('DB_NAME','SolHip');
define('DB_USER','root');
define('DB_PASS','q1w2e3');

session_start();
$message="";
$captcha = true;

$usuario = $_POST[user1];
$password = $_POST[pass1];
$_SESSION['valida'] = 'false';

if(count($_POST)>0 && isset($_POST["captcha_code"]) && $_POST["captcha_code"]!=$_SESSION["captcha_code"]) {
  $captcha = false;
  $message = "Introduzca el código de Captcha correcto";
}


$con = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
if (mysqli_connect_errno()) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
else {
  $ip = $_SERVER['REMOTE_ADDR'];
  $result = mysqli_query($con,"SELECT count(ip) AS failed_login_attempt FROM failed_login WHERE ip = '$ip' AND fecha BETWEEN DATE_SUB( NOW() , INTERVAL 1 DAY ) AND NOW()");
  $row = mysqli_fetch_array($result);
  $failed_login_attempt = $row['failed_login_attempt'];


  if(count($_POST)>0 && $captcha == true) {
    $result = mysqli_query($con,"SELECT * FROM Usuarios WHERE usuario ='".$usuario."'");
    if($row = mysqli_fetch_array($result)){
      if($row['pass'] == $password){
        $id = $row['id'];
        session_start();
        $_SESSION['valida'] = "true";
        $_SESSION['usuario'] = $usuario;
        $_SESSION['nombre'] = $row['nombre'];
        $_SESSION['tipo'] = $row['tipo'];
        $_SESSION['foto'] = $row['img'];
        $_SESSION['uacceso'] = time();
        $result = mysqli_query($con,"INSERT INTO RegistroUsuarios(pk_Usuarios,usuario, estatus) values (".$id.",'".$_SESSION['usuario']."', 1)");
        $_SESSION['pk'] = mysqli_insert_id($con);
        $result = mysqli_query($con,"DELETE FROM failed_login WHERE ip = '$ip'");
          header("location:../core/templates/index.php?p=in");
    } } else {
      $message = "¡Usuario o contraseña invalido!";
      if ($failed_login_attempt < 3) {
          $result = mysqli_query($con,"INSERT INTO failed_login (ip,fecha) VALUES ('$ip', NOW())");
      } else {
        $message = "¡Usuario o contraseña invalido!";
      }
    }
  }
}


 ?>

<!DOCTYPE html>
<html lang="en" class="full-height">

<head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Solidez Hipotecaria</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="../../recursos/css/compiled.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../recursos/css/login.css">

  </head>

<body>

    <!--Main Navigation-->
    <header>

        <!--Intro Section-->
        <section class="view intro-2 hm-gradient">
            <div class="full-bg-img">
                <div class="container flex-center">
                  <div class="">
                  </div>
                    <div class="d-flex align-items-center content-height">
                        <div class="row flex-center pt-1 mt-1">
                            <div class="col-md-6 text-center text-md-left mb-1">
                                <div class="white-text">
                                    <h1 class="h1-responsive font-bold wow fadeInLeft" data-wow-delay="0.3s"></h1>
                                    <hr class="hr-light wow fadeInLeft" data-wow-delay="0.3s">
                                    <div class="message  wow fadeInLeft" style="width:1000px;" >
                                      <h4 style="color:#ffedae;"><?php if($message!="") { echo $message; } ?></h4>

                                    </div>
                                    <br>
                                </div>
                            </div>

                            <div class="col-md-6 col-xl-5 offset-xl-1">
                                <!--Form-->
                                <div class="card wow fadeInRight" data-wow-delay="0.3s">
                                    <div class="card-body">
                                        <!--Header-->
                                        <div class="text-center">
                                            <h3 class="white-text"><i class="fa fa-user white-text"></i> Login:</h3>
                                            <hr class="hr-light">
                                        </div>

                                        <form class="form" action="" method="post" autocomplete="off">
                                          <!--Body-->
                                          <div class="md-form">
                                              <i class="fa fa-user prefix white-text active"></i>
                                              <input type="text" id="form3" class="form-control"  autocomplete="off" name="user1">
                                              <label for="form3" class="active" >Nombre de usuario</label>
                                          </div>

                                          <div class="md-form">
                                              <i class="fa fa-lock prefix white-text active"></i>
                                              <input type="password" id="form4" class="form-control" autocomplete="off" name="pass1">
                                              <label for="form4" class="active">Password</label>
                                          </div>

                                            <?php if (isset($failed_login_attempt) && $failed_login_attempt >= 3) { ?>

                                              <div class="md-form">
                                                <i class="fa fa-ban prefix white-text active"></i>
                                                <input type="text" id="form4" class="form-control" autocomplete="off" name="captcha_code">
                                                <label for="form4" class="active">Captcha</label>


                                                <?php } ?>
                                                <div class="" style="text-align:center;">
                                                    <?php if (isset($failed_login_attempt) && $failed_login_attempt >= 3) { ?>
                                                      <img src="captcha.php" style="position:relative; left:38%;"/>
                                                    <?php } ?>
                                                <button class="btn btn-indigo" type="submit">Login</button>
                                                </div>

                                          </div>
                                        </form>


                                    </div>
                                </div>
                                <!--/.Form-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </header>
    <!--Main Navigation-->



    <!-- SCRIPTS -->
    <script type="text/javascript" src="../../recursos/js/compiled.min.js"></script>
    <script>
        new WOW().init();
    </script>

</body>

</html>
