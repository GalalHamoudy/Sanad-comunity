<?php
include ("connect.php") ;
include ("../php/fun.php") ;
session_start();

if( isset($_SESSION['o_id']) ){

    if($_POST['id_user'] == $_SESSION['o_id'] ){

        $stmt = $con->prepare("DELETE FROM `story` WHERE `id` = ? ");
        $stmt->execute(array($_POST['id_story']));

    }else{
        header('location:../profile.php');
        exit();
    }

}else{
    header('location:../login.php');
    exit();
}