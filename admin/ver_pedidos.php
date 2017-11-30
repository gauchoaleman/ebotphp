<?php

function MostrarBudget($idbudgets){
  global $link;
  $total=0;
  $query = "SELECT * FROM productsbudget pb,products p WHERE p.idproducts=pb.products_idproducts AND pb.budgets_idbudgets=$idbudgets;";
  $result= mysqli_query($link,$query);
  ?>
  <div class='row'>

  <div class='col-md-4'><center><strong>Nombre</strong></center></div>
  <div class='col-md-3'><center><strong>Precio</strong></center></div>
  <div class='col-md-3'><center><strong>Cantidad</strong></center></div>
  <div class='col-md-2'><center><strong>Total</strong></center></div>
  </div><?php

    while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {?>
    <form method='GET' data-toggle='validator' action="menu.php?seccion=ver_pedidos">
      <input type='hidden' name='idproducts' value='<?php echo $line["idproducts"]?>'>
      <div class='row'>
          <div class='col-md-4'><center><a href='../index.php?seccion=mostrar_producto&idproducts=<?php echo $line["idproducts"];?>'><?php echo $line["name"];?></a></center></div>
          <div class='col-md-3'><center>$<?php echo $line["price"];?></center></div>
          <div class='col-md-3'><center><input name='qty' type='number' name='qty'  value='<?php echo $line["qty"];?>' required onchange="myFunction(this.value)"></center></div>
          <div class='col-md-2'><center>$<?php echo $line["price"]*$line["qty"];?></center></div>
          <?php $total+= $line["price"]*$line["qty"];?>
    </div>
  </form>

<?php }
 echo "TOTAL: $ $total<br>";
}

function MostrarDetalleCliente($users_idusers){
  global $link;
  if( $users_idusers ){
  $query = "SELECT * FROM users WHERE idusers=$users_idusers;";
  $result= mysqli_query($link,$query);
  $line = mysqli_fetch_array($result, MYSQLI_ASSOC);
    echo "Email: ".$line["email"]."<br>";
    echo "Nombre: ".$line["name"]."<br>";
    echo "Apellido: ".$line["surname"]."<br>";
    echo "Teléfono: ".$line["phone"]."<br>";
    echo "Calle: ".$line["street"]."<br>";
    echo "Nro.: ".$line["streetnr"]."<br>";
    echo "Ciudad: ".$line["city"]."<br>";
    echo "Provincia: ".$line["province"]."<br>";
  }
  else if( $users_idusers=NULL){
    ?><div class="alert alert-info">Éste pedido aún no tiene cliente asociado.</div><?php
  }
}

$result = mysqli_query($link,"SELECT * FROM budgets;");
while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
  ?><div class="alert alert-info">Estado del pedido: <?php print($line["Status"]."</div>  ");
  echo "<strong>Detalle de pedido:</strong><br>";
  MostrarBudget($line["idbudgets"]);
  echo "<strong>Datos cliente:</strong><br>";
  MostrarDetalleCliente($line["users_idusers"]);
}
