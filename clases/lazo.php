<?php

class lazo extends conectar{
	private $db; 

 	public function __construct(){
      $this->db=parent::conexion();
   	}

    public function agregarLazo($idvictima,$tiempoRelacion,$idvinculo,$idagresor){
      $sql="INSERT INTO lazo (victima_idvictima,tiemporelacion,vinculo_idvinculo,agresor_idagresor) VALUES ('".$idvictima."','".$tiempoRelacion."', '".$idvinculo."', '".$idagresor."')";
      $stid = oci_parse($this->db, $sql);
      oci_execute($stid);
   
    }

    public function eliminarLazo($id){
      
      $sql="DELETE FROM lazo WHERE victima_idvictima ='".$id."'";
      $stid = oci_parse($this->db, $sql);
      oci_execute($stid);

   }

}

?>