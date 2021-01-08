<?php
// start Session
session_start();

//----- include php files
include ('connect.php') ;
include ('php/fun.php');
include ('inc/start.php');

?>
<!--||||||||||||||||||||||||||| PHP CODE |||||||||||||||||||||||||||-->

<div class="authentication" style="overflow-x: hidden;">

<!--||||||||||||||||||||||||||| PHP CODE |||||||||||||||||||||||||||-->
<?php
if(isset($_SESSION['cr_massage'])){
     massageX('تم تسجيل بنجاح .... يرجي اعادة تسجيل الدخول');
};
?>
<!--||||||||||||||||||||||||||| PHP CODE |||||||||||||||||||||||||||-->

    <div class="container">
        <div class="col-md-12 content-center mg_ba">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="company_detail">
                        <h4 class="logo"> موقع سند </h4>
                        <h4>هو موقع تواصل اجتماعي جديد و هو الاول من نوعه في الشرق الاوسط</h4>
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
                            <h5>تسجيل الدخول</h5>
                        </div>
                         <!-------------------------------- the form  -------------------------------->
                        <form id='login_form'>
                            <div class="input-group">
                                <input type="text" id="login_id" class="form-control" placeholder="اسم المستخدم" name="name" autocomplete="off" >
                                    <span class="input-group-addon"><i class="zmdi zmdi-account-circle"></i></span>
                            </div>
                            <div class="input-group">
                                <input type="password" id="login_pass" class="form-control" placeholder="كلمة المرور" name="password"
                                    autocomplete="new-password" >
                                    <span class="input-group-addon"><i class="zmdi zmdi-lock"></i></span>
                            </div>
                            <div class="footer">
                                <button class="btn btn-primary btn-round btn-block" onclick="login()">تسجيل الدخول</button>
                                <a href="signup.php" class="btn btn-primary btn-simple btn-round btn-block">انشاء
                                    حساب</a>
                            </div>
                        </form>
                         <!-------------------------------- the form  -------------------------------->
                        <a href="forget_pass.php" class="link">هل نسيت كلمة السر ؟</a>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>

<!--||||||||||||||||||||||||||| PHP CODE |||||||||||||||||||||||||||-->
<?php
//----- included file 
include('inc/end.php');
?>