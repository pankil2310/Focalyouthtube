<?php
ini_set("safe_mode","0");
include('header.php');
include('video_stram.php');
$main_code = $_GET['vc'];
if($main_code == "")
{
    ?>
    <script>window.location = 'index.php';</script>
    <?php
}
else
{

    $today = date('Y/m/d');
    $enrooled = mysqli_query($connect,"SELECT * FROM `user_subscriptions` WHERE `user_id` = '$session_id' AND `status` = '0' AND (`end_date` != '$today' OR `end_date` > '$today')");
    if(mysqli_num_rows($enrooled) == '1')
    {
        $course_purched = "yes";
    }
    else
    {
        $course_purched = "no";
    }
    if(isset($_SESSION['user']))
    {
        $view_user = $session_id;
        mysqli_query($connect,"INSERT INTO `course_view_history`(`course_code`, `user`) VALUES ('$main_code','$view_user')");
    }
    else
    {
        $view_user = "anonymous";
    }
    
    mysqli_query($connect,"INSERT INTO `course_views`(`course_code`, `user`) VALUES ('$main_code','$view_user')");


    $share = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $main_video_sql = mysqli_query($connect,"SELECT * FROm `courses` WHERE `course_code` = '$main_code'");
    $main_video_details = mysqli_fetch_assoc($main_video_sql);

    if($course_purched == "yes")
    {
        $file_name = $main_video_details['course_video'];
    }
    else
    {
        $file_name = $focalyt_url.$main_video_details['course_short_video'];
    }


    

    $date1 = $main_video_details['created_date']." ".$main_video_details['created_time'];
                              $date2 = DATE('Y/m/d')." ".date('H:i');                     
                               
                              $start = date_create($date1);
                              $end = date_create(date('m/d/y h:i:s a', strtotime($date2)));
                              
                              $diff=date_diff($start,$end);
                              
                              $years = $diff->y;
                              $months = $diff->m;
                              $days = $diff->d;
                              $hours = $diff->h; 
                              $minutes = $diff->i; 
                              $seconds = $diff->s;

                              if($years != '0')
                              {
                                 $uploaded_time = $years." years ago";
                              }
                              else if($months != '0')
                              {
                                 $uploaded_time = $months." months ago";
                              }
                              else if($days != '0')
                              {
                                 $uploaded_time = $days." days ago";
                              }
                              else if($hours != '0')
                              {
                                 $uploaded_time = $hours." hours ago";
                              }
                              else if($minutes != '0')
                              {
                                 $uploaded_time = $minutes." minutes ago";
                              }
                              else
                              {
                                 $uploaded_time = $seconds." minutes ago";
                              }
}
?>
<style>

.cat_stick
{
    display: none;
}

</style>
<style>
#player1_html5
{
    width:100% !important;
    height: -webkit-fill-available !important;
}
</style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mediaelement/4.2.6/mediaelementplayer.css">
<link rel="stylesheet" href="player/dist/context-menu/context-menu.css">
<link rel="stylesheet" href="player/dist/jump-forward/jump-forward.css">
    <link rel="stylesheet" href="player/dist/skip-back/skip-back.css">
    <link rel="stylesheet" href="player/dist/speed/speed.css">
    <link rel="stylesheet" href="player/src/picture-in-picture/picture-in-picture.css">
  


