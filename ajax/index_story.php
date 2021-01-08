<?php
include ("connect.php") ;
include ("../php/fun.php") ;
// start session
session_start();
?>
<!--||||||||||||||||||||||||||| PHP CODE |||||||||||||||||||||||||||-->

<div class="header">
<h2>
        <button class="btn btn-primary btn-simple btn-round" onclick="index_story()"><i class="zmdi zmdi-refresh"></i>  
        <strong>قصص </strong> الاصدقاء
        [ 
            <?php echo count_row_1("SELECT * FROM `story` WHERE 1");?>
        ] 
        </button>
    </h2>
</div>
<!--||||||||||||||||||||||||||| PHP CODE |||||||||||||||||||||||||||-->
<?php
            $stmt = $con->prepare("SELECT * FROM `story` INNER JOIN `o_users` ON story.id_users=o_users.o_id WHERE 1");
            $stmt->execute();
            $rows = $stmt->fetchAll();
            foreach($rows as $row) {
?>
<!--||||||||||||||||||||||||||| PHP CODE |||||||||||||||||||||||||||-->
<div class="body l-green mt-1">
    <div class="event-name row">
        <div class="col">
            <a href="friend.php?id_friend=<?php echo  $row['o_id']?>">
                <h6><?php echo  $row['o_name']?></h6>
            </a>
            <i><?php echo  $row['text']?></i>
            <address><i class="zmdi zmdi-pin"></i> <?php echo  $row['time']?>
            </address>
        </div>
    </div>
</div>
<?php } ?>
