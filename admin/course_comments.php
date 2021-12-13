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
                  <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> Video Comments
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
                  <h4 class="mb-3 header-title">Video Comments</h4>
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
                                       <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 513.6px;" aria-label="Title">Video Title</th>
                                       <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 148.6px;" aria-label="Enrolled student">Comments</th>
                                       <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 64.6px;" aria-label="Status">Status</th>
                                       <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 52.6px;" aria-label="Price">By User</th>
                                       <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 52.6px;" aria-label="Price">Created Date</th>
                                       <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 74.6px;" aria-label="Actions">Actions</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                 <?php
                                 if($_POST['from'])
                                 {
                                    $from = str_replace("-","/",$_POST['from']);
                                    if($_POST['to'])
                                    {
                                       $to = str_replace("-","/",$_POST['to']);
                                       $course_comment_sql = mysqli_query($connect,"SELECT * FROM `course_comments` WHERE DATE(`created_date`) BETWEEN '$from' AND '$to' ORDER BY `id` desc");
                                       
                                    }   
                                    else
                                    {                                   
                                       $course_comment_sql = mysqli_query($connect,"SELECT * FROM `course_comments` WHERE DATE(`created_date`) = '$from' ORDER BY `id` desc");                                                                         
                                    }                              
                                 }
                                 else
                                 {
                                    $course_comment_sql = mysqli_query($connect,"SELECT * FROM `course_comments` ORDER BY `id` desc");
                                 }

                                 
                                    
                                    $i = 1;
                                    while($row = mysqli_fetch_assoc($course_comment_sql))
                                    {

                                        $course_sql = mysqli_query($connect,"SELECT * FROM `courses` WHERE `course_code` = '$row[course_code]'");
                                        $course = mysqli_fetch_assoc($course_sql);

                                 ?>
                                    <tr role="row">
                                       <td class="sorting_1" tabindex="0"><?=$i?></td>
                                       <td><strong><a href="#/1"><?=$course['course_name']?></a></strong><br>
                                       <span class="badge badge-dark-lighten">
                                       <?php
                                       $cat_sql = mysqli_query($connect,"SELECT * FROM `course_category` WHERE `category_code` = '$course[course_category]'");
                                       $row2 = mysqli_fetch_assoc($cat_sql);
                                       echo $row2['cat_name'];
                                       ?>
                                       </span></td>                                       
                                       <td><strong><?=$row['comment']?></strong></td>
                                       <td><span class="badge badge-success-lighten"><?php
                                       if($row['status'] == '0')
                                       {
                                          echo "Pending";
                                       }
                                       else if($row['status'] == '1')
                                       {
                                          echo "Approved";
                                       }
                                       else if($row['status'] == '2')
                                       {
                                          echo "Disapproved";
                                       }
                                       
                                       ?></span></td>
                                       <td><span class="badge badge-success-lighten">
                                       <?php
                                       $user_sql = mysqli_query($connect,"SELECT * FROM `users` WHERE `id` = '$row[session_id]'");
                                       $user = mysqli_fetch_assoc($user_sql);
                                       echo $user['first_name']." ".$user['last_name'];
                                       
                                       ?>                                       
                                       </span></td>
                                       <td><?=date('Y/m/d',strtotime($row['created_date']))?></td>
                                       <td>
                                          <div class="dropright dropright">
                                             <button type="button" class="btn btn-sm btn-outline-primary btn-rounded btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                             <i class="mdi mdi-dots-vertical"></i>
                                             </button>
                                             <ul class="dropdown-menu">
                                                <?php
                                                    if($row['status'] == '0')
                                                    {
                                                       ?>
                                                        <li><a class="dropdown-item" href="approve_comment.php?id=<?=$row['id']?>" target="_blank">Approve Comment</a></li>
                                                        <li><a class="dropdown-item" href="disapprove_comment.php?id=<?=$row['id']?>">Disapprove Comment</a></li>
                                                       <?php
                                                    }
                                                    else if($row['status'] == '1')
                                                    {
                                                       ?>
                                                        <li><a class="dropdown-item" href="disapprove_comment.php?id=<?=$row['id']?>">Disapprove Comment</a></li>                                              
                                                       <?php                                
                                                    }
                                                    else if($row['status'] == '2')
                                                    {
                                                        ?>
                                                        <li><a class="dropdown-item" href="approve_comment.php?id=<?=$row['id']?>" target="_blank">Approve Comment</a></li>
                                                        <?php                                                       
                                                    }
                                                ?>
                                                
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