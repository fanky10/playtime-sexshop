<html>
    <head>
        <script type="text/javascript" src="../js/jquery-1.5.js"></script>
        <script type="text/javascript" src="js/jquery.form.js"></script>
        <script type="text/javascript">
            $('#uploadForm').ajaxForm({
                beforeSubmit: function(a,f,o) {
                    o.dataType = "html";//very very important piece of code :)
                    $('#uploadOutput').html('Submitting...');
                },
                success: function(data) {
                    var $out = $('#uploadOutput');
                    $out.html('Form success handler received!');
                    $out.append('<div><pre>'+ data +'</pre></div>');
                }
            });
        </script>
    </head>
<form id="uploadForm" action="file_handler.php" method="POST" enctype="multipart/form-data">
<!--    from other -->
    <fieldset>
            <legend>Ingrese datos del producto</legend>
            <p>
                    <label for="product_name">Nombre</label>
                    <input id="ProductName" name="product_name"/>
            </p>
            <p>
                    <label for="product_name">Codigo</label>
                    <input id="ProductName" name="product_name"/>
            </p>
            <p>
                    <label for="product_name">Descripcion</label>
                    <input id="ProductName" name="product_name"/>
            </p>
            <p>
                    <label for="product_name">Precio</label>
                    <input id="ProductName" name="product_name"/>
            </p>
            <p>
                    <label for="product_name">Categoria</label>
                    <input id="ProductName" name="product_name"/>
            </p>
            <p>
                    <label for="file">Imagen</label>
                    <input type="file" id="ImgSrc" name="file" class="{validate:{required:true,accept:true}}" />
                    <input name="MAX_FILE_SIZE" value="102400" type="hidden" id="MAX_FILE_SIZE"/>
            </p>
            <p>
                    <input class="submit" type="submit" value="Submit"/>
            </p>
    </fieldset>
    <!-- original -->
<!--    <label for="produc_name">Producto</label>
    <input id="ProductName" name="product_name"/>
    <input type="hidden" name="MAX_FILE_SIZE" value="100000" />
    File: <input type="file" name="file" />
    <input type="submit" value="Submit" />-->
    
</form>

<p />
<label>Output:</label>
<div id="uploadOutput"></div>
</html>