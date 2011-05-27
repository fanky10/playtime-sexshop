<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>Play Time Sex Shop .::. Botique Er&oacute;tica - CONTACTO</title>
        <meta name="keywords" content="juguetes, toys, Lubricantes, Anillos, Estimuladores Clitoreales, Placer Anal, Doble Penetraci&oacute;n, Siliconados, Hot Pink, Black Fantasy, Realistic, Funny, Cyberskin, Desarrolladores Peneanos, extensiones, Arneses, Mu&ntilde;ecas, Vaginas, Disfraces" />
        <meta name="description" content="Este es un sitio donde encontrar&aacute; muchas formas de dar placer a su pareja, formas de jugar y divertirse." />
	<meta http-equiv="content-type" content="text/html;charset=iso-8859-1" />
        
            <!--CSS FILES-->
        <link href="../css/style.css" rel="stylesheet" type="text/css" />

            <!--JS FILES-->
        <script src="../js/jquery-1.5.js" type="text/javascript"></script>
        <script src="../js/jquery.metadata.js" type="text/javascript" ></script>
        <script src="../js/jquery.validate.js" type="text/javascript"></script><!--VALIDATION-->
        <script src="../js/jquery.form.js" type="text/javascript" ></script><!--FILE UPLOAD-->
        
        <script src="../js/secciones/build.js" type="text/javascript"></script><!--ANCHO COLUMNAS-->
        <script src="js/amproducto.js" type="text/javascript"></script><!--VALIDA DATOS DE ENTRADA-->
        <!--[if lte IE 7]>
        <script type="text/javascript" src="js/supersleight-min.js"></script>
        <![endif]-->
        
    </head>
    
    <body>
        <div class="wrapper">
            <div class="contenedor">
                <div class="contenido">
                    <div id="contenido_central">
                        <div class="ruta"><a href="index.php">Inicio</a> / <a href="contacto.php">Contacto</a></div>

                        <h1 class="categoria"><span>Alta Producto</span></h1>
                        <p class="copy">Ingrese los datos de un nuevo producto.</p>
                        
                        <form id="uploadForm" action="product_handler.php?action=add" method="POST" enctype="multipart/form-data">
<!--                            <fieldset style="display:none;"><input type="hidden" name="_method" value="POST" /></fieldset>-->

                            <div class="formField">
                                <label for="ProductName">Nombre Producto:</label>
                                <input name="data[Product][name]" type="text" class="inputData" maxlength="255" value="" id="ProductName" />                            
                            </div>
                            <div class="formField">
                                <label for="ProductCod">Codigo Producto:</label>
                                <input name="data[Product][codigo]" type="text" class="inputData" maxlength="255" value="" id="ProductCod" />                            
                            </div>
                            <div class="formField">
                                <label for="ProductPrice">Precio Producto:</label>
                                <input name="data[Product][price]" type="text" class="inputData" maxlength="255" value="" id="ProductPrice" />                            
                            </div>
                            <div class="formField">
                                <label for="ProductDesc">Descripcion Producto:</label>
                                <textarea name="data[Product][descrip]" cols="5" rows="3" class="textArea" id="ProductDesc" ></textarea>
                            </div>
                            <div class="formField">
                                <?php
                                include 'opc_categorias.php';
                                ?>
                            </div>
                            <div class="formField">
                                <input name="MAX_FILE_SIZE" value="102400" type="hidden" id="MAX_FILE_SIZE"/>
                                <label for="ProductImage">Imagen Producto:</label>
                                <input name="file" type="file" class="inputData" id="ProductImage" class="{validate:{required:true,accept:true}}"  />                            
                            </div>
<!--                            <label for="file">Imagen</label>
                            <input type="file" id="ImgSrc" name="file" class="{validate:{required:true,accept:true}}" />
                            <input name="MAX_FILE_SIZE" value="102400" type="hidden" id="MAX_FILE_SIZE"/>-->
                            <div class="formButton">
                                <input type="submit" alt="Guardar" class="formButton" value="Guardar" />
                            </div>
                            <p></p>
                        </form>
                        <p id="mensaje"><strong>Aqui el mensaje de resultado!</strong></p>
                        
                    </div><!--end contenido_central-->

                </div><!--end contenido -->

            </div>
			
			
			
                <div class="pie_pagina">
                        <a class="mawape" href="http://www.mawape.com.ar" title="MAWAPE Sistemas"><img src="images/logo-mawape.png" alt="MAWAPE Sistemas" title="MAWAPE Sistemas" /></a>
                        <p class="copyright">&copy; Copyright 2011 - Play Time Sex Shop. Boutique Er&oacute;tica. Todos los derechos.</p>
                </div><!--end pie-pagina-->
		</div>
    </body>
</html>

