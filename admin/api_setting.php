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
                  <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> API Settings</h4>
               </div>
            </div>
         </div>
      </div>
      <div class="row justify-content-center">
         <div class="col-xl-12">
            <div class="card">
               <div class="card-body">
                  <h4 class="mb-3 header-title">API Settings</h4>
                  <form class="required-form" action="" method="post" enctype="multipart/form-data">
                     <div class="form-group">
                        <label for="api_url">API URL<span class="required">*</span></label>
                        <input type="text" name="api_url" id="api_url" class="form-control" value="" required>
                     </div>
                     <div class="form-group">
                        <label for="api_key">API Key<span class="required">*</span></label>
                        <input type="text" name="api_key" id="api_key" class="form-control" value="" required>
                     </div>
                     <div class="row justify-content-center">
                        <div class="col-md-4">
                           <button type="button" class="btn btn-primary btn-block"">Update API settings</button>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
      
   </div>
</div>

<?php
include('footer.php');
?>