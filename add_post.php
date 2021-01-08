<?php
// start session
session_start();

// the auth
if( isset($_SESSION['o_id']) ){
//----- included file 
include ("connect.php") ;
include ('php/fun.php');
include ('inc/start.php');
include ('inc/nav1.php');

?>
<!--||||||||||||||||||||||||||| PHP CODE |||||||||||||||||||||||||||-->

<section class="content profile-page">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-lg-5 col-md-5 col-sm-12">
                    <h2> موقع التواصل الاجتماعي سند </h2>
                    <ul class="breadcrumb padding-0">
                        <li class="breadcrumb-item"><a><i class="zmdi zmdi-home"></i></a></li>

                        <li class="breadcrumb-item active"> اضافة منشور </li>
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

        <!--||||||||||||||||||||||||||| PHP CODE |||||||||||||||||||||||||||-->
        <?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (isset($_POST['upload_post'])) {

        $post_text = $_POST['text_post'] ;
        if ($post_text == ''){
            massageX(' يرجي وضع نص في منشورك لان تركه فارغا يعارض سياسات الموقع '); 
        }else{
        
        if( $_FILES['img_post']['name'] !='' && $_FILES['img_post']['tmp_name'] != '' && $_FILES['img_post']['size'] !='' ) {
            // ------------------------ upload image -----------------------------------------------

            $image_post      = $_FILES['img_post']['name'] ;
            $tmp_dir_post    = $_FILES['img_post']['tmp_name'] ;
            $imageSize_post  = $_FILES['img_post']['size'] ;

            $imgExt_post = strtolower(pathinfo($image_post,PATHINFO_EXTENSION)) ;


            // ---------------- function pic_val() -------------------
            $uploadOk = pic_val($image_post,$tmp_dir_post,$imageSize_post,$imgExt_post);
            // ---------------- function pic_val() -------------------


            if ($uploadOk == 0 ) {

                // ---------------- function pic_massage() -------------------
                pic_massage();    
                // ---------------- function pic_massage() -------------------
                
            }else{
                $upload_dir_post = 'uploads/posts/' ;
                $picProfile_post = rand(1000, 1000000).".".$imgExt_post ;
                move_uploaded_file($tmp_dir_post, $upload_dir_post.$picProfile_post) ;

                $stmt = $con->prepare("INSERT INTO `posts`(`id_users`, `text`, `time`, `picture`,`type`) VALUES (:zid, :ztext, :ztime, :zpic,:ztype)");
                $stmt->execute(array(
                    ':zid'      => $_SESSION['o_id'],
                    ':ztext'    => filter_var($_POST['text_post'], FILTER_SANITIZE_STRING),
                    ':ztime'    => date("Y-m-d h:i:sa") ,
                    ':zpic'     => $picProfile_post,
                    ':ztype'    => $_POST['type']
                ));
                massageX(' تم النشر بنجاح');  
            }

        }else{
            $stmt = $con->prepare("INSERT INTO `posts`(`id_users`, `text`, `time`,`type`) VALUES (:zid, :ztext, :ztime,:ztype)");
            $stmt->execute(array(
                ':zid'      => $_SESSION['o_id'],
                ':ztext'    => filter_var($_POST['text_post'], FILTER_SANITIZE_STRING),
                ':ztime'    => date("Y-m-d h:i:sa") ,
                ':ztype'    => $_POST['type']
            ));
            massageX(' تم النشر بنجاح'); 
        }
    }
}
    }
?>
<!--||||||||||||||||||||||||||| PHP CODE |||||||||||||||||||||||||||-->

        <div class="row clearfix">
            <div class="col-lg-12 col-md-12">
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane page-calendar active" id="schedule">
                        <div class="row">
                            <div class="col-md-12 col-lg-12">
                                <div class="card">
                                    <div class="header">
                                        <h2><strong>اضافة</strong> منشور</h2>
                                    </div>
                                    <!-------------------------------------------- the form  ----------------------------->
                                    <form action="<?php echo  htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST"
                                        enctype="multipart/form-data">
                                        <input id="where_type" type="hidden" value="0" />
                                        <div class="body m-b-10">
                                            <div class="form-group">
                                                <textarea rows="4" class="form-control no-resize"
                                                    placeholder="انشر الان ما تفكر فيه ....."
                                                    name="text_post"></textarea>
                                            </div>
                                            <div class="form-group text-right">
                                                <div class="radio inlineblock m-r-20">
                                                    <input type="radio" name="type" id="else" class="with-gap"
                                                        value="غير ذلك" checked>
                                                    <label for="else"> غير ذلك </label>
                                                </div>
                                                <div class="radio inlineblock">
                                                    <input type="radio" name="type" id="sport" class="with-gap"
                                                        value="رياضية">
                                                    <label for="sport"> رياضية </label>
                                                </div>
                                                <div class="radio inlineblock">
                                                    <input type="radio" name="type" id="plotical" class="with-gap"
                                                        value="سياسة">
                                                    <label for="plotical"> سياسة </label>
                                                </div>
                                                <div class="radio inlineblock">
                                                    <input type="radio" name="type" id="sad" class="with-gap"
                                                        value="حزين">
                                                    <label for="sad"> حزين </label>
                                                </div>
                                                <div class="radio inlineblock">
                                                    <input type="radio" name="type" id="happy" class="with-gap"
                                                        value="كوميدي">
                                                    <label for="happy"> كوميدي </label>
                                                </div>
                                            </div>
                                            <hr>
                                            <div id="yourBtn" onclick="getFile()"> ارفاق صورة </div>
                                            <div style='height: 0px;width: 0px; overflow:hidden;'><input id="upfile"
                                                    type="file" value="upload" onchange="sub(this)" name="img_post" />
                                            </div>

                                            <div class="post-toolbar-b">
                                                <button class="btn btn-primary btn-round" type="submit"
                                                    name="upload_post" id="add_post">نشر</button>
                                            </div>
                                        </div>
                                </div>
                                </form>
                                <!-------------------------------------------- the form  ----------------------------->
                            </div>
                            <div class="col-md-12 col-lg-12">
                                <div class="card">
                                    <div class="header">
                                        <h2><strong>اضافة</strong> منشور صوتي</h2>
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
    </div>
</section>

<!--||||||||||||||||||||||||||| PHP CODE |||||||||||||||||||||||||||-->
<?php

}else{
    header('location:login.php');
    exit();
}
$recorder = "assets/js/re.js";
include('inc/end.php') ;
?>