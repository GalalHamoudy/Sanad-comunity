<?php
include ("connect.php") ;
include ("../php/fun.php") ;
// start session
session_start();
?>
                                   <div class="header">
                                        <h2>
                                            <button class="btn btn-primary btn-simple btn-round" onclick="index_posts()"><i class="zmdi zmdi-refresh"></i>  
                                            <strong>منشورات</strong> الاصدقاء
                                            [ 
                                                <?php echo count_row_1("SELECT * FROM `posts` WHERE 1");?>
                                            ] 
                                            </button>
                                        </h2>
                                    </div>
                                    <!--||||||||||||||||||||||||||| PHP CODE |||||||||||||||||||||||||||-->
                                    <?php  
                                    $stmt = $con->prepare("SELECT * FROM `posts` INNER JOIN `o_users` ON posts.id_users=o_users.o_id WHERE 1");
                                    $stmt->execute();
                                    $rows4 = $stmt->fetchAll();
                                    foreach($rows4 as $row4) {
                                        if( is_null($row4['text'])&& is_null($row4['type'])&& is_null($row4['picture']) ){
?>










<div class="body text-right mt-1 mb-1">
                                        <div class="post-img">
                                        <a href="friend.php?id_friend=<?php echo  $row4['o_id']?>">
                                            <img src="uploads/front/<?php echo $row4['f_pic']?>"
                                                class="user_pic rounded " alt="User" style="width: 50px;height: 50px;">
                                            <span class="m-t-20 m-b-0 post_title"> <?php echo $row4['o_name'] ?>
                                            </span>
                                        </a>
                                        <div class="text-center">
                                        <!--||||||||||||||||||||||||||| PHP CODE |||||||||||||||||||||||||||-->
                                        <?php
                                        $stmt1 = $con->prepare("SELECT `id_user` FROM `seen` WHERE `id_post` = ? AND `id_user` = ? ");
                                        $stmt1->execute(array($row4['id'],$_SESSION['o_id']));
                                        $rows = $stmt1->fetch();
                                        $count = $stmt1->rowcount();
                                        if($count > 0){
                                        ?>
                                        <!--||||||||||||||||||||||||||| PHP CODE |||||||||||||||||||||||||||-->
                                                <button class="btn btn-primary btn-simple btn-round see_btn see"
                                                    onclick="See('<?php echo  $row4['id']?>','<?php echo $_SESSION['o_id'] ?>')">
                                                    <i class="zmdi zmdi-eye"></i>

                                                    [ 
                                                        <?php echo count_row("SELECT * FROM `seen` WHERE `id_post` = ? ",$row4['id']);?>
                                                    ] 
                                        </button>
                                                <?php }else{ ?>
                                                <button class="btn btn-primary btn-simple btn-round see_btn "
                                                    onclick="See('<?php echo  $row4['id']?>','<?php echo $_SESSION['o_id'] ?>')">
                                                    <i class="zmdi zmdi-eye"></i>
                                                    [ 
                                                        <?php echo count_row("SELECT * FROM `seen` WHERE `id_post` = ? ",$row4['id']);?>
                                                    ] 
                                        </button>
                                                <?php } ?>
                                        <a href="post.php?id_post=<?php echo  $row4['id']?>">
                                        <button class="btn btn-primary btn-simple btn-round"><i class="zmdi zmdi-comment-more"></i>  اضافة ورؤية التعليقات 
                                         [ 
                                                        <?php echo count_row("SELECT * FROM `comments` WHERE `id_post` = ?",$row4['id']);?>
                                                    ]
                                         </button>
                                        </a>
                                        <button class="btn btn-primary btn-simple btn-round"> <i class="zmdi zmdi-alarm"></i> <?php echo $row4['time'] ?></button>
                                        </div>
                                        <hr>
                                        <audio controls>
                                            <source src="uploads/Recorder/<?php echo $row4['record'] ?>" type="audio/WAV">
                                            Your browser does not support the audio element.
                                            </audio>
                                        </div>
                                    </div>
























<?php
                                        }else{
                                    ?>
                                    <!--||||||||||||||||||||||||||| PHP CODE |||||||||||||||||||||||||||-->
                                    <div class="body text-right mt-1 mb-1">
                                        <div class="post-img">
                                        <a href="friend.php?id_friend=<?php echo  $row4['o_id']?>">
                                            <img src="uploads/front/<?php echo $row4['f_pic']?>"
                                                class="user_pic rounded " alt="User" style="width: 50px;height: 50px;">
                                            <span class="m-t-20 m-b-0 post_title"> <?php echo $row4['o_name'] ?>
                                            </span>
                                        </a>
                                        <div class="text-center">
                                        <!--||||||||||||||||||||||||||| PHP CODE |||||||||||||||||||||||||||-->
                                        <?php
                                        $stmt1 = $con->prepare("SELECT `id_user` FROM `seen` WHERE `id_post` = ? AND `id_user` = ? ");
                                        $stmt1->execute(array($row4['id'],$_SESSION['o_id']));
                                        $rows = $stmt1->fetch();
                                        $count = $stmt1->rowcount();
                                        if($count > 0){
                                        ?>
                                        <!--||||||||||||||||||||||||||| PHP CODE |||||||||||||||||||||||||||-->
                                                <button class="btn btn-primary btn-simple btn-round see_btn see"
                                                    onclick="See('<?php echo  $row4['id']?>','<?php echo $_SESSION['o_id'] ?>')">
                                                    <i class="zmdi zmdi-eye"></i>

                                                    [ 
                                                        <?php echo count_row("SELECT * FROM `seen` WHERE `id_post` = ? ",$row4['id']);?>
                                                    ] 
                                        </button>
                                                <?php }else{ ?>
                                                <button class="btn btn-primary btn-simple btn-round see_btn "
                                                    onclick="See('<?php echo  $row4['id']?>','<?php echo $_SESSION['o_id'] ?>')">
                                                    <i class="zmdi zmdi-eye"></i>
                                                    [ 
                                                        <?php echo count_row("SELECT * FROM `seen` WHERE `id_post` = ? ",$row4['id']);?>
                                                    ] 
                                        </button>
                                                <?php } ?>
                                        <a href="post.php?id_post=<?php echo  $row4['id']?>">
                                        <button class="btn btn-primary btn-simple btn-round"><i class="zmdi zmdi-comment-more"></i>  اضافة ورؤية التعليقات 
                                         [ 
                                                        <?php echo count_row("SELECT * FROM `comments` WHERE `id_post` = ?",$row4['id']);?>
                                                    ]
                                         </button>
                                        </a>
                                        <button class="btn btn-primary btn-simple btn-round">  <?php echo  $row4['type']?> </button>
                                        <button class="btn btn-primary btn-simple btn-round"> <i class="zmdi zmdi-alarm"></i> <?php echo $row4['time'] ?></button>
                                        </div>
                                        <hr>
                                        <p class='mt-2 x'><?php echo $row4['text']?></p>
                                            <?php if(! is_null($row4['picture'])){?>
                                            <img src="uploads/posts/<?php echo $row4['picture']?>" class="img-fluid"
                                                style="max-height: 400px;">
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <?php } } ?>