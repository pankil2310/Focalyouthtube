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
                  <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i>Add New Subscription</h4>
               </div>
               <!-- end card body-->
            </div>
            <!-- end card -->
         </div>
         <!-- end col-->
      </div>
      <?php
                                    $code = generateRandomString(10);
                                    ?>
      <div class="row justify-content-center">
         <div class="col-xl-7">
            <div class="card">
               <div class="card-body">
                  <div class="col-lg-12">
                     <h4 class="mb-3 header-title">New Subscription</h4>
                     <form class="required-form" action="add_subscription_submit.php" method="post" enctype="multipart/form-data">                        
                        <div class="form-group">
                           <label for="sub_name">Name<span class="required">*</span></label>
                           <input type="hidden" name="session_id" value="<?=$session_id?>" required>
                           <input type="hidden" name="sub_code" value="<?=$code?>" required>
                           <input type="text" name="sub_name" id="sub_name" class="form-control" placeholder="Name" required="">
                        </div>
                        <div class="form-group">
                           <label for="sub_desc">Description<span class="required">*</span></label>
                           <textarea name="sub_desc" id="sub_desc" class="form-control" placeholder="Description" required=""></textarea>
                        </div>
                        <div class="form-group">
                           <label for="sub_price">Price<span class="required">*</span></label>
                           <input type="number" name="sub_price" id="sub_price" class="form-control" placeholder="Price" required="" value="0">
                        </div>
                        <div class="form-group">
                           <label for="sub_duration">Duration<span class="required">*(in Months)</span></label>
                           <input type="text" name="sub_duration" id="sub_duration" class="form-control" placeholder="Duration" required="">
                        </div>
                        <div class="form-group">
                                       <label for="course_image">Subscription Image</label>
                                       <div>
                                          <div class="input-group">
                                             <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="sub_image" name="sub_image" accept="image/*" onchange="changeTitleOfImageUploader(this)" required>
                                                <label class="custom-file-label" for="sub_image">Choose image</label>
                                             </div>
                                          </div>
                                       </div>
                                    </div>

                        <button type="submit" class="btn btn-primary" onclick="checkRequiredFields()">Add New Subscription</button>
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
function generateRandomString($length = 8) {
   include('config.php');
   $characters = '0123456789abcdefghijklmnopqrs092u3tuvwxyzaskdhfhf9882323ABCDEFGHIJKLMNksadf9044OPQRSTUVWXYZ';
   $charactersLength = strlen($characters);
   $randomString = '';
   for ($i = 0; $i < $length; $i++) {
       $randomString .= $characters[rand(0, $charactersLength - 1)];
   }
   $sql = mysqli_query($connect,"SELECT * FROM `subscriptions` WHERE `subscription_code` = '$randomString'");
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
<?php
include('footer.php');
?>
