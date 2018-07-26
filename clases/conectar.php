<?php
	//crear la clase conectar
class conectar {
	private $conn;

	public function conexion(){
		$conn = oci_connect('Anthony', '123', 'localhost/XE',"AL32UTF8");
		return $conn;
	}

}
 ?>
