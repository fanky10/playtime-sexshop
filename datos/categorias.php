<?php
@include_once 'data.php';
@include_once '../init.php';
@include_once ROOT_DIR .'/entidades/categoria.php';
@include_once ROOT_DIR .'/util/utilidades.php';

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
            or die ("getCategorias Query: $query </br> Failed: ".mysql_error()."<br/>");
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
    public function addCategoria(Categoria $categ){
        $query = "INSERT INTO categoria ";
        $query .= "VALUES (null,".Utilidades::db_adapta_string($categ->getNombre()).",1)";
        $results = mysql_query($query)
            or die ("<br/>Query Failed ".mysql_error());
    }
    public function delCategoria(Categoria $categ){
        $query = "DELETE FROM categoria ";
        $query .= "WHERE id=".$categ->getId_Categoria();
        $results = mysql_query($query)
            or die ("<br/>DelCat: $query <br/> Query Failed coz: ".mysql_error());
    }
    public function updCategoria(Categoria $categ){
        $query = "UPDATE categoria";
        $query .= " set nombre=".Utilidades::db_adapta_string($categ->getNombre());
        $query .= " WHERE id=".$categ->getId_Categoria();
        $results = mysql_query($query)
            or die ("<br/>DelCat: $query <br/> Query Failed coz: ".mysql_error());
    }
//    public function addCategoriaProducto($id_categoria, $id_producto){
//        $query = "INSERT INTO categoria_producto ";
//        $query .= "VALUES ($id_producto,$id_categoria)";
////        echo "<br/>addCatProd: $query";
//        $results = mysql_query($query)
//            or die ("<br/>Query Failed ".mysql_error());
//    }
    public function addCategoriaProducto(Array $catV, $id_producto){
        $query = "set @fec_hora = current_timestamp ";
        $results = mysql_query($query)
            or die ("<br/>Query Failed: $query </br>Because:".mysql_error());
        //inserto todas - con la misma fec_hora agarrada al principio
        while (list ($key, $val) = each ($catV)) {
            $query = "INSERT INTO categoria_producto (id_categoria,id_producto,fecha_hora) VALUES ";
            $query .= " ($val,$id_producto,@fec_hora)";
            $results = mysql_query($query)
                or die ("<br/>Query Failed: $query </br>Because:".mysql_error());
        }
//        $query = "UPDATE categoria_producto ";
//        $query .= "set id_categoria=$id_categoria WHERE id_producto= $id_producto";
////        echo "<br/>addCatProd: $query";
//        $results = mysql_query($query)
//            or die ("<br/>Query Failed ".mysql_error());
    }
    
    /*
     * retorna todas aquellas categorias habilitadas de un producto
     */
    public function getCategoriasProducto($id_producto){
//        $query = "DROP TEMPORARY TABLE IF EXISTS tt_cats;";
//        $result = mysql_query($query)
//            or die ("refreshCategorias Query Failed <br/>query: $query <br/>".mysql_error());        
//        $query = "CREATE TEMPORARY TABLE  tt_cats (
//                SELECT cp.* FROM (select id_producto,max(fecha_hora) fecha_hora from categoria_producto WHERE id_producto = $id_producto group by id_producto) fp 
//                INNER JOIN categoria_producto cp ON cp.id_producto = fp.id_producto and fp.fecha_hora = cp.fecha_hora
//                );";
//        $result = mysql_query($query)
//            or die ("refreshCategorias Query Failed <br/>query: $query <br/>".mysql_error());
        
        $query = "SELECT c.id as id_categoria, nombre FROM categoria c INNER JOIN (
                SELECT cp.* FROM (select id_producto,max(fecha_hora) fecha_hora from categoria_producto 
                WHERE id_producto = $id_producto group by id_producto) fp 
                INNER JOIN categoria_producto cp ON cp.id_producto = fp.id_producto and fp.fecha_hora = cp.fecha_hora
                ) cp ON cp.id_categoria = c.id".
            " WHERE c.habilitada=1";
        return $this->getCategorias($query);
    }
    
}
?>
