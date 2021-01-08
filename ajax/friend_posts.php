<?php
include ("connect.php") ;
include ("../php/fun.php") ;
// start session
session_start();

?>
                                    <div class="header">
                                        <h2><strong> منشورات صديقك </strong>
                                            [
                                            <?php echo count_row("SELECT * FROM `posts` WHERE `id_users` = ? ORDER BY `time` DESC",$_SESSION['id_friend']);?>
                                            ]
                                        </h2>
                                    </div>
                                    <!--||||||||||||||||||||||||||| PHP CODE |||||||||||||||||||||||||||-->
                                    <?php  
                                    // $stmt = $con->prepare("SELECT * FROM `posts` WHERE `id_users` = ? ORDER BY `time` DESC");


$stmt = $con->prepare("SELECT * FROM `posts` INNER JOIN `o_users` ON posts.id_users=o_users.o_id WHERE `id_users` = ? ORDER BY `time` DESC");



                                    $stmt->execute(array($_SESSION['id_friend']));
                                    $rows3 = $stmt->fetchAll();
                                    foreach($rows3 as $row3) {
                                        if( is_null($row3['text'])&& is_null($row3['type'])&& is_null($row3['picture']) ){
?>











<div class="body text-right mt-1 mb-1">
                                        <img src="uploads/front/<?php echo $row3['f_pic']?>" class="user_pic rounded "
                                            alt="User" style="width: 50px;height: 50px;">
                                        <span class="m-t-20 m-b-0 post_title"> <?php echo $row3['o_name'] ?> </span>
                                        <div class="text-center">
                                            <!--||||||||||||||||||||||||||| PHP CODE |||||||||||||||||||||||||||-->
                                            <?php
                                                $stmt1 = $con->prepare("SELECT `id_user` FROM `seen` WHERE `id_post` = ? AND `id_user` = ? ");
                                                $stmt1->execute(array($row3['id'],$_SESSION['o_id']));
                                                $rows = $stmt1->fetch();
                                                $count = $stmt1->rowcount();
                                                if($count > 0){
                                            ?>
                                            <!--||||||||||||||||||||||||||| PHP CODE |||||||||||||||||||||||||||-->
                                            <button class="btn btn-primary btn-simple btn-round see_btn see"
                                                onclick="See('<?php echo  $row3['id']?>','<?php echo $_SESSION['o_id'] ?>')">
                                                <i class="zmdi zmdi-eye"></i> [
                                                <?php echo count_row("SELECT * FROM `seen` WHERE `id_post` = ?",$row3['id']);?>
                                                ] </button>
                                            <?php }else{ ?>
                                            <button class="btn btn-primary btn-simple btn-round see_btn "
                                                onclick="See('<?php echo  $row3['id']?>','<?php echo $_SESSION['o_id'] ?>')">
                                                <i class="zmdi zmdi-eye"></i>
                                                [
                                                <?php echo count_row("SELECT * FROM `seen` WHERE `id_post` = ?",$row3['id']);?>
                                                ] 
                                            </button>
                                            <?php } ?>

                                            <a href="post.php?id_post=<?php echo  $row3['id']?>">
                                                <button class="btn btn-primary btn-simple btn-round"><i
                                                        class="zmdi zmdi-comment-more"></i> اضافة ورؤية التعليقات
                                                    [
                                                    <?php echo count_row("SELECT * FROM `comments` WHERE `id_post` = ?",$row3['id']);?>
                                                    ]
                                                </button>
                                            </a>

                                            <button class="btn btn-primary btn-simple btn-round"> <i
                                                    class="zmdi zmdi-alarm"></i>
                                                <?php echo $row3['time'] ?></button>
                                        </div>
                                        <hr>
                                        <audio controls>
                                            <source src="uploads/Recorder/<?php echo $row3['record'] ?>" type="audio/WAV">
                                            Your browser does not support the audio element.
                                            </audio>
                                    </div>





















<?php
                                        }else{
                                    ?>
                                    <!--||||||||||||||||||||||||||| PHP CODE |||||||||||||||||||||||||||-->
                                    <div class="body text-right mt-1 mb-1">
                                        <img src="uploads/front/<?php echo $row3['f_pic']?>" class="user_pic rounded "
                                            alt="User" style="width: 50px;height: 50px;">
                                        <span class="m-t-20 m-b-0 post_title"> <?php echo $row3['o_name'] ?> </span>
                                        <div class="text-center">
                                            <!--||||||||||||||||||||||||||| PHP CODE |||||||||||||||||||||||||||-->
                                            <?php
                                                $stmt1 = $con->prepare("SELECT `id_user` FROM `seen` WHERE `id_post` = ? AND `id_user` = ? ");
                                                $stmt1->execute(array($row3['id'],$_SESSION['o_id']));
                                                $rows = $stmt1->fetch();
                                                $count = $stmt1->rowcount();
                                                if($count > 0){
                                            ?>
                                            <!--||||||||||||||||||||||||||| PHP CODE |||||||||||||||||||||||||||-->
                                            <button class="btn btn-primary btn-simple btn-round see_btn see"
                                                onclick="See('<?php echo  $row3['id']?>','<?php echo $_SESSION['o_id'] ?>')">
                                                <i class="zmdi zmdi-eye"></i> [
                                                <?php echo count_row("SELECT * FROM `seen` WHERE `id_post` = ?",$row3['id']);?>
                                                ] </button>
                                            <?php }else{ ?>
                                            <button class="btn btn-primary btn-simple btn-round see_btn "
                                                onclick="See('<?php echo  $row3['id']?>','<?php echo $_SESSION['o_id'] ?>')">
                                                <i class="zmdi zmdi-eye"></i>
                                                [
                                                <?php echo count_row("SELECT * FROM `seen` WHERE `id_post` = ?",$row3['id']);?>
                                                ] 
                                            </button>
                                            <?php } ?>

                                            <a href="post.php?id_post=<?php echo  $row3['id']?>">
                                                <button class="btn btn-primary btn-simple btn-round"><i
                                                        class="zmdi zmdi-comment-more"></i> اضافة ورؤية التعليقات
                                                    [
                                                    <?php echo count_row("SELECT * FROM `comments` WHERE `id_post` = ?",$row3['id']);?>
                                                    ]
                                                </button>
                                            </a>
                                            <button class="btn btn-primary btn-simple btn-round">
                                                <?php echo $row3['type']?> </button>
                                            <button class="btn btn-primary btn-simple btn-round"> <i
                                                    class="zmdi zmdi-alarm"></i>
                                                <?php echo $row3['time'] ?></button>
                                        </div>
                                        <hr>
                                        <p class='mt-2'><?php echo $row3['text']?>
                                        </p>
                                        <div class="post-img">
                                            <?php if(! is_null($row3['picture'])){ ?>
                                            <img src="uploads/posts/<?php echo $row3['picture']?>" class="img-fluid"
                                                style="max-height: 400px;">
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <?php } } ?>
