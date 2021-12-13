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
                  <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> Edit Admin</h4>
               </div>
            </div>
         </div>
      </div>
      <?php
      $admin_id = $_GET['id'];
      $admin_details = mysqli_query($connect,"SELECT * FROM `users` WHERE `id` = '$admin_id'");
      $row = mysqli_fetch_assoc($admin_details);


      $menu_acess_details = mysqli_query($connect,"SELECT * FROM `menu_acess` WHERE `user_id` = '$admin_id'");
      $row2 = mysqli_fetch_assoc($menu_acess_details);
      $menu_ids = $row2['menu_ids']; 


      $menus = mysqli_query($connect,"SELECT * FROM `menu_item` WHERE link != '' AND `id` IN ($menu_ids)");
      while($row3 = mysqli_fetch_assoc($menus))
      {
        $menu_ids_acess[] = $row3['id']; 
      }
      ?>
      <div class="row justify-content-center">
         <div class="col-xl-12">
            <div class="card">
               <div class="card-body">
                  <form class="required-form" action="edit_admin_submit.php" method="POST" enctype="multipart/form-data">                  
                                <span id="message">
                              <span></span>

                              </span>
                                <div class="pms-field pms-user-login-field form-group " style="    width: -webkit-fill-available;">
                                    <label for="pms_user_login" >USERNAME <span class="required">*</span></label>
                                    <input type="hidden" name="admin_id" value="<?=$admin_id?>" required>
                                    <input type="hidden" name="session_id" value="<?=$session_id?>" required>
                                    <input id="pms_user_name" class="form-control" name="username" value="<?=$row['username']?>" type="text" readonly>
                                </div>
                                <div class="pms-field pms-user-email-field form-group">
                                    <label for="pms_user_email">E-MAIL <span class="required">*</span></label>
                                    <input id="pms_user_email" name="user_email" class="form-control" value="<?=$row['user_email']?>" type="email" readonly>
                                </div>
                                <div class="pms-field pms-user-name-field form-group">
                                    <label for="pms_user_phone">Phone <span class="required">*</span></label>
                                    <input id="pms_user_phone" name="user_phone" type="text" class="form-control" value="<?=$row['user_phone']?>" maxlength="10" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" readonly>
                                </div>
                                <div class="pms-field pms-first-name-field form-group">
                                    <label for="pms_first_name">First Name <span class="required">*</span></label>
                                    <input id="pms_first_name" name="first_name" type="text" class="form-control" value=<?=$row['first_name']?>" required>
                                </div>
                                <div class="pms-field pms-last-name-field form-group">
                                    <label for="pms_last_name">Last Name <span class="required">*</span></label>
                                    <input id="pms_last_name" name="last_name" type="text" class="form-control" value="<?=$row['last_name']?>" required>
                                </div>
                                <div class="pms-field form-group">
                                    <label for="pms_menu">Menu Acess<span class="required">*</span></label>
                                    <select id="pms_menu" name="menu[]"  class="form-control" required multiple>                                    
                                        <?php
                                            $menus = mysqli_query($connect,"SELECT * FROM `menu_item` WHERE link != '' AND `status` = '1'");
                                            while($row1 = mysqli_fetch_assoc($menus))
                                            {
                                                if($row1['parent_id'] == '0')
                                                {
                                                      $value1= $row1['id'];  
                                                }
                                                else
                                                {
                                                      $value1 = $row1['id'].",".$row1['parent_id']; 
                                                }
                                                if(in_array($row1['id'],$menu_ids_acess))
                                                {
                                                ?>                                                
                                                    <option value="<?=$value1?>" selected><?=$row1['title']?></option>
                                                <?php
                                                }
                                                else
                                                {
                                                ?>
                                                    <option value="<?=$value1?>"><?=$row1['title']?></option>
                                                <?php
                                                }      
                                            }
                                        ?>

                                    </select>
                                </div>   
                                <div class="pms-field form-group">
                                    <label for="pms_status">Status<span class="required">*</span></label>
                                    <select id="pms_status" name="status"  class="form-control" required >                                    
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

                                <div class="row justify-content-center">
                        <div class="col-md-4">
                           <button type="submit" class="btn btn-primary btn-block"">Edit Admin</button>
                        </div>
                     </div>                           
                  </form>
               </div>
            </div>
         </div>
      </div>
      
   </div>
</div>



<style>
    #message{
        color:red;
    }
</style>

<script>
$(document).ready(function () {

   $("#pms_user_name").on('input', function() {
        var value = $(this).val();    
        $.ajax({
            type: "POST",
            url: '../ajax/check_validation.php',
            data: 'type=username&value=' + value, // serializes the form's elements.
            success: function(data1)
            {         
                if(data1 == "true")
                {
                    $("#pms_register_but").prop('disabled', true);
                    $("#message").append("<p style='margin:0' id='usermsg'>Username Taken</p>");
                }
                else
                {
                    $("#usermsg").remove();
                    $("#pms_register_but").prop('disabled', false);
                }
            }
        });
    });



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
        $("#message span").html("Password does not match !").css("color","red");
        $("#message span").show();
    }else
    {
        $("#message span").hide();
    }
   });

});
</script>

<?php
include('footer.php');
?>