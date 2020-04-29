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
           
             <div class="panel panel-primary">
                <div class="panel-heading">Send Message</div>
                <div class="panel-body">


                    <form method="GET" action="add.php">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Sujet</label>
                            <input name="sujet" type="text" class="form-control" placeholder="Sujet">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Utilisateur</label>
                            <select class="form-control" name="users">
                                <?php  $liste=getUsers();
                                foreach ($liste as $value ) {
                                     echo "<option value='{$value["iduser"]}'>{$value["prenomuser"]} {$value["nameuser"]}</option>";
                                 }
                                  ?>
                                

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Message</label>
                            <textarea class="form-control" name="message">
                            </textarea>
                        </div>
                        <button type="submit" class="btn btn-default">Send</button>
                    </form>



                </div>
            </div>



        </div>
      


        </div>

    </div>

</div>


</body>
</html>