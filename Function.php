<?php
function getConnetion(){
$cnx=mysqli_connect("localhost","root","","boite1");
return $cnx;
}
function getUsers(){
    $cnx=getConnetion();
    $rst=mysqli_query($cnx,"select *from user");
    $tab=[];
    while($d=mysqli_fetch_array($rst)){
        $tab[]=$d;

    }
    mysqli_free_result($rst);
    mysqli_close($cnx);
return $tab;
}
function getAllMessageRecus($iduser){
    $cnx=getConnetion();
    $rst=mysqli_query($cnx,"select *from message where userreceive={$iduser} and receivedel=0");
    $tab=[];
    while($d=mysqli_fetch_array($rst)){
        $tab[]=$d;

    }
    mysqli_free_result($rst);
    mysqli_close($cnx);
return $tab;
}
function getAllMessageEnvoyes($iduser){
    $cnx=getConnetion();
    $rst=mysqli_query($cnx,"select *from message where usersend={$iduser}");
    $tab=[];
    while($d=mysqli_fetch_array($rst)){
        $tab[]=$d;

    }
    mysqli_free_result($rst);
    mysqli_close($cnx);
return $tab;
}
function getAllMessageRecusNonLu($iduser){
    $cnx=getConnetion();
    $rst=mysqli_query($cnx,"select *from message where userreceive={$iduser} and receiveread=0");
    $tab=[];
    while($d=mysqli_fetch_array($rst)){
        $tab[]=$d;

    }
    mysqli_free_result($rst);
    mysqli_close($cnx);
return $tab;
}
function sendMessage($idsend,$idreceive,$titre,$message){
    $cnx=getConnetion();
    $date=date("d-m-Y:m:s");
    $req=mysqli_query($cnx,"insert into message values(null,{$idsend},{$idreceive},'{$titre}','{$message}','{$date}',0,0,0,0)");
    mysqli_free_result($rst);
    mysqli_close($cnx);
}
function deletesend($idsend,$idmessage){
    $cnx=getConnetion();  
    $req=mysqli_query($cnx,"update message set senddel=1 where idmessage={$idmessage}");
    mysqli_close($cnx);
}
function deletereceive($idmessage){
    $cnx=getConnetion();  
    $req=mysqli_query($cnx,"update message set receivedel=1 where idmessage={$idmessage}");
    mysqli_close($cnx);
}
function getMessageRecus($idmessage){
    $cnx=getConnetion();
    $rst=mysqli_query($cnx,"update message set $receiveread=1 where idmessage={$idmessage}");
    $message=null;
    while($d=mysqli_fetch_array($rst)){
        $message=$d;

    }
    mysqli_free_result($rst);
    mysqli_close($cnx);
return $message;
}
function getUserById($iduser)
{
     $cnx=getConnetion();
    $rst=mysqli_query($cnx,"select * from user where iduser={$iduser}");
    $tab=null;
    while($d=mysqli_fetch_array($rst)){
        $tab=$d;

}mysqli_free_result($rst);
    mysqli_close($cnx);
return $tab;}