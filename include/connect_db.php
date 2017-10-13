<?php
$link = mysqli_connect('localhost', 'root', 'root')
or die('No se pudo conectar: ' . mysql_error());
//TODO seleccionar base con función mysqli_select_db($db)
mysqli_select_db($link,"ebotanicoandino");
//mysqli_query($link,"USE ebotanicoandino;");
?>