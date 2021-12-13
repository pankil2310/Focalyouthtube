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
                  <h4 class="page-title"> <i class="mdi mdi-apple-keyboard-command title_icon"></i> Edit category</h4>
               </div>
               <!-- end card body-->
            </div>
            <!-- end card -->
         </div>
         <!-- end col-->
      </div>
      <?php
        $id = $_GET['id'];
        $sql = mysqli_query($connect,"SELECT * FROM `course_category` WHERE `id` = '$id'");
        $row = mysqli_fetch_assoc($sql);
      ?>


      <div class="row justify-content-center">
         <div class="col-xl-7">
            <div class="card">
               <div class="card-body">
                  <div class="col-lg-12">
                     <h4 class="mb-3 header-title">Category edit form</h4>
                     <form class="required-form" action="edit_category_submit.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                           <label for="code">Category code</label>
                           <input type="hidden" name="id" value="<?=$session_id?>">
                           <input type="hidden" name="catid" value="<?=$id?>">
                           <input type="text" class="form-control" id="code" name="code" value="<?=$row['category_code']?>" readonly>
                        </div>
                        <div class="form-group">
                           <label for="name">Category title<span class="required">*</span></label>
                           <input type="text" class="form-control" id="name" name="name" value="<?=$row['cat_name']?>" required>
                        </div>                    
                        <div class="form-group">
                           <label for="status">Status<span class="required">*</span></label>
                           <select class="form-control" id="status" name="status"required>
                            <?php
                            if($row['status'] == '1')
                            {
                                ?>
                                    <option value="1" selected>Active</option>
                                    <option value="0" >Inactive</option>
                                <?php
                            }
                            else
                            {
                                ?>
                                    <option value="1" >Active</option>
                                    <option value="0" selected>Inactive</option>
                                <?php

                            }
                            ?>


                           </select>
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
include('footer.php');
?>