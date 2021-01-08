<?php
session_start();
ob_start();
if( isset($_SESSION['o_id']) ){

include ("connect.php") ;
include ('php/fun.php');
include ('inc/start.php');
include ('inc/nav1.php');

$_SESSION['id_post'] = $_GET['id_post'];

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
            <li class="breadcrumb-item active"> اضافة ورؤية التعليقات
            </li>
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
              <div class="col-md-12 col-lg-12">
                <div class="card">
                  <div class="header">
                    <h2><strong>المنشور</strong></h2>
                  </div>
                  <div class="body text-right mt-1 mb-1" id="post_post">

                    <!--||||||||||||||||||||||||||| PHP CODE |||||||||||||||||||||||||||-->
                    <?php
                      $stmt = $con->prepare("SELECT * FROM `posts` INNER JOIN `o_users` ON posts.id_users=o_users.o_id WHERE posts.id = ?");
                      $stmt->execute(array($_GET['id_post']));
                      $rows4 = $stmt->fetchAll();
                      foreach($rows4 as $row4) {
                          $_SESSION['help'] = $row4['id'];
                          if( is_null($row4['text'])&& is_null($row4['type'])&& is_null($row4['picture']) ){
                    ?>
                    <!--||||||||||||||||||||||||||| PHP CODE |||||||||||||||||||||||||||-->
                    
                    <div class="post-img">
                      <a href="friend.php?id_friend=<?php echo  $row4['o_id']?>">
                        <img src="uploads/front/<?php echo $row4['f_pic']?>" class="user_pic rounded " alt="User"
                          style="width: 50px;height: 50px;">
                        <span class="m-t-20 m-b-0 post_title"> <?php echo $row4['o_name'] ?> </span>
                      </a>
                      <br>
                      <div class="text-center">
                        <?php
                          $stmt1 = $con->prepare("SELECT `id_user` FROM `seen` WHERE `id_post` = ? AND `id_user` = ? ");
                          $stmt1->execute(array($row4['id'],$_SESSION['o_id']));
                          $rows = $stmt1->fetch();
                          $count = $stmt1->rowcount();
                          if($count > 0){
                          ?>
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
                        <button class="btn btn-primary btn-simple btn-round"> <i class="zmdi zmdi-alarm"></i>
                          <?php echo $row4['time'] ?></button>
                      </div>
                      <hr>
                      <audio controls>
                          <source src="uploads/Recorder/<?php echo $row4['record'] ?>" type="audio/WAV">
                          Your browser does not support the audio element.
                      </audio>
                      <?php }else{ ?>
                    </div>
                    <!--||||||||||||||||||||||||||| PHP CODE |||||||||||||||||||||||||||-->

                    <div class="post-img">
                      <a href="friend.php?id_friend=<?php echo  $row4['o_id']?>">
                        <img src="uploads/front/<?php echo $row4['f_pic']?>" class="user_pic rounded " alt="User"
                          style="width: 50px;height: 50px;">
                        <span class="m-t-20 m-b-0 post_title"> <?php echo $row4['o_name'] ?> </span>
                      </a>
                      <br>
                      <div class="text-center">
                        <?php
                          $stmt1 = $con->prepare("SELECT `id_user` FROM `seen` WHERE `id_post` = ? AND `id_user` = ? ");
                          $stmt1->execute(array($row4['id'],$_SESSION['o_id']));
                          $rows = $stmt1->fetch();
                          $count = $stmt1->rowcount();
                          if($count > 0){
                          ?>
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
                        <button class="btn btn-primary btn-simple btn-round"> <?php echo $row4['type'] ?> </button>
                        <button class="btn btn-primary btn-simple btn-round"> <i class="zmdi zmdi-alarm"></i>
                          <?php echo $row4['time'] ?></button>
                      </div>
                      <hr>
                      <p class="mt-2"><?php echo $row4['text']?></p>
                      <?php if(! is_null($row4['picture'])){?>
                      <img src="uploads/posts/<?php echo $row4['picture']?>" class="img-fluid"
                        style="max-height: 400px;">
                      <?php }} ?>
                    </div>
                      <?php } ?>
                  </div>
                </div>
                <div class="card">
                  <div id="accordion">
                    <div class="card com_card">
                      <div class="card-header" id="headingOne">
                        <h5 class="mb-0 com_all" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
                          aria-controls="collapseOne">
                          <button class="btn btn-link com_btn">
                            <i class="zmdi zmdi-comment-edit"></i> اضافة تعليق
                          </button>
                        </h5>
                      </div>
                      <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-md-12 col-lg-12">
                              <div class="card">
                                <div class="header">
                                  <h2><strong>اضافة</strong> تعليق مع ارفاق صورة</h2>
                                </div>
                                <!-------------------------------------------- the form  ----------------------------->
                                <form id="uploadForm" action="ajax/post.php" method="post">
                                  <input id="id_post" type="hidden" value="<?php echo  $_SESSION['help']?>" />
                                  <div class="body m-b-10">
                                    <div class="form-group">
                                      <textarea rows="4" class="form-control no-resize"
                                        placeholder="انشر الان ما تفكر فيه ....." id="text_post"></textarea>
                                    </div>
                                    <div id="yourBtn" onclick="getFile()"> ارفاق صورة </div>
                                    <div style='height: 0px;width: 0px; overflow:hidden;'>
                                      <input id="upfile" type="file" value="upload" onchange="sub(this)"
                                        name="userImage" />
                                    </div>
                                    <div class="post-toolbar-b">
                                      <button class="btn btn-primary btn-round" class="btnSubmit">نشر</button>
                                    </div>
                                  </div>
                              </div>
                              </form>
                              <!-------------------------------------------- the form  ----------------------------->
                            </div>
                            <div class="col-md-12 col-lg-12">
                                <div class="card">
                                    <div class="header">
                                        <h2><strong>اضافة</strong> تعليق صوتي</h2>
                                    </div>
                                    <!-------------------------------------------- the form  ----------------------------->
                                    <div class="body m-b-10">
                                        <div id="controls">
                                            <button id="recordButton"> <i class="zmdi zmdi-hearing"></i> البدء في
                                                التسجيل</button>
                                            <button id="pauseButton" disabled><i class="zmdi zmdi-pause"></i> ايقاف
                                                مؤقت</button>
                                            <button id="stopButton" disabled><i class="zmdi zmdi-stop"></i>
                                                انهاء</button>
                                            <button id="news" disabled><i class="zmdi zmdi-badge-check"></i> هنا ستظهر
                                                حالة التسجيل</button>
                                                <input type='hidden' id='where_type' value='re_comment'/>
                                        </div>
                                        <div id="formats"> سيتم هنا عرض تنسيق التسجيل </div>
                                        <p id='re'><strong>التسجيلات:</strong></p>
                                        <div class="row clearfix text-right">
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="card">
                                                    <div class="body table-responsive">
                                                        <table class="table table-hover">
                                                            <thead>
                                                                <tr>
                                                                    <th><i class="zmdi zmdi-audio"></i> التسجيل الصوتي
                                                                    </th>
                                                                    <th><i class="zmdi zmdi-file"></i> اسم التسجيل </th>
                                                                    <th><i class="zmdi zmdi-cloud-download"></i> الخيار
                                                                        الاول </th>
                                                                    <th><i class="zmdi zmdi-cloud-upload"></i> الخيار
                                                                        الثاني </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="recordingsList"></tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-------------------------------------------- the form  ----------------------------->
                                </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card com_card" id="show_comments">
                    <div class="card-header" id="headingTwo">
                      <h5 class="mb-0 com_all" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false"
                        aria-controls="collapseTwo">
                        <button class="btn btn-link collapsed com_btn">
                          <i class="zmdi zmdi-comments"></i> عرض التعليقات
                          [ 
                            <?php echo count_row("SELECT * FROM `comments` WHERE `id_post` = ? ",$row4['id']);?>
                          ]
                        </button>
                      </h5>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                      <div class="card-body">
                        <div class="row">
                          <div class="card">

                            <!--||||||||||||||||||||||||||| PHP CODE |||||||||||||||||||||||||||-->
                            <?php
                              $stmt = $con->prepare("SELECT * FROM `comments` INNER JOIN `o_users` ON comments.id_users=o_users.o_id WHERE comments.id_post = ?");
                              $stmt->execute(array($_GET['id_post']));
                              $rows4 = $stmt->fetchAll();
                              foreach($rows4 as $row4) {
                                if( is_null($row4['text'])&& is_null($row4['picture']) ){
                            ?>
                            <!--||||||||||||||||||||||||||| PHP CODE |||||||||||||||||||||||||||-->

                            <div class="body text-right mt-1 mb-1">
                              <a href="friend.php?id_friend=<?php echo  $row4['o_id']?>">
                                <img src="uploads/front/<?php echo $row4['f_pic']?>" class="user_pic rounded "
                                  alt="User" style="width: 50px;height: 50px;">
                                <span class="m-t-20 m-b-0 post_title"> <?php echo $row4['o_name'] ?> </span>
                              </a>
                              <div class="form-group m-b-0 text-left">
                                <span class="date m-l-20"><i class="zmdi zmdi-alarm"></i>
                                  <?php echo $row4['time'] ?></span>
                              </div>
                              <hr>
                              <audio controls>
                                <source src="uploads/Recorder/<?php echo $row4['record'] ?>" type="audio/WAV">
                                Your browser does not support the audio element.
                              </audio>
                            </div>

                            <?php }else{ ?>
                              <div class="body text-right mt-1 mb-1">
                              <a href="friend.php?id_friend=<?php echo  $row4['o_id']?>">
                                <img src="uploads/front/<?php echo $row4['f_pic']?>" class="user_pic rounded "
                                  alt="User" style="width: 50px;height: 50px;">
                                <span class="m-t-20 m-b-0 post_title"> <?php echo $row4['o_name'] ?> </span>
                              </a>
                              <div class="form-group m-b-0 text-left">
                                <span class="date m-l-20"><i class="zmdi zmdi-alarm"></i>
                                  <?php echo $row4['time'] ?></span>
                              </div>
                              <hr>
                              <p class='mt-2 x'><?php echo $row4['text']?></p>
                              <?php if(! is_null($row4['picture'])){?>
                              <img src="uploads/comments/<?php echo $row4['picture']?>" class="img-fluid"
                                style="max-height: 400px;">
                              <?php } ?>
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
include('inc/end.php');
ob_end_flush();
?>