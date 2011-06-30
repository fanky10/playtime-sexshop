<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

include_once 'data.php';
@include_once '../init.php';
@include_once ROOT_DIR .'/entidades/zona.php';
@include_once ROOT_DIR .'/util/utilidades.php';
/**
 * Description of zonas
 *
 * @author fanky
 */
class DataZonas extends Data {

    public function __construct() {
        parent::__construct();
    }
    public function getZonas($id_zona){
        $query = "select * from precio_zona_mensajeria".(($id_zona>1) ? " where id=".$id_zona : "");
        $result = mysql_query($query)
            or die ("Query Failed ".mysql_error());
        $zone_idx=0;
        $vZone;
        while($row = mysql_fetch_array($result,MYSQL_ASSOC)){

            $id = $row['id'];
            $nombre = $row['nombre_zona'];
            $precio = $row['precio'];

            $oZone = new Zona();
            $oZone->setId($id);
            $oZone->setNombre($nombre);
            $oZone->setPrecio($precio);


            $vZone[$zone_idx] = $oZone;
            $zone_idx = $zone_idx + 1;
        }
        $this->closeDB();
        return $vZone;
    }
    public function addZona(Zona $zona){
        $query = "INSERT INTO precio_zona_mensajeria ";
        $query .= "VALUES (null,".Utilidades::db_adapta_string($zona->getNombre()).
                ",".Utilidades::db_adapta_string(Utilidades::db_number($zona->getPrecio())).")";
        $results = mysql_query($query)
            or die ("<br/>addZona Failed: $query <br/>".mysql_error());
    }
    public function delZona(Zona $zona){
        $query = "DELETE FROM precio_zona_mensajeria ";
        $query .= " WHERE id = ".$zona->getId();
        $results = mysql_query($query)
            or die ("<br/>delZona Failed: $query <br/>".mysql_error());
    }
    public function updZona(Zona $zona){
        $query = "UPDATE precio_zona_mensajeria";
        $query .= " set nombre_zona=".Utilidades::db_adapta_string($zona->getNombre())
                .", precio = ".Utilidades::db_adapta_string(Utilidades::db_number($zona->getPrecio()))
                ." WHERE id = ".$zona->getId();
        $results = mysql_query($query)
            or die ("<br/>updZona Failed: $query <br/>".mysql_error());
        
    }
    public function getZona($id_zona){
        
        $query = "select * from precio_zona_mensajeria pzm".
            " WHERE pzm.id=$id_zona";
        $result = mysql_query($query)
            or die ("<br/>getZona Failed: $query <br/>".mysql_error());
        $row = mysql_fetch_array($result,MYSQL_ASSOC);
        $oZona = new Zona();
        
        $nombre = $row['nombre_zona'];
        $precio = $row["precio"];
        
        $oZona->setId($id_zona);
        $oZona->setNombre($nombre);
        $oZona->setPrecio($precio);       
        
        //lo devuelvo :P
        $this->closeDB($connection);
        return $oZona;
    }
}
?>
