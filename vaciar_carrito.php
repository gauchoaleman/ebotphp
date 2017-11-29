<?php
if (!isset($_SESSION["idbudgets"])){
?><div class="alert alert-info">No tiene productos en el carrito</div><?php
  include( "listar_productos.php");
}
else{
  $pbquery = "DELETE FROM productsbudget WHERE budgets_idbudgets=".$_SESSION["idbudgets"].";";
  mysqli_query($link,$pbquery);
  $bquery = "DELETE FROM budgets WHERE idbudgets=".$_SESSION["idbudgets"].";";
  mysqli_query($link,$bquery);
  unset($_SESSION["idbudgets"]);
  ?><div class="alert alert-info">Carrito fue vaciado</div><?php
}
