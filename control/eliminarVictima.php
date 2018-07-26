<?php
  

  $id = $_POST["id"];

  require_once "../clases/victima.php";
  $victima = new victima();

  $victima->eliminarVictima($id);


?>