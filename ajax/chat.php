<?php
include ("connect.php") ;
include ("../php/fun.php") ;
session_start();

?>



    <?php

    $stmt = $con->prepare("SELECT * FROM `chat` WHERE `from_id` = ? AND `to_id` = ? OR `to_id` = ? AND `from_id` = ?");
    $stmt->execute(array($_SESSION['o_id'],$_POST['id'],$_SESSION['o_id'],$_POST['id']));
    $rows_user = $stmt->fetchAll();
    foreach($rows_user as $row_user) {
    

if($row_user['from_id'] != $_SESSION['o_id']){
?>

<li class="clearfix mb-2">
            <div class="message my-message">
                <div class="message-data text-center">

                    <span class="message-data-time "><?php echo $row_user['time'] ?> </span>
                </div>
                <hr>
                <span><?php echo $row_user['text'] ?></span>
            </div>
</li>
<?php
}else{
    ?>
<li class="clearfix">
    <div class="message text-right other-message">
        <div class="message-data text-center">

            <span class="message-data-time"><?php echo $row_user['time'] ?></span>
        </div>
        <hr>
        <?php echo $row_user['text'] ?>
    </div>
</li>





    <?php
}}
    ?>

