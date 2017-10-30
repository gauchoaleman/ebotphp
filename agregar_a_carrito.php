<?php

function ProdQtyInBudget($idproducts,$idbudgets)
{
    global $link;

    $query = "SELECT COUNT(*) AS cuenta FROM products_budget";
}

function AgregaraCarrito($idproducts,$qty)
{
    global $link;

    if( !$_SESSION['idbudgets'] ){
        $query = "INSERT INTO budgets";
        $_SESSION["idbudgets"] = $idbudgets = mysqli_insert_id($link);
    }
    if( ProdQtyInBudget($idproducts,$idbudgets))
        $insquery = "INSERT INTO products_budget (budgets_idbudgets,qty,budgets_idbudgets,products_idproducts) VALUES ($idbudgets,$qty,$idbudgets,$idproducts);";
    }

}

if( !isset($_GET["idproducts"]))
    die();
elseif( !isset($_GET["qty"]))
    die();
else 
    AgregaraCarrito($_GET["idproducts"],$_GET["qty"]);
