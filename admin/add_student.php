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
                  <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> Learner add </h4>
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
                  <h4 class="header-title mb-3">Learner add form</h4>
                  <form class="required-form" action="add_newuser_submit.php" enctype="multipart/form-data" method="post">
                     <div id="progressbarwizard">                        
                        <div class="tab-content b-0 mb-0">
                           <div class="tab-pane active" id="basic_info">
                              <div class="row">
                                 <div class="col-12">
                                 <span id="message">
                              <span></span>

                              </span>
                              <div class="form-group row mb-3">
                                       <label class="col-md-3 col-form-label" for="username">Username<span class="required">*</span></label>
                                       <div class="col-md-9">
                                          <input type="text" class="form-control" id="username" name="username" required="">
                                       </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                       <label class="col-md-3 col-form-label" for="password">Password<span class="required">*</span></label>
                                       <div class="col-md-9">
                                          <input type="password" class="form-control" id="password" name="password" required="">
                                       </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                       <label class="col-md-3 col-form-label" for="first_name">First name<span class="required">*</span></label>
                                       <div class="col-md-9">
                                          <input type="text" class="form-control" id="first_name" name="first_name" required="">
                                       </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                       <label class="col-md-3 col-form-label" for="last_name">Last name<span class="required">*</span></label>
                                       <div class="col-md-9">
                                          <input type="text" class="form-control" id="last_name" name="last_name" required="">
                                       </div>
                                    </div>                                    
                                    <div class="form-group row mb-3">
                                       <label class="col-md-3 col-form-label" for="email">Email<span class="required">*</span></label>
                                       <div class="col-md-9">
                                          <input type="email" class="form-control" id="email" name="user_email" required="">
                                       </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                       <label class="col-md-3 col-form-label" for="phone">Phone Number<span class="required">*</span></label>
                                       <div class="col-md-9">
                                          <input type="text" class="form-control" id="phone" name="user_phone" maxlength="10" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required="">
                                       </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                       <label class="col-md-3 col-form-label" for="gender">Gender<span class="required">*</span></label>
                                       <div class="col-md-9">
                                          <select class="form-control" id="gender" name="gender" required="">
                                          <option value="">Select Gender</option>
                                          <option value="male">Male</option>
                                          <option value="female">Female</option>
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
                                          <button type="submit" class="btn btn-primary" onclick="checkRequiredFields()" id="pms_register_but" name="button">Add New User</button>
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
<script>
$(document).ready(function () {

   $("#username").on('input', function() {
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



    $("#email").on('input', function() {
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


    $("#phone").on('input', function() {
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

    

});
</script>
<?php
include('footer.php');
?>