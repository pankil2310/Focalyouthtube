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
               <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> Learner                    <a href="add_student.php" class="btn btn-outline-primary btn-rounded alignToTitle"><i class="mdi mdi-plus"></i>Add Learner</a>
               </h4>
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
               <h4 class="mb-3 header-title">Learner</h4>
               <div class="table-responsive-sm mt-4">
                  <div id="basic-datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                  
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
                           <div style="position: absolute; height: 1px; width: 0px; overflow: hidden;"><input type="text" tabindex="0"></div>
                           <table id="basic-datatable" class="table table-striped dt-responsive nowrap dataTable no-footer dtr-inline" role="grid" aria-describedby="basic-datatable_info" style="position: relative;">
                              <thead>
                                 <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="basic-datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="#: activate to sort column descending" style="width: 32.4062px;">#</th>
                                    <th class="sorting" tabindex="0" aria-controls="basic-datatable" rowspan="1" colspan="1" aria-label="Photo: activate to sort column ascending" style="width: 76.2031px;">Photo</th>
                                    <th class="sorting" tabindex="0" aria-controls="basic-datatable" rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending" style="width: 124.484px;">Name</th>
                                    <th class="sorting" tabindex="0" aria-controls="basic-datatable" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending" style="width: 255.453px;">Email</th>
                                    <th class="sorting" tabindex="0" aria-controls="basic-datatable" rowspan="1" colspan="1" aria-label="Enrolled courses: activate to sort column ascending" style="width: 598.938px;">Enrolled courses</th>
                                    <th class="sorting" tabindex="0" aria-controls="basic-datatable" rowspan="1" colspan="1" aria-label="Status" style="width: 91.2344px;">Joined Date</th>
                                    <th class="sorting" tabindex="0" aria-controls="basic-datatable" rowspan="1" colspan="1" aria-label="Status" style="width: 91.2344px;">Status</th>
                                    <th class="sorting" tabindex="0" aria-controls="basic-datatable" rowspan="1" colspan="1" aria-label="Actions: activate to sort column ascending" style="width: 91.2344px;">Actions</th>
                                 </tr>
                              </thead>
                              <tbody>
                              <?php
                              $i =1;
                              if($_POST['from'])
                              {
                                 $from = str_replace("-","/",$_POST['from']);
                                 if($_POST['to'])
                                 {
                                    $to = str_replace("-","/",$_POST['to']);
                                    $users_sql = mysqli_query($connect,"SELECT * FROM `users` WHERE `user_role` = '2' AND `created_date` BETWEEN '$from' AND '$to'");
                                 }   
                                 else
                                 {                                   
                                    $users_sql = mysqli_query($connect,"SELECT * FROM `users` WHERE `user_role` = '2' AND `created_date` = '$from'");
                                 }                              
                              }
                              else
                              {
                                 $users_sql = mysqli_query($connect,"SELECT * FROM `users` WHERE `user_role` = '2'");
                              }
                              
                              while($row = mysqli_fetch_assoc($users_sql))
                              {

                              ?>
                                 <tr role="row">
                                    <td class="sorting_1"><?=$i?></td>
                                    <td>
                                    <?php
                                    if($row['profile_image'] != '')
                                    {
                                       ?>
                                       <img src="../<?=$row['profile_image']?>" alt="" height="50" width="50" class="img-fluid rounded-circle img-thumbnail">
                                       <?php
                                    }
                                    else
                                    {
                                       ?>
                                       <img src="uploads/user_image/placeholder.png" alt="" height="50" width="50" class="img-fluid rounded-circle img-thumbnail">
                                       <?php
                                    }

                                    ?>
                                    </td>
                                    <td> <?=$row['first_name']?> <?=$row['last_name']?></td>
                                    <td><?=$row['user_email']?></td>
                                    <td>
                                       <ul>
                                          <?php
                                          $enroll = mysqli_query($connect,"SELECT * FROM `course_enroll` WHERE `user_id` = '$row[id]'");
                                          if(mysqli_num_rows($enroll) > 0)
                                          {
                                             while($enroll_row = mysqli_fetch_assoc($enroll))
                                             {
                                                 $course_name_sql = mysqli_query($connect,"SELECT * FROM `courses` WHERE `course_code` = '$enroll_row[course_code]'");
                                                 $course_name = mysqli_fetch_assoc($course_name_sql);  
                                                 echo "<li>".$course_name['course_name']."</li>";     
                                             }

                                          }
                                          else
                                          {
                                          ?>
                                          <li>No Course Enrolled</li> 
                                          <?php
                                          }
                                          ?>
                                       </ul>
                                    </td>
                                    <td>
                                       <?=$row['created_date']?>
                                    </td>
                                    <td><?php
                                    if($row['status'] == '1' )
                                    {
                                       echo "Active";
                                    }
                                    else
                                    {
                                       echo "Inactive";
                                    }
                                    ?></td>
                                    <td class="">
                                       <div class="dropright dropright">
                                          <button type="button" class="btn btn-sm btn-outline-primary btn-rounded btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          <i class="mdi mdi-dots-vertical"></i>
                                          </button>
                                          <ul class="dropdown-menu" x-placement="right-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(42px, 0px, 0px);">
                                             <li><a class="dropdown-item" href="edit_user.php?id=<?=$row['id']?>">Edit</a></li>
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
                        </div>
                     </div>
                  </div>
               </div>
               <!-- end card body-->
            </div>
            <!-- end card -->
         </div>
         <!-- end col-->
      </div>
      <!-- END PLACE PAGE CONTENT HERE -->
   </div>
</div>
<?php
include('footer.php');
?>