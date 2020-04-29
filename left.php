<!--ceci la branche left-->
<div class="col-md-3">
            <div class="list-group">
                <a href="message.php"class="list-group-item active " >
                    <span class="glyphicon glyphicon-envelope">  </span>
                    Messages réçus
                    <?=sizeof(getAllMessageRecusNonLu($_SESSION["iduser"]))
                    ?>
                </a>
                <a href="message_env.php" class="list-group-item" >
                    <span class="glyphicon glyphicon-check">  </span>
                    Messages envoyés
                    <span class="badge"><?=sizeof(getAllMessageRecusNonLu($_SESSION["iduser"]))
                    ?> </span>
                </a>
                <a href="" class="list-group-item" >
                    <span class="glyphicon glyphicon-th">  </span>
                    Messages Archivés
                    <span class="badge">200</span>
                </a>
                <a href="" class="list-group-item list-group-item-danger" >
                    <span class="glyphicon glyphicon-trash">  </span>
                    Messages Spams
                    <span class="badge">5</span>
                </a>
            </div>
        </div>