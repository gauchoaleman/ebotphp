<?php
$link = mysqli_connect('localhost', 'root', 'root')
or die('No se pudo conectar: ' . mysql_error());
mysqli_query($link,"USE ebotanicoandino;");
?>