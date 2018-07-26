<?php
  

  $id = $_POST["id"];
  $nombres = $_POST["nombres"];
  $apellidos = $_POST["apellidos"];
  $edad = $_POST["edad"];
  $ocupacion = $_POST["ocupacion"];
  $nacionalidad = $_POST["nacionalidad"];

  require_once "../clases/victima.php";
  $victima = new victima();

  $victima->agregarVictima($id,$nombres,$apellidos,$edad,$ocupacion,$nacionalidad);

  echo $nacionalidad;

?>