<ul class="menu_acceso">
    <li id="home"><a href="index.php">Inicio</a></li>
    <li id="help"><a href="#">Ayuda</a></li>
    <li id="login"><a href="#">Acceso</a></li>
        <?php
          //segun: http://www.webmasterworld.com/php/3190423.htm
          //la correcta forma de pasar arguments es la siguiente:
          $action = "show_status";
          include 'cart_handler.php';
        ?>
        <!-- Modificado por fanky10
    <li id="cart">
            <a href="#">Compra (<strong>0</strong> Items)</a>
        </li>
        -->
</ul><!--end menu_acceso-->