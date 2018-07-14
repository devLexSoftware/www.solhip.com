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
          header("location:../www.solhip.com/core/templates/index.php?p=in");
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
<html lang="en">
<head>
	<title>Solidez Hipotecaria</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="../../www.solhip.com/recursos/login/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../www.solhip.com/recursos/login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../www.solhip.com/recursos/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../www.solhip.com/recursos/login/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../www.solhip.com/recursos/login/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../www.solhip.com/recursos/login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../www.solhip.com/recursos/login/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../www.solhip.com/recursos/login/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../www.solhip.com/recursos/login/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../www.solhip.com/recursos/login/css/util.css">
	<link rel="stylesheet" type="text/css" href="../../www.solhip.com/recursos/login/css/main.css">
<!--===============================================================================================-->
</head>
<body>

	<div class="limiter">
		<div class="container-login100" style="background-image: url('../../www.solhip.com/recursos/login/images/bg.png');">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
					<form class="login100-form validate-form" action="" method="post" autocomplete="off">
					<span class="login100-form-title p-b-49">
            Login
					</span>

					<div class="wrap-input100 validate-input m-b-23" data-validate = "Usuario requerido">
						<span class="label-input100">Usuario</span>
						<input class="input100" type="text" name="user1" placeholder="Escribe tu usuario">
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Password requerido">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="pass1" placeholder="Escribe tu password">
						<span class="focus-input100" data-symbol="&#xf190;"></span>
					</div>

					<div class="text-right p-t-8 p-b-31">
						<h4 style="color:#4a9ce8;"><?php if($message!="") { echo $message; } ?></h4>
					</div>

					<?php if (isset($failed_login_attempt) && $failed_login_attempt >= 3) { ?>
						<div class="wrap-input100 validate-input" data-validate="Captcha requerido">
							<span class="label-input100">Captcha</span>
							<input class="input100" type="text" name="captcha_code" placeholder="Letras de la imagen">
							<span class="focus-input100" data-symbol="&#xf190;"></span>
						</div>
					<?php } ?>

					<?php if (isset($failed_login_attempt) && $failed_login_attempt >= 3) { ?>
						<div class="text-right p-t-8 p-b-31"></div>
						<img src="captcha.php" style="position:relative; left:38%;"/>
						<div class="text-right p-t-8 p-b-31"></div>
					<?php } ?>

					<div class="container-login100-form-btn">
            <button class="btn btn-primary" style="width:90%;">
              Login
            </button>

					</div>

					<div class="flex-col-c p-t-50">

					</div>
				</form>
			</div>
		</div>
	</div>


	<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
	<script src="../../www.solhip.com/recursos/login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="../../www.solhip.com/recursos/login/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="../../www.solhip.com/recursos/login/vendor/bootstrap/js/popper.js"></script>
	<script src="../../www.solhip.com/recursos/login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="../../www.solhip.com/recursos/login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="../../www.solhip.com/recursos/login/vendor/daterangepicker/moment.min.js"></script>
	<script src="../../www.solhip.com/recursos/login/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="../../www.solhip.com/recursos/login/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="../../www.solhip.com/recursos/login/js/main.js"></script>

</body>
</html>
