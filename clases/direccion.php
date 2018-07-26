<?php

class direccion extends conectar{
	private $db; 

 	public function __construct(){
      $this->db=parent::conexion();
   	}

    public function agregarDireccion($iddireccion,$descripcion,$idmunicipio){
      $sql="INSERT INTO direccion (iddireccion,descripcion,municipio_idmunicipio) VALUES ('".$iddireccion."','".$descripcion."', '".$idmunicipio."')";
      $stid = oci_parse($this->db, $sql);
      oci_execute($stid);
   
    }

    public function eliminarDireccion($id){
      
      $sql="DELETE FROM direccion WHERE iddireccion ='".$id."'";
      $stid = oci_parse($this->db, $sql);
      oci_execute($stid);

   }

}

?>