<?php
include('config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
   <meta name="keywords" content="Focalyouthtube" />
   <meta name="description" content="Focalyouthtube" />
   <meta name="author" content="Focalyouthtube" />
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <title>Focalyouthtube</title>
   <!-- Favicon -->
   <link rel="shortcut icon" href="images/favicon.ico">
   <!-- CSS bootstrap-->
   <link rel="stylesheet" href="css/bootstrap.min.css" />
   <!--  Style -->
   <link rel="stylesheet" href="css/style.css" />
   <!--  Responsive -->
   <link rel="stylesheet" href="css/responsive.css" />
   <link href="fonts/fontawesome/css/all.css" rel="stylesheet"> <!--load all styles -->
   <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
</head>

<body>
        <style>
    #send_otp:hover
    {
            color: black !important;
    }
    </style>
<section class="position-relative pb-0" style="margin: 50px auto;">
        <div class="gen-register-page-background" style="background:#f5f5f5;">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        <div class="card" style="    margin: auto;
">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item text-center"> <a class="nav-link active btl" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Register</a> </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="form ">
                    <form class="pms-form form_submit" name="register_user"  method="POST">
                             <span id="message">
                              <span></span>
                              </span>
                            <ul class="pms-form-fields-wrapper pl-0">
                               
                               <li class="pms-field pms-user-login-field ">
                                    <label for="pms_user_login">Username *</label>
                                    <input id="pms_user_name" name="username" type="text" required>
                                </li>
                                
                                <li class="pms-field pms-user-email-field ">
                                    <label for="pms_user_email">E-mail *</label>
                                    <input id="pms_user_email" name="user_email" type="email" required>
                                </li>
                                
                                <li class="pms-field pms-first-name-field ">
                                    <label for="pms_first_name">First Name *</label>
                                    <input id="pms_first_name" name="first_name" type="text" required>
                                </li>
                                
                                <li class="pms-field pms-last-name-field ">
                                    <label for="pms_last_name">Last Name *</label>
                                    <input id="pms_last_name" name="last_name" type="text" required>
                                </li>
                                
                                <li class="pms-field pms-user-name-field ">
                                    <label for="pms_user_phone">Phone *</label>
                                    <input id="pms_user_phone" name="user_phone" type="text" maxlength="10" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
                                    <p><button type="button" class="button button-primary" id="send_otp">Verify Phone</button></p>    
                                </li>
                                <li class="pms-field pms-user-name-field ">
                                    <label for="pms_user_otp">OTP *</label>
                                    <input id="pms_user_otp" name="otp" type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
                                </li>
                                
                                <li class="pms-field pms-pass1-field">
                                    <label for="pms_pass1">Password *</label>
                                    <input id="pms_pass1" name="password" onkeyup="check();" type="password" required>                                    
                                </li>
                                <li class="pms-field pms-pass2-field">
                                    <label for="pms_pass2">Repeat Password *</label>
                                    <input id="pms_pass2" name="pass2" onkeyup="check();" type="password" required>
                                    
                                </li>
                                
                                  
                            </ul>
                            <span id="pms-submit-button-loading-placeholder-text" class="d-none">Processing. Please
                                wait...</span>
                            <input name="pms_register" id="pms_register_but" type="submit" value="Register" style="    width: -webkit-fill-available;" disabled>
                            
                        </form>
                </div>
            </div>
        </div>
    </div>
                        
                        <a href="login.php" style="color:white">Login</a> | <a href="index.php" style="color:white">Back to Home</a>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
<style>
form
{
    text-align:left;
}
form ul
{
        list-style: none;
}
    #message{
        color:red;
    }
</style>
  <style>
    body {
    background-color: #000
}

.card {
    width: 400px;
    border: none
}

.btr {
    border-top-right-radius: 5px !important
}

.btl {
    border-top-left-radius: 5px !important
}

.btn-dark {
    color: #fff;
    background-color: #0d6efd;
    border-color: #0d6efd
}

.btn-dark:hover {
    color: #fff;
    background-color: #0d6efd;
    border-color: #0d6efd
}

.nav-pills {
    display: table !important;
    width: 100%
}

.nav-pills .nav-link {
    border-radius: 0px;
    border-bottom: 1px solid #0d6efd40
}

.nav-item {
    display: table-cell;
    background: #0d6efd2e
}

.form {
    padding: 10px;
    height: 300px
}

.form input {
    margin-bottom: 12px;
    border-radius: 3px
}

.form input:focus {
    box-shadow: none
}

.form button {
    margin-top: 20px
}
    </style>

<script>
$(document).ready(function () {

   $("#pms_user_name").on('input', function() {
        var value = $(this).val();    
        $.ajax({
            type: "POST",
            url: 'ajax/check_validation.php',
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



    $("#pms_user_email").on('input', function() {
        var value = $(this).val();    
        $.ajax({
            type: "POST",
            url: 'ajax/check_validation.php',
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


    $("#pms_user_phone").on('input', function() {
        var value = $(this).val();    
        $.ajax({
            type: "POST",
            url: 'ajax/check_validation.php',
            data: 'type=phone&value=' + value, // serializes the form's elements.
            success: function(data1)
            {
                if(data1 == "true")
                {
                    $("#pms_register_but").prop('disabled', true);
                    $("#send_otp").prop('disabled', true);
                    $("#message").append("<p style='margin:0' id='phonemsg'>Phone number allready in use</p>");
                }
                else
                {
                    $("#phonemsg").remove();
                    $("#pms_register_but").prop('disabled', false);
                    $("#send_otp").prop('disabled', false);
                    
                }
            }
        });
    });

    
    $("#pms_pass2").on('keyup', function(){
    var password = $("#pms_pass1").val();
    var confirmPassword = $("#pms_pass2").val();
    if (password != confirmPassword)
    {
        $("#message span").html("Password does not match !").css("color","red");
        $("#message span").show();
    }else
    {
        $("#message span").hide();
    }
   });
   
     var OTP;
   $("#send_otp").on('click', function() {
        var value = $('#pms_user_phone').val();    
        if(value.length === 10)
        {
            $.ajax({
                type: "POST",
                url: 'ajax/sendotp_register.php',
                data: 'value=' + value, // serializes the form's elements.
                success: function(data1)
                {         
                    //alert(data1);
                    if(data1 == "false")
                    {
                        alert("Please Try After Some Time");
                        //OTP = "1324";
                    }
                    else
                    {
                        $("#send_otp").prop('disabled', true);
                        alert("OTP Send");
                        OTP = data1;
                    }
                }
            });
        }
        else
        {
            alert("Mobile Number Should be 10 digits");
        }
    });
    
   $("#pms_register_but").on('click', function(e) {
        var value = $('#pms_user_otp').val(); 
        if(value === OTP)
        {
            
        }
        else
        {
            alert("Entered Wrong OTP");
            e.preventDefault();    
        }
   });
   

});
</script>
<?php
include('footer.php');
?>