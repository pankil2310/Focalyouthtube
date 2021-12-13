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
                  <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> Subscriptions        <!--<a href="#/admin/course_form/add_course" class="btn btn-outline-primary btn-rounded alignToTitle"><i class="mdi mdi-plus"></i>Add new course</a>-->
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
                  <div class="col-sm-6 col-xl-3">
                        <a href="#/admin/courses" class="text-secondary">
                           <div class="card shadow-none m-0">
                              <div class="card-body text-center">
                                 <i class="dripicons-link text-muted" style="font-size: 24px;"></i>
                                 <h3><span>
                                 <?php
                                 $active_sql = mysqli_query($connect,"SELECT * FROM `subscriptions` ");
                                 echo mysqli_num_rows($active_sql);
                                 ?>
                                 </span></h3>
                                 <p class="text-muted font-15 mb-0">All Subscriptons</p>
                              </div>
                           </div>
                        </a>
                     </div>
                     <div class="col-sm-6 col-xl-3">
                        <a href="#/admin/courses" class="text-secondary">
                           <div class="card shadow-none m-0 border-left">
                              <div class="card-body text-center">
                                 <i class="dripicons-link text-muted" style="font-size: 24px;"></i>
                                 <h3><span>
                                 <?php
                                 $active_sql = mysqli_query($connect,"SELECT * FROM `subscriptions` WHERE `status` = '1'");
                                 echo mysqli_num_rows($active_sql);
                                 ?>
                                 </span></h3>
                                 <p class="text-muted font-15 mb-0">Active Subscriptios</p>
                              </div>
                           </div>
                        </a>
                     </div>
                     <div class="col-sm-6 col-xl-3">
                        <a href="#/admin/courses" class="text-secondary">
                           <div class="card shadow-none m-0 border-left">
                              <div class="card-body text-center">
                                 <i class="dripicons-link-broken text-muted" style="font-size: 24px;"></i>
                                 <h3><span><?php
                                 $active_sql = mysqli_query($connect,"SELECT * FROM `subscriptions` WHERE `status` = '2'");
                                 echo mysqli_num_rows($active_sql);
                                 ?></span></h3>
                                 <p class="text-muted font-15 mb-0">Pending Subscriptions</p>
                              </div>
                           </div>
                        </a>
                     </div>
                     <div class="col-sm-6 col-xl-3">
                        <a href="#/admin/courses" class="text-secondary">
                           <div class="card shadow-none m-0 border-left">
                              <div class="card-body text-center">
                                 <i class="dripicons-link-broken text-muted" style="font-size: 24px;"></i>
                                 <h3><span><?php
                                 $active_sql = mysqli_query($connect,"SELECT * FROM `subscriptions` WHERE `status` = '0'");
                                 echo mysqli_num_rows($active_sql);
                                 ?></span></h3>
                                 <p class="text-muted font-15 mb-0">Inactive Subscriptions</p>
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
                  <h4 class="mb-3 header-title">Subscription list</h4>
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
                                       <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 142.6px;" aria-label="duratino">duration</th>
                                       <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 148.6px;" aria-label="Enrolled student">Subscribers</th>
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
                                          $subscription_sql = mysqli_query($connect,"SELECT * FROM `subscriptions` WHERE `created_date` BETWEEN '$from' AND '$to'");                                          
                                       }   
                                       else
                                       {                                   
                                          $subscription_sql = mysqli_query($connect,"SELECT * FROM `subscriptions` WHERE `created_date` = '$from'");                                          
                                       }                              
                                    }
                                    else
                                    {
                                       $subscription_sql = mysqli_query($connect,"SELECT * FROM `subscriptions`");
                                    }

                                    while($row = mysqli_fetch_assoc($subscription_sql))
                                    {
                                 ?>
                                    <tr role="row">
                                       <td class="sorting_1" tabindex="0"><?=$i?></td>
                                       <td><strong><a href="#/1"><?=$row['subscription_name']?></a></strong><br>
                                          <small class="text-muted">Created By: <b>
                                          <?php
                                          $create_sql = mysqli_query($connect,"SELECT * FROM `users` WHERE `id` = '$row[created_by]'");
                                          $row1 = mysqli_fetch_assoc($create_sql);
                                          echo $row1['first_name']." ".$row1['last_name'];
                                          ?></b></small><br>
                                          <small class="text-muted">Created Date:<b><?=$row['created_date']?></b></small>
                                       </td>
                                       <td><span class="badge badge-dark-lighten">
                                       <?=$row['subscription_duration']?>
                                       </span></td>
                                       <td><small class="text-muted"><b>Total Subscriber</b>: <?php
                                       $enroll_count_sql = mysqli_query($connect,"SELECT * FROM `user_subscriptions` WHERE `subscription_code` = '$row[subscription_code]'");
                                       echo mysqli_num_rows($enroll_count_sql);
                                       
                                       ?></small></td>
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
                                       <td><?=$row['subscription_price']?></td>
                                       <td>
                                          <div class="dropright dropright">
                                             <button type="button" class="btn btn-sm btn-outline-primary btn-rounded btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                             <i class="mdi mdi-dots-vertical"></i>
                                             </button>
                                             <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="edit_subscription.php?id=<?=$row['subscription_code']?>">Edit</a></li>
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