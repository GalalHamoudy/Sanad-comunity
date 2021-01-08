<?php
//start session
session_start();

// get informations from signup page
if( isset($_SESSION['n_name']) && isset($_SESSION['n_email']) && isset($_SESSION['n_password']) ){

//----- included file 
include ("connect.php");
include ('php/fun.php');
include ('inc/start.php');

$the_name   = $_SESSION['n_name'] ;
$the_email  = $_SESSION['n_email'] ;
$the_pass   = $_SESSION['n_password'] ;


//------------- this massages for images validation
$_SESSION['f_massage'] = $_SESSION['b_massage'] = false ;

if($_SERVER['REQUEST_METHOD'] == 'POST'){

// the information from the form ------------------------
    $the_status         = $_POST['status'];
    $the_nic_name       = $_POST['nic_name'];
    $the_sec_place      = $_POST['sec_place'];
    $the_bio            = $_POST['bio'] ;
    $the_address        = $_POST['address'];
    $the_phone          = $_POST['phone'] ;
    $the_birth          = $_POST['birth'] ;
// front image --------------------------------------
    $image_f      = $_FILES['f_img']['name'] ;
    $tmp_dir_f    = $_FILES['f_img']['tmp_name'] ;
    $imageSize_f  = $_FILES['f_img']['size'] ;
// background image --------------------------------------
    $image_b      = $_FILES['b_img']['name'] ;
    $tmp_dir_b    = $_FILES['b_img']['tmp_name'] ;
    $imageSize_b  = $_FILES['b_img']['size'] ;


    $imgExt_f = strtolower(pathinfo($image_f,PATHINFO_EXTENSION)) ;
    $imgExt_b = strtolower(pathinfo($image_b,PATHINFO_EXTENSION)) ;


// ---------------- function pic_val() -------------------
    $uploadOk_f = pic_val($image_f,$tmp_dir_f,$imageSize_f,$imgExt_f);
    $uploadOk_b = pic_val($image_b,$tmp_dir_b,$imageSize_b,$imgExt_b);
// ---------------- function pic_val() -------------------



// end the valdation for background & front image
        if ($uploadOk_b == 1 && $uploadOk_f == 1) {
// ------------------------------        
    $upload_dir_f = 'uploads/front/';
    $picProfile_f = rand(1000, 1000000).".".$imgExt_f ;
    move_uploaded_file($tmp_dir_f, $upload_dir_f.$picProfile_f) ;
// -----------------------
    $upload_dir_b = 'uploads/back/' ;
    $picProfile_b = rand(1000, 1000000).".".$imgExt_b ;
    move_uploaded_file($tmp_dir_b, $upload_dir_b.$picProfile_b) ;
// ----------------------------

    $stmt = $con->prepare("INSERT INTO `o_users`(`o_name`, `o_email`, `o_password`, `status`, `nic_name`, `sec_place`, `phone`, `birth`, `bio`, `address`, `login`, `f_pic`, `b_pic`) VALUES (:zname, :zemail ,:zpassword ,:zstatus, :znic_name ,:zsec_place ,:zphone, :zbirth ,:zbio ,:zaddress ,:zlogin ,:f_pic ,:b_pic)");
    $stmt->execute(array(
        'zname'         => $the_name,
        'zemail'        => $the_email,
        'zpassword'     => $the_pass,
        ':zstatus'      => $the_status ,
        ':znic_name'    => $the_nic_name ,
        ':zsec_place'   => $the_sec_place  ,
        ':zphone'       => $the_phone ,
        ':zbirth'       => $the_birth ,
        ':zbio'         => $the_bio  ,
        ':zaddress'     => $the_address ,
        ':zlogin'       => date("Y-m-d h:i:sa"),
        ':f_pic'        => $picProfile_f ,
        ':b_pic'        => $picProfile_b
    ));
    $_SESSION['cr_massage'] = true ;
    header('location:login.php');
    exit();
}else{
    if ($uploadOk_f == 0){$_SESSION['f_massage'] = true;}
    if ($uploadOk_b == 0){$_SESSION['b_massage'] = true;}
}
}

?>
<!--||||||||||||||||||||||||||| PHP CODE |||||||||||||||||||||||||||-->

<div class="container">
    <div class="card">
        <div class="header">
            <h2><strong>اعدادات</strong> الحساب الرئيسية</h2>
        </div>
        <div class="body">
            <div class="form-group">
                <input type="text" class="form-control" readonly value="اسم المستخدم   <?php echo '  '. $the_name ?>">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" readonly
                    value="البريد الالكتروني  <?php echo '  '. $the_email ?>">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" readonly value="كلمة المرور  <?php echo '  '. $the_pass ?>">
            </div>
        </div>
    </div>

<!--||||||||||||||||||||||||||| PHP CODE |||||||||||||||||||||||||||-->
<?php
if($_SESSION['f_massage']){
    f_pic_massage();
}
if($_SESSION['b_massage']){
    b_pic_massage();
}
?>
<!--||||||||||||||||||||||||||| PHP CODE |||||||||||||||||||||||||||-->

    <div class="card">
        <div class="header">
            <h2><strong>اعدادات</strong> الحساب الفرعية</h2>
        </div>
        <!-------------------------------------------- the form  ----------------------------->
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST" enctype="multipart/form-data">
            <div class="body text-center">
                <div class="row clearfix">
                    <div class="col-lg-6 col-md-12">
                        الحالة الاجتماعية
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="اعزب" name="status" autocomplete="off"
                                required maxlength="15" minlength="3">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        اسم الشهرة او الكناية
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="ميدو" name="nic_name"
                                autocomplete="off" required maxlength="15" minlength="3">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        المركز
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="جرجا" name="sec_place"
                                autocomplete="off" required maxlength="15" minlength="3">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        رقم الهاتف
                        <div class="form-group">
                            <input type="number" class="form-control" placeholder="01x xxx xx xxx" name="phone"
                                autocomplete="off" required maxlength="15" minlength="8">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        تاريخ الميلاد
                        <div class="form-group">
                            <input type="date" class="form-control" placeholder="التاريخ" name="birth"
                                autocomplete="off" required>
                        </div>
                    </div>
                    <hr style="width: 100%;">
                    <div class="col-md-6">
                        <div class="form-group">
                            <textarea rows="4" class="form-control no-resize" placeholder="النبذة الشخصية " name="bio"
                                autocomplete="off" required maxlength="100" minlength="10"></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <textarea rows="4" class="form-control no-resize" placeholder="العنوان الشخصي"
                                name="address" autocomplete="off" required maxlength="100" minlength="10"></textarea>
                        </div>
                    </div>
                    <hr style="width: 100%;">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleFormControlFile1"> صورة الملف الشخصي </label>
                            <input type="file" class="form-control-file" id="exampleFormControlFile1" name="f_img"
                                required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleFormControlFile1"> صورة الغلاف الشخصي </label>
                            <input type="file" class="form-control-file" id="exampleFormControlFile1" name="b_img"
                                required>
                        </div>
                    </div>
                    <hr style="width: 100%;">
                    <div class="col-md-12">
                        <button class="btn btn-primary btn-round" type="submit">حفظ التغييرات</button>
                    </div>
                </div>
            </div>
        </form>
        <!-------------------------------------------- the form  ----------------------------->
    </div>
</div>

<!--||||||||||||||||||||||||||| PHP CODE |||||||||||||||||||||||||||-->
<?php
}else{
    header('location:login.php');
    exit();
}
//----- included file 
include('inc/end.php');
?>