<?php
include ("connect.php") ;
include ("../php/fun.php") ;
session_start();

if( isset($_SESSION['o_id']) ){

    if($_POST['id_user_post'] == $_SESSION['o_id'] ){



        $stmt1 = $con->prepare("SELECT  `picture` FROM `posts` WHERE `id` = ? ");
        $stmt1->execute(array($_POST['id_post']));
        $rows = $stmt1->fetchAll();
        foreach($rows as $row) {
            $filename = '../uploads/posts/' .$row['picture'];
            unlink($filename);
        }
        $stmt = $con->prepare("DELETE FROM `posts` WHERE `id` = ? ");
        $stmt->execute(array($_POST['id_post']));
    }else{
        header('location:../login.php');
        exit();
    }

}else{
    header('location:../login.php');
    exit();
}