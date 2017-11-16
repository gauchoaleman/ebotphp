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
<div class='col-md-3'><center><strong>Nombre</strong></center></div>
<div class='col-md-2'><center><strong>Precio</strong></center></div>
<div class='col-md-2'><center><strong>Cantidad</strong></center></div>
<div class='col-md-2'><center><strong>Total</strong></center></div>
</div><?php

  while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {?>
  <div class='row'>
  <div class='col-md-3'><center><a href='index.php?seccion=mostrar_producto&idproducts=<?php echo $line["idproducts"];?>'><?php echo $line["name"];?></a></center></div>
  <div class='col-md-2'><center><?php echo $line["price"];?></center></div>
  <div class='col-md-2'><center><?php echo $line["qty"];?></center></div>
  <div class='col-md-2'><center><?php echo $line["price"]*$line["qty"];?></center></div>
  <?php $total+= $line["price"]*$line["qty"];?>
  </div>
  <?php
  }
}
?>
