<?php

// start Session
session_start();

//----- included file 
include ('connect.php') ;
include ("../php/fun.php") ;

// get info
$username = $_POST['login_id'];
$password = $_POST['login_pass'];

$stmt = $con->prepare("SELECT `o_id`, `o_name`, `o_email`, `o_password` FROM `o_users` WHERE o_name = ? AND o_password = ?  LIMIT 1");
$stmt->execute(array($username, $password));
$row = $stmt->fetch();
$count = $stmt->rowcount();
    if($count > 0){
        $_SESSION['o_id'] = $row['o_id'] ;
        // xhr.responseText
        echo 'true';
    }else{            
        // xhr.responseText
        echo 'false';
    }   