<!-- Single movie Start -->
    <section class="gen-section-padding-3 gen-single-movie" > <!--style="padding-top:50px"-->
        <div class="container">
            <div class="row no-gutters">
                <div class="col-lg-12">
                    <div class="gen-single-movie-wrapper style-1">
                        <div class="row">
                            <!-- main video start -->
                            <div class="col-lg-9">
                                <div class="gen-video-holder">   
        <video id="player1" width="100%" height="500" controls preload="auto" autoplay>
            <source src="<?=$file_name?>">
        </video>

               </div>
                                <div class="gen-single-movie-info">
                                    <h2 class="gen-title"><?=$main_video_details['course_name']?></h2>
                                    <div class="gen-single-meta-holder" style="vertical-align: middle;display: inline-block;width: -webkit-fill-available;">
                                        <ul style="padding: 10px;">
                                            <li class="gen-sen-rating">
                                                <?php
                                            $course_cate_sql = mysqli_query($connect,"SELECT * FROM `course_category` WHERE `category_code` = '$main_video_details[course_category]'");                                        
                                            $course_cate_row = mysqli_fetch_assoc($course_cate_sql);
                                            echo $course_cate_row['cat_name'];
                                            
                                            ?></li>
                                            <li style="color:black">
                                                <i class="fas fa-eye">
                                                </i>
                                                <span>
                                            <?php
                                                $main_view_sql = mysqli_query($connect,"SELECT * FROM `course_views` WHERE `course_code` = '$main_code'");
                                                echo mysqli_num_rows($main_view_sql)." Views";
                                            ?>                                                                            
                                            </span><i class="fas fa-circle" style="color:#1261a0;font-size: 5px !important;margin: 4px;"></i><span><?=$uploaded_time?></span>
                                            </li>
                                            
                                        </ul>   
                                        <ul style="float:right;color:black">

                                        <li style="color:black">
                                        <?php
                                        $likes_sql = mysqli_query($connect,"SELECT * FROM `course_like` WHERE `course_code` = '$main_code' AND `course_like` = '0'");
                                        $likes = mysqli_num_rows($likes_sql);


                                        $dislikes_sql = mysqli_query($connect,"SELECT * FROM `course_like` WHERE `course_code` = '$main_code' AND `course_like` = '1'");
                                        $dislikes = mysqli_num_rows($dislikes_sql);

                                        $user_like_sql = mysqli_query($connect,"SELECT * FROM `course_like` WHERE `course_code` = '$main_code' AND `user_id` = '$session_id'");
                                        $user_like = mysqli_fetch_assoc($user_like_sql);


                                        if($session_id != '')
                                        {
                                        ?>
                                        <form name="submit_like" class="form_submit" method="POST">
                                            <input type="hidden" name="course_code" value="<?=$main_code?>">
                                            <input type="hidden" name="user_id" value="<?=$session_id?>">
                                            <input type="hidden" name="like" value="0">
                                            <button type="submit" style="background:none;padding: 0px;">
                                            
                                            <?php
                                            if($user_like['course_like'] == '0')
                                            {
                                            ?>
                                                <i class="fa fa-thumbs-up fa-2x" aria-hidden="true" style="color:#1261a0"></i>
                                            <?php
                                            }
                                            else
                                            {
                                                ?>
                                                <i class="fa fa-thumbs-up fa-2x" aria-hidden="true" style="color:#0022007a"></i>
                                                <?php
                                            }
                                            ?>
                                        
                                        
                                        </button>                                         
                                        </form>
                                        <?php
                                        }
                                        else
                                        {
                                            ?>
                                            <a href="login.php"><i class="fa fa-thumbs-up fa-2x" aria-hidden="true" style="color:#0022007a"></i></a>
                                            <?php
                                        }
                                        echo $likes;
                                        ?>
                                        
                                        </li>
                                        <li style="color:black">
                                        <?php
                                        if($session_id != '')
                                        {
                                        ?>
                                        <form name="submit_like" class="form_submit" method="POST">
                                            <input type="hidden" name="course_code" value="<?=$main_code?>">
                                            <input type="hidden" name="user_id" value="<?=$session_id?>">
                                            <input type="hidden" name="like" value="1">
                                            <button type="submit" style="background:none;padding: 0px;"> 
                                            <?php
                                            if($user_like['course_like'] == '1')
                                            {
                                            ?>
                                                <i class="fa fa-thumbs-down fa-2x" aria-hidden="true" style="color:#1261a0"></i>
                                            <?php
                                            }
                                            else
                                            {
                                                ?>
                                                <i class="fa fa-thumbs-down fa-2x" aria-hidden="true" style="color:#0022007a"></i>
                                                <?php
                                            }
                                            ?>    
                                            
                                            
                                            
                                        
                                        
                                        </button>                                         
                                        </form>
                                        <?php
                                        }
                                        else
                                        {
                                            ?>
                                              <a href="login.php"><i class="fa fa-thumbs-down fa-2x" aria-hidden="true" style="color:#0022007a"></i></a>
                                            <?php
                                        }
                                        echo $dislikes;
                                        ?>
                                        
                                        </li>
                                        <?php

                                        if($course_purched == "yes")
                                        {
                                            ?>
                                            <li class="gen-sen-rating" style="border-radius:10px;padding:10px;    cursor: default;">
                                              Subscribed</li>                                             
                                            <?php
                                        }
                                        else
                                        {
                                            ?>
                                            <a  href="subscribe_plan.php" class="gen-sen-rating pur_button" style="background:#cf5353;border-radius:10px;padding:10px;color:white">
                                                <!--<a  href="Subscribe_plan.php" class="gen-sen-rating pur_button" style="background:#cf5353;border-radius:10px;padding:10px;color:white" data-toggle="modal" data-target="#myModal">-->
                                              Subscribe</a>                                             
                                            <?php
                                        }
                                        ?>
