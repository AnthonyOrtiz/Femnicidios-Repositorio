<?php 
require_once("conectar.php");

 class feminicidio extends conectar{
 	private $db; 

 	public function __construct(){
      $this->db=parent::conexion();
   }

   public function getFeminicidios(){
	   $row;
   	$arreglo = array();
      $sql = "SELECT f.idfeminicidio, f.fecha, f.hora, f.detalle, t.descripcion, f.tipoasesinato_tipoasesinato, f.direccion_iddireccion, f.lazo_victima_idvictima FROM feminicidio f, tipoasesinato t WHERE f.tipoasesinato_tipoasesinato = t.tipoasesinato";
   	$stid = oci_parse($this->db, $sql);
   	oci_execute($stid);

   	while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
	     $arreglo[]=$row;
	   }
	 return $arreglo; 
   }

   public function actualizarFeminicidio($id,$fecha,$hora,$detalle,$tipoAsesinato){
      
      $sql="UPDATE feminicidio SET fecha='".$fecha."', hora='".$hora."', detalle='".$detalle."', tipoasesinato_tipoasesinato='".$tipoAsesinato."' WHERE idfeminicidio = '".$id."'";

      $stid = oci_parse($this->db, $sql);
      oci_execute($stid);

   }

   public function agregarFeminicidio($idfeminicidio,$fecha,$hora,$detalle,$tipoAsesinato,$iddirecccion,$idvictima,$idagresor){
      $sql="INSERT INTO feminicidio (idfeminicidio,fecha,hora,detalle,tipoasesinato_tipoasesinato,direccion_iddireccion,lazo_victima_idvictima,lazo_agresor_idagresor)VALUES ('".$idfeminicidio."','".$fecha."', '".$hora."',".$detalle.",'".$tipoAsesinato."','".$iddirecccion."','".$idvictima."','".$idagresor."')";
      $stid = oci_parse($this->db, $sql);
      oci_execute($stid);
   }

   public function eliminarFeminicidio($id){
      
      $sql="DELETE FROM feminicidio WHERE idfeminicidio ='".$id."'";
      $stid = oci_parse($this->db, $sql);
      oci_execute($stid);
   }

   public function getVictimas(){
      //$sql="SELECT v.idvictima, v.nombres FROM victima v, lazo l where v.idvictima = l.victima_idvictima";
      $sql="SELECT * FROM victima WHERE Not idvictima IN (SELECT  victima_idvictima FROM lazo)";
      $stid = oci_parse($this->db, $sql);
      oci_execute($stid);

      while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
        $arreglo[]=$row;
      }
    return $arreglo; 
   }

   public function getAgresores(){
      $sql="SELECT * FROM agresor WHERE Not idagresor IN (SELECT agresor_idagresor FROM lazo)";
      $stid = oci_parse($this->db, $sql);
      oci_execute($stid);

      while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
        $arreglo[]=$row;
      }
    return $arreglo; 
   }

 }
?>