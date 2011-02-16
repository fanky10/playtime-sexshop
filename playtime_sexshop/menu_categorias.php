    <h3><span>Categor&iacute;as</span></h3>

    <ul>
        <?php
            include_once ("datos/categorias.php");
            try{
                $dCateg = new DataCategorias();
                $catList = $dCateg->getCategoriasHabilitadas();
                $found = count($catList);
                //TODO: change href
                for($index=0;$index < $found;$index++){
                    $oCategoria = $catList[$index];

                    //escribo el nombre de la categoria
                    //TODO agregar jscript para llamar a productos
                    echo "<li class\"item\"><a href=\"?id_cat=".$oCategoria->getId_Categoria()."\"> ".$oCategoria->getNombre()."</a></li>";
                }
            }catch(Exception $ex){
                echo 'Ha ocurrido una exception: '.$ex->getMessage();

            }
        ?>
    </ul><!--end categorias-->