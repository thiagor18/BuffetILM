<?php
require_once "ShoppingCart.php";

$member_id = 2; // you can your integerate authentication module here to get logged in member

$shoppingCart = new ShoppingCart();
?>
<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<title>Carrito de compras php con integración de pasarela de pago | Murialdo</title>

<!-- Bootstrap core CSS -->
<link href="dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Custom styles for this template -->
<link href="assets/sticky-footer-navbar.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>



</head>

<body>
<header> 
  <!-- Fixed navbar -->
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark"> <a class="navbar-brand" href="index.php">Murialdo Buffet ILM</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active"> <a class="nav-link" href="index.php">Inicio <span class="sr-only">(current)</span></a> </li>
      </ul>
      <form class="form-inline mt-2 mt-md-0">
        <input class="form-control mr-sm-2" type="text" placeholder="Buscar" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Busqueda</button>
      </form>
    </div>
  </nav>
</header>

<!-- Begin page content -->

<div class="container">
  <h3 class="mt-5">Comercio electronico con PHP y MySQL</h3>
  <hr>
  <div class="row">
    <div class="col-12 col-md-12"> 
      <!-- Contenido -->
<?php
$cartItem = $shoppingCart->getMemberCartItem($member_id);
$item_quantity = 0;
$item_price = 0;
if (! empty($cartItem)) {
    if (! empty($cartItem)) {
        foreach ($cartItem as $item) {
            $item_quantity = $item_quantity + $item["quantity"];
            $item_price = $item_price + ($item["price"] * $item["quantity"]);
        }
    }
}
?>
<div id="shopping-cart">
        <div class="txt-heading">
            <div class="txt-heading-label">Carrito de Compras</div>

            <a id="btnEmpty" href="index.php?action=empty"><img
                src="image/empty-cart.png" alt="empty-cart"
                title="Empty Cart" class="float-right" /></a>
            <div class="cart-status">
                <div> Cantidad Total: <?php echo $item_quantity; ?></div>
                <div> Precio Total: $ <?php echo $item_price; ?></div>
            </div>
        </div>
        <?php
        if (! empty($cartItem)) {
            ?>
<?php
            require_once ("cart-list.php");
            ?>
<?php
        } // End if !empty $cartItem
        ?>

</div>
    <form name="frm_customer_detail" action="process-order.php" method="POST">
    <div class="frm-heading">
        <div class="txt-heading-label">Detalles de Cliente</div>
    </div>
    <div class="frm-customer-detail">
        <div class="form-row">
            <div class="input-field">
                <input type="text" name="name" id="name"
                    PlaceHolder="Nombre del cliente" required>
            </div>

            <div class="input-field">
                <input type="text" name="address" PlaceHolder="Dirección" required>
            </div>
        </div>

        <div class="form-row">
            <div class="input-field">
                <input type="text" name="city" PlaceHolder="Ciudad" required>
            </div>

            <div class="input-field">
                <input type="text" name="state" PlaceHolder="Estado" required>
            </div>
        </div>

        <div class="form-row">
            <div class="input-field">
                <input type="text" name="zip" PlaceHolder="Codigo Zip" required>
            </div>

            <div class="input-field">
                <input type="text" name="country" PlaceHolder="Pais" required>
            </div>
        </div>
    </div>
    <div style="margin:3px;">
        <input type="submit" class="btn-action" name="proceed_payment" value="Proceder con el Pago">
    </div>
    </form>
      <!-- Fin Contenido --> 
    </div>
  </div>
  <!-- Fin row --> 
  
</div>
<!-- Fin container -->
<footer class="footer">
  <div class="container"> <span class="text-muted">
    <p>Códigos <a href="http://murialdo.edu.ar/" target="_blank">Murialdo</a></p>
    </span> </div>
</footer>

<!-- Bootstrap core JavaScript
    ================================================== --> 
<script src="dist/js/bootstrap.min.js"></script> 
<!-- Placed at the end of the document so the pages load faster -->
</body>
</html>