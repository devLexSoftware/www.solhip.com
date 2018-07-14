<?php
  $count = 1;
  $ref = $_POST['ref'];
  $documento = $_POST['documento'];
  $ruta = "../../../file/clients/".$ref;

  unlink($ruta."/".$documento);

  $directorio = opendir($ruta); //ruta actual
  while ($archivo = readdir($directorio)) //obtenemos un archivo y luego otro sucesivamente
      if (!is_dir($archivo)){//verificamos si es o no un directorio
        echo $count.'.- <a target="_blank" href="'.$ruta.'/'.$archivo.'" >'.$archivo.'  </a> ';
        echo '----------<button style="color:red;" class="btn btn-link" type="button" name="'.$archivo.'" onclick="CBorrar(this.name)">Borrar</button>';
        echo "<br>";
        $count++;
      }
?>
