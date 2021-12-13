<?php
include('header.php');

if(!isset($session_id))
{
    ?>
    <script>window.location = 'login.php';</script>
    <?php
}


?>
<style>

.cat_stick
{
    display: none;
}
h1{
    color:black;
}

</style>

<div style="padding-top: 25px!important;margin:auto;text-align:center;text-decoration:underline"  >
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                        <div class="gen-breadcrumb-title">
                            <h1>
                                Manage Profile
                            </h1>
                        </div>
                </div>
            </div>
        </div>
    </div>

    <section class="gen-section-padding-3 gen-top-border">
        <div class="container container-2">
            <div class="row" style="offset:3;">
                <div class="col-xl-12">
                    <h2 class="mb-5">Welcome Back <?=$session_firstname?> <?=$session_lastname?> !</h2>
                    <form  class="col-xl-9 form_submit" style="margin:auto" enctype="multipart/form-data" name="update_user" method="POST">
                        <div class="row gt-form">
                            <div class="col-md-4 mb-4">
                            <label for="email">Email</label> 
                            <input type="hidden" name="id" value="<?=$session_id?>">
                            <input type="email" id="email" name="email" placeholder="Email" value="<?=$user_email?>" readonly></div>
                            <div class="col-md-4 mb-4">
                            <label for="phone">Phone Number</label>     
                            <input type="number" id="number" name="phone_number" placeholder="Phone Number" value="<?=$user_phone?>" readonly>
                            </div>
                            <div class="col-md-4 mb-4">
                            <label for="fname">First Name</label>    
                            <input type="text" id="fname" name="first_name" placeholder="Your First Name" value="<?=$session_firstname?>" required>
                            </div>
                            <div class="col-md-4 mb-4">
                            <label for="lname">Last Name</label>    
                            <input type="text" id="lname" name="last_name" placeholder="Your Last Name" value="<?=$session_lastname?>" required>
                            </div>
                            
                            <div class="col-md-4 mb-4">
                            <label for="gender">Gender</label>    
                            <select  id="gender" name="gender">
                                <?php
                                if($user_gender == 'male')
                                {
                                    ?>
                                    <option value="male" selected>Male</option>
                                    <option value="female">Female</option>                                        
                                    <?php
                                }
                                else if($user_gender == 'female')
                                {
                                    ?>
                                    <option value="male">Male</option>
                                    <option value="female" selected>Female</option>
                                    <?php
                                }
                                else
                                {
                                ?>
                                <option value="">Select Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <?php
                                }
                                ?>
                            </select>
                            </div>
                            <div class="col-md-4 mb-4">
                            <label for="dob">Date Of Birth</label>    
                            <input type="date" id="dob" name="dob" placeholder="Date Of Birth"  value="<?=$user_dob?>" >
                            </div>
                            <div class="col-md-4 mb-4">
                            <label for="city">City</label>    
                            <input type="text" id="city" name="city" placeholder="Your City" value="<?=$user_city?>" required>
                            </div>
                            <div class="col-md-4 mb-4">
                            <label for="state">State</label>    
                            <input type="text" id="state" name="state" placeholder="Your State" value="<?=$user_state?>" required>
                            </div>
                            <div class="col-md-4 mb-4">
                            <label for="zip">Pin Code</label>    
                            <input type="number" id="zip" name="zip" placeholder="Your Pin Code" value="<?=$user_zip?>" required>
                            </div>
                            <div class="col-md-12 mb-4">
                            <label for="uploadFile">Profile Image</label>    <br>
                            <?php
                            if($session_proimg != "")
                            {
                                echo "<br><img src='$session_proimg' height='100px' width='100px'><br>";
                            }
                            ?>
                    <!--        <input type="file" id="proimg" name="proimg"  style="height:unset" accept="image/jpeg,image/png""> -->
                            <input id="uploadFile" class="f-input" readonly placeholder="No File Chosen"/>
<div class="fileUpload btn btn--browse">
    <span>Upload</span>
    <input id="uploadBtn" type="file" class="upload" name="proimg" accept="image/jpeg,image/png" />
</div>

<style>
.fileUpload {
    position: relative;
    overflow: hidden;
    width:10%;
}
.fileUpload input.upload {
    position: absolute;
    top: 0;
    right: 0;
    margin: 0;
    padding: 0;
    font-size: 20px;
    cursor: pointer;
    opacity: 0;
    filter: alpha(opacity=0);
}

.btn--browse{
    border: 1px solid gray;
    border-left: 0;
	border-radius: 0 2px 2px 0;
    background-color: #ccc;
    color: black;
    height: 42px;
	padding: 10px 14px;
}

.f-input{
	height: 42px;
	border: 1px solid gray;
	width: 90%;
	float: left;
	padding: 0 14px;
}

</style>
                            
                            </div>

                            <div class="col-md-12 mb-4">
                                <input type="submit" value="UPDATE" class="mt-4" style="    margin: auto;
    display: block;
    float: none;    padding: 8px 100px;
    border-radius: 9px;">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script>
   $(function(){
  
      dob.max = new Date().toISOString().split("T")[0];
document.getElementById("uploadBtn").onchange = function () {
    document.getElementById("uploadFile").value = this.value.replace("C:\\fakepath\\", "");
};

});
</script>
<?php
include('footer.php');
?>