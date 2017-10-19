<?php
include_once "include/connect_db.php";

//Ctd de columnas al mostrar productos
$cols=3;

$query = "SELECT * FROM products";
$result = mysqli_query($link,$query);
$qty = mysqli_num_rows ( $result );
//echo "qty:".$qty;
$rows = ceil($qty/$cols);
//echo "rows:".$rows;
$last_row_cols = $qty % $cols;
//echo "last_row_cols = ".$last_row_cols;

for( $i=1;$i<=$rows;$i++){
    echo "<div class='row' >";
    for( $j=1;$j<=$cols;$j++){
        $line = mysqli_fetch_array($result, MYSQLI_ASSOC);
        echo "<div class='col-md-4' ><center>";
        echo "<img src ='img/prod/".$line["idproducts"].".png' height='150' width='120'><br>";
        echo $line["name"]."<br>";
        echo "$".$line["price"]."";
        echo "</center></div>";
    }
    echo "</div>";
}
?>