<style>
    .pur_button:hover{
background:#1261a0 !important;
    }
</style>

                                        
                                        </ul>
                                    </div>

                                    <div class="gen-after-excerpt">
                                        <div class="gen-extra-data">
                                        <p style="color:black"><?=$main_video_details['course_description']?></p>
                                    <!--        <ul>
                                                <li>
                                                    <span>Language :</span>
                                                    <span>English</span>
                                                </li>
                                                <li>
                                                    <span>Subtitles :</span>
                                                    <span>English</span>
                                                </li>
                                                <li>
                                                    <span>Audio Languages :</span>
                                                    <span>English</span>
                                                </li>
                                                <li><span>Genre :</span>
                                                    <span>
                                                        <a href="#">
                                                            Action, </a>
                                                    </span>
                                                    <span>
                                                        <a href="#">
                                                            Documentary </a>
                                                    </span>
                                                </li>
                                                <li><span>Run Time :</span>
                                                    <span>1hr 24 mins</span>
                                                </li>
                                                <li>
                                                    <span>Release Date :</span>
                                                    <span>14 Aug,2018</span>
                                                </li>
                                            </ul>-->
                                        </div>  
                                        <div class="gen-socail-share">
                                            <h4 class="align-self-center">Social Share :</h4>
                                            <ul class="social-inner">
                                                <li ><a href="https://www.facebook.com/sharer/sharer.php?u=<?=$share?>" class="facebook" style="background:#1261a0"><i class="fab fa-facebook-f"></i></a>
                                                </li>
                                                <li><a href="https://wa.me/?text=<?=$share?>" class="facebook" style="background:#1261a0"><i class="fab fa-whatsapp"></i></a>
                                                </li>
                                                <li><a href="mailto:?body=<?=$share?>" class="facebook" style="background:#1261a0"><i class="fas fa-envelope"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="comments container">
                                <div class="row" style="margin-bottom:5px">
                                <?php
                                $comment_sql = mysqli_query($connect,"SELECT * FROM `course_comments` WHERE `course_code` = '$main_code' AND `status` = '1' ORDER BY `id` desc");
                                ?>
                                      <span style="color:black"><?=mysqli_num_rows($comment_sql)?> Comments</span>      
                                </div>
                                <div class="row" style="margin-bottom:50px">
                                    <div class="col-1">
                                        <img src="images/placeholder.png" height="50" width="50">
                                    </div>
                                    <div class="col-11">
                                        <form role="search" method="POST" class="search-form form_submit" name="submit_comments" style="margin: auto;display: flex;">
                                            
                                            <?php
                                            if($session_id != "")
                                            {
                                                ?>
                                                
                                                    <span class="screen-reader-text"></span>
                                                    <input type="hidden" name="session_id" value="<?=$session_id?>">
                                                    <input type="hidden" name="course_code" value="<?=$main_code?>">
                                                    <textarea placeholder="Add Comment publicly" class="search-field" name="comment" style="border-radius:20px;background: white;font-size: 25px;height: 55px;overflow-y:hidden"></textarea>
                                                   
                                                
                                                <button type="submit" class="comment-submit" >
                                                    <span class="screen-reader-text" ></span>
                                                </button>  
                                                <?php
                                            }
                                            else
                                            {
                                                ?>
                                                <a href="login.php" style="width:100%">
                                                <label > 
                                                    <span class="screen-reader-text"></span>
                                                    <textarea placeholder="Add Comment publicly" class="search-field" name="comment" style="border-radius:20px;background: white;font-size: 25px;height: 55px;overflow-y:hidden"></textarea>
                                                </label>
                                                </a>
                                                <a href="login.php" type="submit" class="comment-submit">
                                                    <span class="screen-reader-text" ></span>
                                            </a>  
                                                <?php
                                            }                                    
                                            ?>
                                            
                                        </form>
                                    </div>
                                </div>

                                <!--  View Comments -->
                                <?php
                                
                                while($comments = mysqli_fetch_assoc($comment_sql))
                                {
                                    $user_sql = mysqli_query($connect,"SELECT * FROM `users` WHERE `id` = '$comments[session_id]'");
                                    $comment_user = mysqli_fetch_assoc($user_sql);

                                
                                    $date3 = $comments['created_date'];
                                    $date4 = DATE('Y-m-d')." ".date('H:i:s');                     
                                    
                                    $start1 = date_create($date3);
                                    $end1 = date_create(date('m/d/y h:i:s a', strtotime($date4)));
                                    
                                    $diff1=date_diff($start1,$end1);
                                    
                                    $years1 = $diff1->y;
                                    $months1 = $diff1->m;
                                    $days1 = $diff1->d;
                                    $hours1 = $diff1->h; 
                                    $minutes1 = $diff1->i; 
                                    $seconds1 = $diff1->s;

                                    if($years1 != '0')
                                    {
                                        $commented_time = $years1." years ago";
                                    }
                                    else if($months1 != '0')
                                    {
                                        $commented_time = $months1." months ago";
                                    }
                                    else if($days1 != '0')
                                    {
                                        $commented_time = $days1." days ago";
                                    }
                                    else if($hours1 != '0')
                                    {
                                        $commented_time = $hours1." hours ago";
                                    }
                                    else if($minutes1 != '0')
                                    {
                                        $commented_time = $minutes1." minutes ago";
                                    }
                                    else
                                    {
                                        $commented_time = $seconds1." minutes ago";
                                    }
                                ?>

                                <div class="row" style="margin-top:25px;color:black;">
                                    <div class="col-1">
                                        <?php
                                        if($comment_user['profile_image'] != "")
                                        {
                                        ?>
                                            <img src="<?=$comment_user['profile_image']?>" height="50" width="50" style="border-radius :100px;">
                                        <?php
                                        }
                                        else
                                        {   
                                        ?>                                     
                                            <img src="images/placeholder.png" height="50" width="50">
                                        <?php
                                        }
                                        ?>
                                    </div>
                                    <div class="col-11" style="margin-bottom:10px">
                                        <!--     border-radius: 100px;color: white;background:var(--primary-color);padding:5px -->
                                        <span style="    text-transform: capitalize;"><?=$comment_user['first_name']?> <?=$comment_user['last_name']?><i class="fas fa-circle" style="color:white;font-size: 5px !important;margin: 4px;vertical-align: middle;"></i><span style="color:#606060"><?=$commented_time?></span></span><br>
                                        <span style="overflow-wrap: break-word"><?=$comments['comment']?></span>
                                    </div>
                                    <div class="border_bottom" style="width: -webkit-fill-available; border: 1px dashed #0202;"></div>
                                </div>
                                <?php
                                }
                                ?>
                                <!--  View Comments end -->

                                </div>
                            </div>
