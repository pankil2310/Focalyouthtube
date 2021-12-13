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
                  <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> Website settings</h4>
               </div>
            </div>
         </div>
      </div>

      <?php
      $about_sql = mysqli_query($connect,"SELECT * FROM `website_setting` WHERE `id` = '1'");
      $terms_sql = mysqli_query($connect,"SELECT * FROM `website_setting` WHERE `id` = '2'");
      $privacy_sql = mysqli_query($connect,"SELECT * FROM `website_setting` WHERE `id` = '3'");

      $row1 = mysqli_fetch_assoc($about_sql);
      $row2 = mysqli_fetch_assoc($terms_sql);
      $row3 = mysqli_fetch_assoc($privacy_sql);

      ?>
      <div class="row justify-content-center">
         <div class="col-xl-12">
            <div class="card">
               <div class="card-body">
                  <h4 class="mb-3 header-title">Website settings</h4>
                  <form class="required-form" action="website_setting_submit.php" method="post" enctype="multipart/form-data">                    

                     <div class="form-group">
                        <label for="about_us">About us</label>
                        <textarea name="about_us" id="about_us" class="form-control" rows="5" style="display: none;"><?=html_entity_decode($row1['content'])?></textarea>
                 
                     </div>
                     <div class="form-group">
                        <label for="terms_and_condition">Terms and condition</label>
                        <textarea name="terms_and_condition" id="terms_and_condition" class="form-control" rows="5" style="display: none;"><?=html_entity_decode($row2['content'])?></textarea>
            
                     </div>
                     <div class="form-group">
                        <label for="privacy_policy">Privacy policy</label>
                        <textarea name="privacy_policy" id="privacy_policy" class="form-control" rows="5" style="display: none;"><?=html_entity_decode($row3['content'])?></textarea>
                     </div>
                     <div class="row justify-content-center">
                        <div class="col-md-4">
                           <button type="submit" class="btn btn-primary btn-block" onclick="checkRequiredFields()">Update settings</button>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
