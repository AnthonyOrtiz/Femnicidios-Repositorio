<?php
  

  $id = $_POST["id"];
  $nombres = $_POST["nombres"];
  $apellidos = $_POST["apellidos"];
  $edad = $_POST["edad"];
  $ocupacion = $_POST["ocupacion"];
  $atecedentes = $_POST["atecedentes"];
  $nacionalidad = $_POST["nacionalidad"];
  $idestado = $_POST["idestado"];
  $concepto = $_POST["concepto"];
  $descripcion = $_POST["descripcion"];

  
  require_once "../clases/agresor.php";
  require_once "../clases/estadoAgresor.php";
  
  $agresor = new agresor();
  $estadoAgresor = new estadoAgresor();

  
  $estadoAgresor->agregarEstadoAgresor($idestado,$concepto,$descripcion);
  $agresor->agregarAgresor($id,$nombres,$apellidos,$edad,$ocupacion,$atecedentes,$idestado,$nacionalidad);


?>