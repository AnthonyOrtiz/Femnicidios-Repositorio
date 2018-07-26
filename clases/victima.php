<?php 
require_once("conectar.php");

 class victima extends conectar{
 	private $db; 

 	public function __construct(){
      $this->db=parent::conexion();
   }

   public function getVictimas(){
	   $row;
   	$arreglo = array();
      $sql = "SELECT v.idvictima, v.nombres, v.apellidos, v.edad, v.ocupacion, n.nombre FROM victima v, nacionalidad n where v.nacionalidad_idnacionalidad = n.idnacionalidad";
   	//$stid = oci_parse($this->db, 'SELECT * FROM victima');
   	$stid = oci_parse($this->db, $sql);
   	oci_execute($stid);

   	while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
	     $arreglo[]=$row;
	   }
	 return $arreglo; 
   }

   public function actualizarVictima($id,$nombres,$apellidos,$edad,$ocupacion,$nacionalidad){
      
      $sql="UPDATE victima SET nombres='".$nombres."', apellidos='".$apellidos."', edad='".$edad."', ocupacion='".$ocupacion."', nacionalidad_idnacionalidad='".$nacionalidad."' WHERE idvictima = '".$id."'";
      $stid = oci_parse($this->db, $sql);
      oci_execute($stid);
   }

   public function agregarVictima($id,$nombres,$apellidos,$edad,$ocupacion,$nacionalidad){
      $sql="INSERT INTO victima (idvictima,nombres,apellidos,edad,ocupacion,nacionalidad_idnacionalidad)VALUES ('".$id."','".$nombres."', '".$apellidos."',".$edad.",'".$ocupacion."','".$nacionalidad."')";
      $stid = oci_parse($this->db, $sql);
      oci_execute($stid);

   }

   public function eliminarVictima($id){
      $sql="DELETE FROM victima WHERE idvictima ='".$id."'";

      $stid = oci_parse($this->db, $sql);
      oci_execute($stid);
   }

 }
?>