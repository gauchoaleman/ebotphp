<?php
include_once "include/connect_db.php";

function mostrar_producto($idproducts){
    global $link;
    $query = "SELECT * FROM products where idproducts=$idproducts";
    $result = mysqli_query($link,$query);
    if( mysqli_num_rows ( $result )){

        ?><div class='row'><?php
            $line = mysqli_fetch_array($result, MYSQLI_ASSOC);?>
            <div class='col-md-4'>
            <img src ='img/prod/<?php echo $line["idproducts"]; ?>.png' width='450'
            <?php
            if( $line["cattree_idcattree"] == 15)
              echo "height='500'";
            elseif ( $line["cattree_idcattree"] == 14)
              echo "height='637'>" ;
            ?>
            <br>
            </div>
            <div class='col-md-8' >
            <strong><?php echo $line["name"];?></strong><br>
            <?php echo $line["description"];?><br>
            <strong>$<?php echo $line["price"];?></strong>
            </center>
            <a href="index.php?seccion=agregar_a_carrito&idproducts=<?php echo $line["idproducts"]; ?>"><i title="Agregar a carrito" class="fa fa-shopping-cart" aria-hidden="true" ></i>
            </div>

            <?php
    }
    else
        echo "<div class='alert alert-danger'>No se encuentra la página.</div>";
}
if( isset($_GET["seccion"]) && isset($_GET["idproducts"])){
    mostrar_producto($_GET["idproducts"]);
}
else
    echo "<div class='alert alert-danger'>No se encuentra la página.</div>";

?>
