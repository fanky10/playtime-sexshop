<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>Play Time Sex Shop .::. Botique Erótica - PRODUCTO</title>
        <meta name="keywords" content="juguetes, toys, Lubricantes, Anillos, Estimuladores Clitoreales, Placer Anal, Doble Penetraci&oacute;n, Siliconados, Hot Pink, Black Fantasy, Realistic, Funny, Cyberskin, Desarrolladores Peneanos, extensiones, Arneses, Mu&ntilde;ecas, Vaginas, Disfraces" />
        <meta name="description" content="Este es un sitio donde encontrar&aacute; muchas formas de dar placer a su pareja, formas de jugar y divertirse." />

		<!--CSS FILES-->
		<link href="css/reset.css" rel="stylesheet" type="text/css" />
		<link href="css/style.css" rel="stylesheet" type="text/css" />
		<link href="css/producto.css" rel="stylesheet" type="text/css" />

		<!--JS FILES-->
        <script src="js/jquery-1.5.js" type="text/javascript"></script>
		<script src="js/action.js" type="text/javascript"></script><!--PROPIO-->
        <script src="http://widgets.twimg.com/j/2/widget.js"></script><!--TWITTER-->

        <script src="js/jquery.validate.js" type="text/javascript"></script><!--EMAIL-->

        <!--[if lte IE 7]>
        <script type="text/javascript" src="js/supersleight-min.js"></script>
        <![endif]-->

        <SCRIPT type="text/javascript">
			$().ready(function() {
				// valida el formulario de CONTACTO
				$("#producto").validate();
			});
		</SCRIPT>
    </head>

    <body>
		<div class="wrapper">
			<div class="cabecera">
        		<a href="#" title="Inicio"><img class="logo" src="images/logo-playtime.png" alt="Play Time Sex Shop -  Boutique Er&oacute;tica" title="Play Time Sex Shop -  Boutique Er&oacute;tica" border="0" /></a>
				<ul class="menu">
					<li><a href="index.php">Inicio</a></li>
        	        <li><a href="tienda.php">Tienda</a></li>
        	        <li><a href="../blog">Blog</a></li>
        	        <li><a href="comprar.php">&iquest;C&oacute;mo Comprar?</a></li>
        	        <li><a href="contacto.php">Contacto</a></li>
				</ul><!--end menu-->
			</div><!--end cabecera-->

			<div class="superior">
				<ul class="menu_acceso">
        	        <li id="home"><a href="#">Inicio</a></li>
        	        <li id="help"><a href="#">Ayuda</a></li>
        	        <li id="login"><a href="#">Acceso</a></li>
        	        <li id="cart"><a href="#">Compra (<strong>0</strong> Items)</a></li>
				</ul><!--end menu_acceso-->
			</div><!--end superior-->

			<div class="contenedor">

				<div class="lateral" id="lateral_izquierdo">
        	        <form action="#" method="post" class="buscador">
        	        	<div class="buscador_back">
        	                <div class="busc_left"></div>
        	                <input type="text" name="buscar" id="buscar" value="Buscar..." class="busc_middle" />
        	                <div class="busc_right"></div>
				    	</div>
        	        </form>

                                <?php
                                    include 'menu_categorias.php';
                                ?>


				</div><!--end lateral_izquierdo-->

				<div class="contenido">
					<div id="contenido_central">

                                    <?php
    include_once 'datos/productos.php';
    include_once 'datos/categorias.php';
    try{
        $id_producto = (int) $_GET["id_prod"];//id_producto jaja
        if($id_producto <1){
            $id_producto = 1;
        }
        $dProd = new DataProductos();
        $oProd = $dProd->getProducto($id_producto);

        echo "<div class=\"ruta\"><a href=\"?\">Inicio</a> / <a href=\"?\">Tienda</a> / Detalle Producto</div>";
        echo "<h1 class=\"categoria\"><span> PRODUCTO </span></h1>";
        $img_id = $oProd->getImagen();
        $img_source="images/productos/lubricantes/lubricante1.jpg";
        if($img_id>0){
            $img_source="scripts/image_script.php?id_img=$img_id";
        }
        echo "<img class=\"prodImagen\" src=\"$img_source\"".$oProd->getNombre()."\" title=\"".$oProd->getNombre()."\" height=\"270\" width=\"270\"/>";
        echo "<div class=\"detalleProducto\">";
            echo "<h4 class=\"prodTitulo\">".$oProd->getNombre()."</h4>";
            echo"<span class=\"prodPrecio\">".$oProd->getPrecio()."</span>";
            echo"<p class=\"prodInfo\">".$oProd->getDescription()."</p>";
        echo"</div>";
    }catch(Exception $ex){
        echo 'Ha ocurrido una exception: '.$ex->getMessage();

    }
 ?>

