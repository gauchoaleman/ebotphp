<?php
//Agrega producto guardando imágen de producto en directorio /img/prod
$query = "INSERT INTO products (name,description,cattree_idcattree,price)";
$query .= " VALUES ('".$_POST['name']."','".$_POST['pdescription']."',".$_POST['cidcattree'].",'".$_POST['price']."');";
echo $query;
mysqli_query($link,$query) or die(mysqli_error($link));
$lastInsertId = mysqli_insert_id ( $link );

$partes_ruta = pathinfo($_FILES['picture']['name']);

if( $_FILES['picture']['error'] != 0)
    echo "hay que setear el archivo de la imágen.";
else if( strtolower($partes_ruta['extension']) != "png")
    echo "Formatos permitido solamente png";
else {
    $destination = "../img/prod/$lastInsertId.".strtolower($partes_ruta['extension']);
    copy( $_FILES['picture']['tmp_name'],$destination );
    echo "Producto agregado";
}   
?>