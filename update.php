<?php
//start session
session_start();

if( isset($_SESSION['o_id']) ){

//----- included file 
include ("connect.php") ;
include ('php/fun.php');
include ('inc/start.php');


$_SESSION['uploadOk_f'] = $_SESSION['uploadOk_b'] = false;


if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $idid               = $_SESSION['o_id'];
    $the_email          = $_POST['the_email'] ;
    $the_pass           = $_POST['the_pass'] ;
    $the_phone          = $_POST['phone'] ;
    $the_birth          = $_POST['birth'] ;
    $the_name           = filter_var($_POST['the_name']     , FILTER_SANITIZE_STRING) ;
    $the_status         = filter_var($_POST['status']       , FILTER_SANITIZE_STRING) ;
    $the_nic_name       = filter_var($_POST['nic_name']     , FILTER_SANITIZE_STRING) ;
    $the_sec_place      = filter_var($_POST['sec_place']    , FILTER_SANITIZE_STRING) ;
    $the_bio            = filter_var($_POST['bio']          , FILTER_SANITIZE_STRING) ;
    $the_address        = filter_var($_POST['address']      , FILTER_SANITIZE_STRING) ;

    $uploadOk_b = 1;
    $uploadOk_f = 1;
    $picProfile_ff = true ;
    $picProfile_bb = true ;


    if( $_FILES['f_img']['name'] !='' && $_FILES['f_img']['tmp_name'] != '' && $_FILES['f_img']['size'] !='' ) {
        $image_f      = $_FILES['f_img']['name'] ;
        $tmp_dir_f    = $_FILES['f_img']['tmp_name'] ;
        $imageSize_f  = $_FILES['f_img']['size'] ;

        $imgExt_f = strtolower(pathinfo($image_f,PATHINFO_EXTENSION)) ;

        // ---------------- function pic_val() -------------------
        $uploadOk_f = pic_val($image_f,$tmp_dir_f,$imageSize_f,$imgExt_f);
        // ---------------- function pic_val() -------------------


// end the valdation for front image ----------
        if ($uploadOk_f == 1){
            $upload_dir_f = 'uploads/front/';
            $picProfile_f = rand(1000, 1000000).".".$imgExt_f ;
            move_uploaded_file($tmp_dir_f, $upload_dir_f.$picProfile_f) ; 
        }
  
    }else{
        $picProfile_f = $_POST['new_f_img'] ;
        $picProfile_ff = false;
    }

    if( $_FILES['b_img']['name'] !='' && $_FILES['b_img']['tmp_name'] != '' && $_FILES['b_img']['size'] !='' ) {
        $image_b      = $_FILES['b_img']['name'] ;
        $tmp_dir_b    = $_FILES['b_img']['tmp_name'] ;
        $imageSize_b  = $_FILES['b_img']['size'] ;

        $imgExt_b = strtolower(pathinfo($image_b,PATHINFO_EXTENSION)) ;

        // ---------------- function pic_val() -------------------
        $uploadOk_b = pic_val($image_b,$tmp_dir_b,$imageSize_b,$imgExt_b);
        // ---------------- function pic_val() -------------------

// end the valdation for background image ----------
if ($uploadOk_b == 1){
    $upload_dir_b = 'uploads/back/' ;
    $picProfile_b = rand(1000, 1000000).".".$imgExt_b ;
    move_uploaded_file($tmp_dir_b, $upload_dir_b.$picProfile_b) ;
}

    }else{
        $picProfile_b = $_POST['new_b_img'] ;
        $picProfile_bb = false;
    }

    if ($uploadOk_b == 1 && $uploadOk_f == 1) {

        if($picProfile_ff){
            $filename = 'uploads/front/' .$_POST['new_f_img'];
            unlink($filename);
        }

        if($picProfile_bb){
            $filename = 'uploads/back/' .$_POST['new_b_img'];
            unlink($filename);      
        }


    $stmt = $con->prepare("UPDATE `o_users` SET `o_name`= ? ,`o_email`= ? ,`o_password`= ? ,`status`= ? ,`nic_name`= ? ,`sec_place`= ? ,`phone`= ? ,`birth`= ? ,`bio`= ? ,`address`= ? ,`f_pic`= ? ,`b_pic`= ? WHERE `o_id` = ? ");

    $stmt->execute(array( $the_name, $the_email, $the_pass, $the_status, $the_nic_name, $the_sec_place, $the_phone, $the_birth, $the_bio,$the_address,$picProfile_f ,$picProfile_b ,$idid));



    header('location:profile.php');
    exit();
    }else{
        if($uploadOk_f == 0){
            $_SESSION['uploadOk_f'] = true;
        }
        if($uploadOk_b == 0){
            $_SESSION['uploadOk_b'] = true;
        }
    }
}

