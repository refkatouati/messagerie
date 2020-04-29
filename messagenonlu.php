<?php
session_start();
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
        }

             ?>     
			
            <div class="col-md-12">
				<a href="" class="btn btn-primary">Envoyer un Message</a>
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
                        	$liste= getAllMessageEnvoyes($_SESSION["iduser"]);
                        	foreach ($liste as $value) {
                        		$usersend=getuserById($value["usersend"]);
                        	
                        	?>
                            <tr class="bg-info">
                            	<td><?=$usersend['nameuser'] ?></td>
                            	<td><?=$usersend['emailuser'] ?></td>
                            	<td><?=$value['title'] ?></td>
                            	<td><?=$value['datesend'] ?></td>
                                <td>
                                    <button class="btn btn-danger">
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </button>
                                    <button class="btn btn-success">
                                        <span class="glyphicon glyphicon-cog"></span>
                                    </button>
                                </td>
                            </tr>
                            <?php
                            } 
                            ?>

                        </tbody>

                    </table>

                </div>

            </div>




        </div>

    </div>

</div>


</body>
</html>