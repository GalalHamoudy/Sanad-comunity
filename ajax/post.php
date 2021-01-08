<?php
include ("connect.php") ;
include ("../php/fun.php") ;
session_start();

$is = true;

if(isset($_POST['text_post'])){




if(is_array($_FILES)) {
  if(is_uploaded_file($_FILES['userImage']['tmp_name'])) {
    $image_post      = $_FILES['userImage']['name'] ;
    $tmp_dir_post    = $_FILES['userImage']['tmp_name'] ;
    $imageSize_post  = $_FILES['userImage']['size'] ;


    $imgExt_post = strtolower(pathinfo($image_post,PATHINFO_EXTENSION)) ;
    $uploadOk = 1;

    // Check if image file is a actual image or fake image
      if($tmp_dir_post != ''){
        $check = getimagesize($tmp_dir_post);
        if($check !== false) {
        $uploadOk = 1;
        } else {
        $uploadOk = 0;
        }
    }

    // Check file size
    if ($imageSize_post > 500000) {
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($imgExt_post != "jpg" && $imgExt_post != "png" && $imgExt_post != "jpeg" && $imgExt_post != "gif" ) {
        $uploadOk = 0;
    }


    if ($uploadOk == 0 ) {
      echo 'img_error';
    }else{

      $upload_dir_post = '../uploads/comments/' ;
      $picProfile_post = rand(1000, 1000000).".".$imgExt_post ;
      move_uploaded_file($tmp_dir_post, $upload_dir_post.$picProfile_post) ;

        echo 'good_img';

    $stmt = $con->prepare("INSERT INTO `comments`(`id_users`, `id_post`, `text`, `picture`, `time`) VALUES (:zid_u,:zid_p, :ztext,:zpic, :ztime)");
    $stmt->execute(array(
    ':zid_u'      => $_SESSION['o_id'],
    ':zid_p'      => $_POST['id_post'],
    ':ztext'      => filter_var($_POST['text_post'], FILTER_SANITIZE_STRING),
    ':zpic'       => $picProfile_post,
    ':ztime'      => date("Y-m-d h:i:sa") 
  ));
  $is = false;
  }
}
}
if($_POST['text_post'] !="" && $is) {
  echo 'good_text';
  $stmt = $con->prepare("INSERT INTO `comments`(`id_users`, `id_post`, `text`, `time`) VALUES (:zid_u,:zid_p, :ztext,:ztime)");
  $stmt->execute(array(
  ':zid_u'      => $_SESSION['o_id'],
  ':zid_p'      => $_POST['id_post'],
  ':ztext'      => filter_var($_POST['text_post'], FILTER_SANITIZE_STRING),
  ':ztime'      => date("Y-m-d h:i:sa") 
));

}
}else{
  echo 'error';
}