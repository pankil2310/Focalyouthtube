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
                  <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> Student edit </h4>
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
                  <h4 class="header-title mb-3">Student edit form</h4>
                  <form class="required-form" action="edit_user_submit.php" enctype="multipart/form-data" method="post">
                     <div id="progressbarwizard">                        
                        <div class="tab-content b-0 mb-0">
                           <div class="tab-pane active" id="basic_info">
                              <div class="row">
                                 <div class="col-12">
                            <?php
                            $user_id = $_GET['id'];
                            $user_get_sql = mysqli_query($connect,"SELECT * FROM `users` WHERE `id` = '$user_id'");
                            $row = mysqli_fetch_assoc($user_get_sql);

                            ?>
                              <div class="form-group row mb-3">
                                       <label class="col-md-3 col-form-label" for="username">Username<span class="required">*</span></label>
                                       <div class="col-md-9">
                                       <input type="hidden" name="userid" value="<?=$session_id?>">
                                       <input type="hidden" name="userid_update" value="<?=$user_id?>">
                                          <input type="text" class="form-control" id="username" name="username" value="<?=$row['username']?>" readonly>
                                       </div>
                                    </div>
                                    
                                    <div class="form-group row mb-3">
                                       <label class="col-md-3 col-form-label" for="email">Email<span class="required">*</span></label>
                                       <div class="col-md-9">
                                          <input type="email" class="form-control" id="email" name="user_email" value="<?=$row['user_email']?>" readonly>
                                       </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                       <label class="col-md-3 col-form-label" for="phone">Phone Number<span class="required">*</span></label>
                                       <div class="col-md-9">
                                          <input type="text" class="form-control" id="phone" name="user_phone" maxlength="10" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" value="<?=$row['user_phone']?>" readonly>
                                       </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                       <label class="col-md-3 col-form-label" for="first_name">First name<span class="required">*</span></label>
                                       <div class="col-md-9">
                                          <input type="text" class="form-control" id="first_name" name="first_name" value="<?=$row['first_name']?>" readonly>
                                       </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                       <label class="col-md-3 col-form-label" for="last_name">Last name<span class="required">*</span></label>
                                       <div class="col-md-9">
                                          <input type="text" class="form-control" id="last_name" name="last_name" value="<?=$row['last_name']?>" readonly>
                                       </div>
                                    </div>                                    
                                    <div class="form-group row mb-3">
                                       <label class="col-md-3 col-form-label" for="gender">Gender<span class="required">*</span></label>
                                       <div class="col-md-9">
                                          <input type="text" class="form-control" id="gender" name="gender" value="<?=$row['gender']?>" readonly>
                                       </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                       <label class="col-md-3 col-form-label" for="dob">Date Of Birth<span class="required">*</span></label>
                                       <div class="col-md-9">
                                          <input type="text" class="form-control" id="dob" name="dob" value="<?=$row['date_of_birth']?>" readonly>
                                       </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                       <label class="col-md-3 col-form-label" for="status">Status<span class="required">*</span></label>
                                       <div class="col-md-9">
                                          <select class="form-control" id="status" name="status" required>
                                          <?php
                                          if($row['status'] == '1')
                                          {
                                              ?>
                                              <option value="1" selected>Active</option>
                                              <option value="0">Inactive</option>
                                              <?php
                                          }
                                          else
                                          {
                                            ?>
                                            <option value="1" >Active</option>
                                            <option value="0" selected>Inactive</option>
                                            <?php
                                          }

                                          ?>
                                          
                                          </select>
                                       </div>
                                    </div>
                                    <!--<div class="form-group row mb-3">
                                       <label class="col-md-3 col-form-label" for="user_image">User image</label>
                                       <div class="col-md-9">
                                          <div class="input-group">
                                             <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="user_image" name="user_image" accept="image/*" onchange="changeTitleOfImageUploader(this)">
                                                <label class="custom-file-label" for="user_image">Choose user image</label>
                                             </div>
                                          </div>
                                       </div>
                                    </div>-->
                                    <div class="mb-3">
                                          <button type="submit" class="btn btn-primary" onclick="checkRequiredFields()" id="pms_register_but" name="button">Update</button>
                                       </div>
                                 </div>
                                 <!-- end col -->
                              </div>
                              <!-- end row -->
                           </div>
                        </div>
                        <!-- tab-content -->
                     </div>
                     <!-- end #progressbarwizard-->
                  </form>
               </div>
               <!-- end card-body -->
            </div>
            <!-- end card-->
         </div>
      </div>
      <!-- END PLACE PAGE CONTENT HERE -->
   </div>
</div>

<?php
include('footer.php');
?>