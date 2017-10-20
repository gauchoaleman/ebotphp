<?php
include_once "include/connect_db.php";

function mostrar_producto($idproducts){
    global $link;
    $query = "SELECT * FROM products where idproducts=$idproducts";
    $result = mysqli_query($link,$query);

    echo "<div class='row' >";
        $line = mysqli_fetch_array($result, MYSQLI_ASSOC);
        echo "<div class='col-md-4' >";
        echo "<img src ='img/prod/".$line["idproducts"].".png' height='500' width='450'><br>";
        echo "</div>";
        echo "<div class='col-md-8' >";
        echo "<strong>".$line["name"]."</strong><br>";
        echo $line["description"]."<br>";
        echo "<strong>$".$line["price"]."</strong>";
        echo "</center></div>";
}
if( isset($_GET["seccion"]) && isset($_GET["idproducts"])){
    mostrar_producto($_GET["idproducts"]);
}
else
    echo "No se encuentra la página.";

?>