<!--      <div class="row justify-content-center">
         <div class="col-xl-12">
            <div class="card">
               <div class="card-body">
                  <h4 class="mb-3 header-title">Recaptcha settings</h4>
                  <form action="#/admin/frontend_settings/recaptcha_update" method="post" enctype="multipart/form-data">
                     <div class="form-group">
                        <label>Recaptcha status<span class="required">*</span></label><br>
                        <input type="radio" id="recaptcha_active" value="1" name="recaptcha_status"> <label for="recaptcha_active">Active</label>
                        &nbsp;&nbsp;
                        <input type="radio" id="recaptcha_inactive" value="0" name="recaptcha_status" checked=""> <label for="recaptcha_inactive">Inactive</label>
                     </div>
                     <div class="form-group">
                        <label for="recaptcha_sitekey">Recaptcha sitekey (v2)<span class="required">*</span></label>
                        <input type="text" name="recaptcha_sitekey" id="recaptcha_sitekey" class="form-control" value="recaptcha-sitekey" required="">
                     </div>
                     <div class="form-group">
                        <label for="recaptcha_secretkey">Recaptcha secretkey (v2)<span class="required">*</span></label>
                        <input type="text" name="recaptcha_secretkey" id="recaptcha_secretkey" class="form-control" value="recaptcha-secretkey" required="">
                     </div>
                     <div class="row justify-content-center">
                        <div class="col-md-4">
                           <button type="submit" class="btn btn-primary btn-block">Update recaptcha settings</button>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
      <div class="row justify-content-center">
         <div class="col-xl-4 col-lg-6">
            <div class="card">
               <div class="card-body">
                  <div class="col-xl-12">
                     <h4 class="mb-3 header-title">Update banner image</h4>
                     <div class="row justify-content-center">
                        <form action="#/admin/frontend_settings/banner_image_update" method="post" enctype="multipart/form-data" style="text-align: center;">
                           <div class="form-group mb-2">
                              <div class="wrapper-image-preview">
                                 <div class="box" style="width: 250px;">
                                    <div class="js--image-preview" style="background-image: url(#/uploads/system/home-banner.jpg); background-color: #F5F5F5;"></div>
                                    <div class="upload-options">
                                       <label for="banner_image" class="btn"> <i class="mdi mdi-camera"></i> Upload banner image <br> <small>(2000 X 1335)</small> </label>
                                       <input id="banner_image" style="visibility:hidden;" type="file" class="image-upload" name="banner_image" accept="image/*">
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <button type="submit" class="btn btn-primary btn-block">Upload banner image</button>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-xl-4 col-lg-6">
            <div class="card">
               <div class="card-body">
                  <div class="col-xl-12">
                     <h4 class="mb-3 header-title">Update light logo</h4>
                     <div class="row justify-content-center">
                        <form action="#/admin/frontend_settings/light_logo" method="post" enctype="multipart/form-data" style="text-align: center;">
                           <div class="form-group mb-2">
                              <div class="wrapper-image-preview">
                                 <div class="box" style="width: 250px;">
                                    <div class="js--image-preview" style="background-image: url(#/uploads/system/logo-light.png); background-color: #F5F5F5;"></div>
                                    <div class="upload-options">
                                       <label for="light_logo" class="btn"> <i class="mdi mdi-camera"></i> Upload light logo <br> <small>(330 X 70)</small> </label>
                                       <input id="light_logo" style="visibility:hidden;" type="file" class="image-upload" name="light_logo" accept="image/*">
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <button type="submit" class="btn btn-primary btn-block">Upload light logo</button>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-xl-4 col-lg-6">
            <div class="card">
               <div class="card-body">
                  <div class="col-lg-12">
                     <h4 class="mb-3 header-title">Update dark logo</h4>
                     <div class="row justify-content-center">
                        <form action="#/admin/frontend_settings/dark_logo" method="post" enctype="multipart/form-data" style="text-align: center;">
                           <div class="form-group mb-2">
                              <div class="wrapper-image-preview">
                                 <div class="box" style="width: 250px;">
                                    <div class="js--image-preview" style="background-image: url(#/uploads/system/logo-dark.png); background-color: #F5F5F5;"></div>
                                    <div class="upload-options">
                                       <label for="dark_logo" class="btn"> <i class="mdi mdi-camera"></i> Upload dark logo <br> <small>(330 X 70)</small> </label>
                                       <input id="dark_logo" style="visibility:hidden;" type="file" class="image-upload" name="dark_logo" accept="image/*">
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <button type="submit" class="btn btn-primary btn-block">Upload dark logo</button>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-xl-4 col-lg-6">
            <div class="card">
               <div class="card-body">
                  <div class="col-lg-12">
                     <h4 class="mb-3 header-title">Update small logo</h4>
                     <div class="row justify-content-center">
                        <form action="#/admin/frontend_settings/small_logo" method="post" enctype="multipart/form-data" style="text-align: center;">
                           <div class="form-group mb-2">
                              <div class="wrapper-image-preview">
                                 <div class="box" style="width: 250px;">
                                    <div class="js--image-preview" style="background-image: url(#/uploads/system/logo-light-sm.png); background-color: #F5F5F5;"></div>
                                    <div class="upload-options">
                                       <label for="small_logo" class="btn"> <i class="mdi mdi-camera"></i> Upload small logo <br> <small>(49 X 58)</small> </label>
                                       <input id="small_logo" style="visibility:hidden;" type="file" class="image-upload" name="small_logo" accept="image/*">
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <button type="submit" class="btn btn-primary btn-block">Upload small logo</button>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-xl-4 col-lg-6">
            <div class="card">
               <div class="card-body">
                  <div class="col-lg-12">
                     <h4 class="mb-3 header-title">Update favicon</h4>
                     <div class="row justify-content-center">
                        <form action="#/admin/frontend_settings/favicon" method="post" enctype="multipart/form-data" style="text-align: center;">
                           <div class="form-group mb-2">
                              <div class="wrapper-image-preview">
                                 <div class="box" style="width: 250px;">
                                    <div class="js--image-preview" style="background-image: url(#/uploads/system/favicon.png); background-color: #F5F5F5;"></div>
                                    <div class="upload-options">
                                       <label for="favicon" class="btn"> <i class="mdi mdi-camera"></i> Upload favicon <br> <small>(90 X 90)</small> </label>
                                       <input id="favicon" style="visibility:hidden;" type="file" class="image-upload" name="favicon" accept="image/*">
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <button type="submit" class="btn btn-primary btn-block">Upload favicon</button>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>-->
      <script type="text/javascript">
         $(document).ready(function () {
           initSummerNote(['#about_us', '#terms_and_condition', '#privacy_policy', '#cookie_policy']);
         });
      </script>                    <!-- END PLACE PAGE CONTENT HERE -->
   </div>
</div>

<?php
include('footer.php');
?>