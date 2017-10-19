<?php
//Conecta y elige base de datos
$link = mysqli_connect('localhost', 'root', 'root')
or die('No se pudo conectar: ' . mysql_error());
mysqli_select_db($link,"ebotanicoandino");
?>