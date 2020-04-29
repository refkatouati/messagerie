<?php
session_start();
require_once("Function.php");
$login=$_POST["email"];
$pass=$_POST["pass"];
$cnx=getConnetion();
$rst=mysqli_query($cnx,"select *from user where emailuser='{$login}'");
$exist=0;
if(mysqli_num_rows($rst)>0){
while($d=mysqli_fetch_array($rst)){

			if (password_verify($pass,$d["passworduser"]))
			 {
				
			
    $_SESSION["iduser"]=$d["iduser"];
    $_SESSION["user"]=$d["prenomuser"]." ".$d["nameuser"];
    $_SESSION["etat"]=$d["etatuser"];
$exist=1;
}
}
}
if($exist==0){
    $_SESSION["erreur"]="Merci pour votre connexion";
    $_SESSION["type_erreur"]="warning";
    header("location:connexion.php");
}else {
    $date=date("d-m-Y:m:s");
    $rst=mysqli_query($cnx,"update user set dateaccess='{$date}' where iduser={$_SESSION["iduser"]}");
    header("location:message.php");
}
?>