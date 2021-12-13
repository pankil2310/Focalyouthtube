<?php
include('header.php');
?>
<div class="content-page">
   <div class="content">
      <!-- BEGIN PlACE PAGE CONTENT HERE -->
      <!-- start page title -->
      <div class="row ">
         <div class="col-xl-12">
            <div class="card">
               <div class="card-body">
                  <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> Add new category</h4>
               </div>
               <!-- end card body-->
            </div>
            <!-- end card -->
         </div>
         <!-- end col-->
      </div>
      <div class="row justify-content-center">
         <div class="col-xl-7">
            <div class="card">
               <div class="card-body">
                  <div class="col-lg-12">
                     <h4 class="mb-3 header-title">Category add form</h4>
                     <form class="required-form" action="add_category_submit.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                        <?php
                           $code = generateRandomString(8);
                           
                        ?>
                           <label for="code">Category code</label>
                           <input type="hidden" name="id" value="<?=$session_id?>">
                           <input type="text" class="form-control" id="code" name="code" value="<?=$code?>" readonly>
                        </div>
                        <div class="form-group">
                           <label for="name">Category title<span class="required">*</span></label>
                           <input type="text" class="form-control" id="name" name="name" required>
                        </div>                    
                        <button type="submit" class="btn btn-primary">Submit</button>
                     </form>
                  </div>
               </div>
               <!-- end card body-->
            </div>
            <!-- end card -->
         </div>
         <!-- end col-->
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
   $sql = mysqli_query($connect,"SELECT * FROM `course_category` WHERE `category_code` = '$randomString'");
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