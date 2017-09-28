<?php
$query = "SELECT COUNT(*) as cuenta FROM productsbudget WHERE products_idproducts = ".$_POST["idproducts"].";";

$result = mysqli_query($link,$query);
$line = mysqli_fetch_array($result, MYSQLI_ASSOC);
if( $line["cuenta"] == 0 ){
    $query = "DELETE FROM products WHERE idproducts = ".$_POST["idproducts"].";";
    mysqli_query($link,$query) or die(mysqli_error());
}
else echo "El producto figura en presupuestos, no se pudo borrar";
?>