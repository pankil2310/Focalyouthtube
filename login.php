<?php
include('config.php');
session_start();

if(isset($_SESSION['admin']))
{
    header("Location: admin");
    die();
}
if(isset($_SESSION['user']))
{
    header("Location: index.php");
    die();
}




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
        <div class="gen-login-page-background" style="background:#f5f5f5;"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                    
                        
                        
                        <div class="d-flex justify-content-center align-items-center mt-5">
                             <div class="card">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item text-center"> <a class="nav-link active btl" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Login With Mobile</a> </li>
            <li class="nav-item text-center"> <a class="nav-link btr" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Login With Email</a> </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="form ">
                    <form class="form_submit"  name="login_user" method="post" style="text-align:left">
                        <p class="login-username">
                                <label for="user_login">Mobile Number</label>
                                <input type="number" name="username" id="user_login" class="input" value="" size="20" required>
                            </p>
                            <p class="login-submit"><button type="button" class="button button-primary" id="send_otp">Send OTP</button></p>
                            <p class="login-password">
                                <label for="user_pass">OTP</label>
                                <input type="number" name="password" id="user_pass" class="input" value="" size="20" required>
                            </p>
                            <p class="login-remember">  
                                <label>
                                    <input name="rememberme" type="checkbox" id="rememberme" value="forever"> Remember
                                    Me </label>
                            </p>
                            <p class="login-submit">
                                <input type="submit" name="wp-submit" id="wp-submit" class="button button-primary"
                                    value="Log In">
                            </p>
                            <input type="hidden" name="pms_login" value="1"><input type="hidden" name="pms_redirect">
                            
                     </form>
                </div>
            </div>
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                <div class="form px-4">
                    <form class="form_submit"  name="login_user1" method="post" style="text-align:left">
                        <p class="login-username">
                                <label for="user_login">Username or Email Address</label>
                                <input type="text" name="username" id="user_login" class="input" value="" size="20" required>
                            </p>
                            <p class="login-password">
                                <label for="user_pass">Password</label>
                                <input type="password" name="password" id="user_pass" class="input" value="" size="20" required>
                            </p>
                            <p class="login-remember">
                                <label>
                                    <input name="rememberme" type="checkbox" id="rememberme" value="forever"> Remember
                                    Me </label>
                            </p>
                            <p class="login-submit">
                                <input type="submit" name="wp-submit" id="wp-submit" class="button button-primary"
                                    value="Log In">
                            </p>
                            <input type="hidden" name="pms_login" value="1">
                            <input type="hidden" name="pms_redirect">
                            <br>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
    <a
                                href="index.php" style="color:white">Back to Home</a> |
                            <a
                                href="register.php" style="color:white">Register</a> | <a href="#" style="color:white">Lost your
                                password?</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
    var OTP;
   $("#send_otp").on('click', function() {
       
        var value = $('#user_login').val();    
        if(value.length === 10)
        {
            $.ajax({
                type: "POST",
                url: 'ajax/sendotp.php',
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
    
   $("#wp-submit").on('click', function(e) {
        var value = $('#user_pass').val(); 
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
