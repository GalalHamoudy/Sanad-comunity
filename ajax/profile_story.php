<?php
session_start();
include ("connect.php") ;
include ("../php/fun.php") ;
?>
<!--||||||||||||||||||||||||||| PHP CODE |||||||||||||||||||||||||||-->

<div class="header">
    <h2><strong>قصصك</strong>
        [
            <?php echo count_row('SELECT * FROM `story` WHERE `id_users` = ? ORDER BY `time` DESC',$_SESSION['o_id']);?>
        ]
    </h2>
</div>

<!--||||||||||||||||||||||||||| PHP CODE |||||||||||||||||||||||||||-->
<?php  
$stmt = $con->prepare("SELECT * FROM `story` INNER JOIN `o_users` ON story.id_users=o_users.o_id WHERE `id_users` = ?");
$stmt->execute(array($_SESSION['o_id']));
    $rows2 = $stmt->fetchAll();
    foreach($rows2 as $row2) {
?>
<!--||||||||||||||||||||||||||| PHP CODE |||||||||||||||||||||||||||-->

<div class="body l-green mt-1">
    <ul class="header-dropdown">
        <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle"
                data-toggle="dropdown" role="button" aria-haspopup="true"
                aria-expanded="false"> <i class="zmdi zmdi-more"></i> </a>
            <ul class="dropdown-menu dropdown-menu-right text-right">
                <li class="text-center">
                    <button class="btn btn-primary btn-round"
                        onclick="delete_story('<?php echo $row2['id']?>','<?php echo $_SESSION['o_id'] ?>')"><i
                            class="zmdi zmdi-delete"></i> حذف القصة</button>
                </li>
            </ul>
        </li>
    </ul>
    <div class="event-name row">
        <div class="col">
            <h6><?php echo $row2['o_name'] ?></h6>
            <i><?php echo $row2['text']?></i>
            <address><i class="zmdi zmdi-pin"></i> <?php echo $row2['time']?>
            </address>
        </div>
    </div>
</div>
<?php } ?>
