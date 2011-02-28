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

<div class="carOverview">
	<table>
		<tr>
			<td class="cartOvervireCantidad">1</td>
			<td class="cartOverviewDetail"><a href="#">Pito de Goma Comun</a></td>
			<td class="cartOverviewPrice">$ 150</td>
		</tr>
		<tr>
			<td class="cartOvervireCantidad">1</td>
			<td class="cartOverviewDetail"><a href="#">Sean Michaels Macizo</a></td>
			<td class="cartOverviewPrice">$ 250</td>
		</tr>
		<tr>
			<td class="cartOvervireCantidad">1</td>
			<td class="cartOverviewDetail"><a href="#">Chuck Norris</a></td>
			<td class="cartOverviewPrice">$ 1.000</td>
		</tr>
		<tr class="cartOverviewTotal">
			<td class="cartOvervireCantidad">3</td>
			<td class="cartOverviewDetail">Productos</td>
			<td class="cartOverviewPrice">$ 1.400</td>
		</tr>
	</table>
	<a href="#" class="linkButton">checkout</a>
</div>