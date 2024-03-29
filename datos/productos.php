<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
@include_once 'data.php';

@include_once '../init.php';
@include_once ROOT_DIR .'/entidades/producto.php';
@include_once ROOT_DIR .'/util/utilidades.php';

/**
 * Description of Productos
 *
 * @author fanky
 */
class DataProductos extends Data {
    public function __construct() {
        parent::__construct();
        
    }
    /**
     * a partir del arreglo que esta guardado en la variable SESSION
     * de id_producto-cant
     * armamos un arreglo de objetos Producto con Nombre - cant - precio unitario - precioTotal
     * etc
     * @param <Array> $prodV 
     */
    public function getProductosCarrito($arrItems){
        
        $arrLenght = count($arrItems);
        $prod_idx = 0;
        $vProductos;
        for($index=0;$index < $arrLenght;$index++){
            $item = $arrItems[$index];
            $current_id = $item['id'];
            $current_cant = $item['cant'];
            $query = "select p.id as id, p.nombre, pp.precio, p.codigo".
            " FROM producto p".
            " LEFT JOIN (select * from precio_producto order by fecha_hora desc) pp ON pp.id_producto=p.id ".
            " WHERE p.id in ($current_id)".
            " GROUP BY p.id";
//            echo " query: $query <br>";
            $result = mysql_query($query)
                or die ("Query Failed ".mysql_error());


            while($row = mysql_fetch_array($result,MYSQL_ASSOC)){
                //objeto producto a agregar en el arreglo a devolver
                $oProducto = new Producto();
                $id_prod = $row['id'];
                $nombre = $row['nombre'];
                $precio = $row["precio"];
                $codigo = $row["codigo"];

                $oProducto->setId_Producto($id_prod);
                $oProducto->setNombre($nombre);
                $oProducto->setPrecio($precio);
                $oProducto->setCantidad($current_cant);
                $oProducto->setCodigo($codigo);

                //y lo agregamos al array
                $vProductos[$prod_idx]=$oProducto;
                $prod_idx=$prod_idx+1;//incremento el indice
            }
        }
        //se cierra la conex.
        $this->closeDB();
        
        //se devuelve el array
        return $vProductos;
    }
    public function getProducto($id_producto){
        $this->refreshCategorias();
        $query = "SELECT SQL_CALC_FOUND_ROWS p.id as id, p.nombre, i.id_imagen,pp.precio, p.descripcion, p.codigo".
            " FROM producto p".
            " LEFT JOIN imagen i ON p.id_imagen = i.id_imagen".
            " LEFT JOIN (select * from precio_producto order by fecha_hora desc) pp ON pp.id_producto=p.id ".
            " LEFT JOIN tt_cats cp ON cp.id_producto = p.id".//por si no tiene categoria asignada
            " WHERE p.id=$id_producto".
            " GROUP BY p.id".//lo agrupa xq puede tener varios precios que estan ordenados desc -> toma el actual
            " LIMIT 1";//para que no falle :P
//        echo 'query '.$query;
        $result = mysql_query($query)
            or die ("Query Failed ".mysql_error());
        $row = mysql_fetch_array($result,MYSQL_ASSOC);
        //Producto object :P
        $oProducto = new Producto();
        $id_prod = $row['id'];
        $nombre = $row['nombre'];
        $img = $row['id_imagen'];
        $precio = $row["precio"];
        $descripcion = $row["descripcion"];
        $codigo = $row["codigo"];

        $oProducto->setId_Producto($id_prod);
        $oProducto->setImagen($img);
        $oProducto->setNombre($nombre);
        $oProducto->setPrecio($precio);
        $oProducto->setDescripcion($descripcion);//mostramos directamente la descripcion
//            $oProducto->setInformacion($informacion);
        $oProducto->setCodigo($codigo);
        $this->closeDB();//cierro conexion
        return $oProducto;
    }
    /**
     * es una funcion de prueba
     * @return Producto 
     */
//    public function getProductsClean($inicio, $fin){
//
//        //vamos a seleccionar solo los que nos piden y setear la cant que hay en total
//        $query = "select SQL_CALC_FOUND_ROWS id,nombre from producto limit $inicio , $fin";
//        $result = mysql_query($query)
//            or die ("Query Failed ".mysql_error());
//
//        $prod_idx = 0;
//        $vProductos;
//
//        while($row = mysql_fetch_array($result,MYSQL_ASSOC)){
//
//            //objeto producto a agregar en el arreglo a devolver
//            $oProducto = new Producto();
//            $id_prod = $row['id'];
//            $nombre = $row['nombre'];
//
//            $oProducto->setId_Producto($id_prod);
//            $oProducto->setNombre($nombre);
//
//            //y lo agregamos al array
//            $vProductos[$prod_idx]=$oProducto;
//            $prod_idx=$prod_idx+1;//incremento el indice
//        }
//        return $vProductos;
//    }

