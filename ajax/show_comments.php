<?php
include ("connect.php") ;
include ("../php/fun.php") ;
// start session
session_start();
?>
<!--||||||||||||||||||||||||||| PHP CODE |||||||||||||||||||||||||||-->

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
          <p class='mt-2 x'><?php echo $row4['text']?></p>
          <?php if(! is_null($row4['picture'])){?>
          <img src="uploads/comments/<?php echo $row4['picture']?>" class="img-fluid"
            style="max-height: 400px;">
          <?php } ?>
        </div>
        <?php } ?>
      </div>
    </div>
  </div>
</div>
                  