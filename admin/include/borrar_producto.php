<?php
$query = "SELECT COUNT(*) as cuenta FROM productsbudget WHERE products_idproducts = ".$_POST["idproducts"].";";
//TODO borrar imagen de producto
$result = mysqli_query($link,$query);
$line = mysqli_fetch_array($result, MYSQLI_ASSOC);
if( $line["cuenta"] == 0 ){
    $query = "DELETE FROM products WHERE idproducts = ".$_POST["idproducts"].";";
    mysqli_query($link,$query) or die(mysqli_error());
    echo "<div class='alert alert-primary'>Producto borrado</div>";
}
else echo "<div class='alert alert-warning'>El producto figura en presupuestos, no se pudo borrar</div>";
?>