$stmt = $con->prepare("SELECT * FROM `o_users` WHERE `o_id` = ?");
$stmt->execute(array($_SESSION['o_id']));
$rows = $stmt->fetchAll();
foreach($rows as $row) {
?>
<!--||||||||||||||||||||||||||| PHP CODE |||||||||||||||||||||||||||-->


<!-------------------------------------------- the form  ----------------------------->
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="POST" enctype="multipart/form-data">
    <div class="container">
        <div class="card">
            <div class="header">
                <h2><strong>اعدادات</strong> الحساب الرئيسية</h2>
            </div>
            <div class="body text-center">
                <div class="row">

                    <div class="col-lg-4 col-md-12">
                        <div class="form-group">
                            اسم المستخدم
                            <input type="text" class="form-control mt-1" value="<?php echo $row['o_name'] ?>" name="the_name"  autocomplete="off" required maxlength="30" minlength="8">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="form-group">
                            البريد الالكتروني
                            <input type="text" class="form-control mt-1" value="<?php echo $row['o_email'] ?>" name="the_email"  autocomplete="off" required maxlength="30" minlength="13">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="form-group">
                            كلمة المرور
                            <input type="text" class="form-control mt-1" value="<?php echo $row['o_password'] ?>" name="the_pass"  autocomplete="off" required maxlength="30" minlength="8">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="header">
                <h2><strong>اعدادات</strong> صور الحساب الرئيسي</h2>
            </div>
            <!--||||||||||||||||||||||||||| PHP CODE |||||||||||||||||||||||||||-->
            <?php
            if($_SESSION['uploadOk_f']){
                f_pic_massage();
            }
            if($_SESSION['uploadOk_b']){
                b_pic_massage();
            }
            ?>
            <!--||||||||||||||||||||||||||| PHP CODE |||||||||||||||||||||||||||-->
            <div class="body">
                <div class="body bg-dark profile-header" style="background-image: url(uploads/back/<?php echo  $row['b_pic']?>);">

                    <div class="row">
                        <div class="col-lg-12 col-md-12">

                            <img src="uploads/front/<?php echo  $row['f_pic']?>" class="user_pic rounded img-raised" alt="User"
                                style="width: 250px;height: 250px;">
                        </div>
                    </div>
                </div>
                <hr style="width: 100%;">
                <div class="row text-center">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleFormControlFile1"> صورة الملف الشخصي </label>
                            <input type="hidden" class="form-control mt-1" value="<?php echo $row['f_pic'] ?>"
                                name="new_f_img">
                            <input type="file" class="form-control-file" id="exampleFormControlFile1" name="f_img">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleFormControlFile1"> صورة الغلاف الشخصي </label>
                            <input type="hidden" class="form-control mt-1" value="<?php echo $row['b_pic'] ?>"
                                name="new_b_img">
                            <input type="file" class="form-control-file" id="exampleFormControlFile1" name="b_img">
                        </div>
                    </div>
                    <hr style="width: 100%;">
                    اذا كنت لا تريد تغيير احدي الصورتين يرجي عدم اضافة اي صور
                </div>
            </div>
        </div>
        <div class="card">
            <div class="header">
                <h2><strong>اعدادات</strong> الحساب الفرعية</h2>
            </div>
            <div class="body text-center">
                <div class="row clearfix">
                    <div class="col-lg-6 col-md-12">
                        الحالة الاجتماعية
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="اعزب" name="status" autocomplete="off"
                                required maxlength="30" minlength="3" value="<?php echo $row['status'] ?>">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        اسم الشهرة او الكناية
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="ميدو" name="nic_name"
                                autocomplete="off" required maxlength="30" minlength="3"
                                value="<?php echo $row['nic_name'] ?>">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        المركز
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="جرجا" name="sec_place"
                                autocomplete="off" required maxlength="30" minlength="3"
                                value="<?php echo $row['sec_place'] ?>">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        رقم الهاتف
                        <div class="form-group">
                            <input type="number" class="form-control" placeholder="01x xxx xx xxx" name="phone"
                                autocomplete="off" required maxlength="20" minlength="8"
                                value="<?php echo $row['phone'] ?>">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        تاريخ الميلاد
                        <div class="form-group">
                            <input type="date" class="form-control" placeholder="التاريخ" name="birth"
                                autocomplete="off" required value="<?php echo $row['birth'] ?>">
                        </div>
                    </div>
                    <hr style="width: 100%;">
                    <div class="col-md-6">
                        <div class="form-group">
                            <textarea rows="4" class="form-control no-resize" placeholder="النبذة الشخصية " name="bio"
                                autocomplete="off" required maxlength="100"
                                minlength="10"><?php echo $row['bio'] ?></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <textarea rows="4" class="form-control no-resize" placeholder="العنوان الشخصي"
                                name="address" autocomplete="off" required maxlength="100"
                                minlength="10"><?php echo $row['address'] ?></textarea>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="card">
            <div class="body text-center">
                <button class="btn btn-primary btn-round" type="submit">حفظ التغييرات</button>

            </div>
        </div>
    </div>
</form>
<!-------------------------------------------- the form  ----------------------------->

<!--||||||||||||||||||||||||||| PHP CODE |||||||||||||||||||||||||||-->
<?php
}
}else{
    header('location:login.php');
    exit();
}
//----- included file 
include('inc/end.php');
?>