<?php

// start Session
session_start();

// Use phpmailer lib
use PHPMailer\PHPMailer\PHPMailer;

//----- included file 
include ("connect.php") ;
include ('php/fun.php');
include ('inc/start.php');

?>
<!--||||||||||||||||||||||||||| PHP CODE |||||||||||||||||||||||||||-->
<div class="authentication" style="overflow-x: hidden;">

<!--||||||||||||||||||||||||||| PHP CODE |||||||||||||||||||||||||||-->
        <?php
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $name       =  $_POST['name'];
            $email      =  $_POST['email'];
            $body       =  $_POST['body'];
    
            require_once "PHPMailer/PHPMailer.php";
            require_once "PHPMailer/SMTP.php";
            require_once "PHPMailer/Exception.php";
    
            $mail = new PHPMailer();
    
            //SMTP Settings
            $mail->isSMTP();
            $mail->Host = "smtp.gmail.com";
            $mail->SMTPAuth = true;
            $mail->Username = "kira2000united@gmail.com";
            $mail->Password = 'wow2000kira';
            $mail->Port = 465;
            $mail->SMTPSecure = "ssl"; 
    
            //Email Settings
            $mail->isHTML(true);
            $mail->setFrom($email, $name);
            $mail->addAddress("kira2000united@gmail.com");
            $mail->Subject = 'problem in sanad website';
            $mail->Body = $body;
    
            if ($mail->send()) {
                massageX(' تم ارسال البيانات .... سيتم التواصل معك قريبا');
            } else {
                massageX(' حدث خطا اثناء ارسال البيانات  .... يرجي اعادة المحاولة ');
            }
        }
        ?>
<!--||||||||||||||||||||||||||| PHP CODE |||||||||||||||||||||||||||-->

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
                            <h5> لاسترجاع البيانات </h5>
                            <span> سنساعدك في اقرب وقت لاستعادة حسابك </span>
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
                                <input type="text" placeholder=" اكتب نص المشكلة " class="form-control" name="body"
                                    autocomplete="new-password" required maxlength="30" minlength="8">
                                <span class="input-group-addon"><i class="zmdi zmdi-email"></i></span>
                            </div>
                            <div class="footer">
                                <button class="btn btn-primary btn-round btn-block" type="submit"> ارسال البيانات
                                </button>
                            </div>
                        </form>
                        <!-------------------------------- the form  -------------------------------->
                        <a class="link" href="login.php">هل تذكرت بيانات الحساب ؟</a>
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