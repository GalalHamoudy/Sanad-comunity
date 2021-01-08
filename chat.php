<?php
session_start();

include ("connect.php") ;

if( isset($_SESSION['o_id']) ){


include('inc/start.php');
include('inc/nav1.php');

?>

<!--||||||||||||||||||||||||||| JAVA SCRIPT CODE |||||||||||||||||||||||||||-->
<script>

    setInterval(function(){
        chat();
    }, 1000);

    id_chat('<?php echo $_SESSION['o_id'] ?>');
    function chat() {
        if ($('#help_id').val() == "") {
            $('#help_id').val('<?php echo $_SESSION['o_id'] ?>');
        }
        $.ajax({
            url: "ajax/chat.php",
            method: 'Post',
            data: {
                id: $('#help_id').val()
            },
            success: function (data, status, xhr) {
                $('#chat').html(xhr.responseText)
            }
        });
    }
</script>
<!--||||||||||||||||||||||||||| JAVA SCRIPT CODE |||||||||||||||||||||||||||-->

<section class="content chat-app">
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-5 col-md-5 col-sm-12">
                    <h2>المحادثات</h2>
                    <ul class="breadcrumb padding-0">
                        <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i></a></li>
                        <li class="breadcrumb-item active">المحادثات</li>
                    </ul>
                </div>
                <div class="col-lg-7 col-md-7 col-sm-12">
                    <div class="input-group m-b-0">
                        <input type="text" class="form-control" placeholder="بحث...">
                        <span class="input-group-addon">
                            <i class="zmdi zmdi-search"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-8 col-md-7">
                <div class="card">
                    <div class="body overflowhidden">
                        <div class="chat">
                            <div id="id_chat">
                            </div>
                            <div class="chat-history clearfix">
                                <ul id="chat">
                                </ul>
                            </div>
                            <hr>
                            <div class="chat-message clearfix">
                                <div class="input-group">
                                    <input type="text" id="text" class="form-control" placeholder="ادخل النص...">

                                </div>
                                <input type="hidden" id="help_id" value="" />
                                <a class="btn btn-raised btn-warning btn-round" onclick="send_chat()"><i
                                        class="zmdi zmdi-mail-send"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-5">
                <div class="card">
                    <div class="body">
                        <div id="plist" class="people-list">
                            <ul class="nav nav-tabs padding-0" role="tablist">
                                <li class="nav-item inlineblock"><a class="nav-link active" data-toggle="tab"
                                        href="#people"> الاصدقاء </a></li>
                            </ul>
                            <div class="tab-content m-t-20">
                                <div id="chats">
                                    <div role="tabpanel" class="tab-pane  active" id="people">
                                        <ul class="chat-list list-unstyled m-b-0 text-right">

                                            <!--||||||||||||||||||||||||||| PHP CODE |||||||||||||||||||||||||||-->
                                            <?php  
                                            $stmt = $con->prepare("SELECT * FROM `o_users` WHERE 1 ORDER BY `online` DESC");
                                            $stmt->execute();
                                            $rows_user = $stmt->fetchAll();
                                            foreach($rows_user as $row_user) {
                                            ?>
                                            <!--||||||||||||||||||||||||||| PHP CODE |||||||||||||||||||||||||||-->

                                            <li class="clearfix" onclick="id_chat('<?php echo $row_user['o_id']?>')">
                                                <img src="uploads/front/<?php echo $row_user['f_pic'] ?>"
                                                    alt="avatar" />
                                                <div class="about">
                                                    <div class="name"><?php echo $row_user['o_name'] ?></div>

                                                    <!--||||||||||||||||||||||||||| PHP CODE |||||||||||||||||||||||||||-->
                                                    <?php 
                                                        $online = $row_user['online'];
                                                        $curr_time = strtotime(date('Y-m-d H:i:s') . '-10 second');
                                                        $curr_time = date('Y-m-d H:i:s',$curr_time);

                                                        if($online > $curr_time){
                                                            ?><div class="status"> متصل الان <i
                                                                    class="zmdi zmdi-circle online"></i><?php
                                                        }else{
                                                            ?><div class="status"> غير متصل <i
                                                                        class="zmdi zmdi-circle offline"></i><?php
                                                        }
                                                    ?>
                                                    <!--||||||||||||||||||||||||||| PHP CODE |||||||||||||||||||||||||||-->

                                                        </div>
                                                    </div>
                                            </li>
                                            <?php } ?>
                                        </ul>
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
}
include('inc/end.php');