<script>
$('textarea').each(function () {
  // Do something if you want
}).on('input', function () {
  this.style.height = 'auto';
  // Customize if you want
  this.style.height = (this.scrollHeight - 00) + 'px'; //The weight is 30
});

</script>
                            <!-- main video end -->
                            <!-- side strip start -->
                            <style>
                                .gen-info-contain
                                {
                                    background: white !important;
                                }
                                .gen-movie-contain
                                {
                                    box-shadow: rgb(204 204 204) 3px 3px 15px 0px;
                                }
                                .gen-carousel-movies-style-3 .gen-movie-contain
                                {
                                    width: -webkit-fill-available;
                                    height: 150px;
                                    
                                }
                                .gen-carousel-movies-style-3 .gen-movie-contain .gen-movie-info h3
                                {
                                    font-size: 15px !important;
                                    white-space: pre-line !important;
                                }
                                .gen-carousel-movies-style-3 .gen-movie-contain .gen-movie-img:before
                                {
                                    display: none;
                                }
                            </style>
                            <div class="col-lg-3">
                                <div class="pm-inner">
                                    <div class="gen-more-like">
                                       <!-- <h5 class="gen-more-title">More Like This</h5>-->
                                        <div class="row">
                                        <?php
                                            $course_sql = mysqli_query($connect,"SELECT * FROM `courses` WHERE `course_category` = '$main_video_details[course_category]' AND `course_code` != '$main_code' AND `status` = '1'");
                                            if(mysqli_num_rows($course_sql) > 0)
                                            {
                                                while($row1 = mysqli_fetch_assoc($course_sql))
                                                {

                                                    $view_sql = mysqli_query($connect,"SELECT * FROM `course_views` WHERE `course_code` = '$row1[course_code]'");                                                
                                        ?>

                                            <div class="col-xl-12 col-lg-4 col-md-6">
                                                <div class="gen-carousel-movies-style-3 movie-grid style-3">
                                                    <div class="gen-movie-contain">
                                                        <div class="gen-movie-img">
                                                              <div id="videosList">           
                                             <div class="video" style=" background-image: url('<?=$row1['course_thumbanil']?>');background-size: cover;background-size: contain;background-repeat: no-repeat;">
                                                <video class="thevideo" loop preload="none" style="height: 150px;">
                                                   <source src="<?=$focalyt_url?><?=$row1['course_short_video']?>">
                                                Your browser does not support the video tag.
                                                </video>
                                             </div>
                                          </div>
                                                            <div class="gen-movie-add">
                                                                <div class="wpulike wpulike-heart">
                                                                    <div
                                                                        class="wp_ulike_general_class wp_ulike_is_not_liked">
                                                                        <?php
                                                      if(mysqli_num_rows(mysqli_query($connect,"SELECT * FROM `add_to_fav` WHERE `course_code` = '$row1[course_code]' AND `user_id` = '$session_id'")) == 1)
                                                      {
                                                         ?>
                                                         <button
                                                         type="button" class="wp_ulike_btn wp_ulike_put_image fill" data-code="<?=$row1['course_code']?>"></button>
                                                         <?php
                                                      }
                                                      else
                                                      {
                                                         ?>
                                                         <button
                                                         type="button" class="wp_ulike_btn wp_ulike_put_image" data-code="<?=$row1['course_code']?>"></button>
                                                         <?php
                                                      }
                                                      ?>  
                                                                    </div>
                                                                </div>
                                                               
                                                                <div
                                                                    class="movie-actions--link_add-to-playlist dropdown">
                                                                    <a class="dropdown-toggle" href="#"
                                                                        data-toggle="dropdown"><i
                                                                            class="fa fa-plus"></i></a>
                                                                    <div class="dropdown-menu mCustomScrollbar">
                                                                        <div class="mCustomScrollBox">
                                                                            <div class="mCSB_container">
                                                                                <a class="login-link" href="#">Sign in
                                                                                    to add this movie to
                                                                                    a
                                                                                    playlist.</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <ul class="menu bottomRight">
                                                                    <li class="share top">
                                                                        <i class="fa fa-share-alt"></i>
                                                                        <ul class="submenu">
                                                         <li><a href="https://www.facebook.com/sharer/sharer.php?u=<?=$site_url?>/watch.php?vc=<?=$row1['course_code']?>" class="facebook"><i class="fab fa-facebook-f"></i></a>
                                                         </li>
                                                         <li><a href="https://wa.me/?text=<?=$site_url?>/watch.php?vc=<?=$row1['course_code']?>" class="whatsapp"><i class="fab fa-whatsapp"></i></a>
                                                         </li>
                                                         <li><a href="mailto:?body=<?=$site_url?>/watch.php?vc=<?=$row1['course_code']?>" class="whatsapp"><i class="fas fa-envelope"></i></a></li>
                                                      </ul>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div class="gen-movie-action">
                                                                <a href="watch.php?vc=<?=$row1['course_code']?>" class="gen-button">
                                                                    <i class="fa fa-play"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="gen-info-contain">
                                                            <div class="gen-movie-info">
                                                                <h3><a href="watch.php?vc=<?=$row1['course_code']?>"><?=(strlen($row1['course_name']) > 30) ? substr($row1['course_name'],0,30).'...' : $row1['course_name']?></a></h3>
                                                            </div>
                                                            <div class="gen-movie-meta-holder">
                                                            <ul style="line-height: 20px;font-size: 12px;color:black">
                                                      <li style="color:black"><?php                                                            
                                                       $course_creator = mysqli_query($connect,"SELECT * FROM `users` WHERE `id` = '$row1[created_by]'");
                                                       $creator_row = mysqli_fetch_assoc($course_creator);
                                                                                         
                                                      echo $creator_row['first_name']." ".$creator_row['last_name'];
                                                      
                                                      ?>
                                                      </li>                                                   
                                                      <ul style="    margin: 0px !important;">
                                                      <span><?=mysqli_num_rows($view_sql)?> Views</span><i class="fas fa-circle" style="color:#1261a0;font-size: 5px !important;margin: 4px;"></i><span><?=$uploaded_time?></span>
                                                      </ul>   
                                                   </ul> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>         
                                        <?php
                                                }
                                            }                                        
                                        ?>
                                            
                                            
                                        </div>
                                     <!--   <div class="row">
                                            <div class="col-lg-12">
                                                <div class="gen-load-more-button">
                                                    <div class="gen-btn-container">
                                                        <a class="gen-button gen-button-loadmore" href="#">
                                                            <span class="button-text">Load More</span>
                                                            <span class="loadmore-icon" style="display: none;"><i
                                                                    class="fa fa-spinner fa-spin"></i></span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> -->
                                    </div>
                                </div>
                            </div>

                            <!-- side strip end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Single movie End -->

