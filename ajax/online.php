<?php
include ("connect.php") ;
include ("../php/fun.php") ; 
session_start();

$stmt = $con->prepare("UPDATE `o_users` SET `online` = ? WHERE `o_id` = ?");
$stmt->execute(array(date("Y-m-d H:i:s"),$_SESSION['o_id']));