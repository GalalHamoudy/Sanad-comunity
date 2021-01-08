<?php

//----- included file
include ("connect.php") ;

// ---------------------
// ---------------------
// ---------------------
function massageX($massage){
    ?>
    <div class="alert alert-warning alert-dismissible fade show text-right mb-1 x" role="alert">
        <strong> <?php echo $massage ?> </strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php
}
function f_pic_massage(){
    ?>
    <div class="alert alert-warning alert-dismissible fade show text-right mb-1 x" role="alert">
        <strong> يوجد مشكلة في الصورة الشخصية .. يرجي تغيير الصورة لانها لاتتوافق مع سياسات الموقع </strong>
        <ul>
        <li>لابد ان تكون الصورة من النوع jpg & png & gif & jpeg</li>
        <li> حجم الصورة لابد ان لا يتعدي ال 500 كيلوبايت </li>
        </ul>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php

}
function b_pic_massage(){
    ?>
    <div class="alert alert-warning alert-dismissible fade show text-right mb-0 x" role="alert">
        <strong> يوجد مشكلة في صورة الغلاف .. يرجي تغيير الصورة لانها لاتتوافق مع سياسات الموقع </strong>
        <ul>
        <li>لابد ان تكون الصورة من النوع jpg & png & gif & jpeg</li>
        <li> حجم الصورة لابد ان لا يتعدي ال 500 كيلوبايت </li>
        </ul>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php
}
function pic_massage(){
    ?>
    <div class="alert alert-warning alert-dismissible fade show text-right mb-0 x" role="alert">
        <strong>  يوجد مشكلة في الصورة .. يرجي تغيير الصورة لانها لاتتوافق مع سياسات الموقع</strong>
        <ul>
        <li>لابد ان تكون الصورة من النوع jpg & png & gif & jpeg</li>
        <li> حجم الصورة لابد ان لا يتعدي ال 500 كيلوبايت </li>
        </ul>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php
}
// ---------------------
// ---------------------
// ---------------------
function pic_val($name,$tmp_name,$size,$extension){

    $extension = strtolower(pathinfo($name,PATHINFO_EXTENSION)) ;

    $uploadOk = 1;

    // Check if image file is a actual image or fake image
    if($tmp_name != ''){
        $check = getimagesize($tmp_name);
        if($check !== false) {
        $uploadOk = 1;
        } else {
        $uploadOk = 0;
        }
    }

    // Check file size
    if ($size > 500000) {
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($extension != "jpg" && $extension != "png" && $extension != "jpeg" && $extension != "gif" ) {
        $uploadOk = 0;
    }
    return $uploadOk ;
}
// ---------------------
// ---------------------
// ---------------------
function count_row($sql,$param){
    global $con ;
    $stmt = $con->prepare($sql);
    $stmt->execute(array($param));
    return $stmt->rowCount(); 
}
function count_row_1($sql){
    global $con ;
    $stmt = $con->prepare($sql);
    $stmt->execute();
    return $stmt->rowCount(); 
}