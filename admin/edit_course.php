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
                  <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> Edit Course </h4>
               </div>
               <!-- end card body-->
            </div>
            <!-- end card -->
         </div>
         <!-- end col-->
      </div>
      <?php
      $code = $_GET['id'];
      $course_details = mysqli_query($connect,"SELECT * FROM `courses` WHERE `course_code` = '$code'");
      $row = mysqli_fetch_assoc($course_details);
      ?>
      <div class="row">
         <div class="col-xl-12">
            <div class="card">
               <div class="card-body">
                  <h4 class="header-title mb-3">Edit Course</h4>
                  <form class="required-form" action="edit_course_submit.php" enctype="multipart/form-data" method="post">
                     <div id="progressbarwizard">                        
                        <div class="tab-content b-0 mb-0">
                           <div class="tab-pane active" id="basic_info">
                              <div class="row">
                                 <div class="col-12">
                                    <div class="form-group row mb-3">
                                       <label class="col-md-3 col-form-label" for="course_category">Select Course Category<span class="required">*</span></label>
                                       <div class="col-md-9">
                                          <select class="form-control" id="course_category" name="course_category" required="">
                                          <option value="">Select Course Category</option>
                                          <?php
                                          $get_category = mysqli_query($connect,"SELECT * FROM `course_category` WHERE `status` = '1'");
                                          while($row1 = mysqli_fetch_assoc($get_category))
                                          {
                                              if($row['course_category'] == $row1['category_code'])
                                              {
                                                ?>
                                                <option value="<?=$row1['category_code']?>" selected><?=$row1['cat_name']?></option>
                                                <?php
                                              }
                                              else
                                              {
                                          ?>
                                          <option value="<?=$row1['category_code']?>"><?=$row1['cat_name']?></option>
                                          <?php
                                              }
                                          }
                                          ?>
                                          </select>
                                       </div>
                                    </div>
                                    <?php
                                    ?>
                                    <div class="form-group row mb-3">
                                       <label class="col-md-3 col-form-label" for="cname">Course Name<span class="required">*</span></label>
                                       <div class="col-md-9">
                                       <input type="hidden" name="session_id" value="<?=$session_id?>">
                                       <input type="hidden" name="course_code" value="<?=$code?>">                                       
                                          <input type="text" class="form-control" id="cname" name="course_name" value="<?=$row['course_name']?>" required="">
                                       </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                       <label class="col-md-3 col-form-label" for="cshort_desc">Short Description<span class="required">*</span></label>
                                       <div class="col-md-9">
                                          <input type="text"  class="form-control" id="cshort_desc" name="course_short_desc" value="<?=$row['course_short_description']?>" required="">
                                       </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                       <label class="col-md-3 col-form-label" for="cdesc">Description<span class="required">*</span></label>
                                       <div class="col-md-9">
                                          <textarea  class="form-control" id="cdesc" name="course_desc" required=""><?=$row['course_description']?></textarea>
                                       </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                       <label class="col-md-3 col-form-label" for="cmeta">Metadata<span class="required">*</span></label>
                                       <div class="col-md-9">
                                          <input type="text"  class="form-control" id="cmeta" name="course_metadata" value="<?=$row['course_metadata']?>" required="">
                                       </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                       <label class="col-md-3 col-form-label" for="duration">Course Duration<span class="required">*(in Days)</span></label>
                                       <div class="col-md-9">
                                          <input type="text"  class="form-control" id="duration" name="course_duration" value="<?=$row['course_duration']?>" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required="">
                                       </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                       <label class="col-md-3 col-form-label" for="isfree">Is Free<span class="required">*</span></label>
                                       <div class="col-md-9">
                                          <select class="form-control" id="isfree" name="course_isfree" required="">
                                          <?php
                                          if($row['is_free'] == '1')
                                          {
                                              ?>
                                              <option value="1" selected>Yes</option>
                                          <option value="0">No</option>
                                              <?php
                                          }
                                          else
                                          {
                                              ?>
                                              <option value="1">Yes</option>
                                          <option value="0" selected>No</option>
                                              <?php
                                          }
                                          ?>
                                          
                                          </select>
                                       </div>
                                    </div>
                                    <?php
                                        if($row['is_free'] == '1')
                                        {
                                            ?>
                                                <div class="form-group row mb-3" id="course_price" style="display:none">
                                            <?php
                                        }
                                        else
                                        {
                                            ?>
                                                <div class="form-group row mb-3" id="course_price">
                                            <?php
                                        }

                                    ?>
                                    
                                       <label class="col-md-3 col-form-label" for="price">Price<span class="required">*</span></label>
                                       <div class="col-md-9">
                                          <input type="text" class="form-control" id="price" name="course_price" value="<?=$row['price']?>" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                       </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                       <label class="col-md-3 col-form-label" for="course_image">Course Image</label>
                                       <div class="col-md-9">
                                       <?php
                                             if($row['course_image'] != '')
                                             {
                                                 echo "<img src='../$row[course_image]' height='200' width='200'>";                                             
                                             }
                                             ?>
                                          <div class="input-group">
                                             <div class="custom-file">
                                           
                                                <input type="file" class="custom-file-input" id="course_image" name="course_image" accept="image/*" onchange="changeTitleOfImageUploader(this)" >
                                                <label class="custom-file-label" for="course_image">Choose Course image</label>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                       <label class="col-md-3 col-form-label" for="course_thumb">Course Thumbnail</label>
                                       <div class="col-md-9">
                                       <?php
                                             if($row['course_thumbanil'] != '')
                                             {
                                                 echo "<img src='../$row[course_thumbanil]' height='200' width='200'>";                                             
                                             }
                                             ?>
                                          <div class="input-group">
                                             <div class="custom-file">
                                           
                                                <input type="file" class="custom-file-input" id="course_thumb" name="course_thumb" accept="image/*" onchange="changeTitleOfImageUploader(this)" >
                                                <label class="custom-file-label" for="course_thumb">Choose Course Thumbnail</label>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                       <label class="col-md-3 col-form-label" for="course_video">Course Video</label>
                                       <div class="col-md-9">
                                       <?php
                                             if($row['course_short_video'] != '')
                                             {
                                                 echo "<video width='320' height='240' controls>
                                                 <source src='../$row[course_short_video]'>
                                                 Your browser does not support the video tag.
                                               </video>
                                               ";                                             
                                             }
                                             ?>
                                          <div class="input-group">
                                             <div class="custom-file">
                                           
                                                <input type="file" class="custom-file-input" id="course_video" name="course_video" accept="video/*" onchange="changeTitleOfImageUploader(this)" >
                                                <label class="custom-file-label" for="course_video">Choose Course Video</label>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                       <label class="col-md-3 col-form-label" for="course_preview_time">course_preview_time<span class="required">*(in Days)</span></label>
                                       <div class="col-md-9">
                                          <input type="text" maxlength="8"  class="form-control" id="course_preview_time" name="course_preview_time" step="2" value="<?=$row['course_preview_time']?>" required="">
                                       </div>
                                    </div>
                                    <?php
                                    if($session_id == '1')
                                    {
                                    ?>
                                    <div class="form-group row mb-3">
                                       <label class="col-md-3 col-form-label" for="status">Status<span class="required">*</span></label>
                                       <div class="col-md-9">
                                          <select class="form-control" id="status" name="course_status" required="">
                                          <?php
                                          if($row['status'] == '1')
                                          {
                                              ?>
                                              <option value="0" >Inactive</option>
                                              <option value="1" selected>Active</option>
                                              <option value="2">Pending</option>
                                              <?php
                                          }
                                          else if($row['status'] == '2')
                                          {
                                              ?>
                                              <option value="0" >Inactive</option>
                                              <option value="1" >Active</option>
                                              <option value="2" selected>Pending</option>
                                              <?php
                                          }
                                          else if($row['status'] == '0')
                                          {
                                              ?>
                                              <option value="0" selected>Inactive</option>
                                              <option value="1" >Active</option>
                                              <option value="2">Pending</option>
                                              <?php
                                          }
                                          ?>
                                          
                                          </select>
                                       </div>
                                    </div>
                                    <?php
                                    }
                                    ?>
                                    <div class="mb-3">
                                          <button type="submit" class="btn btn-primary" onclick="checkRequiredFields()" id="pms_register_but" name="button">Add New Course</button>
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
function generateRandomString($length = 8) {
   include('config.php');
   $characters = '0123456789abcdefghijklmnopqrs092u3tuvwxyzaskdhfhf9882323ABCDEFGHIJKLMNksadf9044OPQRSTUVWXYZ';
   $charactersLength = strlen($characters);
   $randomString = '';
   for ($i = 0; $i < $length; $i++) {
       $randomString .= $characters[rand(0, $charactersLength - 1)];
   }
   $sql = mysqli_query($connect,"SELECT * FROM `courses` WHERE `course_code` = '$randomString'");
   if(mysqli_num_rows($sql) > 0)
   {
      generateRandomString(8);
   }
   else
   {
      return $randomString;
   }
   
}
?>
<script>
$(document).ready(function () {

 $("#course_preview_time").keypress(function(){
       $this = $(this);       
       if($this.val().length == 2 || $this.val().length == 5){
           $this.val($this.val() + ":");
       }
    });
    
    $('#isfree').on('change', function() {
  var value = this.value;
  if(value === '1')
  {
    $('#course_price').hide();
    $('#price').prop('required',false);
  }
  else if(value === '0')
  {
    $('#course_price').show();
    $('#price').prop('required',true);

  }
  else
  {
    $('#price').prop('required',false);
    $('#course_price').hide();
  }

});
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