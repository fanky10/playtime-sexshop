<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include_once 'data.php';
include_once './entidades/producto.php';

/**
 * Description of Productos
 *
 * @author fanky
 */
class DataProductos extends Data {
    private $producto;
    public function __construct() {
        parent::__construct();
    }
    public function getProducto($id_producto){
        $query = "SELECT SQL_CALC_FOUND_ROWS p.id as id, p.nombre, i.id_imagen,pp.precio, p.descripcion".
            " FROM producto p".
            " LEFT JOIN imagen i ON p.id_imagen = i.id_imagen".
            " LEFT JOIN (select * from precio_producto order by fecha_hora desc) pp ON pp.id_producto=p.id ".
            " INNER JOIN categoria_producto cp ON cp.id_producto = p.id".
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


        $oProducto->setId_Producto($id_prod);
        $oProducto->setImagen($img);
        $oProducto->setNombre($nombre);
        $oProducto->setPrecio($precio);
        $oProducto->setDescripcion($descripcion);//mostramos directamente la descripcion
//            $oProducto->setInformacion($informacion);
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
        $order_arr = array("p.nombre","pp.precio");
        $query = "SELECT SQL_CALC_FOUND_ROWS p.id as id, p.nombre, i.id_imagen,pp.precio, p.descripcion".
            " FROM producto p".
            " LEFT JOIN imagen i ON p.id_imagen = i.id_imagen".
            " LEFT JOIN (select * from precio_producto order by fecha_hora desc) pp ON pp.id_producto=p.id ".
            " INNER JOIN categoria_producto cp ON cp.id_producto = p.id".
            " WHERE cp.id_categoria=$id_categoria".
            " GROUP BY p.id".
            " ORDER BY ".$order_arr[$orden].
            " LIMIT $inicio , $fin";
        //echo " query: $query <br>";
        $result = mysql_query($query)
            or die ("Query Failed ".mysql_error());
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
    
    

    public function setProducto($producto){
        $this->producto = $producto;
    }
    //antes de agregar el nuevo producto 
    //primero debe ser seteado correctamente
    //sino tira exception (una especie de nullpointer exception xD)
    //
    public function addProducto($imagen){
        isset ($this->producto)
                or new Exception("todo mal producto no instanciado");
        $query = "insert into producto values(";

    }
    //antes de agregar el nuevo producto
    //primero debe ser seteado correctamente
    //sino tira exception (una especie de nullpointer exception xD)
    public function updProducto($imagen){

    }

}

?>
