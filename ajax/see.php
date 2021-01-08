<?php
include ("connect.php") ;
include ("../php/fun.php") ;
session_start();


// -------
$stmt1 = $con->prepare("SELECT `id_user` FROM `seen` WHERE `id_post` = ? AND `id_user` = ? ");
$stmt1->execute(array($_POST['id_post'],$_POST['id_user']));
$rows = $stmt1->fetch();
$count = $stmt1->rowcount();
if($count > 0){
    $stmt2 = $con->prepare("DELETE FROM `seen` WHERE `id_post` = ? AND `id_user` = ? ");
    $stmt2->execute(array( $_POST['id_post'],$_POST['id_user'] ));
}else{
    $stmt3 = $con->prepare("INSERT INTO `seen`( `id_user`, `id_post`)VALUES (:zid_u ,:zid_p)");
    $stmt3->execute(array(
        ':zid_u' =>$_POST['id_user'],
        ':zid_p' => $_POST['id_post'] 
    ));
}



