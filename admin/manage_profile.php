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
                  <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> Manage profile</h4>
               </div>
               <!-- end card body-->
            </div>
            <!-- end card -->
         </div>
         <!-- end col-->
      </div>
      <?php
      $admin_sql = mysqli_query($connect,"SELECT * FROM `users` WHERE `id` = '$session_id'");
      $row = mysqli_fetch_assoc($admin_sql);
      ?>
      <div class="row ">
         <div class="col-xl-7">
            <div class="card">
               <div class="card-body">
                  <h4 class="header-title mb-3">Basic info</h4>
                  <span id="message">
                              <span></span>

                              </span>
                  <form action="manage_profile_submit.php" class="form-horizontal form-groups-bordered validate" target="_top" enctype="multipart/form-data" method="post" accept-charset="utf-8">
            
                     <div class="form-group">
                        <label>First name</label>
                        <input type="hidden" name="id" value="<?=$row['id']?>">
                        <input type="hidden" name="session_id" value="<?=$session_id?>">
                        <input type="text" class="form-control" name="first_name" value="<?=$row['first_name']?>" required="">
                     </div>
                     <div class="form-group">
                        <label>Last name</label>
                        <input type="text" class="form-control" name="last_name" value="<?=$row['last_name']?>" required="">
                     </div>
                     <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" id="pms_user_email" name="user_email" value="<?=$row['user_email']?>" required="">
                     </div>
                     <div class="form-group">
                        <label>Phone</label>
                        <input type="text" class="form-control" id="pms_user_phone" name="user_phone" value="<?=$row['user_phone']?>"  maxlength="10" required="" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                     </div>
                     <div class="form-group">
                        <label> Photo <small></small> </label>
                        <div class="d-flex mt-2">
                           <?php
                           if($row['profile_image'] != '')
                           {
                           ?>
                           <div class="">
                              <img class="rounded-circle img-thumbnail" src="../<?=$row['profile_image']?>" alt="" style="height: 50px; width: 50px;">
                           </div>
                           <?php
                           }
                           ?>
                           <div class="flex-grow-1 pl-2">
                              <div class="input-group">
                                 <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="proimg" id="user_image" onchange="changeTitleOfImageUploader(this)" accept="image/*">
                                    <label class="custom-file-label ellipsis" for="">Choose file</label>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="row justify-content-center">
                        <button type="submit" class="btn btn-primary" id="pms_register_but">Update profile</button>
                     </div>
                  </form>
               </div>
               <!-- end card body-->
            </div>
            <!-- end card -->
         </div>
         <div class="col-xl-5">
            <div class="card">
               <div class="card-body">
                  <form action="chnage_password_submit.php" class="form-horizontal form-groups-bordered validate" target="_top" method="post" accept-charset="utf-8">
                  <span id="message1">
                              <span></span>

                              </span>
                     <div class="form-group">
                        <label>Current password</label>
                        <input type="hidden" name="id" value="<?=$row['id']?>">
                        <input type="hidden" name="session_id" value="<?=$session_id?>">
                        <input type="password" class="form-control" name="current_password"  required="">
                     </div>
                     <div class="form-group">
                        <label>New password</label>
                        <input type="password" class="form-control" name="new_password" id="pms_pass1"  required="">
                     </div>
                     <div class="form-group">
                        <label>Confirm new password</label>
                        <input type="password" class="form-control" name="confirm_password" id="pms_pass2"  required="">
                     </div>
                     <div class="row justify-content-center">
                        <button type="submit" id="pms_register_but1" class="btn btn-info">Update password</button>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>

      <style>
    #message,#message1{
        color:red;
    }
</style>
<script>
$(document).ready(function () {


    $("#pms_user_email").on('input', function() {
        var value = $(this).val();    
        $.ajax({
            type: "POST",
            url: '../ajax/check_validation.php',
            data: 'type=email&value=' + value, // serializes the form's elements.
            success: function(data1)
            {
                if(data1 == "true")
                {
                    $("#pms_register_but").prop('disabled', true);
                    $("#message").append("<p style='margin:0' id='emailmsg'>Email-id allready in use</p>");
                }
                else
                {
                    $("#emailmsg").remove();
                    $("#pms_register_but").prop('disabled', false);
                }
            }
        });
    });


    $("#pms_user_phone").on('input', function() {
        var value = $(this).val();    
        $.ajax({
            type: "POST",
            url: '../ajax/check_validation.php',
            data: 'type=phone&value=' + value, // serializes the form's elements.
            success: function(data1)
            {
                if(data1 == "true")
                {
                    $("#pms_register_but").prop('disabled', true);
                    $("#message").append("<p style='margin:0' id='phonemsg'>Phone number allready in use</p>");
                }
                else
                {
                    $("#phonemsg").remove();
                    $("#pms_register_but").prop('disabled', false);
                }
            }
        });
    });

    
    $("#pms_pass2").on('keyup', function(){
    var password = $("#pms_pass1").val();
    var confirmPassword = $("#pms_pass2").val();
    if (password != confirmPassword)
    {
        $("#message1 span").html("Password does not match !").css("color","red");
        $("#pms_register_but1").prop('disabled', true);
        $("#message1 span").show();
    }else
    {
      $("#pms_register_but1").prop('disabled', false);
        $("#message1 span").hide();
    }
   });

});
</script>



      <!-- END PLACE PAGE CONTENT HERE -->
   </div>
</div>

<?php
include('footer.php');
?>