<?php
include_once "../include/site_functions.php";
session_start();
if( !isset($_SESSION['idusers']))
    header("Location: login.php");

?>
<html>
 <head>
  <title>Botanico Andino Backend</title>
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <link href="../css/grid.css" rel="stylesheet">
  <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
 </head>
 <body>
 <div class="container">
 <?php 
 error_reporting(E_ALL); 
 ?>