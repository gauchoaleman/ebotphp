<?php
$query = "SELECT COUNT(*) as cuenta FROM products WHERE cattree_idcattree = ".$_POST["idcattree"].";";

$result = mysqli_query($link,$query);
$line = mysqli_fetch_array($result, MYSQLI_ASSOC);
if( $line["cuenta"] == 0 ){
    $query = "DELETE FROM cattree WHERE idcattree = ".$_POST["idcattree"].";";
    mysqli_query($link,$query) or die(mysqli_error());
    echo "Categoría borrada";
}
else 
    echo "La categoría figura en productos, no se pudo borrar";
?>