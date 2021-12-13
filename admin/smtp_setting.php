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
                  <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> Smtp settings</h4>
               </div>
               <!-- end card body-->
            </div>
            <!-- end card -->
         </div>
         <!-- end col-->
      </div>
      <?php
      $smtp_sql = mysqli_query($connect,"SELECT * FROM `smtp_settings`");
      $row = mysqli_fetch_assoc($smtp_sql);
      ?>
      <div class="row justify-content-center">
         <div class="col-xl-7">
            <div class="card">
               <div class="card-body">
                  <div class="col-lg-12">
                     <h4 class="mb-3 header-title">Smtp settings</h4>
                     <form class="required-form" action="smtp_settings_submit.php" method="post" enctype="multipart/form-data">                        
                        <div class="form-group">
                           <label for="smtp_host">Smtp host<span class="required">*</span></label>
                           <input type="hidden" name="session_id" value="<?=$session_id?>">
                           <input type="text" name="smtp_host" id="smtp_host" class="form-control" placeholder="ssl://smtp.googlemail.com" value="<?=$row['host']?>" required="">
                        </div>
                        <div class="form-group">
                           <label for="smtp_port">Smtp port<span class="required">*</span></label>
                           <input type="text" name="smtp_port" id="smtp_port" class="form-control" placeholder="465" value="<?=$row['port']?>" required="">
                        </div>
                        <div class="form-group">
                           <label for="smtp_user">Smtp username<span class="required">*</span></label>
                           <input type="text" name="smtp_user" id="smtp_user" class="form-control" value="" value="<?=$row['username']?>" required="">
                        </div>
                        <div class="form-group">
                           <label for="smtp_pass">Smtp password<span class="required">*</span></label>
                           <input type="text" name="smtp_pass" id="smtp_pass" class="form-control" value="" value="<?=$row['password']?>" required="">
                        </div>
                        <button type="submit" class="btn btn-primary" onclick="checkRequiredFields()">Save</button>
                     </form>
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
