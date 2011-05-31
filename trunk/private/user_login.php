<html>
    <head>
        <script src="../js/jquery-1.5.js" type="text/javascript"></script>
        <script src="../js/jquery.metadata.js" type="text/javascript" ></script>
        <script src="../js/jquery.validate.js" type="text/javascript"></script><!--VALIDATION-->
        
        <script src="js/login.js" type="text/javascript"></script><!--VALIDA DATOS DE ENTRADA-->
    </head>
    <body>
        <div id="bg">
            <div id="page">
		<div id="content">
                    <div class="post">
			<h1 align="center">Usted necesita estar logueado para acceder a esta página</h1>
                        <?php
                        
                        
                        if(isset ($_GET["redirect"])){
                            //argumentos para que el user_manager redireccione
                            $args = "?redirect=".$_GET["redirect"];
                        }
                        ?>
                        <form id="loginForm"action="user_manager.php<?php echo $args;?>" method="POST" align="center">
                            <table class="tbl-contacto" align="left">              
                                <tr>
                                    <td> <label for="user">Username:</label></td>
                                    <td> <input id="user" name="data[User][name]" size=15 type="text"/> </td>
                                </tr>
                                <tr>
                                    <td> <label for="pass">Password:</label></td>
                                    <td> <input id="pass" type="password" name="data[User][pass]" size=15 type="text" /> </td>
                                </tr>
                                <tr>
                                    <td style="text-align: left">
                                        <input type="submit" value="login" id="boton"/>
                                    </td>
                                    <td><div id="result" align="center"></div></td>
                                </tr>
                            </table>
                            <p id="mensaje"><strong>Aqui el mensaje de resultado!</strong></p>
                        </form>     
                        
                    </div>
		</div>
		<!-- end #content -->
	</div>
	<!-- end #page -->
        </div>
    </body>
</html>