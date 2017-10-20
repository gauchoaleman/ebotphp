<?php
    include_once "../include/connect_db.php";
    include_once "../include/site_functions.php";
?>
<html>
 <head>
  <title>Login</title>
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link href="../css/grid.css" rel="stylesheet">
  <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
 </head>
 <body>
 <div class="container">
<?php
session_start();


function ChequearLogin($datos){
    global $link;

    $query = "SELECT idusers,name FROM users WHERE email='".$datos['email']."' AND password='".$datos['password']."';";
    //echo $query;
    $result = mysqli_query($link,$query) or die(mysqli_error());
    $line = mysqli_fetch_array($result, MYSQLI_ASSOC);
    if( !$line )
        return 0;
    else
        return $line['idusers'];
}

if(isset($_POST["email"])){
    if( ($idusers = ChequearLogin($_POST))!= 0 ){
        $_SESSION["idusers"] = $idusers;
        header('Location: menu.php');        
    }
    else {?>
    <div class='row'>
    <div class='col-md-12'>
    Usuario y/o clave inválidos.
    </div>
    </div>
    <?php
        include "include/loginform.php";
    }
}
else {
    include "include/loginform.php";
}
?>
</div>
</body>