<!-- Modal Popup start -->
<style>
.modal-dialog
{
    position: relative;
    margin: 0 auto;
    top: 25%;
}
table td
{
    border: hidden;
    text-align: left;
    color:#929292;
}
table td:nth-child(1)
{
    width:30%;
}
table tr
{
    vertical-align: initial;
    border: hidden;
}
table
{
    border: hidden;
}
#purchase:hover
{
    background:#cf5353 !important;
}
.close:hover
{
    color:#cf5353 !important;
}
</style>





    <script src="https://cdnjs.cloudflare.com/ajax/libs/mediaelement/4.2.6/mediaelement-and-player.min.js"></script>
    <script src="player/dist/context-menu/context-menu.js"></script>
    <script src="player/dist/loop/loop.js"></script>
    <script src="player/dist/stop/stop.js"></script>
    <script src="player/dist/jump-forward/jump-forward.js"></script>
    <script src="player/dist/skip-back/skip-back.js"></script>    
    <script src="player/dist/speed/speed.js"></script>
    <script src="player/src/picture-in-picture/picture-in-picture.js"></script>
<script>
	var mediaElements = document.querySelectorAll('#player1');

	for (var i = 0, total = mediaElements.length; i < total; i++) {

		var features = ['autoplay','playpause', 'current', 'progress', 'duration', 'volume','skipback', 'jumpforward','speed','pictureInPicture','fullscreen'];

		new MediaElementPlayer(mediaElements[i], {  
			autoRewind: true,
			features: features,
            defaultSeekBackwardInterval: function(media) {return (media.duration * 0.02);},
            defaultSeekForwardInterval: function(media) {return (media.duration * 0.02);},
		});
	}
</script>
<?php
include('footer.php');
?>