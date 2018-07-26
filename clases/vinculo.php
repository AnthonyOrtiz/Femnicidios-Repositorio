<?php

class vinculo extends conectar{
	private $db; 

 	public function __construct(){
      $this->db=parent::conexion();
   	}

   	public function getVinculos(){
	    $row;
	   	$arreglo = array();
	    $sql = "SELECT * FROM vinculo";
	   	$stid = oci_parse($this->db, $sql);
	   	oci_execute($stid);

	   	while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
		     $arreglo[]=$row;
		   }
		return $arreglo; 
    }
}

?>