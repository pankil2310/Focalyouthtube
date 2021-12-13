<?php
   include('header.php');
   ?>
<div class="content-page">
   <div class="content">
      <!-- BEGIN PlACE PAGE CONTENT HERE -->
      <div class="row ">
         <div class="col-xl-12">
            <div class="card">
               <div class="card-body">
                  <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> Videos        <!--<a href="#/admin/course_form/add_course" class="btn btn-outline-primary btn-rounded alignToTitle"><i class="mdi mdi-plus"></i>Add new course</a>-->
                  </h4>
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
                  <div class="col-sm-6 col-xl-2">
                        <a href="#/admin/courses" class="text-secondary">
                           <div class="card shadow-none m-0">
                              <div class="card-body text-center">
                                 <i class="dripicons-link text-muted" style="font-size: 24px;"></i>
                                 <h3><span>
                                 <?php
                                 $active_sql = mysqli_query($connect,"SELECT * FROM `courses` ");
                                 echo mysqli_num_rows($active_sql);
                                 ?>
                                 </span></h3>
                                 <p class="text-muted font-15 mb-0">All Videos</p>
                              </div>
                           </div>
                        </a>
                     </div>
                     <div class="col-sm-6 col-xl-2">
                        <a href="#/admin/courses" class="text-secondary">
                           <div class="card shadow-none m-0">
                              <div class="card-body text-center">
                                 <i class="dripicons-link text-muted" style="font-size: 24px;"></i>
                                 <h3><span>
                                 <?php
                                 $active_sql = mysqli_query($connect,"SELECT * FROM `courses` WHERE `status` = '1'");
                                 echo mysqli_num_rows($active_sql);
                                 ?>
                                 </span></h3>
                                 <p class="text-muted font-15 mb-0">Active Videos</p>
                              </div>
                           </div>
                        </a>
                     </div>
                     <div class="col-sm-6 col-xl-2">
                        <a href="#/admin/courses" class="text-secondary">
                           <div class="card shadow-none m-0 border-left">
                              <div class="card-body text-center">
                                 <i class="dripicons-link-broken text-muted" style="font-size: 24px;"></i>
                                 <h3><span><?php
                                 $active_sql = mysqli_query($connect,"SELECT * FROM `courses` WHERE `status` = '2'");
                                 echo mysqli_num_rows($active_sql);
                                 ?></span></h3>
                                 <p class="text-muted font-15 mb-0">Pending Videos</p>
                              </div>
                           </div>
                        </a>
                     </div>
                     <div class="col-sm-6 col-xl-2">
                        <a href="#/admin/courses" class="text-secondary">
                           <div class="card shadow-none m-0 border-left">
                              <div class="card-body text-center">
                                 <i class="dripicons-link-broken text-muted" style="font-size: 24px;"></i>
                                 <h3><span><?php
                                 $active_sql = mysqli_query($connect,"SELECT * FROM `courses` WHERE `status` = '0'");
                                 echo mysqli_num_rows($active_sql);
                                 ?></span></h3>
                                 <p class="text-muted font-15 mb-0">Inactive Videos</p>
                              </div>
                           </div>
                        </a>
                     </div>
                     <div class="col-sm-6 col-xl-2">
                        <a href="#/admin/courses" class="text-secondary">
                           <div class="card shadow-none m-0 border-left">
                              <div class="card-body text-center">
                                 <i class="dripicons-star text-muted" style="font-size: 24px;"></i>
                                 <h3><span>
                                 <?php
                                 $active_sql = mysqli_query($connect,"SELECT * FROM `courses` WHERE `is_free` = '1'");
                                 echo mysqli_num_rows($active_sql);
                                 ?>
                                 </span></h3>
                                 <p class="text-muted font-15 mb-0">Free Videos</p>
                              </div>
                           </div>
                        </a>
                     </div>
                     <div class="col-sm-6 col-xl-2">
                        <a href="#/admin/courses" class="text-secondary">
                           <div class="card shadow-none m-0 border-left">
                              <div class="card-body text-center">
                                 <i class="dripicons-tags text-muted" style="font-size: 24px;"></i>
                                 <h3><span>
                                 <?php
                                 $active_sql = mysqli_query($connect,"SELECT * FROM `courses` WHERE `is_free` = '0'");
                                 echo mysqli_num_rows($active_sql);
                                 ?>
                                 </span></h3>
                                 <p class="text-muted font-15 mb-0">Paid Videos</p>
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
         <div class="col-xl-12">
            <div class="card">
               <div class="card-body">
                  <h4 class="mb-3 header-title">Course list</h4>
                  <div class="table-responsive-sm mt-4">
                     <div id="course-datatable-server-side_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                      
                        <div class="row">
                           <div class="col-sm-12">
                           <div style="text-align: -webkit-center;">
                              <form style="display: inline-flex;" method="POST" action="">
                                 <input type="date" class="form-control" name="from"  required>
                                 <p></p>
                                 <input type="date" class="form-control" name="to" >
                                 <p></p>
                                 <input type="submit" name="filter" class="form-control" value="Filter">
                              </form>

                           </div>


                              <table id="course-datatable-server-side" class="table table-striped dt-responsive nowrap dataTable no-footer dtr-inline" width="100%" data-page-length="25" role="grid" aria-describedby="course-datatable-server-side_info" style="width: 100%;">
                                 <thead>
                                    <tr role="row">
                                       <th class="sorting_asc" rowspan="1" colspan="1" style="width: 25.8px;" aria-label="#">#</th>
                                       <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 513.6px;" aria-label="Title">Title</th>
                                       <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 142.6px;" aria-label="Category">Category</th>
                                       <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 64.6px;" aria-label="Status">Status</th>
                                       <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 52.6px;" aria-label="Price">Price</th>                                       
                                       <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 74.6px;" aria-label="Actions">Actions</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                 <?php
                                    
                                    $i = 1;

                                    if($_POST['from'])
                                    {
                                       $from = str_replace("-","/",$_POST['from']);
                                       if($_POST['to'])
                                       {
                                          $to = str_replace("-","/",$_POST['to']);
                                          $course_sql = mysqli_query($connect,"SELECT * FROM `courses` WHERE `created_date` BETWEEN '$from' AND '$to'");                                          
                                       }   
                                       else
                                       {                                   
                                          $course_sql = mysqli_query($connect,"SELECT * FROM `courses` WHERE `created_date` = '$from'");                                          
                                       }                              
                                    }
                                    else
                                    {
                                       $course_sql = mysqli_query($connect,"SELECT * FROM `courses`");
                                    }

                                    while($row = mysqli_fetch_assoc($course_sql))
                                    {
                                 ?>
                                    <tr role="row">
                                       <td class="sorting_1" tabindex="0"><?=$i?></td>
                                       <td><strong><a href="#/1"><?=$row['course_name']?></a></strong><br>
                                          <small class="text-muted">Created By: <b>
                                          <?php
                                          $create_sql = mysqli_query($connect,"SELECT * FROM `users` WHERE `id` = '$row[created_by]'");
                                          $row1 = mysqli_fetch_assoc($create_sql);
                                          echo $row1['first_name']." ".$row1['last_name'];
                                          ?></b></small><br>
                                          <small class="text-muted">Created Date:<b><?=$row['created_date']?></b></small>
                                       </td>
                                       <td><span class="badge badge-dark-lighten">
                                       <?php
                                       $cat_sql = mysqli_query($connect,"SELECT * FROM `course_category` WHERE `category_code` = '$row[course_category]'");
                                       $row2 = mysqli_fetch_assoc($cat_sql);
                                       echo $row2['cat_name'];
                                       ?>
                                       </span></td>
                                       <td><span class="badge badge-success-lighten"><?php
                                       if($row['status'] == '0')
                                       {
                                          echo "Inactive";
                                       }
                                       else if($row['status'] == '1')
                                       {
                                          echo "Active";
                                       }
                                       else if($row['status'] == '2')
                                       {
                                          echo "Pending";
                                       }
                                       
                                       ?></span></td>
                                       <td><span class="badge badge-success-lighten">
                                       <?php
                                       if($row['is_free'] == '1')
                                       {
                                          echo "Free";
                                       }
                                       else
                                       {
                                          echo $row['price'];
                                       }
                                       ?>                                       
                                       </span></td>
                                       <td>
                                          <div class="dropright dropright">
                                             <button type="button" class="btn btn-sm btn-outline-primary btn-rounded btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                             <i class="mdi mdi-dots-vertical"></i>
                                             </button>
                                             <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="<?=$site_main_url?>/watch.php?vc=<?=$row['course_code']?>" target="_blank">View course on frontend</a></li>
                                                <li><a class="dropdown-item" href="edit_course.php?id=<?=$row['course_code']?>">Edit this course</a></li>
                                                <li><a class="dropdown-item" onclick="return confirm('Are you sure you want to Delete this Course?')" href="delete_course.php?id=<?=$row['course_code']?>">Delete this course</a></li>
                                             </ul>
                                          </div>
                                       </td>
                                    </tr>
                                    <?php
                                    $i++;
                                    }
                                    ?>
                                 </tbody>
                              </table>
                              <div id="course-datatable-server-side_processing" class="dataTables_processing card" style="display: none;">Processing...</div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- END PLACE PAGE CONTENT HERE -->
   </div>
</div>
<?php
   include('footer.php');
     ?>