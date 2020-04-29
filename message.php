<?php

session_start();
if(!isset($_SESSION["user"])){
     $_SESSION["erreur"]="votre login ou password invalid";
     $_SESSION["type_erreur"]="warning";
    header("location:connexion.php");

}
require_once("Function.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link href="bootstrap/css/bootstrap.min.css"  rel="stylesheet" >
</head>
<body>
<div class="container">

   <?php 
include_once("header.php");
?>

    <div class="row">
        
<?php 
include_once("left.php");
?>
        <div class="col-md-9">
            <?php 
if (sizeof(getAllMessageRecusNonLu($_SESSION["iduser"]))>0){
 ?>
<div class="col-md-12">
                <div class="alert alert-danger">
                   <h4> Vous avez <?=sizeof(getAllMessageRecusNonLu($_SESSION["iduser"]))?> nouveaux messages</h4>
                </div>
            </div>
            <?php
}
            ?>
            
            
            <div class="col-md-12">
                <a href="send.php" class="btn btn-primary">Envoyer un Message</a>
                <p/>
                <div class="panel panel-primary">
                    <div class="panel-heading"> Liste des Massages Réçus</div>
                    <table class="table table-hover">
                        
                        <thead>
                          <tr><th>De</th> <th>Email</th><th>Sujet</th><th>Date</th>
                          <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $liste=getAllMessageRecus($_SESSION["iduser"]);
                            foreach($liste as $value){
                                $usersend=getUserById($value["usersend"]);
                             ?>
                            <tr class="bg-info">
                                <td><?= $usersend["nameuser"] ?></td>
                                <td><?= $usersend["emailuser"] ?></td>
                                <td><?= $value["title"] ?></td>
                                <td><?= $value["datesend"] ?></td>
                                <td>
                                    <a class="btn btn-danger" href="del.php?id=<?=$value["idmessage"] ?>">
                                        <span class="glyphicon glyphicon-trash"></span></a>
                                    <button class="btn btn-success">
                                        <span class="glyphicon glyphicon-cog"></span>
                                    </button>
                                </td>
                            </tr>
                            
                           <?php } ?>
                        </tbody>

                    </table>

                </div>

            </div>




        </div>

    </div>

</div>


</body>
</html>