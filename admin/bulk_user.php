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
                  <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> Bulk User Registration </h4>
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
                  <h4 class="header-title mb-3">Bulk User Registration form   <a style="    float: right;" href="/admin/uploads/bulk_user.csv">Download Sample File</a></h4>
                  <form class="required-form" action="bulk_user_submit.php" enctype="multipart/form-data" method="post">
                     <div id="progressbarwizard">                        
                        <div class="tab-content b-0 mb-0">
                           <div class="tab-pane active" id="basic_info">
                              <div class="row">
                                 <div class="col-12">
                                 <span id="message">
                                  <span></span>
    
                                  </span>
                                    <div class="form-group row mb-3">
                                       <label class="col-md-3 col-form-label" for="bulk_users">Upload File(*)</label>
                                       <div class="col-md-9">
                                          <div class="input-group">
                                             <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="bulk_users" name="bulk_users" accept=".csv" onchange="changeTitleOfImageUploader(this)" required>
                                                <label class="custom-file-label" for="bulk_users">Choose File To Upload</label>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="mb-3">
                                          <button type="submit" class="btn btn-primary" onclick="checkRequiredFields()" id="pms_register_but" name="button">Upload File</button>
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