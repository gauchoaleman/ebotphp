<?php
$query = "INSERT INTO products (description,cattree_idcattree,price)";
$query .= " VALUES ('".$_POST['pdescription']."',".$_POST['cidcattree'].",'".$_POST['price']."');";

mysqli_query($link,$query) or die(mysqli_error());
?>