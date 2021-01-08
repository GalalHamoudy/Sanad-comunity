<?php
// start session
session_start();

if( isset($_SESSION['o_id']) ){

include ("connect.php") ;
include ('php/fun.php');
include ('inc/start.php');
include ('inc/nav1.php');

?>
<!--||||||||||||||||||||||||||| PHP CODE |||||||||||||||||||||||||||-->

<section class="content profile-page text-right">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-lg-5 col-md-5 col-sm-12">
                <h2> موقع التواصل الاجتماعي سند </h2>
                    <ul class="breadcrumb padding-0">
                        <li class="breadcrumb-item"><a><i class="zmdi zmdi-home"></i></a></li>
                        <li class="breadcrumb-item active"> القصص و المنشورات </li>
                    </ul>
                </div>
                <div class="col-lg-7 col-md-7 col-sm-12">
                    <div class="input-group m-b-0">
                        <input type="text" class="form-control" placeholder="بحث ...">
                        <span class="input-group-addon">
                            <i class="zmdi zmdi-search"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12">
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane page-calendar active" id="schedule">
                        <div class="row">
                            <div class="col-lg-4 col-md-12">
                                <div class="card" id="index_story">
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
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-8">
                                <div class="card" id="index_posts">
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
                                        <button class="btn btn-primary btn-simple btn-round"> <i class="zmdi zmdi-alarm"></i> <?php echo $row4['time'] ?></button>
                                        </div>
                                        <hr>
                                        <audio controls>
                                            <source src="uploads/Recorder/<?php echo $row4['record'] ?>" type="audio/WAV">
                                            Your browser does not support the audio element.
                                            </audio>
                                        </div>
                                    </div>
                                    <?php }else{ ?>
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--||||||||||||||||||||||||||| PHP CODE |||||||||||||||||||||||||||-->
<?php
}else{
    header('location:login.php');
    exit();
}
$recorder = "assets/js/re.js";
include('inc/end.php')
?>