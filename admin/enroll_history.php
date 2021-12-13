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
                  <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> Subscribe history</h4>
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
                  <h4 class="mb-3 header-title">Subscriber histories</h4>
                  <div class="row justify-content-md-center">
                     <div class="col-xl-6">
                     <div style="text-align: -webkit-center;">
                              <form style="display: inline-flex;" method="POST" action="">
                                 <input type="date" class="form-control" name="from"  required>
                                 <p></p>
                                 <input type="date" class="form-control" name="to" >
                                 <p></p>
                                 <input type="submit" name="filter" class="form-control" value="Filter">
                              </form>

                           </div>
                     </div>
                  </div>
                  <div class="col-sm-12">
                  <table id="basic-datatable" class="table table-striped dt-responsive nowrap dataTable no-footer dtr-inline" role="grid" aria-describedby="basic-datatable_info" style="position: relative;">
                        <thead>
                           <tr>
                              <th>#</th>
                              <th>User name</th>
                              <th>Subscribed course</th>
                              <th>Subscription date</th>
                              <th>Subscription end date</th>
                              <!--<th>Actions</th>-->
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
                                       $enroll_course_sql = mysqli_query($connect,"SELECT * FROM `user_subscriptions` WHERE `start_date` BETWEEN '$from' AND '$to'");                                                                                                                
                                    }   
                                    else
                                    {
                                       $enroll_course_sql = mysqli_query($connect,"SELECT * FROM `user_subscriptions` WHERE `start_date` = '$from'");                                                                                                            
                                    }                              
                                 }
                                 else
                                 {
                                    $enroll_course_sql = mysqli_query($connect,"SELECT * FROM `user_subscriptions`");
                                 }
                           
                           while($row = mysqli_fetch_assoc($enroll_course_sql))
                           {
                              $user_id = $row['user_id'];
                              $subscription_code = $row['subscription_code'];
                              $start_date = $row['start_date'];
                              $end_date = $row['end_date'];

                              $user_sql = mysqli_query($connect,"SELECT * FROM `users` WHERE `id` = '$user_id'");
                              $user_row = mysqli_fetch_assoc($user_sql);

                           ?>
                           <tr class="gradeU">
                              <td><?=$i?></td>
                              <td>
                                 <b><?=$user_row['first_name']?> <?=$user_row['last_name']?></b><br>
                                 <small>Email: <?=$user_row['user_email']?></small>
                              </td>
                              <td><strong><a href="#" target="_blank"><?php
                              $course_sql = mysqli_query($connect,"SELECT * FROM `subscriptions` WHERE `subscription_code` = '$subscription_code'");
                              $course_row = mysqli_fetch_assoc($course_sql);
                              echo $course_row['subscription_name'];
                              ?></a></strong></td>
                              <td><?=$start_date?></td>
                              <td><?=$end_date?></td>
                              <!--<td class="">
                                       <div class="dropright dropright">
                                          <button type="button" class="btn btn-sm btn-outline-primary btn-rounded btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          <i class="mdi mdi-dots-vertical"></i>
                                          </button>
                                          <ul class="dropdown-menu" x-placement="right-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(42px, 0px, 0px);">
                                             <li><a class="dropdown-item" href="#?id=<?=$row['id']?>">Edit</a></li>
                                          </ul>
                                       </div>
                                    </td> -->
                           </tr>
                           <?php
                           $i++;
                           }
                           ?>
                        </tbody>
                     </table>
                  </div>
               </div>
               <!-- end card body-->
            </div>
            <!-- end card -->
         </div>
         <!-- end col-->
      </div>
      <script type="text/javascript">
         function update_date_range()
         {
             var x = $("#selectedValue").html();
             $("#date_range").val(x);
         }
      </script>
      <!-- END PLACE PAGE CONTENT HERE -->
   </div>
</div>

<?php
include('footer.php');
?>