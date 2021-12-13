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
                  <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> Add Admin</h4>
               </div>
            </div>
         </div>
      </div>
      <div class="row justify-content-center">
         <div class="col-xl-12">
            <div class="card">
               <div class="card-body">
                  <form class="required-form" action="add_admin_submit.php" method="POST" enctype="multipart/form-data">                  
                                <span id="message">
                              <span></span>

                              </span>
                                <div class="pms-field pms-user-login-field form-group " style="    width: -webkit-fill-available;">
                                    <label for="pms_user_login" >USERNAME <span class="required">*</span></label>
                                    <input id="pms_user_name" class="form-control" name="username" type="text" required>
                                </div>
                                <div class="pms-field pms-user-email-field form-group">
                                    <label for="pms_user_email">E-MAIL <span class="required">*</span></label>
                                    <input id="pms_user_email" name="user_email" class="form-control" type="email" required>
                                </div>
                                <div class="pms-field pms-user-name-field form-group">
                                    <label for="pms_user_phone">Phone <span class="required">*</span></label>
                                    <input id="pms_user_phone" name="user_phone" type="text" class="form-control" maxlength="10" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
                                </div>
                                <div class="pms-field pms-first-name-field form-group">
                                    <label for="pms_first_name">First Name <span class="required">*</span></label>
                                    <input id="pms_first_name" name="first_name" type="text" class="form-control" required>
                                </div>
                                <div class="pms-field pms-last-name-field form-group">
                                    <label for="pms_last_name">Last Name <span class="required">*</span></label>
                                    <input id="pms_last_name" name="last_name" type="text" class="form-control" required>
                                </div>
                                <div class="pms-field pms-pass1-field form-group">
                                    <label for="pms_pass1">Password <span class="required">*</span></label>
                                    <input id="pms_pass1" name="password" onkeyup="check();" class="form-control" type="password" required>                                    
                                </div>
                                <div class="pms-field pms-pass2-field form-group">
                                    <label for="pms_pass2">Repeat Password <span class="required">*</span></label>
                                    <input id="pms_pass2" name="pass2" onkeyup="check();" class="form-control" type="password" required>                                    
                                </div>
                                <div class="pms-field form-group">
                                    <label for="pms_menu">Menu Acess<span class="required">*</span></label>
                                    <select id="pms_menu" name="menu[]"  class="form-control" required multiple>                                    
                                        <?php
                                            $menus = mysqli_query($connect,"SELECT * FROM `menu_item` WHERE link != '' AND `status` = '1'");
                                            while($row = mysqli_fetch_assoc($menus))
                                            {
                                                if($row['parent_id'] == '0')
                                                {
                                                      $value1= $row['id'];  
                                                }
                                                else
                                                {
                                                      $value1 = $row['id'].",".$row['parent_id']; 
                                                }
                                                ?>
                                                    <option value="<?=$value1?>"><?=$row['title']?></option>
                                                <?php
                                            }
                                        ?>

                                    </select>
                                </div>   

                                <div class="row justify-content-center">
                        <div class="col-md-4">
                           <button type="submit" class="btn btn-primary btn-block"">Add Admin</button>
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