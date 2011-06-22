<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include_once 'data.php';

/**
 *
 * @author fanky
 */
class DataImagenes extends Data {
    public function __construct() {
        parent::__construct();
    }
    
    public function insertImg($data){
        $query = "INSERT INTO imagen ";
        $query .= "(imagen) VALUES ('$data')";
        $result = mysql_query($query)
            or die ("Query Failed ".mysql_error());
    }
    public function getUltimoID(){
        $query = "select max(id_imagen) as ultimo_id from imagen";
        $result = mysql_query($query)
            or die ("Query Failed ".mysql_error());
        $id = -1;
        while($row = mysql_fetch_array($result,MYSQL_ASSOC)){

            $id = $row['ultimo_id'];
        }
//        $this->closeDB();
        return $id;
    }
    
}
?>
