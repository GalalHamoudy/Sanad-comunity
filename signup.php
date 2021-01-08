<?php

// start Session
session_start();

//----- included file 
require ("connect.php") ;
include ('inc/start.php');

//------ store some information in SESSION
if($_SERVER['REQUEST_METHOD'] == 'POST'){
 
    $_SESSION['n_name']         = $_POST['name'];
    $_SESSION['n_email']        = $_POST['email'];
    $_SESSION['n_password']     = $_POST['password'];

    header('location:new_info.php');
    exit();
    
}

?>
<!--||||||||||||||||||||||||||| PHP CODE |||||||||||||||||||||||||||-->

<div class="authentication" style="overflow-x: hidden;">
    <div class="container">
        <div class="col-md-12 content-center mg_ba">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="company_detail">
                        <h4 class="logo"> موقع سند </h4>
                        <h4> هو موقع تواصل اجتماعي جديد و هو الاول من نوعه في الشرق الاوسط </h4>
                        <div class="footer">
                            <hr>
                            <ul>
                                <li>
                                    <p>موقع تجريبي يحاكي الفيس بوك </p>
                                </li>
                                <hr>
                                <li>
                                    <h6> تم تصميم الموقع و برمجته من قبل محمد جلال</h6>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-12 offset-lg-1">
                    <div class="card-plain">
                        <div class="header">
                            <h5>انشاء حساب</h5>
                            <span>انشئ حساب جديد, و انضم الينا</span>
                        </div>
                        <!-------------------------------------------- the form  ----------------------------->
                        <form class="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="اسم المستخدم" name="name"
                                autocomplete="off" required maxlength="30" minlength="8">
                                <span class="input-group-addon"><i class="zmdi zmdi-account-circle"></i></span>
                            </div>
                        
                            <div class="input-group">
                                <input type="email" class="form-control" placeholder="البريد الالكتروني" name="email"
                                    autocomplete="off" required maxlength="30" minlength="13">
                                <span class="input-group-addon"><i class="zmdi zmdi-email"></i></span>
                            </div>
                            <div class="input-group">
                                <input type="password" placeholder=" كلمة المرور الجديدة" class="form-control" name="password"
                                    autocomplete="new-password" required maxlength="30" minlength="8">
                                <span class="input-group-addon"><i class="zmdi zmdi-lock"></i></span>
                            </div>
                            <div class="footer">
                                <button class="btn btn-primary btn-round btn-block" type="submit"> أنشاء الحساب
                                </button>
                            </div>
                        </form>
                        <!-------------------------------- the form  -------------------------------->
                        <a class="link" href="login.php">هل لديك حساب بالفعل ؟</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--||||||||||||||||||||||||||| PHP CODE |||||||||||||||||||||||||||-->
<?php
//----- included file
include ('inc/end.php');
?>