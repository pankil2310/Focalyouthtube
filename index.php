<?php
include('header.php');
?>

   <!-- owl-carousel Banner Start -->
   <section class="pt-0 pb-0" style="    margin: 45px -16px 0px -16px">
      <div class="container-fluid px-0">
         <div class="row no-gutters">
            <div class="col-12">
               <div class="gen-banner-movies banner-style-2 bannerr">
                  <div class="owl-carousel owl-loaded owl-drag" data-dots="false" data-nav="true" data-desk_num="1"
                     data-lap_num="1" data-tab_num="1" data-mob_num="1" data-mob_sm="1" data-autoplay="true"
                     data-loop="true" data-margin="0">
               
                  <?php
                  $most_viewd = mysqli_query($connect,"SELECT a.course_code,COUNT(a.course_code) FROM course_views a,courses b WHERE a.course_code = b.course_code AND b.status = '1' GROUP BY a.course_code ORDER BY COUNT(a.course_code) desc
                  ");
                  $most_viewd_row = mysqli_fetch_assoc($most_viewd);
                  $most_viewd_code = $most_viewd_row['course_code'];
                  $most_course = mysqli_query($connect,"SELECT * FROM `courses` WHERE `course_code` = '$most_viewd_code'");
                  $most_course_detail = mysqli_fetch_assoc($most_course);     
                  if(mysqli_num_rows($most_course) != '0')
                  {
                  ?>
                     <div class="item" style="background: linear-gradient(106deg,#3e4095, #cf10c5)">
                        <div class="gen-movie-contain-style-2 ">
                           <div class="container ">
                              <div class="row flex-row-reverse align-items-center" style="margin: auto;">
                                 <div class="col-xl-6">
                                    <div class="gen-front-image" style="width:auto">
                                                                                       
                                       <img src="<?=$most_course_detail['course_thumbanil']?>" alt="owl-carousel-banner-image">
                                       <a href="<?=$focalyt_url?><?=$most_course_detail['course_short_video']?>" class="playBut popup-youtube popup-vimeo popup-gmaps">
                                          <!-- Generator: Adobe Illustrator 19.0.0, SVG Export Plug-In 
                                          <svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="213.7px"
                                             height="213.7px" viewBox="0 0 213.7 213.7"
                                             enable-background="new 0 0 213.7 213.7" xml:space="preserve">
                                             <polygon class="triangle" id="XMLID_17_" fill="none" stroke-width="7"
                                                stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                                                points="
                                                            73.5,62.5 148.5,105.8 73.5,149.1 "></polygon>
                                             <circle class="circle" id="XMLID_18_" fill="none" stroke-width="7"
                                                stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                                                cx="106.8" cy="106.8" r="103.3">
                                             </circle>
                                          </svg> -->

                                       </a>
                                    </div>
                                 </div>
                                 <div class="col-xl-6">
                                    <div class="gen-tag-line"><span>Most Viewed</span></div>
                                    <div class="gen-movie-info">
                                       <h3><?=$most_course_detail['course_name']?></h3>
                                    </div>
                                    <p><?=$most_course_detail['course_short_description']?>
                                    <div class="gen-movie-action" style="margin-top:10px">
                                       <div class="gen-btn-container">
                                          <a href="watch.php?vc=<?=$most_course_detail['course_code']?>" class="gen-button .gen-button-dark">
                                             <i aria-hidden="true" class="fas fa-play"></i> <span class="text">Play
                                                Now</span>
                                          </a>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <?php
                  }
              /*    $most_enrolled = mysqli_query($connect,"SELECT a.course_code,COUNT(a.course_code) FROM course_enroll a,courses b WHERE a.course_code = b.course_code AND b.status = '1' GROUP BY a.course_code ORDER BY COUNT(a.course_code) desc");


                  $most_enrolled_row = mysqli_fetch_assoc($most_enrolled);
                  $most_enrolled_code = $most_enrolled_row['course_code'];
                  $most_course_enrolled = mysqli_query($connect,"SELECT * FROM `courses` WHERE `course_code` = '$most_enrolled_code'");
                  $most_course_enrolled_detail = mysqli_fetch_assoc($most_course_enrolled);               
                  if(mysqli_num_rows($most_course_enrolled) != 0)
                  {
                  ?>
                     <div class="item" style="background: linear-gradient(106deg,#3e4095, #cf10c5)">
                        <div class="gen-movie-contain-style-2 h-100">
                           <div class="container h-100">
                              <div class="row flex-row-reverse align-items-center" style="margin: auto;">
                                 <div class="col-xl-6">
                                    <div class="gen-front-image " style="width:auto">
                                       <img src="<?=$most_course_enrolled_detail['course_thumbanil']?>" alt="owl-carousel-banner-image">
                                       <a href="<?=$focalyt_url?><?=$most_course_enrolled_detail['course_short_video']?>" class="playBut popup-youtube popup-vimeo popup-gmaps">
                                          <!-- Generator: Adobe Illustrator 19.0.0, SVG Export Plug-In  -->
                                          <svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="213.7px"
                                             height="213.7px" viewBox="0 0 213.7 213.7"
                                             enable-background="new 0 0 213.7 213.7" xml:space="preserve">
                                             <polygon class="triangle" id="XMLID_19_" fill="none" stroke-width="7"
                                                stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                                                points="
                                                            73.5,62.5 148.5,105.8 73.5,149.1 "></polygon>
                                             <circle class="circle" id="XMLID_20_" fill="none" stroke-width="7"
                                                stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                                                cx="106.8" cy="106.8" r="103.3">
                                             </circle>
                                          </svg>

                                       </a>
                                    </div>
                                 </div>
                                 <div class="col-xl-6">
                                    <div class="gen-tag-line"><span>Most Enrolled</span></div>
                                    <div class="gen-movie-info">
                                       <h3><?=$most_course_enrolled_detail['course_name']?></h3>
                                    </div>
                                    <div class="gen-movie-meta-holder">
                                       <ul class="gen-meta-after-title" style="display:none">
                                          <li class="gen-sen-rating">
                                             <span>
                                                PG-14</span>
                                          </li>
                                          <li> <img src="images/asset-2.png" alt="rating-image">
                                             <span>
                                                8.5 </span>
                                          </li>
                                       </ul>
                                       <p><?=$most_course_enrolled_detail['course_short_description']?>
                                       </p>
                                       <div class="gen-meta-info" style="display:none">
                                          <ul class="gen-meta-after-excerpt">
                                             <li>
                                                <strong>Cast :</strong>
                                                Robert Romanson,Anne Good
                                             </li>
                                             <li>
                                                <strong>Genre :</strong>
                                                <span>
                                                   <a href="#">
                                                      Action, </a>
                                                </span>
                                                <span>
                                                   <a href="#">
                                                      Adventure, </a>
                                                </span>
                                                <span>
                                                   <a href="#">
                                                      Biography </a>
                                                </span>
                                             </li>
                                             <li>
                                                <strong>Tag :</strong>
                                                <span>
                                                   <a href="#">
                                                      4K Ultra, </a>
                                                </span>
                                                <span>
                                                   <a href="#">
                                                      King, </a>
                                                </span>
                                                <span>
                                                   <a href="#">
                                                      Premieres, </a>
                                                </span>
                                                <span>
                                                   <a href="#">
                                                      viking </a>
                                                </span>
                                             </li>
                                          </ul>
                                       </div>
                                    </div>
                                    <div class="gen-movie-action">
                                       <div class="gen-btn-container">
                                          <a href="watch.php?vc=<?=$most_course_enrolled_detail['course_code']?>" class="gen-button gen-button-dark">
                                             <i aria-hidden="true" class="fas fa-play"></i> <span class="text">Play
                                                Now</span>
                                          </a>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <?php
                  }*/
                  $most_liked = mysqli_query($connect,"SELECT a.course_code,COUNT(a.course_code) FROM course_like a,courses b WHERE a.course_code = b.course_code AND b.status = '1' GROUP BY a.course_code ORDER BY COUNT(a.course_code) desc");
                  $most_liked_row = mysqli_fetch_assoc($most_liked);
                  $most_liked_code = $most_liked_row['course_code'];
                  $most_course_liked = mysqli_query($connect,"SELECT * FROM `courses` WHERE `course_code` = '$most_liked_code'");
                  $most_course_liked_detail = mysqli_fetch_assoc($most_course_liked);                  
                  if(mysqli_num_rows($most_course_liked) != '0')
                  {
                  ?>
     
                     <div class="item" style="background: linear-gradient(106deg,#3e4095, #cf10c5)">
                        <div class="gen-movie-contain-style-2 h-100">
                           <div class="container h-100">
                              <div class="row flex-row-reverse align-items-center" style="margin: auto;">
                                 <div class="col-xl-6">
                                    <div class="gen-front-image " style="width:auto">
                                       <img src="<?=$most_course_liked_detail['course_thumbanil']?>" alt="owl-carousel-banner-image">
                                       <a href="<?=$focalyt_url?><?=$most_course_liked_detail['course_short_video']?>" class="playBut popup-youtube popup-vimeo popup-gmaps">
                                          <!-- Generator: Adobe Illustrator 19.0.0, SVG Export Plug-In  -->
                                          <svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="213.7px"
                                             height="213.7px" viewBox="0 0 213.7 213.7"
                                             enable-background="new 0 0 213.7 213.7" xml:space="preserve">
                                             <polygon class="triangle" id="XMLID_21_" fill="none" stroke-width="7"
                                                stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                                                points="
                                                            73.5,62.5 148.5,105.8 73.5,149.1 "></polygon>
                                             <circle class="circle" id="XMLID_22_" fill="none" stroke-width="7"
                                                stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10"
                                                cx="106.8" cy="106.8" r="103.3">
                                             </circle>
                                          </svg>

                                       </a>
                                    </div>
                                 </div>
                                 <div class="col-xl-6">
                                    <div class="gen-tag-line"><span>High Rated</span></div>
                                    <div class="gen-movie-info">
                                       <h3><?=$most_course_liked_detail['course_name']?></h3>
                                    </div>
                                    <div class="gen-movie-meta-holder">
                                       <ul class="gen-meta-after-title" style="display:none">
                                          <li class="gen-sen-rating">
                                             <span>
                                                TV-MA</span>
                                          </li>
                                          <li> <img src="images/asset-2.png" alt="rating-image">
                                             <span>
                                                9.5 </span>
                                          </li>
                                       </ul>
                                       <p><?=$most_course_liked_detail['course_short_description']?>
                                       </p>
                                       <div class="gen-meta-info" style="display:none">
                                          <ul class="gen-meta-after-excerpt">
                                             <li>
                                                <strong>Cast :</strong>
                                                Jennifer Lonez,Mars Shelley
                                             </li>
                                             <li>
                                                <strong>Genre :</strong>
                                                <span>
                                                   <a href="#">
                                                      Action, </a>
                                                </span>
                                                <span>
                                                   <a href="#">
                                                      Mystery </a>
                                                </span>
                                             </li>
                                             <li>
                                                <strong>Tag :</strong>
                                                <span>
                                                   <a href="#">
                                                      Brother, </a>
                                                </span>
                                                <span>
                                                   <a href="#">
                                                      Hero, </a>
                                                </span>
                                                <span>
                                                   <a href="#">
                                                      Premieres, </a>
                                                </span>
                                                <span>
                                                   <a href="#">
                                                      viking </a>
                                                </span>
                                             </li>
                                          </ul>
                                       </div>
                                    </div>
                                    <div class="gen-movie-action">
                                       <div class="gen-btn-container">
                                          <a href="watch.php?vc=<?=$most_course_liked_detail['course_code']?>" class="gen-button gen-button-dark">
                                             <i aria-hidden="true" class="fas fa-play"></i> <span class="text">Play
                                                Now</span>
                                          </a>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                <?php
                }
                ?>


                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- owl-carousel Banner End -->

    <?php
        $most_liked1 = mysqli_query($connect,"SELECT a.course_code,COUNT(a.course_code) FROM course_like a,courses b WHERE a.course_code = b.course_code AND b.status = '1' GROUP BY a.course_code ORDER BY COUNT(a.course_code) desc LIMIT 10");
        //echo "SELECT a.course_code,COUNT(a.course_code) FROM course_like a,courses b WHERE a.course_code = b.course_code AND b.status = '1' GROUP BY a.course_code ORDER BY COUNT(a.course_code) desc LIMIT 10";
        //echo "<br>";
        
        //echo mysqli_num_rows($most_liked1);
     ?>
            <!--  Liked Strip -->
            <section class="gen-section-padding-2">
            <div class="container">
             
               <div class="row">
                  <div class="col-xl-9 col-lg-6 col-md-6">
                     <h4 class="gen-heading-title">Most Liked Videos</h4>
                  </div>
                  <!--<div class="col-xl-3 col-lg-6 col-md-6 d-none d-md-inline-block">
                     <div class="gen-movie-action">
                        <div class="gen-btn-container text-right">
                           <a href="videos.php?cc=<?=$category_code?>" class="gen-button gen-button-flat">
                              <span class="text">More Videos</span>
                           </a>
                        </div>
                     </div>
                  </div> -->
               </div>
               <div class="row mt-3">
                  <div class="col-12">
                     <div class="gen-style-2">
                     <?php
                     if(mysqli_num_rows($course_sql) > 4)
                     {
                        ?>
                        <div class="owl-carousel" data-dots="false" data-nav="true" data-desk_num="4"
                           data-lap_num="3" data-tab_num="2" data-mob_num="1" data-mob_sm="1" data-autoplay="true"
                           data-loop="true" data-margin="30">
                        <?php 
                     }
                     else
                     {
                        ?>
                        <div class="owl-carousel owl-loaded owl-drag" data-dots="false" data-nav="true" data-desk_num="4"
                           data-lap_num="3" data-tab_num="2" data-mob_num="1" data-mob_sm="1" data-autoplay="true"
                           data-loop="false" data-margin="30">
                        <?php
                     }
                     ?>
                        
        
                             <?php
                   while($most_liked_row1 = mysqli_fetch_assoc($most_liked1))
        {
            $most_liked_code1 = $most_liked_row1['course_code'];
            $course_sql = mysqli_query($connect,"SELECT * FROM `courses` WHERE `course_code` = '$most_liked_code1'");
           // $most_course_liked_detail = mysqli_fetch_assoc($most_course_liked1);  
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
                              <div class="item">
                                 <div
                                    class="movie type-movie status-publish has-post-thumbnail hentry movie_genre-action movie_genre-adventure movie_genre-drama">
                                    <div class="gen-carousel-movies-style-2 movie-grid style-2">
                                       <div class="gen-movie-contain">
                                       <div class="gen-movie-img">
                                          <div id="videosList">           
                                             <div class="video" style=" background-image: url('<?=$row1['course_thumbanil']?>');background-size: 100% 100%;background-repeat: no-repeat;">
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
                          
                          
                          } ?>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
            
            <!-- Liked Strip End -->
      

   <!-- owl-carousel Videos Section-1 Start -->
   <?php
   $category_sql = mysqli_query($connect,"SELECT * FROM `course_category` WHERE `status` = '1'");  
   while($row = mysqli_fetch_assoc($category_sql))
   {
      $category_code = $row['category_code'];
      $category_name = $row['cat_name'];

      $course_sql = mysqli_query($connect,"SELECT * FROM `courses` WHERE `course_category` = '$category_code' AND `status` = '1'");
      if(mysqli_num_rows($course_sql) > 0)
      {
          $cat1cat1 = preg_replace('/[^A-Za-z0-9\-]/', '',$category_name);
   ?>
         <section class="gen-section-padding-2 <?=$cat1cat1?>" id="<?=$cat1cat1?>1">
            <div class="container">
               <div class="row">
                  <div class="col-xl-9 col-lg-6 col-md-6">
                     <h4 class="gen-heading-title"><?=$category_name?></h4>
                  </div>
                  <div class="col-xl-3 col-lg-6 col-md-6 d-none d-md-inline-block">
                     <div class="gen-movie-action">
                        <div class="gen-btn-container text-right">
                           <a href="videos.php?cc=<?=$category_code?>" class="gen-button gen-button-flat">
                              <span class="text">More Videos</span>
                           </a>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="row mt-3">
                  <div class="col-12">
                     <div class="gen-style-2">
                     <?php
                     if(mysqli_num_rows($course_sql) > 4)
                     {
                        ?>
                        <div class="owl-carousel" data-dots="false" data-nav="true" data-desk_num="4"
                           data-lap_num="3" data-tab_num="2" data-mob_num="1" data-mob_sm="1" data-autoplay="true"
                           data-loop="true" data-margin="30">
                        <?php 
                     }
                     else
                     {
                        ?>
                        <div class="owl-carousel owl-loaded owl-drag" data-dots="false" data-nav="true" data-desk_num="4"
                           data-lap_num="3" data-tab_num="2" data-mob_num="1" data-mob_sm="1" data-autoplay="true"
                           data-loop="false" data-margin="30">
                        <?php
                     }
                     ?>
                        
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
                              <div class="item">
                                 <div
                                    class="movie type-movie status-publish has-post-thumbnail hentry movie_genre-action movie_genre-adventure movie_genre-drama">
                                    <div class="gen-carousel-movies-style-2 movie-grid style-2">
                                       <div class="gen-movie-contain">
                                       <div class="gen-movie-img">
                                          <div id="videosList">           
                                             <div class="video" style=" background-image: url('<?=$row1['course_thumbanil']?>');background-size: 100% 100% !important;background-repeat: no-repeat;">
                                                <video class="thevideo" loop preload="none" style="/*height: auto;width: 400px;*/   ">
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
                  </div>
               </div>
            </div>
         </section>
   <?php
      }
   }
   ?>
   <!-- owl-carousel Videos Section-1 End -->
<script>

$(document).ready(function () {

   $("ul.child li").click(function(e) {
      var liid = $(this).attr('id');      
      $('ul.child li').css("background", "#e6e7e8");
      $('ul.child li a').css("color", "black");
      $(this).css("background", "#373435");   
      $(this).children("a").css("color", "white");   
      if(liid != 'all')
      {         
         $('section.gen-section-padding-2').hide();
         $('section.gen-section-padding-2.'+liid).show();
      }
      else
      {
         $('section.gen-section-padding-2').show();
      }
   });
});


</script>>
<?php
include('footer.php');
?>
