<?php
include_once "include/connect_db.php";
include_once "include/site_functions.php";

function EmailUsado($email){
  global $link;
  $query = "SELECT COUNT(*) as cuenta FROM users WHERE email='$email';";
  $result = mysqli_query($link,$query);
  $line = mysqli_fetch_array($result, MYSQLI_ASSOC);
  if($line["cuenta"] == 0)
    return FALSE;
  else
    return TRUE;
}

if(isset($_POST["enviarreg"])){
  if($_POST["inputPassword"] != $_POST["inputPasswordConfirm"]){
    ?><div class="alert alert-warning">Las claves ingresadas no coinciden.</div><?php
    include "include/loginform.php";
    include "include/regform.php";
  }
  elseif (EmailUsado($_POST["email"])){
    ?><div class="alert alert-warning">El email ya está registrado</div><?php
    include "include/loginform.php";
    include "include/regform.php";
  }
  else {
    explode($_POST);
    $query = "INSERT INTO users (email,name,surname,phone,city,province,password) ";
    $query .= "VALUES ('$email','$name','$surname','$phone','$city','$province','$inputPassword')";
    $result = mysqli_query($link,$query);
  }
}
elseif(!isset($_POST["enviarlogin"])) {
    include "include/loginform.php";
    include "include/regform.php";
}?>
