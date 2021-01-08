<?php
// start session
session_start();
ob_start();
if( isset($_SESSION['o_id']) ){
//----- included file 
include ("connect.php");
include ('php/fun.php');
include ('inc/start.php');
include ('inc/nav1.php');

if($_GET['id_friend'] == $_SESSION['o_id'] ){
    header('location:profile.php');
    exit();
}

$_SESSION['id_friend'] = $_GET['id_friend'];
  
$stmt = $con->prepare("SELECT * FROM `o_users` WHERE `o_id` = ?");
$stmt->execute(array($_GET['id_friend']));
$rows = $stmt->fetchAll();
foreach($rows as $row) {

?>

<section class="content profile-page">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-lg-5 col-md-5 col-sm-12">
                    <h2> موقع التواصل الاجتماعي سند </h2>
                    <ul class="breadcrumb padding-0">
                        <li class="breadcrumb-item"><a><i class="zmdi zmdi-home"></i></a></li>
                        <li class="breadcrumb-item active"> حساب صديقك <?php echo $row['o_name']?> </li>
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
                <div class="card">
                    <div class="body bg-dark profile-header"
                        style="background-image: url(uploads/back/<?php echo  $row['b_pic']?>);">
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <img src="uploads/front/<?php echo  $row['f_pic']?>" class="user_pic rounded img-raised"
                                    alt="User" style="width: 250px;height: 250px;">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane page-calendar active" id="schedule">
                        <div class="row">
                            <div class="col-lg-4 col-md-12">
                                <div class="card">
                                    <div class="header">
                                        <h2><strong>المعلومات</strong></h2>
                                    </div>
                                    <div class="body text-right">
                                    <small class="text-muted">الحالة : </small>
                                        <p>

                                        <!--||||||||||||||||||||||||||| PHP CODE |||||||||||||||||||||||||||-->
                                        <?php 
                                        $online = $row['online'];
                                        $curr_time = strtotime(date('Y-m-d H:i:s') . '-10 second');
                                        $curr_time = date('Y-m-d H:i:s',$curr_time);

                                        if($online > $curr_time){
                                            ?>  متصل الان <i class="zmdi zmdi-circle online"></i><?php
                                        }else{
                                            ?> غير متصل <i class="zmdi zmdi-circle offline"></i><?php
                                        }
                                        ?>
                                        <!--||||||||||||||||||||||||||| PHP CODE |||||||||||||||||||||||||||-->

                                        </p>
                                        <hr>
                                        <small class="text-muted">الاسم : </small>
                                        <p><?php echo $row['o_name'] ?></p>
                                        <hr>
                                        <small class="text-muted">اسم الشهرة او الكنية : </small>
                                        <p><?php echo $row['nic_name'] ?></p>
                                        <hr>
                                        <small class="text-muted">النبذة : </small>
                                        <p><?php echo $row['bio'] ?></p>
                                        <hr>
                                        <small class="text-muted">العنوان : </small>
                                        <p><?php echo $row['address'] ?></p>
                                        <hr>
                                        <small class="text-muted">البريد الالكتروني : </small>
                                        <p><?php echo $row['o_email'] ?></p>
                                        <hr>
                                        <small class="text-muted">الحالة الاجتماعية : </small>
                                        <p><?php echo $row['status'] ?></p>
                                        <hr>
                                        <small class="text-muted">تاريخ الميلاد : </small>
                                        <p><?php echo $row['birth'] ?></p>
                                        <hr>
                                        <small class="text-muted">رقم الهاتف : </small>
                                        <p><?php echo $row['phone'] ?></p>
                                        <hr>
                                        <small class="text-muted">المركز : </small>
                                        <p><?php echo $row['sec_place'] ?></p>
                                        <hr>
                                        <small class="text-muted">تاريخ الانضمام: </small>
                                        <p class="m-b-0"><?php echo $row['login'] ?></p>
                                    </div>
                                </div>
                                <?php } ?>
                                <div class="card text-right" id="friend_story">
                                    <div class="header">
                                        <h2><strong> قصص صديقك </strong>
                                            [
                                            <?php echo count_row("SELECT * FROM `story` WHERE `id_users` = ? ORDER BY `time` DESC",$_GET['id_friend']);?>
                                            ]
                                        </h2>
                                    </div>

                                    <!--||||||||||||||||||||||||||| PHP CODE |||||||||||||||||||||||||||-->
                                    <?php  
                                    $stmt = $con->prepare("SELECT * FROM `story` INNER JOIN `o_users` ON story.id_users=o_users.o_id WHERE `id_users` = ? ORDER BY `time` DESC");
                                    $stmt->execute(array($_GET['id_friend']));
                                    $rows2 = $stmt->fetchAll();
                                    foreach($rows2 as $row2) {
                                    ?>
                                    <!--||||||||||||||||||||||||||| PHP CODE |||||||||||||||||||||||||||-->

                                    <div class="body l-green mt-1">
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
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-8">
                                <div class="card" id="friend_posts">
                                    <div class="header">
                                        <h2><strong> منشورات صديقك </strong>
                                            [
                                            <?php echo count_row("SELECT * FROM `posts` WHERE `id_users` = ? ORDER BY `time` DESC",$_GET['id_friend']);?>
                                            ]
                                        </h2>
                                    </div>

                                    <!--||||||||||||||||||||||||||| PHP CODE |||||||||||||||||||||||||||-->
                                    <?php  
                                    $stmt = $con->prepare("SELECT * FROM `posts` INNER JOIN `o_users` ON posts.id_users=o_users.o_id WHERE `id_users` = ? ORDER BY `time` DESC");
                                    $stmt->execute(array($_GET['id_friend']));
                                    $rows3 = $stmt->fetchAll();
                                    foreach($rows3 as $row3) {
                                        if( is_null($row3['text'])&& is_null($row3['type'])&& is_null($row3['picture']) ){
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
                                    <?php }else{ ?>
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
include('inc/end.php');
ob_end_flush();
?>