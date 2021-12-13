<?php
include('header.php');
?>
<div class="content-page">
   <div class="content">
      <div class="row ">
         <div class="col-xl-12">
            <div class="card">
               <div class="card-body">
                  <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> System settings</h4>
               </div>
            </div>
         </div>
      </div>   
      <?php
      $system_sql = mysqli_query($connect,"SELECT * FROM `system_setting`");
      $row = mysqli_fetch_assoc($system_sql);

      ?>


      <div class="row">
         <div class="col-xl-12">
            <div class="card">
               <div class="card-body">
                  <div class="col-lg-12">
                     <h4 class="mb-3 header-title">System settings</h4>
                     <form class="required-form" action="system_setting_submit.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                           <label for="system_name">Website name<span class="required">*</span></label>
                           <input type="hidden" name="session_id" value="<?=$session_id?>">
                           <input type="text" name="system_name" id="system_name" class="form-control" value="<?=$row['web_name']?>" required="">
                        </div>
                        <div class="form-group">
                           <label for="system_title">Website title<span class="required">*</span></label>
                           <input type="text" name="system_title" id="system_title" class="form-control" value="<?=$row['web_title']?>" required="">
                        </div>
                        <div class="form-group">
                           <label for="website_keywords">Website keywords</label>
                           <input type="text" class="form-control bootstrap-tag-input" id="website_keywords" name="website_keywords" data-role="tagsinput" style="width: 100%; display: none;" value="<?=$row['web_keyword']?>">
                        </div>
                        <div class="form-group">
                           <label for="website_description">Website description</label>
                           <textarea name="website_description" id="website_description" class="form-control" rows="5"><?=$row['web_description']?></textarea>
                        </div>                        
                        <div class="form-group">
                           <label for="slogan">Slogan<span class="required">*</span></label>
                           <input type="text" name="slogan" id="slogan" class="form-control" value="<?=$row['web_slogan']?>" required="">
                        </div>
                        <div class="form-group">
                           <label for="system_email">System email<span class="required">*</span></label>
                           <input type="text" name="system_email" id="system_email" class="form-control" value="<?=$row['web_mail']?>" required="">
                        </div>
                        <div class="form-group">
                           <label for="address">Address</label>
                           <textarea name="address" id="address" class="form-control" rows="5" required><?=$row['web_address']?></textarea>
                        </div>                        
                        <div class="form-group">
                           <label for="phone">Phone</label>
                           <input type="text" name="phone" id="phone" class="form-control" value="<?=$row['web_phone']?>" required maxlength="10" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                        </div>
                        <div class="form-group">
                           <label for="footer_text">Footer text</label>
                           <input type="text" name="footer_text" id="footer_text" class="form-control" value="<?=$row['web_footer']?>" required>
                        </div>
                        <button type="submit" class="btn btn-primary" onclick="checkRequiredFields()">Save</button>
                     </form>
                  </div>
               </div>
            </div>
         </div>

      </div>
   </div>
</div>
<?php
include('footer.php');
?>
