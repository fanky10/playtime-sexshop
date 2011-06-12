<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

include_once 'data.php';
@include_once '../init.php';
@include_once ROOT_DIR .'/entidades/zona.php';
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
}
?>