    /**
     * v1.0 crea un producto sin informacion o descripcion
     * v1.1 crea el producto con lo que falta
     * v1.2 ahora toma como informacion los primeros 100 chars de la descrip
     * como informacion pone la descripcion recortada hasta el 2do punto
     * si no lo encuentra lo pone hasta el 1er punto
     * @param <int> $inicio
     * @param <int> $fin
     * @param <int> $id_categoria //not yet implemented
     * @return Producto
     */
    public function getProductosImagen($inicio, $fin, $id_categoria, $orden){
        $this->refreshCategorias();
        $order_arr = array("p.nombre","pp.precio");
        $query = "SELECT SQL_CALC_FOUND_ROWS p.id as id, p.nombre, i.id_imagen,pp.precio, p.descripcion".
            " FROM producto p".
            " LEFT JOIN imagen i ON p.id_imagen = i.id_imagen".
            " LEFT JOIN (select * from precio_producto order by fecha_hora desc) pp ON pp.id_producto=p.id ".
            " INNER JOIN tt_cats cp ON cp.id_producto = p.id".
            " WHERE cp.id_categoria=$id_categoria".
            " GROUP BY p.id".
            " ORDER BY ".$order_arr[$orden].
            " LIMIT $inicio , $fin";
        //echo " query: $query <br>";
        $result = mysql_query($query)
            or die ("Query:$query </br> Failed ".mysql_error());
        $prod_idx = 0;
        $vProductos;
        while($row = mysql_fetch_array($result,MYSQL_ASSOC)){
            //objeto producto a agregar en el arreglo a devolver
            $oProducto = new Producto();
            $id_prod = $row['id'];
            $nombre = $row['nombre'];
            $img = $row['id_imagen'];
            $precio = $row["precio"];
            $descripcion = $row["descripcion"];
            #deprecated ahora toma los primeros 100 chars de la descripcion
//            $pos = strpos($descripcion, '.', 1); // la segunda ocurrencia
//            //si no hay un segundo punto busco el primero
//            if ($pos === false) {
//                $pos = strpos($descripcion, '.') + 1;//la posicion del primer punto
//            }
//            $informacion = substr($descripcion, 0,$pos);

            $informacion = substr($descripcion, 0,150);

            $oProducto->setId_Producto($id_prod);
            $oProducto->setImagen($img);
            $oProducto->setNombre($nombre);
            $oProducto->setPrecio($precio);
            $oProducto->setDescripcion($descripcion);
            $oProducto->setInformacion($informacion);


            //y lo agregamos al array
            $vProductos[$prod_idx]=$oProducto;
            $prod_idx=$prod_idx+1;//incremento el indice
        }
        //no se cierra la conexion para poder tomar la cant de productos devueltos
        return $vProductos;
    }

