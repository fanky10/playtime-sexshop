<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include_once 'data.php';
include_once './entidades/categoria.php';
/**
 * Description of categorias
 *
 * @author fanky
 */
class DataCategorias extends Data{
    public function __construct() {
        parent::__construct();
    }
    public function getCategoria($id_categoria){
        $query = "SELECT c.id as id_categoria, nombre FROM categoria c".
            " WHERE c.habilitada=1 and id=$id_categoria";
        $result = mysql_query($query)
            or die ("getCategorias Query Failed: ".mysql_error()."<br/>");
        $row = mysql_fetch_array($result,MYSQL_ASSOC);
        $oCategoria = new Categoria();
        //cargo los datos del producto
        $id_cat = $row['id_categoria'];
        $nombre = $row['nombre'];

        $oCategoria->setId_Categoria($id_cat);
        $oCategoria->setNombre($nombre);
        //lo devuelvo :P
        $this->closeDB($connection);
        return $oCategoria;
    }
    /*
     * retorna todas aquellas categorias habilitadas
     */
    public function getCategoriasHabilitadas(){
        $query = "SELECT c.id as id_categoria, nombre FROM categoria c".
            " WHERE c.habilitada=1";
        return $this->getCategorias($query);
    }
    /*
     * este metodo devuelve todas las categorias de una categoria
     */
    public function getSubCategorias($id_categoria){

        $query = "SELECT c.id as id_categoria, nombre FROM categoria c".
            " JOIN categoria_recursiva cr ON c.id=cr.id_categoria_inferior".
            " WHERE cr.id_categoria_superior='".$id_categoria."'";
        //echo 'subcat: '.$query.';<br/>';
        return $this->getCategorias($query);
    }

    /*
     * este metodo sirve para retraer todas las categorias (o una en especial) de la db
     * que no tenga subCategoria
     */
    public function getSuperCategorias(){
        $query = "select c.id as id_categoria, nombre ".
        " FROM categoria c".
        " WHERE id not in (select id_categoria_inferior from categoria_recursiva)";
        //echo 'query '.$query;
        return $this->getCategorias($query);
    }
    private function getCategorias($query){
        
//        echo 'executing query: '.$query.'<br/>';
        $result = mysql_query($query)
            or die ("getCategorias Query Failed: ".mysql_error()."<br/>");
        $cat_idx = 0;
        $vCategorias;

        while($row = mysql_fetch_array($result,MYSQL_ASSOC)){
            //objeto categoria a agregar en el arreglo a devolver
            $oCategoria = new Categoria();
            //cargo los datos del producto
            $id_cat = $row['id_categoria'];
            $nombre = $row['nombre'];

            $oCategoria->setId_Categoria($id_cat);
            $oCategoria->setNombre($nombre);
            //y lo agregamos al array
            $vCategorias[$cat_idx]=$oCategoria;
            $cat_idx=$cat_idx+1;//incremento el indice
        }
        $this->closeDB($connection);
        return $vCategorias;
    }
    
}
?>
