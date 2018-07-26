<?php

class nacionalidad extends conectar{
	private $db; 

 	public function __construct(){
      $this->db=parent::conexion();
   	}

   	public function getNacionalidades(){
	    $row;
	   	$arreglo = array();
	    $sql = "SELECT n.idnacionalidad, n.nombre FROM nacionalidad n";
	   	//$stid = oci_parse($this->db, 'SELECT * FROM victima');
	   	$stid = oci_parse($this->db, $sql);
	   	oci_execute($stid);

	   	while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
		     $arreglo[]=$row;
		   }
		return $arreglo; 
    }
}

?>