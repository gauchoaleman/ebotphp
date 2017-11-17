<?php
function NuevoEnCarrito($idproducts)
{
  global $link;
  $query = "SELECT COUNT(*) as cuenta FROM productsbudget pb WHERE pb.products_idproducts=$idproducts AND pb.budgets_idbudgets=".$_SESSION['idbudgets'].";";
  $result= mysqli_query($link,$query);
  $line = mysqli_fetch_array($result, MYSQLI_ASSOC);

  if( $line["cuenta"]==0 )
    return TRUE;
  else {
    return FALSE;
  }
}

function AgregaraCarrito($idproducts,$qty)
{
    global $link;
    if( !isset($_SESSION['idbudgets']) || !$_SESSION['idbudgets']){
        $ins_bud_query = "INSERT INTO budgets () VALUES ();";
        $ins_bud_res = mysqli_query($link,$ins_bud_query);
        $_SESSION["idbudgets"] = $idbudgets = mysqli_insert_id($link);
        $ins_prod_query = "INSERT INTO productsbudget (budgets_idbudgets,qty, ";
        $ins_prod_query .= "products_idproducts) VALUES ($idbudgets,$qty,$idproducts);";
        $ins_prod_res = mysqli_query($link,$ins_prod_query);
    }
    else if( NuevoEnCarrito($idproducts))
    {
      $ins_prod_query = "INSERT INTO productsbudget (budgets_idbudgets,qty, ";
      $ins_prod_query .= "products_idproducts) VALUES (".$_SESSION['idbudgets'].",$qty,$idproducts);";
      $ins_prod_res = mysqli_query($link,$ins_prod_query);
    }
    else{
        $idbudgets = $_SESSION["idbudgets"];
        $updquery = "UPDATE productsbudget SET qty=qty+$qty WHERE budgets_idbudgets=$idbudgets AND products_idproducts=$idproducts;";
        $updres = mysqli_query($link,$updquery);
    }

}

if( !isset($_GET["idproducts"]))
    die();
if( !isset($_GET["qty"]))
    $qty = 1;
else
    $qty = $_GET["qty"];

AgregaraCarrito($_GET["idproducts"],$qty);
?>
<div class='alert alert-primary'>Producto agregado en <a href='index.php?seccion=mostrar_carrito'>carrito</a></div>
<?php
include "listar_productos.php";
?>
