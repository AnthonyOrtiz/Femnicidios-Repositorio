<?php

class estadoAgresor extends conectar{
	private $db; 

 	public function __construct(){
      $this->db=parent::conexion();
   	}

   	public function getEstadosAgresor(){
	    $row;
	   	$arreglo = array();
	    $sql = "SELECT * FROM estado_agresor e";
	   	//$stid = oci_parse($this->db, 'SELECT * FROM victima');
	   	$stid = oci_parse($this->db, $sql);
	   	oci_execute($stid);

	   	while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
		     $arreglo[]=$row;
		   }
		return $arreglo; 
    }

    public function agregarEstadoAgresor($idestado,$concepto,$descripcion){
      $sql="INSERT INTO estado_agresor (idestado,concepto,descripcion) VALUES ('".$idestado."','".$concepto."', '".$descripcion."')";
      $stid = oci_parse($this->db, $sql);
      oci_execute($stid);
   
    }

}

?>