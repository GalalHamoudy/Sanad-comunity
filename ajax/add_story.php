<?php
include ("connect.php") ;
include ("../php/fun.php") ;
session_start();
if (isset($_POST['body'])){
    $body       =  $_POST['body'];
        $stmt = $con->prepare("INSERT INTO `story`(`id_users`, `text`, `time`)VALUES (:zid , :ztext , :ztime)");
        $stmt->execute(array(
            ':zid' => $_SESSION['o_id'],
            ':ztext' => filter_var($body, FILTER_SANITIZE_STRING) ,
            ':ztime' => date("h:i:sa")
        ));
    }else{
        echo 'error';
    }


?>