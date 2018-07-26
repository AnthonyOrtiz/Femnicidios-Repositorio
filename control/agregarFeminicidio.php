<?php  

  $idfeminicidio = $_POST["idfeminicidio"];
  $fecha = $_POST["fecha"];
  $hora = $_POST["hora"];
  $detalle = $_POST["detalle"];
  $tipoAsesinato = $_POST["tipoAsesinato"];
  $iddirecccion = $_POST["iddirecccion"];
  $descripcion = $_POST["descripcion"];
  $idmunicipio = $_POST["idmunicipio"];
  $idvictima = $_POST["idvictima"];
  $idagresor = $_POST["idagresor"];
  $idvinculo = $_POST["idvinculo"];
  $tiempoRelacion = $_POST["tiempoRelacion"];


  $fecha = date('d/M/Y',strtotime($fecha)); 

  require_once "../clases/feminicidio.php";
  require_once "../clases/direccion.php";
  require_once "../clases/lazo.php";

  $lazo = new lazo();
  $lazo->agregarLazo($idvictima,$tiempoRelacion,$idvinculo,$idagresor);

  $direccion = new direccion();
  $direccion->agregarDireccion($iddirecccion,$descripcion,$idmunicipio);


  $feminicidio = new feminicidio();
  $feminicidio->agregarFeminicidio($idfeminicidio,$fecha,$hora,$detalle,$tipoAsesinato,$iddirecccion,$idvictima,$idagresor);
  
?>