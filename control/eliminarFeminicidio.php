<?php  

  $idfeminicidio = $_POST["idfeminicidio"];
  $iddirecccion = $_POST["iddirecccion"];
  $lazovictima = $_POST["lazovictima"];

  require_once "../clases/feminicidio.php";
  require_once "../clases/direccion.php";
  require_once "../clases/lazo.php";

  $feminicidio = new feminicidio();
  $feminicidio->eliminarFeminicidio($idfeminicidio);

  $lazo = new lazo();
  $lazo->eliminarLazo($lazovictima);

  $direccion = new direccion();
  $direccion->eliminarDireccion($iddirecccion);

  echo $idfeminicidio,$iddirecccion,$lazovictima;
  
?>