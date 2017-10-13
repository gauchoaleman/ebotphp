<?php
$query = "INSERT INTO products (description,cattree_idcattree,price)";
$query .= " VALUES ('".$_POST['pdescription']."',".$_POST['cidcattree'].",'".$_POST['price']."');";

mysqli_query($link,$query) or die(mysqli_error());
$lastInsertId = mysqli_insert_id ( $link );

$partes_ruta = pathinfo($_FILES['picture']['name']);
//print_r($_FILES);
if( $_FILES['picture']['error'] != 0)
    echo "hay que setear el archivo de la imágen.";
else if( strtolower($partes_ruta['extension']) != "png")
    echo "Formatos permitido solamente png";
else {
    //echo "Temp file name size".filesize($_FILES['picture']['tmp_name']);
    $destination = "../img/prod/$lastInsertId.".strtolower($partes_ruta['extension']);
    //echo $destination."/".$_FILES['picture']['tmp_name'];
    //echo "rename: ".copy( $_FILES['picture']['tmp_name'],$destination );
    echo "Producto agregado";
}   
?>