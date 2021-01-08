<?php

// start session
session_start();

include ("connect.php") ;

$size   = $_FILES['audio_data']['size']; 
$input  = $_FILES['audio_data']['tmp_name']; 
$output = $_FILES['audio_data']['name'].".wav"; 
$new_name = rand(1,999999999999).".wav";

move_uploaded_file($input,'uploads\\Recorder\\'.$new_name);


$stmt = $con->prepare("INSERT INTO `posts`(`id_users`,`record`,`time`) VALUES (:zid, :zrecord, :ztime)");
$stmt->execute(array(
    ':zid'      => $_SESSION['o_id'],
    ':zrecord'  => $new_name,
    ':ztime'    => date("Y-m-d h:i:sa")
));

?>