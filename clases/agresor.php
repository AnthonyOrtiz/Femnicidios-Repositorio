<?php 
require_once("conectar.php");

 class agresor extends conectar{
 	private $db; 

 	public function __construct(){
      $this->db=parent::conexion();
   }

   public function getAgresores(){
	   $row;
   	$arreglo = array();
      $sql = "SELECT a.idagresor, a.nombres, a.apellidos, a.edad, a.ocupacion, a.atecedentes, a.estado_agresor_idestado, e.concepto, n.nombre FROM agresor a, nacionalidad n, estado_agresor e where a.nacionalidad_idnacionalidad = n.idnacionalidad and a.estado_agresor_idestado = e.idestado and a.nacionalidad_idnacionalidad = n.idnacionalidad";
   	//$stid = oci_parse($this->db, 'SELECT * FROM victima');
   	$stid = oci_parse($this->db, $sql);
   	oci_execute($stid);

   	while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
	     $arreglo[]=$row;
	   }
	 return $arreglo; 
   }

   public function actualizarAgresor($id,$nombres,$apellidos,$edad,$ocupacion,$atencedentes,$estadoAgresor,$nacionalidad){
      
      $sql="UPDATE agresor SET nombres='".$nombres."', apellidos='".$apellidos."', edad='".$edad."', ocupacion='".$ocupacion."', atecedentes= '".$atencedentes."', nacionalidad_idnacionalidad='".$nacionalidad."' WHERE idagresor = '".$id."'";

      $stid = oci_parse($this->db, $sql);
      oci_execute($stid, OCI_COMMIT_ON_SUCCESS);

      $sql="UPDATE estado_agresor SET concepto='".$estadoAgresor."' WHERE idestado = (select estado_agresor_idestado from agresor where idagresor = '".$id."')";

      $stid = oci_parse($this->db, $sql);
      oci_execute($stid);

   }

   public function agregarAgresor($id,$nombres,$apellidos,$edad,$ocupacion,$atecedentes,$idestado,$nacionalidad){
      $sql="INSERT INTO agresor (idagresor,nombres,apellidos,edad,ocupacion,atecedentes,estado_agresor_idestado,nacionalidad_idnacionalidad)VALUES ('".$id."','".$nombres."', '".$apellidos."',".$edad.",'".$ocupacion."','".$atecedentes."','".$idestado."','".$nacionalidad."')";
      $stid = oci_parse($this->db, $sql);
      oci_execute($stid);
   }

   public function eliminarAgresor($id,$idestado){
      
      $sql="DELETE FROM agresor WHERE idagresor ='".$id."'";
      $stid = oci_parse($this->db, $sql);
      oci_execute($stid, OCI_COMMIT_ON_SUCCESS);

      $sql="DELETE FROM estado_agresor WHERE idestado = '".$idestado."'";
      $stid = oci_parse($this->db, $sql);
      oci_execute($stid);
   }

 }
?>