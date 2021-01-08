<?php
include ("connect.php") ;
include ("../php/fun.php") ;
session_start();
?>
                                <div role="tabpanel" class="tab-pane  active" id="people">
                                    <ul class="chat-list list-unstyled m-b-0 text-right">

                                        <?php  
                                    
                                    $stmt = $con->prepare("SELECT * FROM `o_users` WHERE 1 ORDER BY `online` DESC");
                                    $stmt->execute();
                                    $rows_user = $stmt->fetchAll();
                                    foreach($rows_user as $row_user) {
                                    ?>

                                        <li class="clearfix" onclick="id_chat('<?php echo $row_user['o_id'];$_SESSION['h']=$row_user['o_id']; ?>')">
                                            <img src="uploads/front/<?php echo $row_user['f_pic'] ?>" alt="avatar" />
                                            <div class="about">
                                                <div class="name"><?php echo $row_user['o_name'] ?></div>
                                                <?php 
                                                $online = $row_user['online'];
                                                $curr_time = strtotime(date('Y-m-d H:i:s') . '-10 second');
                                                $curr_time = date('Y-m-d H:i:s',$curr_time);

                                                if($online > $curr_time){
                                                    ?><div class="status">  متصل الان <i class="zmdi zmdi-circle online"></i><?php
                                                }else{
                                                    ?><div class="status"> غير متصل <i class="zmdi zmdi-circle offline"></i><?php
                                                }
                                                ?>
                                                </div>
                                            </div>
                                        </li>

                                        <?php } ?>

                                    </ul>
                                </div>