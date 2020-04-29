

<?php
session_start();
require_once("Function.php");
$id=$_GET["id"];
$iduser=$_SESSION["iduser"];
deletereceive($id);
header("location:message.php")


  ?>