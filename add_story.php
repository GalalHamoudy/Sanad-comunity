<?php
session_start();

if( isset($_SESSION['o_id']) ){

//----- included file 
include ("connect.php");
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
                        <li class="breadcrumb-item active"> اضافة قصة </li>
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

    if (isset($_POST['upload_story'])) {
        $story_text = $_POST['text_story'] ;
        if ($story_text == ''){
            massageX(' يرجي وضع نص في منشورك لان تركه فارغا يعارض سياسات الموقع ');  
        }else{
            $stmt = $con->prepare("INSERT INTO `story`(`id_users`, `text`, `time`)VALUES (:zid , :ztext , :ztime)");
            $stmt->execute(array(
                ':zid' => $_SESSION['o_id'],
                ':ztext' => filter_var($story_text, FILTER_SANITIZE_STRING) ,
                ':ztime' => date("h:i:sa")
            ));
            massageX(' تم النشر بنجاح');  
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
                                        <h2><strong>اضافة</strong> قصة</h2>
                                    </div>
                                    <div class="body m-b-10">
                                        <!-------------------------------------------- the form  ----------------------------->
                                        <form action="<?php echo  htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
                                            <div class="form-group">
                                                <textarea rows="4" class="form-control no-resize"
                                                    placeholder="انشر الان ما تفكر فيه ....."
                                                    name="text_story"></textarea>
                                            </div>
                                            <div class="post-toolbar-b">
                                                <button class="btn btn-primary btn-round" type="submit" name="upload_story">نشر</button>
                                            </div>
                                        </form>
                                        <!-------------------------------------------- the form  ----------------------------->
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
include('inc/end.php') ;
?>