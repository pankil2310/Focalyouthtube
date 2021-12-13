<?php
include('header.php');

$course_max_sql = mysqli_query($connect,"SELECT * FROM `courses` WHERE `status` = '1'");
$max= mysqli_num_rows($course_max_sql);

$course_min_sql = mysqli_query($connect,"SELECT * FROM `courses` WHERE `status` = '0'");
$min= mysqli_num_rows($course_min_sql);

$course_none_sql = mysqli_query($connect,"SELECT * FROM `courses` WHERE `status` = '2'");
$none= mysqli_num_rows($course_none_sql);
?>
<div class="content-page">
   <div class="content">
      <div class="row">
         <div class="col-xl-12">
            <div class="card">
               <div class="card-body">
                  <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> Dashboard</h4>
               </div>
               <!-- end card body-->
            </div>
            <!-- end card -->
         </div>
         <!-- end col-->
      </div>
      <div class="row">
         <div class="col-xl-12">
            <div class="card">
               <div class="card-body">
                  <h4 class="header-title mb-4">Admin revenue this year</h4>
                  <div class="mt-3 chartjs-chart" style="height: 320px;">
                     <div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                        <div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                           <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
                        </div>
                        <div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                           <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
                        </div>
                     </div>
                     <canvas id="task-area-chart" width="1450" style="display: block; width: 1450px; height: 320px;" class="chartjs-render-monitor" height="320"></canvas>
                  </div>
               </div>
               <!-- end card body-->
            </div>
            <!-- end card -->
         </div>
         <!-- end col-->
      </div>
      <div class="row">
         <div class="col-12">
            <div class="card widget-inline">
               <div class="card-body p-0">
                  <div class="row no-gutters">
                     <div class="col-sm-6 col-xl-3">
                        <a href="courses" class="text-secondary">
                           <div class="card shadow-none m-0">
                              <div class="card-body text-center">
                                 <i class="dripicons-archive text-muted" style="font-size: 24px;"></i>
                                 <h3><span><?php
                                 $course_sql = mysqli_query($connect,"SELECT * FROM `courses`");
                                 echo mysqli_num_rows($course_sql);                                                                  
                                 ?></span></h3>
                                 <p class="text-muted font-15 mb-0">Number Videos</p>
                              </div>
                           </div>
                        </a>
                     </div>
                     <div class="col-sm-6 col-xl-3">
                        <a href="courses" class="text-secondary">
                           <div class="card shadow-none m-0 border-left">
                              <div class="card-body text-center">
                                 <i class="dripicons-camcorder text-muted" style="font-size: 24px;"></i>
                                 <h3><span><?php
                                 $views_sql = mysqli_query($connect,"SELECT * FROM `course_views`");
                                 echo mysqli_num_rows($views_sql);                                                                  
                                 ?></span></h3>
                                 <p class="text-muted font-15 mb-0">Number of Views</p>
                              </div>
                           </div>
                        </a>
                     </div>
                     <div class="col-sm-6 col-xl-3">
                        <a href="enrol_history" class="text-secondary">
                           <div class="card shadow-none m-0 border-left">
                              <div class="card-body text-center">
                                 <i class="dripicons-network-3 text-muted" style="font-size: 24px;"></i>
                                 <h3><span><?php
                                 $enroll_sql = mysqli_query($connect,"SELECT * FROM `course_enroll`");
                                 echo mysqli_num_rows($enroll_sql);                                                                  
                                 ?></span></h3>
                                 <p class="text-muted font-15 mb-0">Number of enrolment</p>
                              </div>
                           </div>
                        </a>
                     </div>
                     <div class="col-sm-6 col-xl-3">
                        <a href="users" class="text-secondary">
                           <div class="card shadow-none m-0 border-left">
                              <div class="card-body text-center">
                                 <i class="dripicons-user-group text-muted" style="font-size: 24px;"></i>
                                 <h3><span><?php
                                 $user_sql = mysqli_query($connect,"SELECT * FROM `users` WHERE `user_role` = '2'");
                                 echo mysqli_num_rows($user_sql);                                                                  
                                 ?></span></h3>
                                 <p class="text-muted font-15 mb-0">Number of student</p>
                              </div>
                           </div>
                        </a>
                     </div>
                  </div>
                  <!-- end row -->
               </div>
            </div>
            <!-- end card-box-->
         </div>
         <!-- end col-->
      </div>
      <div class="row">
         <div class="col-xl-4">
            <div class="card">
               <div class="card-body">
                  <h4 class="header-title mb-4">Video overview</h4>
                  <div class="my-4 chartjs-chart" style="height: 202px;">
                     <div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                        <div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                           <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
                        </div>
                        <div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                           <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
                        </div>
                     </div>
                     <canvas id="project-status-chart" width="431" style="display: block; width: 431px; height: 202px;" class="chartjs-render-monitor" height="202"></canvas>
                  </div>
                  <div class="row text-center mt-2 py-2">
                     <div class="col-4">
                        <i class="mdi mdi-trending-up text-success mt-3 h3"></i>
                        <h3 class="font-weight-normal">
                           <span><?=$max?></span>
                        </h3>
                        <p class="text-muted mb-0">Active Videos</p>
                     </div>
                     <div class="col-4">
                        <i class="mdi mdi-trending-down text-warning mt-3 h3"></i>
                        <h3 class="font-weight-normal">
                           <span><?=$min?></span>
                        </h3>
                        <p class="text-muted mb-0"> Inactive Videos</p>
                     </div>
                     <div class="col-4">
                        <i class="mdi mdi-trending-down text-notice mt-3 h3"></i>
                        <h3 class="font-weight-normal">
                           <span><?=$none?></span>
                        </h3>
                        <p class="text-muted mb-0"> Pending Videos</p>
                     </div>
                  </div>
               </div>
            </div>
         </div>

         <div class="col-xl-4">
            <div class="card">
               <div class="card-body">
                  <h4 class="header-title mb-4">Top 5 Most Viewed Videos</h4>                  
                  <div class="row text-center mt-2 py-2">
                  <table id="course-datatable-server-side" class="table table-striped dt-responsive nowrap dataTable no-footer dtr-inline" width="100%" data-page-length="25" role="grid" aria-describedby="course-datatable-server-side_info" style="width: 100%;">
                    <?php
                    $most_viewd = mysqli_query($connect,"SELECT a.course_code,COUNT(a.course_code) FROM course_views a,courses b WHERE a.course_code = b.course_code AND b.status = '1' GROUP BY a.course_code ORDER BY COUNT(a.course_code) desc LIMIT 5");
                    while($most_viewd_row = mysqli_fetch_assoc($most_viewd))
                    {
                        $most_viewd_code = $most_viewd_row['course_code'];
                        $most_course = mysqli_query($connect,"SELECT * FROM `courses` WHERE `course_code` = '$most_viewd_code'");
                        $most_course_detail = mysqli_fetch_assoc($most_course);  
                    ?>
                     <tr>
                        <td><?=$most_course_detail['course_name']?></td>
                        <td><?=$most_viewd_row['COUNT(a.course_code)']?></td>
                     </tr>
                     <?php

                     }
                     ?>
                     </table>
                  </div>
               </div>
            </div>
         </div>

         <div class="col-xl-4">
            <div class="card">
               <div class="card-body">
                  <h4 class="header-title mb-4">Top 5 Most Enrolled Videos</h4>                  
                  <div class="row text-center mt-2 py-2">
                  <table id="course-datatable-server-side" class="table table-striped dt-responsive nowrap dataTable no-footer dtr-inline" width="100%" data-page-length="25" role="grid" aria-describedby="course-datatable-server-side_info" style="width: 100%;">
                    <?php
                    $most_viewd = mysqli_query($connect,"SELECT a.course_code,COUNT(a.course_code) FROM course_enroll a,courses b WHERE a.course_code = b.course_code AND b.status = '1' GROUP BY a.course_code ORDER BY COUNT(a.course_code) desc LIMIT 5");
                    while($most_viewd_row = mysqli_fetch_assoc($most_viewd))
                    {
                        $most_viewd_code = $most_viewd_row['course_code'];
                        $most_course = mysqli_query($connect,"SELECT * FROM `courses` WHERE `course_code` = '$most_viewd_code'");
                        $most_course_detail = mysqli_fetch_assoc($most_course);  
                    ?>
                     <tr>
                        <td><?=$most_course_detail['course_name']?></td>
                        <td><?=$most_viewd_row['COUNT(a.course_code)']?></td>
                     </tr>
                     <?php

                     }
                     ?>
                     </table>
                  </div>
               </div>
            </div>
         </div>            

      </div>

      <script type="text/javascript">
         $('#unpaid-instructor-revenue').mouseenter(function() {
             $('#go-to-instructor-revenue').show();
         });
         $('#unpaid-instructor-revenue').mouseleave(function() {
             $('#go-to-instructor-revenue').hide();
         });
      </script>
   </div>
</div>

<?php
include('footer.php');

?>