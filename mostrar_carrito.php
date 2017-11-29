<?php
function CtdProductosEnCarrito()
{
  global $link;

  $query = "SELECT COUNT(*) as cuenta FROM productsbudget WHERE budgets_idbudgets=".$_SESSION["idbudgets"];
  $result= mysqli_query($link,$query);
  $line = mysqli_fetch_array($result, MYSQLI_ASSOC);
  return $line["cuenta"];
}

if( !isset($_SESSION['idbudgets']) || !$_SESSION['idbudgets']){?>
  <div class='alert alert-warning'>No tiene productos en el carrito</div><?php
  include "listar_productos.php";
}
else if( CtdProductosEnCarrito()==0){?>
  <div class='alert alert-warning'>No tiene productos en el carrito</div><?php
  include "listar_productos.php";
}
else{
  $total = 0;
  $query = "SELECT * FROM productsbudget pb,products p WHERE p.idproducts=pb.products_idproducts AND pb.budgets_idbudgets=".$_SESSION["idbudgets"];
  $result= mysqli_query($link,$query);
?>
<div class='row'>
<div class='col-md-2'><center><strong></strong></center></div>
<div class='col-md-3'><center><strong>Nombre</strong></center></div>
<div class='col-md-2'><center><strong>Precio</strong></center></div>
<div class='col-md-3'><center><strong>Cantidad</strong></center></div>
<div class='col-md-2'><center><strong>Total</strong></center></div>
</div><?php

  while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {?>
  <form method='GET' data-toggle='validator' action="index.php?seccion=agregar_a_carrito">
  <input type='hidden' name='idproducts' value='<?php echo $line["idproducts"]?>'>
  <div class='row'>
  <div class='col-md-2'><center><strong>&nbsp;</strong></center></div>
  <div class='col-md-3'><center><a href='index.php?seccion=mostrar_producto&idproducts=<?php echo $line["idproducts"];?>'><?php echo $line["name"];?></a></center></div>
  <div class='col-md-2'><center>$<?php echo $line["price"];?></center></div>
<?php //todo ?>
  <div class='col-md-3'><center><input name='qty' type='number' name='qty'  value='<?php echo $line["qty"];?>' required onchange="myFunction(this.value)"></center></div>
  <div class='col-md-2'><center>$<?php echo $line["price"]*$line["qty"];?></center></div>

  <?php $total+= $line["price"]*$line["qty"];?>
  </div>
</form>
  <?php
  }
  ?>
  <div class='row'>
  <div class='col-md-2'>&nbsp;</div>
  <div class='col-md-3'>&nbsp;</div>
  <div class='col-md-2'><center><strong>&nbsp;</strong></center></div>
  <div class='col-md-3'><center><strong>Total</strong></center></div>
  <div class='col-md-2'><center><strong>$<?php echo $total ?></strong></center></div>

</div><?php
}

?><div class="alert alert-info"><a href='index.php?seccion=vaciar_carrito'>Vaciar carrito</a></div><?php

if( !isset($_SESSION["idusers"]) && CtdProductosEnCarrito()>=1 ){?>
    <div class="alert alert-info">Para pagar debe loguearse, <a href='index.php?seccion=login_register'>Click aquí</a></div>
<?php }
  else{
    ?><div class="alert alert-info">Para enviar pedido <a href='index.php?seccion=enviar_pedido'>Click aquí</a></div><?php
}
