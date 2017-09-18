<html>
 <head>
  <title>Prueba de PHP</title>
  <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
 </head>
 <body>
<?php
// Conectando, seleccionando la base de datos
$link = mysqli_connect('localhost', 'root', 'root')
    or die('No se pudo conectar: ' . mysql_error());
echo 'Connected successfully';
mysqli_select_db($link,'ebotanicoandino') or die('No se pudo seleccionar la base de datos');
mysqli_query($link,"SET NAMES 'utf8'");
// Realizar una consulta MySQL
$query = 'SELECT * FROM cattree';
$result = mysqli_query($link,$query) or die('Consulta fallida: ' . mysqli_error($link));

// Imprimir los resultados en HTML
echo "<table>\n";
while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    echo "\t<tr>\n";
    foreach ($line as $col_value) {
        echo "\t\t<td>$col_value</td>\n";
    }
    echo "\t</tr>\n";
}
echo "</table>\n";

// Liberar resultados
mysqli_free_result($result);


// Cerrar la conexión
mysqli_close($link);


$link = mysqli_connect('localhost', 'root', 'root')
or die('No se pudo conectar: ' . mysql_error());
echo 'Connected successfully';
mysqli_select_db($link,'ebotanicoandino') or die('No se pudo seleccionar la base de datos');
mysqli_query($link,"SET NAMES 'utf8'");
// Realizar una consulta MySQL
$query = 'SELECT * FROM cattree';
$result = mysqli_query($link,$query) or die('Consulta fallida: ' . mysqli_error($link));

// Imprimir los resultados en HTML
echo "<table border=1>\n";
while ($line = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
echo "\t<tr>\n";
foreach ($line as $col_value) {
    echo "\t\t<td>$col_value</td>\n";
}
echo "\t</tr>\n";
}
echo "</table>\n";

// Liberar resultados
mysqli_free_result($result);


// Cerrar la conexión
mysqli_close($link);
?>
</body>
</html>