    public function getCountProducts(){
        //pedimos la cant total
        $query = "SELECT FOUND_ROWS() as total";
        $rsTotal = mysql_query($query)
            or die ("Query Failed ".mysql_error());
        $rowTotal = mysql_fetch_array($rsTotal, MYSQL_ASSOC);
        $total = $rowTotal["total"];
        return $total;
    }
    
    public function getUltimoID(){
        $query = "select max(id) as ultimo_id from producto";
        $result = mysql_query($query)
            or die ("Query Failed ".mysql_error());
        $id = -1;
        while($row = mysql_fetch_array($result,MYSQL_ASSOC)){
            $id = $row['ultimo_id'];
        }
        return $id;
    }
    //metodo para insertar un nuevo producto
    public function addProducto(Producto $producto){
        /* @var $producto Producto */
        $non_query = "insert into producto (nombre,descripcion,informacion,codigo,id_imagen) values(".
                    Utilidades::db_adapta_string($producto->getNombre()).",".
                    Utilidades::db_adapta_string($producto->getDescription()).",".
                    Utilidades::db_adapta_string("").",".
                    Utilidades::db_adapta_string($producto->getCodigo()).",".
                    Utilidades::db_adapta_string($producto->getImagen()).                        
                    ")";
        //lo insertamos
        $results = mysql_query($non_query)
            or die ("Query Failed ".mysql_error());
        
        //ultimo id
        $id = $this->getUltimoID();
        //nuevo precio
        $non_query = "insert into precio_producto values(".
                    Utilidades::db_adapta_string($id).",current_timestamp,".
                    Utilidades::db_adapta_string(Utilidades::db_number($producto->getPrecio())). 
                    ")";
        $result = mysql_query($non_query)
            or die ("Query Failed ".mysql_error());
    }
    //averiguar xq esto ROMPE TODO
//    public function addProducto(Producto $producto, $data_img){
//        //with transactions men!
//        try {
//            //begin
//            $this->connection->begin();
//
//            // A set of queries ; of one fails, an exception should be thrown
//            $db->query('first query');
//            $db->query('second query');
//            $db->query('third query');
//
//            // If we arrive here, it means that no exception was thrown
//            // i.e. no query has failed ; and we can commit the transaction
//            $this->connection->commit();
//        } catch (Exception $e) {
//            // An exception has been thrown
//            // We must rollback the transaction
//            $this->connection->rollback();
//        }
//    }
    //metodo para hacer update del producto
    //si el id_imagen es menor o igual a cero no se modifica el id_imagen
    public function updProducto(Producto $producto){
        /* @var $producto Producto */
        $non_query = "update producto set nombre=".
                    Utilidades::db_adapta_string($producto->getNombre()).
                    ",descripcion=".
                    Utilidades::db_adapta_string($producto->getDescription()).",
                        informacion=".
                    Utilidades::db_adapta_string("").",
                        codigo=".
                    Utilidades::db_adapta_string($producto->getCodigo()).
                        ($producto->getImagen()<=0?"":",id_imagen=".
                    Utilidades::db_adapta_string($producto->getImagen())).                      
                    " where id=".$producto->getId_Producto();
        //lo insertamos
        $results = mysql_query($non_query)
            or die ("Upd: $non_query <br/> Query Failed ".mysql_error());
        
        //ultimo id
        $id = $this->getUltimoID();
        //nuevo precio
        //si no le cambia el precio va a ser un garron pero que mas da xD
        $non_query = "insert into precio_producto values(".
                    Utilidades::db_adapta_string($id).",current_timestamp,".
                    Utilidades::db_adapta_string(Utilidades::db_number($producto->getPrecio())). 
                    ")";
        $result = mysql_query($non_query)
            or die ("Query Failed ".mysql_error());
    }
    //si el id_imagen es menor o igual a cero no se modifica el id_imagen
    public function delProducto(Producto $producto){
        /* @var $producto Producto */
        $non_query = "delete from producto where id=".$producto->getId_Producto();
        //lo insertamos
        $results = mysql_query($non_query)
            or die ("Del: $non_query <br/> Query Failed ".mysql_error());
    }
    public function getListaProductos(){
        
        $arrLenght = count($arrItems);
        $prod_idx = 0;
        $vProductos;
        $query = "select p.id as id, p.nombre, pp.precio, p.codigo".
            " FROM producto p".
            " LEFT JOIN (select * from precio_producto order by fecha_hora desc) pp ON pp.id_producto=p.id ".
            " GROUP BY p.id";
//            echo " query: $query <br>";
        $result = mysql_query($query)
            or die ("getListaProductos Query Failed <br/> ".mysql_error());


        while($row = mysql_fetch_array($result,MYSQL_ASSOC)){
            //objeto producto a agregar en el arreglo a devolver
            $oProducto = new Producto();
            $id_prod = $row['id'];
            $nombre = $row['nombre'];
            $precio = $row["precio"];
            $codigo = $row["codigo"];

            $oProducto->setId_Producto($id_prod);
            $oProducto->setNombre($nombre);
            $oProducto->setPrecio($precio);
            $oProducto->setCantidad($current_cant);
            $oProducto->setCodigo($codigo);

            //y lo agregamos al array
            $vProductos[$prod_idx]=$oProducto;
            $prod_idx=$prod_idx+1;//incremento el indice
        }
        //se cierra la conex.
        $this->closeDB();
        
        //se devuelve el array
        return $vProductos;
    }
    public function getProductosCateg($id_categoria){
        $this->refreshCategorias();
        $arrLenght = count($arrItems);
        $prod_idx = 0;
        $vProductos;
        $query = "select p.id as id, p.nombre, pp.precio, p.codigo".
            " FROM producto p".
            " LEFT JOIN (select * from precio_producto order by fecha_hora desc) pp ON pp.id_producto=p.id ".
            " INNER JOIN tt_cats cp ON cp.id_producto = p.id".        
            (isset($id_categoria) && $id_categoria>0?" WHERE cp.id_categoria= $id_categoria":" ").
            " GROUP BY p.id";
//            echo " query: $query <br>";
        $result = mysql_query($query)
            or die ("getListaProductos Query Failed <br/>query: $query <br/>".mysql_error());


        while($row = mysql_fetch_array($result,MYSQL_ASSOC)){
            //objeto producto a agregar en el arreglo a devolver
            $oProducto = new Producto();
            $id_prod = $row['id'];
            $nombre = $row['nombre'];
            $precio = $row["precio"];
            $codigo = $row["codigo"];

            $oProducto->setId_Producto($id_prod);
            $oProducto->setNombre($nombre);
            $oProducto->setPrecio($precio);
            $oProducto->setCantidad($current_cant);
            $oProducto->setCodigo($codigo);

            //y lo agregamos al array
            $vProductos[$prod_idx]=$oProducto;
            $prod_idx=$prod_idx+1;//incremento el indice
        }
        //se cierra la conex.
        $this->closeDB();
        
        //se devuelve el array
        return $vProductos;
    }
    /**
     * esto nos devuelve todas las categorias pertenecientes a un producto en la ultima fecha
     */
    private function refreshCategorias(){
        $query = "DROP TEMPORARY TABLE IF EXISTS tt_cats;";
        $result = mysql_query($query)
            or die ("refreshCategorias Query Failed <br/>query: $query <br/>".mysql_error());
        
        $query = "CREATE TEMPORARY TABLE  tt_cats (
                SELECT cp.* FROM (select id_producto,max(fecha_hora) fecha_hora from categoria_producto group by id_producto) fp 
                INNER JOIN categoria_producto cp ON cp.id_producto = fp.id_producto and fp.fecha_hora = cp.fecha_hora
                );";
        $result = mysql_query($query)
            or die ("refreshCategorias Query Failed <br/>query: $query <br/>".mysql_error());
    }

}

?>
