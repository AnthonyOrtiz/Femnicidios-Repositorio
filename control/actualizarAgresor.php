<?php
  session_start();
  

  $id = $_POST["id"];
  $nombres = $_POST["nombres"];
  $apellidos = $_POST["apellidos"];
  $edad = $_POST["edad"];
  $ocupacion = $_POST["ocupacion"];
  $atencedentes = $_POST["atencedentes"];
  $estadoAgresor = $_POST["estadoAgresor"];
  $nacionalidad = $_POST["nacionalidad"];
  
  require_once "../clases/agresor.php";
  $agresor = new agresor();

  $agresor->actualizarAgresor($id,$nombres,$apellidos,$edad,$ocupacion,$atencedentes,$estadoAgresor,$nacionalidad);

?>