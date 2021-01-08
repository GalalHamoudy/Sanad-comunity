<?php
include ("connect.php") ;
session_start();

$stmt = $con->prepare("INSERT INTO `chat`(`from_id`, `to_id`, `text`, `time`)VALUES (:zfid ,:ztid , :ztext , :ztime)");
$stmt->execute(array(
    ':zfid'     => $_SESSION['o_id'],
    ':ztid'     => $_POST['help_id'],
    ':ztext'    => $_POST['text'] ,
    ':ztime'    => date("Y-m-d H:i:s")
));