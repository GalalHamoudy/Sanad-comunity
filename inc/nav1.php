<?php
    $id_id = $_SESSION['o_id'];
    $stmt = $con->prepare("SELECT * FROM `o_users` WHERE `o_id` = ?");
    $stmt->execute(array($id_id));
    $rows = $stmt->fetchAll();
    foreach($rows as $row) {
?>
<!-- -------------------------------------------------------- -->
<div class="overlay_menu">
    <button class="btn btn-primary btn-icon btn-icon-mini btn-round"><i class="zmdi zmdi-close"></i></button>
    <div class="container">        
        <div class="row clearfix">
            <div class="card">
                <div class="body">
                    <div class="input-group m-b-0">                
                        <input type="text" class="form-control" placeholder=" بحث ...">
                        <span class="input-group-addon">
                            <i class="zmdi zmdi-search"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12">
                <div class="social">                   
                    <p>Coded by Mohammed Galal<br> Designed by <a href="#" target="_blank">Death Code</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="overlay"></div><!-- Overlay For Sidebars -->
<!-- -------------------------------------------------------- -->

<!-- -------------------------------------------------------- -->

<aside id="minileftbar" class="minileftbar">
    <ul class="menu_list">
        <li><a href="javascript:void(0);" class="bars" style="display: none;"></a></li>
        <br>
        <li class="menuapp-btn"><a href="javascript:void(0);"><i class="zmdi zmdi-apps"></i></a></li>
        <li><a href="chat.php"><i class="zmdi zmdi-comments"></i></a></li>
        <li class="notifications badgebit">
            <a href="javascript:void(0);">
                <i class="zmdi zmdi-notifications"></i>
                <div class="notify">
                    <span class="heartbit"></span>
                    <span class="point"></span>
                </div>
            </a>
        </li>
               
        <li class="power">
            <a href="javascript:void(0);" class="btn_overlay hidden-sm-down"><i class="zmdi zmdi-search"></i></a>
            <a href="javascript:void(0);" class="menu-sm"><i class="zmdi zmdi-swap"></i></a>
            <a href="javascript:void(0);" class="fullscreen" data-provide="fullscreen"><i class="zmdi zmdi-fullscreen"></i></a>
            <a href="javascript:void(0);" class="js-right-sidebar"><i class="zmdi zmdi-settings zmdi-hc-spin"></i></a>            
            <a href="logout.php" class="mega-menu"><i class="zmdi zmdi-power"></i></a>
        </li>
    </ul>    
</aside>
<!-- -------------------------------------------------------- -->

<aside class="right_menu">
    <div class="menu-app">
        <div class="slim_scroll">
            <div class="card">
                <div class="header">
                    <h2><strong>خدمات</strong> الموقع</h2>
                </div>
                <!-- <div class="body">
                    <ul class="list-unstyled menu">
                        <li><a href="events.html"><i class="zmdi zmdi-calendar-note"></i><span>التقويم</span></a></li>
                        <li><a href="file-dashboard.html"><i class="zmdi zmdi-file-text"></i><span>المحفوظات</span></a></li>
                        <li><a href="blog-dashboard.html"><i class="zmdi zmdi-blogger"></i><span>المنشورات</span></a></li>
                        <li><a href="javascript:void(0)"><i class="zmdi zmdi-arrows"></i><span>الاستوريهات</span></a></li>
                        <li><a href="javascript:void(0)"><i class="zmdi zmdi-view-column"></i><span>المهام اليومية</span></a></li>
                    </ul>
                </div> -->
            </div>
        </div>
    </div>
    <div class="notif-menu">
        <div class="slim_scroll">
            <div class="card">
                <div class="header">
                    <h2><strong>الاشعارات</strong></h2>
                </div>
                <!-- <div class="body text-right">
                    <ul class="notification list-unstyled">
                    <li>
                            <i class="zmdi zmdi-account text-success"></i>
                            <strong>طلب صداقة جديد</strong>
                            <p><a href="javascript:void(0)">احمد عاطف </a></p>
                            <small class="text-muted">منذ ساعة</small>
                        </li>
                        <li>
                            <i class="zmdi zmdi-edit text-info"></i>
                            <strong>منشور جديد</strong>
                            <p><a href="javascript:void(0)">محمد جلال</a></p>
                            <small class="text-muted">منذ ساعة</small>
                        </li>

                        <li>
                            <i class="zmdi zmdi-account text-success"></i>
                            <strong>طلب صداقة جديد</strong>
                            <p><a href="javascript:void(0)">احمد عاطف </a></p>
                            <small class="text-muted">منذ ساعة</small>
                        </li>

                    </ul>  
                </div> -->
            </div>
        </div>
    </div>

    <div id="rightsidebar" class="right-sidebar">
        <div class="tab-content slim_scroll">
            <div class="tab-pane slideRight active" id="setting">
                <div class="card">
                    <div class="header">
                        <h2><strong>الوان</strong> شريط التحكم</h2>
                    </div>
                    <div class="body">
                        <ul class="choose-skin list-unstyled m-b-0">
                            <li data-theme="black" class="active">
                                <div class="black"></div>
                            </li>
                            <li data-theme="purple">
                                <div class="purple"></div>
                            </li>                   
                            <li data-theme="blue">
                                <div class="blue"></div>
                            </li>
                            <li data-theme="cyan">
                                <div class="cyan"></div>                    
                            </li>
                            <li data-theme="green">
                                <div class="green"></div>
                            </li>
                            <li data-theme="orange">
                                <div class="orange"></div>
                            </li>
                            <li data-theme="blush">
                                <div class="blush"></div>                    
                            </li>

                        </ul>
                    </div>
                </div>                

                <div class="card">
                    <div class="header">
                        <h2><strong>الوان</strong> شريط المستخدم</h2>
                    </div>
                    <div class="body theme-light-dark">
                        <button class="t-dark btn btn-primary btn-round btn-block">الغامق</button>
                    </div>
                </div>               
            </div>

        </div>
    </div>
    <!-- -------------------------------------------------------------------  -->
    <div id="leftsidebar" class="sidebar">
        <div class="menu">
            <ul class="list">
                <li>
                    <div class="user-info m-b-20">
                        <div class="image">
                            <a href="profile.php">
                            <img src="uploads/front/<?php echo $row['f_pic']?>" alt="User" style="width: 90px;max-height: 90px;">
                            </a>
                        </div>
                        <div class="detail">
                            <h6><?php echo $row['o_name'] . '<br>( ' . $row['nic_name'] .' )' ?></h6>
                            <p class="m-b-0"><?php echo $row['o_email'] ?></p>
                            <hr>
                            <p><?php echo $row['bio'] ?></p>                         
                            <hr>
                        </div>
                    </div>
                </li>
                <li class="header"> القائمة </li>
                <li class="active open"> <a href="profile.php"><i class="zmdi zmdi-home"></i><span>الملف الشخصي</span></a></li>
                <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-apps"></i><span>الصفحات الرئيسية</span> <span class="badge badge-success float-right">4</span></a>
                    <ul class="ml-menu">
                        <li><a href="index.php">الرئيسية</a></li>
                        <li><a href="chat.php">المحادثات</a></li>
                        <li><a href="signup.php">انشاء حساب</a></li>
                        <li><a href="logout.php">تسجيل خروج</a></li>
                    </ul>
                </li>
                <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-apps"></i><span>الصفحات الشخصية</span> <span class="badge badge-success float-right">3</span></a>
                    <ul class="ml-menu">
                        <li><a href="add_post.php">اضافة منشور</a></li>
                        <li><a href="add_story.php">اضافة قصة</a></li>
                        <li><a href="update.php">تعديل حساب</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</aside>
<!-- -------------------------------------------------- -->
<?php
}
?>