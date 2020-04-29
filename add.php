<?php
session_start();
require_once("Function.php");
$sujet=$_GET["sujet"];
$id_receive=$_GET["users"];
$message=$_GET["message"];
$id_send=$_SESSION["iduser"];


sendMessage($id_send,$id_receive,$sujet,$message);
header("location:message_env.php");





