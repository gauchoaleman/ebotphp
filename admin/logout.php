<?php
session_start();
unset($_SESSION["idusers"]);
header("Location: login.php");
?>