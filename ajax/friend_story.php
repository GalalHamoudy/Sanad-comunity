<?php
include ("connect.php") ;
include ("../php/fun.php") ;
// start session
session_start();
?>

<div class="header">
                                        <h2><strong> قصص صديقك </strong>
                                            [
                                            <?php echo count_row("SELECT * FROM `story` WHERE `id_users` = ? ORDER BY `time` DESC",$_GET['id_friend']);?>
                                            ]
                                        </h2>
                                    </div>
                                    <!--||||||||||||||||||||||||||| PHP CODE |||||||||||||||||||||||||||-->
                                    <?php  
                                    // $stmt = $con->prepare("SELECT * FROM `story` WHERE `id_users` = ? ORDER BY `time` DESC");
     $stmt = $con->prepare("SELECT * FROM `story` INNER JOIN `o_users` ON story.id_users=o_users.o_id WHERE `id_users` = ? ORDER BY `time` DESC");
                                    $stmt->execute(array($_GET['id_friend']));
                                    $rows2 = $stmt->fetchAll();
                                    foreach($rows2 as $row2) {
                                    ?>
                                    <!--||||||||||||||||||||||||||| PHP CODE |||||||||||||||||||||||||||-->
                                    <div class="body l-green mt-1">
                                        <div class="event-name row">
                                            <div class="col">
                                                <h6><?php echo $row2['o_name'] ?></h6>
                                                <i><?php echo $row2['text']?></i>
                                                <address><i class="zmdi zmdi-pin"></i> <?php echo $row2['time']?>
                                                </address>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>