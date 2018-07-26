<?php  

  $id = $_POST["id"];
  $fecha = $_POST["fecha"];
  $hora = $_POST["hora"];
  $detalle = $_POST["detalle"];
  $tipoAsesinato = $_POST["tipoAsesinato"];

  $fecha = date('d/M/Y',strtotime($fecha)); 

  require_once "../clases/feminicidio.php";
  $feminicidio = new feminicidio();
  $feminicidio->actualizarFeminicidio($id,$fecha,$hora,$detalle,$tipoAsesinato);


?>