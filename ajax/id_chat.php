<?php
include ("connect.php") ;
include ("../php/fun.php") ;
session_start();

$stmt = $con->prepare("SELECT * FROM `o_users` WHERE `o_id` = ?");
$stmt->execute(array($_POST['id']));
$rows_user = $stmt->fetchAll();
foreach($rows_user as $row_user) {
?>

<div class="chat-header clearfix">
<a href="javascript:void(0);" class="btn-detail"><img src="uploads/front/<?php echo $row_user['f_pic'] ?>"
        alt="avatar" />
    <div class="chat-about">
        <div class="chat-with"><?php echo $row_user['o_name'] ?> </div>
        <div class="chat-num-messages"><?php echo $row_user['nic_name'] ?></div>
    </div>
</a>
</div>
<?php
}
// ----------------------------------------------------------------------------------------------
?>