<form action="" method="" id="producto">
        <div>
        <label>Cantidad:</label>
        <input id="cantidad" name= "cantidad" class="required number" maxlength="3" size="5" value="1"/>
        <label><a href="#"><img class="agregar" src="images/agregar.png" alt="Agregar" title="Agregar" /></a></label>
        <label><a href="#"><img class="quitar" src="images/quitar.png" alt="Quitar" title="Quitar" /></a></label>
        <input id="comprar" class="" type="submit" name="comprar" value="Comprar" />
    </div>
</form>
                                </div><!--end contenido_central-->


					<div class="lateral" id="lateral_derecho">
        	        	<a class="banner" href="#" title="Conectate al MSN">
        	        		<img src="images/banners/banner-placeholder.png" alt="Conectate al MSN" />
        	        	</a>
        	            <a class="banner" href="#" title="Delivery hasta tu casa">
        	            	<img src="images/banners/banner-placeholder.png" alt="Delivery hasta tu casa" />
        	            </a>
					</div><!--end lateral_derecho-->

				</div><!--end contenido -->

			</div>

			<div class="inferior">
        	    <ul class="menu_acceso">
        	        <li id="info"><a href="#">Mas Informaci&oacute;n</a></li>
        	        <li id="top"><a href="#">Arriba</a></li>
				</ul><!--end menu_acceso-->

				<div class="items">
					<div class="items-block">
						<h4>Columna 1</h4>
						<ul>
							<li><a href="#" title="Lorem Ipsum">Lorem ipsum dolor sit amet lamet</a></li>
							<li><a href="#" title="Lorem Ipsum">Lorem ipsum dolor sit amet lamet</a></li>
							<li><a href="#" title="Lorem Ipsum">Lorem ipsum dolor sit amet lamet</a></li>
							<li><a href="#" title="Lorem Ipsum">Lorem ipsum dolor sit amet lamet</a></li>
						</ul>
					</div>

					<div class="items-block">
						<h4>Columna 2</h4>
						<ul>
							<li><a href="#" title="Lorem Ipsum">Lorem ipsum dolor sit amet lamet</a></li>
							<li><a href="#" title="Lorem Ipsum">Lorem ipsum dolor sit amet lamet</a></li>
							<li><a href="#" title="Lorem Ipsum">Lorem ipsum dolor sit amet lamet</a></li>
							<li><a href="#" title="Lorem Ipsum">Lorem ipsum dolor sit amet lamet</a></li>
						</ul>
					</div>

					<div class="items-block">
						<script>
new TWTR.Widget({
  version: 2,
  type: 'profile',
  rpp: 2,
  interval: 5000,
  width: 200,
  height: 140,
  theme: {
    shell: {
      background: '#771116',
      color: '#ffffff'
    },
    tweets: {
      background: '#7C2F27',
      color: '#ffffff',
      links: '#000000'
    }
  },
  features: {
    scrollbar: false,
    loop: true,
    live: true,
    hashtags: true,
    timestamp: true,
    avatars: false,
    behavior: 'default'
  }
}).render().setUser('playtimesexshop').start();
</script>
					</div>

					<div class="items-block last">
						<h4>Columna 4</h4>
						<ul>
							<li><a href="#" title="Lorem Ipsum">Lorem ipsum dolor sit amet lamet</a></li>
							<li><a href="#" title="Lorem Ipsum">Lorem ipsum dolor sit amet lamet</a></li>
							<li><a href="#" title="Lorem Ipsum">Lorem ipsum dolor sit amet lamet</a></li>
							<li><a href="#" title="Lorem Ipsum">Lorem ipsum dolor sit amet lamet</a></li>
						</ul>
					</div>

				</div><!--end items-->

				<div class="submenu">
				    <ul>
                        <li><a href="index.php">Inicio</a></li>
                        <li><a href="tienda.php">Tienda</a></li>
                        <li><a href="../blog">Blog</a></li>
                        <li><a href="comprar.php">&iquest;C&oacute;mo Comprar?</a></li>
                        <li><a href="contacto.php">Contacto</a></li>
				    </ul><!-- end menu_inferior -->
				    <a href="#" title="Inicio"><img class="logo-playtime-chico" src="images/logo-playtime-chico.png" alt="Play Time Sex Shop -  Boutique Er&oacute;tica" title="Play Time Sex Shop -  Boutique Er&oacute;tica" border="0" /></a>
				</div><!-- end submenu -->

			</div><!-- end inferior -->

			<div class="pie_pagina">
				<a class="mawape" href="http://www.mawape.com.ar" title="MAWAPE Sistemas"><img src="images/logo-mawape.png" alt="MAWAPE Sistemas" title="MAWAPE Sistemas" /></a>
				<p class="copyright">&copy; Copyright 2011 - Play Time Sex Shop. Boutique Er&oacute;tica. Todos los derechos.</p>
			</div><!--end pie-pagina-->
		</div>
    </body>
</html>
