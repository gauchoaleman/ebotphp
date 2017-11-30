<?php
if( isset($_SESSION["idbudgets"]) && isset($_SESSION["idusers"])){
  $query = "UPDATE budgets SET users_idusers=".$_SESSION["idusers"].", Status = 'Enviado' WHERE idbudgets=".$_SESSION["idbudgets"].";";
  mysqli_query($link,$query);
?><div class='alert alert-primary'>Los datos del pedido se enviaron, pronto nos comunicaremos con usted.</div><?php
}
else{?>
  <div class='alert alert-warning'>No tiene acceso a ésta página.</div><?php
}
