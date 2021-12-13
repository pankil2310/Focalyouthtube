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
                  <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> Categories                  <a href="add_category" class="btn btn-outline-primary btn-rounded alignToTitle"><i class="mdi mdi-plus"></i>Add new category</a>
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
                                       <th class="sorting_asc" rowspan="1" colspan="1"  aria-label="#">#</th>
                                       <th class="sorting_disabled" rowspan="1" colspan="1"  aria-label="Title">Title</th>
                                       <th class="sorting_disabled" rowspan="1" colspan="1"  aria-label="Category">Category Code</th>
                                       <th class="sorting_disabled" rowspan="1" colspan="1"  aria-label="Lesson and section">Created By</th>
                                       <th class="sorting_disabled" rowspan="1" colspan="1"  aria-label="Lesson and section">Created Date</th>
                                       <th class="sorting_disabled" rowspan="1" colspan="1"  aria-label="Enrolled student">Status</th>
                                       <th class="sorting_disabled" rowspan="1" colspan="1"  aria-label="Actions">Actions</th>
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
                                       $cat_sql = mysqli_query($connect,"SELECT * FROM `course_category` WHERE `created_date` BETWEEN '$from' AND '$to'");                                       
                                       
                                    }   
                                    else
                                    {
                                       $cat_sql = mysqli_query($connect,"SELECT * FROM `course_category` WHERE `created_date` = '$from'");                                                                          
                                    }                              
                                 }
                                 else
                                 {
                                    $cat_sql = mysqli_query($connect,"SELECT * FROM `course_category`");
                                 }
                                    
                                    $i = 1;
                                    while($row = mysqli_fetch_assoc($cat_sql))
                                    {
                                 ?>
                                    <tr role="row">
                                       <td class="sorting_1" tabindex="0"><?=$i?></td>
                                       <td><strong><a href="#"><?=$row['cat_name']?></a></strong><br>
                                       </td>
                                       <td><span class="badge badge-dark-lighten"><?=$row['category_code']?></span></td>
                                       <td><small class="text-muted"><b>
                                       <?php
                                          $created_by = $row['created_by'];
                                          $by = mysqli_query($connect,"SELECT * FROM `users` WHERE `id` =  '$created_by'");
                                          $row1 = mysqli_fetch_assoc($by);
                                          echo $row1['first_name']." ".$row1['last_name'];
                                       ?>                                       
                                       </b></small></td>
                                       <td><small class="text-muted"><b><?=$row['created_date']?></b></small></td>
                                       <td><span class="badge badge-success-lighten">
                                       <?php
                                       if($row['status'] == '1')
                                       {
                                          echo "Active";
                                       }
                                       else
                                       {
                                          echo "Inactive";
                                       }
                                       ?>
                                       </span></td>
                                       <td>
                                          <div class="dropright dropright">
                                             <button type="button" class="btn btn-sm btn-outline-primary btn-rounded btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                             <i class="mdi mdi-dots-vertical"></i>
                                             </button>
                                             <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="edit_category.php?id=<?=$row['id']?>">Edit this category</a></li>
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
      <script type="text/javascript">
         $('.on-hover-action').mouseenter(function() {
             var id = this.id;
             $('#category-delete-btn-'+id).show();
             $('#category-edit-btn-'+id).show();
         });
         $('.on-hover-action').mouseleave(function() {
             var id = this.id;
             $('#category-delete-btn-'+id).hide();
             $('#category-edit-btn-'+id).hide();
         });
      </script>
      <!-- END PLACE PAGE CONTENT HERE -->
   </div>
</div>
<?php
    include('footer.php');
?>