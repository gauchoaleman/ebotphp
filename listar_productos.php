<?php
include_once "include/connect_db.php";
include_once "include/site_functions.php";

//Ctd de columnas al mostrar productos
$cols=3;
$products_per_page=12;

$query = "SELECT * FROM products ";
if( isset($_GET["cattree_idcattree"]) )
    $query .= "WHERE cattree_idcattree=".$_GET["cattree_idcattree"]." ";

$result = mysqli_query($link,$query);
$qty = mysqli_num_rows ( $result );

if( !isset($_GET["pagina"])){
    $inicio=0;
    $pagina=1;
}
else{
    $pagina = $_GET["pagina"];
    if (!$pagina) {
       $inicio = 0;
       $pagina = 1;
    }
    else {
       $inicio = ($pagina - 1) * $products_per_page;
    }
}
//calculo el total de páginas
$total_paginas = ceil($qty / $products_per_page);
$page_query = "SELECT idproducts,name,price,cattree_idcattree FROM products ";
if( isset($_GET["cattree_idcattree"]) )
    $page_query .= "WHERE cattree_idcattree=".$_GET["cattree_idcattree"]." ";
$page_query .= "ORDER BY idproducts ASC LIMIT ".$inicio."," . $products_per_page;

$page_res = mysqli_query($link,$page_query);
//echo "qty:".$qty;
$rows = ceil($qty/$cols) ;
//echo "rows:".$rows;
$last_row_cols = $qty % $cols;
//echo "last_row_cols = ".$last_row_cols;
//Todo selector de categorias en listar productos
/*
echo "<div class='row' >";
echo "<div class='col-md-2' >".CategoryCombo(FALSE)."</div>";
echo "<div class='col-md-10' ></div>";
echo "</div>";
*/
for( $i=1;$i<=$rows;$i++){
  if( $i==$rows && $j>$last_row_cols )
      continue;
    echo "<div class='row' >";
    for( $j=1;$j<=$cols;$j++){

        if( $line = mysqli_fetch_array($page_res, MYSQLI_ASSOC)) {?>
            <div class='col-md-4' ><center><a href='index.php?seccion=mostrar_producto&idproducts=<?php echo $line["idproducts"];?>'>
            <img src ='img/prod/<?php echo $line["idproducts"]; ?>.png' height='150' width='<?php echo ($line["cattree_idcattree"] == 15 ? 170 : 106);?>' ><br>
            <?php echo $line["name"];?><br>
            <center>$<?php echo $line["price"]; ?>
            </a>&nbsp;<a href="index.php?seccion=agregar_a_carrito&idproducts=<?php echo $line["idproducts"]; ?>"><i class="fa fa-shopping-cart" aria-hidden="true" title="Agregar a carrito"></i></center></a>
</div><?
        }
        else
            break;
    }
    echo "</div>";
}

$url="index.php?seccion=listar_productos";
if( isset($_GET["cattree_idcattree"]) )
    $url.= "&cattree_idcattree=".$_GET["cattree_idcattree"];
if ($total_paginas > 1) {
    if ($pagina != 1)
       echo '<a href="'.$url.'&pagina='.($pagina-1).'"><i class="fa fa-arrow-left" aria-hidden="true" ></i></a>';
       for ($i=1;$i<=$total_paginas;$i++) {
          if ($pagina == $i)
             //si muestro el índice de la página actual, no coloco enlace
             echo $pagina;
          else
             //si el índice no corresponde con la página mostrada actualmente,
             //coloco el enlace para ir a esa página
             echo '  <a href="'.$url.'&pagina='.$i.'">'.$i.'</a>  ';
       }
       if ($pagina != $total_paginas)
          echo '<a href="'.$url.'&pagina='.($pagina+1).'"><i class="fa fa-arrow-right" aria-hidden="true" ></i></a>';
 }
?>
