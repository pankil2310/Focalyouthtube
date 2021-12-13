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
                  <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i>Edit Subscription</h4>
               </div>
               <!-- end card body-->
            </div>
            <!-- end card -->
         </div>
         <!-- end col-->
      </div>
      <?php
          $code = $_GET['id'];
          $subscription_details = mysqli_query($connect,"SELECT * FROM `subscriptions` WHERE `subscription_code` = '$code'");
          $row = mysqli_fetch_assoc($subscription_details);
      ?>
      <div class="row justify-content-center">
         <div class="col-xl-7">
            <div class="card">
               <div class="card-body">
                  <div class="col-lg-12">
                     <h4 class="mb-3 header-title">New Subscription</h4>
                     <form class="required-form" action="edit_subscription_submit.php" method="post" enctype="multipart/form-data">                        
                        <div class="form-group">
                           <label for="sub_name">Name<span class="required">*</span></label>
                           <input type="hidden" name="session_id" value="<?=$session_id?>" required>
                           <input type="hidden" name="sub_code" value="<?=$code?>" required>
                           <input type="text" name="sub_name" id="sub_name" class="form-control" placeholder="Name" value="<?=$row['subscription_name']?>" required="">
                        </div>
                        <div class="form-group">
                           <label for="sub_desc">Description<span class="required">*</span></label>
                           <textarea name="sub_desc" id="sub_desc" class="form-control" placeholder="Description" required=""><?=$row['subscription_description']?></textarea>
                        </div>
                        <div class="form-group">
                           <label for="sub_price">Price<span class="required">*</span></label>
                           <input type="number" name="sub_price" id="sub_price" class="form-control" placeholder="Price" required="" value="<?=$row['subscription_price']?>" >
                        </div>
                        <div class="form-group">
                           <label for="sub_duration">Duration<span class="required">*(in Months)</span></label>
                           <input type="text" name="sub_duration" id="sub_duration" class="form-control" placeholder="Duration" required="" value="<?=$row['subscription_duration']?>">
                        </div>
                        <div class="form-group">
                                       <label for="course_image">Subscription Image</label>
                                          <?php
                                             if($row['subscription_image'] != '')
                                             {
                                                 echo "<img src='../$row[subscription_image]' height='100' width='100'><br>";                                             
                                             }
                                             ?>
                                       <div>
                                          <div class="input-group">
                                             <div class="custom-file">
                                              
                                                <input type="file" class="custom-file-input" id="sub_image" name="sub_image" accept="image/*" onchange="changeTitleOfImageUploader(this)">
                                                <label class="custom-file-label" for="sub_image">Choose image</label>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <?php
                                    if($session_id == '1')
                                    {
                                    ?>
                                    <div class="form-group">
                                       <label  for="status">Status<span class="required">*</span></label>
                                       <div >
                                          <select class="form-control" id="status" name="status" required="">
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
                        <button type="submit" class="btn btn-primary" onclick="checkRequiredFields()">Edit Subscription</button>
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
