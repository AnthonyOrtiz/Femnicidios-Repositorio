<?php
  

  $id = $_POST["id"];
  $idestado = $_POST["idestado"];

  require_once "../clases/agresor.php";
  $agresor = new agresor();

  $id = $agresor->eliminarAgresor($id,$idestado);

  echo $id;

?>