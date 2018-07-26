<?php

class municipio extends conectar{
	private $db; 

 	public function __construct(){
      $this->db=parent::conexion();
   	}

   	public function getMunicipios(){
	    $row;
	   	$arreglo = array();
	    $sql = "SELECT * FROM municipio";
	   	$stid = oci_parse($this->db, $sql);
	   	oci_execute($stid);

	   	while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
		     $arreglo[]=$row;
		   }
		return $arreglo; 
    }
}

?>