<?php
$query = "UPDATE products SET description = '".$_POST['pdescription']."',cattree_idcattree=".$_POST['cidcattree'].",price='".$_POST["price"]."'  WHERE idproducts = ".$_POST["idproducts"].";";
mysqli_query($link,$query) or die(mysqli_error());

if( $_FILES['picture']['name']) {
    $partes_ruta = pathinfo($_FILES['picture']['name']);
    print_r($_FILES);
    echo "ext:".$partes_ruta['extension'];
    if( strtolower($partes_ruta['extension']) != "png")
        echo "Formato permitido solamente png";
    else {
        echo "Temp file name size".filesize($_FILES['picture']['tmp_name']);
        $destination = "../imgprod/".$_POST["idproducts"].".png";
        unlink($destination);
        echo $destination."/".$_FILES['picture']['tmp_name'];
        echo "rename: ".copy( $_FILES['picture']['tmp_name'],$destination );
    }   
}

?>