<?php
ini_set("safe_mode","0");
include('header.php');

$main_code = $_GET['cc'];
if($main_code == "")
{
    ?>
    <script>window.location = 'index.php';</script>
    <?php
}

    $category_sql = mysqli_query($connect,"SELECT * FROM `course_category` WHERE `status` = '1' AND `category_code` = '$main_code'");  
   while($row = mysqli_fetch_assoc($category_sql))
   {
      $category_code = $row['category_code'];
      $category_name = $row['cat_name'];

      $course_sql = mysqli_query($connect,"SELECT * FROM `courses` WHERE `course_category` = '$category_code' AND `status` = '1'");     
    }


?>

<div style="padding-top: 50px!important;margin:auto;text-align:center;text-decoration:underline"  >
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                        <div class="gen-breadcrumb-title">
                            <h1>
                            <?=$category_name?>
                            </h1>
                        </div>
                </div>
            </div>
        </div>
    </div>

<style>
.videoitems {
  display: grid;
  grid-gap: 10px;
  grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
}

.videoitems .item {
  width: 100%;
}
h1{
    color:black;
}

/*
  And here are some declarations for the image caption.
  Just hover over one of the last 5 images to see it.
*/

.videoitems .item {
  position: relative;
  overflow: hidden;
}
.cat_stick
{
    display: none;
}
.cat_stick.cat_stick1
{
    display: block !important;
}

.videoitems .item {
  vertical-align: middle;
}

</style>
    <section class="gen-section-padding-3 " style="margin-top:50px;">
        <div class="container container-2">
            
                     <div class="gen-style-2 videoitems">               
                          <?php
                           while($row1 = mysqli_fetch_assoc($course_sql))
                           {
                              $view_sql = mysqli_query($connect,"SELECT * FROM `course_views` WHERE `course_code` = '$row1[course_code]'");   
                              

                              $date1 = $row1['created_date']." ".$row1['created_time'];
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
                          ?>                          
                              <div class="item" >
                                 <div
                                    class="movie type-movie status-publish has-post-thumbnail hentry movie_genre-action movie_genre-adventure movie_genre-drama">
                                    <div class="gen-carousel-movies-style-2 movie-grid style-2">
                                       <div class="gen-movie-contain">
                                       <div class="gen-movie-img">
                                          <div id="videosList">           
                                             <div class="video" style=" background-image: url('<?=$row1['course_thumbanil']?>');background-size: cover;background-position: center center;">
                                                <video class="thevideo" loop preload="none" >
                                                   <source src="<?=$focalyt_url?><?=$row1['course_short_video']?>">
                                                Your browser does not support the video tag.
                                                </video>
                                             </div>
                                          </div>
                                             <div class="gen-movie-add">
                                                <div class="wpulike wpulike-heart">
                                                   <div class="wp_ulike_general_class wp_ulike_is_not_liked">
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
                                                <div class="movie-actions--link_add-to-playlist dropdown">
                                                   <a class="dropdown-toggle" href="#" data-toggle="dropdown"><i
                                                         class="fa fa-plus"></i></a>
                                                   <div class="dropdown-menu mCustomScrollbar">
                                                      <div class="mCustomScrollBox">
                                                         <div class="mCSB_container">
                                                            <a class="login-link" href="#">Sign in to add this movie
                                                               to a
                                                               playlist.</a>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="gen-movie-action">
                                                <a href="watch.php?vc=<?=$row1['course_code']?>" class="gen-button">
                                                   <i class="fa fa-play"></i>
                                                </a>
                                             </div> 
                                          </div>
                                          <div class="col-12" style="padding:0px">
                                             <?php
                                                $course_creator = mysqli_query($connect,"SELECT * FROM `users` WHERE `id` = '$row1[created_by]'");
                                                $creator_row = mysqli_fetch_assoc($course_creator);
                                             ?>
                                             <div class="col-2" style="float:left;padding:0px">
                                                <img src="<?=$creator_row['profile_image']?>" style="height:50px !important;width:50px !important;border-radius: 50%;" >
                                             </div>
                                             <div class="gen-info-contain col-10" style="float:right;width:100% !important;">
                                                <div class="gen-movie-info">
                                                   <h3><a href="watch.php?vc=<?=$row1['course_code']?>"><?=$row1['course_name']?></a>
                                                   </h3>
                                                </div>
                                                <div class="gen-movie-meta-holder">
                                                   <ul style="line-height:0px">
                                                      <li><?php                                                     
                                                      echo $creator_row['first_name']." ".$creator_row['last_name'];
                                                      
                                                      ?>
                                                      </li>                                                   
                                                      <ul style="    margin: 0px !important;">
                                                      <li><?=mysqli_num_rows($view_sql)?> Views</li><i class="fas fa-circle" style="color:#1261a0;font-size: 10px !important;margin: 4px;"></i><li><?=$uploaded_time?></li>
                                                      </ul>   
                                                   </ul>   
                                                                                          
                                                </div>
                                             </div>

                                          </div>
                                          
                                       </div>
                                    </div>
                                 </div>
                                 <!-- #post-## -->
                              </div>
                           <?php
                           }
                           ?>                        
                     </div>
            
            
        </div>
    </section>


<?php
include('footer.php');
?>