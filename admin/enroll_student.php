<?php
include('header.php');
?>
<div class="content-page">
   <div class="content">
      <!-- BEGIN PlACE PAGE CONTENT HERE -->
      <!-- start page title -->
      <div class="row ">
         <div class="col-xl-12">
            <div class="card">
               <div class="card-body">
                  <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> Subscribe a Learner</h4>
               </div>
               <!-- end card body-->
            </div>
            <!-- end card -->
         </div>
         <!-- end col-->
      </div>
      <div class="row justify-content-center">
         <div class="col-xl-7">
            <div class="card">
               <div class="card-body">
                  <div class="col-lg-12">
                     <h4 class="mb-3 header-title">Subscriber form</h4>
                     <form class="required-form" action="enroll_student_submit.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                           <label for="user_id">User<span class="required">*</span> </label>
                           <input type="hidden" name="session" value="<?=$session_id?>">
                           <select class="form-control select2 select2-hidden-accessible" data-toggle="select2" name="user_id" id="user_id" required="" data-select2-id="user_id" tabindex="-1" aria-hidden="true" >
                              <option value="" data-select2-id="2">Select a user</option>
                              <?php
                              $users_sql = mysqli_query($connect,"SELECT * FROM `users` WHERE `user_role` ='2' AND `status` = '1'");
                              while($users_row = mysqli_fetch_assoc($users_sql))
                              {                              
                              ?>
                              <option value="<?=$users_row['id']?>"><?=$users_row['first_name']?> <?=$users_row['last_name']?></option>                              
                              <?php
                              }
                              ?>
                           </select>
                        </div>
                        <div class="form-group">
                           <label for="course_id">Video to Subsribe<span class="required">*</span> </label>
                           <select class="form-control select2 select2-hidden-accessible" data-toggle="select2" name="course_id" id="course_id" required="" data-select2-id="course_id" tabindex="-1" aria-hidden="true" >
                              <option value="" data-select2-id="4">Select a Video</option>
                              <?php
                              $course_sql = mysqli_query($connect,"SELECT * FROM `courses` WHERE `status` = '1'");
                              while($courses_row = mysqli_fetch_assoc($course_sql))
                              {
                              ?>
                              <option value="<?=$courses_row['course_code']?>"><?=$courses_row['course_name']?></option>
                              <?php
                              }
                              ?>
                           </select>
                        </div>
                        <button type="button" class="btn btn-primary" onclick="checkRequiredFields()">Subscribe a Learner</button>
                     </form>
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